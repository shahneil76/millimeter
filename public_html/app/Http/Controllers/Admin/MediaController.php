<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Media;
use DataTables;
use DateTime;
use URL;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Media::orderBy('id', 'DESC');
                return Datatables::of($data)
                ->editColumn('image', function ($row) {
                    return '<div class="symbol symbol-90 symbol-2by3 flex-shrink-0 mr-4">
                        <div class="symbol-label" style="background-image: url(' . "'" . URL::to($row->featured_image) . "'" . ')"></div>
                    </div>';
                })
                ->editColumn('title', function ($row) {
                    if (!empty ($row->deleted_at)) {
                        return "<strong>" . $row->title . (($row->status == "draft") ? ' - Draft' : '') . "</strong><br /><span>" . truncateString($row->excerpt, 120) . "<span>";
                    } else {
                        return '<strong><a href="' . route('admin.media.edit', ['medium' => $row->slug]) . '" data-title="Post Edit" class="" title="Edit">' . $row->title . (($row->status == "draft") ? " - Draft" : "") . '</a></strong><br /><span>' . truncateString($row->excerpt, 120) . '<span>';
                    }
                })
                ->editColumn('dates', function ($row) {
                    return date("jS M", strtotime($row->published_on));
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == '1') {
                        $status = '<a href="' . route('admin.media.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-success label-inline status-change">Active</a>';
                        return $status;
                    } else {
                        $status = '<a href="' . route('admin.media.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-danger label-inline status-change">Inactive</a>';
                        return $status;
                    }
                })
                ->rawColumns(['title', 'image', 'status', 'dates'])
                ->make(true);
            }
            $title = "Media";
            return view('admin.media.index', compact('title'));
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $title = "Create Media";
            $tags = Tag::where(['status' => '1'])->get();
            return view('admin.media.create',compact('title','tags'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:media'],
                'featured_image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
                'image_caption' => ['nullable', 'string', 'max:500'],
                'excerpt' => ['nullable', 'string', 'max:500'],
                'date' => ['required'],
                'type' => ['required'],
                'meta_title' => ['nullable', 'string'],  /* ,'max:60' */
                'meta_description' => ['nullable', 'string'], /* ,'max:160' */
            ];

            if (!empty($request->type)) 
            {
                if ($request->type == "2") 
                {
                    $rules['content'] = ['required', 'string'];
                } 
                else 
                {
                    $rules['redirection'] = ['required', 'url'];
                }
                
            }

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required',
                'required_if' => 'Required'
            ]);

            if ($validator->fails()) {
                return Response::json(
                    array(
                        'error' => true,
                        'sweeterror' => true,
                        'errors' => $validator->getMessageBag(),
                        'success' => false,
                        'msg' => "",
                    )
                );
            } else {
                $post = "";
                DB::transaction(function () use ($request, &$post) {
                    $featured_image = "";
                    if ($request->hasFile('featured_image')) {
                        $featured_image = fileupload($request->featured_image);
                    }
                    $post_data = [];
                    $post_data['title'] = $request->title;
                    $post_data['content'] = $request->content ?? NULL;
                    $post_data['redirection'] = $request->redirection ?? NULL;
                    $post_data['image_caption'] = @$request->image_caption;
                    $post_data['excerpt'] = @$request->excerpt;
                    $post_data['slug'] = $request->slug;
                    $post_data['featured_image'] = $featured_image;
                    $post_data['type'] = @$request->type;
                    $post_data['meta_title'] = @$request->meta_title;
                    $post_data['meta_description'] = @$request->meta_description;
                    // $post_data['created_by'] = Auth::user()->id;
                    $post_data['published_on'] = DateTime::createFromFormat('m/d/Y g:i A', $request->date)->format('Y-m-d H:i:s');
                    $post = Media::create($post_data);

                    if (!empty($request->tags)) 
                    {
                        foreach ($request->tags as $key => $value) 
                        {
                            MediaTag::create([
                                'media_id' => $post->id,
                                'tag_id' => $value,
                            ]);
                        }
                    }
                });

                Session::flash('success', 'Media Created successfully!');
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'route' => route('admin.media.index'),
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $media = Media::where(['slug' => $id])->first();
            $title = "Edit Media";
            $tags = Tag::where(['status' => '1'])->get();
            $selected_tags = $media->tags()->pluck('tag_id')->toArray();
            return view('admin.media.create',compact('media','title','tags','selected_tags'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Media::where(['id' => $id])->first();
        try {
            $rules = [
                'title' => ['required', 'string', 'max:255'],
                'slug' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('media')->ignore($post->id),
                ],
                'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
                'image_caption' => ['nullable', 'string', 'max:500'],
                'excerpt' => ['nullable', 'string', 'max:500'],
                'date' => ['required'],
                'type' => ['required'],
                'meta_title' => ['nullable', 'string', 'max:60'],
                'meta_description' => ['nullable', 'string', 'max:160'],
            ];

            if (!empty($request->type)) 
            {
                if ($request->type == "2") 
                {
                    $rules['content'] = ['required', 'string'];
                } 
                else 
                {
                    $rules['redirection'] = ['required', 'url'];
                }
                
            }

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required'
            ]);

            if ($validator->fails()) {
                return Response::json(
                    array(
                        'error' => true,
                        'sweeterror' => true,
                        'errors' => $validator->getMessageBag(),
                        'success' => false,
                        'msg' => "",
                    )
                );
            } else {
                DB::transaction(function () use ($request, $post) {
                    $featured_image = "";
                    $post_data = [];

                    if ($request->hasFile('featured_image')) {
                        $featured_image = fileupload($request->featured_image);
                        $post_data['featured_image'] = $featured_image;
                    }
                    $post_data['title'] = $request->title;
                    $post_data['content'] = $request->content ?? NULL;
                    $post_data['redirection'] = $request->redirection ?? NULL;
                    $post_data['image_caption'] = @$request->image_caption;
                    $post_data['excerpt'] = @$request->excerpt;
                    $post_data['slug'] = $request->slug;
                    $post_data['type'] = $request->type;
                    $post_data['meta_title'] = @$request->meta_title;
                    $post_data['meta_description'] = @$request->meta_description;
                    $post_data['published_on'] = DateTime::createFromFormat('m/d/Y g:i A', $request->date)->format('Y-m-d H:i:s');

                    Media::where(['id' => $post->id])->update($post_data);

                    MediaTag::where(['media_id' => $post->id])->delete();
                    if (!empty($request->tags)) 
                    {
                        foreach ($request->tags as $key => $value) 
                        {
                            MediaTag::create([
                                'media_id' => $post->id,
                                'tag_id' => $value,
                            ]);
                        }
                    }
                });

                Session::flash('success', 'Media Updated successfully!');
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => [],
                        'success' => true,
                        'route' => route('admin.media.index'),
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function imageupload(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            ]);

            if ($validator->fails()) {
                return Response::json(
                    array(
                        'error' => true,
                        'errors' => (isset (json_decode(json_encode($validator->getMessageBag()), true)['image'][0])) ? [] : $validator->getMessageBag(),
                        'success' => false,
                        'msg' => (isset (json_decode(json_encode($validator->getMessageBag()), true)['image'][0])) ? json_decode(json_encode($validator->getMessageBag()), true)['image'][0] : $validator->getMessageBag(),
                    )
                );
            } else {
                if ($request->hasFile('image')) {
                    $path = fileupload($request->image);
                }
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'data' => [
                                'path' => "/" . $path
                            ],
                        'msg' => "",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function status($id)
    {
        try {
            $media = Media::where(['id' => $id])->first();
            if ($media->status) {
                $status = "0";
            } else {
                $status = "1";
            }
            Media::where('id', $media->id)
                ->update([
                    'status' => $status
                ]);
            return Response::json(
                array(
                    'error' => false,
                    'errors' => NULL,
                    'success' => true,
                    'msg' => "Status changed successfully."
                )
            );
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
}

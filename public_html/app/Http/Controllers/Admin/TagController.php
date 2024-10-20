<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tag;
use DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Tag::orderBy('id', 'DESC');
                return Datatables::of($data)
                ->addIndexColumn()->editColumn('status', function ($row) {
                    if ($row->status == '1') {
                        $status = '<a href="' . route('admin.tag.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-success label-inline status-change">Active</a>';
                        return $status;
                    } else {
                        $status = '<a href="' . route('admin.tag.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-danger label-inline status-change">Inactive</a>';
                        return $status;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.tag.edit', ['tag' => $row->id]) . '" data-title="Tag Edit" class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link" title="Edit"><i class="far fa-edit icon-sm text-primary"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
            }
            $title = "Tags";
            return view('admin.tags.index', compact('title'));
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
            return view('admin.tags.create');
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
                'tag_name' => ['required', 'string', 'max:50'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required'
            ]);

            if ($validator->fails()) {
                return Response::json(
                    array(
                        'error' => true,
                        'errors' => $validator->getMessageBag(),
                        'success' => false,
                        'msg' => "",
                    )
                );
            } else {
                DB::transaction(function () use ($request) {
                    $data = [];
                    $data['tag_name'] = $request->tag_name;
                    $data['slug'] = $request->slug;
                    Tag::create($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Tag created successfully.",
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
            $tag = Tag::where('id',$id)->first();
            return view('admin.tags.create',compact('tag'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'tag_name' => ['required', 'string', 'max:50'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required'
            ]);

            if ($validator->fails()) {
                return Response::json(
                    array(
                        'error' => true,
                        'errors' => $validator->getMessageBag(),
                        'success' => false,
                        'msg' => "",
                    )
                );
            } else {
                DB::transaction(function () use ($request, $id) {
                    $data = [];
                    $data['tag_name'] = $request->tag_name;
                    $data['slug'] = $request->slug;
                    Tag::where('id', $id)->update($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Tag updated successfully.",
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

    public function status($id)
    {
        try {
            $tags = Tag::where(['id' => $id])->first();
            if ($tags->status) {
                $status = "0";
            } else {
                $status = "1";
            }
            Tag::where('id', $tags->id)
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

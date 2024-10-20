<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Category::with(['get_parent']);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('banner_image', function ($row) {
                        if (!empty($row->banner_image)) 
                        {
                            $btn = '<img src="' . asset($row->banner_image) . '" class="img-fluid rounded">';
                        }
                        else
                        {
                            $btn = '';
                        }
                        return $btn;
                    })
                    ->addColumn('image_path', function ($row) {
                        if (!empty($row->image_path)) 
                        {
                            $btn = '<img src="' . asset($row->image_path) . '" class="img-fluid rounded">';
                        }
                        else
                        {
                            $btn = '';
                        }
                        return $btn;
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('admin.category.edit', ['category' => $row->id]) . '" data-title="Category Edit" class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link" title="Edit"><i class="far fa-edit icon-sm text-primary"></i></a>';
                        return $btn;
                    })
                    ->addColumn('parent', function ($row) {
                        return $row->get_parent->name ?? "";
                    })
                    ->rawColumns(['banner_image', 'action', 'image_path'])
                    ->make(true);
            }
            $title = "Category";
            return view('admin.category.index', compact('title'));
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        try {
            return view('admin.category.create',compact('category'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:50'],
                'slug' => [
                    'required', 
                    'string', 
                    'max:50',
                    Rule::unique('categories')->ignore($category->id)
                ],
                'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
                'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
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
                DB::transaction(function () use ($request,$category) {
                    $data = [];
                    if ($request->hasFile('banner_image')) {
                        $data['banner_image'] = fileupload($request->banner_image);
                    }
                    if ($request->hasFile('image_path')) {
                        $data['image_path'] = fileupload($request->image_path);
                    }
                    $data['name'] = @$request->name;
                    $data['short_code'] = @$request->short_code;
                    $data['slug'] = @$request->slug;
                    $data['title'] = @$request->title;
                    $data['sub_title'] = @$request->sub_title;
                    $data['bolder_text'] = @$request->bolder_text;
                    $data['description'] = @$request->description;
                    $category->update($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Category updated successfully.",
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
    public function destroy(Category $category)
    {
        //
    }
}

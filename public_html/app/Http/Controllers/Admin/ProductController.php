<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;
use App\Models\ProductMatchingCode;
use Illuminate\Support\Facades\DB;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Product::with(['get_category','get_matching'])->orderBy('id', 'DESC');
                return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('thumbnail_img', function ($row) {
                //     $btn = '<img src="' . asset($row->thumbnail_img) . '" class="img-fluid rounded">';
                //     return $btn;
                // })
                ->addColumn('image1', function ($row) {
                    $btn = '<div class="listing-product "><img src="' . asset($row->image1) . '" class="img-fluid obj-cover rounded"></div>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.product.edit', ['product' => $row->id]) . '" data-title="Product Edit" class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link" title="Edit"><i class="far fa-edit icon-sm text-primary"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.product.destroy', ['product' => $row->id]) . '" class="btn btn-icon btn-light btn-hover-danger btn-xs mx-1 product-delete" title="Permanent Delete"><i class="far fa-trash-alt icon-sm text-danger"></i></a></span>';
                    return $btn;
                })
                ->editColumn('get_matching', function ($row) {
                    $btn = $row->get_matching()->pluck('name')->toArray();
                    return implode(', ', $btn);
                })
                ->rawColumns(['image1', 'action'])
                ->make(true);
            }
            $title = "Product";
            return view('admin.product.index', compact('title'));
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
            return view('admin.product.create', [
                'getCategoryData' => Category::getLastLevelCategoriescreate(),
                'getProductData' => Product::orderByDesc('id')->get(),
                'getSpecificationData' => Specification::where('status', 1)->orderByDesc('id')->get(),
            ]);
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
                'select_category' => ['required'],
                'name' => ['required', 'string', 'max:50'],
                'slug' => ['required', 'string', 'max:50'],
                'product_code' => ['required', 'string', 'max:50'],
                'matching_code_text' => ['nullable', 'string', 'max:50'],
                // 'matching_product_code' => ['required'],
                'specifications_id' => ['required'],
                'thumbnail_img' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
                'image1' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
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
                    if ($request->hasFile('thumbnail_img')) {
                        $data['thumbnail_img'] = fileupload($request->thumbnail_img);
                    }
                    if ($request->hasFile('image1')) {
                        $data['image1'] = fileupload($request->image1);
                    }
                    if ($request->hasFile('image2')) {
                        $data['image2'] = fileupload($request->image2);
                    }
                    if ($request->hasFile('image3')) {
                        $data['image3'] = fileupload($request->image3);
                    }
                    $data['select_category'] = $request->select_category;
                    $data['name'] = $request->name;
                    $data['matching_code_text'] = $request->matching_code_text ?? NULL;
                    $data['slug'] = $request->slug;
                    $data['product_code'] = $request->product_code;
                    // $data['matching_product_code'] = $request->matching_product_code;
                    $data['description'] = $request->description;
                    $getProductid = Product::create($data);

                    if(is_array($request->matching_product_code) && count($request->matching_product_code) > 0) {
                        foreach ($request->matching_product_code as $matching_product_code_value) {
                            ProductMatchingCode::create([
                                'product_id' => $getProductid->id,
                                'matching_product_id' => $matching_product_code_value,
                            ]);
                        }
                    }


                    foreach ($request->specifications_id as $specifications_idvalue) {
                        ProductSpecification::create([
                            'product_id' => $getProductid->id,
                            'specifications_id' => $specifications_idvalue,
                        ]);
                    }
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Product created successfully.",
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        try {
            return view('admin.product.create', [
                'getCategoryData' => Category::getLastLevelCategoriescreate(),
                'getProductData' => Product::where('id','!=',$product->id)->orderByDesc('id')->get(),
                'getSpecificationData' => Specification::where('status', 1)->orderByDesc('id')->get(),
                'selectedProductData' => $product->get_matching()->pluck('matching_product_id')->toArray(),
                'selectedSpecificationData' => $product->get_specification()->pluck('specifications_id')->toArray(),
                'product' => $product,
            ]);
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $rules = [
                'select_category' => ['required'],
                'name' => ['required', 'string', 'max:50'],
                'slug' => ['required', 'string', 'max:50'],
                'product_code' => ['required', 'string', 'max:50'],
                'matching_code_text' => ['nullable', 'string', 'max:50'],
                // 'matching_product_code' => ['required'],
                'specifications_id' => ['required'],
                'thumbnail_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
                'image1' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
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
                DB::transaction(function () use ($request,$product) {
                    $data = [];
                    if ($request->hasFile('thumbnail_img')) {
                        $data['thumbnail_img'] = fileupload($request->thumbnail_img);
                    }
                    if ($request->hasFile('image1')) {
                        $data['image1'] = fileupload($request->image1);
                    }
                    if ($request->hasFile('image2')) {
                        $data['image2'] = fileupload($request->image2);
                    }
                    if ($request->hasFile('image3')) {
                        $data['image3'] = fileupload($request->image3);
                    }
                    $data['select_category'] = $request->select_category;
                    $data['name'] = $request->name;
                    $data['matching_code_text'] = $request->matching_code_text ?? NULL;
                    $data['slug'] = $request->slug;
                    $data['product_code'] = $request->product_code;
                    $data['matching_product_code'] = $request->matching_product_code;
                    $data['description'] = $request->description;
                    $product->update($data);

                    ProductMatchingCode::where(['product_id' => $product->id])->delete();
                    if(is_array($request->matching_product_code) && count($request->matching_product_code) > 0) {
                        foreach ($request->matching_product_code as $matching_product_code_value) {
                            ProductMatchingCode::create([
                                'product_id' => $product->id,
                                'matching_product_id' => $matching_product_code_value,
                            ]);
                        }
                    }

                    ProductSpecification::where(['product_id' => $product->id])->delete();
                    foreach ($request->specifications_id as $specifications_idvalue) {
                        ProductSpecification::create([
                            'product_id' => $product->id,
                            'specifications_id' => $specifications_idvalue,
                        ]);
                    }
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Product updated successfully.",
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
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                ProductSpecification::where(['product_id' => $product->id])->delete();
                ProductMatchingCode::where(['product_id' => $product->id])->delete();
                $product->delete();
            });
            return Response::json(
                array(
                    'error' => false,
                    'errors' => null,
                    'success' => true,
                    'msg' => "Product deleted successfully.",
                )
            );
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
}

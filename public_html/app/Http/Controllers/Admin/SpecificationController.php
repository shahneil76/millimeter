<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use DataTables;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Specification::orderBy('id', 'DESC');
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image_path', function ($row) {
                        $btn = '<img src="' . asset($row->image_path) . '" class="img-fluid rounded">';
                        return $btn;
                    })
                    ->editColumn('status', function ($row) {
                        if ($row->status == '1') {
                            $status = '<a href="' . route('admin.specification.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-success label-inline status-change">Active</a>';
                            return $status;
                        } else {
                            $status = '<a href="' . route('admin.specification.status', ['id' => $row->id]) . '" class="cursor-pointer label label-md font-weight-bold label-light-danger label-inline status-change">Inactive</a>';
                            return $status;
                        }
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('admin.specification.edit', ['specification' => $row->id]) . '" data-title="Specification Edit" class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link" title="Edit"><i class="far fa-edit icon-sm text-primary"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['status', 'action', 'image_path'])
                    ->make(true);
            }
            $title = "Specifications";
            return view('admin.specification.index', compact('title'));
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
            return view('admin.specification.create');
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
                'name' => ['required', 'string', 'max:50'],
                'image_path' => ['required', 'image', 'mimes:png', 'max:1024'],
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
                    if ($request->hasFile('image_path')) {
                        $data['image_path'] = fileupload($request->image_path);
                    }
                    $data['name'] = $request->name;
                    Specification::create($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Specification created successfully.",
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
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        try {
            return view('admin.specification.create',compact('specification'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specification $specification)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:50'],
                'image_path' => ['nullable', 'image', 'mimes:png', 'max:1024'],
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
                DB::transaction(function () use ($request,$specification) {
                    $data = [];
                    if ($request->hasFile('image_path')) {
                        $data['image_path'] = fileupload($request->image_path);
                    }
                    $data['name'] = $request->name;
                    $specification->update($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "Specification updated successfully.",
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
    public function destroy(Specification $specification)
    {
        //
    }

    public function status($id)
    {
        try {
            $specification = Specification::where(['id' => $id])->first();
            if ($specification->status) {
                $status = "0";
            } else {
                $status = "1";
            }
            Specification::where('id', $specification->id)
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
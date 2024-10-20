<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContactUsChannelExport;
use App\Exports\ContactUsPartExport;
use App\Exports\WorkWithUsExport;
use App\Http\Controllers\Controller;
use App\Models\WorkWithUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\ContactUsChannel;
use App\Models\ContactUsPart;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ContactusController extends Controller
{
    public function contactUsChannel(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = ContactUsChannel::query();
                if (!empty($request->start_date)) {
                    $data = $data->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                }
                $data = $data->orderByDesc('id')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('admin.contactus.channel.delete', ['id' => $row->id]) . '" class="btn btn-icon btn-light btn-hover-danger btn-xs mx-1 delete-channel" title="Delete"><i class="far fa-trash-alt icon-sm text-danger"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            $title = "Channel Partner";
            return view('admin.contactus.contactUsChannel', compact('title'));
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function channelExport(Request $request)
    {
        try {
            $data = ContactUsChannel::orderByDesc('id');
            if (!empty($request->start_date)) {
                $data = $data->whereDate('created_at', '>=', $request->start_date)
                    ->whereDate('created_at', '<=', $request->end_date);
            }
            $data = $data->get();
            return Excel::download(new ContactUsChannelExport($data), 'channel-partner.xlsx');
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function partExport(Request $request)
    {
        try {
            $data = ContactUsPart::orderByDesc('id');
            if (!empty($request->start_date)) {
                $data = $data->whereDate('created_at', '>=', $request->start_date)
                    ->whereDate('created_at', '<=', $request->end_date);
            }
            $data = $data->get();
            return Excel::download(new ContactUsPartExport($data), 'part-of-our-journey.xlsx');
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function workWithUsExport(Request $request)
    {
        try {
            $data = WorkWithUs::orderByDesc('id');
            if (!empty($request->start_date)) {
                $data = $data->whereDate('created_at', '>=', $request->start_date)
                    ->whereDate('created_at', '<=', $request->end_date);
            }
            $data = $data->get();
            return Excel::download(new WorkWithUsExport($data), 'work-with-us.xlsx');
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }

    public function contactUsPart(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = ContactUsPart::query();
                if (!empty($request->start_date)) {
                    $data = $data->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                }
                $data = $data->orderByDesc('id')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('admin.contactus.part.delete', ['id' => $row->id]) . '" class="btn btn-icon btn-light btn-hover-danger btn-xs mx-1 delete-part" title="Delete"><i class="far fa-trash-alt icon-sm text-danger"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            $title = "Part Of Our Journey";
            return view('admin.contactus.contactUsPart', compact('title'));
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function workWithUs(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = WorkWithUs::query();
                if (!empty($request->start_date)) {
                    $data = $data->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                }
                $data = $data->orderByDesc('id')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('admin.work.with.us.delete', ['id' => $row->id]) . '" class="btn btn-icon btn-light btn-hover-danger btn-xs mx-1 delete-part" title="Delete"><i class="far fa-trash-alt icon-sm text-danger"></i></a>';
                        return $btn;
                    })
                    ->editColumn('cv', function ($row) {
                        $btn = '<a href="' . asset($row->cv) . '" download class="btn btn-icon btn-light btn-hover-success btn-xs mx-1" title="Download"><i class="fas fa-file-download
                        icon-sm text-success"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action','cv'])
                    ->make(true);
            }
            $title = "Work With Us";
            return view('admin.contactus.workWithUs', compact('title'));
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }

    public function contactUsChannelDelete($id)
    {
        try {
            $channel = ContactUsChannel::findOrFail($id);
            $channel->delete();
            return Response::json(
                array(
                    'error' => false,
                    'errors' => NULL,
                    'success' => true,
                    'msg' => "Deleted successfully."
                )
            );
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function workWithUsDelete($id)
    {
        try {
            $channel = WorkWithUs::findOrFail($id);
            $channel->delete();
            return Response::json(
                array(
                    'error' => false,
                    'errors' => NULL,
                    'success' => true,
                    'msg' => "Deleted successfully."
                )
            );
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }

    public function contactUsPartDelete($id)
    {
        try {
            $part = ContactUsPart::findOrFail($id);
            $part->delete();
            return Response::json(
                array(
                    'error' => false,
                    'errors' => NULL,
                    'success' => true,
                    'msg' => "Deleted successfully."
                )
            );
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
}

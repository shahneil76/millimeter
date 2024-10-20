<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function setting()
    {
        $title = "Setting";
        $data = Setting::where(['key' => 'home_video'])->first();
        $download_file = Setting::where(['key' => 'download_file'])->first();
        return view('admin.setting',compact('title','data','download_file'));
    }
    public function settingHomeVideo()
    {
        return view('admin.setting.home-video');
    }
    public function settingDownloadFile()
    {
        return view('admin.setting.download-file');
    }
    public function settingHomeVideoUpdate(Request $request)
    {
        try {
            $rules = [
                'video' => ['required', 'file', 'mimes:mp4', 'max:20480'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required',
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
                    if ($request->hasFile('video')) {
                        $data['value'] = "https://www.millimetre.com/".fileupload($request->video,"Yes");
                    }
                    Setting::where('key','home_video')->update($data);
                });
                Session::flash('success', 'Video Update successfully!');
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'route' => route('admin.setting'),
                        'msg' => "",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
    public function settingDownloadFileUpdate(Request $request)
    {
        try {
            $rules = [
                'file' => ['required', 'file', 'mimes:pdf,png,jpeg,jpg', 'max:20480'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required',
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
                    if ($request->hasFile('file')) {
                        $data['value'] = fileupload($request->file,"Yes");
                    }
                    Setting::where('key','download_file')->update($data);
                });
                Session::flash('success', 'Download File Update successfully!');
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'route' => route('admin.setting'),
                        'msg' => "",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e, 'admin');
        }
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\WorkWithUs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ContactUsChannel;
use App\Models\ContactUsPart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = Setting::where(['key' => 'home_video'])->first();
            return view('front.pages.index',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function about()
    {
        try {
            return view('front.pages.about');
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function blogs()
    {
        try {
            $data = Media::where(['type' => '2', 'status' => "1"])->orderBy('published_on','DESC')->get();
            return view('front.pages.blogs',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function publications()
    {
        try {
            $data = Media::where(['type' => '1', 'status' => "1"])->orderBy('published_on','DESC')->get();
            return view('front.pages.blogs',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function events()
    {
        try {
            $data = Media::where(['type' => '3', 'status' => "1"])->orderBy('published_on','DESC')->get();
            return view('front.pages.blogs',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function newsletters()
    {
        try {
            $data = Media::where(['type' => '4', 'status' => "1"])->orderBy('published_on','DESC')->get();
            return view('front.pages.blogs',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function tagBlogs($slug)
    {
        try {
            $tagId = Tag::where(['slug' => $slug])->value('id');
            $data = Media::with(['tags'])->whereHas('tags', function($q) use ($tagId){
                $q->where(['tag_id' => $tagId]);
            })->where(['status' => "1"])->get();
            return view('front.pages.blogs',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function blogView($slug)
    {
        try {
            $data = Media::with(['tags'])->where(['slug' => $slug])->first();
            return view('front.pages.blog_view',compact('data'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function blogDetails()
    {
        try {
            return view('front.pages.blog_details');
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function category($slug)
    {
        try {
            $category = Category::with(['get_parent','childs','childs.childs'])->where(['slug' => $slug])->first();
            return view('front.pages.category',compact('category'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function products($slug)
    {
        try {
            $category = Category::with(['get_parent','get_parent.get_parent','childs','childs.childs'])->where(['slug' => $slug])->first();
            $products = Product::with(['get_category'])->where(['select_category' => $category->id])->orderBy('position','ASC')->get();
            return view('front.product.list',compact('category','products'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function productDetails($slug)
    {
        try {
            $product = Product::with(['get_category','get_category.get_parent','get_matching','get_specification'])->where(['slug' => $slug])->first();
            // dd($product->toArray());
            return view('front.product.view',compact('product'));
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function contactUs()
    {
        try {
            return view('front.pages.contactus');
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function workWithUs()
    {
        try {
            return view('front.pages.workWithUs');
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function downloadContent()
    {
        try {
            return view('front.pages.downloadContent');
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function workWithUsSubmit(Request $request)
    {
        try {
            $rules = [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'phoneno' => ['required', 'numeric', 'digits:10'],
                'experience' => ['required', 'string', 'max:50'],
                'field' => ['required', 'string', 'max:50'],
                'education' => ['required', 'string', 'max:50'],
                'cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'Required',
                'cv.max' => 'File size must be less than 10Mb.'
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
                    $data['name'] = $request->name;
                    $data['email'] = $request->email;
                    $data['phoneno'] = $request->phoneno;
                    $data['experience'] = $request->experience;
                    $data['field'] = $request->field;
                    $data['education'] = $request->education;
                    if ($request->hasFile('cv')) {
                        $data['cv'] = fileupload($request->cv);
                    }
                    WorkWithUs::create($data);
                    Mail::send('emails.work_with_us', ['data' => $data], function ($message) use ($data) {
                        // $message->to("dev.vijaypanchal@gmail.com");
                        $message->to("hello@lamitude.com");
                        $message->subject('[MILLIMETRE] - WORK WITH US');
                        $message->attach(public_path($data['cv']));
                    });
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "your request submitted successfully.",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }
    public function contactUsPart(Request $request)
    {
        try {
            $rules = [
                'part_name' => ['required'],
                'part_designation' => ['required', 'string', 'max:50'],
                'part_company' => ['nullable', 'string', 'max:50'],
                'part_city' => ['required', 'string', 'max:50'],
                'part_phoneno' => ['required', 'numeric', 'digits:10'],
                'part_email' => ['required', 'email'],
                'part_message' => ['required'],
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
                    $data['part_name'] = $request->part_name;
                    $data['part_designation'] = $request->part_designation;
                    $data['part_company'] = $request->part_company;
                    $data['part_city'] = $request->part_city;
                    $data['part_phoneno'] = $request->part_phoneno;
                    $data['part_email'] = $request->part_email;
                    $data['part_message'] = $request->part_message;
                    ContactUsPart::create($data);
                    Mail::send('emails.contact_us_part', ['data' => $data], function ($message) {
                        // $message->to("dev.vijaypanchal@gmail.com");
                        $message->to("hello@lamitude.com");
                        $message->subject('[MILLIMETRE] - CONTACT US INQUIRY');
                    });
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "your request submitted successfully.",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function contactUsChannel(Request $request)
    {
        try {
            $rules = [
                'channel_name' => ['required'],
                'channel_designation' => ['required', 'string', 'max:50'],
                'channel_company' => ['nullable', 'string', 'max:50'],
                'channel_city' => ['required', 'string', 'max:50'],
                'channel_phoneno' => ['required', 'numeric', 'digits:10'],
                'channel_email' => ['required', 'email'],
                'channel_message' => ['required'],
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
                    $data['channel_name'] = $request->channel_name;
                    $data['channel_designation'] = $request->channel_designation;
                    $data['channel_company'] = $request->channel_company;
                    $data['channel_city'] = $request->channel_city;
                    $data['channel_phoneno'] = $request->channel_phoneno;
                    $data['channel_email'] = $request->channel_email;
                    $data['channel_message'] = $request->channel_message;
                    ContactUsChannel::create($data);
                });
                return Response::json(
                    array(
                        'error' => false,
                        'errors' => null,
                        'success' => true,
                        'msg' => "your request submitted successfully.",
                    )
                );
            }
        } catch (\Exception $e) {
            return catchReponse($e);
        }
    }

    public function productSearch(Request $request)
    {
        return Product::where(function($q) use ($request){
            $q->where('name', 'like', '%' . $request->term . '%')
            ->orWhere('product_code', 'like', '%' . $request->term . '%');
        })->get()->toArray();
    }
}

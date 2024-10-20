<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class FrontDataShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $general_categories = Category::whereNull('parent_id')->get();
        $download_file = Setting::where(['key' => 'download_file'])->first();;
        View::share('general_categories', $general_categories);
        View::share('download_file', $download_file);
        return $next($request);
    }
}

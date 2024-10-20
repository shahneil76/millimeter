<?php

use App\Models\Course;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Spatie\PdfToImage\Pdf;

function catchReponse($e, $type = NULL)
{
    Log::channel('cacheerror')->info(date('[Y-m-d H:i:s]') . " " . $e->getMessage());
    if (request()->ajax()) {
        return Response::json(
            array(
                'error' => true,
                'errors' => [
                        "error" => $e->getMessage(),
                    ],
                'success' => false,
                'data' => [],
                'msg' => "Something went wrong",
            )
        );
    } else {
        return redirect()->route('home')->with('danger', "Something went wrong (" . $e->getMessage() . ")");
    }
}

function fileupload($value, $rand = NULL, $dir = NULL)
{
    $imageName = $value->getClientOriginalName();

    $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
    $slug = Str::slug($fileNameWithoutExtension, '-');
    if (($rand != NULL) && $rand == "Yes") {
        $slug .= date('YmdHis') . '-' . env('APP_ENV');
    }

    $fileExtension = $value->getClientOriginalExtension();
    $imageName = $slug . '.' . $fileExtension;

    if (($dir != NULL)) {
        $directory = $dir . "/" . date('Y') . "/" . (date('m'));
    } else {
        $directory = "uploads/" . date('Y') . "/" . (date('m'));
    }

    // Check if a file with the same name already exists in the directory
    if (Storage::disk('public_upload')->exists($directory . '/' . $imageName)) {
        $extension = $value->getClientOriginalExtension();
        $basename = pathinfo($imageName, PATHINFO_FILENAME);
        $counter = 1;

        // Append a dynamic number to the filename until it's unique
        while (Storage::disk('public_upload')->exists($directory . '/' . $imageName)) {
            $imageName = $basename . '_' . $counter . '.' . $extension;
            $counter++;
        }
    }

    Storage::disk('public_upload')->putFileAs($directory, $value, $imageName, 'public');
    $path = $directory . '/' . $imageName;

    return $path;

    // $imageName = $value->getClientOriginalName();
    // Storage::disk('public_upload')->putFileAs("uploads/".date('Y')."/".((strlen(date('m') == "1")) ? "0".date('m') : date('m')), $value, $imageName, 'public');
    // $path = "uploads/".date('Y')."/".((strlen(date('m') == "1")) ? "0".date('m') : date('m'))."/".$imageName;
    // return $path;
}

function getCourses()
{
    return Course::where('status', '1')->get();
}

function truncateString($str, $maxLength = 120)
{
    if (strlen($str) <= $maxLength) {
        return $str;
    } else {
        return substr($str, 0, $maxLength - 3) . '...';
    }
}

function getExtensionFromUrl($url)
{
    // Parse the URL and get the path component
    $parsedUrl = parse_url($url, PHP_URL_PATH);

    // Use pathinfo to get the file extension
    $extension = pathinfo($parsedUrl, PATHINFO_EXTENSION);

    return $extension;
}

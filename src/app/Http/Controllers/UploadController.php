<?php

namespace App\Http\Controllers;

use App\Http\Requests\Upload as Request;

class UploadController extends Controller
{
    public function store(Request\Store $request)
    {
        $user = auth()->user();
        $directory = $user->id;
        $uploadedFile = $request->file('file');
        $path = \Storage::disk('s3')->putFile($directory, $uploadedFile, 'public');
        $uploadedUrl = \Storage::disk('s3')->url($path);

        return ['url' => $uploadedUrl];
    }
}

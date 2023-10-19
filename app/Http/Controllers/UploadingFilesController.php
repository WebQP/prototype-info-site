<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadingFilesController extends Controller
{
    public function uploadImageTiny(Request $request)
    {

        if ($request->hasFile('file')) {
            if ($request->file->isValid()) {
                $path = $request->file->store('/' . date('Y-m'));
                return response()->json(['location' => $path]);
            }
        }

        return response()->json(['error' => 'File not found.'], 400);
    }

    public function uploadImagePreview(Request $request)
    {

        if ($request->hasFile('file')) {
            if ($request->file->isValid()) {
                $path = $request->file->store('/' . date('Y-m'));
                return '/uploads/' . $path;
            }
        }

        return response()->json(['error' => 'File not found.'], 400);
    }
}

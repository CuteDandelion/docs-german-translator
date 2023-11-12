<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Storage;

class FileAccessController extends Controller
{
    public function show($userstore,$filename)
    {
        // Construct the path to the internal file
        $filePath = storage_path("uploads/$userstore/$filename");

        // Check if the file exists
        if (file_exists($filePath)) {
            // Serve the file using Laravel's response and file functions
            return response()->file($filePath);
        } else {
            return abort(404); // Handle file not found scenario
        }
    }
}

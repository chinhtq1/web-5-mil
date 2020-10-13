<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file| max: 20000',
        ]);

        $path = $request->file('file')->store('uploads/tinymce', 'public');
        return ['location' => Storage::url($path)];
    }
}

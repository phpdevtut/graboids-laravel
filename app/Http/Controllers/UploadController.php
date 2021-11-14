<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.content', [
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('upload.content');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $path = Storage::putFile('uploads', $request->file('file'));

        $file = new File();
        $file->filepath = $path;

        if (auth()->check()) {
            $file->user_id = auth()->id();
        }

        $file->save();

        return redirect()
            ->to(route('upload.index'))
            ->with('status', 'File uploaded!');
    }
}

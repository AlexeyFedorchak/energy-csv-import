<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Str;

class UserDownloadsController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('content.pages.downloads.index', compact('downloads'));
    }
}
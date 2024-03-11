<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Download;

class DownloadController extends Controller
{
    public function download(Request $request)
    {

        if($request->has('file') && $request->get('file')!=""){
            $file = $request->get('file');
            $f =$file;
            return response()->download(public_path($f));
            // Check if the file exists
            if (Storage::disk('public')->exists($f)) {
            
                return response()->download(storage_path('app/public/' . $file));
            } else {
                abort(404);
            }
        }else{
            $downloads = Download::all();
            
            return view('content.pages.downloads.index', compact('downloads'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Str;

class AdminDownloadsController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('content.pages.admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('content.pages.admin.downloads.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'explanation' => 'required',
            'files.*' => 'required|file', // Adjust the allowed file types
        ]);

        $download = new Download();
        $download->heading = $request->input('heading');
        $download->explanation = $request->input('explanation');

        // Handle multiple file uploads
        if ($request->hasFile('files')) {
            $filePaths = [];

            foreach ($request->file('files') as $file) {
                // Generate a folder name based on the heading
                $folderName = str::slug($request->input('heading')); // You can customize this as needed
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Store the file in the folder
                $file->storeAs("downloads/$folderName", $fileName, 'public');

                // Build the file path
                $filePaths[] = 'storage/downloads/' . $folderName . '/' . $fileName;
            }

            $download->file_paths = $filePaths;
        }

        $download->save();

        return redirect('/admin/downloads')->with('success', 'Downloads added successfully.');
    }

    public function edit($id)
    {
        $download = Download::findOrFail($id);
        return view('content.pages.admin.downloads.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for updating downloads
        $request->validate([
            'heading' => 'required',
            'explanation' => 'required',
        ]);

        $download = Download::findOrFail($id);
        $download->heading = $request->input('heading');
        $download->explanation = $request->input('explanation');

        // Handle file upload for updates (if needed)
        if ($request->hasFile('files')) {
            // Handle file upload code here
        }

        $download->save();

        return redirect('/admin/downloads')->with('success', 'Download updated successfully.');
    }

    public function destroy($id)
    {
        $download = Download::findOrFail($id);
        $download->delete();

        return redirect('/admin/downloads')->with('success', 'Download deleted successfully.');
    }
    public function userindex()
    {
        $downloads = Download::all();
        return view('content.pages.downloads.index', compact('downloads'));
    }
    
}

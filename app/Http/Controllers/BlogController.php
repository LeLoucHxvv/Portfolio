<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $profile = Profile::all()->first();
        $blog = Blog::first();
        return view('menu.blog.index')->with([
            'profile' => $profile,
            'blog' => $blog
        ]);
    }

    // public function destroy($id)
    // {
    //     $blog = Blog::findOrFail($id);
    //     $blog->delete();

    //     return response()->json(['success' => '<strong>' . $blog->file_path . '</strong> has been deleted successfully!']);
    // }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the file from storage if it exists
        if ($blog->file_path && Storage::disk('public')->exists($blog->file_path)) {
            Storage::disk('public')->delete($blog->file_path);
        }

        // Delete the record from the database
        $blog->delete();

        return response()->json(['success' => '<strong>' . $blog->file_path . '</strong> has been deleted successfully!']);
    }


    public function showfile()
    {
        $blog = Blog::all()->first();
        $filePath = storage_path('app/public/' . $blog->file_path);
        return response()->file($filePath, ['content-type' => 'application/pdf']);
    }

    public function store(Request $request)
    {

        // Check if a PDF file already exists
        $blog = Blog::first();

        // If a PDF file already exists, redirect back with an error message
        if ($blog) {
            return redirect()->back()->with('error', 'You can only upload one PDF file.');
        }

        // Validate the uploaded file
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ], [
            'pdf_file.required' => 'The pdf field is required.' // Max file size: 2MB
        ]);

        $pdf = $request->file('pdf_file');

        // Get the original name of the file
        $originalName = $pdf->getClientOriginalName();

        // Generate a unique file name using Laravel's Str class
        $fileName = Str::random(20) . '_' . $originalName;

        // Move the uploaded file to a folder within the public directory (you can adjust this as needed)
        $filePath = $pdf->storeAs('', $fileName, 'public');

        // Save file information to the database
        $pdfRecord = new Blog();
        $pdfRecord->$originalName; // Store the original file name in the database
        $pdfRecord->file_path = $fileName; // Store the unique file name in the database
        $pdfRecord->file_path = $filePath;
        $pdfRecord->save();

        return redirect()->back()->with('success', 'PDF uploaded successfully.');
    }
}
// public function store(Request $request)
    // {
    //     // Validate the uploaded file
    //     $request->validate([
    //         'pdf_file' => 'required|mimes:pdf|max:2048', // Assuming PDF files are being uploaded
    //     ]);

    //     // Get the original name of the file
    //     $originalName = $request->file('pdf_file')->getClientOriginalName();

    //     // Generate a unique file name using Laravel's Str class
    //     $fileName = Str::random(20) . '_' . $originalName;

    //     // Store the uploaded file with the original name
    //     $filePath = $request->file('pdf_file')->storeAs('uploads', $fileName); // 'uploads' is the directory within 'storage/app'

    //     // Create a new blog record in the database
    //     $blog = new Blog();
    //     $blog->file_path = $fileName; // Store the file name in the database
    //     $blog->save();

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'PDF uploaded successfully.');
    // }

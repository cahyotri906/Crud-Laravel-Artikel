<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua data artikel
        $artikel = Artikel::all();

        // return view dan mengirimkan data artikel
        return view('user.dashboard', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'ini function show dari DashboardController dengan id ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.edit-artikel', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // mencari data artikel berdasarkan id
        $artikel = Artikel::find($id);

        // Validate the form data
        $request->validate([
            'judul' => 'required|max:255',
            'tanggal' => 'required|date',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for the thumbnail
            'isi' => 'required',
        ]);

        // Handle the thumbnail update (if provided)
        if ($request->hasFile('thumbnail')) {
            // Move the new thumbnail to the public folder
            $request->file('thumbnail')->move(public_path('thumbnail'), $request->file('thumbnail')->getClientOriginalName());
            // Update the thumbnail field in the database with the new filename
            $artikel->thumbnail = $request->file('thumbnail')->getClientOriginalName();
        }

        // Update the other fields
        $artikel->judul = $request->judul;
        $artikel->tanggal = $request->tanggal;
        $artikel->thumbnail = $request->thumbnail;
        $artikel->isi = $request->isi;

        // Save the changes to the database
        $artikel->save();

        // Redirect back to the article list or any other appropriate page
        return redirect('/admin/artikel')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus artikel berdasarkan id
        Artikel::destroy($id);
        // redirect ke halaman artikel
        return redirect('/admin/artikel');
    }
}

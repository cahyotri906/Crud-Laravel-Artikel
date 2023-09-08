<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua data artikel
        // Eloquent ORM
        // select * from artikel
        $artikel = Artikel::all();
        

        // return data ke view dan mengirimkan variabel artikel
        return view('admin.artikel', [
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
        // ambil request thumbnail dari form pindahkan ke folder public/thumbnail
        $request->thumbnail->move(public_path('thumbnail'), $request->thumbnail->getClientOriginalName());
        // membuat slug dari judul
        $slug = Str::slug($request->judul, '-');
        // simpan ke dalam database
        Artikel::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'thumbnail' => $request->thumbnail->getClientOriginalName(),
            'slug' => $slug,
            'isi' => $request->isi,
        ]);
        // redirect ke halaman artikel
        return redirect('/admin/artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mencari data artikel berdasarkan id
        $artikel = Artikel::find($id);
        // return data ke view dan mengirimkan variabel artikel
        return response()->json($artikel);

        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // mencari data artikel berdasarkan id
        $artikel = Artikel::find($id);
        //
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

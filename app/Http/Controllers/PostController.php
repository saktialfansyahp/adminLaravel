<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'cover' => 'required|image',
            'terbit' => 'required',
            'kategori_1' => 'required',
            'kategori_2' => 'required',
            'rating' => 'required|numeric',
            'jenis' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'isi' => 'required|mimes:pdf|max:20000',
        ]);

        $posts = new Post;

        if ($request->hasFile('cover')) {
            $path = Storage::putFile('public', $request->file('cover'));
            $posts->cover = $path;
        }

        if ($request->hasFile('isi')) {
            $path2 = Storage::putFile('public', $request->file('isi'));
            $posts->isi = $path2;
        }

        $posts->judul = $request->judul;
        $posts->terbit = $request->terbit;
        $posts->kategori_1 = $request->kategori_1;
        $posts->kategori_2 = $request->kategori_2;
        $posts->rating = $request->rating;
        $posts->jenis = $request->jenis;
        $posts->penulis = $request->penulis;
        $posts->deskripsi = $request->deskripsi;

        $posts->save();

        return redirect()->route('posts.index')->with('success', 'Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'terbit' => 'required',
            'kategori_1' => 'required',
            'kategori_2' => 'required',
            'rating' => 'required',
            'jenis' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('cover')) {
            $request->validate([
                'cover' => 'image|mimes:jpg,png,svg|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($post->cover) {
                Storage::delete($post->cover);
            }
            $path = Storage::putFile('public', $request->file('cover'));
            $post->cover = $path;
        }

        if ($request->hasFile('isi')) {
            $request->validate([
                'isi' => 'required|mimes:pdf|max:20000',
            ]);

            // Hapus file isi lama jika ada
            if ($post->isi) {
                Storage::delete($post->isi);
            }

            $path2 = Storage::putFile('public/files', $request->file('isi'));
            $post->isi = $path2;
        }

        $post->judul = $request->judul;
        $post->terbit = $request->terbit;
        $post->kategori_1 = $request->kategori_1;
        $post->kategori_2 = $request->kategori_2;
        $post->rating = $request->rating;
        $post->jenis = $request->jenis;
        $post->penulis = $request->penulis;
        $post->deskripsi = $request->deskripsi;

        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index');
    }
}

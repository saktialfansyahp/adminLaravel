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
            'cover' => 'required',
            'terbit' => 'required',
            'kategori_1' => 'required',
            'kategori_2' => 'required',
            'rating' => 'required|numeric',
            'deskripsi' => 'required',
            'isi' => 'required',
        ]);

        $posts = new Post;
        $name = "cover";

        $path = Storage::putFile('public', $request->file('cover'), $name);
        $posts->cover = $path;
        // if($request->hasFile('cover')){

        //     // $path = $request->file('cover')->store('public/image');
        // }

        if($request->hasFile('isi')){
            $request->validate([
                'isi' => 'required|mimes:pdf|max:20000',
            ]);

            $path2 = $request->file('file')->store('public/files');
            $post->file = $path2;
        }

        $posts->judul = $request->judul;
        $posts->terbit = $request->terbit;
        $posts->kategori_1 = $request->kategori_1;
        $posts->kategori_2 = $request->kategori_2;
        $posts->rating = $request->rating;
        $posts->deskripsi = $request->deskripsi;
        $posts->cover = $request->cover;
        $posts->isi = $request->isi;

        $posts->save();

        return redirect()->route('posts.index')->with('success','created successfully.');
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
            'deskripsi' => 'required',
        ]);

        $post = Post::find($id);

        if($request->hasFile('cover')){
            $request->validate([
                'cover' => 'required|image|mimes:jpg,png,svg|max:2048',
            ]);

            $path = $request->file('image')->store('public/image');
            $post->cover = $path;
        }

        if($request->hasFile('isi')){
            $request->validate([
                'isi' => 'required|mimes:pdf|max:20000',
            ]);

            $path2 = $request->file('file')->store('public/files');
            $post->file = $path2;
        }

        $post->judul = $request->judul;
        $post->terbit = $request->terbit;
        $post->kategori_1 = $request->kategori_1;
        $post->kategori_2 = $request->kategori_2;
        $post->rating = $request->rating;
        $post->deskripsi = $request->deskripsi;
        $post->save();

        return Redirect::route('posts.index');
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

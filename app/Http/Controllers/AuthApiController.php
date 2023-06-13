<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);

        // Return an error response if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        $data = $user;
        // Return a success response with the JWT token
        // return response()->json([
        //     'data' => $data,
        //     'status'
        // ], 201);
        return response()->json([
            'status' => 'Success',
            'data' => $data,
        ]);
    }

    public function login(){
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);
        if(!$token){
            return response()->json(['status'=>'Unauthorized'], 401);
        }
        $data = auth()->user();

        $user = Auth::user();
        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'status' => 'Success',
            'data' => $data,
            'access_token' => $token,
        ]);
    }

    public function logout(){
        $user = Auth::user();

        if ($user) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function dataUser(){
        $users = User::all();

        return response()->json($users);
    }

    public function dataEbook(){
        $posts = Post::all();

        $posts->transform(function ($post) {
            $post->image_url = Storage::url($post->cover); // Menambahkan URL gambar ke dalam model Post
            $post->pdf_url = Storage::url($post->isi); // Menambahkan URL gambar ke dalam model Post
            return $post;
            Log::info($post->image_url);
        });
        return response()->json($posts)->header('Access-Control-Allow-Origin', '*');
    }

    public function createWishlist(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
            'post_id' => 'required|string',
        ]);

        // Return an error response if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new user record
        $user = Wishlist::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);

        return response()->json($user);
    }

    public function getWishById($id){
        $data = Wishlist::with('user','post')->where('user_id', $id)->get();
        // $data = ;
        return response()->json($data);
    }

    public function destroy(Request $request){
        $data = Wishlist::where('user_id', $request->user_id)->where('post_id', $request->post_id)->first();
        $data->delete();
        // $data = ;
        return response()->json($data);
    }
}

<?php

namespace App\Http\UserEbookControllers\API;

use App\Models\UserEbook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data = UserEbook::all();

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            // Add validation rules for other fields
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = UserEbook::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            // Set values for other fields
        ]);

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = UserEbook::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            // Add validation rules for other fields
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = UserEbook::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $data->firstname = $request->input('firstname');
        $data->lastname = $request->input('lastname');
        $data->username = $request->input('username');
        $data->email = $request->input('email');
        // Set values for other fields
        $data->save();

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UserEbook::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}


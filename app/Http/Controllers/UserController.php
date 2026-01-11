<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            if ($request->hasFile('image')) {
                $update = User::find($user->id);
                $update->image = upload('user', $user->id, $request->image, false, 10);
                $update->update();

                if (!$update) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Error simpan gambar'
                    ], 400);
                }
            }

            return $user;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'false' ,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $user = User::find($id);
         return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->address = $request->address;
            if ($request->hasFile('image')) {
                destroy('user', $user->id, $user->image);
                $user->image = upload('user', $user->id, $request->image, false, 10);
                $user->update();

                if (!$user) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Error simpan gambar'
                    ], 400);
                }
            }

            $user->save();
            return $user;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'false' ,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = User::find($id);
       $user->delete();
       return response()->json([
            'message' => 'Delete berhasil'
        ]);
    }
}

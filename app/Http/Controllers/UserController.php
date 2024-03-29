<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateLocationsRequest;
use App\Http\Resources\UserCollection;
use App\Filters\UserFilter;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserFilter();
        $queryItems = $filter->transform($request);
        $user = User::where($queryItems);
        return new UserCollection($user->paginate()->appends($request->query()));
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
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationsRequest $request, User $user)
    {
        // $user->update($request->all());

        if($request->role) {
            User::where('id', $user->id)->update(['role' => $request->role]);
        }

        // if($request->email) {
        //     DB::table('profiles')->update(['name' => $request->name, 'email' => $request->email]);
        // } else {
        //     DB::table('profiles')->update(['name' => $request->name]);
        // }

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new UserResource($user),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {   
        User::where('id', $user->id)->delete();
        return true;
    }
}

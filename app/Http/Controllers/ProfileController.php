<?php

namespace App\Http\Controllers;

use App\Filters\ProfileFilter;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProfileFilter();
        $queryItems = $filter->transform($request);
        $location = Profile::where($queryItems);
        return new ProfileCollection($location->paginate()->appends($request->query()));
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
    public function store(StoreProfileRequest $request)
    {
        return new ProfileResource(Profile::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        try {
            $profile = Profile::where('user_id', $userId)->firstOrFail();
            return ApiResponse::success('Profile obtained', 200, $profile);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Profile not found: '.$e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        DB::table('profiles')->update(['profile_img' => $request->profileImg, 'description' => $request->description, 'website' => $request->website, 'facebook' => $request->facebook, 'instagram' => $request->instagram, 'twitter' => $request->twitter, 'youtube' => $request->youtube]);

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new ProfileResource($profile),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

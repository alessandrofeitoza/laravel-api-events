<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends ApiController
{
    public function index()
    {
        $profiles = Profile::all();
        return response()->json($profiles, 200);
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'description' => 'required|string',
        ]);
    
        $profile = Profile::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    
        return response()->json($profile, 201);
    }
    

    public function update(Request $request, $id)
    {


        $profile = Profile::findOrFail($id);
        $profile->update($request->all());
        return response()->json($profile, 200);
    }

    public function delete($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json(null, 204);
    }
}

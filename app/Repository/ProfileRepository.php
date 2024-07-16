<?php

namespace App\Repository;

use App\Models\Profile;

class ProfileRepository
{
    public function all()
    {
        return Profile::all();
    }

    public function find($id)
    {
        return Profile::findOrFail($id);
    }

    public function create(array $data)
    {
        return Profile::create($data);
    }

    public function update(array $data, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($data);
        return $profile;
    }

    public function delete($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
    }
}

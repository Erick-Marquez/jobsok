<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getAllUsers()
    {
        return User::all();
    }

    public function findUser(int $id)
    {
        return User::find($id);
    }

    public function findWithCity(int $id)
    {
        return User::with('city')->firstOrFail();
    }

    public function findUserRecommendations(int $id)
    {
        $user = User::with('recommendations')->where('id', $id)->firstOrFail();
        return $user->recommendations;
    }

    public function updateRecommendation(int $id)
    {
        $user = User::with('recommendations')->where('id', $id)->firstOrFail();
        return $user->recommendations;
    }

    public function findUserCity(int $id)
    {
        $user = User::findOrFail($id);
        return $user->city_id;
    }

    public function getUserPreference(int $id)
    {
        $user = User::where('id', $id)
            ->with(['recommendations' => function ($query){
                    $query->orderBy('quantity', 'DESC');
                }])
            ->firstOrFail();

        return isset($user->recommendations[0]->id) ? $user->recommendations[0]->id : null;
    }
    
}
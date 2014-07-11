<?php namespace Larabook\Users;

use Illuminate\Support\Facades\Mail;

class UserRepository {

    /**
     * Save a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }
} 
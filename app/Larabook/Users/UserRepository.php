<?php namespace Larabook\Users;

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

    /**
     * @param int $amount
     */
    public function getPaginated($amount = 25)
    {
        return User::orderBy('username', 'asc')->paginate($amount);
    }

    /**
     * Find a user by there username
     * 
     * @param  string $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query)
        {   
            $query->latest();
        }])->whereUsername($username)->first();
        
    }
}
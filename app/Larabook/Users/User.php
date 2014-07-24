<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;


    protected $fillable = ['username', 'email', 'password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Presenter to be used
     *
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Make sure password is hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Register user.
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        // Create a new user using current class (User).
        $user = new static(
            compact('username', 'email', 'password')
        );

        // Raise a new UserRegistered event.
        $user->raise(new UserRegistered($user));

        // Return the user object
        return $user;
    }

    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    public function is(User $user)
    {
        return $this->username == $user->username;
    }

}

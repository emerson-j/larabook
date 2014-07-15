<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Get the form input
        $input = Input::only('email', 'password');

        // Validate form input
        $this->signInForm->validate($input);

        if(Auth::attempt($input))
        {
            Flash::message('Welcome back!');
            return Redirect::intended('statuses');
        }

	}


    public function destroy()
    {
        Auth::logout();
        Flash::message('You are now logged out!');
        return Redirect::home();
    }
}

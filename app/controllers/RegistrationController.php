<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends BaseController {

    use CommandBus;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;


    /**
     * @param CommandBus $commandBus
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm) {
        $this->registrationForm = $registrationForm;
    }

    /**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


    /**
     * Add a new user
     *
     * @return string
     */
    public function store()
    {

        // Validate the users input with validate function in RegistrationForm
        $this->registrationForm->validate(Input::all());

        // Extract the form data into individual variables.
        extract(Input::only('username', 'email', 'password'));

        // Execute function from CommandBus class.
        $user = $this->execute(new RegisterUserCommand($username, $email, $password));

        // Log the newly registered user in.
        Auth::login($user);

        // Store flash message
        Flash::success('Thanks for registering!');

        // Return home.
        return Redirect::home();


    }



}

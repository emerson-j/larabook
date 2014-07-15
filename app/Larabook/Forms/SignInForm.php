<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;


class SignInForm extends FormValidator {

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'required',
        'password' => 'required'
    ];

}
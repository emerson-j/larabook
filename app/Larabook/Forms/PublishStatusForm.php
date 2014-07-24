<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;


class PublishStatusForm extends FormValidator {

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required'
    ];

}
<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($event)
{
    // Email the new user with the email from the UserRegistered event
    Mail::send('emails.welcome', [], function($message) use ($event)
    {
        $message->to($event->user->email, $event->user->email)
            ->subject('Welcome to Larabook')
            ->from('jack-emerson@outlook.com', 'Jack Emerson');
    });
});

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/*
 * Registration
 */
Route::get("register", [
   'as' => 'register_path',
   'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);
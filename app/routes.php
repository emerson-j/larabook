<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($event)
{
    Mail::send('emails.welcome', [], function($message) use ($event)
    {
        $message->to($event->user->email, 'Larabook')->subject('Welcome to Larabook');
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
<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($event)
{
    // Email the new user with the email from the UserRegistered event
   /* Mail::send('emails.welcome', [], function($message) use ($event)
    {
        $message->to($event->user->email, $event->user->email)
            ->subject('Welcome to Larabook')
            ->from('jack-emerson@outlook.com', 'Jack Emerson');
    });*/
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

/**
 * Sessions
 */

Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

/**
 * Statuses
 */
Route::get('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@index'
]);
Route::post('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@store'
]);

/**
 * Users
 */
Route::get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);


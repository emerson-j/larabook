<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{

    /**
     * Display the user gravatar
     *
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{{ $email }}?size={$size}";
    }

}
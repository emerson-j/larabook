<?php namespace Larabook\Statuses\Events;

use Larabook\Statuses\Status;

class StatusWasPublished {

    /**
     * @var \Larabook\Users\User
     */
    public $body;


    /**
     * @param User $user
     */
    function __construct($body)
    {
        $this->body = $body;
    }


}
<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{

    /**
     * Time since published
     *
     * @return mixed
     */
    public function time()
    {
        return $this->created_at->diffForHumans();
    }

}
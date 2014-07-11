<?php namespace Larabook\Core;

use App;

trait CommandBus {

    /**
     * Execute command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * @return mixed
     */
    public function getCommandBus() {
        return App::make('Laracasts\Commander\CommandBus');
    }


} 
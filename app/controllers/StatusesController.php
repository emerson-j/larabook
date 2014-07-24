<?php

use Larabook\Core\CommandBus;
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

class StatusesController extends \BaseController {

    use CommandBus;

    protected $statusRepository;

    protected $publishStatusForm;

    function __construct(StatusRepository $statusRepository, PublishStatusForm $publishStatusForm)
    {
    		$this->publishStatusForm = $publishStatusForm;
        $this->statusRepository = $statusRepository;

    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getAllForUser(Auth::user());
		return View::make('statuses.index', compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->publishStatusForm->validate(Input::only('body'));

		$this->execute(
            new PublishStatusCommand(Input::get('body'), Auth::user()->id)
        );
        Flash::message('Your status has been posted.');
        return Redirect::back();

	}


}

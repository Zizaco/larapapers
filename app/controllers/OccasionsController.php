<?php

class OccasionsController extends \BaseController {

	protected $occasionRepo;

    function __construct( \OccasionRepository $occasionRepo )
    {
        $this->occasionRepo = $occasionRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = Input::get('page');

        $occasions = $this->occasionRepo->search( Input::get('search'), Input::get('deactivated') );
        $total_pages = $this->occasionRepo->pageCount( $occasions );
        $occasions = $this->occasionRepo->paginate( $occasions, $page );

        $viewData = [
            'occasions' => $occasions,
            'page' => $page,
            'total_pages' => $total_pages,
        ];

        return View::make('occasions.index', $viewData);
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php

class DetailsController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$details = Auth::user()->details;
		
		return View::make('details.index', compact('details'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return View::make('details.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$payload = Input::all();
		$validation = Validator::make($payload, Detail::$rules);
		if($validation->fails())
		{
			
			return Redirect::to('details/create')
				->withErrors($validation);
				
		} 

		$detail = new Detail;
		$detail->firstname = Input::get('firstname');
		$detail->lastname    = Input::get('lastname');
		$detail->nickname = Input::get('nickname');
		$detail->phonenumber    = Input::get('phonenumber');
		$detail->age    = Input::get('age');
		$user = Auth::user();
		$detail = $user->details()->save($detail);

		//Auth::login($user);
		return Redirect::route('details.index');

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
		
		$details = Detail::find($id);
		
		return View::make('details.edit')->with('details',$details);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$detail = Detail::find($id);
		$detail->firstname = Input::get('firstname');
		$detail->lastname    = Input::get('lastname');
		$detail->nickname = Input::get('nickname');
		$detail->phonenumber    = Input::get('phonenumber');
		$detail->age    = Input::get('age');
		$detail->save();
						// redirect
		return Redirect::route('details.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$details = Detail::find($id);
		$details->delete();
		// redirect
		return Redirect::route('details.index');
	}


}

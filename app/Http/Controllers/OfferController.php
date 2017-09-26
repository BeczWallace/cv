<?php namespace App\Http\Controllers;

use Auth;
use Icon;
use Input;
use Redirect;
use Offer;

class OfferController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $curr_page = [
          'title' => 'Offers',
          'sub'   => 'Edit what you offer',
          'icon'  => 'fa-briefcase',
        ];
        
        return view('admin/offer', ['user' => Auth::user(), 'curr_page' => $curr_page, 'icons' => Icon::all()]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        $offer = Offer::find($id);

        if ($offer) {
            $offer->title = Input::get('title');
            $offer->icon = Input::get('icon');
            $offer->description = Input::get('description');
            $offer->full_description = Input::get('full_description');
            $offer->save();

            return Redirect::to('offer')->with('success', 'You\'ve successfuly modified offer');
        } else {
            return Redirect::to('offer')->with('error', 'Something went wrong');
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        
    }
}

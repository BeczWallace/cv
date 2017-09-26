<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use SocialProfile;

class SocialProfileController extends Controller
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
        return Redirect::to('social/' . Auth::user()->socialProfiles->first()->id . '/edit');
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
        $curr_page = [
          'title' => 'Social profiles',
          'sub'   => 'Edit your social profiles links',
          'icon'  => 'fa-share-alt',
        ];
        $socials = SocialProfile::find($id);

        return view('admin/social', ['user' => Auth::user(), 'curr_page' => $curr_page, 'socials' => $socials]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        $socials = SocialProfile::find($id);
        $socials->facebook = Input::get('facebook');
        $socials->dribble = Input::get('dribble');
        $socials->flickr = Input::get('flickr');
        $socials->linkedin = Input::get('linkedin');
        $socials->pinterest = Input::get('pinterest');
        $socials->dropbox = Input::get('dropbox');
        $socials->instagram = Input::get('instagram');
        $socials->twitter = Input::get('twitter');
        $socials->google_plus = Input::get('google_plus');
        $socials->save();

        return Redirect::to('social/' . $id . '/edit')->with('success', 'You\'ve successfuly updated your social profiles');
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

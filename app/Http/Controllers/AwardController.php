<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Award;
use Icon;

class AwardController extends Controller
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
            'title' => 'Awards',
            'sub'   => 'Show of your achievments',
            'icon'  => 'fa-trophy',
        ];
        
        return view('admin/award', ['user' => Auth::user(), 'curr_page' => $curr_page, 'icons' => Icon::all()]);
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
        $award = new Award;
        $award->user_id = Auth::user()->id;
        $award->title = Input::get('title');
        $award->description = Input::get('description');
        $award->date = Input::get('date-new');
        $award->icon = Input::get('icon');
        $award->save();

        if ($award->id) {
            return Redirect::to('award')->with('success', 'You\'ve successfuly added new award');
        } else {
            return Redirect::to('award')->with('error', 'Something went wrong');
        }
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
        $award = Award::find($id);
        if ($award) {
            $award->title = Input::get('title');
            $award->description = Input::get('description');
            $award->date = Input::get('date');
            $award->icon = Input::get('icon');
            $award->save();

            return Redirect::to('award')->with('success', 'You\' ve successfuly updated award');
        } else {
            return Redirect::to('award')->with('error', 'Something went wrong');
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
        $award = Award::find($id);
        if ($award) {
            $award->delete();
            return json_encode(['success' => 'You have successfuly deleted award']);
        } else {
            return json_encode(['error' => 'Something went wrong']);
        }
    }
}

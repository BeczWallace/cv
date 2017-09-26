<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Skill;

class SkillController extends Controller
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
            'title' => 'Skills',
            'sub'   => 'Show of your skills',
            'icon'  => 'fa-align-left',
        ];
        
        return view('admin/skills', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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
        $skill = new Skill;
        $skill->user_id = Auth::user()->id;
        $skill->name = Input::get('name');
        $skill->percentage = Input::get('percentage');
        $skill->save();

        if ($skill->id) {
            return Redirect::to('skill')->with('success', 'You\'ve successfuly added new skill');
        } else {
            return Redirect::to('skill')->with('error', 'Something went wrong');
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
        $skill = Skill::find($id);
        if ($skill) {
            $skill->name = Input::get('name');
            $skill->percentage = Input::get('percentage');
            $skill->save();

            return Redirect::to('skill')->with('success', 'You\' ve successfuly updated skill');
        } else {
            return Redirect::to('skill')->with('error', 'Something went wrong');
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
        $skill = Skill::find($id);
        if ($skill) {
            $skill->delete();
            return json_encode(['success' => 'You have successfuly deleted skill']);
        } else {
            return json_encode(['error' => 'Something went wrong']);
        }
    }
}

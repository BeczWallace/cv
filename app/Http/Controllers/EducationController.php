<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Education;

class EducationController extends Controller
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
            'title'     => 'Education',
            'sub'       => 'Prove your skills',
            'icon'      => 'fa-book',
        ];

        return view('admin/education-list', ['user' => Auth::user(), 'education' => [], 'curr_page' => $curr_page]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $curr_page = [
            'title'     => 'New Education',
            'sub'       => 'Prove your skills',
            'icon'      => 'fa-book',
        ];

        return view('admin/education', ['user' => Auth::user(), 'education' => [], 'curr_page' => $curr_page]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $education = new Education;
        $education->user_id = Auth::user()->id;
        $education->title = Input::get('title');
        $education->school = Input::get('school');
        $education->type = Input::get('type');
        $education->description = Input::get('description');
        $education->graduation = Input::get('graduation');
        $education->save();

        if ($education->id) {
            return Redirect::to('education')->with('success', 'You\'ve successfuly added education');
        } else {
            return Redirect::to('education/create')->with('error', 'Something went wrong');
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
        $curr_page = [
            'title'     => 'Education',
            'sub'       => 'Prove your skills',
            'icon'      => 'fa-book',
        ];

        return view('admin/education', ['user' => Auth::user(), 'education' => Education::find($id), 'curr_page' => $curr_page]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        $education = Education::find($id);

        if ($education) {
            $education->title = Input::get('title');
            $education->school = Input::get('school');
            $education->type = Input::get('type');
            $education->description = Input::get('description');
            $education->graduation = Input::get('graduation');
            $education->save();

            return Redirect::to('education')->with('success', 'You\'ve successfuly updated education');
        } else {
            return Redirect::to('education')->with('error', 'Something went wrong');
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
        $education = Education::find($id);

        if ($education) {
            $education->delete();

            return Redirect::to('education')->with('success', 'You\'ve successfuly deleted education');
        } else {
            return Redirect::to('education')->with('error', 'Something went wrong');
        }
    }
}

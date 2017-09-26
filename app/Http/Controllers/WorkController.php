<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Work;

class WorkController extends Controller
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
            'title'     => 'Work',
            'sub'       => 'Where have you worked at?',
            'icon'      => 'fa-building',
        ];

        return view('admin/work-list', ['user' => Auth::user(), 'work' => [], 'curr_page' => $curr_page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $curr_page = [
            'title'     => 'New Work',
            'sub'       => 'Where have you worked at?',
            'icon'      => 'fa-building',
        ];

        return view('admin/work', ['user' => Auth::user(), 'work' => [], 'curr_page' => $curr_page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $work = new Work;
        $work->user_id = Auth::user()->id;
        $work->title = Input::get('title');
        $work->company = Input::get('company');
        $work->description = Input::get('description');
        $work->date_start = Input::get('date_start');
        $work->date_end = Input::get('date_end') ? Input::get('date_end') : null;
        $work->save();

        if ($work->id) {
            return Redirect::to('work')->with('success', 'You\'ve successfuly added work');
        } else {
            return Redirect::to('work/create')->with('error', 'Something went wrong');
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
            'title'     => 'Work',
            'sub'       => 'Where have you worked at?',
            'icon'      => 'fa-building',
        ];

        return view('admin/work', ['user' => Auth::user(), 'work' => Work::find($id), 'curr_page' => $curr_page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $work = Work::find($id);

        if ($work) {
            $work->title = Input::get('title');
            $work->company = Input::get('company');
            $work->description = Input::get('description');
            $work->date_start = Input::get('date_start');
            $work->date_end = Input::get('date_end') ? Input::get('date_end') : null;
            $work->save();

            return Redirect::to('work')->with('success', 'You\'ve successfuly updated work');
        } else {
            return Redirect::to('work')->with('error', 'Something went wrong');
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
        $work = Work::find($id);

        if ($work) {
            $work->delete();

            return Redirect::to('work')->with('success', 'You\'ve successfuly deleted work');
        } else {
            return Redirect::to('work')->with('error', 'Something went wrong');
        }
    }
}

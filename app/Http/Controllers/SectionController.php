<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Section;

class SectionController extends Controller
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
            'title' => 'Sections',
            'sub'   => 'Section headers and subs',
            'icon'  => 'fa-th-list',
        ];

        return view('admin/sections', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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

    /**
    * Update all resources in storage.
    *
    * @return Response
    */
    public function updateAll()
    {
        if (Input::has('section')) {
            foreach (Input::get('section') as $section) {
                $update = Section::find($section['id']);
                $update->header = $section['header'];
                $update->sub = $section['sub'];
                $update->glance = (isset($section['glance']) ? $section['glance'] : null);
                $update->save();
            }

            return Redirect::to('section')->with('success', 'You\'ve successfuly updated sections');
        } else {
            return Redirect::to('section')->with('error', 'Something went wrong');
        }
    }
}

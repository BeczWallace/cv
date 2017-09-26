<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Category;

class CategoryController extends Controller
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
            'title' => 'Project Categories',
            'sub'   => '',
            'icon'  => 'fa-folder-open',
        ];
        
        return view('admin/category', ['user' => Auth::user(), 'categories' => Category::all(), 'curr_page' => $curr_page]);
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
        $category = new Category;
        $category->name = Input::get('name');
        $category->save();

        if ($category->id) {
            return Redirect::to('category')->with('success', 'You\'ve successfuly added new category');
        } else {
            return Redirect::to('category')->with('error', 'Something went wrong');
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
        $category = Category::find($id);
        if ($category) {
            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('category')->with('success', 'You\' ve successfuly updated category');
        } else {
            return Redirect::to('category')->with('error', 'Something went wrong');
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
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return json_encode(['success' => 'You have successfuly deleted category']);
        } else {
            return json_encode(['error' => 'Something went wrong']);
        }
    }
}

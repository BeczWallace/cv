<?php namespace App\Http\Controllers;

use Auth;
use Category;
use Input;
use Redirect;
use Request;
use Storage;
use Project;
use Validator;

class ProjectController extends Controller
{

    /**
      * Create a new controller instance.
      *
      * @return void
      */
    public function __construct()
    {
        $this->middleware('auth');
        $this->disk = Storage::disk('public');
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $curr_page = [
            'title'     => 'Project',
            'sub'       => 'Show your projects',
            'icon'      => 'fa-bar-chart',
        ];

        return view('admin/project-list', ['user' => Auth::user(), 'project' => [], 'curr_page' => $curr_page]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $curr_page = [
            'title'     => 'New Project',
            'sub'       => 'Show your projects',
            'icon'      => 'fa-bar-chart',
        ];

        return view('admin/project', ['user' => Auth::user(), 'project' => [], 'categories' => Category::all(), 'curr_page' => $curr_page]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->title = Input::get('title');
        $project->categories = (Input::get('categories') ? strtolower(implode(',', Input::get('categories'))) : '');
        $project->client = Input::get('client');
        $project->date_start = Input::get('date_start') ? Input::get('date_start') : null;
        $project->date_end = Input::get('date_end') ? Input::get('date_end') : null;
        $project->url = Input::get('url');
        $project->tags = (Input::get('tags') ? implode(',', Input::get('tags')) : '');
        $project->description = Input::get('description');

        // Add categories
        if ($project->categories) {
            $categories = [];
            foreach (Category::all() as $category) {
                $categories[] = strtolower($category->name);
            }
            foreach (Input::get('categories') as $category) {
                if (!in_array($category, $categories)) {
                    $new = new Category;
                    $new->name = $category;
                    $new->save();
                }
            }
        }

        if (Request::hasFile('image')) {
            $rules = ['image' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $image = Request::file('image');
            if ($image->isValid()) {
                $image->move(public_path() . '/img/portfolio/', $image->getClientOriginalName());
                $imageName = $image->getClientOriginalName();

                $project->image = 'portfolio/' . $imageName;

            } else {
                return Redirect::to('project/create')->with('error', $image->getError());
            }
        }

        if (Request::hasFile('img1')) {
            $rules = ['img1' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $img1 = Request::file('img1');
            if ($img1->isValid()) {
                $img1->move(public_path() . '/img/portfolio/', $img1->getClientOriginalName());
                $img1Name = $img1->getClientOriginalName();

                $project->img1 = 'portfolio/' . $img1Name;

            } else {
                return Redirect::to('project/create')->with('error', $img1->getError());
            }
        }

        if (Request::hasFile('img2')) {
            $rules = ['img2' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $img2 = Request::file('img2');
            if ($img2->isValid()) {
                $img2->move(public_path() . '/img/portfolio/', $img2->getClientOriginalName());
                $img2Name = $img2->getClientOriginalName();

                $project->img2 = 'portfolio/' . $img2Name;

            } else {
                return Redirect::to('project/create')->with('error', $img2->getError());
            }
        }

        if (Request::hasFile('img3')) {
            $rules = ['img3' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }
            $img3 = Request::file('img3');
            if ($img3->isValid()) {
                $img3->move(public_path() . '/img/portfolio/', $img3->getClientOriginalName());
                $img3Name = $img3->getClientOriginalName();

                $project->img3 = 'portfolio/' . $img3Name;

            } else {
                return Redirect::to('project/create')->with('error', $img3->getError());
            }
        }

        $project->save();

        if ($project->id) {
            return Redirect::to('project')->with('success', 'You\'ve successfuly added project');
        } else {
            return Redirect::to('project/create')->with('error', 'Something went wrong');
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
            'title'     => 'Project',
            'sub'       => 'Show your projects',
            'icon'      => 'fa-bar-chart',
        ];

        return view('admin/project', ['user' => Auth::user(), 'project' => Project::find($id), 'categories' => Category::all(), 'curr_page' => $curr_page]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->title = Input::get('title');
            $project->categories = (Input::get('categories') ? strtolower(implode(',', Input::get('categories'))) : '');
            $project->client = Input::get('client');
            $project->date_start = Input::get('date_start') ? Input::get('date_start') : null;
            $project->date_end = Input::get('date_end') ? Input::get('date_end') : null;
            $project->url = Input::get('url');
            $project->tags = (Input::get('tags') ? implode(',', Input::get('tags')) : '');
            $project->description = Input::get('description');

            // Add categories
            if ($project->categories) {
                $categories = [];
                foreach (Category::all() as $category) {
                    $categories[] = strtolower($category->name);
                }
                foreach (Input::get('categories') as $category) {
                    if (!in_array($category, $categories)) {
                        $new = new Category;
                        $new->name = $category;
                        $new->save();
                    }
                }
            }

            if (Request::hasFile('image')) {
                $rules = ['image' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $image = Request::file('image');
                if ($image->isValid()) {
                    $image->move(public_path() . '/img/portfolio/', $image->getClientOriginalName());
                    $imageName = $image->getClientOriginalName();

                    $oldImage = '/img/' . $project->image;

                    if ($this->disk->exists('/img/portfolio/' . $imageName)) {
                        $project->image = 'portfolio/' . $imageName;
                        
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('project')->with('error', 'Something went wrong');
                    }


                } else {
                    return Redirect::to('project')->with('error', $image->getError());
                }
            }

            if (Request::hasFile('img1')) {
                $rules = ['img1' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $img1 = Request::file('img1');
                if ($img1->isValid()) {
                    $img1->move(public_path() . '/img/portfolio/', $img1->getClientOriginalName());
                    $img1Name = $img1->getClientOriginalName();

                    $oldImage = '/img/' . $project->img1;

                    if ($this->disk->exists('/img/portfolio/' . $img1Name)) {
                        $project->img1 = 'portfolio/' . $img1Name;
                        
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('project')->with('error', 'Something went wrong');
                    }


                } else {
                    return Redirect::to('project')->with('error', $img1->getError());
                }
            }

            if (Request::hasFile('img2')) {
                $rules = ['img2' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $img2 = Request::file('img2');
                if ($img2->isValid()) {
                    $img2->move(public_path() . '/img/portfolio/', $img2->getClientOriginalName());
                    $img2Name = $img2->getClientOriginalName();

                    $oldImage = '/img/' . $project->img2;

                    if ($this->disk->exists('/img/portfolio/' . $img2Name)) {
                        $project->img2 = 'portfolio/' . $img2Name;
                        
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('project')->with('error', 'Something went wrong');
                    }


                } else {
                    return Redirect::to('project')->with('error', $img2->getError());
                }
            }

            if (Request::hasFile('img3')) {
                $rules = ['img3' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('project')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $img3 = Request::file('img3');
                if ($img3->isValid()) {
                    $img3->move(public_path() . '/img/portfolio/', $img3->getClientOriginalName());
                    $img3Name = $img3->getClientOriginalName();

                    $oldImage = '/img/' . $project->img3;

                    if ($this->disk->exists('/img/portfolio/' . $img3Name)) {
                        $project->img3 = 'portfolio/' . $img3Name;
                        
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('project')->with('error', 'Something went wrong');
                    }

                } else {
                    return Redirect::to('project')->with('error', $img3->getError());
                }
            }

            if (Input::has('image_delete') && Input::get('image_delete') && $project->image) {
                if ($this->disk->exists('/img/'.$project->image)) {
                    $this->disk->delete('/img/'.$project->image);
                }
                $project->image = null;
            }

            if (Input::has('img1_delete') && Input::get('img1_delete') && $project->img1) {
                if ($this->disk->exists('/img/'.$project->img1)) {
                    $this->disk->delete('/img/'.$project->img1);
                }
                $project->img1 = null;
            }

            if (Input::has('img2_delete') && Input::get('img2_delete') && $project->img2) {
                if ($this->disk->exists('/img/'.$project->img2)) {
                    $this->disk->delete('/img/'.$project->img2);
                }
                $project->img2 = null;
            }

            if (Input::has('img3_delete') && Input::get('img3_delete') && $project->img3) {
                if ($this->disk->exists('/img/'.$project->img3)) {
                    $this->disk->delete('/img/'.$project->img3);
                }
                $project->img3 = null;
            }

            $project->save();

            return Redirect::to('project')->with('success', 'You\'ve successfuly updated project');
        } else {
            return Redirect::to('project')->with('error', 'Something went wrong');
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
        $project = Project::find($id);

        if ($project) {
            if ($project->image) {
                $this->disk->delete('/img/' . $project->image);
            }

            if ($project->img1) {
                $this->disk->delete('/img/' . $project->img1);
            }

            if ($project->img2) {
                $this->disk->delete('/img/' . $project->img2);
            }

            if ($project->img3) {
                $this->disk->delete('/img/' . $project->img3);
            }

            $project->delete();

            return Redirect::to('project')->with('success', 'You\'ve successfuly deleted project');
        } else {
            return Redirect::to('project')->with('error', 'Something went wrong');
        }
    }
}

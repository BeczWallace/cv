<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Request;
use Storage;
use Cover;
use Validator;

class CoverController extends Controller
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
            'title' => 'Cover Images',
            'sub'   => '',
            'icon'  => 'fa-picture',
        ];
        
        return view('admin/cover', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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
        $cover = new Cover;
        $cover->user_id = Auth::user()->id;

        if (Request::hasFile('image')) {
            $rules = ['image' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('cover')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $image = Request::file('image');
            if ($image->isValid()) {
                $image->move(public_path() . '/img/', $image->getClientOriginalName());
                $imageName = $image->getClientOriginalName();

                $cover->image = $imageName;

            } else {
                return Redirect::to('cover')->with('error', $image->getError());
            }
        }

        $cover->save();

        if ($cover->id) {
            return Redirect::to('cover')->with('success', 'You\'ve successfuly added new cover');
        } else {
            return Redirect::to('cover')->with('error', 'Something went wrong');
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
        return view('admin/cover-show', ['cover' => Cover::find($id)]);
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
        $cover = Cover::find($id);
        if ($cover) {

            if (Request::hasFile('image')) {
                $rules = ['image' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('cover')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $image = Request::file('image');
                if ($image->isValid()) {
                    $image->move(public_path() . '/img/', $image->getClientOriginalName());
                    $imageName = $image->getClientOriginalName();

                    $oldImage = '/img/' . $cover->image;

                    if ($this->disk->exists('/img/' . $imageName)) {
                        $cover->image = $imageName;
                        
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('cover')->with('error', 'Something went wrong');
                    }


                } else {
                    return Redirect::to('cover')->with('error', $image->getError());
                }
            }

            $cover->save();

            return Redirect::to('cover')->with('success', 'You\'ve successfuly updated cover');
        } else {
            return Redirect::to('cover')->with('error', 'Something went wrong');
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
        $cover = Cover::find($id);

        if ($cover) {
            if ($cover->image) {
                $this->disk->delete('/img/' . $cover->image);
            }

            $cover->delete();

            return Redirect::to('cover')->with('success', 'You\'ve successfuly deleted cover');
        } else {
            return Redirect::to('cover')->with('error', 'Something went wrong');
        }
    }

    public function sort()
    {
        $s = '';
        if (Input::has('covers')) {
            foreach (Input::get('covers') as $item) {
                $cover = Cover::find($item['id']);
                $cover->sort_order = $item['sort_order'];
                $cover->save();
            }
            return json_encode(['success' => 'You\'ve successfuly updated covers']);
        } else {
            return 'wrong input';
        }
    }
}

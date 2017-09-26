<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Request;
use Storage;
use Testimonial;
use Validator;

class TestimonialController extends Controller
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
            'title' => 'Testimonials',
            'sub'   => 'What your clients say about you',
            'icon'  => 'fa-comments',
        ];
        
        return view('admin/testimonial', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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
        $testimonial = new Testimonial;
        $testimonial->user_id = Auth::user()->id;
        $testimonial->text = Input::get('text');
        $testimonial->author = Input::get('author');

        if (Request::hasFile('photo')) {
            $rules = ['photo' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('testimonial')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $photo = Request::file('photo');
            if ($photo->isValid()) {
                $photo->move(public_path() . '/img/testimonials/', $photo->getClientOriginalName());
                $photoName = $photo->getClientOriginalName();

                $testimonial->photo = 'testimonials/' . $photoName;

            } else {
                return Redirect::to('testimonial')->with('error', $photo->getError());
            }
        }

        $testimonial->save();

        if ($testimonial->id) {
            return Redirect::to('testimonial')->with('success', 'You\'ve successfuly added new testimonial');
        } else {
            return Redirect::to('testimonial')->with('error', 'Something went wrong');
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
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->user_id = Auth::user()->id;
            $testimonial->text = Input::get('text');
            $testimonial->author = Input::get('author');

            if (Request::hasFile('photo')) {
                $rules = ['photo' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('testimonial')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }
                $photo = Request::file('photo');
                if ($photo->isValid()) {
                    $photo->move(public_path() . '/img/testimonials/', $photo->getClientOriginalName());
                    $photoName = $photo->getClientOriginalName();

                    $oldImage = '/img/' . $testimonial->photo;

                    if ($this->disk->exists('/img/testimonials/' . $photoName)) {
                        $testimonial->photo = 'testimonials/' . $photoName;
                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('testimonial')->with('error', 'Something went wrong');
                    }


                } else {
                    return Redirect::to('testimonial')->with('error', $photo->getError());
                }
            }

            $testimonial->save();

            return Redirect::to('testimonial')->with('success', 'You\'ve successfuly updated testimonial');
        } else {
            return Redirect::to('testimonial')->with('error', 'Something went wrong');
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
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            if ($testimonial->photo) {
                $this->disk->delete('/img/' . $testimonial->photo);
            }

            $testimonial->delete();
            return json_encode(['success' => 'You have successfuly deleted testimonial']);
        } else {
            return json_encode(['error' => 'Something went wrong']);
        }
    }
}

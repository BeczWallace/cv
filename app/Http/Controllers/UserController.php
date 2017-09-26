<?php namespace App\Http\Controllers;

use Auth;
use Hash;
use Input;
use Redirect;
use Request;
use Storage;
use Validator;
use User;

class UserController extends Controller
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
            'title' => 'Edit Profile',
            'sub'   => '',
            'icon'  => 'fa-user',
        ];

        return view('admin/user', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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
        $user = User::find($id);
        if ($user) {
            if (Input::has('experience')) {
                $user->experience = Input::get('experience');
                $user->save();

                return Redirect::to('work')->with('success', 'You\'ve successfuly updated experience');
            }

            if (Input::has('password')) {
                $passwordRules = ['password' => 'required|min:6|confirmed'];
                $passwordValidator = Validator::make(Input::all(), $passwordRules);
                if ($passwordValidator->fails()) {
                    return Redirect::to('user')->withErrors($passwordValidator);
                }
                $user->password = Hash::make(Input::get('password'));
            }

            if (Request::hasFile('photo')) {
                $rules = ['photo' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('user')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $photo = Request::file('photo');
                if ($photo->isValid()) {
                    $photo->move(public_path() . '/img/', $photo->getClientOriginalName());
                    $photoName = $photo->getClientOriginalName();

                    $oldImage = '/img/' . $user->photo;

                    if ($this->disk->exists('/img/' . $photoName)) {
                        $user->photo = $photoName;

                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }

                        $user->save();
                    } else {
                        return Redirect::to('user')->with('error', 'Something went wrong');
                    }

                    return Redirect::to('user')->with('success', 'You\'ve successfuly updated your profile photo');
                } else {
                    return Redirect::to('user')->with('error', $photo->getError());
                }

            }

            $rules = ['email' => 'email'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('user')->withErrors($validator)->withInput();
            }

            $user->name = Input::get('name');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->address = Input::get('address');
            $user->phone = Input::get('phone');
            $user->profile_title = Input::get('profile_title');
            $user->introduction = Input::get('introduction');
            $user->philosophy = Input::get('philosophy');
            $user->save();

            return Redirect::to('user')->with('success', 'You\'ve successfuly updated your profile');
        } else {
            return Redirect::to('user')->with('error', 'Something went wrong');
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
      
    }
}

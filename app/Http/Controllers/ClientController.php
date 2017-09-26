<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use Request;
use Storage;
use Client;
use Validator;

class ClientController extends Controller
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
            'title' => 'Clients',
            'sub'   => 'Show your clients',
            'icon'  => 'fa-user',
        ];
        
        return view('admin/clients', ['user' => Auth::user(), 'curr_page' => $curr_page]);
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
        $client = new Client;
        $client->user_id = Auth::user()->id;
        $client->name = Input::get('name');

        if (Request::hasFile('image')) {
            $rules = ['image' => 'max:7000'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('client')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
            }

            $image = Request::file('image');
            if ($image->isValid()) {
                $image->move(public_path() . '/img/clients/', $image->getClientOriginalName());
                $imageName = $image->getClientOriginalName();

                $client->image = 'clients/' . $imageName;

            } else {
                return Redirect::to('client')->with('error', $image->getError());
            }
        }

        $client->save();

        if ($client->id) {
            return Redirect::to('client')->with('success', 'You\'ve successfuly added new client');
        } else {
            return Redirect::to('client')->with('error', 'Something went wrong');
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
        $client = Client::find($id);
        if ($client) {
            $client->name = Input::get('name');

            if (Request::hasFile('image')) {
                $rules = ['image' => 'max:7000'];
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    return Redirect::to('client')->with('error', 'Sorry, this is timing out. Your images are probably too big (we can only accept 7mb max)<br>Please reduce the size of your images using your favourite photo editing/viewing app and try again')->withInput();
                }

                $image = Request::file('image');
                if ($image->isValid()) {
                    $image->move(public_path() . '/img/clients/', $image->getClientOriginalName());
                    $imageName = $image->getClientOriginalName();

                    $oldImage = '/img/' . $client->image;

                    if ($this->disk->exists('/img/clients/' . $imageName)) {
                        $client->image = 'clients/' . $imageName;

                        if ($oldImage != '/img/' && $this->disk->exists($oldImage)) {
                            $this->disk->delete($oldImage);
                        }
                    } else {
                        return Redirect::to('client')->with('error', 'Something went wrong');
                    }

                } else {
                    return Redirect::to('client')->with('error', $image->getError());
                }
            }

            $client->save();

            return Redirect::to('client')->with('success', 'You\'ve successfuly updated client');
        } else {
            return Redirect::to('client')->with('error', 'Something went wrong');
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
        $client = Client::find($id);
        if ($client) {
            if ($client->image) {
                $this->disk->delete('/img/' . $client->image);
            }
            
            $client->delete();
            return json_encode(['success' => 'You have successfuly deleted client']);
        } else {
            return json_encode(['error' => 'Something went wrong']);
        }
    }
}

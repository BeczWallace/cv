<?php namespace App\Http\Controllers;

use App\User;
use App\Category;
use Input;
use Mail;
use Validator;

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::find(1);
        
        $socials = $user->socialProfiles()->first();
        $offers[] = $user->offers()->skip(0)->take(3)->get();
        $offers[] = $user->offers()->skip(3)->take(3)->get();
        $categories = Category::all();

        return view('index', ['user' => $user, 'socials' => $socials, 'offersList' => $offers, 'categories' => $categories]);
    }

    public function email()
    {

        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required|min:5',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return json_encode(['error' => $validator->messages(), 'success' => false]);
        }

        $message = Input::get('message');

        Mail::raw($message, function ($message) {
            $message->from(Input::get('email'), Input::get('name'));
            $message->to(User::find(1)->email);
            $message->subject('Contact from Your Website');
        });

        return json_encode(['error' => [], 'success' => true]);
    }
}

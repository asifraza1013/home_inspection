<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        toast('Login Successfull!','success');
        $user = Auth::user();
        $userRole = $user->getRoleNames();
        if($user->type != 1) return redirect(route('user.profile'));
        if($userRole[0] == 'user') return redirect(route('user.dashboard'));
        if($userRole[0] == 'admin') return redirect(route('admin.dashboard'));
        return view('home');
    }

    /**
     * User registration flow
     */
    public function manuallRegistrations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);

        // dd($validator->errors()->getMessages());
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        if ($validator->fails()) {
            toast('Please try with correct data Thanks!','error');
            return redirect()->back();
        }

        $data = $request->all();
        // dd($data);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->status = 1;
        $user->save();
        // if (setting('register_notification_email')) {
        //     Mail::to($data['email'])->send( new UserRegistered($user));
        // }
        if ( setting('default_role')) {
            $user->assignRole(setting('default_role'));
        }
        toast('Register Successfully. Please try login with correct credentials!','success');
        return redirect(route('login'));
    }
}

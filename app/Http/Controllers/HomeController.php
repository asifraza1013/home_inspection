<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

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
        $userRole = $user->getRoleNames()->toArray();

        $differenceArray1 = array_diff($userRole, config('constants.builtin_roles'));
        $differenceArray2 = array_diff(config('constants.builtin_roles'), $userRole);
        $mergeDifference = array_merge($differenceArray1, $differenceArray2);
        if(in_array($userRole[0], config('constants.builtin_roles'))) return redirect(route('admin.dashboard'));
        if($userRole[0] == 'user') return redirect(route('user.dashboard'));
        else return redirect(route('super.admin.dashboard'));;
    }

    public function register()
    {
        $title = 'New Registrations';
        $roles = Role::whereIn('name',['admin', 'agent', 'user'])->pluck('name', 'id');
        return view('auth.register', compact([
            'roles',
            'title',
        ]));
    }

    /**
     * User registration flow
     */
    public function manuallRegistrations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);

        // dd($validator->errors()->getMessages());
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        $roles = Role::whereIn('name',['admin', 'agent', 'user'])->pluck('id');
        if(!in_array($request->role, $roles->toArray())){
            toast('Please try with correct data Thanks!','error');
            return redirect()->back();
        }
        if ($validator->fails()) {
            toast('Please try with correct data Thanks!','error');
            return redirect()->back();
        }

        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        // $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->status = 1;
        $user->save();
        // if (setting('register_notification_email')) {
        //     Mail::to($data['email'])->send( new UserRegistered($user));
        // }
        $user->assignRole($request->role);
        toast('Register Successfully. Please try login with correct credentials!','success');
        return redirect(route('login'));
    }
}

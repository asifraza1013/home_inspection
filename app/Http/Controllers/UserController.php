<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-user', ['only' => ['index']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $currentRoleName = Auth::user()->roles[0]->name;
        if ($request->has('search')) {
            $users = User::where('name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            if($request->has('type') && $request->type == 'admin') $users= User::role(['admin'])->paginate(setting('record_per_page', 15));
            else if($request->has('type') && $request->type == 'inspector') $users= User::role(config('constants.admin_predefined_roles'))->paginate(setting('record_per_page', 15));
            else if(adminRequest($currentRoleName)) $users= User::role(config('constants.admin_predefined_roles'))->paginate(setting('record_per_page', 15));
            else $users= User::role('user')->paginate(setting('record_per_page', 15));
        }
        $title =  'Manage Users';
        return view('users.index', compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create user';
        $currentRoleName = Auth::user()->roles[0]->name;
        if($currentRoleName == 'super-admin') $roles = Role::where('role_for','!=', 2)->pluck('name', 'id');
        else $roles = $roles = Role::where('role_for', 2)->pluck('name', 'id'); // roles for admin
        return view('users.create', compact('roles', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $auth = Auth::user();
        // $currentRoleName = Auth::user()->roles[0]->name;
        $userData = $request->except(['role', 'profile_photo']);
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        $userData['email_verified_at'] = Carbon::now()->toDateTimeString();
        $userData['status'] = $request->status;
        $user = User::create($userData);
        $user->assignRole($request->role);

        if($request->role  == config('constants.admin')){
            // create company detail
            $company = new CompniesDetail();
            $company->company_name = $request->name;
            $company->user_id = $user->id;
            $company->save();

            $user->company_id = $company->id;
            $user->update();
        }
        if(in_array($user->roles[0]->name, config('constants.admin_predefined_roles'))){
            if($auth->company_id){
                $company = CompniesDetail::where('id', $auth->company_id)->first();
            }else{
                $company = CompniesDetail::where('user_id', $auth->id)->first();
            }
            $user->company_id = $company->id;
            $user->update();
        }

        flash('User created successfully!')->success();
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $currentRoleName = Auth::user()->roles[0]->name;
        $title = "User Details";
        return view('users.show', compact('user','title', 'currentRoleName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "User Details";
        $currentRoleName = Auth::user()->roles[0]->name;
        if($currentRoleName == 'super-admin') $roles = Role::where('role_for','!=', 2)->pluck('name', 'id');
        else $roles = $roles = Role::where('role_for', 2)->pluck('name', 'id'); // roles for admin
        return view('users.edit', compact('user','title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $userRole = $user->roles[0];
        if($userRole->name == 'admin' && $request->role != $userRole->id){
            toast('Sorry! can\'t change admin role. Please try create new user!','warning');
            return back();
        }
        if($request->role == config('constants.admin')){
            toast('Sorry! can\'t change any other role to admin. Please try create new user!','warning');
            return back();
        }
        $userData = $request->except(['role', 'profile_photo']);
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        $user->update($userData);
        $user->syncRoles($request->role);
        flash('User updated successfully!')->success();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id || $user->id ==1) {
            flash('You can not delete logged in user!')->warning();
            return back();
        }
        $user->delete();
        flash('User deleted successfully!')->info();
        return back();

    }


    public function profile(User $user)
    {
        $title = 'Edit Profile';
        return view('users.profile', compact('title','user'));
    }
    public function profileUpdate(UserUpdateRequest $request, User $user)
    {
        $userData = $request->except('profile_photo');
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }

        $user->update($userData);
        flash('Profile updated successfully!')->success();
        return back();
    }

    public function quickQuotation()
    {
        $title = 'Get Quick Qoutation';
        $selectedCompany = null;
        $compnies = CompniesDetail::whereNotNull('pricing')->get()->keyBy('id');
        return view('users.quick_quotation', compact([
            'compnies',
            'selectedCompany',
            'title',
        ]));
    }
}

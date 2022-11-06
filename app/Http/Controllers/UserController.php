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

        // $this->middleware('permission:view-user')->except(['profile', 'profileUpdate']);
        // $this->middleware('permission:create-user', ['only' => ['create','store']]);
        // $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        // $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $users = User::where('name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            if($request->has('type') && $request->type == 'admin') $users= User::role(['super-admin', 'admin'])->paginate(setting('record_per_page', 15));
            else if($request->has('type') && $request->type == 'inspector') $users= User::whereIn('type', [2, 3])->paginate(setting('record_per_page', 15));
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
        if($currentRoleName == 'super-admin') $roles = Role::pluck('name', 'id');
        else $roles = config('constants.admin_roles');
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
        $currentRoleName = Auth::user()->roles[0]->name;
        $userData = $request->except(['role', 'profile_photo']);
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        $userData['email_verified_at'] = Carbon::now()->toDateTimeString();
        $userData['status'] = 1;
        if($currentRoleName == 'admin') $userData['type'] = $request->role;
        $user = User::create($userData);
        if($currentRoleName == 'super-admin') $user->assignRole($request->role);
        else $user->assignRole(2); // normal user as default.
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
        $roles = Role::pluck('name', 'id');
        return view('users.show', compact('user','title', 'roles', 'currentRoleName'));
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
        $roles = Role::pluck('name', 'id');
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

    public function profileIndex()
    {
        $title = 'User Profile';
        $user = Auth::user();
        return view('frontend.pages.user.profile', compact([
            'title',
            'user',
        ]));
    }

    public function updateCompanyProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'comany_name' => 'sometimes|unique:compnies_details,name|max:255',
        ]);
        if($request->password) $user->password = Hash::make($request->password);
        if ($image = $request->file('image')) {
            $destinationPath = 'profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $user->profile_photo = asset('profile/'.$profileImage);
        }
        if($request->password || $request->image) $user->update();


        // update user company detail
        if($request->company_name || $request->description){
            $companyDetail = [];
            if($request->company_name) $companyDetail['company_name'] = $request->company_name;
            if($request->description) $companyDetail['description'] = $request->description;
            $company = CompniesDetail::updateOrCreate(['user_id' => $user->id], $companyDetail);
        }

        toast('Company details updated successfully!','success');
        return back();
    }

    public function updateCompanyPricing(Request $request)
    {
        $request->validate([
            'item_name' => 'required|array',
            'item_name.*' => 'required|string',
            'item_price' => 'required|array',
            'item_price.*' => 'required|string',
            'item_selection' => 'required|array',
            'item_selection.*' => 'required|string',
        ]);

        $user = Auth::user();
        $company = CompniesDetail::updateOrCreate(['user_id' => $user->id], [ 'pricing' => [
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
            'item_selection' => $request->item_selection,
        ]]
    );

        if($company) toast('Company details updated successfully!','success');
        else toast('Opps something is wrong please try again!','error');
        return back();
    }
}

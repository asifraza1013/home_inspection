<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\QuoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class QuoteManagementController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:manage-company-profile',['only' => ['updateCompanyProfile', 'updateCompanyPricing', 'profileIndex']]);
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

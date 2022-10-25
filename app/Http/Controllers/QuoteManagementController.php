<?php

namespace App\Http\Controllers;

use App\QuoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteManagementController extends Controller
{
    /**
     * quotation options list
     */
    public function quotationOptions(Request $request)
    {
        $title = 'Quotation Options Management';
        $user = Auth::user();
        $quoteOptions = QuoteOption::where('user_id', $user->id)->where('status', 1)->first();
        return view('quote_options.index', compact([
            'title',
            'quoteOptions'
        ]));
    }

    /**
     * update admin quotation
     */
    public function updateQuotation(Request $request)
    {
        $quoteOptions = QuoteOption::where('id', $request->quotation)->update([
            'detail' => [
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
                'visibility' => $request->visibility,
            ]
        ]);
        if($quoteOptions) toast('Qoutation values updated successfully','success');
        else toast('Opps something went wrong. please try again','error');
        return redirect()->back()->withInput();
    }
}

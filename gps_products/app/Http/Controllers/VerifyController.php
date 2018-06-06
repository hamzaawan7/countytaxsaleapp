<?php

namespace App\Http\Controllers;

use App\TrialAmounts;
use App\TrialDays;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Nexmo;

class VerifyController extends Controller
{

    public function show(Request $request) {
        $trial_days = TrialDays::find(1);
        $trial_amount = TrialAmounts::find(1);
        return view('verify', compact('trial_days', 'trial_amount'));
    }
 
    public function verify(Request $request) {
        $this->validate($request, [
        	'code' => 'size:4',
	    ]);
	    try {
	        Nexmo::verify()->check(
	            $request->session()->get('verify:request_id'),
	            $request->code
	        );
	        Auth::loginUsingId($request->session()->pull('verify:user:id'));
	       // return redirect('/');
            User::where('id', Auth::user()->id)->update([
                'is_nexmo_verified' => 1
            ]);

            return redirect('signup-credit-card-info');
	    } catch (Nexmo\Client\Exception\Request $e) {
	        return redirect()->back()->withErrors([
	            'code' => $e->getMessage()
	        ]);
	 
	    }
        return redirect('/');
    }

}

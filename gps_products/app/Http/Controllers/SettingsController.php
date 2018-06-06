<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Premium_user;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Carbon\Carbon;

class SettingsController extends Controller
{
    //
    public function settingsView()
    {
        $now = Carbon::now();
        if (Auth::user()->is_nexmo_verified) {
            $premiums = Premium_user::where('user_id', Auth::user()->id)->where('end_date', '>=', $now)->orderBy('id', 'DESC')->first();

            if ($premiums) {
                return view('settings');
            } else {
                return redirect('payment-view')->with('success', 'Please Renew Your Account !');
            }
        } else {
            return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
        }
    }


    public function paymentChoosePageView()
    {
        if (Auth::user()->is_nexmo_verified) {
            return view('payment-choose');
        } else {
            return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
        }
    }


    public function ChangePassViewPage()
    {
        if (Auth::user()->is_nexmo_verified) {
            return view('change-password');
        } else {
            return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
        }
    }


    // admin password change
    public function passwordchangeReset(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|different:old_password',
            'password_confirmation' => 'same:new_password|min:5',
        ]);

        if (!Hash::check($request['old_password'], Auth::user()->password)) {

            return redirect()->back()->with('danger', 'Your old password does not match');

        } else {
            $user = Auth::user();
            $user->password = bcrypt($request['new_password']);
            $user->save();

        }

        return redirect()->back()->with("success", "Password have been changed");
    }


    public function allAlertsSettings(Request $request)
    {
        $this->validate($request, [
            'alerts' => 'required',
        ]);

        $alerts = $request->alerts;

        if ($alerts == 'status_alert') {
            if (Auth::user()->status_alert == 'active') {
                User::where('id', Auth::user()->id)->update(['status_alert' => 'inactive']);
                User::where('id', Auth::user()->id)->update(['email_alert' => 'inactive']);
                User::where('id', Auth::user()->id)->update(['sms_alert' => 'inactive']);
            } else {
                User::where('id', Auth::user()->id)->update(['status_alert' => 'active']);
                User::where('id', Auth::user()->id)->update(['email_alert' => 'active']);
                User::where('id', Auth::user()->id)->update(['sms_alert' => 'active']);
            }

        }

        if ($alerts == 'email_alert') {
            if (Auth::user()->email_alert == 'active') {
                User::where('id', Auth::user()->id)->update(['email_alert' => 'inactive']);
                if (Auth::user()->sms_alert == 'inactive') {
                    User::where('id', Auth::user()->id)->update(['status_alert' => 'inactive']);
                }
            } else {
                User::where('id', Auth::user()->id)->update(['status_alert' => 'active']);
                User::where('id', Auth::user()->id)->update(['email_alert' => 'active']);
            }
        }

        if ($alerts == 'sms_alert') {
            if (Auth::user()->sms_alert == 'active') {
                if (Auth::user()->email_alert == 'inactive') {
                    User::where('id', Auth::user()->id)->update(['status_alert' => 'inactive']);
                }
                User::where('id', Auth::user()->id)->update(['sms_alert' => 'inactive']);
            } else {
                User::where('id', Auth::user()->id)->update(['status_alert' => 'active']);
                User::where('id', Auth::user()->id)->update(['sms_alert' => 'active']);
            }
        }

        return redirect()->back()->with('success', 'Alert Status Successfully Change !');

    }


}

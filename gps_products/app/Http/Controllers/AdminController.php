<?php

namespace App\Http\Controllers;

use App\AuctionDate;
use App\Favorite;
use App\HomepageQuestions;
use App\Legals;
use App\Payment;
use App\TrialAmounts;
use App\TrialDays;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Premium_user;
use App\Product;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function loginViewform()
    {

        return view('admins.login');

    }

    // admin login 
    public function adminLoggedIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'admin', 'status' => 'active'])) {


            return redirect('admin-dashboard')->with('success', 'You are now Signed In');

        }
        return redirect()->back()->with('warning', 'Your Username or Password Does not match !!');

    }

    public function passwordchange()
    {
        return view('admins.change_password');
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

    public function getSignOut()
    {
        Auth::logout();
        return redirect('/')->with('warning', 'You Are Now  SignOut !!');
    }

    public function adminProfiles()
    {

        return view('admins.profile_update');

    }

    public function adminProfileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        $logo = $request->file('logo');

        if ($logo) {

            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'photo' => file_get_contents($logo, true),
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'descripton' => $request->description,
            ]);

        } else {

            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'descripton' => $request->description,
            ]);

        }


        return redirect()->back()->with("success", "Profile Successfully Updated !");
    }


    public function adminDashbaordView()
    {

        $users = User::where('is_subscribed', 0)->count();
        $preusers = User::where('is_subscribed', 1)->count();
        $productss = Product::where('status', 'active')->count();
        $productsss = Product::where('status', 'cancelled')->count();

        return view('admins.dashboard', compact('users', 'preusers', 'productss', 'productsss'));

    }


    public function adminDashbaordAllUsers()
    {

        // $users = User::where('type', '=!', 'admin')->get();
        $users = User::where('type', '!=', 'admin')->get();
        return view('admins.users', compact('users'));
    }

    public function adminHomePageQuestions()
    {
        $q1 = HomepageQuestions::find(1);
        $q2 = HomepageQuestions::find(2);
        $q3 = HomepageQuestions::find(3);
        $q4 = HomepageQuestions::find(4);
        return view('admins.homepage_questions', compact('q1', 'q2', 'q3', 'q4'));
    }

    public function adminUpdateQuestions(Request $request)
    {
        $this->validate($request, [
            'q1' => 'required',
            'a1' => 'required',
            'q2' => 'required',
            'a2' => 'required',
            'q3' => 'required',
            'a3' => 'required',
            'q4' => 'required',
            'a4' => 'required'
        ]);
        HomepageQuestions::where('id', 1)->update(['question' => $request->q1]);
        HomepageQuestions::where('id', 1)->update(['answer' => $request->a1]);
        HomepageQuestions::where('id', 2)->update(['question' => $request->q2]);
        HomepageQuestions::where('id', 2)->update(['answer' => $request->a2]);
        HomepageQuestions::where('id', 3)->update(['question' => $request->q3]);
        HomepageQuestions::where('id', 3)->update(['answer' => $request->a3]);
        HomepageQuestions::where('id', 4)->update(['question' => $request->q4]);
        HomepageQuestions::where('id', 4)->update(['answer' => $request->a4]);

        return redirect()->back()->with("success", "Questions have been changed");

    }


    public function adminuserspayment()
    {
        $subsciption = DB::table('premium_users')->leftJoin('users', 'premium_users.user_id', '=', 'users.id')->orderBy('premium_users.id', 'desc')->select('premium_users.*', 'users.email')->get();
        return view('admins.userssubsciption', array('subsciption' => $subsciption));
    }

    function refund_amount($id, Request $request)
    {
        $amount = $request->amount;
        $pr = Premium_user::where('id', $id)->first();
        // $stripe_charge_id = $pr->stripe_charge_id;
        // if ($stripe_charge_id != "") {
        //     $s = $users = DB::table('stripe')
        //         ->first();
        //     $stripe_pub_key = $s->stripe_pub_key;
        //     $stripe_sec_key = $s->stripe_sec_key;
        //     \Stripe\Stripe::setApiKey($stripe_sec_key);

        //     \Stripe\Refund::create(array(
        //         "charge" => $stripe_charge_id,
        //         "amount" => $amount * 100,
        //     ));
        // }

        $pr->refund_amount = ($amount * 100) + $amount;
        $pr->save();
        $arr['status'] = 1;
        $arr['message'] = "Successfully refund user";
        echo json_encode($arr);
        die;


    }

    public function unsubsctibe_user($id)
    {
        $return = array();
        $return['status'] = 0;
        $return['msg'] = "";

        $pr = Premium_user::where('user_id', $id)->where('is_active', 1)->orderBy('id', 'desc')->first();
        if ($pr) {

            $subscription_id = $pr->subscription_id;

            if ($subscription_id != "") {
                $user_id = $pr->user_id;
                if ($subscription_id != "") {
                    $s = $users = DB::table('stripe')
                        ->first();
                    $stripe_pub_key = $s->stripe_pub_key;
                    $stripe_sec_key = $s->stripe_sec_key;
                    \Stripe\Stripe::setApiKey($stripe_sec_key);
                    $sub = \Stripe\Subscription::retrieve($subscription_id);


                    $sub->cancel();
                }

            }

            $pr->is_active = 0;
            $pr->save();


        }


        $p = User::where('id', $id)->first();
        $p->is_subscribed = 0;
        $p->save();
        $arr['status'] = 1;
        $arr['message'] = "Successfully unsubsctibe user";
        echo json_encode($arr);
        die;
    }

    public function subsctibe_user($id)
    {
        $amount_table = TrialAmounts::find(1);
        $dynemic_charge = ($amount_table->amount) * 100;

        $return = array();
        $return['status'] = 0;
        $return['msg'] = "";
        require_once base_path('vendor/stripe-php-master/init.php');
        // $token  = $_POST['stripeToken'];
        //      $email  = $_POST['stripeEmail'];
        $p = User::where('id', $id)->first();
        $stripe_customer_id = $p->stripe_customer_id;

        $s = $users = DB::table('stripe')
            ->first();
        $stripe_pub_key = $s->stripe_pub_key;
        $stripe_sec_key = $s->stripe_sec_key;
        require_once base_path('vendor/stripe-php-master/init.php');
        \Stripe\Stripe::setApiKey($stripe_sec_key);


        $body = "";
        //$stripe_customer_id="";

        if ($stripe_customer_id != "") {
////---
            $current_date_time = date('Y-m-d H:i:s');
            $current_date = date('Y-m-d');
            $end_date = date("Y-m-t");
            $month_days = date('t');
            $current_month = date('m');
            $amount_payment = $dynemic_charge / 30;
            $timestamp_differance = strtotime($current_date) - strtotime($end_date);
            $number_days_remain = round($timestamp_differance / (60 * 60 * 24));
            $t = $users = DB::table('premium_users')->where('user_id', $id)->orderBy('id', 'DESC')->first();


            $trial_days = 0;
            // if ($t) {

            //     $tt_d = $t->end_date;
            //     $tt_status = $t->status;
            //     if ($tt_status == "trial" && $tt_d > $current_date_time) {
            //         $timestamp_differance = strtotime($tt_d) - strtotime($current_date_time);
            //         $trial_days = $number_days_remain = round($timestamp_differance / (60 * 60 * 24));

            //     }
            //     // if($tt_status=="trial"){
            //     //   //$t->forceDelete();
            //     // }
            // }


            if ($trial_days == 0) {
                $plan_name = "premium1";
                $trial_period_end_date = date("Y-m-d H:i:s", strtotime($current_date_time));
                $subsction_start_date = "now";
                $end_date_subscription = date("Y-m-t H:i:s", strtotime($current_date_time));
                $timestamp_differance = strtotime($end_date_subscription) - strtotime($trial_period_end_date);
                $number_days_charge = round($timestamp_differance / (60 * 60 * 24));
                if ($number_days_charge == 0) {
                    $number_days_charge = 1;
                }
                $amount_payment = round($amount_payment * $number_days_charge);
            } else {
                $plan_name = "trial";
                $trial_period_end_date = date("Y-m-d H:i:s", strtotime($current_date_time . '+' . $trial_days . ' days'));
                $subsction_start_date = strtotime($trial_period_end_date);
                $end_date_subscription = date("Y-m-t H:i:s", strtotime($trial_period_end_date));
                // echo "S".$trial_period_end_date;
                // echo "<br>";
                // echo "E".$end_date_subscription;
                // die;
                $timestamp_differance = strtotime($end_date_subscription) - strtotime($trial_period_end_date);
                $number_days_charge = round($timestamp_differance / (60 * 60 * 24));
                $amount_payment = round($amount_payment * $number_days_charge);
                if ($number_days_charge == 0) {
                    $number_days_charge = 1;
                }


            }


            // if($trial_period_date==$end_date || $trial_days==0){
            //     $first_payment_start_date=$trial_period_date;
            //     $trial_end_month=date('m',strtotime($trial_period_date));


            //     if($trial_days==0 && $trial_period_date==$end_date){
            //     $number_days_charge=1;
            //     $first_payment_start_date=date("Y-m-d", strtotime($first_payment_start_date.'+1 days'));
            //     }else if($current_month!=$trial_end_month){

            //      $trial_period_date1=date('Y-m-t',strtotime($trial_period_date));
            //      $timestamp_differance=strtotime($trial_period_date1)-strtotime($trial_period_date);
            //      $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
            //      // $first_payment_start_date=date("Y-m-d", strtotime($first_payment_start_date.'+'.$number_days_charge.' days'));

            //       }else{
            //      $timestamp_differance=strtotime($trial_period_date)-strtotime($end_date);
            //      $number_days_charge=round($timestamp_differance / (60 * 60 * 24));

            //       }

            //      $amount_payment=round($amount_payment*$number_days_charge);

            // }else{
            //      $trial_end_month=date('m',strtotime($trial_period_date));
            //   if($current_month!=$trial_end_month){
            //      $trial_period_date1=date('Y-m-t',strtotime($trial_period_date));
            //      $timestamp_differance=strtotime($trial_period_date1)-strtotime($trial_period_date);
            //      $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
            //      $first_payment_start_date=$trial_period_date;
            //      $trial_period_date=$trial_period_date1;
            //      $amount_payment=round($amount_payment*$number_days_charge);


            //   }else{
            //      $first_payment_start_date=$trial_period_date;
            //      $timestamp_differance=strtotime($trial_period_date)-strtotime($end_date);
            //      $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
            //      $trial_period_date=$end_date;
            //      $amount_payment=round($amount_payment*$number_days_charge);

            //   }

            // }


            $plan_id = "";


            try {

                $plan = \Stripe\Plan::create(array(
                    "amount" => $amount_payment,
                    "name" => $plan_name,
                    "currency" => "usd",
                    "interval" => "day",
                    "interval_count" => $number_days_charge,
                ));
                $plan_id = $plan->id;


            } catch (\Exception $e) {
                $error = $e->getMessage();


            }

// echo "<pre>";
// print_r($amount_payment);
// echo "<br>";
// print_r($plan_name);
// echo "<br>";
// print_r($number_days_charge);
// echo "<br>";
// print_r($trial_days);
// echo "<br>";
// echo "<br>";
// print_r($plan_id);
// die;


// if($trial_days==0){
//  $trial_end_s=strtotime($first_payment_start_date);
// }else{
//   $trial_end_s=strtotime($first_payment_start_date);
// }


            $subscription = \Stripe\Subscription::create([
                'customer' => $stripe_customer_id,
                'items' => [['plan' => $plan_id]],
                'trial_end' => $subsction_start_date,
            ]);

            $subscription_id = $subscription->id;
            $end_date = $subscription->current_period_end;
            $p->is_subscribed = 1;
            $p->save();

            sleep(7);

            $arr['status'] = 1;
            $arr['message'] = "Successfully subscribe user";
            echo json_encode($arr);
            die;

        } else {
            $return['status'] == 0;
            $return['message'] == "Something went wrong";
            echo json_encode($return);
            die;
        }


    }

    public function adminDashbaordUserProView($id)
    {
        $user = User::find($id);
        return view('admins.user-profile-view', compact('user'));
    }

    public function adminTrialDays()
    {
        $trial_days = TrialDays::find(1);
        return view('admins.trial-days', compact('trial_days'));
    }

    public function adminUpdateTrialDays(Request $request)
    {
        $this->validate($request, [
            'days' => 'required',
        ]);

        TrialDays::where('id', 1)->update(['days' => $request->days]);

        return redirect()->back()->with("success", "Trial Days have been changed");
    }

    public function adminSelectedGroup(Request $request)
    {
        $users = \GuzzleHttp\json_encode($request->users);
        return redirect()->to(route('admin-send-group', $users));
    }

    public function adminSendGroup(Request $request)
    {
        $users = $request->users;
        return view('admins.group_message', compact('users'));
    }

    public function adminSubmitGroupMessage(Request $request)
    {
        $users = $request->users;
        $using = $request->using;
        $text = $request->text;
        foreach ($users as $uid) {
            $user = User::where(['id' => $uid])->get();
            $msg = "Dear " . $user->name . "," . "\n" . $text;
            $email = $user->email;
            if ($using == 0 || $using == 1) {
                Mail::raw($msg, function ($message) use ($email) {
                    $message->to($email)->subject('County Tax Sale App - Admin Message');
                });
            }
            if ($using == 0 || $using == 2) {
                $test_number = Nexmo::insights()->basic("1" . $user->phone_number);
                if ($test_number['status'] == 0) {
                    try {
                        Nexmo::message()->send([
                            'to' => $test_number['international_format_number'],
                            'from' => '12015100626',
                            'text' => $text
                        ]);
                    } catch (\Nexmo\Client\Exception\Request $e) {
                        $nexmo_errors[] = $e->getMessage() . ' (Error Code: ' . $e->getCode() . ')';
                    }
                }
            }
        }

        return redirect()->back()->with("success", "Message has been sent");
    }

    public function adminTrialAmount()
    {
        $amount = TrialAmounts::find(1);
        return view('admins.trial-amount', compact('amount'));
    }

    public function adminUpdateTrialAmount(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
        ]);

        TrialAmounts::where('id', 1)->update(['amount' => $request->amount]);

        return redirect()->back()->with("success", "Trial Amount has been changed");
    }

    public function adminLegals()
    {
        $legal = Legals::find(1);
        return view('admins.legals', compact('legal'));
    }

    public function adminUpdateLegals(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        Legals::where('id', 1)->update(['text' => $request->text]);

        return redirect()->back()->with("success", "Legal Text has been changed");
    }

    public function adminAuctionDate()
    {
        $adate = AuctionDate::find(1);
        return view('admins.auction_date', compact('adate'));
    }

    public function adminUpdateAuctionDate(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
        ]);

        AuctionDate::where('id', 1)->update(['date' => $request->date]);

        return redirect()->back()->with("success", "Next Auction Date has been changed");
    }

    public function adminDashbaordUserEdits($id)
    {

        $user = User::find($id);
        return view('admins.user-edit', compact('user'));
    }

    public function userProfileUpdate(Request $request)
    {
        if ($request->manually_subdcribe == "on") {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'manually_subdcribe_date' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
            ]);
        }

        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'descripton' => $request->description,
            'phone_number' => $request->number,
            'status' => $request->status,
        ]);
        if ($request->status == "inactive") {
            $pr = Premium_user::where('user_id', $request->id)->where('is_active', 1)->orderBy('id', 'desc')->first();
            if ($pr) {
                $subscription_id = $pr->subscription_id;
                if ($subscription_id != "") {
                    $user_id = $pr->user_id;
                    $s = $users = DB::table('stripe')
                        ->first();
                    $stripe_pub_key = $s->stripe_pub_key;
                    $stripe_sec_key = $s->stripe_sec_key;
                    \Stripe\Stripe::setApiKey($stripe_sec_key);
                    $sub = \Stripe\Subscription::retrieve($subscription_id);
                    $sub->cancel();
                }

                $pr->end_date = date('Y-m-d H:i:s');
                $pr->is_active = 0;
                $pr->save();

            }


            $p = User::where('id', $request->id)->first();
            $p->is_subscribed = 0;
            $p->save();
        }
        if ($request->manually_subdcribe == "on") {
            $end_date = $request->manually_subdcribe_date;
            $end_date = $end_date . " " . date('H:i:s');

            Premium_user::where('user_id', $request->id)->where('is_manually', 1)->delete();
            Premium_user::insert([
                'user_id' => $request->id,
                'created_at' => date('Y-m-d H:i:s'),
                'end_date' => $end_date,
                'status' => 'premium',
                'price' => 0,
                'subscription_id' => "",
                'plan_id' => "",
                'is_manually' => 1
            ]);
        } else {
            Premium_user::where('user_id', $request->id)->where('is_manually', 1)->delete();
        }

        return redirect()->back()->with("success", "Profile Successfully Updated !");
    }

    public function adminDashbaordUserDelete($id)
    {
        if (Auth::check() && Auth::user()->type === 'admin') {
            Payment::where('user_id', $id)->delete();
            Premium_user::where('user_id', $id)->delete();
            Favorite::where('user_id', $id)->delete();
            $user = User::destroy($id);
            if ($user) {
                return redirect()->back()->with('success', 'User successfully deleted !');
            } else {
                return redirect()->back()->with('danger', 'User could not deleted !');
            }
        } else {
            redirect('/');
        }
    }


    public function adminNewproducts()
    {

        return view('admins.product-add');
    }


}

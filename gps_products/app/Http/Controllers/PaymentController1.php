<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;
use App\Premium_user;
use StdClass;
use Stripe\Stripe;
use Stripe\Charge;
use Carbon\Carbon;
use Nexmo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function addNewCard(Request $request)
    {


        // $this->validate($request, [
        //     'card_number' => 'required|size:16|unique:payments',
        //     'expire_date' => 'required',
        //     'cvv' => 'required|size:3',
        //     'cardholder_name' => 'required',
        // ]);

        // $p = Payment::where('user_id', Auth::user()->id)->get();

        // if ($p->count() == 2) {
        //     return redirect()->route('payment-view')->with('error', "You can not add more than 2 Credit cards!");
        // }

        // Payment::insert([
        //     'user_id' => Auth::user()->id,
        //     'card_number' => $request->card_number,
        //     'expire_date' => $request->expire_date,
        //     'cvv' => $request->cvv,
        //     'referal_id' => $request->referal_id,
        //     'cardholder_name' => $request->cardholder_name,
        //     //'country'         => $request->country,
        // ]);

   




require_once base_path('vendor/stripe-php-master/init.php');
  $token  = $_POST['stripeToken'];
       $email  = $_POST['stripeEmail'];
        $p = User::where('id', Auth::user()->id)->first();
        $stripe_customer_id=$p->stripe_customer_id;

           $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
            $stripe_sec_key= $s->stripe_sec_key;
             require_once base_path('vendor/stripe-php-master/init.php');     
             \Stripe\Stripe::setApiKey($stripe_sec_key);

    











        $body="";
        //$stripe_customer_id="";

        if($stripe_customer_id==""){
////---
            
          $current_date=date('Y-m-d');
       $end_date=date("Y-m-t");
       $month_days=date('t');
       $current_month=date('t');
       $amount_payment=499/30;
       $timestamp_differance=strtotime($current_date)-strtotime($end_date);
       $number_days_remain=round($timestamp_differance / (60 * 60 * 24));
       $t = $users = DB::table('trial_days')
            ->first();
      $trial_days=$t->days;
      $trial_period_date=date("Y-m-d", strtotime($current_date.'+'.$trial_days.' days'));
      if($trial_period_date==$end_date){
          $first_payment_start_date=$trial_period_date;
          $number_days_charge=$month_days;
          $amount_payment=$amount_payment;


      }else{
           $trial_end_month=date('m',strtotime($trial_period_date));
        if($current_month!=$trial_end_month){
           $trial_period_date1=date('Y-m-t',strtotime($trial_period_date));
           $timestamp_differance=strtotime($trial_period_date1)-strtotime($trial_period_date); 
           $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
           $first_payment_start_date=$trial_period_date;
           $trial_period_date=$trial_period_date1;
           $amount_payment=round($amount_payment*$number_days_charge);


        }else{
           $first_payment_start_date=$trial_period_date;
           $timestamp_differance=strtotime($trial_period_date)-strtotime($end_date); 
           $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
           $trial_period_date=$end_date;
           $amount_payment=round($amount_payment*$number_days_charge);

        }




      }
$plan_id="";

       try {

$plan=\Stripe\Plan::create(array(
  "amount" => $amount_payment,
  "name" => "trial",
  "currency" => "usd",
  "interval"=> "day",
  "interval_count"=> $number_days_charge,
));
$plan_id=$plan->id;

            
     }catch (\Exception $e) {
    $error=$e->getMessage();
}





//----
       
     
        try {
         
                           
  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));   
  $body="Credit card has been added"; 
  $stripe_customer_id=$customer->id;  
  $card_id=$customer->sources->data[0]->id;  
  $card_number=$customer->sources->data[0]->last4;  
  $expire_date=$customer->sources->data[0]->exp_month."/".$customer->sources->data[0]->exp_year; 
  $country= $customer->sources->data[0]->country;  

  $p->stripe_customer_id =  $stripe_customer_id;  
  $p->is_subscribed =  1;  
  $p->save();   

  Payment::insert([
            'user_id' => Auth::user()->id,
            'card_number' => $card_number,
            'expire_date' => $expire_date,
            'country' => $country,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'stripe_card_id' => $card_id
        ]);

                        
                    }catch (\Exception $e) {
    $body=$e->getMessage();
}

$subscription = \Stripe\Subscription::create([
    'customer' => $stripe_customer_id,
    'items' => [['plan' => $plan_id]],
    'trial_end' => strtotime($first_payment_start_date),
]);

$subscription_id=$subscription->id;
$end_date=$subscription->current_period_end;



    // Premium_user::insert([
    //         'user_id' => Auth::user()->id,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'end_date' => date('Y-m-d H:i:s', $end_date),
    //         'status' => 'trial',
    //         'price' => '0',
    //         'subscription_id' => $subscription_id,
    //         'plan_id' => $plan_id 
    //     ]);



        }else{

           

        try {
            
             $customer = \Stripe\Customer::retrieve($stripe_customer_id);
             $customer->sources->create(array("source" => $token));
             for ($i=0; $i <count($customer->sources->data) ; $i++) { 
                
  $card_id=$customer->sources->data[$i]->id;  
  $card_number=$customer->sources->data[$i]->last4;  
  $expire_date=$customer->sources->data[$i]->exp_month."/".$customer->sources->data[$i]->exp_year; 
  $country= $customer->sources->data[$i]->country;  

  $c= Payment::where('user_id', Auth::user()->id)->where('stripe_card_id',$card_id)->get();
  if(count($c)==0){
    Payment::insert([
            'user_id' => Auth::user()->id,
            'card_number' => $card_number,
            'expire_date' => $expire_date,
            'country' => $country,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'stripe_card_id' => $card_id
        ]);
  }

  
             }
              $body="Credit card has been added"; 
                            }catch (\Exception $e) {
    $body=$e->getMessage();
}
        }


   


     


        return redirect()->route('payment-view')->with('success', $body);

    }

    public function removeCard($id)
    {
        $body="";
        $arr['status'] = 1;
        $p = Payment::where('user_id', Auth::user()->id)->get();
        $p1 = array();
        foreach ($p as $key => $value) {
            $p1[$value->id] = $value->id;
            
        }
        if ($p->count() <= 1) {
            $arr['status'] = 0;
            $arr['message'] = "You can not delete this card!";
        } else {

            $flight = Payment::find($id);
            $stripe_card_id=$flight->stripe_card_id;
    if($stripe_card_id!=""){
           $u = User::where('id', Auth::user()->id)->first();
        $stripe_customer_id=$u->stripe_customer_id;

          $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
            $stripe_sec_key= $s->stripe_sec_key;
             try {
            require_once base_path('vendor/stripe-php-master/init.php');       
          \Stripe\Stripe::setApiKey($stripe_sec_key);

       $customer = \Stripe\Customer::retrieve($stripe_customer_id);
       $customer->sources->retrieve($stripe_card_id)->delete();
       $body="Successfully removed card";
                        }catch (\Exception $e) {
    $body=$e->getMessage();
}
    }
     


            
            $flight->delete();
            if (isset($p1[$id]))
                unset($p1[$id]);
        }
        $arr['a'] = array();
        if ($p1)
            $arr['a'] = array_keys($p1);
            $arr['stripe'] = $body;
        echo json_encode($arr);
        die;
    }


    public function paymentPageView()
    {

        $user = User::where('id', Auth::user()->id)->first();
       

        $p = Payment::where('user_id', Auth::user()->id)->get();
        $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
        return view('premium-payments', ['cards' => $p,'user'=>$user,'stripe_pub_key'=>$stripe_pub_key]);
    }

    public function paymentPremiumFormView()
    {
        $account = Auth::user()->payment;
        return view('premium-payment-form', compact('account'));
    }

    public function UserPremiumPaymentStripe(Request $request)
    {
        ini_set('memory_limit', '1024M');

        $this->validate($request, [
            'card-number' => 'required|size:16',
            'card-cvc' => 'required|size:3',
            'card-expiry-month' => 'required|size:2',
            'card-expiry-year' => 'required|size:4',
        ]);

        Stripe::setApiKey('sk_test_70rM9IIXsLvQQr7HeFjAMwg2');

        try {
            Charge::create(array(
                "amount" => 50,
                "currency" => "usd",
                "source" => $request['stripeToken'],
                "description" => "change for Premium Accounts",
            ));
        } catch (Exception $e) {
            return redirect()->route('payment-view')->with('error', $e->getMessage());
        }

        $one_month = Carbon::now()->addMonths(1);

        Premium_user::insert([
            'user_id' => Auth::user()->id,
            'end_date' => date('Y-m-d H:i:s', strtotime($one_month)),
            'status' => 'premium',
            'price' => '4.99',
        ]);

        Nexmo::message()->send([
            'to' => Auth::user()->phone_number,
            'from' => '12819791976',
            'text' => 'Your Payment Successfully Completed.'
        ]);


        return redirect()->back()->with('success', 'Your Payment Successfully Completed !');


    }

    public function stripewebhook(Request $request)
    {
         $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
            $stripe_sec_key= $s->stripe_sec_key;
    \Stripe\Stripe::setApiKey($stripe_sec_key);

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);
if($event_json->type=="invoice.payment_succeeded"){
$stripe_charge_id=$event_json->data->object->charge;
$stripe_customer_id=$event_json->data->object->customer;
// print_r($event_json->data->object->lines->data[0]->period->start);
// echo "<br>";
$end_date=$event_json->data->object->lines->data[0]->period->end;
$amount=$event_json->data->object->lines->data[0]->amount;
$subscription_id=$event_json->data->object->subscription;
 $plan_id=$event_json->data->object->lines->data[0]->plan->id;

$p = User::where('stripe_customer_id',$stripe_customer_id)->first();
        $user_id=$p->id;
        $pr = Premium_user::where('plan_id',$plan_id)->first();
       
        $fprimium_status=0;
        if($pr){
 $status=$pr->status;
 if($status=="trial"){

          $sub = \Stripe\Subscription::retrieve($subscription_id);
          $sub->cancel();

          $plan_id="";
          $amount_payment="499";

       try {

$plan=\Stripe\Plan::create(array(
  "amount" => $amount_payment,
  "name" => "Primium all",
  "currency" => "usd",
  "interval"=> "month",
  "interval_count"=> 1,
));
$plan_id=$plan->id;

            
     }catch (\Exception $e) {
    $error=$e->getMessage();
}

$subscription = \Stripe\Subscription::create([
    'customer' => $stripe_customer_id,
    'items' => [['plan' => $plan_id]],
    'trial_end' => strtotime($first_payment_start_date),
]);

$subscription_id=$subscription->id;
$end_date=$subscription->current_period_end;
$fprimium_status=1;
}


 Premium_user::insert([
            'user_id' =>  $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s', $end_date),
            'status' => 'premium',
            'price' => $amount,
            'subscription_id' => $subscription_id,
            'plan_id' => $plan_id, 
            'stripe_charge_id' => $stripe_charge_id,
            'fprimium_status' => $fprimium_status
        ]);


        }else{

          
           Premium_user::insert([
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s', $end_date),
            'status' => 'trial',
            'price' => '0',
            'subscription_id' => $subscription_id,
            'plan_id' => $plan_id 
        ]);

        }


       


}




    }


}

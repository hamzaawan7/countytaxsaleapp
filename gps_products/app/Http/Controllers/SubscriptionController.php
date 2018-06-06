<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Premium_user;
use App\Payment;
use App\TrialAmounts;
use App\Product;
use App\Auction;
use Session;
use Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    //
    public function subscriptionView()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            // $now = Carbon::now();
          $now=date("Y-m-d H:i:s");
            $premiums = Premium_user::where('user_id', Auth::user()->id)->where('is_active',1)->orderBy('id', 'DESC')->first();
            // echo "<pre>";
            // print_r($premiums);
            // die;

        //       echo "<pre>";
        // print_r($premiums);
        // die;

          //  ->where('end_date', '>=', $now)

           if($premiums){
            if($premiums->end_date<$now){
             //$premiums=false;
            }
        }else{
             $premiums=false;
        }



       $card = Payment::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
       if($card){
        return view('subscription-list',array('premiums'=>$premiums,'is_subscribed'=>$user->is_subscribed));
        }else{

        return redirect('payment-view')->with('warning', 'Card Credentials should be verified to use account !!');
      }
    } else {
            return redirect()->back()->with('warning', 'Card Credentials should be verified to use account !!');
        }
    }

    public function unsubscribe(){
      $pr = Premium_user::where('user_id',Auth::user()->id)->where('is_active',1)->orderBy('id', 'desc')->first();
      if($pr){
         $subscription_id=$pr->subscription_id;
          if($subscription_id!=""){
        
           $user_id=$pr->user_id;
        $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
            $stripe_sec_key= $s->stripe_sec_key;
    \Stripe\Stripe::setApiKey($stripe_sec_key);
      $sub = \Stripe\Subscription::retrieve($subscription_id);
     $sub->cancel();

    

      
        
      }
       $pr->end_date=date('Y-m-d H:i:s');
       $pr->is_active=0;
       $pr->save(); 
      }
   
 
     
     

        $p = User::where('id', Auth::user()->id)->first();
        $p->is_subscribed =  0;  
        $p->save(); 
      
         return redirect('subscriptions')->with('success', 'Successfully Unsubscribed');
    }

    public function subscribe(){
        require_once base_path('vendor/stripe-php-master/init.php');
  // $token  = $_POST['stripeToken'];
  //      $email  = $_POST['stripeEmail'];
        $id=Auth::user()->id;
        $p = User::where('id', $id)->first();
        $stripe_customer_id=$p->stripe_customer_id;
         $amount_table = TrialAmounts::find(1);
      $dynemic_charge=($amount_table->amount)*100;

           $s = $users = DB::table('stripe')
            ->first();
            $stripe_pub_key= $s->stripe_pub_key;
            $stripe_sec_key= $s->stripe_sec_key;
             require_once base_path('vendor/stripe-php-master/init.php');     
             \Stripe\Stripe::setApiKey($stripe_sec_key);

    











        $body="";
        //$stripe_customer_id="";

        if($stripe_customer_id!=""){
////---
       $current_date_time=date('Y-m-d H:i:s');  
       $current_date=date('Y-m-d');
       $end_date=date("Y-m-t");
       $month_days=date('t');
       $current_month=date('m');
       $amount_payment=$dynemic_charge/30;
       $timestamp_differance=strtotime($current_date)-strtotime($end_date);
       $number_days_remain=round($timestamp_differance / (60 * 60 * 24));
       $t = $users = DB::table('premium_users')->where('user_id', $id)->orderBy('id','DESC')->first();


      $trial_days=0;
       // if($t){
      
       //  $tt_d=$t->end_date;
       //  $tt_status=$t->status;
       //   if($tt_status=="trial" && $tt_d > $current_date_time){
       //   $timestamp_differance=strtotime($tt_d)-strtotime($current_date_time);
       //    $trial_days=$number_days_remain=round($timestamp_differance / (60 * 60 * 24));
            
       //    }
       //    // if($tt_status=="trial"){
       //    //   //$t->forceDelete();
       //    // }
       // }


       if($trial_days==0){
        $plan_name="premium1";
        $trial_period_end_date=date("Y-m-d H:i:s", strtotime($current_date_time));
        $subsction_start_date="now";
        $end_date_subscription=date("Y-m-t H:i:s", strtotime($current_date_time));
        $timestamp_differance=strtotime($end_date_subscription)-strtotime($trial_period_end_date); 
        $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
        if($number_days_charge==0){
          $number_days_charge=1;
        }
        $amount_payment=round($amount_payment*$number_days_charge);
       }else{
        $plan_name="trial";
        $trial_period_end_date=date("Y-m-d H:i:s", strtotime($current_date_time.'+'.$trial_days.' days'));
        $subsction_start_date=strtotime($trial_period_end_date);
        $end_date_subscription=date("Y-m-t H:i:s", strtotime($trial_period_end_date));
        // echo "S".$trial_period_end_date;
        // echo "<br>";
        // echo "E".$end_date_subscription;
        // die;
        $timestamp_differance=strtotime($end_date_subscription)-strtotime($trial_period_end_date); 
        $number_days_charge=round($timestamp_differance / (60 * 60 * 24));
        $amount_payment=round($amount_payment*$number_days_charge);
        if($number_days_charge==0){
          $number_days_charge=1;
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

      


$plan_id="";




       try {

$plan=\Stripe\Plan::create(array(
  "amount" => $amount_payment,
  "name" => $plan_name,
  "currency" => "usd",
  "interval"=> "day",
  "interval_count"=> $number_days_charge,
));
$plan_id=$plan->id;

            
     }catch (\Exception $e) {
    $error=$e->getMessage();
  


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
    'trial_end' =>$subsction_start_date ,
]);

$subscription_id=$subscription->id;
$end_date=$subscription->current_period_end;
 $p->is_subscribed =  1;  
  $p->save();  
   
    

}

sleep(7);

return redirect('subscriptions')->with('success', 'Successfully Subscribed');
    }


    public function SubscriptionBid(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'biding_price' => 'required|numeric',
        ]);

        if ($validator->passes()) {
            $auction = Auction::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if ($auction->price >= $request->biding_price) {

                return response()->json(['success' => $auction->price]);

            } else {

                $checks = Auction::where('user_id', '!=', Auth::user()->id)->where('product_id', $request->id)->first();

                if (count($checks) < 0) {

                    Auction::insert([
                        'user_id' => Auth::user()->id,
                        'product_id' => $request->id,
                        'price' => $request->biding_price,
                    ]);

                    return response()->json(['success' => 'Product Successfully bids.']);

                } else {

                    return response()->json(['success' => 'Your Already  bids.']);

                }


            }


        }

        return response()->json(['error' => 'empty new records.']);


        //return response()->json(['error'=>$validator->errors()->all()]);


    }


}

<?php

namespace App\Http\Controllers;

use App\AuctionDate;
use App\Favorite;
use App\HomepageQuestions;
use App\TrialAmounts;
use App\TrialDays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Premium_user;
use App\Product;
use App\Payment;
use Nexmo;
use Session;
use Hash;
use Stripe\Charge;
use Stripe\Stripe;
use Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            if (Auth::user()->type === 'admin') {
                return redirect('admin-dashboard');
            } else {
                if (Auth::user()->is_nexmo_verified) {
                    if (Auth::user()->is_credit_info) {
                        return redirect('dashboard');
                    } else {
                        return redirect('signup-credit-card-info')->with('warning', 'Please Give the Credit Card Information !');
                    }
                } else {
                    return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
                }
            }
        }
        $questions = HomepageQuestions::get();
        return view('homepage', compact('questions'));
    }

    public function loginViewform()
    {
        if (Auth::check()) {
            if (Auth::user()->type === 'admin') {
                return redirect('admin-dashboard');
            } else {
                if (Auth::user()->is_nexmo_verified) {
                    if (Auth::user()->is_credit_info) {
                        return redirect('dashboard');
                    } else {
                        return redirect('signup-credit-card-info')->with('warning', 'Please Give the Credit Card Information !');
                    }
                } else {
                    return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
                }
            }
        }
        $auction_date = AuctionDate::find(1);
        return view('index', compact('auction_date'));
    }

    public function UserloggedIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active', 'type' => 'user'])) {
            $now = Carbon::now();
            $premiums = Premium_user::where('user_id', Auth::user()->id)->where('end_date', '>=', $now)->orderBy('id', 'DESC')->first();
            if (Auth::user()->is_nexmo_verified) {
                if ($premiums) {
                    return redirect('dashboard')->with('success', 'You are now Signed In');
                } else {
                    return redirect()->route('payment-view')->with('error', 'Card Credentials should be verified to use account !!');
                    // return redirect('signup-credit-card-info')->with('warning', 'Card Credentials should be verified to use account !!');
                }
            } else {
                return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
            }
        } else {
            return redirect()->back()->with('warning', 'Username or Password Does not match !!');
        }
    }

    public function signupViewform()
    {
        $trial_days = TrialDays::find(1);
        $trial_amount = TrialAmounts::find(1);
        return view('signup', compact('trial_days', 'trial_amount'));
    }

    public function userForgotWhat()
    {
        return view('forgot-what');
    }

    public function userForgotUsername()
    {
        return view('forgot-username');
    }

    public function userForgotPassword()
    {
        return view('forgot-password');
    }

    public function userSendUsername(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|min:10|max:10',
        ]);
        try {
            $user = User::where('phone_number', $request->phone_number)->first();

            Nexmo::message()->send([
                'to' => '1' . $request->phone_number,
                'from' => '12015100626',
                'text' => 'Your username is : ' . $user->email
            ]);
            return redirect('login')->with('success', 'Message has been Successfully Sent!');
        } catch (Nexmo\Client\Exception\Request $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    public function signupUserByPhone(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|unique:users|min:10|max:10',
        ]);
        try {
            $verification = Nexmo::verify()->start([
                'number' => "1" . $request->phone_number,
                'brand' => 'Nexmo Verify Test'
            ]);
            Session::put('uEmail', $request->email);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone_number' => $request->phone_number,
                'trial_days' => TrialDays::find(1),
            ]);

            $tomorrow = Carbon::now()->addMonths(1);

            $user = User::orderBy('id', 'DESC')->first();

            Premium_user::insert([
                'user_id' => $user->id,
                'end_date' => date('Y-m-d H:i:s', strtotime($tomorrow)),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $request->session()->put('verify:user:id', $user->id);
            $request->session()->put('verify:request_id', $verification->getRequestId());

            return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
        } catch (Nexmo\Client\Exception\Request $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }


    public function signupViewPhoneform()
    {
        return view('signup-phone');
    }

    public function signupCreditCardInfo()
    {
        return redirect('payment-view')->with('success', '');
        //    return view('signup-credit-card-info');
    }

    public function signupCreditCard(Request $request)
    {
        $this->validate($request, [
            'card_number' => 'required|size:16|unique:payments',
            'expire_date' => 'required',
            'cvv' => 'required|size:3',
            //'referal_id' 		=> 'size:10|unique:payments',
            'cardholder_name' => 'required',
            //'country' 			=> 'required',
        ]);

        Stripe::setApiKey('sk_test_70rM9IIXsLvQQr7HeFjAMwg2');

        if (Auth::check()) {
            Payment::insert([
                'user_id' => Auth::user()->id,
                'card_number' => $request->card_number,
                'expire_date' => $request->expire_date,
                'cvv' => $request->cvv,
                'referal_id' => $request->referal_id,
                'cardholder_name' => $request->cardholder_name,
                //'country'			=> $request->country,
            ]);

            User::where('id', Auth::user()->id)->update([
                'is_credit_info' => 1,
            ]);

            Auth::logout();

            return redirect()->back()->with('modal', 'Modal');

        }

        return redirect()->back()->with('success', 'Please Provide Correct Information !');

    }

    public function UserDashbaordMainView()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            $now = Carbon::now();
            if (Auth::user()->is_nexmo_verified) {
                $payments = Payment::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
                if(!$payments){
                    return redirect('payment-view')->with('warning', 'Card Credentials should be verified to use account !!'); 
                }
                $premiums = Premium_user::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
                // echo "<pre>";
                // print_r($premiums);
                // die;

                if ($premiums) {
                    if ($premiums->is_active == 0) {

                        return redirect('subscriptions')->with('warning', 'You can use after once subscribe');

                    } else {
                        $auction_date = AuctionDate::find(1);
                        return view('dashboard-new', compact('products', 'auction_date'));
                    }


                } else {
                    return redirect('payment-view')->with('warning', 'Card Credentials should be verified to use account !!');
                }
            } else {
                return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
            }
        } else {
            return redirect()->back()->with('warning', 'Card Credentials should be verified to use account !!');
        }
    }

    public function UserDashbaordView()
    {
        if (isset($_REQUEST['lat']) && $_REQUEST['lat'] && isset($_REQUEST['lng']) && $_REQUEST['lng']) {
            $lats = $_REQUEST['lat'];
            $lngs = $_REQUEST['lng'];
            $haversine = "(6371 * acos(cos(radians($lats)) * cos(radians(lat)) * cos(radians(lng) - radians($lngs)) + sin(radians($lats)) * sin(radians(lat))))";
            /*$radius = 10;*/
            /*if (isset($_REQUEST['radius']) && $_REQUEST['radius'])
                $radius = $_REQUEST['radius'] / 1603;*/

            $products = Product::selectRaw("*,{$haversine} AS distance")
                ->where('status', '!=', 'remove')
                //->whereRaw("{$haversine} < ?", [$radius])
                ->orderBy('id', 'DESC')
                ->distinct()
                ->get();

            $arr = array();
            foreach ($products as $k => $product) {
                $color = "";
                if ($product->status == "active") {
                    $color = "green";
                } else if ($product->status == "cancelled") {
                    $color = "red";
                }
                $heart = "";
                $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
                if (!empty($favorite ) > 0) {
                    $heart = "#E24244";
                } else {
                    $heart = "#eee";
                }
                $arr[$k]['lat'] = $product->lat;
                $arr[$k]['lng'] = $product->lng;
                $arr[$k]['name'] = "<a href='http://maps.google.com/maps?q=$product->address' target='_blank'>$product->address</a>";
                $arr[$k]['title'] = $product->address;
                $arr[$k]['status'] = $product->status;
                $arr[$k]['address1'] = "<img src='" . $product->image_url . "' class='img_maps'>";
                $arr[$k]['address2'] = "<p>
                                        <span class='pro_price'>" . $product->min_bid . "</span> 
                                        Starting Bid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href=" . route('add-favorite-reload', ['id' => $product->id]) . " style='color: " . $heart . "'>
                                            <i class='fa fa-heart'></i>
                                        </a>
                                        </p>";
                $arr[$k]['postalCode'] = "<p class='auc_online'> Status: <span style='color : " . $color . "'>" . $product->status . "</span> </p><p class='text-center'><a href='" . route('products-views', ['id' => $product->id]) . "' class='btn btn-info'>Details</a></p>";
            }
            echo json_encode($arr);
            die;
        }


        $now = Carbon::now();

        $payments = Payment::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
                if(!$payments){
                    return redirect('payment-view')->with('warning', 'Card Credentials should be verified to use account !!'); 
                }
        $premiums = Premium_user::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        if ($premiums) {
            if ($premiums->is_active == 0) {

                return redirect('subscriptions')->with('warning', 'You can use after once subscribe');

            } else {
                $products = Product::where('status', '!=', 'remove')->orderBy('id', 'DESC')->get();
                return view('dashboard', compact('products'));
            }


        } else {

            return redirect('signup-credit-card-info')->with('warning', 'Card Credentials should be verified to use account !!');

        }


    }


    public function singleProductView($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            $now = Carbon::now();
            if (Auth::user()->is_nexmo_verified) {

                $premiums = Premium_user::where('user_id', Auth::user()->id)->where('end_date', '>=', $now)->orderBy('id', 'DESC')->first();
                if ($premiums) {

                    $product = Product::where('id', $id)->first();
                    return view('single-products', compact('product'));

                } else {
                    return redirect('signup-credit-card-info')->with('warning', 'Card Credentials should be verified to use account !!');
                }
            } else {
                return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
            }
        } else {
            return redirect()->back()->with('warning', 'Card Credentials should be verified to use account !!');

        }
    }

    public function singleProductViewDetails($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            $now = Carbon::now();
            if (Auth::user()->is_nexmo_verified) {
                $premiums = Premium_user::where('user_id', Auth::user()->id)->where('end_date', '>=', $now)->orderBy('id', 'DESC')->first();
                if ($premiums) {
                    $product = Product::where('id', $id)->first();
                    return view('products-details', compact('product'));
                } else {
                    return redirect('signup-credit-card-info')->with('warning', 'Card Credentials should be verified to use account !!');
                }
            } else {
                return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
            }
        } else {
            return redirect()->back()->with('warning', 'Card Credentials should be verified to use account !!');
        }
    }
}

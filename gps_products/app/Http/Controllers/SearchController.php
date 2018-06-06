<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Premium_user;
use App\Payment;
use App\Product;
use Session;
use Hash;
use Carbon\Carbon;


class SearchController extends Controller
{

    public function SearchResultsViewFilter()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            $now = Carbon::now();
            if (Auth::user()->is_nexmo_verified) {
                $premiums = Premium_user::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
                if ($premiums) {
                    if ($premiums->is_active == 0) {
                        return redirect('subscriptions')->with('warning', 'You can use after once subscribe');
                    } else {
                        return view('search-results');
                    }

                } else {
                    return redirect('payment-view')->with('success', 'Please Renew Your Account !');
                }
            } else {
                return redirect('verify')->with('success', 'Please Provide 4 digit Validate Code !');
            }
        } else {
            return redirect()->back()->with('warning', 'Card Credentials should be verified to use account !!');
        }
    }

    public function productSearchResults(Request $request)
    {

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

                    }else{
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $lat = $geo['geoplugin_latitude'];
        if ($lat == '') {
            $lats = 40.712775;
        } else {
            $lats = $lat;
        }
        $lng = $geo['geoplugin_longitude'];
        if ($lng == '') {
            $lngs = -95.32169469999997;
        } else {
            $lngs = $lng;
        }
        // echo  $lats.$lngs;

        $haversine = "(6371 * acos(cos(radians($lats)) * cos(radians(lat)) * cos(radians(lng) - radians($lngs)) + sin(radians($lats)) * sin(radians(lat))))";
        $radius = 10;

        $products = Product::where(function ($query) use ($request) {
            $query->orWhere('address', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('zipcode', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('account', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('cause', 'like', '%' . $request->get('search') . '%');
        })
            //->selectRaw("*,{$haversine} AS distance")
            ->where('status', '!=', 'remove')
            //->whereRaw("{$haversine} < ?", [$radius])
            ->orderBy('id', 'DESC')
            ->distinct()
            ->paginate(15);

        // print_r($products); die;
        return view('search-view', compact('products'));
    }
}
    }


    public function productFilterSearchResults(Request $request)
    {
        $precincts = $request->get('precinct');

        $products = Product::where(function ($query) use ($request) {
            if ($precinct = $request->get('precinct')) {
                foreach ($precinct as $pre => $names) {
                    $query->orWhere('precinct', 'like', '%' . $names . '%');
                }
            }
        })->where(function ($query) use ($request) {
            $query->orWhere('address', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('zipcode', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('account', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('cause', 'like', '%' . $request->get('search') . '%');
        })
            ->where('status', '!=', 'remove')
            ->orderBy('id', 'DESC')
            ->distinct()
            ->paginate(15);
        //return $products;

        return view('search-result-pre', compact('products', 'precincts'));


    }

    public function productPrecinctFilterSearchResults(Request $request)
    {
        $products = Product::where(function ($query) use ($request) {
            if ($precinct = $request->get('precinct')) {
                foreach ($precinct as $pre => $names) {
                    $query->orWhere('precinct', 'like', '%' . $names . '%');
                }
            }
        })->where(function ($query) use ($request) {
            $query->orWhere('address', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('zipcode', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('account', 'like', '%' . $request->get('search') . '%');
            $query->orWhere('cause', 'like', '%' . $request->get('search') . '%');
        })
            ->where('status', '!=', 'remove')
            ->orderBy('id', 'DESC')
            ->distinct()
            ->paginate(15);

        //return $products;

        return view('search-view', compact('products'));


    }

    public function productFilterMultiSearchResults(Request $request)
    {
        $products = Product::where(function ($query) use ($request) {
            if ($precinct = $request->get('precinct')) {
                foreach ($precinct as $pre => $names) {
                    $query->orWhere('precinct', 'like', '%' . $names . '%');
                }
            }
        })
            ->where(function ($query) use ($request) {
                $query->orWhere('address', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('zipcode', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('account', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('cause', 'like', '%' . $request->get('search') . '%');
            })
            ->where('status', '!=', 'remove')
            ->orderBy('id', 'DESC')
            ->distinct()
            ->paginate(15);

        /*$adjudged_value = number_format($request->get('adjudged_value'), 2);
        $bid_amount = number_format($request->get('bid_amount'), 2);*/
        $adjudged_value = $request->get('adjudged_value');
        $bid_amount = $request->get('bid_amount');
        $landsf = $request->get('land_sqft');
        $livingsf = $request->get('area_sqft');

        foreach ($products as $key => $product) {
            $product_adjudged_value = str_replace(",", "", $product->adjudged_value);
            $product_adjudged_value = substr($product_adjudged_value, 1, -3);
            $product_adjudged_value = intval($product_adjudged_value);
            $product_bid_value = str_replace(",", "", $product->min_bid);
            $product_bid_value = substr($product_bid_value, 1, -3);
            $product_bid_value = intval($product_bid_value);
            $product_land_sf = str_replace(",", "", $product->land_sf);
            $product_land_sf = intval($product_land_sf);
            $product_living_sf = str_replace(",", "", $product->land_sf);
            $product_living_sf = intval($product_living_sf);
            if ($product_adjudged_value < 1000 || $adjudged_value <= $product_adjudged_value) {
                unset($products[$key]);
            }
            if ($product_bid_value < 1000 || $bid_amount <= $product_bid_value) {
                unset($products[$key]);
            }
            if ($landsf <= $product_land_sf) {
                unset($products[$key]);
            }
            if ($livingsf <= $product_living_sf) {
                unset($products[$key]);
            }
        }
        return view('search-view', compact('products'));


    }


}

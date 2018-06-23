<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Premium_user;
use App\Payment;
use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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
        if (!$payments) {
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
        $low_bid_value = $request->get('low_bid_value');
        $high_bid_value = $request->get('high_bid_value');
        $low_adjudged_value = $request->get('low_adjudged_value');
        $high_adjudged_value = $request->get('high_adjudged_value');
        $low_land_value = $request->get('low_land_value');
        $high_land_value = $request->get('high_land_value');
        $low_living_value = $request->get('low_building_value');
        $high_living_value = $request->get('high_building_value');

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
            ->where(function ($query) use ($low_bid_value, $high_bid_value) {
                $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(min_bid,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) >= ' . $low_bid_value);
                if ($high_bid_value != 100000) {
                    $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(min_bid,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) <= ' . $high_bid_value);
                }
            })
            ->where(function ($query) use ($low_adjudged_value, $high_adjudged_value) {
                $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(adjudged_value,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) >= ' . $low_adjudged_value);
                if ($high_adjudged_value != 100000) {
                    $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(adjudged_value,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) <= ' . $high_adjudged_value);
                }
            })
            ->where(function ($query) use ($low_land_value, $high_land_value) {
                $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(land_sf,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) >= ' . $low_land_value);
                if ($high_land_value != 10000) {
                    $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(land_sf,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) <= ' . $high_land_value);
                }
            })
            ->where(function ($query) use ($low_living_value, $high_living_value) {
                $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(living_sf,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) >= ' . $low_living_value);
                if ($high_living_value != 10000) {
                    $query->whereRaw('CAST(REPLACE(REPLACE(IFNULL(living_sf,0),\',\',\'\'),\'$\',\'\') AS DECIMAL(10,0)) <= ' . $high_living_value);
                }
            })
            ->where('status', '!=', 'remove')
            ->orderBy('id', 'DESC')
            ->distinct()
            ->paginate(15);

        return view('search-view', compact('products'));
    }
}

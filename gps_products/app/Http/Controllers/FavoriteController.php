<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Premium_user;
use App\Payment;
use App\Product;
use App\Favorite;
use Session;
use Hash;
use Carbon\Carbon;


class FavoriteController extends Controller
{
    //
    public function favoritesView()
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
                $favorites = Favorite::where('user_id', Auth::user()->id)->get();
                return view('favorites', compact('favorites'));
            }


        }

        // $now = Carbon::now();
        // $premiums = Premium_user::where('user_id', Auth::user()->id)->where('end_date','>=' ,$now )->orderBy('id','DESC')->first();

        // if($premiums){

        //


        // }else{

        // 	return redirect('payment-view')->with('success','Please Renew Your Account !');

        // }


    }

    public function favoriteAddProduct($id)
    {

        if (Product::find($id)->status !== 'active') {
            $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($favorite) {
                Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
                echo 0;
                /*return redirect()->back()->with("danger", "Property Successfully Removed From Favorite !");*/
            } else {
                /*return redirect()->back()->with("danger", "Property couldn't added to favorite because it's status is not active!");*/
            }
        } else {
            $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($favorite) {
                Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
                echo 0;
                /*return redirect()->back()->with("danger", "Property Successfully Removed From Favorite !");*/
            } else {
                Favorite::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                echo 1;
            }
            /*return redirect()->back()->with("success", "Property Successfully Added To Favorite !");*/
        }

    }

    public function favoriteAddProductReload($id)
    {

        if (Product::find($id)->status !== 'active') {
            $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($favorite) {
                Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
                return redirect()->back()->with("danger", "Property Successfully Removed From Favorite !");
            } else {
                return redirect()->back()->with("danger", "Property couldn't added to favorite because it's status is not active!");
            }
        } else {
            $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($favorite) {
                Favorite::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
                return redirect()->back()->with("danger", "Property Successfully Removed From Favorite !");
            } else {
                Favorite::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
            return redirect()->back()->with("success", "Property Successfully Added To Favorite !");
        }

    }

    public function exportFavorites(){
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=property_favorites.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $favorites = Favorite::where(['user_id' => Auth::user()->id])->get();
        $columns = array(
            'Address',
            'Precinct',
            'Sale#',
            'OwnerName',
            'MailingAdd',
            'Type',
            'LandSF',
            'LivingSF',
            'ExemptionType',
            'Account#',
            'Cause#',
            'Judgement',
            'Tax Years',
            'Min Bid',
            'Adjudged Value',
            'Status',
            'Description'
        );

        $callback = function() use ($favorites, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($favorites as $favorite) {
                fputcsv($file, array(
                    $favorite->product->address,
                    $favorite->product->precinct,
                    $favorite->product->sale,
                    $favorite->product->type,
                    $favorite->product->owner_name,
                    $favorite->product->mailing_add,
                    $favorite->product->land_sf,
                    $favorite->product->living_sf,
                    $favorite->product->exemption_type,
                    $favorite->product->account,
                    $favorite->product->cause,
                    $favorite->product->judgement,
                    $favorite->product->tax_years,
                    $favorite->product->min_bid,
                    $favorite->product->adjudged_value,
                    $favorite->product->status,
                    $favorite->product->description
                ));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

}

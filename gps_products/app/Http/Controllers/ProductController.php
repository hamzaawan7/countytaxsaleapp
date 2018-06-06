<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Session;
use Hash;
use App\Auction;

class ProductController extends Controller
{


    public function adminDashbaordAllproducts()
    {

        $products = Product::where('status', '!=', 'remove')->orderBy('id', 'DESC')->get();

        return view('admins.products', compact('products'));
    }

    public function productInsert(Request $request)
    {

        $min_bid = "$" . number_format($request->min_bid, 2);

        Product::insert([
            'user_id' => Auth::user()->id,
            'address' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'zipcode' => $request->zipcode,
            'precinct' => $request->precinct,
            'sale' => $request->sale_amount,
            'owner_name' => $request->owner_name,
            'mailing_add' => $request->mailing_add,
            'land_sf' => $request->land_sf,
            'living_sf' => $request->living_sf,
            'exemption_type' => $request->exemption_type,
            'account' => $request->amount,
            'cause' => $request->cause,
            'judgment' => date('Y-m-d', strtotime($request->judgment)),
            'tax_years' => $request->start_tax . '-' . $request->end_tax,
            'min_bid' => $min_bid,
            'adjudged_value' => $request->adj_value,
            'image_url' => $request->photo,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        return redirect()->back()->with("success", "Product Successfully Inserted !");

    }

    public function adminProductsEdit($id)
    {
        $product = Product::where('id', $id)->where('status', '!=', 'remove')->first();

        return view('admins.product-edit', compact('product'));

    }


    public function adminProductsAuction($id)
    {
        $product = Product::where('id', $id)->where('status', '!=', 'remove')->first();

        return view('admins.product-auction', compact('product'));

    }


    public function adminProductsUpdated(Request $request)
    {

        $this->validate($request, [
            /*'zipcode' => 'numeric|min:5|required',
            'photo' => 'required',
            'title' => 'required',
            'precinct' => 'required',
            'sale_amount' => 'numeric|min:1|required',
            'land_sf' => 'required',
            'living_sf' => 'required',
            'amount' => 'numeric|min:1|required',
            'min_bid' => 'numeric|min:1|required',
            'adj_value' => 'numeric|min:1|required',
            'cause' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'start_tax' => 'required_with:end_tax|integer|min:4|between: 1980,2020',
            'end_tax' => 'required_with:start_tax|integer|min:4|after:start_tax|between:1980,2020',*/
        ]);

        $id = $request->id;

        $product = Product::find($id);

        Product::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'zipcode' => $request->zipcode,
            'precinct' => $request->precinct,
            'sale' => $request->sale_amount,
            'account' => $request->amount,
            'judgment' => date('Y-m-d', strtotime($request->judgment)),
            'address' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'min_bid' => $request->min_bid,
            'adjudged_value' => $request->adj_value,
            'exemption_type' => $request->exemption_type,
            'cause' => $request->cause,
            'image_url' => $request->photo,
            'description' => $request->description,
            'tax_years' => $request->start_tax . '-' . $request->end_tax,
            'type' => $request->type,
            'owner_name' => $request->owner_name,
            'mailing_add' => $request->mailing_add,
            'land_sf' => $request->land_sf,
            'living_sf' => $request->living_sf,
            'status' => $request->status,
        ]);


        $favorites = $product->favorites;

        $nexmo_errors = array();

        if (!empty($favorites)) {
            if ($product->status != $request->status && $request->status == "cancelled") {
                foreach ($favorites as $favorite) {
                    if (!empty($favorite->product)) {
                        if ($favorite->product->status == 'cancelled' || $favorite->product->status == 'remove') {
                            if ($favorite->user->status_alert == 'active') {
                                $addr = ($favorite->product->address) ? $favorite->product->address : '';
                                $msg = "Dear " . $favorite->user->name . " Address: '" . $addr . "' status is cancelled.";
                                $email = $favorite->user->email;
                                if ($favorite->user->sms_alert == 'active') {
                                    $test_number = Nexmo::insights()->basic("1" . $favorite->user->phone_number);
                                    if ($test_number['status'] == 0) {
                                        try {
                                            Nexmo::message()->send([
                                                'to' => $test_number['international_format_number'],
                                                'from' => '12015100626',
                                                'text' => $msg
                                            ]);
                                        } catch (\Nexmo\Client\Exception\Request $e) {
                                            $nexmo_errors[] = $e->getMessage() . ' (Error Code: ' . $e->getCode() . ')';
                                        }
                                    }
                                }
                                if ($favorite->user->email_alert == 'active') {

                                    Mail::raw($msg, function ($message) use ($email) {
                                        $message->to($email)->subject('Property Status Cancelled!');
                                    });
                                }
                            }
                        }
                    } else {
                        if ($favorite->user->status_alert == 'active') {
                            $msg = "Dear " . $favorite->user->name . " Address from your Favourite is deleted.";
                            $email = $favorite->user->email;
                            $test_number = Nexmo::insights()->basic("1" . $favorite->user->phone_number);
                            if ($favorite->user->sms_alert == 'active') {
                                if ($test_number['status'] == 0) {
                                    try {
                                        Nexmo::message()->send([
                                            'to' => $test_number['international_format_number'],
                                            'from' => '12015100626',
                                            'text' => $msg
                                        ]);
                                    } catch (\Nexmo\Client\Exception\Request $e) {
                                        $nexmo_errors[] = $e->getMessage() . ' (Error Code: ' . $e->getCode() . ')';
                                    }
                                }
                            }
                            if ($favorite->user->email_alert == 'active') {

                                Mail::raw($msg, function ($message) use ($email) {
                                    $message->to($email)->subject('Property Deleted!');
                                });
                                Favorite::destroy($favorite->id);
                            }
                        }
                    }
                }
            }
        }

        $auction = Auction::where('product_id', $id)->first();
        if ($auction) {
            if ($auction->user->sms_alert == 'active') {
                if ($request->status == 'active') {
                    Nexmo::message()->send([
                        'to' => $auction->user->phone_number,
                        'from' => '12819791976',
                        'text' => 'Your Biding Property Active'
                    ]);
                } else {
                    Nexmo::message()->send([
                        'to' => $auction->user->phone_number,
                        'from' => '12819791976',
                        'text' => 'Your Biding Property Cancelled'
                    ]);
                }
            }
        }

        /*$users = User::where('status', 'active')->where('type', 'user')->where('email_alert', 'active')->get();

          foreach($users as $user){

              Notification::send($user, new \App\Notifications\ProductStatusNotification($user));

          }*/

        return redirect()->back()->with(["success", "Product Successfully Updated !", "nexmo_errors" => $nexmo_errors]);

    }


    public function adminProductsDel($id)
    {

        Product::where('id', $id)->update(['status' => 'remove']);

        $auction = Auction::where('product_id', $id)->first();
        if ($auction) {
            if ($auction->user->sms_alert == 'active') {

                Nexmo::message()->send([
                    'to' => $auction->user->phone_number,
                    'from' => '16105552344',
                    'text' => 'Your Biding Property Cancelled'
                ]);

            }
        }

        return redirect()->back()->with("success", "Product Successfully Deleted !");
    }


}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Product;
use App\Favorite;
use Excel;
use Nexmo\Laravel\Facade\Nexmo;

class ExcelsController extends Controller
{
    //
    public function importExport()
    {
        return view('admins.product-excel');
    }


    public function importExcel(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
                    //dd($value);
                    if (!empty($value)) {
                        $data = ['user_id' => Auth::user()->id,
                            'address' => $value['address'],
                            'zipcode' => $value['zipcode'],
                            'lat' => $value['lat'],
                            'lng' => $value['lng'],
                            'precinct' => $value['precinct'],
                            'sale' => $value['sale'],
                            'owner_name' => $value['ownername'],
                            'mailing_add' => $value['mailingadd'],
                            'land_sf' => $value['landsf'],
                            'living_sf' => $value['livingsf'],
                            'exemption_type' => $value['exemptiontype'],
                            'cause' => $value['cause'],
                            'judgment' => Carbon::parse($value['judgment'])->format('Y-m-d'),
                            'tax_years' => $value['tax_years_judgement'],
                            'min_bid' => $value['min_bid'],
                            'adjudged_value' => $value['adjudged_value'],
                            'image_url' => $value['image_url'],
                            'description' => $value['description'],
                            'type' => $value['type'],
                            'status' => Str::lower($value['status']),
                            /*'auction_start' => date_format(date_create($v['auction_start']),"Y/m/d H:i:s"),
                            'auction_end' => date_format(date_create($v['auction_end']),"Y/m/d H:i:s"), */
                        ];
                        $len = strlen($value['account']);
                        $rem = 13 - $len;
                        if ($rem > 0) {
                            $zeros = str_repeat(0, $rem);
                            $data['account'] = $zeros . $value['account'];
                        } else {
                            $data['account'] = $value['account'];
                        }
                        $insert[] = $data;
                    }
                }
                if (!empty($insert)) {
                    DB::statement("SET foreign_key_checks=0");
                    Product::truncate();
                    DB::statement("SET foreign_key_checks=1");
                    Product::insert($insert);

                    $favorites = Favorite::all();

                    $nexmo_errors = array();

                    if (!empty($favorites)) {
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

                    return redirect()->back()->with(["success" => "File Successfully Uploaded !", "nexmo_errors" => $nexmo_errors]);
                }

            }

        }
    }
}

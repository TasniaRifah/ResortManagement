<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Resort;
use \App\Mail\MyTestMail;
use App\Models\User;
use Exception;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class BookingController extends Controller
{
    public function index(Resort $resort){
        $user = auth()->user();
        return view('frontend.booking',compact('resort','user'));

    }

    public function store(Request $request) {
        try{

            // return $request->all();
            $customer_name = auth()->user()->name;
            $customer_email = auth()->user()->email;
            $booking = new Book();
            $booking->customer_id = auth()->user()->id;
            $booking->resort_id = $request->input('resort_id');
            $booking->from_date = $request->input('from_date');
            $booking->to_date = $request->input('to_date');
            $booking->rent = $request->input('rent');
            $booking->save();
            if($booking->save()){
                $adminMessage = [
                    'title' => 'Mail from `Rifah Resort`',
                    'body' => `Booking request from $customer_name`,
                ];
                $customerMessage = [
                    'title' => 'Mail from `Rifah Resort`',
                    'body' => 'Your booking is placed and we contact very soon!'
                ];
               
                FacadesMail::to('rtasnia007@gmail.com')->send(new \App\Mail\MyTestMail($adminMessage));
                FacadesMail::to($customer_email)->send(new \App\Mail\MyTestMail($customerMessage));
               
                // dd("");
                // Here you need to implement mail senderr
                return redirect()->back();
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function chackResort(Request $request) {
        try{
            // $available;
            $from_date = $request->input('from_date');
            $to_date = $request->input('to_date');
            $resort_id = $request->input('resort_id');
            
            $data = Book::whereBetween('from_date',[$from_date, $to_date])->orWhereBetween('to_date',[$from_date, $to_date])->where('resort_id', '=', $resort_id)->get();

            // return $data;

            if(!$data->isEmpty()){
                $available = " it's not available for the desired dates to the customer";
            }else{

$available=" "   ;        
 }

            return $available;

        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}

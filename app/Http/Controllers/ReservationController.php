<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store (Request $request){
        $request->validate([
            "*" => 'required'
]);
        Reservation::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => false,
            'datetime' => $request->datepicker,
            'listing' => $request->message,
            'created_at' => Carbon::now()
        ]);

         Toastr::success('Your Reservation sent successfuly, we will confirm soon.', 'reservatin', ["positionClass" => "toast-top-right"]);
         return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comfrimmail;
use Brian2694\Toastr\Facades\Toastr;
class EmailController extends Controller
{
    public function email( $id){
      $info = Reservation::find($id);

      Mail::to($info->email)->send(new Comfrimmail());
      $info->update([
        'status' => true,
    ]);
      Toastr::success('Reservation bocking successfully', 'reservatin', ["positionClass" => "toast-top-right"]);
         return back();



    }
}

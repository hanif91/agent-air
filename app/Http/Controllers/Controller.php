<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function toastSuccess($tipe , $msg){
        session()->flash('toast-bootstrap',[
            'type' => 'success',
            'title' => $tipe .' Data ',
            'message' => $msg]);
    }
    public function toasGagal($tipe , $msg){
        session()->flash('toast-bootstrap',[
            'type' => 'error',
            'title' => $tipe .' Data ',
            'message' => $msg]);
    }
}

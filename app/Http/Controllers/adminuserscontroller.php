<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminuserscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='admin'
            // AND Auth::user()->tipeuser!='guru'
            ){
                $datas=User::get();
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized!'
                ]);
            }

        return $next($request);

        });
    }
    public function index(){
        $datas=User::get();
        return response()->json([
            'success' => true,
            'message' => 'Success!',
            'data'    => $datas
        ]);
    }
}

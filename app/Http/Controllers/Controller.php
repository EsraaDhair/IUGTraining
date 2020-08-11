<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class Controller extends BaseController
{
    public function userLogout()
    {
        if (Auth::check())
            Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function success($data,$status = 200){
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'errors' => 0
        ],$status)->header('Content-Type','application/json');
    }

    public function errors($data,$status=400){
        if ($data instanceof MessageBag)
            $data = $data->first();
        $response = response()->json([
            'status' => 'error',
            'data' => $data,
            'errors' => 1
        ], $status)
            ->header('Content-type', 'application/json');
        return $response;

    }
}

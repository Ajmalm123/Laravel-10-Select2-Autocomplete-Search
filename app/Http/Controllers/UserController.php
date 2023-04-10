<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autoCompleteSearch(Request $request): JsonResponse
    {
       $data=[];
        if($request->filled('q')){
            $data=User::select('name','id')->where('name','like','%'.$request->get('q').'%')->get();
        }
        return response()->json($data);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function resize(Request $request){

        return response()->json([
            'message'  => 'resize method hit'
        ], 200);
    }
}

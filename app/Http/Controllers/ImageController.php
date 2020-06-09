<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function resize(Request $request){

        $validatedData = $request->validate([

            'image' => 'bail|required|mimes:jpeg, bmp, png|max:200000',
            'height' => 'bail|required',
            'width' => 'bail|required'
            ]);

        return response()->json([
            'message'  => 'resize method hit'
        ], 200);
    }
}

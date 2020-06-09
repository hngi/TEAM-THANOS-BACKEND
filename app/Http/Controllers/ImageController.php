<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function resize(Request $request){
        
        // validate request here
        $validatedData = $request->validate([
            
        ]);
        
        // resize the image
        
        return response()->json([
            'message'  => 'resize method hit'
        ], 200);
    }
}

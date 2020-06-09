<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;

class ImageController extends Controller
{
    //
    public function resize(Request $request){

        $validatedData = $request->validate([

            'image' => 'bail|required|mimes:jpeg, bmp, png|max:200000',
            'height' => 'bail|required',
            'width' => 'bail|required'
            ]);

            $file =  $validatedData['image'];
            $width = $validatedData['width'];
            $height = $validatedData['height'];

            $image = new ImageModel();

            $path = $image->resize($file, $height, $width);




        if(is_file($path))
            return response()->download($path)->deleteFileAfterSend();
        else{
            return response()->json([
                'error'  => 'file not found'
            ], 500);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;

class ImageController extends Controller
{
    //
    public function resize(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'bail|required|mimes:jpeg, bmp, png|max:20000',
            'height' => 'required',
            'width' => 'required'
        ]);

        $file =  $validatedData['image'];
        $width = $validatedData['width'];
        $height = $validatedData['height'];

        $image = new ImageModel();

        $filename = $image->resize($file, $height, $width);

        $path = public_path('thumbnail/').$filename;
        
        if(file_exists($path))
            return response()->json([
                'path'  => env('APP_URL', 'http://localhost:8000') . '/api/download/' . $filename
            ], 200);
        else {
            return response()->json([
                'message'  => 'file not found'
            ], 400);
        }
    }
    
    
    public function download($filename) 
    {
        $path = public_path('thumbnail/') . $filename;
        
        if(file_exists($path))
            return response()->download($path)->deleteFileAfterSend();
        else {
            return response()->json([
                'message'  => 'file not found'
            ], 400);
        }
    }
}

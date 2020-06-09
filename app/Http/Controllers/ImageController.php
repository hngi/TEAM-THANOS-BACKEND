<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Image;

class ImageController extends Controller
{
    //
    public function resize(Request $request){

        $validatedData = $request->validate([

            'image' => 'bail|required|mimes:jpeg, bmp, png|max:200000',
            'height' => 'bail|required',
            'width' => 'bail|required'
            ]);


        # Code to resize images - implements Intervention

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();

        $image->move(public_path('thumbnail/'), $filename);

        $image_resize = Image::make(public_path('thumbnail/' . $filename));
        $image_resize->fit($request->get('width'), $request->get('height'));
        $image_resize->save(public_path('thumbnail/') .$filename);

        # uncomment below to save image to database
        /* $img = new Image();
        $img->email = $request->email;
        $img->image = $filename;
        $img->save(); */
        # Code to resize images - implements Intervention




        return response()->json([
            'message'  => 'resize method hit'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\dropzone_image_upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\photo;
class ImageUploadController extends Controller
{
    public function index()
    {
        return view('dropzone_image_uploads.index');
    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        foreach($image as $images)
        {

        $profileImage =  $images->getClientOriginalName();
        // Define upload path
        $destinationPath = public_path('profile_images/'); // upload path
        $images->move($destinationPath,$profileImage);
        }
        // Save In Database
		$imagemodel= new Photo();
		$imagemodel->photo_name="$profileImage";
		$imagemodel->save();
        return response()->json(['success'=>true,
        'src'=>$profileImage
    ],200);
    }
    public function fileuploader(){
        return view('imageupload');
    }
    public function saveto(Request $request)
    {
        return response()->json(['success'=>true]);
    }

}

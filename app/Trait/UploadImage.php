<?php
namespace App\Trait;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImage{
 public function StoreImage(Request $request,$foldername,$disk,$inputname,$imageable_type,$imageable_id){

    if( $request->hasFile( $inputname ) ) {

        // Check img
        if (!$request->file($inputname)->isValid()) {
            flash('Invalid Image!')->error()->important();
            return redirect()->back()->withInput();
        }

    $file = $request->file($inputname);
 
    $name = \Str::slug($request->input('name'));
$filename =$name.'.'. $file->getClientOriginalExtension();

    // insert Image
    $Image = new Image();
    $Image->filename = $filename;
    $Image->imageable_id = $imageable_id;
    $Image->imageable_type = $imageable_type;
    $Image->save();
    return $request->file($inputname)->storeAs($foldername, $filename, $disk);
}

return null;


}

public function destroyImage($id, $disk,$path){
    Storage::disk($disk)->delete($path);
    Image::where('imageable_id',$id)->delete();

}



public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {

    // insert Image
    $Image = new Image();
    $Image->filename = $varforeach->getClientOriginalName();
    $Image->imageable_id = $imageable_id;
    $Image->imageable_type = $imageable_type;
    $Image->save();
    return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
}

}
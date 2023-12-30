<?php
    namespace App\Traits;
    use Illuminate\Http\Request;
    use Image;

    trait ImageUploadTrait{

        public function uploadImage($name,$path,$request,$old='')
        {
            if($request->hasFile($name))
            {
                $image_changed_name = time().'.'.$request->$name->getClientOriginalExtension();
                $request->file($name)->move(public_path($path), $image_changed_name);
                $path = '/public'.'/'.$path;
                return url($path)."/".$image_changed_name;
            }
            else{ 
                return $old; 
            }
        }

        public function uploadImageAndMakeThumbnail($width,$height,$name,$path,$request,$old='')
        {
            if($request->hasFile($name)){
                // $destinationPath = public_path('uploadfiles/categories');
                $destinationPath = public_path($path);
                $image_changed_name = time().'.'.'jpg';
                $request->file($name)->move($destinationPath, $image_changed_name);
                $path = '/public'.'/'.$path;
                $img = Image::make(url($path.'/'.$image_changed_name))->resize($width,$height);
                $img->save($destinationPath.'/'."thumbnail_".$image_changed_name);
                return url($path.'/'."thumbnail_".$image_changed_name);
            }else{
                return $old;
            }
        }


    }

?>
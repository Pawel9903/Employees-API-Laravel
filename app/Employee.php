<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use CrudTrait;

    protected $fillable = array('id','name', 'surname', 'phone', 'email', 'salary', 'city', 'image');

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public_folder";
        $destination_path = "uploads/folder_1/subfolder_3";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }

    public function getFullName()
    {
        return $this->attributes['name'].' '.$this->attributes['surname'];
    }
}

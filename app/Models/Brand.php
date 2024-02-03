<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $brand;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=time().'-'.self::$image->getClientOriginalExtension();
        self::$directory='brand-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newBrand($request)
    {
        self::$brand= new Brand();
        self::$brand->title=$request->title;
        self::$brand->slug=Str::slug($request->title);
       if ($request->file('image'))
       {
           self::$brand->image=self::getImageUrl($request);
       }

      if ($request->status==1)
      {
          self::$brand->status=1;
      }
      else
      {
          self::$brand->status=2;
      }

        self::$brand->save();
    }

    public static function brandUpdate($request,$id)
    {
        self::$brand=Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$brand->image;
        }
        self::$brand->title=$request->title;
        self::$brand->slug=Str::slug($request->title);

        self::$brand->image= self::$imageUrl;

        if ($request->status==1)
        {
            self::$brand->status=1;
        }
        else
        {
            self::$brand->status=2;
        }

        self::$brand->save();

    }
}

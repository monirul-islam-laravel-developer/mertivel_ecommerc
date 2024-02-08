<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $product;

    private static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='product-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newProduct($request)
    {
        self::$product=new Product();
        self::$product->title=$request->title;
        self::$product->slug=Str::slug($request->title);
        self::$product->category_id=$request->category_id;
        self::$product->subcategory_id=$request->subcategory_id;
        self::$product->brand_id=$request->brand_id;
        self::$product->unit_id=$request->unit_id;
        self::$product->size=$request->size;
        self::$product->color=$request->color;
        self::$product->condition=$request->condition;
        self::$product->regular_price=$request->regular_price;
        self::$product->selling_price=$request->selling_price;
        self::$product->code=$request->code;
        self::$product->stock_amount=$request->stock_amount;
        self::$product->sort_description=$request->sort_description;
        self::$product->detail=$request->detail;
        self::$product->more_detail=$request->more_detail;
        if ($request->file('image'))
        {
            self::$product->image=self::getImageUrl($request);
        }
        if ($request->status==1)
        {
            self::$product->status=$request->status;
        }
        self::$product->save();
        return self::$product;
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');

    }
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory');

    }
}

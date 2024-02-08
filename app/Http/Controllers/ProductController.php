<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\MoreImages;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $sizes;
    private $brands;
    private $categories;
    private $subcategories;
    private $colors;
    private $units;
    private $product;
    private $products;
    private $moreImages;
    public function index()
    {
        $this->sizes=Size::all();
        $this->brands=Brand::all();
        $this->categories=Category::all();
        $this->subcategories=SubCategory::all();
        $this->colors=Color::all();
        $this->units=Unit::all();
        return view('admin.product.add',[
            'sizes'=>$this->sizes,
            'brands'=>$this->brands,
            'categories'=>$this->categories,
            'subcategories'=>$this->subcategories,
            'colors'=>$this->colors,
            'units'=>$this->units
            ]);
    }
    public function create(Request $request)
    {
        $this->product=Product::newProduct($request);
        if ($request->file('more_image'))
        {
            MoreImages::newMoreImages($request,$this->product->id);
        }
        Alert::Success('Product Create Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->products=Product::orderBy('id','desc')->get();
        return view('admin.product.manage',['products'=> $this->products]);
    }
    public function open($id)
    {
        $this->product=Product::find($id);
        return view('admin.product.open',['product'=> $this->product]);
    }
}

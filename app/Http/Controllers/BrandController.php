<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    private $brands;
    private $brand;
    public function index()
    {
        return view('admin.brand.add');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:brands|max:255',
        ]);
        Brand::newBrand($request);
        Alert::Success('Brand Add Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->brands=Brand::orderBy('id','desc')->get();
        return view('admin.brand.manage',['brands'=>$this->brands]);
    }
    public function edit($id)
    {
        $this->brand=Brand::find($id);
        return view('admin.brand.edit',['brand'=>$this->brand]);
    }
    public function update(Request $request,$id)
    {
        Brand::brandUpdate($request,$id);
        Alert::Success('Brand Update Successfully','');
        return redirect()->route('brand.manage');
    }
    public function delete($id)
    {
        $this->brand=Brand::find($id);
        if (file_exists( $this->brand->image));
        {
            unlink($this->brand->image);
        }
        $this->brand->delete();
        Alert::Success('Brand Delete Successfully','');
        return redirect()->route('brand.manage');
    }
}

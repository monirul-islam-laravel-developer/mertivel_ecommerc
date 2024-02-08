<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ColorController extends Controller
{
    private $colors;
    private $color;
    public function index()
    {
        return view('admin.color.add');
    }
    public function create(Request $request)
    {
        $this->color=new Color();
        $this->color->name=$request->name;
        $this->color->slug=Str::slug($request->name);
        $this->color->description=$request->description;
        if ($request->status==1)
        {
            $this->color->status=$request->status;
        }
        $this->color->save();
        Alert::Success('Color Create Successfully');
        return redirect()->back();
    }
    public function manage()
    {
        $this->colors=Color::orderBy('id','desc')->get();
        return view('admin.color.manage',['colors'=>$this->colors]);
    }
    public function edit($id)
    {
        $this->color=Color::find($id);
        return view('admin.color.edit',['color'=>$this->color]);
    }
    public function update(Request $request,$id)
    {
        $this->color=Color::find($id);
        $this->color->name=$request->name;
        $this->color->slug=Str::slug($request->name);
        $this->color->description=$request->description;
        if ($request->status==1)
        {
            $this->color->status=$request->status;
        }
        $this->color->save();
        Alert::Success('Color Update Successfully');
        return redirect()->route('color.manage');
    }
    public function delete($id)
    {
        $this->color=Color::find($id);
        $this->color->delete();
        Alert::Success('Color Delete Successfully');
        return redirect()->route('color.manage');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SizeController extends Controller
{
    private $size;
    private $sizes;
    public function index()
    {
        return view('admin.size.add');
    }
    public function create(Request $request)
    {
        $this->size=new Size();
        $this->size->name=$request->name;
        $this->size->slug=Str::slug($request->name);
        $this->size->description=$request->description;
        if ($request->status==1)
        {
            $this->size->status=1;
        }
        $this->size->save();
        Alert::Success('Size Create Successfully','');
        return redirect()->back();

    }
    public function manage()
    {
        $this->sizes=Size::orderBy('id','desc')->get();
        return view('admin.size.manage',['sizes'=>$this->sizes]);
    }
    public function edit($id)
    {
        $this->size=Size::find($id);
        return view('admin.size.edit',['size'=>$this->size]);
    }
    public function update(Request $request,$id)
    {
        $this->size=Size::find($id);
        $this->size->name=$request->name;
        $this->size->slug=Str::slug($request->name);
        $this->size->description=$request->description;
        if ($request->status==1)
        {
            $this->size->status=1;
        }
        $this->size->save();
        Alert::Success('Size Update Successfully','');
        return redirect()->route('size.manage');
    }
    public function delete($id)
    {
        $this->size=Size::find($id);
        $this->size->delete();
        Alert::Success('Size Delete Successfully','');
        return redirect()->route('size.manage');
    }
}

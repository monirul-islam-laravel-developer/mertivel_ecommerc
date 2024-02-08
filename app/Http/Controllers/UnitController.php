<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    private $unit;
    private $units;
    public function index()
    {
        return view('admin.unit.add');
    }
    public function create(Request $request)
    {
        $this->unit= new Unit();
        $this->unit->name=$request->name;
        $this->unit->slug=Str::slug($request->name);
        $this->unit->description=$request->description;
        if ($request->status==1)
        {
            $this->unit->status=$request->status;
        }
        $this->unit->save();
        Alert::Success('Unit Add Successfully','');
        return redirect()->back();

    }
    public function manage()
    {
        $this->units=Unit::orderBy('id','desc')->get();
        return view('admin.unit.manage',['units'=>$this->units]);
    }
    public function edit($id)
    {
        $this->unit=Unit::find($id);
        return view('admin.unit.edit',['unit'=>$this->unit]);
    }
    public function update(Request $request,$id)
    {
        $this->unit=Unit::find($id);
        $this->unit->name=$request->name;
        $this->unit->description=$request->description;
        if ($request->status==1)
        {
            $this->unit->status=$request->status;
        }
        $this->unit->save();
        Alert::Success('Unit Update Successfully'.'');
        return redirect()->route('unit.manage');
    }
    public function delete($id)
    {
        $this->unit=Unit::find($id);
        $this->unit->delete();
        Alert::Success('Unit Delete Successfully'.'');
        return redirect()->route('unit.manage');
    }
}

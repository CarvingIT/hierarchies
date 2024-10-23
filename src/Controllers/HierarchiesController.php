<?php
namespace CarvingIT\Hierarchies\Controllers;

use Illuminate\Http\Request;
use CarvingIT\Hierarchies\Models\Position;
use CarvingIT\Hierarchies\Models\PositionUser;

class HierarchiesController
{
    public function index(Request $request){
        //return view('hierarchies::index');
        return view('vendor.hierarchies.index');
    }

    public function addPosition(Request $request){
        $position = new Position;
        $position->label = $request->label;
        $position->reports_to = $request->reports_to;
        $position->save();
        return redirect()->back();
    }

    public function removePosition(Request $request){
       Position::find($request->position_id)->delete();
        return redirect()->back();
    }
}



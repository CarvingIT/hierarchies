<?php
namespace CarvingIT\Hierarchies\Controllers;

use Illuminate\Http\Request;
use CarvingIT\Hierarchies\Models\Position;
use CarvingIT\Hierarchies\Models\PositionUser;

class HierarchiesController
{
    public function index(Request $request){
        return view('hierarchies::index');
    }
}



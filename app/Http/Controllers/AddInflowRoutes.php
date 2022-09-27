<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class AddInflowRoutes extends Controller
{
    //
    function index(){
        return view('inflowRoute.addRoute');
    }
    function add(Request $request){
        $nwRoute = new Route;
        $nwRoute->route_name=$request->name;
        $nwRoute->save();
        $nwRoute->id;
        return redirect('/addRoute');
    }
}

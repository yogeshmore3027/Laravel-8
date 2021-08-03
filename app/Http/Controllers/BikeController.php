<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    
    public function index()
    {
        $bike = Bike::all();
        return  view('bike.index', compact('bike'));
        //    return response(["bikeinfo"=>Bike::all()],200);
    }

    public function create(Request $request)
    {
      
        $bike = $request->validate([
            'bike_name' => 'required',
            'price' => 'required',
        ]);
        
       
        $edit_id = $request->edit_id;
       
        // return $bike;

        Bike::whereId($edit_id)->update($bike);
        return redirect('/bike')->with(['message'=>"Update"]);

    }
   


    public function store(Request $request)
    {
        $bike = new Bike();
        $bike->bike_name = $request->bike_name;
        $bike->price = $request->price;

        $result = $bike->save();
        return redirect('/bike')->with(['message' => "Insert"]);
    }


    public function show($id)
    {
        $bike = Bike::find($id);

        if ($bike) {
            return response()->json([
                'status' => 200,
                'bike' => $bike,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Not Found',
            ]);
        }
    }
    
    // public function edit(Request $request)
    // {
    //     $bike = Bike::findOrFail($request);
    //     return $request;
    // }

 


    public function update($id)
    {
        $bike = Bike::find($id);

        if ($bike) {
            return response()->json([
                'status' => 200,
                'bike' => $bike,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Not Found',
            ]);
        }
    }


    public function destroy($id)
    {
        $srud = Bike::findOrFail($id);
        $srud->delete();
        return redirect('/bike')->with(['message' => "Delete"]);
    }

    public function delete($id)
    {
        $srud = Bike::findOrFail($id);
        $srud->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data Delete Success...!',
        ]);
    }
}

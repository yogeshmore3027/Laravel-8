<?php

namespace App\Http\Controllers;

use App\Models\Stud;
use Validator;
use Illuminate\Http\Request;

class StudController extends Controller
{
    
    public function index()
    {
        // return "Good to Go";
        // return response(['info' => Stud::all()], 200);

        $stud = Stud::all();
        return view('stud/index', compact('stud'));

        

    }

 
    public function create()
    {
        // $rules = array("name"=>"required","address"=>"required");
        
        // $validator = Validator::make($req->all(),$rules);
        // if ($validator->fails()) return $validator->errors();

        // $stud = new Stud();
        // $stud->name=$req->name;
        // $stud->address=$req->address;
        // $result = $stud->save();
        // return response(['message'=>$result ? "Data Insert SuccessFull":"Try Again!, Some thing want wrong"],201);
    
        return view('stud/welcome');
    
    
    
    
    
    }

    
    public function store(Request $req)
    {
         $stud = new Stud();
        $stud->name=$req->name;
        $stud->address=$req->address;
        $result = $stud->save();
        return redirect('/stud')->with(['message'=>"Insert"]);

        // return response(['message'=>$result ? "Data Insert SuccessFull":"Try Again!, Some thing want wrong"],201);
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
       
        $stud = Stud::findOrFail($id);
        return view('stud.update', compact('stud'));
        

    }

   
    public function insert()
    {
      
        return "Return Success Fully";
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Stud::whereId($id)->update($data);
        return redirect('/stud')->with(['message'=>"Update"]);
    }

   


    
    public function destroy($id)
    {

        // return  $id;
        $srud = Stud::findOrFail($id);
        $srud->delete();
        return redirect('/stud')->with(['message'=>"Delete"]);
    }

    // public function delete( Request $request)
    // {
       
        
    //     $result = Stud::find($request->id)->delete();
    //     return response(["Result"=>$result ? "Deleted Data": "Error"],202);
    // }
}

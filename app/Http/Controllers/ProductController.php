<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response(["productinfo"=>Product::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $res)
    {
        // return "Data Created SuccessFull!!!";

    //    $data = array("productname"=>"required", "type"=>"required", "quantity"=>"required", "detail"=>"required");
     
    // return $data;

        // $validator = Validator::make($res->all(),$data);
        // if($validator->flase()) return $validator->error();
      
        // database Table Name;
        $product = new Product();
        // get Request and Store 
        $product->productname = $res->productname;
        $product->type = $res->type;
        $product->quantity = $res->quantity;
        $product->detail = $res->detail;

        $send = $product->save();
        return response(['message'=>$send ? "Product Insert SuccessFull" : "Not Good Try Again...!"],200);
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $product = Product::find((int)$request->id);
    //    return $product;

       $product->productname = $request->productname;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->detail = $request->detail;

        $result = $product->save();
        // return $send;
        return response(['message' => $result ? "Data update Success!!!" : "Try Again!!!" ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        // return "destroy Success...";
        $result = Product::find($id->id)->delete();
        return response(["Result"=>$result ? "Data Deleted .!!!": "Error"],200);
 
    }
}

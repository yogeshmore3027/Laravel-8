<?php

namespace App\Http\Controllers;

use App\Models\Os;
use Illuminate\Http\Request;

class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    return "Os Fetch Success";
    return response(['osinfo'=>Os::all()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
    //    return "create";

    $os = new Os();
    $os->os_name = $data->os_name;
    $os->type = $data->type;
    $os->bit = $data->bit;

    $save = $os->save();

    return response(['message'=> $save ? "Information Create Success" : "False"], 200);


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
    public function edit( Request $id)
    {
        // return "edit";
        $os = Os::find((int)$id->id);
        $os->os_name = $id->os_name;
        $os->type = $id->type;
        $os->bit = $id->bit;

        $save = $os->save();

        return response(['message'=>$save ? "Update Os Data" : "not Good Try Again...!"], 200);
    }

    public function delete(Request $id)
    {
        // return "delete Date";
        $delete = Os::find($id->id)->delete();
        return response(['message'=>$delete ? "Os Data Deleted " : "Data Not Deletes"], 200);
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
    public function destroy($id)
    {
        //
    }
}

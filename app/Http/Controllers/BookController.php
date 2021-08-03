<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "book Info";
        return (response(['bookinfo'=>Book::all()], 200));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $book = new Book();
        $book->bookname=$data->bookname;
        $book->quantity=$data->quantity;
        $book->info=$data->info;

        $save = $book->save();
        return response(['message'=>$save ? "Book Add Success" : "Somthing Wrong"], 200);
        
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
    public function edit(Request $id)
    {
    //    return "Edit ";
    $book = Book::find((int)$id->id);
    $book->bookname = $id->bookname;
    $book->quantity = $id->quantity;
    $book->info = $id->info;

    $save = $book->save();

    return response(['message' => $save ? "Update Data..." : "Not Updated"]);
    }

    public function delete(Request $dlt_id)
    {
        // return "delete" ;
        $result = Book::find($dlt_id->id)->delete();
        return response(["message"=>$result ? "Data Deleted .!!!": "Error"],200);
 
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $list = DB::table('books')
        ->select('books.id','title','thumbnail','author','publisher','Publication','Price','Quantity','categories.name as categoty_name')
        ->join('categories','categories.id', '=' ,'books.Category_id')
        ->orderByDesc('id')
        ->get();

        return view('home',compact('list'));
    }
    public function show($id){
        $detail = DB::table('books')
        ->select('books.id as id','title','thumbnail','author','publisher','Publication','Price','Quantity','categories.name as categoty_name')
        ->join('categories','categories.id', '=' ,'books.Category_id')
        ->Where('books.id',$id)
        ->first();
        return view('detail',compact('detail'));
    }
    public function category($id){
        $books = DB::table('books')
        ->select('books.id as id','title','thumbnail','author','publisher','Publication','Price','Quantity','categories.name as categoty_name')
        ->join('categories','categories.id', '=' ,'books.Category_id')
        ->Where('books.Category_id',$id)
        ->get();
    $category = DB::table('categories')->where('id', $id)->first();
    return view('category', compact('books', 'category'));
    }

    public function create(){
        $categories = DB::table('categories')->get();
        return view('create',compact('categories'));
    }
    
    public function store(Request $request){
        {
            // Cách 1
            // $data = $request->except('_token');
            // CÁch 2
            $data = [
                'title' => $request['title'],
                'thumbnail' => $request['thumbnail'],
                'author' => $request['author'],
                'publisher' => $request['publisher'],
                'Publication' => $request['Publication'],
                'Price' => $request['Price'],
                'Quantity' => $request['Quantity'],
                'Category_id' => $request['Category_id'],
            ];
            DB::table('books')->insert($data);
            return redirect()->route('book.home');
        }
    }
    

    public function destroy($id){
        DB::table('books')->delete($id);
        return redirect()->route('book.home');    
    }

    public function edit($id){
        $book = DB::table('books')
        ->where('id',$id)
        ->first();
        $categories = DB::table('categories')->get();
        return view('edit',compact('categories','book'));
    }

    public function update(Request $request){
        {
            // Cách 1
            // $data = $request->except('_token');
            // CÁch 2
            $data = [
                'title' => $request['title'],
                'thumbnail' => $request['thumbnail'],
                'author' => $request['author'],
                'publisher' => $request['publisher'],
                'Publication' => $request['Publication'],
                'Price' => $request['Price'],
                'Quantity' => $request['Quantity'],
                'Category_id' => $request['Category_id'],
            ];
            DB::table('books')->where('id',$request['id'])->update($data);
            return redirect()->route('book.home');
        }
    }
}

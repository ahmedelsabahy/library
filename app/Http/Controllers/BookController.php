<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        //$bookes=book::select('title','desc')->get();
      // $bookes=book::select('desc','title')->where('id','<=','2')->get();

        $values = Book::orderby('id','desc')->paginate(3);     // $values = Book::get(); order عشان يعرض اخلر حاجه
        return view('bookes.index',compact('values'));   
    }
    public function show($id)
     {
        $value= book::findorfail($id);       // $value= de varibal shayell elresult ### findorfail لو مدخلتش الاي دي صح يجيب ايرور 404
    return view('bookes.show', compact('value'));
    }        
    
    public function create()
    {
        return view('bookes.create');
    }

    public function store (Request $value) //$value دا ابوجكت بيشيل الداتا 
    {                                    // request دا لارافيل  titile  عمود داتا بيز
        Book::create([
            'title'=>$value->titlename,
            'desc'=>$value->descname,
        ]);

      return redirect (route('books.index'));
    }
    
    public function edit ($id)
    {
        $value =Book::findorfail($id);
        return view('bookes.edit' , compact('value'));
    }

    public function update(request $value ,$id)
    {
        Book::findorfail($id)->update ([
            'title'=>$value->titlename,
            'desc'=>$value->descname
        ]);
        return redirect(route('books.index',$id));
    }
    public function delete ($id)
    {
        Book::findorfail($id)->delete();
        return redirect(route('books.index'));
    }
}

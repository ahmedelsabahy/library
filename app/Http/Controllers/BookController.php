<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Symfony\Contracts\Service\Attribute\Required;

class BookController extends Controller
{
    public function index()
    {
        //$bookes=book::select('title','desc')->get();
      // $bookes=book::select('desc','title')->where('id','<=','2')->get();

        $values = Book::orderby('id','desc')->paginate(3);     // $values = Book::get(); order عشان يعرض اخلر حاجه
        return view('bookes.index',compact('values'));   
    }
    public function show(Book $book)
     {
    return view('bookes.show', compact('book'));
    }        
    
    public function create()
    {
        return view('bookes.create');
    }

    public function store (Request $value) //$value دا ابوجكت بيشيل الداتا 
    {          
                                  // request دا لارافيل  titile  عمود داتا بيز
       $value->validate([ 
           'titlename' => 'Required |string|max:50',   
           'descname' => 'Required|string',
           'img' => 'image|mimes:jpg,png',
           ]);         // عشان اقوله لازم تدخل استرينج واكبر حاجه 50 و
            // move
            $img=$value->file('img');
            $ext=$img->getClientOriginalExtension();
            $name="book-". uniqid().".$ext";
            $img->move(public_path('uplode/book') , $name);

        Book::create([
            'title'=>$value->titlename,
            'desc'=>$value->descname,
            'img'=>$name,
        ]);

      return redirect (route('books.index'));
    }
    
    public function edit (Book $book)
    {
        return view('bookes.edit' , compact('book'));
    }

    public function update(request $value , $book)
    {
        $value->validate([ 
            'titlename' => 'Required |string|max:50',   
            'descname' => 'Required|string',
            'img' => 'nullable|image|mimes:jpg,png',

            ]);        
        Book::findorfail($book)->update ([
            'title'=>$value->titlename,
            'desc'=>$value->descname
        ]);
        return redirect(route('books.index',$book));
    }
    public function delete (Book $book)
    {
        if($book->img !== null)          // لو مسحت الصوره تتمسح من الفولدر او غيرتها تتبدل
        {
                    unlink(public_path('uplode/book/').$book->img);
        }
        $book->delete();              // amr eldelete
        return redirect(route('books.index'));
    }
}

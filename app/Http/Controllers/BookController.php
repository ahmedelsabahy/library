<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
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
        $categories= Category::select('id','name')->get();
        return view('bookes.create', compact('categories')
       );
        
    }
    //store
    public function store (Request $value) 
    {          
                            //validation     
       $value->validate([ 
           'titlename' => 'Required |string|max:50',   
           'descname' => 'Required|string',
           'img' => 'image|mimes:jpg,png',
         'categoryids' => 'Required',
           'categoryids.*' => 'exists:categories,id',
           ]);     
            // move
            $img=$value->file('img');
            $ext=$img->getClientOriginalExtension();
            $name="book-". uniqid().".$ext";
            $img->move(public_path('uplode/book') , $name);

        $book=Book::create([
            'title'=>$value->titlename,
            'desc'=>$value->descname,
            'img'=>$name,
        ]);
        $book->categories()->sync($value->categoryids); // to store a update change id

      return redirect (route('books.index'));

    }
    
    public function edit (Book $book)
    {
        return view('bookes.edit' , compact('book'));
    }
    //update
    public function update(request $value ,Book $book)
 {
        $value->validate([ 
            'titlename' => 'Required |string|max:50',   
            'descname' => 'Required|string',
            'img' => 'nullable|image|mimes:jpg,png',

            ]);        
       $name=$book->img;
     if($value->hasFile('img'))
    {
           if ($name !== null)        
       {
                   unlink(public_path('uplode/book/'). $name);
       }
       $img=$value->file('img');
       $ext=$img->getClientOriginalExtension();
       $name="book-". uniqid().".$ext";
       $img->move(public_path('uplode/book') , $name);

     }
      $book->update ([
            'title'=>$value->titlename,
            'desc'=>$value->descname,
            'img'=>$name
        ]);
        return redirect(route('books.index',$book));
 }
  //delete

    public function delete (Book $book)
    {

        if($book->img !== null)          // لو مسحت الصوره تتمسح من الفولدر او غيرتها تتبدل
        {
                    unlink(public_path('uplode/book/'). $book->img);
        }
        $book->delete();              // amr eldelete
        return redirect(route('books.index'));
    }
}

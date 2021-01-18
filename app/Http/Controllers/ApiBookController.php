<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    // index
    public function index()
    {
      $books= Book::get();
        return response()->json($books);
    }
    //show  used with to show categories
    public function show (Book  $book)
     {
         $book=Book::with('categories')->find($book);
         return response()->json($book);
    }
    // store
    public function store (Request $value)
    {
                            //validation
                            $validator = Validator::make($value->all(), [
                                'titlename' => 'Required |string|max:50',
                                'descname' => 'Required|string',
                                'img' => 'image|mimes:jpg,png',
                             'categoryids' => 'Required',
                               'categoryids.*' => 'exists:categories,id',
                            ]);
                            if ($validator->fails())
                             {
                                $errors= $validator->errors();
                                return response()->json($errors);
                            }
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
            $success="book successful";
        return response()->json($success);

    }
    // update
    public function update(request $value ,Book $book)
    {
        //validation
        $validator = Validator::make($value->all(), [
            'titlename' => 'Required |string|max:50',
            'descname' => 'Required|string',
            'img' => 'image|mimes:jpg,png',
         'categoryids' => 'Required',
           'categoryids.*' => 'exists:categories,id',
        ]);
        if ($validator->fails())
         {
            $errors= $validator->errors();
            return response()->json($errors);
        }

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

          $book->categories()->sync($value->categoryids); // to store a update change id
            $success="book successful";
        return response()->json($success);
    }
    // delete
    public function delete (Book $book)
    {

        if($book->img !== null)          // لو مسحت الصوره تتمسح من الفولدر او غيرتها تتبدل
        {
                    unlink(public_path('uplode/book/'). $book->img);
        }
        $book->categories()->sync([]); //to delete forign key
        $book->delete();              // amr eldelete
        $success="book delete";
        return response()->json($success);
        }

}

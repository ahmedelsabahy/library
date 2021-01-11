<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        //$bookes=Category::select('name','desc')->get();
      // $bookes=Category::select('desc','name')->where('id','<=','2')->get();
        $values = Category::orderby('id','desc')->paginate(3);     // $values = Category::get(); order عشان يعرض اخلر حاجه
        return view('categories.index',compact('values'));   
    }
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }        
    
    public function create()
    {
        return view('categories.create');
    }

    public function store (Request $value) //$value دا ابوجكت بيشيل الداتا 
    {          
                                  // request دا لارافيل  titile  عمود داتا بيز
       $value->validate([ 
           'cname' => 'Required |string|max:50',   
           ]);     
        Category::create([
            'name'=>$value->cname,
        ]);

      return redirect (route('categories.index'));
    }
    
    public function edit (Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    public function update(request $value ,$category)
    {
        $value->validate([ 
            'cname' => 'Required |string|max:50',   
            ]);         

        Category::findorfail($category)->update ([
            'name'=>$value->cname,
        ]);
        return redirect(route('categories.index',$category));
    }
    public function delete ($category)
    {
     Category::findorfail($category)->delete(); ;  // amr eldelete
        return redirect(route('categories.index'));
    }
}

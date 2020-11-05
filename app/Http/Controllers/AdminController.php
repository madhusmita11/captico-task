<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    function adminlogin(Request $request)
    {
        $email_id = $request->input('email_id');
        $pass = $request->input('password');
     //dd($email_id );
        $user = DB::table('admin')
            ->where('mail_id', $request->input('email_id'))
            ->where('password', $request->input('password'))
            ->first();
      //dd($user);
        if( $user==true){
        $request->session()->put('admin_session_data', $user);
        
            $data = ['status' => 200, 'message' => 'successfully login'];
            return response()->json($data);
        } else {
            $data = ['status' => 400, 'message' => 'Invalid email'];
            return response()->json($data);
        }
    }
    function insert_category(Request $request)
    {

        $category = $request->input('category');
        $cate = DB::table('category')->insert(array(
            'category_name' => $category
        ));
        $data = ['status' => 200, 'message' => 'success!'];
        return response()->json($data);

        $category = DB::select('select * from category');
        return view('dashboard', ['categories' => $category]);
    }

    function renederDashboard(Request $request)
    {
        $category = DB::select('select * from category');
        return view('dashboard', ['categories' => $category]);
    }
    function subcat_show()
    {
        // $category = DB::select('select * from category');




        $tabledata = DB::table('subcategory as subcat')
            ->join('category as cat', 'subcat.category_name', '=', 'cat.category_id')
            ->get(['subcat.*', 'cat.category_name', 'cat.category_id']);


        return view('subdashboard', ['categories' => $tabledata]);
    }

    function insert_subcategory(Request $request)
    {

        $category = $request->input('category');
        //dd($category);

        /** start of Image upload */
        $image = $request->file('image');
        $image_name =  now()->timestamp . '_' . $image->getClientOriginalName();
        $path = base_path() . '/public/upload';
        $request->file('image')->move($path, $image_name);
        $image_path = '/upload/' . $image_name;
        /** end of Image upload */

        $subcategory = $request->input('subcategory');

        $brando = DB::table('subcategory')->insertGetId(array(
            'category_name' => $category,
            'image' => $image_path,
            'subcategory_name' => $subcategory,

        ));
        // dd($brando);
        $data = ['status' => 200, 'message' => 'successfully login'];
        return response()->json($data);
    }

    function subcat_add(Request $request)
    {
        $category = DB::select('select * from category');
        return view('subcat', ['categories' => $category]);
    }

    function edit($id)
    {
        $category = DB::select('select * from category where category_id = ?', [$id]);
        return view('update_category', ['categories' => $category]);
    }

    public function update_category(Request $request, $id)
    {
        $category = $request->input('category');

       //dd($category);
        $result = DB::table('category')
            ->where('category_id', $id)
            ->update([
                'category_name' => $category

            ]);
        //dd($result);

        return redirect('dashboard');
    }

    public function subedit($id)
    {
         $category =  DB::select('select * from category');
        $subcategory = DB::select('select * from subcategory');
        
        return view('subupdate', ['categories' => $category, 'subcategories' => $subcategory]);
    }
    public function subupdate(Request $request ,$id)
        
    {
        $category = $request->input('category');
        $subcategory = $request->input('subcategory');
        $image = $request->file('image');
        
        $result = DB::table('subcategory')
        ->where('id', $id)
        ->update([
            'category_name' => $category,
            'subcategory_name' => $subcategory,
            'image' => $image,
            
           ]); 
           return redirect('subdashboard');
    }


}

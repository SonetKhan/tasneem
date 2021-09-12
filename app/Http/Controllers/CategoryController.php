<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function allCategory()
    {

        $catData = Category::latest()->paginate(5);
        return view('admin.category.index', ['catData' => $catData]);
    }
    public function searchingData(Request $request)
    {

        $catData = Category::select("*")

            ->when(!empty($request->input('category_name')), function ($query) use ($request) {
                // dd($request->category_name);
                $query->where('category_name', 'like',   $request->category_name . '%');
                // dd($query);
            })
            ->when(!empty($request->input('display_in_menu')), function ($query) use ($request) {
                return $query->where('display_in_menu', $request->display_in_menu);
            })
            ->when(!empty($request->input('display_in_meu_order')), function ($query) use ($request) {
                return $query->where('display_in_meu_order', 'like', $request->display_in_meu_order . '%');
            })->paginate(5);

        // dd($catData);

        return view('admin.category.searchingData', ['catData' => $catData]);
    }


    public function addCategory()
    {

        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {

        $validateData = $request->validate([

            'category_name' => 'required|unique:categories',

            'display_in_menu' => 'required',

            'display_in_meu_order' => 'required',



        ]);

        $catImage = $request->file('category_picture');



        if ($catImage) {

            $imageName = hexdec(uniqid()) . '.' . strtolower($catImage->getClientOriginalExtension());

            Image::make($catImage)->resize(100, 100)->save('image/category/' . $imageName);

            $uploadedImage = 'image/category/' . $imageName;

            $category = new Category();

            $category->category_name = $request->category_name;

            $category->category_picture = $uploadedImage;


            $category->display_in_menu = $request->display_in_menu;

            $category->display_in_meu_order = $request->display_in_meu_order;

            $category->created_by = auth()->id();

            $category->updated_by = auth()->id();

            $category->save();

            return redirect()->route('all.categories')->with('success', 'Category inserted successfully');
        } else {

            $category = new Category();

            $category->category_name = $request->category_name;


            $category->category_picture = $request->category_picture;

            $category->display_in_menu = $request->display_in_menu;

            $category->display_in_meu_order = $request->display_in_meu_order;

            $category->created_by = auth()->id();

            $category->updated_by = auth()->id();

            $category->save();

            return redirect()->route('all.categories')->with('success', 'Category inserted successfully');
        }
    }

    public function editCategory(Request $request, $id)
    {

        $editData = Category::find($id);

        return view('admin.category.edit', compact('editData'));
    }

    public function updateCategory(Request  $request, $id)
    {

        $validateData = $request->validate([

            'category_name' => 'required',

            'display_in_menu' => 'required',

            'display_in_meu_order' => 'required',


        ]);


        $catImage = $request->file('category_picture');

        $old_image = $request->old_image;



        if ($catImage) {

            $imageName = hexdec(uniqid()) . '.' . strtolower($catImage->getClientOriginalExtension());

            Image::make($catImage)->resize(100, 100)->save('image/category/' . $imageName);

            $uploadedImage = 'image/category/' . $imageName;

            if ($old_image) {

                unlink($old_image);
            }


            $category = Category::find($id);

            $category->category_name = $request->category_name;

            $category->category_picture = $uploadedImage;


            $category->display_in_menu = $request->display_in_menu;

            $category->display_in_meu_order = $request->display_in_meu_order;


            $category->updated_by = auth()->id();

            $category->save();

            return redirect()->route('all.categories')->with('success', 'Category updated successfully');
        } else {
            $category = Category::find($id);

            $category->category_name = $request->category_name;


            $category->category_picture = $request->category_picture;

            $category->display_in_menu = $request->display_in_menu;

            $category->display_in_meu_order = $request->display_in_meu_order;

            $category->updated_by = auth()->id();

            $category->save();

            return redirect()->route('all.categories')->with('success', 'Category updated successfully');
        }
    }
    public function deleteCategory($id)
    {


        $deleteData = Category::find($id)->delete();



        return redirect()->route('all.categories')->with('success', 'Data has deleted successfully!');
    }
}

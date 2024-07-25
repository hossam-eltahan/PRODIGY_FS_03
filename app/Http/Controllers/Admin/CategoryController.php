<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminEditCategoryRequest;
use App\Http\Requests\Admin\AdminCreateCategoryRequest;

class CategoryController extends Controller
{
    use  FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCreateCategoryRequest $request)
    {
        // $category = Category::create([
        //     'name' => $request->name
        // ]);

        // OR
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        toast(__('Category have been Created successfully'), 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminEditCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        toast(__('Category have been Updated successfully'), 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        try {
//            $category = Category::findorFail($id);
//            $products = Product::where('category_id', "LIKE", $id)->get();
//             if ($products->count() > 0) {
//                 foreach ($products as $product) {
//                     $path = $product->image;
//                     $this->deleteFile($path);
//                 }
//             } else {
//                 return response(['status' => 'error', 'message' => 'Products NOT FOUND'], 404);
//             }
//
//             $category->delete();
//
//             return response(['status' => 'success', 'message' => 'Deleted successfully']);
//        } catch (\Throwable $th) {
//            return response(['status' => 'error', 'message' => 'Something went wrong']);
//        }


        try {
            $category = Category::findOrFail($id);

            // الحصول على جميع المنتجات المرتبطة بالفئة
            $products = Product::where('category_id', $id)->get();

            if ($products->count() > 0) {
                // حذف المنتجات مع ملفاتها إذا كانت موجودة
                foreach ($products as $product) {
                    $path = $product->image;
                    $this->deleteFile($path);
                    $product->delete();
                }
                // حذف الفئة بعد حذف المنتجات
                $category->delete();
                return response(['status' => 'success', 'message' => 'Deleted successfully']);
            } else {
                // حذف الفئة حتى إذا لم يكن بها منتجات
                $category->delete();
                return response(['status' => 'success', 'message' => 'Category deleted with no products']);
            }
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }


    }
}

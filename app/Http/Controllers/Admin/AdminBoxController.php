<?php

namespace App\Http\Controllers\Admin;

use App\Models\Boxe;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBoxCreateRequest;

class AdminBoxController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boxes = Boxe::all();
        return view('admin.boxs.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.boxs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminBoxCreateRequest $request)
    {
        // dd($request->all());
        $imgPath = $this->handleFileUpload($request, 'image');
        $box = new Boxe();
        $box->title = $request->title;
        $box->image = $imgPath;
        $box->save();
        toast(__('Box has been created successfully'), 'success');

        return redirect()->route('admin.boxs.index');
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
        $box = Boxe::findOrFail($id);
        return view('admin.boxs.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $box = Boxe::findOrFail($id);

        $box->title = $request->title;

        $box->image = $this->handleFileUpload($request, 'image', $box->image);

        $box->save();


        return redirect()->route('admin.boxs.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $box = Boxe::findOrFail($id);
        $path = $box->image;
        $this->deleteFile($path);
        $box->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}

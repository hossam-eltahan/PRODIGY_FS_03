<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCompanyCreateRequest;
use App\Models\CompanyFooter;
use App\traits\FileUploadTrait;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $companies = CompanyFooter::all();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(AdminCompanyCreateRequest $request)
    {
//         dd($request->all());
        $imgPath = $this->handleFileUpload($request, 'image');
        $company = new CompanyFooter();
        $company->name = $request->name;
        $company->image = $imgPath;
        $company->save();
        toast(__('Box has been created successfully'), 'success');

        return redirect()->route('admin.company.index');
    }


    public function edit(string $id)
    {
        $company = CompanyFooter::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $company = CompanyFooter::findOrFail($id);

        $company->name = $request->name;

        $company->image = $this->handleFileUpload($request, 'image', $company->image);

        $company->save();


        return redirect()->route('admin.company.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }


//    delete Method
    public function destroy(string $id)
    {
        $company = CompanyFooter::findOrFail($id);
        $path = $company->image;
        $this->deleteFile($path);
        $company->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}

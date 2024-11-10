<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {
        
        $companies = Company::all();

        
       return view('admin.company.index', compact('companies')); 
      
    }

    public function create()
    {
        return view('admin.company.create');  
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([  
          'name' => 'required|string|max:255',
        ]);

      
         Company::create($validatedData);

     
        return redirect()->route('admin.company')->with('success', 'Company created successfully!');
    }

    public function edit($id)
    {
        
        $company = Company::findOrFail($id);

        
        return view('admin.company.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->update([
            'name' => $request->name,
        ]);

      
       return redirect()->route('admin.company')->with('success', 'Company updated successfully!');
    }

    public function destroy($id)
    {
       
        $company = Company::findOrFail($id);
        $company->delete();

        
       return redirect()->route('admin.company')->with('success', 'Company deleted successfully!');
    }




}

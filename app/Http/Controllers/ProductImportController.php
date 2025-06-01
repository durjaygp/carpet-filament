<?php

namespace App\Http\Controllers;

use App\Imports\CarpetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ProductImportController extends Controller
{
    public function showForm()
    {
        return view('products.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new CarpetImport, $request->file('file'));

        return back()->with('success', 'Products imported successfully.');
    }
}

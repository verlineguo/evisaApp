<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{

    public function index()
    {
        $country = Country::all()->toArray();
        return view('admin.country.index', ['country' => $country]);
    }

    public function create()
    {
        return view('admin.country.form');
    }

    public function save(Request $request)
    {
        $data = [
            'idCountry' => $request->idCountry,
            'countryName' => $request->countryName
        ];
        Country::create($data);

        return redirect()->route('admin.country.index')->with('success', 'Country added successfully.');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.country.form', ['country' => $country]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'idCountry' => $request->idCountry,
            'countryName' => $request->countryName
        ];
        Country::find($id)->update($data);

        return redirect()->route('admin.country.index')->with('success', 'Country updated successfully.');
    }

    public function delete($id)
    {
        Country::find($id)->delete();
        return redirect()->route('admin.country.index')->with('success', 'Country deleted successfully.');
    }
    
}   
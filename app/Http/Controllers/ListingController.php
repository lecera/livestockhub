<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            'category' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => 'required',
            'seller_mobile_number' => 'required',
            'photo' => 'required',
        ]);

        $price = str_replace(',', '', $request->price);
        $formFields['price'] = $price;
        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}

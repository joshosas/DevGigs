<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //SHOW ALL LISTINGS
    public function index()
    {
        // dd(request('tag'));
        return view('pages.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //SHOW SINGLE LISTINGS
    public function show(Listing $listing)
    {
        return view('pages.show', [
            'listing' => $listing
        ]);
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('pages.create');
    }

    // SHOW CREATE FORM
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'active url',
            'description' => 'required'

        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }
}

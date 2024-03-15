<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
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

    // STORE LISTING
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    // SHOW UPDATE FORM
    public function edit(Listing $listing)
    {
        return view('pages.edit', ['listing' => $listing]);
    }

    // UPDATE LISTING
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return view('pages.show', [
            'listing' => $listing
        ])->with('message', 'Listing Updated successfully');
    }

    // DELETE LISTING
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // MANAGE LISTINGS
    public function manage()
    {

        return view('pages.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}

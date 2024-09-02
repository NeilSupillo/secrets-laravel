<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secrets = Secret::orderBy('created_at', 'desc')->get();

        return view('secrets-components.home', ['secrets' => $secrets]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'secret' => 'required|string|max:255', // Adjust the max length as needed
        ]);

        // Create the secret and associate it with the authenticated user
        Secret::create([
            'secret' => $request->input('secret'),
            'user_id' => Auth::id(), // Associate with the authenticated user
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the specific secret by ID
        $secret = Secret::findOrFail($id);

        // Pass the secret to a view to display it
        return view('secrets-components.show', ['secret' => $secret]);
    }
}

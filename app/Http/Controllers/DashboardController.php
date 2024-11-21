<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve the secrets associated with the logged-in user
        $secrets = Secret::where('user_id', $user->id)->get();

        // Pass the secrets to the dashboard view
        return view('secrets-components.dashboard', ['secrets' => $secrets]);
    }


    public function update(Request $request, $id)
    {

        // Validate the request data
        $request->validate([
            'secret' => 'required|string|max:255',
        ]);

        // Find the secret by ID and ensure it's associated with the current user
        $secret = Secret::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Update the secret
        $secret->secret = $request->input('secret');
        $secret->save();

        // Redirect or return a response, e.g., back to the dashboard with a success message
        return redirect()->route('dashboard')->with('status', 'Secret updated successfully');
    }

    public function destroy($id)
    {
        // Find the secret by ID and ensure it belongs to the authenticated user
        $secret = Secret::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Delete the secret
        $secret->delete();

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('status', 'Secret deleted successfully.');
    }
}

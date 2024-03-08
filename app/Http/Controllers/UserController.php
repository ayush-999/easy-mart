<?php

namespace App\Http\Controllers;

use App\Models\{User, Country, City, State};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $countries = Country::get(['name', 'id']);
        return view('index', compact('userData', 'countries'));
    }

    public function UserFetchState(Request $request)
    {
        if ($request->country_id) {
            $data['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
            return response()->json($data);
        } else {
            return response()->json(['states' => []]);
        }
    }

    public function UserFetchCity(Request $request)
    {
        if ($request->state_id) {
            $data['cities'] = City::where('state_id', $request->state_id)->get(['name', 'id']);
            return response()->json($data);
        } else {
            return response()->json(['cities' => []]);
        }
    }

    public function UserDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method
}
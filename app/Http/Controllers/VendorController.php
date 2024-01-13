<?php

namespace App\Http\Controllers;

use App\Models\{User, Country, City, State};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class VendorController extends Controller
{
    public function VendorDashboard()
    {
        return view("vendor.index");
    } //End Method

    public function VendorLogin()
    {
        return view("vendor.vendor_login");
    } // End Method

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        $countries = Country::get(['name', 'id']);
        return view('vendor.vendor_profile_view', compact('vendorData', 'countries'));
    } // End Method

    public function VendorFetchState(Request $request)
    {
        if ($request->country_id) {
            $data['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
            return response()->json($data);
        } else {
            return response()->json(['states' => []]);
        }
    }

    public function VendorFetchCity(Request $request)
    {
        if ($request->state_id) {
            $data['cities'] = City::where('state_id', $request->state_id)->get(['name', 'id']);
            return response()->json($data);
        } else {
            return response()->json(['cities' => []]);
        }
    }

    /**
     * Display the Vendor Profile Store.
     */
    public function VendorPersonalDetails(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'dob' => 'nullable|date',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        if ($data) {
            $data->name = $request->name;
            $data->email = $request->email ? $request->email : $data->email;
            $data->phone = $request->phone;
            $data->dob = $request->dob;
            $data->street = $request->street;
            $data->landmark = $request->landmark;
            $country = Country::find($request->country);
            $state = State::find($request->state);
            $city = City::find($request->city);
            $data->country = $country ? $country->name : $data->country;
            $data->state = $state ? $state->name : $data->state;
            $data->city = $city ? $city->name : $data->city;
            $data->pincode = $request->pincode;
            $data->vendor_short_info = $request->shortInfo;
            $data->save();
            $notification = [
                'message' => 'Vendor Details Updated Successfully',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'User not found',
                'alert-type' => 'error'
            ];
        }
        return redirect()->back()->with($notification);
    } // End Method

    public function VendorAdditionalDetails(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);

            // Delete old photo if exists
            if ($user->photo) {
                @unlink(public_path('upload/vendor_images/' . $user->photo));
            }

            $user->photo = $filename;
            $user->save();

            $notification = [
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            ];
        } else {
            $notification = [
                'message' => 'Failed',
                'alert-type' => 'error',
            ];
        }

        return redirect()->back()->with($notification);
    }

    public function VendorShopDetails(Request $request)
    {
        $request->validate([
            'vendorShopName' => 'required',
            'vendorJoinDate' => 'required|date',
            'vendorGst' => 'required',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        if ($data) {
            $data->shop_name = $request->vendorShopName;
            $data->vendor_join = $request->vendorJoinDate;
            $data->vendor_gst = $request->vendorGst;
            $data->save();
            $notification = [
                'message' => 'Vendor Shop Details Updated Successfully',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'User not found',
                'alert-type' => 'error'
            ];
        }
        return redirect()->back()->with($notification);
    } // End Method

    public function VendorSettings()
    {
        return view('vendor.vendor_settings');
    } // End Method

    public function VendorUpdatePassword(Request $request)
    {
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", " Password Changed Successfully");
    } // End Method 

    /**
     * Destroy an authenticated session.
     */
    public function VendorDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    } // End Method
}

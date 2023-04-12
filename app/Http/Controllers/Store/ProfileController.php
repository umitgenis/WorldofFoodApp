<?php

namespace App\Http\Controllers\Store;

use App\Helper\cityList;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function detail($id)
    {
        if (empty(User::where('id', '=', $id))) {
            return redirect('/');
        }
        $data = User::where('id', '=', $id)->first();
        return view('store.profile.detail', ['data' => $data]);
    }

    public function address($id)
    {
        $cityList =  cityList::getCity();

        $user = User::where('id', '=', $id)->with('userAddresses')->first();
        if (empty($user)) {
            return redirect('/');
        }
        $userAddresses = $user->userAddresses;
        return view('store.profile.address', ['userAddresses' => $userAddresses, 'cityList' => $cityList]);
    }

    public function address_add(Request $request, $id)
    {

        $request->validate([
            'address_name' => 'required|string|max:255|min:1',
            'address_city' => 'required|string|max:255|min:5',
            'address' => 'required|string|max:500|min:5',
        ]);

        $userAddress = new UserAddress();
        $userAddress->name = $request->input('address_name');
        $userAddress->city = $request->input('address_city');
        $userAddress->address = $request->input('address');

        $userAddress->user_id = Auth::id();
        $userAddressesSave = $userAddress->save();

        if ($userAddressesSave) {
            return back()->with('status', 'Address Addedd Success.');
        }else{
            return back()->with('error', 'Error! Address cannot add.');
        }
    }

    public function address_update(Request $request, $address_id)
    {

        $user = Auth::id();
        $userAddress = UserAddress::find($address_id);

        if (!Auth::check() && ( $userAddress->user_id == $user)) {
            return redirect('/');
        }

        $request->validate([
            'address_name' => 'required|string|max:255|min:1',
            'address_city' => 'required|string|max:255|min:5',
            'address' => 'required|string|max:500|min:5',
        ]);

        $userAddress->name = $request->input('address_name');
        $userAddress->city = $request->input('address_city');
        $userAddress->address = $request->input('address');

        $userAddressesUpdate = $userAddress->save();

        if ($userAddressesUpdate) {
            return back()->with('status', 'Address Updated Success.');
        }else{
            return back()->with('error', 'Error! Address cannot update.');
        }
    }

    public function address_delete(Request $request, $address_id)
    {

        $userAddress = UserAddress::find($address_id);

        if (!Auth::check() && ( $userAddress->user_id == Auth::id())) {
            return redirect('/');
        }

        $userAddressesDelete = $userAddress->delete();

        if ($userAddressesDelete) {
            return back()->with('status', 'Address Deleted Success.');
        }else{
            return back()->with('error', 'Error! Address cannot delete.');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed Success!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|email|string|max:255',
        ]);


        if (!$user = Auth::user()) {
            return redirect('/');
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('status-profile', 'Profile Updated Success.');

    }
}

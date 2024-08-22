<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $authenticatedUser = Auth::user();
        $user = User::find($authenticatedUser->id);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('status', 'Password updated successfully.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->with('showPasswordModal', true);
        }
    }
}

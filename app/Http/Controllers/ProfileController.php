<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show()
    {
        return view('pages.profile.userProfile');
    }

    /**
     * Display the user's profile form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return redirect()->back()->with(['status' => 'success', 'message' => 'Your information has updated']);
    }

    //    user info update
    public function user_infoUpdate(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $user = User::find(Auth::user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->post_code = $request->postal_code;
            $user->about = $request->about_me;
            $user->update();
            return redirect()->back()->with(['status' => 'success', 'message' => 'Your information has updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'error', 'message' => 'Something is wrong' . $e->getMessage()]);
        }
    }

    // avatar update
    public function avatar_update(Request $request)
    {
        try {
            $fileName = imageUploadWithCustomSize($request->file('file'), 500, 500, 'avatar');
            if (Auth::user()->avatar != null) {
                Storage::delete('public/'.Auth::user()->avatar);
            }
            $user = User::find(Auth::user()->id);
            $user->avatar = 'avatar/' . $fileName;
            $user->update();
            return ['status' => 'success', 'file' => 'avatar/' . $fileName];
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'error', 'message' => 'Something is wrong' . $e->getMessage()]);
        }
    }

    /**
     * Delete the user's account.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

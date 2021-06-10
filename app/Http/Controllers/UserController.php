<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RepresentationUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', [
            'user' => $user,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {

        if (is_null(Auth::user())
            || Auth::id() != (int)$id
            || !Auth::check()) {
            return redirect()->route('show.index')->with('error', 'Please log in to access this page.');
        }

        $user = User::find($id);

        return view('user.modify', [
            'user' => $user
        ]);
    }

    /**
     * update method.
     * Handles the update of an user's information.
     *
     * @param Request $request
     * @param int|string $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        if ($request->isMethod('post')) {
            if (isset($request->submit) && Auth::id() === (int)$id) {
                if (User::checkModifiedFields($request)) {
                    $user = User::where('id', $id)->first();

                    // Store fields, if the user hasn't specified/filled a field, use the DDB's data
                    $name = is_null($request->name)
                        ? $user->name
                        : $request->name;

                    $email = is_null($request->email)
                        ? $user->email
                        : $request->email;

                    // Check if User is not using the same data than what's set in DDB
                    if (!User::checkIfFieldsAreDifferent($user, $request)) {
                        return back()->with('error', 'The values given are the same than what is set for your profile.');
                    }

                    // Check if email is already present in DDB
                    if (!is_null($request->email) && !User::verifyEmailIsNotPresentInDb($request->email)) {
                        return back()->with('error', 'The email is already taken.');
                    }

                    // User wants to change their password
                    if (User::checkIfAPasswordIsGiven($request)) {
                        if (!is_null($request->password) && !is_null($request->confPassword)) {
                            if ($request->password === $request->confPassword) {
                                // Regex check validation
                                if (User::checkPasswordValidity($request->password)) {
                                    $newPassword = $request->password;

                                    // Hashing and storing the new password
                                    $user->password = Hash::make($newPassword);
                                } else {
                                    return back()->with('error', 'The new password must be at least 8 characters long, 1 uppercase, 1 lowercase & 1 number.')->withInput();
                                }
                            } else {
                                return back()->with('error', 'The passwords don\'t match.');
                            }
                        } else {
                            return back()->with('error', 'Please make sure to confirm your password.');
                        }
                    }

                    // Storing the data (even if unchanged)
                    $user->name = $name;
                    $user->email = $email;

                    // Saving data
                    return $user->save()
                        ? redirect()->route('user.show', $user->id)->with('success', 'Your personal details have been successfully updated !')
                        : redirect()->route('user.show', $user->id)->with('error', 'There was a problem updating your personal details.');
                }

                return redirect()->route('user.modify', Auth::id())->with('back', 'Please fill in at least one field you wish to update or go back');
            }
        } else {
            return redirect()->route('show.index')->with('error', 'Access Forbidden.');
        }

        return redirect()->route('welcome')->with('error', 'Access Forbidden.');
    }

    public function profile()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $bookings = RepresentationUser::where('user_id', '=', $user_id)->get();

        return view('user.profile', [
            'user' => $user,
            'bookings' => $bookings,
        ]);
    }
}

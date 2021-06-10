<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            || Auth::user()->id != $id
            || !Auth::check()) {
            return redirect()->route('show.index')->with('error', 'Please log in to access this page.');
        }

        $user = User::find($id);

        return view('user.modify', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int|string $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        if ($request->isMethod('post')) {
            if (isset($request->submit) && Auth::id() === (int)$id) {
                $user = User::where('id', $id)->first();

                // Store fields, if user hasn't specified a field, use the Auth::user() data
                $name = is_null($request->name)
                    ? $user->name
                    : $request->name;

                $email = is_null($request->email)
                    ? $user->email
                    : $request->email;

                if (!is_null($request->password) && !is_null($request->confPassword)) {

                    if ($request->password === $request->confPassword) {


                        if ($this->checkPasswordValidity($request->password)) {
                            $newPassword = $request->password;

                            // Hashing and storing the new password
                            $user->password = Hash::make($newPassword);
                        } else {
                            return back()->with('error', 'The new password must be at least 8 characters long, 1 uppercase, 1 lowercase & 1 number.')->withInput();
                        }
                    } else {
                        return back()->with('error', 'The passwords don\'t match.')->withInput();
                    }
                }
                $user->name = $name;
                $user->email = $email;

                // Saving data
                return $user->save()
                    ? redirect()->route('user.show', $user->id)->with('success', 'Your personal details have been successfully updated !')
                    : redirect()->route('user.show', $user->id)->with('error', 'There was a problem updating your personal details.');
            }
        } else {
            return redirect()->route('show.index')->with('error', 'Access Forbidden.');
        }

        return redirect()->route('welcome')->with('error', 'Access Forbidden.');
    }

    /**
     * checkPasswordValidity method.
     * Checks if the given password matches with the regex.
     *
     *  Password needs to have at least :
     *  8 Characters          => (?=\S{8,})
     *  1 lowercase character => (?=\S*[a-z])
     *  1 uppercase character => (?=\S*[A-Z])
     *  1 number              => (?=\S*[\d])
     * @param $password
     * @return false|int false is the password doesn't meet the regex criteria, 1 otherwise
     */
    public function checkPasswordValidity($password) {
        $regex = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

        return (preg_match($regex, $password));
    }
}

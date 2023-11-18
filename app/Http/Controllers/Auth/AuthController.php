<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordForgetRequest;
use App\Http\Requests\PasswordRecoverRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(LoginRequest $request)
    {
        $response =  Auth::attempt($request->only('email', 'password'));
        if($response) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->with('message', 'Wrong Credential.');
    }

    public function me()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function passwordReset()
    {
        return view('auth.passwordReset');
    }

    public function passwordResetProcess(PasswordForgetRequest $request)
    {
        $user = auth()->user();

        if(Hash::check($request->old_password, $user->password)) {
            User::where('id', $user->id)->update(['password' => $request->password]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('message', 'Old password Does not match.');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function passwordRecover()
    {
        return view('auth.passwordRecover');
    }

    public function passwordRecoverProcess(PasswordRecoverRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }


    public function resetPassword($token)
    {
        return view('auth.passwordRecoverForm', ['token' => $token]);

    }


    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}

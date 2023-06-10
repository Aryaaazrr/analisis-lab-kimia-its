<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisCustomer;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Session;
// use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Validator;
use App\Mail\verifyEmail as MailVerifyEmail;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        $jenis_customer = ['Internal Kimia', 'Internal ITS', 'Umum'];
        return view('auth.register', compact('jenis_customer'));
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // cek login valid
        if (Auth::attempt($credentials)) {
            // cek verify-email
            if (Auth::user()->email_verified_at == '') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed!');
                Session::flash('message', 'Verifikasi Email Terlebih Dahulu!');
                return redirect('/');
            }

            // $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('admin/beranda');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('layanan');
            }
        }
        Session::flash('status', 'failed!');
        Session::flash('message', 'Akun Tidak Ditemukan. Silahkan Daftar akun terlebih dahulu!');
        return redirect('/');
    }

    public function registerProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|lowercase|regex:/^\S*$/|max:255',
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'no_telepon' => 'required|unique:users|regex:/^\d{10,12}$/',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,}$/|max:255',
            'confirm-password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'institusi' => $request->institusi,
            'departemen' => $request->departemen,
            'no_telepon' => $request->no_telepon,
            'jenis_customer' => $request->jenis,
        ]);

        event(new Registered($user));

        Auth::login($user);
    }

    public function sendVerificationEmail($user)
    {
        // $verificationUrl = URL::temporarySignedRoute(
        //     'verification.verify',
        //     now()->addMinutes(30),
        //     ['id' => $user->id, 'token' => $user->verification_token]
        // );
        $token = Str::random(20);
        $verificationURL = url('verify/' . $token);

        Mail::to(Auth::user()->email)
            ->send(new verifyEmail($token));

        return redirect('send-email');

        // Mail::to($user->email)->send(new VerifyEmail($verificationUrl)); // mengirim email verifikasi
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

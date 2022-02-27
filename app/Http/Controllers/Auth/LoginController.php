<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ----- Laravel Sociolite Login -----
     */
    /**
     *  Google Redirect
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Google callback
     */
    public function handleGoogleCallback()
    {
        // fetchig data from the Google
        $gooleUser = Socialite::driver('google')->user();

        // compairing google user's email exist or not
        $userEmail = User::where('email', '=', $gooleUser->email)->first();

        // if there is no matched email found
        if (!$userEmail) {

            $user = new User();
            $user->fname = $gooleUser->user['given_name'];
            $user->lname = $gooleUser->user['family_name'];
            // $user->user_name = $gooleUser->name;
            $user->uname = $gooleUser->user['given_name'];
            $user->email = $gooleUser->email;
            $user->isVerified = 1;
            $user->google_id = $gooleUser->id;
            $user->avatar = $gooleUser->avatar;

            // store Google data to the database
            $user->save();

            // Disable email Verification for social login
            $user->markEmailAsVerified();

            // attatch current user a role
            $user->attachRole('user');

            // after storing the data, make user loggedIn
            Auth::login($user);

            // redirect user to the database
            return redirect('/dashboard');
        }
        // if  matched email found
        else {

            // finding the google_id exist or not
            $google_id = User::where('google_id', '=', $gooleUser->id)->first();
            // if the existed google_id not equals to null
            if (!$google_id == null) {
                $registeredGoogle_id = User::where('google_id', '=', $google_id->id)->first();

                // if the google_id matched
                if ($registeredGoogle_id) {
                    //then loogin through it
                    Auth::login($registeredGoogle_id);
                    // Redirect to Dashboard page
                    return redirect('/dashboard');
                } else {
                    return redirect()->route("login");
                }
            }
            // if the existed google_id equals to null
            else {
                // redirect to login page
                return redirect()->route("login");

            }
        }
    }
    //---------------------------------------------------------------------
    // Redirect to the Github page
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();

    }

    // Github CallBack
    public function handleGithubCallback()
    {
        // fetchig data from the Github
        $githubUser = Socialite::driver('github')->user();
        // dd($githubUser);
        // compairing github user's email exist or not
        $userEmail = User::where('email', '=', $githubUser->email)->first();

        // if there is no matched email found
        if (!$userEmail) {

            $user = new User();
            $user->uname = $githubUser->name;
            $user->email = $githubUser->email;
            $user->isVerified = 2;
            $user->github_id = $githubUser->id;
            $user->avatar = $githubUser->avatar;

            // store Github data to the database
            $user->save();
            // Disable email Verification for social login
            $user->markEmailAsVerified();
            $user->attachRole('user');
            // after storing the data, make user loggedIn
            Auth::login($user);

            // redirect user to the database
            return redirect('/dashboard');

        }
        // if  matched email found
        else {
            // finding the github_id exist or not
            $github_id = User::where('github_id', '=', $githubUser->id)->first();
            // if the existed github_id not equals to null
            if (!$github_id == null) {
                $registeredGithub_id = User::where('github_id', '=', $githubUser->id)->first();
                // if the github_id matched
                if ($registeredGithub_id) {
                    //then loogin through it
                    Auth::login($registeredGithub_id);
                    // Redirect to Dashboard page
                    return redirect('/dashboard');
                } else {
                    return redirect()->route("login");
                }
            }
            // if the existed github_id equals to null
            else {
                // redirect to login page
                return redirect()->route("login");

            }
        }
    }
}

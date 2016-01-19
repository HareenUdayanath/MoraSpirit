<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Log;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;


    protected $loginPath = "login";
    protected $redirectPath = "/";
    protected $username = "ID";


    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'id' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('id', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('id', 'remember'))
            ->withErrors([
                'id' => $this->getFailedLoginMessage(),
            ]);
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    public function postRegister(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->auth->login($this->registrar->create($request->all()));

        return redirect($this->redirectPath());
    }


}

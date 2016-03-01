<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AuthController
 * @package App\Http\Controllers\Admin
 */
class AuthController extends Controller
{
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectTo = 'admin';
	protected $guard = 'admin';
	protected $loginView = 'admin.login';
	protected $registerView = 'admin.register';
	protected $redirectAfterLogout = 'admin/login';
	/**
	 * AuthController constructor.
	 */
	public function __construct()
	{
		$this->middleware('guest:admin', ['except' => ['logout','login']]);
	}

	/**
	 * @param array $data
	 * @return \Illuminate\Validation\Validator
	 */
	protected function validator( array $data )
	{
		return \Validator::make($data, [
			'name'     => 'required|max:255',
			'email'    => 'required|email|max:255|unique:admins',
			'password' => 'required|confirmed|min:6'
		]);
	}

	protected function create( array $data )
	{
		return Admin::create([
			'name'  => $data['name'],
			'email' => $data['email'],
			'password'  =>bcrypt($data['password'])
		]);
	}
}

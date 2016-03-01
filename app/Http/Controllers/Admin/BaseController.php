<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	/**
	 * BaseController constructor.
	 */
	protected $user;
	public function __construct()
	{
		$this->middleware('admin:admin');
		$this->user = \Auth::guard('admin')->user();
	}

}

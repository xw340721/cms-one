<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
	/**
	 * AdminController constructor.
	 */
	public function __construct(  )
	{
		$this->middleware('admin:admin');
    }

	public function index(  )
	{
		$user = \Auth::guard('admin')->user()->toArray();
		return view('admin.home',compact('user'));
	}


}

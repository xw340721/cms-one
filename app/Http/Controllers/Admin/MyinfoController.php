<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyinfoController extends BaseController
{
	public function index()
	{
		if (function_exists('gd_info')) {
			$gd = gd_info();
			$gd = $gd['GD Version'];
		} else {
			$gd = "不支持";
		}
		$user = $this->user;
		$info = [
			'操作系统' => PHP_OS,
			'主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
			'运行环境' => $_SERVER["SERVER_SOFTWARE"],
			'PHP运行方式' => php_sapi_name(),
			'程序目录' => public_path(),
			'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
			'GD库版本' => $gd,
//            'MYSQL版本' => mysql_get_server_info(),
			'上传附件限制' => ini_get('upload_max_filesize'),
			'执行时间限制' => ini_get('max_execution_time') . "秒",
			'剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
			'服务器时间' => date("Y年n月j日 H:i:s"),
			'北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
			'采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
			'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
			'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
			'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
		];
		return view('admin.index.myinfo',compact('info','user'));
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function password()
	{
		$user=$this->user;
		return view('admin.index.password',compact('user'));
	}


	/**
	 * @param ChangePasswordRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function change_password( ChangePasswordRequest $request )
	{
		$admin = Admin::findOrFail($this->user['id']);
		$password = $admin->password;
		if($password == bcrypt($request->get('password'),config('app.key'))){
			return 111;
		}
		$admin->password = bcrypt($request->get('password_confirm'));
		if($admin->save()){
			return redirect('admin/myinfo');
		}

	}

}

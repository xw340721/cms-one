@extends('admin.layouts.admin_index')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="text-center">密码修改</h3>
        </div>
        <div class="panel-body">
           <div class="row">
               <div class="col-md-6 col-md-offset-3">
                   @if(count($errors)>0)
                       @foreach($errors->all() as$value)
                           <div class="alert alert-danger">{{$value}}</div>
                       @endforeach
                   @endif
               </div>
           </div>
            <form action="{{url('admin/password')}}" class="form-horizontal " method="post" role="form">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="form-group ">
                    <div class="col-md-3 control-label">
                        <label for="">用户</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text"  class="form-control "  disabled value="{{$user['name']}}">
                    </div>
                </div>

                <div class="form-group  {{$errors->has('password')?'has-error' :''}} ">
                    <div class="col-md-3 control-label">
                        <label  for="">现密码</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control " name="password" placeholder="输入原始密码">
                    </div>
                </div>
                <div class="form-group {{$errors->has('password_again')?'has-error' :''}} ">
                    <div class="col-md-3 control-label">
                        <label for="">新密码</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_again" placeholder="请再输入一次">
                    </div>
                </div>
                <div class="form-group {{$errors->has('password_confirm')?'has-error' :''}}">
                    <div class="col-md-3 control-label">
                        <label for="">确认密码</label>
                    </div>
                    <div class="col-md-6 control-label">
                        <input type="password" class="form-control" name="password_confirm" placeholder="请再输入一次">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


@endsection()
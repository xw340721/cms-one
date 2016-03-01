@extends('admin.layouts.admin_index')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="text-center">基本信息</h3>
        </div>
    </div>
    <table class="table table-striped">
        <tbody>
            @foreach($info as $key=>$value)
                <tr>
                    <td width="120" align="right"><strong>{{$key}}：</strong></td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
    </table>
@endsection
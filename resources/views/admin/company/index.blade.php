@extends('admin.layouts.admin_index')
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop()
@section('content')
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                        <div class="pull-right">
                            <a href="{{url('admin/company/brand/create')}}" class="btn-success btn">
                                创建
                            </a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>图片</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->title}}</td>
                                    <td>{{$model->image}}</td>
                                    <td>
                                        <a class="btn  btn-primary" href="{{url('admin/company/brand')}}">修改</a>
                                        <a class="btn btn-danger" data-id="{{$model->id}}" data-toggle="modal"  href="#delet-model">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>图片</th>
                                <th>操作</th>
                            </tr>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    <div class="modal fade" id="delet-model">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Modal title</h4>
    			</div>
                <form id="form" method="post" role="form">
                    {!! method_field('DELETE') !!}
    			<div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        <span  id="message"></span>
                    </p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">Save changes</button>
    			</div>
                </form>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop()

    @section('script')
            <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "columnDefs":[
                    {orderable:false,//禁用排序
                        targets:[3]}   //指定的列
                ],
                "info": true,
                "autoWidth": false
            });
        });
        $('a[data-id]').bind('click', function (e) {
            var id = $(e.target).attr('data-id');
            var url = "{{url('admin/company/brand/')}}/"+id;
            $('#form').attr('action',url );
            $('#message').html('确定要删除'+id);
        });
    </script>
@endsection()
@extends('layouts.main')
@section('title','About')
@section('content')
<div class="container-fluid">
  <div class="panel panel-primary">
    <div class="panel-heading text-center panel-relative"><h2>Dánh sách giáo viên</h2>

    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Username</th>
            <th>Ngày sinh</th>
            <th>Trường</th>
            <th>Khoa học</th>
            <th>Số điện thoại</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php $row = 0; ?>
          @foreach($teachers as $teacher)
          <?php $row = $row + 1; ?>
          <tr>
            <th scope="row">{{$row}}</th>
            <td>{{$teacher->user->name}}</td>
            <td>{{$teacher->user->username}}</td>
            <td>{{$teacher->ngaysinh}}</td>
            <td>{{$teacher->truong}}</td>
            <td>{{$teacher->khoa}}</td>
            <td>{{$teacher->sodienthoai}}</td>
            <td><i class="fa fa-pencil fa-2x"></i></td>
            <td><i class="fa fa-trash fa-2x"></i></td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
    <div class="panel-footer"><h2><a href="{{ action('TeachersController@create')}}"><i class="fa fa-plus-circle fa-2x"></i></a></h2></div>
  </div>
</div>
@stop

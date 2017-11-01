@extends('layouts.main')
@section('title','About')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true
  });
} );
</script>
<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="{{ action('TeachersController@index')}}">Giáo viên</a></li>
    <li class="active">Thêm giáo viên</li>
  </ol>
  <div class="panel panel-primary">
    <div class="panel-heading text-center panel-relative">

      <h2>Thêm giáo viên</h2></div>
      <div class="panel-body">
        <div class="form-group">
          <form class="form form-horizontal" action="{{ action('TeachersController@store') }}" method="post">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user fa-1x"></i></span>
              <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
            </div>
            <br>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-key fa-1x"></i></span>
              <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
            </div>
            <br>

            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope fa-1x"></i></span>
              <input type="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
            </div>

            <br>

            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-birthday-cake fa-1x"></i></span>
              <input type="text" name="ngaysinh" class="form-control" id="datepicker" placeholder="Ngày sinh" aria-describedby="sizing-addon1">
            </div>
            <br>


            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-university fa-1x"></i></span>
              <select class="form-control" name="truong">
                <option value="Trường đại học bách khoa">Trường đại học bách khoa</option>
                <option value="Trường đại học sư phạm">Trường đại học sư phạm</option>
                <option value="Trường đại học kinh tế">Trường đại học kinh tế</option>
                <option value="Trường đại học ngoại ngữ">Trường đại học ngoại ngữ</option>
              </select>
            </div>
            <br>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-graduation-cap fa-1x"></i></span>
              <select class="form-control" name="khoa">
                <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                <option value="Sư phạm kỹ thuật công nghiệp">Sư phạm kỹ thuật công nghiệp</option>
                <option value="Công nghệ sinh học">Công nghệ sinh học</option>
                <option value="Công nghệ kỹ thuật vật liệu xây dựng">Công nghệ kỹ thuật vật liệu xây dựng</option>
                <option value="Công nghệ chế tạo máy">Công nghệ chế tạo máy</option>
                <option value="Quản lý công nghiệp">Quản lý công nghiệp</option>
                <option value="Kỹ thuật cơ khí">Kỹ thuật cơ khí</option>
                <option value="Kỹ thuật cơ - điện tử">Kỹ thuật cơ - điện tử</option>
                <option value="Kỹ thuật nhiệt">Kỹ thuật nhiệt</option>
                <option value="Kỹ thuật điện, điện tử">Kỹ thuật điện, điện tử</option>
                <option value="Kỹ thuật điện tử & viễn thông">Kỹ thuật điện tử & viễn thông</option>
                <option value="Kỹ thuật điều khiển & tự động hóa">Kỹ thuật điều khiển & tự động hóa</option>
                <option value="Công nghệ thực phẩm">Công nghệ thực phẩm</option>
              </select>
            </div>
            <br>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone-square fa-1x"></i></span>
              <input type="tel" class="form-control" placeholder="Số điện thoại" aria-describedby="sizing-addon1">
            </div>
            <br>
            <div class="form-group">
              <div class="col-xs-12">
                <input class="btn btn-primary btn-block" value="Thêm giáo viên"
                type="submit"> <input type="hidden" name="add">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @stop

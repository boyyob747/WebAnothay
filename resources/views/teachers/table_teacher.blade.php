<div class="panel panel-primary" >
  <!-- style="min-height: 70%;
  height: 90%;" -->
<div class="panel-heading text-left panel-relative"><h2>Dánh sách giáo viên</h2>
  <button class="btn btn-success" name="btn_modal" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus" aria-hidden="true"></i></button>
  <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-bars" aria-hidden="true"></i> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ action('FileExcelController@getExportTeachers')}}">Tải bảng giao viên file excel</a></li>
    <li><a class="dropdown-item" href="{{ action('TeachersController@deleteAll','1')}}" onclick='return confirm("Bạn có thực sự muốn xóa tất cả bảng giáo viên không?")'>Xóa tất cả bảng giáo viên</a></li>
  </ul>
</div>

</div>

<div class="panel-body ">
  @if ($message = Session::get('usernameInsertError'))
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Lỗi : </strong> <b>{{!! Session::get('usernameInsertError') !!}}</b>
  </div>
  @endif

  @if($errors-> any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi : </strong> <b>{{$error}}</b>
  </div>
  @endforeach
  @endif
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công : </strong> <b>{{!! Session::get('success') !!}}</b>
  </div>
  @endif
  <div class="table-responsive">
    <table class="table table table-hover" id="table_teachers">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên</th>
          <th>Username</th>
          <th>Email</th>
          <th>Ngày sinh</th>
          <th>Trường</th>
          <th>Khoa học</th>
          <th>Số điện thoại</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php $row = 0;
        if (isset($_GET['page']))
        {
          $page = $_GET['page'];
          $page = $page * 10;
        }
        else {
          $page = 10;
        }
        ?>
        @foreach($teachers as $teacher)
        <?php $row = $row + 1; ?>
        <tr>
          <th scope="row"><?php if ($page > 10)
          {
            echo $page-10 + $row;
          }
          else {
            echo $row;
          }
          ?></th>
          <td>{{$teacher->user->name}}</td>
          <td>{{$teacher->user->username}}</td>
          <td>{{$teacher->user->email}}</td>
          <td>{{$teacher->ngaysinh}}</td>
          <td>{{$teacher->truong}}</td>
          <td>{{$teacher->khoa}}</td>
          <td>{{$teacher->sodienthoai}}</td>
          <td><button class="btn btn-success" onclick="getTeacherFromServer({{$teacher->id}})">Edit</button</td>
            <td>{!! Form::open(['url' => '/home/teacher/'.$teacher->user->id, 'method' => 'delete' , 'onsubmit' => 'return confirm("Bạn có thực sự muốn xóa không?")']) !!}
              {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

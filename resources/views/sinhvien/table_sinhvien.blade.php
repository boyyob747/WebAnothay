<div class="container-fluid">
<div class="panel panel-primary" >
  <!-- style="min-height: 70%;
  height: 90%;" -->
<div class="panel-heading text-left panel-relative"><h2>Danh sách sinh viên</h2>
  <button class="btn btn-success" name="btn_modal" id="btn_add_sinhvien"><i class="fa fa-plus" aria-hidden="true"></i></button>
  <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-bars" aria-hidden="true"></i> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ action('FileExcelController@getExportSinhviens')}}">Tải bảng sinh viên file excel</a></li>
    <li><a class="dropdown-item" href="{{ action('TeachersController@deleteAll','0')}}" onclick='return confirm("Bạn có thực sự muốn xóa tất cả bảng sinh viên không?")'>Xóa tất cả bảng giáo viên</a></li>
  </ul>
</div>

</div>

<div class="panel-body ">
  <div id="showsuccesbyself">

  </div>
  @if ($message = Session::get('usernameInsertError'))
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Lỗi : </strong> <b><?=$message?></b>
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
    <strong>Thành công : </strong> <b><?=$message?></b>
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
          <th>Mã số sinh viên</th>
          <th>Ngày sinh</th>
          <th>Lớp</th>
          <th>Khoa học</th>
          <th>Số điện thoại</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        <?php $row = 0;
        ?>
        @foreach($students as $student)
        <?php $row = $row + 1; ?>
        <tr class="item{{$student->id}}">
          <th scope="row"> {{$row}}</th>
          <td>{{$student->user->name}}</td>
          <td>{{$student->user->username}}</td>
          <td>{{$student->user->email}}</td>
          <td>{{$student->mssv}}</td>
          <td>{{$student->ngaysinh}}</td>
          <td>{{$student->lop}}</td>
          <td>{{$student->khoa}}</td>
          <td>{{$student->sodienthoai}}</td>
          <td><button class="edit-modal-sinhvien btn btn-info"
            data-info="{{$student->id}},{{$student->user->name}},{{$student->user->username}},{{$student->user->email}},{{$student->ngaysinh}},{{$student->lop}},{{$student->khoa}},{{$student->sodienthoai}},{{$student->user->id}},{{$row}},{{$student->mssv}}">
            <span class="glyphicon glyphicon-edit"></span>
        </button></td>
        <td><button class="delete-modal-sinhvien btn btn-danger"
          data-info="{{$student->id}},{{$student->user->name}},{{$student->user->username}},{{$student->user->email}},{{$student->ngaysinh}},{{$student->lop}},{{$student->khoa}},{{$student->sodienthoai}},{{$student->user->id}},{{$row}},{{$student->mssv}}">
          <span class="glyphicon glyphicon-trash"></span>
      </button></td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
@include('sinhvien.modal_sinhvien',['submitButtonText' => 'Thêm sinh viên'])

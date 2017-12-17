<div class="container-fluid">
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative"><h2>Danh sách lớp học phần</h2>
  <button class="btn btn-success" name="btn_modal" id="btn_add_lophocphan"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
          <th>Tên lớp</th>
          <th>Môn học</th>
          <th>Tên giảng viên</th>
          <th>Khoa</th>
          <th>Trường</th>
          <th>Số điện thoại</th>
          <th>Danh sách sinh viên</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        <?php $row = 0;
        ?>
        @foreach($lophocphans as $lophocphan)
        <?php $row = $row + 1; ?>
        <tr class="item{{$lophocphan->id}}">
          <th scope="row"> {{$row}}</th>
          <td>{{$lophocphan->ten_lophocphans}}</td>
          <td>{{$lophocphan->monhoc->monhoc}}</td>
          <td>{{$lophocphan->teacher->user->name}}</td>
          <td>{{$lophocphan->teacher->truong}}</td>
          <td>{{$lophocphan->teacher->khoa}}</td>
          <td>{{$lophocphan->teacher->sodienthoai}}</td>
          <?php if(isset($datathongtin[$row-1]))
          { ?>
            <td><a href="{{url('home/thongtinlophocphans',$datathongtin[$row-1]->first()->lophocphan_id)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>  Xem Danh sách sinh viên</a></td>
          <?php }else{
          ?>
          <td><button id="btn_nhap_sv" data-info="{{$lophocphan->id}},{{$lophocphan->ten_lophocphans}},{{$row}}"
            class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>  Nhập Danh sách sinh viên</button></td>
          <?php }?>
          <td><button id="btn_sua_lophoc" class="btn btn-info" data-info="{{$lophocphan->id}},{{$lophocphan->ten_lophocphans}},{{$lophocphan->monhoc->id}},{{$lophocphan->teacher->user->name}},{{$row}}"><span class='glyphicon glyphicon-edit'></span></button></td>
          <td><button id="btn_xoa_lophoc" class="btn btn-danger" data-info="{{$lophocphan->id}},{{$lophocphan->ten_lophocphans}},{{$lophocphan->monhoc->id}},{{$lophocphan->teacher->user->name}},{{$row}}"><span class='glyphicon glyphicon-trash'></button></td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
@include('admin.modal_lophocphan')

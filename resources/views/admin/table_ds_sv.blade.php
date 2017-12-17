@include('admin.modal_edit_diem')
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
          <th>STT</th>
          <th>Tên</th>
          <th>Số thẻ sinh viên</th>
          <th>Điện thoại</th>
          <th>Lớp sinh hoạt</th>
          <th>Nhóm thi</th>
          <th>Điểm</th>
          <th>Sửa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        @foreach($thongtinlophocphans as $thongtinlophocphan)
        <tr class="item{{$thongtinlophocphan->id}}">
          <th scope="row">{{$thongtinlophocphan->STT}}</th>
          <td>{{$thongtinlophocphan->student->user->name}}</td>
          <td>{{$thongtinlophocphan->student->mssv}}</td>
          <td>{{$thongtinlophocphan->student->sodienthoai}}</td>
          <td>{{$thongtinlophocphan->student->lop}}</td>
          <td>{{$thongtinlophocphan->nhom_thi}}</td>
          @if($thongtinlophocphan->diem < 0)
          <td>Chưa thi</td>
          @else
          <td>{{$thongtinlophocphan->diem}}</td>
          @endif
          <td><button  class="edit-modal-sv btn btn-info"
            data-info="{{$thongtinlophocphan->id}},{{$thongtinlophocphan->student->user->name}},{{$thongtinlophocphan->diem}}">
            <span class="glyphicon glyphicon-edit"></span>
        </button></td>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

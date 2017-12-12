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
          <th>Cho phép thi</th>
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
        <td>
          @if($thongtinlophocphan->state == 0)
          <buton class="btn btn-primary" id="btn_state_test" data-info="{{$thongtinlophocphan->id}},1" data-link="{{ url('/home/setStateTest') }}" data-token="{{ csrf_token() }}">Cho phép vào phòng thi</button>
          @else
          <buton class="btn btn-danger" id="btn_state_test" data-info="{{$thongtinlophocphan->id}},0" data-link="{{ url('/home/setStateTest') }}" data-token="{{ csrf_token() }}">Không cho phép vào phòng thi</button>
          @endif
        </td>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

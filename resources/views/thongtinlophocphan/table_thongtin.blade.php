<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Dách sách lớp học phần</a></li>
<li class="active">Dách sách sinh viên</li>
</ol>
<div class="panel panel-primary" >

<div class="panel-heading text-left panel-relative">

  <h2>Dánh sách sinhvien của lớp : {{$ten_lophocphans}}</h2>
  <a href="{{url('/home/baitracnghiem',$thongtinlophocphans->first()->lophocphan_id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Dách sách bài trắc nghiệm
  </a>
  <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-bars" aria-hidden="true"></i> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ action('TeachersController@deleteAll','0')}}" onclick='return confirm("Bạn có thực sự muốn xóa tất cả bảng sinh viên không?")'>Xóa tất cả bảng giáo viên</a></li>
  </ul>
  </div>
  <button type="button" id="submit_table_danh_sach" style="float: right;" class="btn btn-danger" >Submit</button>
</div>

<div class="panel-body ">
  <div id="showsuccesbyself">

  </div>
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
          <th>STT</th>
          <th>Tên</th>
          <th>Số thẻ sinh viên</th>
          <th>Điện thoại</th>
          <th>Lớp sinh hoạt</th>
          <th>Nhóm thi</th>
          <th>Điểm giữa kỳ</th>
          <th>Điểm cuối kỳ</th>
          <th>Điểm bài tập</th>
          <th>Cho phép thi</th>
          <th><input type="checkbox" id="allcb" name="allcb"/></th>
          <th>Xóa</th>
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
          @if($thongtinlophocphan->diem->diem_giuaky < 0)
          <td>Chưa thi</td>
          @else
          <td>{{$thongtinlophocphan->diem->diem_giuaky}}</td>
          @endif
          @if($thongtinlophocphan->diem->diem_baitap < 0)
          <td>Chưa thi</td>
          @else
          <td>{{$thongtinlophocphan->diem->diem_baitap}}</td>
          @endif
          @if($thongtinlophocphan->diem->diem_cuoiky < 0)
          <td>Chưa thi</td>
          @else
          <td>{{$thongtinlophocphan->diem->diem_cuoiky}}</td>
          @endif
        <td>
        Cho phép thi
        </td>
        <td>
        <input type="checkbox" id="chothi_{{$thongtinlophocphan->id}}" value="0" name="cb1"/>
        </td>
      <td><button class="delete-modal-sinhvien btn btn-danger"
        data-info="">
        <span class="glyphicon glyphicon-trash"></span>
    </button></td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

<div class="container-fluid">
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Dách sách lớp học phần</a></li>
<li><a href="{{url()->previous()}}">Dách sách sinh viên</a></li>
<li class="active">Dách sách bài trắc nghiệm</li>
</ol>
<div class="panel panel-primary" >

<div class="panel-heading text-left panel-relative">

  <h2>Dánh sách sinhvien của lớp : </h2>
  <button class="btn btn-success" name="btn_modal_tracngiem" id="btn_modal_tracngiem"><i class="fa fa-plus" aria-hidden="true"></i> Tạo bài trắc nghiệm
  </button>
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
          <th>Tên bài trắc nghiệm</th>
          <th>Số lương câu hỏi</th>
          <th>Điểm</th>
          <th>Xem</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        <?php $row = 0;
        ?>
        @foreach($baitracs as $baitrac)
        <?php $row = $row + 1; ?>
        <tr class="item{{$baitrac->id}}">
          <th scope="row">{{$row}}</th>
          <td>{{$baitrac->title}}</td>
          <td>{{$baitrac->soluongcauhoi}}</td>
          @if($baitrac->diemcua == 0)
          <td>Luyền tập không có điểm</td>
          @elseif($baitrac->diemcua == 2)
          <td>Điểm giữa kì</td>
          @elseif($baitrac->diemcua == 1)
          <td>Điểm bài tập</td>
          @elseif($baitrac->diemcua == 3)
          <td>Điểm cuối kỳ</td>
          @endif
          <td><a href="{{ url ('/home/cauhoi',$baitrac->id)}}" class="delete-modal-sinhvien btn btn-warning">
            <span class="glyphicon glyphicon-eye-open"></span></a></td>
      <td><button class="delete-modal-sinhvien btn btn-danger"
        data-info="">
        <span class="glyphicon glyphicon-trash"></span>
      </button></td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>
@include('baitracnghiem.modal_tracnghiem')

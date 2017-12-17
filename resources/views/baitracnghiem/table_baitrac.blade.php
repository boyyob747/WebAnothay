<div class="container-fluid">
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Danh sách lớp học phần</a></li>
<li><a href="{{url('/home/thongtinlophocphans',session('lophoc_id'))}}">Danh sách sinh viên</a></li>
<li class="active">Danh sách bài trắc nghiệm</li>
</ol>
<div class="panel panel-primary" >

<div class="panel-heading text-left panel-relative">

  <h2>Danh sách bài trắc nghiệm của lớp : {{$ten_lophocphan}}</h2>
  <button class="btn btn-success" name="btn_modal_tracngiem" id="btn_modal_tracngiem"><i class="fa fa-plus" aria-hidden="true"></i> Tạo bài trắc nghiệm
  </button>

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
          <th>Điểm</th>
          <th>Thời gian</th>
          <th>Xem</th>
          <th>Sửa</th>
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
          @if($baitrac->diemcua == 0)
          <td>Luyền tập không có điểm</td>
          @elseif($baitrac->diemcua == 1)
          <td>Điểm thi</td>
          @endif
          <td>{{$baitrac->duration}} phút</td>
          <td><a href="{{ url ('/home/cauhoi',$baitrac->id)}}" class="delete-modal-sinhvien btn btn-warning">
            <span class="glyphicon glyphicon-eye-open"></span></a></td>
            <td><button class="edit-modal-baitrac btn btn-info"
              data-info="{{$baitrac->id}},{{$row}},{{$baitrac->title}},{{$baitrac->diemcua}},{{$baitrac->duration}},{{url ('/home/cauhoi',$baitrac->id)}}">
              <span class="glyphicon glyphicon-edit"></span>
            </button></td>
      <td><button class="delete-modal-baitrac btn btn-danger"
      data-info="{{$baitrac->id}},{{$row}},{{$baitrac->title}},{{$baitrac->diemcua}},{{$baitrac->duration}},{{url ('/home/cauhoi',$baitrac->id)}}">
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

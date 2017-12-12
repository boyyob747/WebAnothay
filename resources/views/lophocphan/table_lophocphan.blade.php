<div class="container-fluid">
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative"><h2>Danh sách lớp học phần của giảng viên {{ $tengiaovien}}</h2>
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
          <th>Môn học</th>
          <th>Danh sách sinh viên</th>
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
          <?php if(isset($datathongtin[$row-1]))
          { ?>
            <td><a href="{{url('home/thongtinlophocphans',$datathongtin[$row-1]->first()->lophocphan_id)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>  Xem Danh sách sinh viên</a></td>
          <?php }else{
          ?>
          <td>Chưa có danh sách sinh viên</td>
          <?php }?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

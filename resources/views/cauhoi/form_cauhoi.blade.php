<div class="container-fluid">
<ol class="breadcrumb">
  <li><a href="{{url('/home/lophocphan')}}">Danh sách lớp học phần</a></li>
  <li><a href="{{url('/home/thongtinlophocphans',session('lophoc_id'))}}">Danh sách sinh viên</a></li>
  <li><a href="{{url('/home/baitracnghiem',session('lophoc_id'))}}">Danh sách bài trắc nghiệm</a></li>
<li class="active">Danh sách câu hỏi</li>
</ol>
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative"><h2>Danh sách câu hỏi : {{$baitrac->title or 'Title'}}</h2>
  <button class="btn btn-success" name="btn_modal" id="btn_add_cauhoi"><i class="fa fa-plus" aria-hidden="true"></i></button>

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
          <th >Câu hỏi</th>
          <th>Câu trả lời 1</th>
          <th>Câu trả lời 2</th>
          <th>Câu trả lời 3</th>
          <th>Câu trả lời 4</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        <form>
          <?php $row = 0; ?>
        @foreach($cauhois as $cauhoi)
        <?php ++$row; ?>
        <tr class="item{{$cauhoi->id}}" >
          <th scope="row">{{$row}}</th>
          <td>{!!$cauhoi->cau_hoi!!}</td>
          <td>{{$cauhoi->cautl_a}}</td>
          <td>{{$cauhoi->cautl_b}}</td>
          <td>{{$cauhoi->cautl_c}}</td>
          <td>{{$cauhoi->cautl_d}}</td>
          <td><button  class="edit-modal-cauhoi btn btn-info"
            data-info="{{$cauhoi->id}},{{$cauhoi->cau_hoi}},{{$cauhoi->cautl_a}},{{$cauhoi->cautl_b}},{{$cauhoi->cautl_c}},{{$cauhoi->cautl_d}},{{$row}}">
            <span class="glyphicon glyphicon-edit"></span>
        </button></td>
        <td><button class="delete-modal-cauhoi btn btn-danger"
          data-info="{{$cauhoi->id}},{{$cauhoi->cau_hoi}},{{$cauhoi->cautl_a}},{{$cauhoi->cautl_b}},{{$cauhoi->cautl_c}},{{$cauhoi->cautl_d}},{{$row}}">
          <span class="glyphicon glyphicon-trash"></span>
      </button></td>
            @endforeach
          </form>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('cauhoi.modal_cauhoi')


<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Dách sách lớp học phần</a></li>
<li><a href="">Dách sách sinh viên</a></li>
<li><a href="">Dách sách bài trắc nghiệm</a></li>
<li class="active">Dách sách câu hỏi</li>
</ol>
<div class="panel panel-primary" >
  <!-- style="min-height: 70%;
  height: 90%;" -->


<div class="panel-heading text-left panel-relative"><h2>Dách sách câu hỏi</h2>
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
          <th>Câu hỏi</th>
          <th>Câu trả lời 1</th>
          <th>Câu trả lời 2</th>
          <th>Câu trả lời 3</th>
          <th>Câu trả lời 4</th>
          <th>Câu hỏi tl</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tb_body_sv">
        <form>
          <?php $row = 0; ?>
        @foreach($cauhois as $cauhoi)
        <?php ++$row; ?>
        <tr class="item" >
          <th scope="row">{{$row}}</th>
          <td><input type="text" class="form-control" value="{{$cauhoi->cau_hoi}}"></td>
          <td><input type="text" class="form-control" value="{{$cauhoi->cautl_a}}"></td>
          <td><input type="text" class="form-control" value="{{$cauhoi->cautl_b}}"></td>
          <td><input type="text" class="form-control" value="{{$cauhoi->cautl_c}}"></td>
          <td><input type="text" class="form-control" value="{{$cauhoi->cautl_d}}"></td>
          <td>
  <div class="btn-group" data-toggle="buttons">
    @if($cauhoi->cau_tl == 0)
    <label class="btn btn-primary active">
    @else
    <label class="btn btn-primary">
    @endif
      <input type="radio" name="cautl{{$row}}" id="cautl{{$row}}" value="0" <?php if ($cauhoi->cau_tl == 0) echo 'checked'; ?> autocomplete="off" > 1
      <span class="glyphicon glyphicon-ok gg"></span>
    </label>

    @if($cauhoi->cau_tl == 1)
    <label class="btn btn-primary active">
    @else
    <label class="btn btn-primary">
    @endif
      <input type="radio" name="cautl{{$row}}" id="cautl{{$row}}" value="1" autocomplete="off" <?php if ($cauhoi->cau_tl == 1) echo 'checked'; ?>> 2
      <span class="glyphicon glyphicon-ok gg"></span>
    </label>

    @if($cauhoi->cau_tl == 2)
    <label class="btn btn-primary active">
    @else
    <label class="btn btn-primary">
    @endif
      <input type="radio" name="cautl{{$row}}" id="cautl{{$row}}" value="2" autocomplete="off"  <?php if ($cauhoi->cau_tl == 2) echo 'checked'; ?>> 3
      <span class="glyphicon glyphicon-ok gg"></span>
    </label>

    @if($cauhoi->cau_tl == 3)
    <label class="btn btn-primary active">
    @else
    <label class="btn btn-primary">
    @endif
      <input type="radio" name="cautl{{$row}}" id="cautl{{$row}}" value="3" autocomplete="off" <?php if ($cauhoi->cau_tl == 3) echo 'checked'; ?>> 4
      <span class="glyphicon glyphicon-ok gg"></span>
    </label>
  </div>
          </td>
        <td><button class="delete-modal-cauhoi btn btn-danger"
          data-info="{{count($cauhois)}}">
          <span class="glyphicon glyphicon-trash"></span>
      </button></td>
            @endforeach
          </form>
          </tbody>
        </table>
      </div>
    </div>

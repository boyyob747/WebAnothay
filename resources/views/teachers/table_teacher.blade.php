<div class="panel panel-primary" style="min-height: 70%;
height: 90%;">

    <div class="panel-heading text-center panel-relative"><h2>Dánh sách giáo viên</h2><button class="btn btn-success" name="btn_modal" data-toggle="modal" data-target="#myModal"><i
                  class="fa fa-plus-circle fa-2x"></i></button></div>
    <div class="panel-body ">
      @if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif
      <div class="table-responsive">
        <table class="table table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Username</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Trường</th>
                <th>Khoa học</th>
                <th>Số điện thoại</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php $row = 0;
            if (isset($_GET['page']))
            {
              $page = $_GET['page'];
              $page = $page * 10;
            }
            else {
              $page = 10;
            }
            ?>
            @foreach($teachers as $teacher)
            <?php $row = $row + 1; ?>
                <tr>
                    <th scope="row"><?php if ($page > 10)
                   {
                     echo $page-10 + $row;
                   }
                   else {
                     echo $row;
                   }
                    ?></th>
                    <td>{{$users[$row-1]->name}}</td>
                    <td>{{$users[$row-1]->username}}</td>
                    <td>{{$users[$row-1]->email}}</td>
                    <td>{{$teacher->ngaysinh}}</td>
                    <td>{{$teacher->truong}}</td>
                    <td>{{$teacher->khoa}}</td>
                    <td>{{$teacher->sodienthoai}}</td>
                    <td>{!! Form::open(['url' => '/home/teacher/'.$teacher->id.'/edit', 'method' => 'get']) !!}
                          {!! Form::submit('Sửa', ['class' => 'btn btn-success']) !!}
                          {!! Form::close() !!}</td>
                    <!-- <td><a href="{{route('teacher.destroy', $teacher->id)}}"><i class="fa fa-trash fa-2x"></i></a></td> -->
                    <td>{!! Form::open(['url' => '/home/teacher/'.$users[$row-1]->id, 'method' => 'delete']) !!}
                          {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
        {{ $teachers->links() }}
    </div>

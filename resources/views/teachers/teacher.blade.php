    @extends('layouts.main')
    @section('title','Teacher')
    @section('content')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"
              rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<!--

        <div class="container-fluid">
-->
            <div class="panel panel-primary">
                <div class="panel-heading text-center panel-relative"><h2>Dánh sách giáo viên</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
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
                        <?php $row = 0; ?>
                        @foreach($teachers as $teacher)
                        <?php $row = $row + 1; ?>
                            <tr>
                                <th scope="row">{{$row}}</th>
                                <td>{{$users[$row-1]->name}}</td>
                                <td>{{$users[$row-1]->username}}</td>
                                <td>{{$users[$row-1]->email}}</td>
                                <td>{{$teacher->ngaysinh}}</td>
                                <td>{{$teacher->truong}}</td>
                                <td>{{$teacher->khoa}}</td>
                                <td>{{$teacher->sodienthoai}}</td>
                                <td><i class="fa fa-pencil fa-2x"></i></td>
                                <td><i class="fa fa-trash fa-2x"></i></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $teachers->links() }}
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" name="btn_modal" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus-circle fa-2x"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="vertical-alignment-helper">
                            <div class="modal-dialog vertical-align-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                                    class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Thêm giáo viên</h4>
                                        @if($errors-> any())
                                            <script>
                                                $(document).ready(function () {
                                                    $("button[name=btn_modal]").click();
                                                });
                                            </script>
                                            <ul class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">

                                            {!! Form::open(['method' => 'POST', 'route' => 'teacher.store','id'  => 'form_create_teacher','class' => 'form form-horizontal']) !!}
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-user fa-1x"></i></span>
                                                {!!Form::text('username',null, array('class'=> 'form-control','placeholder' => 'Username','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-key fa-1x"></i></span>
                                                {!!Form::password('password', array('id' => 'password', 'class'=> 'form-control','placeholder' => 'Password ','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-text-width fa-1x"></i></span>
                                                {!!Form::text('name',null, array('class'=> 'form-control','placeholder' => 'Name','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-envelope fa-1x"></i></span>
                                                {!!Form::text('email',null, array('class'=> 'form-control','placeholder' => 'Email','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                {{--<span class="input-group-addon" id="sizing-addon1"><i--}}
                                                {{--class="fa fa-birthday-cake fa-1x"></i></span>--}}
                                                <span class="input-group-addon" id="sizing-addon1"><i
                                                            class="fa fa-birthday-cake fa-1x"></i></span>
                                                {{ Form::text('ngaysinh', null, array('id' => 'datepicker','placeholder' => 'Ngày sinh','class' => 'date form-control filldate', 'required'=> '')) }}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-phone-square fa-1x"></i></span>
                                                {!!Form::text('sodienthoai',null, array('class'=> 'form-control','placeholder' => 'Số điện thoại','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-university fa-1x"></i></span>
                                                {!!Form::text('truong','Trường đại học bách khoa', array('class'=> 'form-control','placeholder' => 'Trường đại học','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                                {{--{{ Form::select('truong', ['Trường đại học bách khoa', 'Trường đại học sư phạm', 'Trường đại học kinh tế','Trường đại học ngoại ngữ'], null, ['class' => 'form-control']) }}--}}
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1"><i
                                                                class="fa fa-graduation-cap fa-1x"></i></span>
                                                {!!Form::text('khoa','Công nghệ thông tin', array('class'=> 'form-control','placeholder' => 'Trường đại học','aria-describedby' => 'sizing-addon1', 'required'))!!}
                                            </div>
                                            {!! Form::close() !!}
                                            <hr>
                                            <br>
                                            <center><p>Hoặc nhập bằng file excel .xls vd: <a href="#">FileViDu.xls</a></p>
                                                <br>
                                             {!! Form::open(['method' => 'POST', 'url' => 'import','id'  => 'form_create_teacher','class' => 'form form-horizontal']) !!}
                                                <div class="form-group">
                                                    <label class="custom-file">
                                                {{ Form::file('file', ['class' => 'custom-file-input','id' => 'file2','accept'=>'application/vnd.ms-excel']) }}
                                                <br>
                                                <p style="color:red">{{$errors->first('fileimport')}}</p>
                                                <br>
                                                <span class="custom-file-control"></span>
                                            </label>
                                                     {!! Form::submit('Upload',['class' => 'btn btn-success']) !!}
                                             {!! Form::close() !!}
                                                </div>
                                            </center>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="submitForm('{{  route('teacher.store') }}')"
                                                class="btn btn-primary">Save changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--            </div>-->


            <!-- Modal -->

    @stop

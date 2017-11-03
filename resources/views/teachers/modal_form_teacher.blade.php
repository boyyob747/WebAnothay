<div class="modal" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm giáo viên<?php if(isset($teacherforedit))
                    echo $teacherforedit->ngaysinh; ?></h4>
                    <!-- @if($errors-> any())
                    @if(!isset($backFormUpdate))
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <script>
                        $(document).ready(function () {
                            $('#modalEdit').modal('hide')
                            $('#modalAdd').modal('show')
                        });
                    </script>
                    @endif
                    @endif -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::open(['method' => 'POST', 'route' => 'teacher.store','id'  => 'form_create_teacher','class' => 'form form-horizontal']) !!}
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user fa-1x"></i></span>
                            {!!Form::text('username',null, array('class'=> 'form-control','placeholder' => 'Username','aria-describedby' => 'sizing-addon1', 'required','pattern'=>'.{3,191}','title'=>'username phải dài hơn ba chữ'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-key fa-1x"></i></span>
                            {!!Form::password('password', array('id' => 'password', 'class'=> 'form-control','placeholder' => 'Password ','aria-describedby' => 'sizing-addon1', 'required','pattern'=>'.{6,191}','title'=>'password phải dài hơn 6 chữ'))!!}
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
                        <br>
                        <div class="text-right">
                                {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                        <hr>
                        <br>
                        <center><p>Hoặc nhập bằng file excel .xls vd: <a href="<?php echo asset('vd_file_giaovien.xls'); ?>">FileViDu.xls</a></p>
                            <br>
                         {!! Form::open(['method' => 'POST', 'url' => 'postImport','id'  => 'form_create_teacher','class' => 'form form-horizontal','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                <label class="custom-file">
                            {{ Form::file('teacher', ['class' => 'custom-file-input','id' => 'file2','accept'=>'application/vnd.ms-excel','required']) }}
                                     {!!   csrf_field() ; !!}
                            <p style="color:red">{{$errors->first('fileimport')}}</p>
                            <span class="custom-file-control"></span>
                        </label>
                            </div>
                        </center>
                        <br>
                        <div class="text-center">
                            {!! Form::submit('Upload',['class' => 'btn btn-success']) !!}
                        </div>
                         {!! Form::close() !!}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="close_form" class="btn btn-default" data-dismiss="modal">Close</button>

                    </button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

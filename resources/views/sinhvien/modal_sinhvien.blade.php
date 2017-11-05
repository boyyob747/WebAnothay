<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal" id="modalAddSinhvien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <div class="div_error">
                    </div>
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
                      <span class="hidden" id="save_id"></span>
                      <span class="hidden" id="save_row"></span>
                      <div class="delete_msg">

                      </div>
                      {!! Form::open(['id'  => 'form_create_sinhvien','class' => 'form form-horizontal']) !!}
                      {{ method_field('POST') }}
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user fa-1x"></i></span>
                            {!!Form::text('username',null, array('id' => 'username','class'=> 'form-control','placeholder' => 'Mã số sinh viên','aria-describedby' => 'sizing-addon1', 'required','pattern'=>'.{3,191}','title'=>'username phải dài hơn ba chữ'))!!}
                            {{ Form::hidden('id', '', array('id' => 'id')) }}
                            {{ Form::hidden('user_id', '', array('id' => 'user_id')) }}
                            {{ Form::hidden('row', '', array('id' => 'row')) }}

                      </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-text-width fa-1x"></i></span>
                            {!!Form::text('name',null, array('id' => 'name','class'=> 'form-control','placeholder' => 'Name','aria-describedby' => 'sizing-addon1', 'required'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-envelope fa-1x"></i></span>
                            {!!Form::text('email',null, array('id' => 'email','class'=> 'form-control','placeholder' => 'Email','aria-describedby' => 'sizing-addon1', 'required'))!!}
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
                            {!!Form::text('lop',null, array('id' => 'lop','class'=> 'form-control','placeholder' => 'Lớp sinh hoạt','aria-describedby' => 'sizing-addon1', 'required'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-phone-square fa-1x"></i></span>
                            {!!Form::text('sodienthoai',null, array('id' => 'sodienthoai','class'=> 'form-control','placeholder' => 'Số điện thoại','aria-describedby' => 'sizing-addon1', 'required'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-graduation-cap fa-1x"></i></span>
                            {!!Form::text('khoa','Công nghệ thông tin', array('class'=> 'form-control',
                            'placeholder' => 'Khoa học','aria-describedby' => 'sizing-addon1', 'required','id' => 'khoa'))!!}
                        </div>
                        <br>
                        <div class="text-right">
                          <button id="btn_update_sinhvien" class="btn btn-primary" data-link="{{ url('/home/student') }}" data-token="{{ csrf_token() }}"  data-dismiss="modal" name="close_form"> Update</button>
                          <button id="btn_save_sinhvien" data-link="{{ url('/home/student') }}" data-token="{{ csrf_token() }}" class="btn btn-primary"  data-dismiss="modal" name="close_form"> Save</button>
                        </div>
                        {!! Form::close() !!}
                        <div id="add_with_excel">
                          <hr>
                          <br>
                          <center><p>Hoặc nhập bằng file excel .xls vd: <a href="<?php echo asset('vd_file_sinhvien.xlsx'); ?>">FileViDu.xls</a></p>
                              <br>
                              {!! Form::open(['method' => 'POST', 'url' => '/importsinhvien','id'  => 'id_form_excel','class' => 'form form-horizontal','enctype'=>'multipart/form-data']) !!}
                              <div class="form-group">
                                  <label class="custom-file">
                              {{ Form::file('sinhvien', ['class' => 'custom-file-input','id' => 'file2','accept'=>'','required']) }}
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
                </div>
                <div class="modal-footer">

                    <button type="button" id="btn_delete_sinhvien" data-link="{{ url('/home/student') }}"  data-token="{{ csrf_token() }}" class="btn btn-danger" data-dismiss="modal">Delete
                    </button>
                    <button type="button" name="close_form" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

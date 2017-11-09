<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="div_error">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <span class="hidden" id="save_id"></span>
                      <span class="hidden" id="save_row"></span>
                      <div class="delete_msg">

                      </div>
                      {!! Form::open(['id'  => 'form_create_teacher','class' => 'form form-horizontal']) !!}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type='hidden' name='_method' value='PUT'>
                      {{ method_field('PUT') }}
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user fa-1x"></i></span>
                            {!!Form::text('username',null, array('id' => 'username','class'=> 'form-control','placeholder' => 'Username','aria-describedby' => 'sizing-addon1', 'required','pattern'=>'.{3,191}','title'=>'username phải dài hơn ba chữ'))!!}
                            <span class="input-group-addon" id="basic-addon2">Username</span>
                            {{ Form::hidden('id', '', array('id' => 'id')) }}
                            {{ Form::hidden('user_id', '', array('id' => 'user_id')) }}
                            {{ Form::hidden('row', '', array('id' => 'row')) }}
                      </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-key fa-1x"></i></span>
                            {!!Form::password('password', array('id' => 'password', 'class'=> 'form-control','placeholder' => 'Password ','aria-describedby' => 'sizing-addon1', 'required','pattern'=>'.{6,191}','title'=>'password phải dài hơn 6 chữ'))!!}
                            <span class="input-group-addon" id="basic-addon2">Password</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-text-width fa-1x"></i></span>
                            {!!Form::text('name',null, array('id' => 'name','class'=> 'form-control','placeholder' => 'Name','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            <span class="input-group-addon" id="basic-addon2">Tên</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-envelope fa-1x"></i></span>
                            {!!Form::text('email',null, array('id' => 'email','class'=> 'form-control','placeholder' => 'Email','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            <span class="input-group-addon" id="basic-addon2">Email</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            {{--<span class="input-group-addon" id="sizing-addon1"><i--}}
                            {{--class="fa fa-birthday-cake fa-1x"></i></span>--}}
                            <span class="input-group-addon" id="sizing-addon1"><i
                                        class="fa fa-birthday-cake fa-1x"></i></span>
                            {{ Form::text('ngaysinh', null, array('id' => 'datepicker','placeholder' => 'Ngày sinh','class' => 'date form-control filldate', 'required'=> '')) }}
                            <span class="input-group-addon" id="basic-addon2">Ngày sinh</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-phone-square fa-1x"></i></span>
                            {!!Form::text('sodienthoai',null, array('id' => 'sodienthoai','class'=> 'form-control','placeholder' => 'Số điện thoại','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            <span class="input-group-addon" id="basic-addon2">Số điện thoại</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-university fa-1x"></i></span>
                            {!!Form::text('truong','Trường đại học bách khoa', array('class'=> 'form-control','placeholder' => 'Trường đại học','aria-describedby' => 'sizing-addon1',
                            'required','id' => 'truong'))!!}
                            <span class="input-group-addon" id="basic-addon2">Trường</span>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-graduation-cap fa-1x"></i></span>
                            {!!Form::text('khoa','Công nghệ thông tin', array('class'=> 'form-control',
                            'placeholder' => 'Khoa học','aria-describedby' => 'sizing-addon1', 'required','id' => 'khoa'))!!}
                            <span class="input-group-addon" id="basic-addon2">Khoa học</span>
                        </div>
                        <br>
                        <div class="text-right">
                          <button id="btn_acction" class="btn btn-primary"  data-link="{{ url('/home/teacher/') }}" data-token="{{ csrf_token() }}" data-dismiss="modal" name="close_form"> Update</button>
                          <button id="btn_save_teacher" class="btn btn-primary" data-link="{{ url('/home/teacher/') }}" data-token="{{ csrf_token() }}"  data-dismiss="modal" name="close_form"> Save</button>
                        </div>
                        {!! Form::close() !!}
                        <div id="add_with_excel">

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
                </div>
                <div class="modal-footer">

                    <button type="button" id="btn_delete" data-token="{{ csrf_token() }}" class="btn btn-danger" data-dismiss="modal">Delete
                    </button>
                    <button type="button" name="close_form" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

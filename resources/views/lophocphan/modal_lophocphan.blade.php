<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal" id="modalLopHocPhanSinhvien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tạo lớp học phần mới<?php if(isset($teacherforedit))
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
                      {!! Form::open(['id'  => 'form_create_lophocphan','class' => 'form form-horizontal']) !!}
                      {{ method_field('POST') }}
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user fa-1x"></i></span>
                            {!!Form::text('ten_lop_hoc_phan',null, array('id' => 'ten_lop_hoc_phan','class'=> 'form-control','placeholder' => 'Tên lớp học phần','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            {{ Form::hidden('id', '', array('id' => 'id')) }}
                            <?php
                            if(isset($teacher_id)) {?>
                              {{ Form::hidden('teacher_id', $teacher_id, array('id' => 'teacher_id')) }}
                            <?php
                            }
                             ?>

                            {{ Form::hidden('row', '', array('id' => 'row')) }}

                      </div>
                      <br>
                      <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"><i
                                          class="fa fa-user fa-1x"></i></span>
                                  <select name="monhoc_id" id="monhoc_id" class="form-control">
                                  @foreach ($monhocs as $monhoc) {
                                    <option value="{{$monhoc->id}}">{{$monhoc->monhoc}}</option>
                                  @endforeach
                                </select>
                    </div>
                    <br>
                        <div class="text-right">
                          <button id="btn_update_lophocphan" class="btn btn-primary" data-link="{{ url('/home/lophocphan') }}" data-token="{{ csrf_token() }}"  data-dismiss="modal" name="close_form"> Update</button>
                          <button id="btn_save_lophocphan" data-link="{{ url('/home/lophocphan') }}" data-token="{{ csrf_token() }}" class="btn btn-primary"  data-dismiss="modal" name="close_form"> Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div id="add_with_excel">
                      <hr>
                      <br>
                      <center><p>Nhập bằng file excel .xls vd: <a href="<?php echo asset('vd_file_sinhvien.xlsx'); ?>">FileViDu.xls</a></p>
                          <br>
                          {!! Form::open(['method' => 'POST', 'url' => '/importsinhvienforlophoc','id'  => 'id_form_excel','class' => 'form form-horizontal','enctype'=>'multipart/form-data']) !!}
                          <div class="form-group">
                              <label class="custom-file">
                            {{ Form::hidden('teacher_id', '', array('id' => 'teacher_id')) }}
                            {{ Form::hidden('lophocphan_id', '', array('id' => 'lophocphan_id')) }}
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
                <div class="modal-footer">

                    <button type="button" id="btn_delete_lophocphan" data-link="{{ url('/home/student') }}"  data-token="{{ csrf_token() }}" class="btn btn-danger" data-dismiss="modal">Delete
                    </button>
                    <button type="button" name="close_form" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

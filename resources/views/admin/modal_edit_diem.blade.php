
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal" id="modalDiem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                    <div class="div_error">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                      {!! Form::open(['method' => 'POST', 'url' => '','id'  => 'id_form_excel','class' => 'form form-horizontal','enctype'=>'multipart/form-data']) !!}
                      <div class="form-group">
                      <span class="hidden" id="save_id"></span>
                      {{ Form::hidden('id_thongtin_lop', null) }}
                      </div>
                      <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"> Tên </span>
                          {!!Form::text('name',null, array('id' => 'name','class'=> 'form-control','placeholder' => 'Name','aria-describedby' => 'sizing-addon1', 'required','disabled'))!!}
                      </div>
                      <br>
                      <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1"> Điểm </span>
                          {!!Form::number('diem',null, array('id' => 'diem','class'=> 'form-control','placeholder' => 'Điểm','aria-describedby' => 'sizing-addon1', 'required'))!!}
                      </div>
                  </center>
                  <br>
                  {!! Form::close() !!}
                  <div class="text-center">
                      <button class="btn btn-danger" id="btn_update_diem" data-link="{{ url('/home/thongtinlophocphans') }}" data-token="{{ csrf_token() }}">Update</button>
                  </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="close_form" id="close_form_cauhoi" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

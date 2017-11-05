<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal" id="modalBaiTracNgiem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span>
                    </button>
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
                                <span class="input-group-addon" id="sizing-addon1">Tên bài trắc nghiệm</i></span>
                            {!!Form::text('title',null, array('id' => 'title','class'=> 'form-control','placeholder' => 'Tên bài','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            {{ Form::hidden('lophocphan_id',$lophocphan_id, array('id' => 'lophocphan_id')) }}
                            {{ Form::hidden('row', '', array('id' => 'row')) }}
                          </div>
                          <br>
                          <div class="input-group input-group-lg">
                                  <span class="input-group-addon" id="sizing-addon1">Số lương câu hỏi</span>
                              {!!Form::number('soluongcauhoi',null, array('id' => 'soluongcauhoi','class'=> 'form-control','placeholder' => 'Số lương câu hỏi','aria-describedby' => 'sizing-addon1', 'required'))!!}
                            </div>
                            <br>
                            <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1">Điểm</span>
                            {{ Form::select('diemcua', [
                                '0' => 'Luyền tập không có điểm',
                                    '1' => 'Điểm bài tập',
                                    '2' => 'Điểm giữa kỳ',
                                    '3' => 'Điểm cuối kỳ'], null, ['class' => 'form-control','id' => 'diemcua']) }}
                              </div>
                              <br>
                        <div class="text-right">
                          <button id="btn_update_baitrac" class="btn btn-primary" data-link="{{ url('/home/baitracnghiem') }}" data-token="{{ csrf_token() }}"  data-dismiss="modal" name="close_form"> Update</button>
                          <button id="btn_save_baitrac" data-link="{{ url('/home/baitracnghiem') }}" data-token="{{ csrf_token() }}" class="btn btn-primary"  data-dismiss="modal" name="close_form"> Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id="btn_delete_baitrac" data-link="{{ url('/home/student') }}"  data-token="{{ csrf_token() }}" class="btn btn-danger" data-dismiss="modal">Delete
                    </button>
                    <button type="button" name="close_form" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

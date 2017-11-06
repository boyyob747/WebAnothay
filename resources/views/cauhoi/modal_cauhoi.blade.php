<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal" id="modalCauhoi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
         bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
     </script>
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tạo câu hỏi</h4>
                    <div class="div_error">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <span class="hidden" id="save_id"></span>
                      <span class="hidden" id="save_row"></span>
                      <div class="delete_msg">
                      </div>
                      
                      <form id='form_create_cauhoi' class=form form-horizontal>
                      {{ method_field('POST') }}

                      <br>
                          <label for="cua_hoi">Câu hỏi :</label>
                            <input type="hidden" id="id_baithi" value="{{$baitrac->id}}">
                            <textarea id="cau_hoi" name="cua_hoi" style="resize:none" cols="100" rows="20" class="form-control"></textarea>
                        <br>
                        <div class="input-group input-group-lg">
                          <label for="cau_tla">Câu trả lời A :</label>
                          <div>
                            <textarea id="cau_tla" name="cau_tla" style="resize:none" cols="100" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                          <label for="cau_tla">Câu trả lời B :</label>
                          <div>
                            <textarea id="cau_tlb" name="cau_tlb" style="resize:none" cols="100" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                          <label for="cau_tlc">Câu trả lời C :</label>
                          <div>
                            <textarea id="cau_tlc" name="cau_tlc" style="resize:none" cols="100" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                          <label for="cau_tld">Câu trả lời D :</label>
                          <div>
                            <textarea id="cau_tld" name="cau_tld" style="resize:none" cols="100" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                          <label for="cau_tl">Chọn câu trả lời</label>
                          <div>
                            <select id="cau_tl" name="cau_tl" class="form-control">
                                <option value="0">A</option>
                                <option value="1">B</option>
                                <option value="2">C</option>
                                <option value="3">D</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="text-right">
                          <button id="btn_update_cauhoi" class="btn btn-primary" data-link="{{ url('/home/cauhoi') }}" data-token="{{ csrf_token() }}"  data-dismiss="modal" name="close_form"> Update</button>
                          <button id="btn_save_cauhoi" data-link="{{ url('/home/cauhoi') }}" data-token="{{ csrf_token() }}" class="btn btn-primary"  data-dismiss="modal" name="close_form"> Save</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id="btn_delete_cauhoi" data-link="{{ url('/home/student') }}"  data-token="{{ csrf_token() }}" class="btn btn-danger" data-dismiss="modal">Delete
                    </button>
                    <button type="button" name="close_form" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

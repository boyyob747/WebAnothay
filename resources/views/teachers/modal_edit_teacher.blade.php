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
                    @if($errors-> any() || isset($teacherforedit))
                        <script>
                            $(document).ready(function () {
                                $("button[name=btn_modal]").click();
                            });
                        </script>
                    @endif
                    @if(!isset($teacherforedit))
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::open(['method' => 'PATCH','action' => ['TeachersController@update',$teacherforedit->id],'id'  => 'form_create_teacher','class' => 'form form-horizontal']) !!}
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user fa-1x"></i></span>
                            {!!Form::text('username',$teacherforedit->user->username, array('class'=> 'form-control','placeholder' => 'Username','aria-describedby' => 'sizing-addon1', 'required','disabled'))!!}
                            {!!Form::text('user_id',$teacherforedit->user->id, array('hidden'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-text-width fa-1x"></i></span>
                            {!!Form::text('name',$teacherforedit->user->name, array('class'=> 'form-control','placeholder' => 'Name','aria-describedby' => 'sizing-addon1', 'required'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-envelope fa-1x"></i></span>
                            {!!Form::text('email',$teacherforedit->user->email, array('class'=> 'form-control','placeholder' => 'Email','aria-describedby' => 'sizing-addon1', 'required','disabled'))!!}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            {{--<span class="input-group-addon" id="sizing-addon1"><i--}}
                            {{--class="fa fa-birthday-cake fa-1x"></i></span>--}}
                            <span class="input-group-addon" id="sizing-addon1"><i
                                        class="fa fa-birthday-cake fa-1x"></i></span>
                            {{ Form::text('ngaysinh', $teacherforedit->ngaysinh, array('id' => 'datepicker','placeholder' => 'Ngày sinh','class' => 'date form-control filldate', 'required'=> '')) }}
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-phone-square fa-1x"></i></span>
                            {!!Form::text('sodienthoai',$teacherforedit->sodienthoai, array('class'=> 'form-control','placeholder' => 'Số điện thoại','aria-describedby' => 'sizing-addon1', 'required'))!!}
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
                    </div>
                </div>
                <div class="modal-footer">
                        <a href="javascript:history.go(-1)" class="btn btn-danger">Back</a>
                    </button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</div>

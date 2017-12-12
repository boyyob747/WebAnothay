{!! Html::script('js/lambai.js') !!}
{!! Html::style('bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('css/custom.css') !!}
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/custom.js') !!}
{!! Html::style('awesome/css/font-awesome.min.css') !!}
<div id="count_time"></div>
<div class="container-fluid col-md-8 col-md-offset-2" style="margin-top:2%">
  <div id="ketquadiv" hidden="true" class="panel panel-primary">
  <div class="panel-heading"><b>Kết quả</b></div>
  <div class="panel-body">
        <div id="ketqua"></div>
  </div>
  </div>
    <form id="form_baitap">
      {{ method_field('POST') }}
      <input type="hidden" id="_token" name="_token">
      <input type="hidden" id="isThi" name="isThi" value="1">
      <input type="hidden" id="id_baithi" name="id_baithi" value="{{$cauhois->first()->id_baithi}}" name="id_cauhoi">
      <?php $row = 0; ?>
      @foreach($cauhois as $cauhoi)
      <?php ++$row; ?>
      <div class="panel panel-primary">
      <div class="panel-heading"><b>Câu hỏi : {{$row}}</b><b style="float: right;"></b></div>
      <div class="panel-body">
        <blockquote>
          <p>{!!$cauhoi->cau_hoi!!}</p>
        </blockquote>
      <div class="list-group">
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio1" value="0"/> a. {{$cauhoi->cautl_a}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio2" value="1"/> b. {{$cauhoi->cautl_b}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio3" value="2"/> c. {{$cauhoi->cautl_c}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio4" value="3"/> d. {{$cauhoi->cautl_d}}</label>
    </div>
      </div>
      <br>
        </div>
      </div>
      @endforeach
      <div class="text-center">
        <button type="button" data-link="{{ url('/home/getketqua') }}"  data-token="{{ csrf_token() }}" onclick="getKQ()" id="btn_submit_lambaitap" class="btn btn-info btn-block">Submit</button>
      </div>
    </form>
</div>

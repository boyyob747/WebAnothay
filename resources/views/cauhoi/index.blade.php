@extends('layouts.main')
@section('title','Bài')
@section('content')
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
  bkLib.onDomLoaded(function() {
       new nicEditor().panelInstance('cau_hoi');
  });
  //]]>
</script>
{!! Html::script('js/cauhoi.js') !!}
@include('cauhoi.form_cauhoi')
@stop

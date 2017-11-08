@extends('layouts.main')
@section('title','Quản lý lớp học phần')
@section('content')
{!! Html::script('js/lophocphan.js') !!}
@include('admin.table_lophocphan')


                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script type="text/javascript">
                    $(function()
                    {
                      $( "#tags" ).autocomplete({
                        source: '/autocompleteteacher'
                      });
                    });
                    </script>

@stop

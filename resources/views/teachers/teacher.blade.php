    @extends('layouts.main')
    @section('title','Teacher')
    @section('content')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"
              rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
          @include('teachers.table_teacher')

          @if(isset($teacherforedit))
          @include('teachers.modal_edit_teacher',['submitButtonText' => 'Save'])
          @else
          @include('teachers.modal_form_teacher',['submitButtonText' => 'Thêm giáo viên'])
          @endif
    @stop

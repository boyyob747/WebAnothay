Route ==> routes/app.php
Controller ==> app/Http/Controllers
Views ==> resources/views
Configh database ==> .env
Create controller == > ‘php artisan make:controller nameController --plain’
php.blade file : {{ $valiable }}
mainlayout
@yield(‘page_title’)
@yield(‘content’)
index.php
@extens(‘layout.main’)
@section(‘page_title’,’hello page’)
@section(‘conten’)
<h1>{{ $title }} </h1>
<p>
{{ $subtitle}}
</p>
@stop
get time now : {{ time() }}
{{ isset($name) ? $name : ‘default’) }} or shor hand {{ $name or ‘Default’ }}
Show html in string php like ‘<u>hhhh</u>’ ==> {{ !! $name !! }}
if else in blase :
@if ( $something == 1)
 I have 1
@elseif ( $something == 2)
ihave 2
@else
i have else
@endif //dont forgot to endif
@unless ( Auth::check())
you are not signed in.
@endunbless
for Loop :
@for( $i=1;$<10;$i++)
<p>asdasdas</p>
@endfor   
@while(true)  
i am looping forever
@endwhile

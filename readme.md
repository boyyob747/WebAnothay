Route ==> routes/app.php<br>
Controller ==> app/Http/Controllers<br>
Views ==> resources/views<br>
Configh database ==> .env<br>
Create controller == > ‘php artisan make:controller<br> nameController --plain’<br>
php.blade file : {{ $valiable }}<br>
mainlayout<br>
@yield(‘page_title’)<br>
@yield(‘content’)<br>

//fix .env show to public
# Disable index view
Options -Indexes

# Hide a specific file
<Files .env>
    Order allow,deny
    Deny from all
</Files>
index.php<br>
@extens(‘layout.main’)<br>
@section(‘page_title’,’hello page’)<br>
@section(‘conten’)<br>
<h1>{{ $title }} </h1><br>
<p><br>
{{ $subtitle}}<br>
</p><br>
@stop<br>
get time now : {{ time() }}<br>
{{ isset($name) ? $name : ‘default’) }} or shor hand {{<br> $name or ‘Default’ }}<br>
Show html in string php like ‘<u>hhhh</u>’ ==> {{ !! $name !! }}<br>
if else in blase :<br>
@if ( $something == 1)<br>
 I have 1<br>
@elseif ( $something == 2)<br>
ihave 2<br>
@else<br>
i have else<br>
@endif //dont forgot to endif<br>
@unless ( Auth::check())<br>
you are not signed in.<br>
@endunbless<br>
for Loop :<br>
@for( $i=1;$<10;$i++)<br>
<p>asdasdas</p><br>
@endfor   <br>
@while(true)  <br>
i am looping forever<br>
@endwhile<br>
//ubuntu
sudo chmod -R 777 ./storage ./bootstrap
sudo composer update
set password for databse in file .env
//fix if cant fount route ubuntu
https://www.youtube.com/watch?v=7CatEn5IAlo

//fix .env show to public
# Disable index view
Options -Indexes

# Hide a specific file
<Files .env>
    Order allow,deny
    Deny from all
</Files>

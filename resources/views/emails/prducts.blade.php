@component('mail::message')
# New Stock Uploaded

New Sheet has been uploaded on {{$date}}
The Excel is attached to this Email
<a href="{{$data}}">{{$data}}</a>
@component('mail::button', ['url' => $data])
Download!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')

Hello, {{$data['recipient_name']}}, <br> <br>
{{$data['sender_name']}} from {{$data['sender_email']}} referred this job to you, click on the link below to check it out.

The body of your message.

@component('mail::button', ['url' => $data['jobUrl']])
View Job
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

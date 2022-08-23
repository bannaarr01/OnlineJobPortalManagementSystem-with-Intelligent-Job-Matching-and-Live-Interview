@component('mail::message')
# Newsletter

 {{$newsletterData['title']}}

 {!! html_entity_decode($newsletterData['content'])!!}

@component('mail::button', ['url' => $newsletterData['postUrl']])
Read Blog Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

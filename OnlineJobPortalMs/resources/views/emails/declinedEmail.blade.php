@component('mail::message')
    # {{$declinedData['sender_name']}}

    Sorry {{$declinedData['recipient_name']}}
    Your application for the position of {{$declinedData['job_position']}}
    with the job title {{$declinedData['job_title']}} has been declined.

    Regards,
    {{$declinedData['sender_name']}}
@endcomponent

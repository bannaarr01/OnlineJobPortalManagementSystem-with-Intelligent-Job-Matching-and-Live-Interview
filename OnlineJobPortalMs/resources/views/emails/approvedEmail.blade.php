@component('mail::message')
    # {{$approvedData['sender_name']}}

    Congratulation {{$approvedData['recipient_name']}}
    Your application for the position of {{$approvedData['job_position']}}
    with the job title {{$approvedData['job_title']}} has been approved.

    Regards,
    {{$approvedData['sender_name']}}
@endcomponent

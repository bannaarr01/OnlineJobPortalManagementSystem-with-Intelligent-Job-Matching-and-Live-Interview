@component('mail::message')
# Interview Invitation

    Hello {{$inviteData['recipient_name']}}
    {{$inviteData['sender_name']}} invites you to an interview for the {{$inviteData['job_position']}} position
    with the job title {{$inviteData['job_title']}} you have applied for.

    Meeting Details
    Meeting ID: {{$inviteData['meeting_id']}}
    Meeting Password: {{$inviteData['meeting_password']}}
    Scheduled Time: {{$inviteData['scheduled_time']}}

    Or

    Click on the link below to join the meeting.

@component('mail::button', ['url' => $inviteData['join_meeting_url']])
        Join Meeting
@endcomponent
    Regards,
    {{$inviteData['sender_name']}}
@endcomponent

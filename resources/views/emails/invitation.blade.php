<?php use App\Enums\UserRoles; ?>
@if($role == UserRoles::Administrator)
    <?php $role = "an " . $role ?>
@else
    <?php $role = "a " . $role ?>
@endif
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Congratulations, You've been invited to join Ticket Support!!</h2>

<div>
    <p>Dear {{$receiver}},</p>

    <p>
        You've been invited by {{$sender}} to be {{$role}}.
    </p>

    <p>
        To accept this invitation, visit the link below.
    </p>
    <a href="{{$link}}">
        {{$link}}
    </a>
</div>

</body>
</html>
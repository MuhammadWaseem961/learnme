<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Approval Request</title>
    <style>
        ul>li{
            padding:10px !important;
        }
    </style>
</head>
<body>
    <ul style="list-style:none;">
        <li>Hi,Admin</li>
        <li>You have a new Blog Post request.</li>
        <li>Email Address : {{$data->user->email}}</li>
        <li>Phone Number : {{$data->user->phone}}</li>
        <li>User Name : {{$data->user->username}}</li>
        <li>Thank you,</li>
        <li>learnme live support</li>
        <li>support@learnme.live</li>
    </ul>
</body>
</html>
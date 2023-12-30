<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Learnmelive Approve</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="{{asset('assets/css/utility.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />

  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
</head>

<body>
<section class="container" style="width: 80%;margin: auto;padding-top: 30px;">
        <div
            style="height:14px;background-color: #3AC574;border-top-left-radius: 30px !important;border-top-right-radius: 30px !important;">
            <section
                style="margin: auto;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-top-left-radius: 14px !important;border-top-right-radius: 14px !important;">
                <div style="margin: auto;padding-top: 50px;text-align: center;">
                    <img src="{{ asset('assets/frontend/images/ok.png')}}" style="margin: auto;" alt="" srcset="">
                </div>
                <div class="robotoMedium" style="font-size: 55px;padding-top: 16px;color: #3AC574;text-align: center;">
                    Account Approved
                </div>

                <!-- <div class="robotoRegular"
                    style="font-size: 21px;max-width: 500px;text-align: center;margin: auto; padding-top: 16px;border-bottom: 1px solid #707070;padding-bottom: 20px;">
                    Hi , {{ ucwords(@$data['name']) }} Your account has been approved. Thanks for
                    helping us maintaining a trusted workplace for all.
                </div> -->
                <div style="max-width: 100%;padding: 3%;">

                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;">Hello,{{ @$data['name'] }}</div>
                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 8px;max-width: 900px;">Your account has been approved, welcome to the learnme family!</div>
                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 4px;max-width: 900px;">You can start using your account immediately.<div>
                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 4px;max-width: 900px;">Please note: when taking 1-on-1 appointments, they will go live, directly from the app.<div>
                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;">Client Appointments and How They Work:<div>
                    <div class="robotoRegular" style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">A client will see your profile:<div>
                    <ul style="padding-left:15px;margin:0px;">
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            Send you a message directly through the app, or make an
                            appointment during your available business hours.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            You will receive a phone notification and email if someone has
                            booked an appointment.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            You can either accept or decline the appointment request.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            If accepted, your client will receive a notification that you
                            accepted the appointment, and will make their payment – so
                            payment is confirmed before you even begin.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            When it’s time for your appointment, you will go to your
                            ‘Calendar’ Icon and select the appointment – there, you can also
                            view upcoming appointments, as well.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            There will be an ‘Enter’ button, that you will click on to begin
                            your session - you and your client can begin up to 10 minutes
                            before the appointment begins.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            learnme live is pretty intuitive and the process should flow
                            fairly easily, but let us know if you run into any issues, or
                            have any questions.</li>
                        <li class="robotoRegular"
                            style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                            Please note we are currently in Beta, so if you run into ANY
                            issues, or have any questions.. AND SUGGESTIONS please let us
                            know – here at support@learnme.live
                            We are always here to help.
                        </li>

                    </ul>
                    <div class="robotoRegular"
                        style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;text-align:justify;">
                        Please note we are currently in Beta, so if you run into ANY issues,
                        or have any questions.. AND SUGGESTIONS please let us know – here at
                        support@learnme.live
                        We are always here to help.

                    </div>
                    <div class="robotoRegular"
                        style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;">
                        Thank you,
                    </div>
                    <div class="robotoRegular"
                        style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;">
                        learnme live client support

                    </div>
                    <div class="robotoRegular"
                        style="font-size: 21px;margin: auto; padding-top: 16px;max-width: 900px;">
                        <a href="support@learnme.live">support@learnme.live</a>

                    </div>

                    <div class="robotoRegular"
                        style="padding-top: 16px;text-align: center;padding-bottom: 60px;">
                        <button type="button"
                            style="padding-left: 42px;padding-right: 42px;padding-top: 12px;padding-bottom: 12px;border-radius: 4px;border: 0px ;background-color: #3AC574;color: #ffffff !important;"><a
                                href="{{ url('/login') }}"
                                style="text-decoration: none;color: #ffffff;">Login</a></button>
                    </div>

                </div>
            </section>
            <br>
            <br>
        </div>



  </section>

</body>

</html>
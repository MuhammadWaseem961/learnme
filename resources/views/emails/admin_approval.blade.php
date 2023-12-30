<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Seller Approval</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="./assets/css/utility.css" />
        <link rel="stylesheet" href="./assets/css/index.css" />

        <!-- Bootstrap Link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    </head>

<body>

    <section class="container" style="min-width: 80%;margin: auto;padding-top: 30px;max-width: 100%;">
        <div
        style="height:14px;background-color: #3AC574;border-top-left-radius: 30px !important;border-top-right-radius: 30px !important;">
        <section
        style="margin: auto;text-align: center;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-top-left-radius: 14px !important;border-top-right-radius: 14px !important;">
        <div style="margin: auto;padding-top: 50px;">
        <img src="{{ asset('assets/frontend/images/ok.png')}}" style="margin: auto;" alt="" srcset="">
        </div>
        <div class="robotoMedium" style="font-size: 55px;padding-top: 16px;color: #3AC574;">Account Approval</div>
        
        <div class="robotoRegular" style="font-size: 21px;max-width: 500px;text-align: center;margin: auto; padding-top: 16px;padding-bottom: 20px;">
            Hi, Admin You have a new web seller signup request.
        </div>

        <div class="robotoRegular" style="max-width: 500px;margin: auto; padding-top: 16px;text-align:left;padding-left:60px;padding-bottom: 20px;line-height: 23px;">
            <b>Email Address</b>: {{ $data["email"] }}</br>
            <b>Phone Number</b>: {{ $data["phone"] }}</br>
            <b>User Name</b>: {{ $data["username"] }}
        </div>

        <div  class="robotoRegular" style="max-width: 500px;margin: auto; padding-top: 16px;text-align:left;padding-left:46px;padding-bottom: 20px;line-height: 23px;">
            Thank you</br>
            learnme live support</br>
            support@learnme.live
        </div>
        
        </section>
        </div>
        
      </section>
</body>

</html>
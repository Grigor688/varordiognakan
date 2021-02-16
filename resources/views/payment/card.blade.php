<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Autohelp</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto my-5">

            <div class="card border-{{$style_class ?? 'dark'}}">
                <div class="card-header text-{{$style_class ?? 'dark'}}">
                    <h4 class="card-title">{{$card_header ?? "--"}}</h4>
                    <p class="card-text">{{$card_message}}</p>
                </div>
                <div class="d-flex justify-content-between my-1 px-1">
                    {{--<a href="mailto:info@webex.am" class="font-sm text-info btn">info@webex.am</a>--}}
                    {{--<a href="tel:+37496101017" class="font-sm text-info btn">+374-96101017</a>--}}
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{__('payment.date')}}: {{$date ?? "--"}}</li>
                        <li class="list-group-item">{{__('payment.order_number')}}: {{$orderNumber ?? "--"}}</li>
                        <li class="list-group-item">{{__('payment.amount')}}: {{$amount}} {{$currency?? "--"}}</li>
                        <li class="list-group-item">{{__('payment.card_holder')}}: {{$card_holder ?? "--"}}</li>
                    </ul>
                    {{--<a href="{{$link_to_home}}" class="btn btn-primary mt-3">--}}
                        {{--{{__('payment.to_home')}}--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

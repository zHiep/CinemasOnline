<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="icon" type="image/png" href="images/favicon/theater_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <base href="{{asset('')}}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100vh;
            display: grid;
            font-family: "Roboto", cursive;
            background: #d83565;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }

        .bg_shadow {
            width: 550px;
            height: 275px;
            margin: auto;
            display: flex;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .ticket {
            margin: auto;
            width: 550px;
            height: 275px;
            display: flex;
            background: white;
        }

        .left {
            display: flex;
        }

        .admit-one {
            position: absolute;
            color: darkgray;
            width: 250px;
            left: -106px;
            top: 106px;
            padding: 10px 0;
            letter-spacing: 0.15em;
            display: flex;
            text-align: center;
            justify-content: space-around;
            /*writing-mode: vertical-rl;*/
            transform: rotate(-90deg);
        }

        .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }

        .left .ticket-number {
            height: 250px;
            width: 250px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            padding: 5px;
        }

        .ticket-info {
            width: 405px;
            padding: 10px 30px;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .date span {
            width: 100px;
        }

        .date span:first-child {
            text-align: left;
        }

        .date span:last-child {
            text-align: right;
        }

        .date .june-29 {
            color: #d83565;
            font-size: 20px;
        }

        .show-name {
            font-size: 24px;
            /*font-family: "Nanum Pen Script", cursive;*/
            font-family: "Roboto", cursive;
            color: #d83565;
            padding: 4px;
        }

        .show-name h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }

        .show-name h2 {
            font-size: 18px;
            font-weight: 700;
            padding: 2px;
            letter-spacing: 0.1em;
        }

        .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 700;
        }

        .time span {
            font-weight: 400;
            color: gray;
        }

        .left .time {
            font-size: 16px;
        }

        .location {
            display: flex;
            justify-content: space-around;
            font-weight: 900;
            align-items: center;
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }

        .location .separator {
            font-size: 20px;
        }

        .right {
            border-left: 1px dashed #404040;
            position: relative;
        }

        .right .admit-one {
            color: darkgray;
            font-family: "Staatliches", cursive;
        }

        .right .admit-one span:nth-child(2) {
            color: gray;
        }

        .right .right-info-container {
            height: 250px;
            width: 145px;
            padding: 10px 10px 10px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .right .show-name h6 {
            font-size: 18px;
        }

        .barcode {
            height: 100px;
        }

        .barcode img {
            padding: 8px;
            height: 100%;
        }

        .right .ticket-number {
            font-family: "Staatliches", cursive;
            padding: 0 8px;
            color: gray;
        }
        .border-2 {
            border-width: 2px!important;
        }
        .fw-bold {
            font-weight: 700!important;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .btn-outline-light {
            color: #f8f9fa;
            border-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="bg_shadow">
<div id="photo" class="ticket" >
    <div class="left">
        <div class="ticket-info">
            <p class="date">
                <span> {!! date('l', strtotime($ticket->schedule->date)) !!}</span>
                <span class="june-29"> {!! date('d F', strtotime($ticket->schedule->date)) !!}</span>
                <span>{!! date('Y', strtotime($ticket->schedule->date)) !!}</span>
            </p>
            <div class="show-name">
                <h1>{!! $ticket['schedule']['movie']['name']  !!}</h1>
                <h2>{!! $ticket['schedule']['room']['name'] !!}</h2>
            </div>
            <div class="time">
                 <p>
                     <span>@lang('lang.showtime_web')</span> {!! date('H:i A', strtotime($ticket->schedule->startTime)) !!}
                     <span>@lang('lang.to')</span> {!! date('H:i A', strtotime($ticket->schedule->endTime)) !!}
                 </p>
                <p> <span>@lang('lang.seat')</span>
                    @foreach($ticket->ticketSeats as $seat)
                        @if ($loop->first)
                            {{ $seat->row.$seat->col }}
                        @else
                            ,{{ $seat->row.$seat->col }}
                        @endif
                    @endforeach
                </p>
            </div>
            <p class="location"><span>{!! $ticket->schedule->room->theater->name !!}</span>
                <span class="separator"><i class="far fa-smile"></i></span><span>{!! $ticket->schedule->room->theater->city !!}</span>
            </p>
        </div>
    </div>
    <div class="right">
        <p class="admit-one">
            <span>PandaCinema</span>
            <span>PandaCinema</span>
            <span>PandaCinema</span>
        </p>
        <div class="right-info-container">
            <div class="barcode">
                <img alt="QR code" src="data:image/png;base64,{{ DNS2D::getBarcodePNG($ticket->code.'', 'QRCODE') }}"/>
            </div>
            <p class="ticket-number" >
                #{{ $ticket->code }}
            </p>
        </div>
    </div>
</div>
</div>
<div style="display: flex; justify-content: center; letter-spacing: 20px;">
    <div style="display: flex;">
        <form action="/">
            <button  type="submit" class="btn btn-outline-light border-2 fw-bold">@lang('lang.previous')</button>&nbsp
        </form>
        <div style="display: inline-block" >
            <button id="download" class="btn btn-outline-light border-2 fw-bold">@lang('lang.download')</button>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    window.onload = () => {
        ticket = document.getElementById('photo');
        html2canvas(ticket).then((canvas) => {
            image = canvas.toDataURL('image/PNG');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/ticketPaid/image',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'image' : image
                    },
                    statusCode: {
                        200: (data) => {
                        },
                        500: (data) => {
                        }
                    }
                });
        });
    }

    $(document).ready(() => {
        $("#download").on('click', () => {
            ticket = document.getElementById('photo');
            html2canvas(ticket).then((canvas) => {
                downloadImage(canvas.toDataURL('image/PNG', 1.0),"TicketInfo.png");
            });
        });
    })


    function downloadImage(uri, filename){
        var link = document.createElement('a');
        if(typeof link.download !== 'string'){
            window.open(uri);
        }
        else{
            link.href = uri;
            link.download = filename;
            accountForFirefox(clickLink, link);
        }
    }

    function clickLink(link){
        link.click();
    }

    function accountForFirefox(click){
        var link = arguments[1];
        click(link);
    }

</script>
</body>
</html>


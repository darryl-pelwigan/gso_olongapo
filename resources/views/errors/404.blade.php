<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
                background: url("{{asset('olongapo')}}/img/bg.jpg") no-repeat;
                background-size: cover;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
                color: darkslategrey;
                font-weight: bold;
                background: rgba(25,250,0,.5);
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">404 Page Not Found...</div>
            </div>
        </div>
    </body>
</html>

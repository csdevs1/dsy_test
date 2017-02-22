<!doctype html>
<html class="no-js" lang="en" ng-app="MyWebsite" ng-controller="HomeController">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DSY</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- IONIC ICONS-->
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style>
            body{
                overflow-x: hidden;
                background: #1D2B64;
                background: -webkit-linear-gradient(to left, #1D2B64 , #F8CDDA);
                background: linear-gradient(to left, #1D2B64 , #F8CDDA);
            }
            .container{position: relative;}
            .nav-options a{
                text-decoration: none;
                color: #000;
                font-size: 1.5rem;
                font-family: 'Montserrat', sans-serif;
            }
            .ion-ios-close-outline{
                color: #000;
                font-size: 2.5rem;
                margin-top: 10px;
                margin-right: 10px;
                float: right;
            }
            .e927d0677c7,.e927d0677c7:active,.e927d0677c7:focus{
                color: #fff;
                transition: 0.7s all;
            }.e927d0677c7:hover{
                text-shadow: -1px 1px 3px #000;
                transition: 0.7s all;
                text-decoration: none;
                color: #fff;
            }
            ul li{
                vertical-align: middle;
                text-align: center;
                overflow: hidden;
                padding: 15px;
            }
            .item,.price{font-size: 2rem;}
            .date{font-size: 1.5rem;}
            .item{float: left;cursor: pointer;}
            .price{float: right;}
            .ion-alert{color:rgba(255,0,0,0.3);}
            
            .spending{
                position: absolute;
                width: 100%;
                top:0;
                -webkit-perspective: 500px; /* Chrome, Safari, Opera */
                perspective: 500px;
                transform: translateX(200%);
            }
            .spending ul{
                background: #fff;
                box-shadow: -7px 8px 11px #333;
                transform: translateX(200%);
                transform: rotateX(-90deg);
            }
            .spending ul li:nth-child(odd){background-color: #fff;}
            .spending ul li:nth-child(even){
                color: #fff;
                background: #4CB8C4; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #4CB8C4 , #3CD3AD); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #4CB8C4 , #3CD3AD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                box-shadow: -2px 2px 8px 0px #777;
            }
            .popover{color: #000 !important;}
            .spending ul li:nth-child(even) i.ion-alert{
                color:rgba(255,0,0,0.8);
            }
            
            #expenses:target .spending{
                transform: translateX(0%);
                -webkit-perspective: 500px; /* Chrome, Safari, Opera */
                perspective: 500px;
                transition: all 1s;
            }#expenses:target .spending ul{
                transform: translateX(0%);
                transform: rotateX(0deg);
                transition: all 1.5s;
            }#close .spending{
                -webkit-perspective: 500px; /* Chrome, Safari, Opera */
                perspective: 500px;
                transform: translateX(200%);
                transition: all 1.5s;
            }#close .spending ul{
                transform: translateX(200%);
                transform: rotateX(-90deg);
                transition: all 1.5s;
            }
            .input-group{width: 100%;margin-bottom: 5px;}
            input,textarea{color: #999;}
            textarea{
                width: 100%;
                border-radius: 30px;
                overflow-y: auto;
                min-height: 150px;
                resize: none;
                padding-left: 10px;
                padding-right: 10px;
            }
            textarea:focus{
                outline: none;
            }
        </style>
    </head>
    <body>
        <div class="container" id="expenses">
        <div class="container" id="close">
            <div class="row nav-options">
                <a href="#expenses" data-toggle="modal" data-target="#addNew"><i class="ion-ios-plus-outline"></i> Seleccionar Fecha</a>
            </div>
            <?php// echo var_dump($json); ?>
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><i class="ion-ios-plus-outline"></i> Seleccionar Fecha</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <input type="date" id="date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit">Aceptar</button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-unstyled" id="current">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--LIST OF MONTHS -->

        </div>
        </div>
        <!--jQuery CDN-->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            var get_uf = function(date){
                return $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {date:date},
                    url: '/Dsarhoya/dsy_controller/get_uf'
                });
            }
            
            $('#submit').on('click', function() {
                var date = $('#date').val();
                var rs=get_uf(date);
                $(this).attr('disabled','disabled');
                $('#date').attr('disabled','disabled');
                rs.done(function(response){
                    $('#submit').removeAttr('disabled');
                    $('#date').removeAttr('disabled');
                    $('#current').html('');
                    $('#current').append('<li class="items"><span class="item col-xs-4" data-toggle="popover" data-placement="bottom"><i class="ion-calendar"></i>'+response['UFs'][0]['Fecha']+'</span><span class="date col-xs-4"></span><span class="price col-xs-4"><i class="ion-cash text-success"></i> '+response['UFs'][0]['Valor']+'UF</span></li>');
                });
            });
        </script>
  </body>
</html>

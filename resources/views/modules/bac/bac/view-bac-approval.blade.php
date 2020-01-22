@extends('template::pdf.default')

@section('header')
<header>
    <div class="row" id="">
        <div class="col-xs-2 text-right" style="display:inline-block">
            <br><img class="img-responsive"  src="{{asset('olongapo/img/logo-360.png')}}" style=" margin-top:-130px;width: 95px; height: 95px;margin-left:20px"/>
        </div>
        <div class="col-xs-8 text-center" style="font-size: 12px;display:inline-block;margin-top:15px;margin-left:-150px" align="center">
            <p class="coo" >Republic of the Philippines</p>
            <p class="coo" >City of Olongapo</p>
            <h3 class="c_title" style="font-size:25px"><strong>BIDS AND AWARDS COMMITTEE</strong></h3>
            <img src="{{asset('adminlte-custom/img/line.png')}}" class="img-line" style="padding-left:220px"/>
            <p class="coo" >General Services Office, 2/F Olongapo City Hall, Olongapo City</p>
            <p class="cntc web">web: www.olongapocity.gov.ph </p>
            <p class="cntc">email: olongapo_gso@yahoo.com </p>
            <h3 class="res">RESOLUTION NO. <u>&nbsp;&nbsp; {{$bac_control_no}} &nbsp;&nbsp;</u> </h3>
            <p class="res-i"><i>(Series of {{date('Y')}})</i></p>
        </div>
    </div>
</header><!-- /header -->

@stop

@section('content')
    {!! ($bac_template) !!}

    <br>
    <div class="text-center" style="margin: 0; padding: 0; text-align:center; font-size: 15px;" >
        <b>BIDS AND AWARDS COMMITTEE</b><br><br>
        {{-- <p style="text-align: center;" style="margin: 0; padding: 0;">Requested by: </p> --}}
    </div>
    <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
    ?>
    <br/>
        @for( $x = 0 ; $x< count($committee) ; $x++)
            @if( $cc%2==1 )
                    <?php $cx=1; $cd=1; ?>
                 <div class="row">
            @endif
                <div style="display: inline-block; width: 48%;" >
                    <p align="center" style="font-size: 13px;"><strong><u>{{ strtoupper($committee[$x]->employee_name) }}</u></strong></p>
                    <p align="center">{{$committee[$x]->title}}</p><br><br>
                </div>

            @if( $cc%2==0 && $cx==2 )
                </div>
                <?php  $cd++; ?>
            @endif

                <?php  $cc++; $cx++; ?>
        @endfor
    @if( $cd!=2 )
        </div>
    @endif
     <br />

     {{-- <p style="text-align: center;">Approved by: </p> --}}
     <p align="right" style="margin: 0 35% 0;">Approved by:</p>
     <br>
         <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
        ?>

          @for( $x = 0 ; $x< count($approved_by) ; $x++)


                 <div class="row">
                    <div style="font-size: 11px; margin-right: 50px; width: 30%; float: right">
                        <p class="text-center" align="center"><strong>{{strtoupper($approved_by[$x]->employee_name)}}</strong></p>
                        <p class="text-center" align="center">{{$approved_by[$x]->title}}</p>
                    </div>
                </div>
                <br><br><br>
                <div class="clear"></div>

                <?php  $cc++; $cx++; ?>
        @endfor
    @if( $cd!=2 )

    @endif
{{-- attested by code is placed on test.blade.php (start with the br afther the last div) --}}
@stop

<style type="text/css">
  body{

    font-size:12px;

  }

</style>
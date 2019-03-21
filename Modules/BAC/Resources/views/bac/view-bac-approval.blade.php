@extends('template::pdf.default')

@section('header')
<header>
    <div class="row" id="">
        <div class="col-xs-2 text-right">
            <br><img class="img-responsive"  src="{{asset('olongapo/img/logo-360.png')}}" style="margin-top: 10px; width: 95px; height: 95px;" />
        </div>
        <div class="col-xs-8 text-center" style="font-size: 12px;">
            <p class="coo" >Republic of the Philippines</p>
            <p class="coo" >City of Olongapo</p>
            <h3 class="c_title" style="font-size:12px"><strong>BIDS AND AWARDS COMMITTEE</strong></h3>
            <img src="{{asset('adminlte-custom/img/line.png')}}" class="img-line" />
            <p class="coo" >General Services Office, 2/F Olongapo City Hall, Olongapo City</p>
            <p class="cntc web">web: www.olongapocity.gov.ph </p>
            <p class="cntc">email: olongapo_gso@yahoo.com </p>
            <h3 class="res">RESOLUTION  NO. <u>&nbsp;&nbsp;  {{$bac_control_no}}  &nbsp;&nbsp;</u> </h3>
            <p class="res-i"><i>(Series of {{date('Y')}})</i></p>
        </div>
    </div>
</header><!-- /header -->

@stop

@section('content')
{!! ($bac_template) !!}
    <br>
    <div class="text-center" style="margin: 0; padding: 0">
        <b>BIDS AND AWARDS COMMITTEE</b>
        <p style="text-align: center;" style="margin: 0; padding: 0;">Requested by: </p>
    </div>
    <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
    ?>
    <br />
        @for( $x = 0 ; $x< count($committee) ; $x++)
            @if( $cc%2==1 )
                    <?php $cx=1; $cd=1; ?>
                 <div class="row">
            @endif
                 <div class="col-xs-4 col-xs-offset-1" style="font-size: 11px;">
                    <p class="text-center"><strong><u>{{ strtoupper($committee[$x]->employee_name) }}</u></strong></p>
                    <p class="text-center">{{$committee[$x]->title}}</p><br><br>
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

     <p style="text-align: center;">Approved by: </p>
         <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
        ?>

          @for( $x = 0 ; $x< count($approved_by) ; $x++)


                 <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-8" style="font-size: 11px;">
                        <p class="text-center"><strong><u>{{strtoupper($approved_by[$x]->employee_name)}}</u></strong></p>
                        <p class="text-center">{{$approved_by[$x]->title}}</p>
                    </div>
                </div><br>


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
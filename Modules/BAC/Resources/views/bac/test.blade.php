@extends('template::pdf.default')

@section('header')
<header>
    <div class="row" id="header">
                    <div class="pull-left img">
                        <img class="img-responsive"  src="{{asset('olongapo/img/logo-360.png')}}" />
                    </div>
                    <div class="header-text text-center">
                        <h3 class="coo" >Republic of the Philippines</h3>
                        <h3 class="coo" >City of Olongapo</h3>
                        <h3 class="c_title"><strong>BIDS AND AWARDS COMMITTEE</strong></h3>
                        <img src="{{asset('adminlte-custom/img/line.png')}}" class="img-line" />
                        <h4 class="coo" >General Services Office, 2/F Olongapo City Hall, Olongapo City</h4>
                        <h4 class="cntc web">web: www.olongapocity.gov.ph </h4>
                        <h4 class="cntc">email: olongapo_gso@yahoo.com </h4>
                        <h4 class="res-i">(Series of 2015) </h4>
                    </div>
    </div>
</header><!-- /header -->

@stop



@section('content')
<div class="content-wrapper">
   <section class="content">
    <div class="row">


    <div class="col-xs-2" style="background: #605ca8;">test</div>


    <div class="col-xs-4 col-xs-offset-2" style="background: Purple;">test2</div>

        <div class="col-xs-4" style="background: Purple;">test2</div>

    </div>
        </section>
</div>

@stop
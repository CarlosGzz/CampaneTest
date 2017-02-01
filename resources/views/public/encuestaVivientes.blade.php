@extends('layouts.public')
@section('metas')
    <meta name="description" content="Encuesta Vivientes Campamento Nueva Especie">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title')
    Encuesta Vivientes Campamento Nueva Especie
@endsection
@section('scripts')
    <!-- Switchery -->
    <link href="/css/switchery/switchery.min.css" rel="stylesheet">
@endsection
@section('content')

  
    <!-- page content -->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="page-title">
                <h3 style="font-size:40px ;color: #9B9692; text-align: center;">
                    <img src="/images/logoNe.png" style="width:150px; height:auto;">
                    Formulario
                    <img src="/images/logoNe.png" style="width:150px; height:auto;">
                    <br>
                    Nueva Especie
                </h3>
            </div>
        </div>
    </div>
    <br>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="x_panel">
                <div class="x_content">
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        @include('public.steps')
                        <div id="step-1">
                            @include('public.step1')
                        </div>
                        <div id="step-2">
                            @include('public.step2')
                        </div>
                        <div id="step-3">
                            @include('public.step3')
                        </div>
                    </div>
                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>
    @include('public.vivienteJavascript')  
@endsection
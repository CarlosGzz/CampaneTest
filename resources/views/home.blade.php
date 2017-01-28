@extends('layouts.app')

@section('content')
    <div class="">
        @include('dashboard/vivientesTiles')
        <div class="col-md-8 col-sm-12 col-xs-12">
            @include('dashboard/staffTiles')
            @include('dashboard/puntoEquilibrioChart')
        </div>
    </div>
@endsection


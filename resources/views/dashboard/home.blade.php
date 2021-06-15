@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/adminlte/person.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-volume-up"></i></span>
                <div class="info-box-content"><span class="info-box-text">Contato</span>
                <span class="info-box-number">{!! count($user) !!}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-newspaper"></i></span>
                <div class="info-box-content"><span class="info-box-text">Notícias</span>
                <span class="info-box-number">{!! count($user) !!}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
            <div class="info-box mb-3 bg-primary">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content"><span class="info-box-text">Usuário</span>
                <span class="info-box-number">{!! count($user) !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <center><b>Todos os direitos a GL Lima Terceirização - {!! date('Y') !!}</b></center>
@endsection


@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container p-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 text-center text-service-blue">CONTATO E NOSSA LOCALIZAÇÃO</div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.1337145983503!2d-56.09778018579771!3d-15.584503089181966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db1815651fb19%3A0x5e7f37be54cb527d!2sGL%20Lima%20Terceirizacao!5e0!3m2!1spt-BR!2sbr!4v1623533142571!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 shadow p-2">
                <form action="{{ route('site.contact.send') }}" method="post" id="form">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="Nome do Solicitante">
                        @error('name')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="Telefone do Solicitante">
                        @error('phone')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="@error('email') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="E-mail do Solicitante">
                        @error('email')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="subject" id="subject" class="@error('subject') is-invalid @enderror form-control border-0 rounded-0 bg-light">
                            <option value="">Selecione</option>
                            <option value="Dúvida">Dúvida</option>
                            <option value="Elogio">Elogio</option>
                            <option value="Sugestão">Sugestão</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="content" class="@error('content') is-invalid @enderror form-control border-0 rounded-0 bg-light" cols="30" rows="9"></textarea>
                        @error('content')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary rounded-0 btn-block"><i class="fab fa-telegram-plane"></i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

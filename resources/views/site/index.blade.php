@extends('layouts.master')
@section('content')
<div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12  pt-5 pb-5">
    <div class="container  pt-5 pb-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 text-center text-service-blue">POR QUE CONTRATAR NOSSOS SERVIÇOS</div>
                <div class="col-12 text-service-description font-italic">
                   "O Grupo Lima Prime terceirização LTDA, junto com nossos colaboradores garantimos um serviço de qualidade, confiança e tranquilidade nos serviços que prestamos."
                </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 bg-div">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 text-service text-center">
            NOSSOS SERVIÇOS
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/copeira.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviço de Copeira</div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/garagista.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviço de Garagista</div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/servico-de-portaria.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviço de Portaria</div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/servicos-gerais.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviço de Gerais</div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/digitador.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviços de digitação</div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p-4 text-center">
            <img src="{{ asset('assets/image/services/servicos-de-cobranca.jpg') }}" class="img-fluid rounded" alt="Copeira" title="Copeira">
            <div class="text-service-description-2">Serviços de Cobrança</div>
        </div>
    </div>
</div>
</div>
<div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 p-5" id="budget">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 text-center text-service-blue">CONTATE-NOS PARA UM ORÇAMENTO</div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.1337145983503!2d-56.09778018579771!3d-15.584503089181966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db1815651fb19%3A0x5e7f37be54cb527d!2sGL%20Lima%20Terceirizacao!5e0!3m2!1spt-BR!2sbr!4v1623533142571!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 shadow p-2">
                <form action="{{ route('site.budget.send') }}" method="post" id="form">
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
</div>
@endsection
@section('js')
<script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/mask-phone.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){

  $("#phone").mask(behavior, options);
  $("#form").validate({
    rules : {
            name : {
                required: true,
                minlength: 10
            },
            phone : {
                required: true,
            },
            email : {
                required: true,
            },
            content : {
                required: true,
                minlength: 10
            },
    },
    messages : {
        name : {
                required : 'O Campo <b>Nome</b> é obrigatório.',
                minlength : 'O campo <b>Nome</b> é no minímo 10 caracateres.'
            },
        phone : {
                required : 'O Campo <b>Telefone</b> é obrigatório.',
            },
        email : {
                required : 'O Campo <b>E-mail</b> é obrigatório.',
            },
        content : {
                required : 'O Campo <b>Mensagem</b> é obrigatório.',
                minlength : 'O campo <b>Mensagem</b> é no minímo 10 caracateres.'
            }
        },
        errorElement: "div",
			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
		    	error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).addClass( "is-invalid" );
			},
			unhighlight: function (element, errorClass, validClass) {
				$( element ).removeClass( "is-invalid" );
			}
})

});
</script>
@if (session('message'))
<script>
Swal.fire({
    icon:  '{{ session('icon') }}',
    title: '{{ session('message') }}',
})
</script>
@endif
@endsection


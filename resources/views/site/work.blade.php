@extends('layouts.master')
@section('content')
<div class="container p-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 text-center text-service-blue">VENHA FAZER PARTE DA NOSSA EQUIPE</div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 shadow p-2">
                <form action="{{ route('site.work.send') }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="Nome Completo">
                        @error('name')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="cpf" name="cpf" maxlength="11" class="@error('cpf') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="CPF">
                        @error('cpf')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="date" id="birthday" name="birthday" maxlength="14" class="@error('birthday') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="Data de Aniversário">
                        @error('birthday')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="Telefone para Contato">
                        @error('phone')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="@error('email') is-invalid @enderror form-control border-0 rounded-0 bg-light" placeholder="E-mail de contato">
                        @error('email')
                            <span class="error invalid-feedback">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="@error('file') is-invalid @enderror form-control border-0 rounded-0 bg-light">
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
<script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/mask-phone.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){

  $("#phone").mask(behavior, options);
  $("#cpf").mask("000.000.000-00");

  $("#form").validate({
    rules : {
            name : {
                required: true,
                minlength: 10
            },
            phone : {
                required: true,
            },
            birthday : {
                required: true,
            },
            cpf : {
                required: true,
                minlength: 11
            },
            email : {
                required: true,
            },
            file : {
                required: true,
            }
    },
    messages : {
        name : {
                required : 'O Campo <b>Nome</b> é obrigatório.',
                minlength : 'O campo <b>Nome</b> é no minímo 10 caracateres.'
            },
        cpf : {
                required : 'O Campo <b>CPF</b> é obrigatório.',
                minlength : 'O campo <b>CPF</b> é no minímo 10 caracateres.'
            },
        phone : {
                required : 'O Campo <b>Telefone</b> é obrigatório.',
            },
        birthday : {
                required : 'O Campo <b>Data de Aniversário</b> é obrigatório.',
            },
        email : {
                required : 'O Campo <b>E-mail</b> é obrigatório.',
            },
        file : {
                required : 'O Campo <b>Arquivo</b> é obrigatório.',
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

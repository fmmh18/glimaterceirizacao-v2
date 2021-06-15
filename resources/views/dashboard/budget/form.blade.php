@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1 class="text-capitalize">{{ $action }} Orçamento</h1>
@stop
@section('content')
<div class="card card-outline card-warning">
    <div class="card-body table-responsive no-padding">
        <form action="{{ route($route) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <input type="hidden" name="id" @if(!empty($data->id)) value="{{ $data->id }}" @endif>
            <div class="form-group @error('title') is-feedback @enderror">
                <label for="title">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Nome" @if(!empty($data->name)) value="{{ $data->name }}" @endif>
                @error('name')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="E-mail" @if(!empty($data->email)) value="{{ $data->email }}" @endif>
                @error('email')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" id="phone" class="@error('phone') is-invalid @enderror form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Telefone" @if(!empty($data->phone)) value="{{ $data->phone }}" @endif>
                @error('phone')
                <span class="error invalid-feedback">
                <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
            <div class="form-group">
                <label for="subject">Assunto</label>
                <input type="text"  name="subject" id="subject" class="@error('subject') is-invalid @enderror form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Assunto" @if(!empty($data->subject)) value="{{ $data->subject }}" @else value="{{ Auth::user()->name }}" @endif>
                @error('subject')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group @error('content') is-feedback @enderror">
                <label for="content">Conteúdo</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">@if(!empty($data->content)){{ $data->content }}@endif</textarea>
                @error('content')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <input type="checkbox" class="custom-control-input" @if(!empty($data->status)) @if($data->status == 1) checked @endif @endif name="status" id="customSwitch3">
                  <label class="custom-control-label" for="customSwitch3">Status</label>
                </div>
              </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block rounded-0 text-capitalize"><i class="{{ $icon }}"></i> {{$action }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/js/remove-accents.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/mask-phone.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    $(document).ready(function(){
  CKEDITOR.replace( 'content' );

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
                required : 'O Campo <b>Conteúdo</b> é obrigatório.',
                minlength : 'O campo <b>Conteúdo</b> é no minímo 10 caracateres.'
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
<script>
    $("#title").change(function(){
    var new_title = removeAccents($('#title').val()).toLowerCase().replace(/ /g, "-")
    $('#slug').val(new_title);
});
</script>
@endsection

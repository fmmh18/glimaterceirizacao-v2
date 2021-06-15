@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1 class="text-capitalize">{{ $action }} Imagem</h1>
@stop
@section('content')
<div class="card card-outline card-warning">
    <div class="card-body table-responsive no-padding">
        <form action="{{ route($route) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <input type="hidden" name="id" @if(!empty($data->id)) value="{{ $data->id }}" @endif>
            <div class="form-group @error('title') is-feedback @enderror">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Nome" @if(!empty($data->name)) value="{{ $data->name }}" @endif>
                @error('name')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Posição</label>
                <select name="position" id="position" class="@error('position') is-invalid @enderror form-control border border-top-0 border-left-0 border-right-0 rounded-0">
                @for($i = 0; $i < 1000;$i++)
                    @if(!empty($data->position))
                        @if($i == $data->position)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @else
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
                </select>
                @error('position')
                <span class="error invalid-feedback">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category" id="category" class="form-control border border-top-0 border-left-0 border-right-0 rounded-0">
                    @foreach ($categories as $category)
                        @if(!empty($data->category_id))
                            @if($data->category_id == $category->id)
                                <option value="{{ $category->id }}" select>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Imagem de Capa</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input"  accept="image/*" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>
                    </div>
                  </div>
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
  //CKEDITOR.replace( 'content' );

  $("#phone").mask(behavior, options);
  $("#form").validate({
    rules : {
            name : {
                required: true,
                minlength: 10
            }
    },
    messages : {
        name : {
                required : 'O Campo <b>Nome</b> é obrigatório.',
                minlength : 'O campo <b>Nome</b> é no minímo 10 caracateres.'
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

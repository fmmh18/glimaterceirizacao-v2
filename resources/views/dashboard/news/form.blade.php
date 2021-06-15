@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1 class="text-capitalize">{{ $action }} Notícia</h1>
@stop
@section('content')
<div class="card card-outline card-warning">
    <div class="card-body table-responsive no-padding">
        <form action="{{ route($route) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <input type="hidden" name="id" @if(!empty($data->id)) value="{{ $data->id }}" @endif>
            <input type="hidden" name="imageOld" @if(!empty($data->image)) value="{{ $data->image }}" @endif>
            <div class="form-group @error('title') is-feedback @enderror">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Título" @if(!empty($data->title)) value="{{ $data->title }}" @endif>
                @error('title')
                    <span class="error invalid-feedback">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">url</label>
                <input type="text" name="slug" id="slug" class="form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="url amigável" @if(!empty($data->slug)) value="{{ $data->slug }}" @endif>
            </div>
            <div class="form-group">
                <label for="subtitle">Sub-Título</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Sub-Título" @if(!empty($data->subtitle)) value="{{ $data->subtitle }}" @endif>
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" readonly name="author" id="author" class="form-control border border-top-0 border-left-0 border-right-0 rounded-0" placeholder="autor" @if(!empty($data->author)) value="{{ $data->author }}" @else value="{{ Auth::user()->name }}" @endif>
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
                  <label class="custom-control-label" for="customSwitch3">Publicar</label>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    $(document).ready(function(){
  CKEDITOR.replace( 'content' );

  $("#form").validate({
    rules : {
            title : {
                required: true,
                minlength: 10
            },
            content : {
                required: true,
                minlength: 10
            },
    },
    messages : {
        title : {
                required : 'O Campo <b>Título</b> é obrigatório.',
                minlength : 'O campo <b>Título</b> é no minímo 10 caracateres.'
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

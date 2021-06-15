@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Imagens</h1>
@stop
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card card-outline card-primary">
    <div class="card-body table-responsive no-padding">
        <div class="col-md-12 col-xl-12 col-lg-12 col-xs-12 col-sm-12 text-right">
            <a href="{{ route('dashboard.image.add') }}" class="btn btn-primary rounded-0"><i class="fas fa-plus-circle"></i> Adicionar</a>
        </div>
        <div class="col-md-12 col-xl-12 col-lg-12 col-xs-12 col-sm-12 mt-3">
            <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Galeria</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" width="5%">Status</th>
                            <th scope="col" width="5%" colspan="2" align="center"><center>Ações</center></th>
                        </tr>
                    </thead>
                    @if(count($data) > 0)
                        @foreach ( $data as $item )
                        <tbody>
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach ($categories as $category )
                                    @if($category->id == $item->gallery)
                                        {{ $category->name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->type }}</td>
                                <td align="center">
                                        <span id="status_active_{{ $item->id }}" class="badge badge-success @if($item->status != 1) sr-only @endif">Ativo</span>
                                        <span id="status_inactive_{{ $item->id }}" class="badge badge-danger @if($item->status != 0) sr-only @endif">Inativo</span>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.image.edit',$item->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" id="button_del_{{ $item->id }}" onclick="deleteRegister({{ $item->id }},'{{ route('dashboard.image.del.send', $item->id) }}')" class="btn btn-danger @if($item->status == 0) disabled @endif"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    @else
                    <tbody>
                        <tr>
                            <td colspan="7" align="center">Não possui registro.</td>
                        </tr>
                    </tbody>
                    @endif
            </table>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <center><b>Todos os direitos a GL Lima Terceirização - {!! date('Y') !!}</b></center>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/delete-register-logic.js') }}"></script>
@endsection

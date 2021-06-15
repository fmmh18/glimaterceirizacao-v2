@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 col-xs-12 bg-div  pt-5 pb-5">
    <div class="container  pt-5 pb-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-xs-12 text-center text-service">Grupo Lima Prime LTDA</div>
                <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-xs-12 text-white font-italic">
                    O Grupo Lima Prime terceirização LTDA, junto com nossos colaboradores garantimos um serviço de qualidade, confiança e tranquilidade nos serviços que prestamos. Apenas grandes empresas podem oferecer aos nossos clientes funcionários competentes que atuam com satisfação, por isso nós pagamos um salário diferenciado. Além da reciclagem para que estejam sempre comprometidos com suas funções e assim gerar confiança e segurança aos nossos clientes.</p><p>Sabemos conversar, orientar, reconhecer e compensar os nossos colaboradores pelos serviços prestados. Tudo isso e valorizado na confiabilidade e transparência da empresa.</p><p>Na Grupo Lima Prime Terceirização LTDA M.E prestamos os seguintes serviços:</p><p><ul><li>Portaria (24horas)</li><li>Garagista e Vigia (24horas)</li><li>Serviços Gerais</li><li>Copeira</li><li>Recepcionista</li><li>Digitadora</li><li>Encarregado</li><li>Manobrista</li><li>Zelador</li><li>Encarregado de Piso</li><li>Administração de condomínios</li><li>Departamento jurídico de cobrança</li><li>Damos suporte à empresa que não terceiriza com os nosso: diaristas, porteiros e serviços gerais</li></ul>
                </div>

        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12">
    <div class="container">
        <div class="row">
            @foreach ($images as $image)

            <div class="col-md-3 col-xl-3 col-lg-3 col-sm-12 col-xs-12 p-3">
                <a href="{{ url('storage/'.$image->path)}}" data-fancybox data-caption="{{ $image->name }}">
                 <img src="{{ url('storage/'.$image->path)}}" alt="">
                </a>
            </div>

        @endforeach
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection


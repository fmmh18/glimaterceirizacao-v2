<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-mobile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('css')
    <title>GL Lima Terceirização</title>
  </head>
  <body>
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-6 col-xs-6" style="position: absolute;z-index: 1900;background-color:#e5e5e5">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-xl-9 col-sm-6 col-xs-6">&nbsp;</div>
            <div class="col-md-1 col-lg-1 col-xl-1 col-sm-2 col-xs-2 social text-center text-md-left text-lg-left text-xl-left">
                <i class="fab fa-1x fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;
                <i class="fab fa-1x fa-instagram"></i>&nbsp;&nbsp;&nbsp;
                <i class="fab fa-1x fa-linkedin-in"></i>
            </div>
            <div class="col-md-2 col-lg-1 col-xl-2 col-sm-2 col-xs-2 text-center text-phone">(65) 3023-0106</div>
        </div>
      </div>
      @include('layouts.include.menu')
      @include('layouts.include.carousel')
      @yield('content')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    @yield('js')
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

<script>
    var get_width_img = $(this).width();


$(document).ready(function() {
   if( $(this).scrollTop() == 0){
       $('#menu-nav').removeClass('bg-blue-person');
   }else{
       $('#menu-nav').addClass('bg-blue-person');
       $('#menu-nav').addClass('mt-0');
   }

$(window).bind('scroll', function(){
 // Add class after x distance from top
 $('#menu-nav').toggleClass('bg-blue-person', $(this).scrollTop() >= 100)
 $('#menu-nav').toggleClass('mt-0', $(this).scrollTop() >= 100)
})
});
</script>
    <footer class="bg-div p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12">
                    <div class="text-service" style="font-weight: bolder">GL Lima Terceirização LTDA</div>
                    <div class="text-white">Grupo Lima Prime terceirização LTDA, junto com nossos colaboradores garantimos um serviço de qualidade, confiança e tranquilidade nos serviços que prestamos.</div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
                    <div class="text-address">Nosso Endereço</div>
                    <div class="text-white pt-4">
                        Av. Presidente Marques - Santa Helena, Cuiabá, MT
                    </div>
                    <hr style="background-color: #fff;">
                    <div class="text-white w-100">(65) 3023-0106</div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                    <div class="text-address">Horário</div>
                    <div class="text-white pt-4">
                        Seg-Sab 7:00 - 18:00
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer>
        <div class="container p-3">
            <div class="row">
                <div class="col-12 text-center text-footer"><span style="line-height: 2.4em">Todos os direitos ao Grupo Lima Prime - {!! date('Y') !!}</span> <a href="https://afdsolution.com.br"><img src="{{ asset('assets/image/logo/logo-afd-120.png') }}" class="float-right"></a></div>
            </div>
        </div>
    </footer>

  </body>
</html>

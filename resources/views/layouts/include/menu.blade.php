<nav class="navbar navbar-expand-lg navbar-dark bg-degrade fixed-top menu-pos" id="menu-nav">
    <div class="container">
        <div class="row">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/image/logo/logo.png') }}" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{ route('site.company') }}">Empresa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{ route('site.contact') }}">Contato</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{ route('site.home') }}#budget" data-scroll="">Orçamento</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{ route('site.work') }}">Trabalhe</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
</nav>


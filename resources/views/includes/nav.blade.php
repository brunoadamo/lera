<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="p-0 d-none d-sm-none d-md-none d-lg-block" href="/"><img src="{{{ asset('image/logo.png')}}}" width="43px" alt="Logo"></a>
        <a class="p-0 d-lg-none d-md-block" href="/"><img src="{{{ asset('image/logo_dark.png')}}}" width="43px" alt="Logo"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#sobre">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/narratives">Narrativas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/portfolio">Portfólio</a>
                </li>
                

                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Perfil</a>
                    </li>
                @endif
                <li class="nav-item">
                    <div class="dropdown show">
                        
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Temas
                        </a>
                    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                        
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
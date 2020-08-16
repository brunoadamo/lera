<!-- Page Header -->
<header class="masthead @if (!Request::is('/')) contenthead @endif" @if (Request::is('/'))style="background-image: url('{{{ URL::asset('image/banner/2.jpg')}}}')"@endif>
    <div class="overlay"></div>
    @if (Request::is('/'))
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Lera</h1>
                    <span class="subheading">Incentivo a leitura e escrita de narrativas!</span>
                </div>
            </div>
        </div>
    </div>
    @endif
</header>
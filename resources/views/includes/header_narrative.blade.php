<!-- Page Header -->
<header class="masthead narrativehead" style="background-image: url('{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}')">
    <div class="overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                        <small><strong>{{$narrative->kind->title}}</strong></small>
                    <h1>{{$narrative->title}}</h1>
                    <span class="subheading">{{$narrative->theme}}</span>
                    <small><strong>Criado por {{$narrative->user->alias}}</strong></small>
                    
                </div>
            </div>
        </div>
    </div>
</header>
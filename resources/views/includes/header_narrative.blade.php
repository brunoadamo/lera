<!-- Page Header -->
<header class="masthead" style="background-image: url('{{{ URL::asset('uploads/narrative/cover')}}}/{{$narrative->picture}}')">
    <div class="overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{$narrative->title}}</h1>
                    <span class="subheading">{{$narrative->theme}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
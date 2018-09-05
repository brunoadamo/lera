@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list post-list-home">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h3 class="mb-3">Colabore conosco!</h3>
                <div class="row">
                @forelse($narratives as $key => $narrative)
                    <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
                        <div class="card">   
                            <div class="row">                       
                                <div class="col-sm-10 mx-auto featured" style="background-image: url('{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}')"> </div>
                            </div>
                            <div class="card-body">
                                <small> <strong>{{$narrative->kind->title}}</strong> - {{$narrative->acts_count}} / {{$narrative->act_n}} Atos </small>
                                <p class="card-text"><a href="/narrative/{{$narrative->id}}">{{$narrative->title}}</a></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <p>Nenhuma narrativa cadastrada</p>
                        </div>
                    </div>
                @endforelse
                <div class="col-sm-12 mt-3 text-center">
                    <a href="/narratives" class="font-weight-light"><small><strong>Veja mais</strong></small></a>
                </div>
                </div>
            </div>

            <div class="col-sm-3 pt-3 pb-3 text-white bg-black">
                <h6 class="mb-4 text-center font-weight-light">Conheça algumas narrativas...</h5>
                <div class="list-group">
                    @forelse($narratives_full as $key => $narrative_full)
                    <a href="/narrative/{{$narrative_full->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <small class="mb-1">{{$narrative_full->title}}</small>
                        </div>
                    </a>
                    @empty
                        <div class="row">
                            <div class="col-sm-12 mx-auto">
                                <p>Nenhuma narrativa cadastrada</p>
                            </div>
                        </div>
                    @endforelse
                  
                </div>
                <div class="col-sm-12 mt-3 text-center">
                    <a href="/portfolio" class="btn btn-warning font-weight-light"><small><strong>Veja mais</strong></small></a>
                </div>
            </div>
        </div>
        <div class="clearfix mb-3"></div>

    </div>
</div>

<div class="about bg-primary">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 pt-5 pb-5">

                <h3>Conheça o Lera</h3>

                <div class="font-weight-light">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus dui a placerat mollis. In finibus vehicula sagittis. Nam molestie, leo vitae consequat lobortis, diam orci pretium mi, eu rutrum ante ipsum id eros. Integer at magna nibh. Curabitur ornare faucibus mi, ac laoreet ipsum posuere a. Fusce blandit est id velit accumsan vehicula. Sed non pretium enim. Pellentesque condimentum faucibus varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium magna nec risus malesuada tempor. Duis consectetur feugiat lorem, id dapibus quam elementum a. Nullam eget iaculis sem. Praesent ultrices eros nec nunc congue fermentum. Fusce blandit nec lectus et consectetur. Vivamus ornare tellus sit amet nibh viverra porttitor. Fusce eget eros molestie dui ultrices luctus.
                    </p>
                    <p>
                        Sed a mattis urna. Donec sollicitudin dolor sed ligula euismod, et accumsan ipsum commodo. Sed in lectus finibus, tincidunt velit eu, tincidunt magna. Morbi maximus est sed tellus commodo efficitur. Nullam eu libero hendrerit, ultricies dolor ac, egestas orci. In sit amet pellentesque mi. Praesent vestibulum laoreet nisi sit amet malesuada. Nunc vehicula porttitor augue, eu cursus mi ultrices a. Integer ut ullamcorper neque.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


@stop
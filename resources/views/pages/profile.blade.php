@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="profile-content">
    <div class="post-list">
        <div class="container">
            <div class="row">
                
                <div class="col-md-4">
                    <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="{{{ asset(@Auth::user()->folder  . '' . @Auth::user()->picture)}}}" alt="">
                    </a>
                </div>
                <div class="col-md-8">
                    <h2 class="cl-primary">{{Auth::user()->name}}</h2>
                    <small>{{Auth::user()->alias}}</small>
                    <p>Narrativas: </p>
                    <p>Colaborações: </p>
                </div>
                <div class="clearfix"></div>
               

                <div class="user-narratives">
                    <div class="col-sm-12 mx-auto">

                        <h3 class="text-center">{{ __('Minhas Narrativas') }} - <a href="{{ url('admin/narratives/create') }}">Criar narrativa</a></h3><br>


                        <div class="row">
                        @forelse($narratives as $key => $narrative)
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    
                                    <div class="card-body">
                                        <small> <strong>{{$narrative->kind->title}}</strong> - {{$narrative->acts_count}} / {{$narrative->act_n}} Atos </small>
                                        <p class="card-text"><a href="#">{{$narrative->title}}</a></p>
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
                        </div>
                            
                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
        
                    </div>
                </div>
                <div class="user-collaborative-narratives">
                    <div class="col-sm-12 mx-auto">

                        <h3 class="text-center">{{ __('Colaborações') }}</h3><br>


                        <div class="row">
                        @forelse($narratives as $key => $narrative)
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}" alt=""></a>
                                    <div class="card-body">
                                        <h5>
                                        <a href="#">{{$narrative->kind->title}}</a>
                                        </h5>
                                        <p class="card-text">{{$narrative->title}}</p>
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
                        </div>
                            
                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

@stop
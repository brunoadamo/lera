@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="profile-content">
    <div class="post-list">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 pb-5">
                    <div class="row">
                                   
                        <div class="col-md-4">
                            <a href="#">
                                <img class="img-fluid rounded mb-3 mb-md-0 img-thumbnail" src="{{{ asset(@Auth::user()->folder  . '' . @Auth::user()->picture)}}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h2 class="cl-primary">
                                {{Auth::user()->name}}
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm float-right font-weight-normal" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sair </a>

                                <a href="{{ url("/admin/users/" . Auth::user()->id . "/edit") }}" class="btn btn-info btn-sm float-right font-weight-normal mr-3"> Editar </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            
                            </h2>
                            <small>{{Auth::user()->alias}}</small>
                            <p>Narrativas: </p>
                            <p>Colaborações: </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>    
               

                <div class="user-narratives">
                    <div class="col-sm-12 mx-auto">

                        <h3 class="text-center">{{ __('Minhas Narrativas') }} - <a href="{{ url('admin/narratives/create') }}">Criar narrativa</a></h3><br>

                        <div class="row">
                        @forelse($narratives as $key => $narrative)
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    
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
                        </div>
        
                    </div>
                </div>
                <div class="user-collaborative-narratives">
                    <div class="col-sm-12 mx-auto">

                        <h3 class="text-center">{{ __('Colaborações') }}</h3><br>

                        <div class="row">
                        @forelse($colaborates as $key => $narrative)
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    
                                    <a href="/narrative/{{$narrative->id}}"><img class="card-img-top img-fluid" src="{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}" alt=""></a>
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
                        {{ $narratives->links() }}
                        <!-- Pagination -->
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

@stop
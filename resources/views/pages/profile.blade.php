@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="profile-content">
    <div class="post-list">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 pb-5">
                    <div class="row">
                                   
                        <div class="col-md-4 mx-auto">
                            <img class="img-fluid rounded mb-3 mb-md-0 img-thumbnail mx-auto d-block" src="{{{ asset(@Auth::user()->folder  . '' . @Auth::user()->picture)}}}" alt="">
                        </div>
                        <div class="col-md-5 text-center">
                            <h2 class="cl-primary">
                                {{Auth::user()->name}}
                                
                            
                            </h2>
                            <p><strong>Pseudônimo: </strong>{{Auth::user()->alias}}</p>
                            <p><strong>E-mail: </strong>{{Auth::user()->email}}</p>
                            <p><strong>Narrativas: </strong>{{count(Auth::user()->narratives)}}</p>
                            <p><strong>Colaborações: </strong>{{count(Auth::user()->acts)}}</p>
                        </div>
                        <div class="col-md-3 ">

                            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm font-weight-normal mx-auto d-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sair </a>

                            <a href="{{ url("/admin/users/" . Auth::user()->id . "/edit") }}" class="btn btn-info btn-sm font-weight-normal mt-3 mx-auto d-block"> Editar </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>    
               
                <div class="user-narratives col-sm-12 mx-auto">

                    <h3 class="text-center pb-4">{{ __('Minhas Narrativas') }}</h3>
                    
                    <div class="row">
                        <div class="col-sm-12 text-center center-block mx-auto pb-4">
                            <a href="{{ url('admin/narratives/create') }}" class="btn btn-warning ">Criar narrativa</a>
                        </div>
                    </div>
                    

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
                        <div class="col-sm-12 mx-auto text-center p-4">
                            <p>Nenhuma narrativa cadastrada</p>
                        </div>
                    @endforelse
                    </div>
        
                </div>
                <div class="user-collaborative-narratives col-sm-12 mx-auto">

                    <h3 class="text-center">{{ __('Colaborações') }}</h3><br>

                    <div class="row">
                    @forelse($colaborates as $key => $narrative)
                        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                            <div class="card h-100">
                                
                                <a href="/narrative/{{$narrative->id}}"><img class="card-img-top img-fluid" src="{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}" alt=""></a>
                                <div class="card-body">
                                    <h5>
                                    <a href="/narrative/{{$narrative->id}}">{{$narrative->title}}</a>
                                    </h5>
                                    <p class="card-text">{{$narrative->kind->title}}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-sm-12 mx-auto text-center p-4">
                            <p>Você ainda não colaborou com nenhuma narrativa =(</p>
                            <div class="row">
                                <div class="col-sm-12 text-center center-block mx-auto pb-4">
                                    <a href="{{ url('/narratives') }}" class="btn btn-warning ">Comece agora!</a>
                                </div>
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

<hr>

@stop
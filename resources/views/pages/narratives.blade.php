@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mx-auto">

                <h1 class="text-center">{{ __('Narrativas') }}</h1><br>

                @forelse($narratives as $key => $narrative)
                <div class="row">
                    <div class="col-sm-10 mx-auto featured" style="background-image: url('{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}')"> </div>
                    <div class="col-sm-10 mx-auto">
                        <div class="post-preview">
                            <a href="/narrative/{{$narrative->id}}">
                                <h2 class="post-title">
                                    {{$narrative->title}}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{$narrative->content}}
                                </h3>
                            </a>
                            <p class="post-meta"><strong>{{$narrative->kind->title}}</strong> - Criado por
                                <a href="#">{{$narrative->user->alias}}</a>
                                em {{$narrative->created_at->format('d/m/Y')}}
                            
                                <small><strong> | Colaboradores:</strong> </small>    
                                <small class="float-right"><strong>Comentários:</strong> {{ $narrative->comments_count }}</small>    
                            </p>
                            
                        </div>
                    </div>
                        
                </div>
                <hr>
                @empty
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <p>Nenhuma narrativa cadastrada</p>
                        </div>
                    </div>
                @endforelse
                
                <!-- Pager -->
                {{ $narratives->links() }}
                <!-- Pager -->
                
            </div>
        </div>
    </div>
</div>

<hr>

@stop
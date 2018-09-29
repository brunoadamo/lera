@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mx-auto">

                <h1 class="text-center">{{ __('Narrativas') }}</h1><br>

                <div class="col-sm-10 mx-auto">
                    <div class="row">
                        <div class="input-group mb-5">
                            <input type="text" class="form-control" placeholder="Utilize esse campo para pesquisar..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Pesquisar</button>
                            </div>
                        </div>
                    </div>    
                </div>

                @forelse($narratives as $key => $narrative)
                <div class="row">
                    <div class="col-sm-10 mx-auto featured" style="background-image: url('{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}')"> </div>
                    <div class="col-sm-10 mx-auto">
                        <div class="post-preview">
                            <a href="/narrative/{{$narrative->id}}">
                                <h2 class="post-title">
                                    {{$narrative->title}}
                                </h2>
                            </a>
                            <p class="post-meta"><strong>{{$narrative->kind->title}}</strong> - Criado por
                                <strong>{{$narrative->user->alias}}  </strong>
                                em {{$narrative->created_at->format('d/m/Y')}}
                                
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
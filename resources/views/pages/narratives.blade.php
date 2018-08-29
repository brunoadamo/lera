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
                    <div class="col-sm-10 mx-auto featured" style="background-image: url('{{{ URL::asset('image/banner/2.jpg')}}}')"> </div>
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
                            <p class="post-meta">Criado por
                                <a href="#">{{$narrative->alias}}</a>
                                em {{$narrative->created_at->format('d')}}/{{$narrative->created_at->format('m')}}/{{$narrative->created_at->format('Y')}}</p>
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
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

@stop
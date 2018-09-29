@extends('layouts.default_narrative')

@section('content')

@php ($colaborates = [])
@php ($colaborates_id = [])
@php ($user_id = 0)
<!-- Post Content -->
<article>
    <div class="narrative-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{{$narrative->content}}</p>

                    @foreach ($narrative->acts as $act)

                            <div class="card mb-4">
                                <div class="card-header">
                                    {{$act->order}} Ato
                                </div>
                                <div class="card-body">
                                    <p class="blockquote mb-0">
                                    <p>{!! $act->content !!}</p>
                                    <p class="blockquote-footer">Escrito por <cite title="{!! $act->user->alias !!}">{!! $act->user->alias !!}</cite></footer>
                                    </p>
                                </div>
                            </div>
                            @php ($colaborates[] =  $act->user->alias)
                            @php ($colaborates_id[] =  $act->user->id)

                    @endforeach

                    @if (Auth::check())
                        @php ($user_id = Auth::user()->id)
                        @if($user_id == $narrative->user->id)
                            @foreach ($colaborate->acts as $act)

                            <div class="card mb-2">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active btn-success" href="{{ url("admin/acts/{$act->id}/status/1") }}" data-method="PUT" data-token="{{ csrf_token() }}">Aprovar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url("admin/acts/{$act->id}/status/99") }}" data-method="PUT" data-token="{{ csrf_token() }}" class="nav-link">Rejeitar</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p>{!!$act->content!!}</p>
                                    <p class="blockquote-footer">Criado por <cite title="{{$act->user->alias}}">{{$act->user->alias}}</cite></p>
                                    </blockquote>
                                </div>
                            </div>
                            @php ($colaborates_id[] =  $act->user->id)

                            @endforeach
                        @endif
                        
                    
                    @endif        

                    @if(!in_array($user_id, $colaborates_id) && $user_id != $narrative->user->id)
                        <div class="row col-sm-12 mx-auto text-center mb-5 mt-5">
                            <a href="{{ url('narrative/'. $narrative->id . '/acts/create') }}" class="btn btn-warning mx-auto">Colabore com essa narrativa!</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</article>

@if($narrative->is_published)
<session>
    <div class="comments">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- Comments Form -->
                    <div class="card my-4">
                        <h3 class="card-header">Comentários:</h3>
                        <div class="card-body">
                            <form method="POST" action="/narrative/{{$narrative->id}}/comment" aria-label="{{ __('Comentário') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea id="content" name="content" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- Single Comment -->
                    @forelse($narrative->comments as $comment)

                    <div class="row">
                        <div class="col-sm-12 media mb-4 pb-4 border-bottom">
                            <div class="col-2 col-sm-1 user img-thumbnail" style="background-image: url({{{ asset(@$comment->user->folder  . '' . @$comment->user->picture)}}});">
                            </div>
                            <div class="col-10 col-sm-11">
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        {{ $comment->user->alias }}
                                        <small class="float-right">{{ $comment->created_at->format('d/m/Y')}}</small>

                                    </h5>
                                    {{ $comment->content }}
                                </div>
                                <div class="control-buttons pt-3">

                                    <a href="{{ url("/admin/comments/{$comment->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="Deseja excluir?" class="text-danger">Delete</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="media mb-4">
                        <div class="media-body">
                            Nenhum comentário até o momento...
                        </div>
                    </div>
                    

                </div>
            </div>
            @endif
        </div>
    </div>
</session>
@endforelse


@stop
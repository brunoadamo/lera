@extends('layouts.default_narrative')

@section('content')

@php ($colaborates = [])
@php ($colaborates_id = array())
@php ($user_id = 0)
@if (Auth::check())
    @php ($user_id = Auth::user()->id)
@endif

@foreach ($colaborate->acts as $act)
    @php ($colaborates_id[] = $act->user->id)
@endforeach
<!-- Post Content -->
<article>
    <div class="narrative-single">
        <div class="container">

            @if($user_id == $narrative->user->id)
                <div class="row ">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="row ">
                            <div class="col-sm-10 pb-2">
                            <h5>{{Auth::user()->alias}}! Você criou essa narrativa =)</h5>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url("/admin/narratives/" . $narrative->id . "/edit") }}" class="btn btn-info btn-sm float-right font-weight-normal mr-3"> Editar </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{!!$narrative->content!!}</p>
                    @php ($count_act = 1)
                    @foreach ($narrative->acts as $act)
                    @php ($count_act++)
                            <div class="card mb-4">
                                <div class="card-header">
                                    {{$count_act}}º Ato
                                </div>
                                <div class="card-body">
                                    <p class="blockquote mb-0">
                                    <p>{!! $act->content !!}</p>
                                    <p class="blockquote-footer">Escrito por <cite title="{!! $act->user->alias !!}">{!! $act->user->alias !!}</cite></footer>
                                    </p>
                                </div>
                            </div>
                            @php ($colaborates[] =  $act->user->alias)

                    @endforeach

                    @if (Auth::check())
                        @php ($user_id = Auth::user()->id)
                        @if($user_id == $narrative->user->id)
                            @foreach ($colaborate->acts as $act)
                            
                                @if($act->status == 0)
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
                                    
                                @endif

                            @endforeach
                        @else                
                        @foreach ($colaborate->acts as $act)
                            
                            @if($act->status == 0 && $user_id == $act->user->id)
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <ul class="nav nav-pills card-header-pills">
                                            <li class="nav-item">
                                               
                                                <a href="{{ url("/admin/acts/" .$act->id . "/edit/" . $narrative->id) }}" class="nav-link active btn-info"> Editar </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                        {!! $act->content !!}
                                        <p class="blockquote-footer">Criado por <cite title="{{$act->user->alias}}">{{$act->user->alias}}</cite></p>
                                        </blockquote>
                                    </div>
                                </div>
                                
                            @endif

                        @endforeach
                        @endif
                        
                    
                    @endif        
                    
                        

                        
                    @if(!in_array($user_id, $colaborates_id) && $user_id != $narrative->user->id && !$narrative->is_published)
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

            @if(Auth::check())
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
            @else
                <h4 class="text-center">Faça o login para comentar!</h4>
            @endif
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
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</session>
@endif


@stop
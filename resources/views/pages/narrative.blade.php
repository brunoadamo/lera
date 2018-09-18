@extends('layouts.default_narrative')

@section('content')

@php ($colaborates = [])
@php ($colaborates_id = [])
@php ($user_id = "")
@php if(Auth::guest()) $user_id = auth()->user()->id
<!-- Post Content -->
<article>
    <div class="narrative-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{{$narrative->content}}</p>

                    @foreach ($narrative->acts as $act)

                            <p>{!! $act->content !!}</p>
                            @php ($colaborates[] =  $act->user->alias)
                            @php ($colaborates_id[] =  $act->user->id)

                    @endforeach


                    @foreach ($colaborate->acts as $act)


                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active btn-success" href="#">Aprovar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Rejeitar</a>
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

                    @endforeach


                    @if(!in_array($user_id, $colaborates_id) && $user_id != $narrative->user->id)
                        <div class="row col-sm-12 mx-auto text-center mb-5 mt-5">
                            <a href="{{ url('narrative/'. $narrative->id . '/acts/create') }}" class="btn btn-warning mx-auto">Colabore com essa narrativa!</a>
                        </div>
                    @endif

                    <p><small>Criado por <strong>{{$narrative->user->alias}}</strong> </small></p>

                    @if(count($colaborates)>0)
                        <p><small>Colaboradores: <strong>{{ implode(', ', $colaborates) }}</strong></small></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</article>

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



@stop
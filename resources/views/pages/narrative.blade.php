@extends('layouts.default_narrative')

@section('content')
<!-- Post Content -->
<article>
    <div class="narrative-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{{$narrative->content}}</p>

                    <div class="row col-sm-12 mx-auto text-center mb-5 mt-5">
                        <a href="{{ url('admin/acts/create') }}" class="btn btn-warning mx-auto">Colabore com essa narrativa!</a>
                    </div>

                    <p><small>Criado por <strong>{{$narrative->user->alias}}</strong> </small></p>
                    <p><small>Colaboradores: <strong>{{$narrative->user->alias}}</strong> </small></p>
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
                        <h5 class="card-header">Comentários:</h5>
                        <div class="card-body">
                            <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Single Comment -->
                    @forelse($narrative->comments as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="{{{ asset(@$narrative->user->folder  . '' . @$narrative->user->picture)}}}" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->alias }}</h5>
                            {{ $comment->content }}
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
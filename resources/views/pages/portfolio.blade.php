@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mx-auto">

                <h1 class="text-center">{{ __('Portfólio') }}</h1><br>

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
                            
                                <small>|  <strong>{{ $narrative->acts_count }}</strong> Atos</small>    
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
                <div class="clearfix">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

@stop
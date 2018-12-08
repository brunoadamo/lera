@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list post-list-home">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-9 pt-3 pb-3">
                <h3 class="mb-3">COLABORE CONOSCO!</h3>
                <div class="row">
                @forelse($narratives as $key => $narrative)
                <a href="/narrative/{{$narrative->id}}">
                    <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item">
                        <div class="card">
                            <div class="col-sm-12 mx-auto featured" style="background-image: url('{{{ asset(@$narrative->folder  . '' . @$narrative->picture)}}}')"> </div>
                            <div class="card-body mx-auto text-center">
                                <p class="card-text"><a href="/narrative/{{$narrative->id}}">{{$narrative->title}}</a></p>
                                <small> <strong>{{$narrative->kind->title}}</strong> - {{$narrative->acts_count}} / {{$narrative->act_n}} Atos </small>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                    <div class="col-sm-12 mx-auto">
                        <a href="{{ url('admin/narratives/create') }}" class="btn btn-info ">Criar narrativa</a>
                        <p>Nenhuma narrativa cadastrada</p>
                    </div>
                @endforelse
                <div class="col-sm-12 mt-3">
                    <a href="/narratives" class="btn btn-warning font-weight-light"><small><strong>Veja mais</strong></small></a>
                </div>
                </div>
            </div>
            

            <div class="col-sm-12 col-lg-3 pt-3 pb-3 side-card">
                <h6 class="mb-2 text-left">Conheça algumas narrativas...</h6>
                <hr>
                <div class="list-group">
                    @forelse($narratives_full as $key => $narrative_full)


                    <a href="/narrative/{{$narrative_full->id}}" class="list-group-item list-group-item-action flex-column align-items-start p-1 pb-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{$narrative_full->title}}</h6>
                        </div>
                        <small>{{$narrative_full->kind->title}}</small>
                    </a>
                    @empty
                        <div class="row">
                            <div class="col-sm-12 mx-auto text-center">
                                <a href="{{ url('admin/narratives/create') }}" class="btn btn-info ">Criar narrativa</a>
                                <p>Nenhuma narrativa cadastrada</p>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="col-sm-12 mt-3 text-center">
                    <a href="/portfolio" class="btn btn-warning font-weight-light"><small><strong>Veja mais</strong></small></a>
                </div>
            </div>
        </div>
        <div class="clearfix mb-3"></div>

    </div>
</div>

<div class="about bg-light-grey" id="sobre">
    <div class="container">
        <div class="row">

            <div class="col-sm-10 mx-auto pt-5 pb-5">

                <h3>Conheça o Lera</h3>

                <div class="">
                    <p>
                        O LERA é parte do meu (Bruno de Araujo Adamo) projeto de Trabalho de Graduação 2018 do curso Análise e Desenvolvimento de Sistemas da Faculdade de Tecnologia de Indaiatuba (FATEC-ID) orientado pelo Profº Dr. Aldo Pontes. 
                    </p>
                    <p>
                        O objetivo do LERA é incentivar as práticas de leitura e escrita, por meio de narrativas colaborativas.
                        
                    </p>
                    <p>Foram utilizados conceitos chave como: a importância da leitura, inclusão social, escrita e cidadania, e redes colaborativas, que sustentam a pesquisa os quais são ancorados em práticas de pesquisas apresentadas em um conjunto de trabalhos relacionados.</p>
                    <p>Para conhecer mais sobre o trabalho clique <a href="">aqui</a></p>
                    <p>Nos ajude avaliando essa aplicação, sua opinião vale muito =)</p>

                    <a href="https://goo.gl/forms/VEIIpdGEoigrS03D2" class="btn btn-warning" target="_blank">Diga o que achou do LERA!</a>
                </div>
            </div>

        </div>
    </div>
</div>


@stop
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

                    
                    <small class="float-right">{{$narrative->acts_count + 1}} / {{$narrative->act_n}} Atos</small>
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
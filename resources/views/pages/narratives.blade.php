@extends('layouts.default')

@section('content')
<!-- Main Content -->
<div class="post-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mx-auto">

                <h1 class="text-center">{{ __('Narrativas') }}</h1><br>

                @include('includes._search')
                @include('includes._narratives')

                
                
            </div>
        </div>
    </div>
</div>

<hr>

@stop
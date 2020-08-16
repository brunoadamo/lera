@extends('layouts.default_narrative')

@section('content')
<!-- Post Content -->
<article>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p>{{$narrative->content}}</p>

        <p>Placeholder text by
            <a href="http://spaceipsum.com/">{{$narrative->user->name}}</a>. Photographs by
            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
        </div>
    </div>
    </div>
</article>

<session>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

            </div>
        </div>
    </div>
</session>



@stop
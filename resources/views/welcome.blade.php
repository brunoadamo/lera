<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- include toastr css/js-->
        <link href="{{{ asset('lib/toastr/toastr.min.css')}}}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
		<script src="{{{ asset('lib/template/startbootstrap-clean-blog/vendor/jquery/jquery.min.js')}}}"></script>
        <!-- include toastr css/js-->
        <script src="{{{ asset('lib/toastr/toastr.min.js')}}}"></script>
        {!! Toastr::render() !!}
        <script>
        @if($notification['message'])
        var type = "{{ $notification['alert-type'] }}";
        switch(type){
            case 'info':
                toastr.info("{{ $notification['message'] }}");
                break;
            
            case 'warning':
                toastr.warning("{{ $notification['message'] }}");
                break;
            case 'success':
                toastr.success("{{ $notification['message'] }}");
                break;
            case 'error':
                toastr.error("{{ $notification['message'] }}");
                break;
        }
        @endif
        </script>
    </body>
</html>
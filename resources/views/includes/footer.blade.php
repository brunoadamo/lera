<body>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="//twitter.com/brusnum">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="//facebook.com/brunoaraujoadamo">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="//github.com/brunoadamo">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Lera {{date('Y')}}</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{{ asset('lib/template/startbootstrap-clean-blog/vendor/jquery/jquery.min.js')}}}"></script>
<script src="{{{ asset('lib/template/startbootstrap-clean-blog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}}"></script>

<!-- include summernote css/js-->
<script src="{{{ asset('lib/summernote-master/dist/summernote-bs4.js')}}}"></script>
<script src="{{{ asset('lib/summernote-master/dist/lang/summernote-pt-BR.js')}}}"></script>

<!-- Custom scripts for this template -->
<script src="{{{ asset('lib/template/startbootstrap-clean-blog/js/clean-blog.min.js')}}}"></script>
<script>

    $(".summernote").summernote({
        lang: "pt-BR",
        toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
    ]
    });
</script>


</body>

</html>
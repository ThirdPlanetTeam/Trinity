<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <base href="{{ URL::to('/') }}/">
        <title>@yield('title', site_title())</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        {{ CSS::make() }}

        <script type='text/javascript'>
            curl = {
                baseUrl: 'js/',
                paths: {    
                    "jquery": "libs/jquery.js",
                    "css": "libs/curl/css.js",
                    "css!": "../css/",
                    "bootstrap": "libs/bootstrap.js"
                }
            };
        </script>
        {{ HTML::script('js/libs/curl.js') }}

    </head>
    <body>

    <div class="navbar-wrapper">


            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">{{ site_title() }}</a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav" role="navigation">
                            @include(Config::get('laravel-menu::views.bootstrap-items'), array('items' => $main->roots()))
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @include(Config::get('laravel-menu::views.bootstrap-items'), array('items' => $loginNav->roots()))
                        </ul>
                    </div>
                </div>
            </nav>

    </div>
    <div class="container">
     

        @if(Session::has('status'))
          <div class="alert alert-info">
            {{ Session::get('status') }}
          </div>
        @endif

        @if(Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        @endif

        @if(Session::has('error'))
          <div class="alert alert-warning">
            {{ Session::get('error') }}
          </div>
        @endif        

        @yield('content', $content)

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ JavaScript::make() }}

  </body>
</html>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><i class="fa fa-home"></i> Act44 - APP 60 min |</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( true || Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('books') && ! Request::is('books/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/books')}}">
                            <span class="fa fa-list" aria-hidden="true"></span>
                            Listado de libros
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('books/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/books/create')}}">
                            <span>&#10010;</span> Nuevo libro
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>

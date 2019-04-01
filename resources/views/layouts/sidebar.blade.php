<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @if(Auth::user()->user_type == 5)
                <li class="nav-item">
                    <a class="nav-link active" href="/home">
                        <i class="nav-icon icon-speedometer"></i> Inicio
                    </a>
                </li>
            @endif
            <li class="nav-title">Opciones</li>
            @if(Auth::user()->user_type == 10)

            <li class="nav-item">
                <a class="nav-link" href="{{ url('college') }}">
                    <i class="nav-icon icon-home"></i> Colegios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('course') }}">
                    <i class="nav-icon icon-people"></i> Cursos
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-user"></i> Usuarios</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('showadm') }}">
                            <i class="nav-icon icon-energy"></i> Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('showtutor') }}">
                            <i class="nav-icon icon-flag"></i> Tutores</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('suggestion.index') }}">
                    <i class="nav-icon icon-envelope-letter"></i> Sugerencias
                </a>
            </li>
            @endif
            @if(Auth::user()->user_type == 5)
                <li class="nav-item">
                <a class="nav-link" href="{{ url('measurement') }}">
                    <i class="nav-icon icon-chart"></i> Mediciones
                </a>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-game-controller"></i> IDPS</a>
                    <ul class="nav-dropdown-items">
                        @foreach(Auth::user()->college->courses as $course)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('timeline',$course->id) }}">
                                <i class="nav-icon icon-graduation"></i> {{$course->level." ".$course->letter}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('download') }}">
                        <i class="nav-icon icon-notebook"></i> Descargas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('tutorials') }}">
                        <i class="nav-icon icon-social-youtube"></i> Videotutoriales
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('createsug') }}">
                        <i class="nav-icon icon-envelope-letter"></i> Enviar Sugerencia
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
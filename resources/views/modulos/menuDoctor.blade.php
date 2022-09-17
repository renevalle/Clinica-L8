<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('Inicio') }}">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="{{ url('Citas/'.auth()->user()->id) }}">
                <i class="fa fa-calendar-check-o"></i>
                <span>Citas</span>
                </a>
            </li>

            <li>
                <a href="{{ url('Pacientes') }}">
                <i class="fa fa-users"></i>
                <span>Pacientes</span>
                </a>
            </li>

        </ul>
    </section>

</aside>
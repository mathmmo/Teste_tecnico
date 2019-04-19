<nav id="navbar-left-screen">
    <ul class="sidebar-menu">
        <li><i class="fas fa-user-astronaut"></i></li>
        <li><h3 class="user-name">{{ Auth::user()->name }}</h3></li>
        @can('isAdmin')
        <li><a href="{{ route('refund.pending')}}">
            <h3>Reembolsos Pendentes</h3>
        </a></li>
        <li><a href="{{ route('refund.aproved')}}">
            <h3>Histórico</h3>
        </a></li>
        @endcan
        @can('isUser')
        <li><a href="{{ route('type.index')}}">
            <h3>Tipos de Despesa</h3>
        </a></li>
        <li><a href="{{ route('refund.index')}}">
            <h3>Requisições de Reembolso</h3>
        </a></li>
        @endcan
    </ul>
</nav>
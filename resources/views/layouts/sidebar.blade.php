<nav id="navbar-left-screen">
    <ul class="sidebar-menu">
        <li><i class="fas fa-user-astronaut"></i></li>
        <li><h3 class="user-name">{{ Auth::user()->name }}</h3></li>
        <!-- Routes for admins -->
        @can('isAdmin')        
            <li class="@if(Route::is('refund.pending')){{ 'active' }}@endif"><a href="{{ route('refund.pending')}}">
                <h3>Reembolsos Pendentes</h3>
            </a></li>
            <li class="@if(Route::is('refund.aproved')){{ 'active' }}@endif"><a href="{{ route('refund.aproved')}}">
                <h3>Histórico</h3>
            </a></li>
        @endcan
        <!-- Routes for Users -->
        @can('isUser')
            <li class="@if(Route::is('type.index')){{ 'active' }}@endif"><a href="{{ route('type.index') }}">
                <h3>Tipos de Despesa</h3>
            </a></li>
            <li class="@if(Route::is('refund.index')){{ 'active' }}@endif"><a href="{{ route('refund.index')}}">
                <h3>Requisições de Reembolso</h3>
            </a></li>
        @endcan
    </ul>
</nav>
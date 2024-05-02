@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-white ps bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="/img/foto_menu.png" alt="Escudo" width="100%">
           <!-- <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">-->
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>
            @if(auth()->user()->administrador =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Funcionarios' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-management') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Funcionarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Oficinas' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Oficinas</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->generador =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Informes' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('billing') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Generar Documento</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->revisor =="true" || auth()->user()->finalizador =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Revisar Informe' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('revisar_informe') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">archive</i>
                    </div>
                    <span class="nav-link-text ms-1">Revisar Documento</span> 
                </a>
                <!---->
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Observaciones' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('informes_observados') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">Observaciones</span>
                </a>
            </li>
            @if(auth()->user()->finalizador =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Informes Terminados' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('ver_informe_terminado') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                    <style>
                        .material-symbols-outlined {
                        font-variation-settings:
                        'FILL' 0,
                        'wght' 300,
                        'GRAD' 0,
                        'opsz' 48
                        }
                    </style>
                        <i class="material-symbols-outlined">inventory</i>
                    </div>
                    <span class="nav-link-text ms-1">Informes Finalizados</span>
                </a>
            </li>            
            @endif
            <!--<li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'notifications' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('notifications') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>-->
            @if(auth()->user()->generador =="true" || auth()->user()->revisor =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Seguimiento' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('seguimiento_tramites') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">merge_type</i>
                    </div>
                    <span class="nav-link-text ms-1">Seguimiento de mis tramites</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->supervisor =="true")
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'Historial Tramites' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('historial_tramites') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">timeline</i>
                    </div>
                    <span class="nav-link-text ms-1">Historial de Tramites</span>
                </a>
            </li>
            @endif

        </ul>
        
    </div>
</aside>

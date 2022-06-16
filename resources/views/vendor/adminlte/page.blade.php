@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                
                <!-- <span class="logo-mini"><img src="{!! config('adminlte.logo_mini', '<b>A</b>LT') !!} alt="" class="img-responsive logo"></span> -->


                <span class="logo-mini">
                    <img src="{{url('assets/img/logo_mini.jpg')}}" style="width:40px; height:40px; position:absolute; top:5px; left:5px">
               </span>


                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @if (Auth::user()->assignment_id == 4)  <!-- Função Estudante -->
                            <li class="dropdown notifications-menu">
                                <a href="#participar_turma" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" data-toggle="modal">
                                    <i class="fa fa-trophy"></i>
                                    <span class="label label-warning">2</span>
                                </a>
                            </li>
                        @endif
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                        @if(count_new_messages('A', Auth::user()->id) != 0)
                                            <span class="label label-warning">{{ count_new_messages('A', Auth::user()->id) }}</span>
                                        @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Atenção !</li>
                                    <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="{{route('messages.index')}}">
                                                <i class="fa fa-envelope-o text-aqua"></i> Novas Mensagens: {{ count_new_messages('A', Auth::user()->id) }}
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                            </li>
                    {{--    @endcan    --}}

                        <li>
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> Sair
                                </a>
                            @else
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                        <img src="{{url('assets/uploads/avatars', Auth::user()->avatar)}}"  style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                        
                                <ul class="dropdown-menu dropdown-usermenu pull-right">

                                    <li>
                                         <a href="#profile" data-toggle="modal">
                                            Editar Perfil
                                        </a>
                                    </li>

                                <!--    <li>
                                        <a href="#redefinir_senha" data-toggle="modal">
                                            Redefinir senha 
                                        </a>
                                    </li>   -->

                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        > Sair
                                        </a>
                                    </li>

                                </ul>
                               
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>


                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Main content -->
            <section class="content">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h4 class="box-title"><b>{{$title}}</b></h4>
                    </div>
                    <div class="box-body">
                         @include ('messages.messages')
                        <div class="">
                            @yield('content')
                        </div>
                    </div>
                </div>


            </section>
            <!-- /.content -->
            
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->


    @include ('painel.administrador.users.modals.profile.modal_profile')
    <!-- @include ('painel.administrador.users.modals.redefinir_senha.modal_redefinir_senha') -->
    @include ('painel.administrador.users.modals.participar_turma.modal_participar_turma')
        
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop



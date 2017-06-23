<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-user-md"></i> <span>Control Dental</span> </a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ asset("images/user.png") }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span> Seja bem vindo,</span>
                <h2>{{Auth::user()->nome()}}</h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>. . . . . . . . . . . . . . . . . . . . . . . . . . . </h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('/') }}"><i class="fa fa-desktop"></i>Painel de controle</a></li>
                    {{--<li><a><i class="fa fa-print"></i>Impressos <span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu" style="display: none">--}}
                            {{--@role('profissional')--}}
                            {{--<li><a href="{{ route('documentos.create') }}">Cadastrar Impresso</a></li>--}}
                            {{--@endrole--}}
                            {{--<li><a href="{{ route('documentos.index') }}">Visualizar Impressos</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-key"></i>Segurança</a></li>--}}
                    <li><a><i class="fa fa-user"></i>Pacientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            @role(['profissional','equipe'])
                                <li><a href="{{ route('pacientes.create') }}">Cadastrar pacientes</a></li>
                            @endrole
                            <li><a href="{{ route('pacientes.index') }}">Visualizar pacientes</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('agenda') }}"><i class="fa fa-table"></i> Agenda</a>
                    </li>
                    @role('profissional')
                        {{--<li><a><i class="fa fa-money"></i> Financeiro <span class="label label-danger pull-right">Incompleto</span></a>--}}
                            {{--<ul class="nav child_menu" style="display: none">--}}
                                {{--<li><a href="{{ url('recebimentos') }}">Recebimentos</a></li>--}}
                                {{--<li><a href="{{ url('recibos') }}">Controle de recibo</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <li><a><i class="fa fa-cog"></i> Ajustes <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li><a href="{{ url('intervencoes') }}">Intervenções</a></li>
                                <li><a href="{{ url('planos') }}">Planos</a></li>
                                <li><a href="{{ url('caixas') }}">Caixas</a></li>
                                <li><a href="{{ url('anamneses') }}">Anamnese</a></li>
                                <li><a href="{{ route('usuarios.index') }}">Equipe</a></li>
                                <li><a href="{{ route('backups.index') }}">Backup</a></li>
                            </ul>
                        </li>
                    <li><a><i class="fa fa-print"></i>Impressões <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="#">Logo</a></li>
                            <li><a href="#">PDF's</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i>Financeiro <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{route('recebimentos')}}"> Recebimentos</a>
                        </ul>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        {{--<div class="sidebar-footer hidden-small">--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Conta">--}}
                {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Sair">--}}
                {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{ asset("images/user.png") }}" alt="">{{Auth::user()->nome()}}
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="{{ route('usuarios.edit',Auth::user()->idusers) }}"> Perfil</a></li>
                        <li><a href="{{ url('clinica') }}"><span>Clínica</span></a></li>
                        <li><a href="{{ url('logout') }}"> <span class="badge bg-red pull-right"><i
                            class="fa fa-sign-out pull-right"></i></span>Sair</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                        <li>
                            <a>
                                <span class="image">
                                <img src="{{asset('images/img.jpg')}}" alt="Profile Image"/>
                                </span>
                                <span>
                                <span>John Smith</span>
                                <span class="time">21/09/2016</span>
                                </span>
                                <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong><a href="inbox.html">Ver todos os alertas</a></strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
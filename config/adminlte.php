<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'HACKTOWN',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => 'Menu principal',

    'logo_mini' => '',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => '', /*'register' */

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        //MENU HOME
        [
            'text'    => 'In??cio',
            'icon'    => 'home',
            'url'  => 'home',
        ],

        //MENU ADMINISTRADOR
        [
            'text'    => 'Administrador',
            'icon'    => 'cog',
            'icon_color' => 'yellow',
            'submenu' => [
                [
                    'text' => 'Configura????es',
                    'icon'    => '',
                    'submenu' => [
                        [
                            'text' => 'Par??metros',
                            'url'  => '#',
                            'icon' => '',
                            'can'  => 'administrador_configuracoes_parametros'
                        ],
                        [
                            'text' => 'Acessos',
                            'url'  => 'accesses',
                            'icon' => '',
                            'can'  => 'administrador_configuracoes_acessos'
                        ],
                        [
                            'text' => 'Logs',
                            'url'  => 'logs',
                            'icon' => '',
                            'can'  => 'administrador_configuracoes_logs'
                        ]
                    ],
                    'can'  => 'administrador_configuracoes'
                ],
                [
                    'text' => 'Usu??rios',
                    'url'  => 'users',
                    'icon'    => '',
                    'can'  => 'administrador_usuarios'
                ],
                [
                    'text' => 'Perfis',
                    'url'  => 'roles',
                    'icon'    => '',
                    'can'  => 'administrador_perfis'
                ],
                [
                    'text' => 'Permiss??es',
                    'url'  => 'permissions',
                    'icon'    => '',
                    'can'  => 'administrador_permissoes'
                ],
            ],
            'can'   => 'administrador'
        ],

        //MENU CADASTROS
        [
            'text'    => 'Cadastros',
            'icon'    => 'edit',
            'icon_color' => 'yellow',
            'submenu' => [
                [
                    'text' => '??reas Conhecimento',
                    'url'  => 'areas',
                    'icon'    => '',
                    'can'  => 'cadastros_areas'
                ],
                [
                    'text' => 'Fun????es',
                    'url'  => 'assignments',
                    'icon'    => '',
                    'can'  => 'cadastros_funcoes'
                ],
                [
                    'text' => 'Institui????es',
                    'url'  => 'institutes',
                    'icon'    => '',
                    'can'  => 'cadastros_instituicoes'
                ],
                [
                    'text' => 'Cursos',
                    'url'  => 'courses',
                    'icon'    => '',
                    'can'  => 'cadastros_cursos'
                ],
                [
                    'text' => 'Turmas',
                    'url'  => 'teams',
                    'icon'    => '',
                    'can'  => 'cadastros_turmas'
                ],

            ],
            'can'   => 'cadastros'
        ],

        //#### MENUS EXCLUSIVOS DO ALUNO
        //MENU MINHAS CONQUISTAS
        [
            'text'    => 'Minhas conquistas',
            'icon'    => 'trophy',
            'url'  => '#',
            'can'  => 'modulo_aluno',
        ],
        //MENU MEUS DADOS
        [
            'text'    => 'Meus dados',
            'icon'    => 'user',
            'url'  => 'meusDados',
            'can'  => 'modulo_aluno',
        ],
        //MENU MINHAS TURMAS
        [
            'text'    => 'Minhas turmas',
            'icon'    => 'graduation-cap',
            'url'  => 'home',
            'can'  => 'modulo_aluno',

        ],
        //MENU PR??XIMOS EVENTOS
        [
            'text'    => 'Pr??ximos eventos',
            'icon'    => 'calendar',
            'url'  => '#',
            'can'  => 'modulo_aluno',
        ],
        //MENU NOTIFICA????ES
        [
            'text'    => 'Notifica????es',
            'icon'    => 'commenting',
            'url'  => 'messages',
            'can'  => 'modulo_aluno',
        ],
        //MENU AJUDA
        [
            'text'    => 'Ajuda',
            'icon'    => 'exclamation-circle',
            'url'  => '#',
            'can'  => 'modulo_aluno',
        ],
        //MENU BAIXAR
        [
            'text'    => 'Baixar uana',
            'icon'    => 'download',
            'url'  => '#',
            'can'  => 'modulo_aluno',
        ],
        //CHAT
        [
            'text'    => 'Conversas',
            'icon'    => 'commenting',
            'url'  => 'conversas',
            'can'  => 'modulo_aluno',

        ],
        //#### MENUS EXCLUSIVOS DO PROFESSOR


        //MENU SAIR
        [
            'text'    => 'Sair',
            'icon'    => 'power-off',
            'url'  => 'logout',
        ],

    ],


    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => false,
        'select2'    => true,
    ],


    //COR DOS BOT??ES DO SISTEMA
    'botaoCadastrar'    => 'btn-primary',
    'botaoAlterar'      => 'btn-primary', //'btn-success',
    'botaoExcluir'      => 'btn-primary', //'btn-danger',
    'botaoPesquisar'    => 'btn-primary', //'btn-info',
    'botaoImprimir'     => 'btn-primary', //'btn-warning',


];
<?php

Auth::routes();
Route::get('/conversa', function () {
	return view('converses.converses');
});
Route::group(['middleware' => ['auth'], 'namespace' => 'admin'], function () {
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::get('home', '\App\Http\Controllers\Admin\AdminController@index');

	Route::get('/', '\App\Http\Controllers\Admin\AdminController@index')->name('home');
	Route::get('qrcode', function () {
		return QrCode::size(200)->generate('https://mrdsoft.net/');
	});
	//-- MENSAGENS-------------------------------------------------------
	Route::resource('messages', '\App\Http\Controllers\Admin\MessageController', ['only' => ['index', 'store']]);
	Route::any('messages_search', '\App\Http\Controllers\Admin\MessageController@messages_search')->name('messages.search');
	Route::put('messages_lerMensagem/{id}', '\App\Http\Controllers\Admin\MessageController@messages_lerMensagem')->name('messages.lerMensagem');
	Route::post('messages_responderMensagem', '\App\Http\Controllers\Admin\MessageController@messages_responderMensagem')->name('messages.responderMensagem');
	//-- USUÁRIOS -----------------------------------------------------
	Route::post('users_profile/{id}', 'UserController@users_profile')->name('users.profile');
	Route::put('users_password/{id}', 'UserController@users_password')->name('users.password');

	Route::get('meusDados', 'UserController@meusDados');
	Route::any('dadosUpdate', 'UserController@dadosUpdate')->name('users.dadosUpdate');

	Route::put('team_user', 'TeamController@team_user')->name('users.team_user');
	Route::any('alunos_index/{team_id}', 'TeamController@alunos_index')->name('alunos.index');

	######################################################################################
	##                          TELA DE POSTAGENS                                       ##
	######################################################################################
	Route::any('index/{team_id}', 'PostController@index')->name('posts.index');
	Route::resource('posts', 'PostController', ['only' => ['store', 'update', 'destroy']]);
	Route::any('like/{team_id}/{post_id}', 'PostController@like')->name('posts.like');
	Route::any('comment/{post_id}', 'PostController@comment')->name('posts.comment');

	######################################################################################
	##                          TELA DE TURMAS                                          ##
	######################################################################################
	Route::resource('teams', 'TeamController', ['only' => ['index', 'store', 'update', 'destroy']]);
	Route::any('teams_search', 'TeamController@teams_search')->name('teams.search');
	Route::post('teams_pdf', 'TeamController@teams_pdf')->name('teams.pdf');

	/*=====================================================================
                    MÓDULO ADMINISTRADOR
======================================================================*/
	Route::group(['middleware' => 'administrador'], function () {
		######################################################################################
		##                       TELA DE USUÁRIOS DO SISTEMA                                ##
		######################################################################################
		Route::resource('users', 'UserController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('users_search', 'UserController@users_search')->name('users.search');
		Route::post('users_pdf', 'UserController@users_pdf')->name('users.pdf');
		Route::any('users_signature/{id}', 'UserController@users_signature')->name('users.signature');
		######################################################################################
		##                            TELA DE PERFIS                                        ##
		######################################################################################
		Route::resource('roles', 'RoleController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('roles_search', 'RoleController@roles_search')->name('roles.search');
		Route::post('roles_pdf', 'RoleController@roles_pdf')->name('roles.pdf');
		######################################################################################
		##                            TELA DE PERMISSÕES                                    ##
		######################################################################################
		Route::resource('permissions', 'PermissionController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('permissions_search', 'PermissionController@permissions_search')->name('permissions.search');
		Route::post('permissions_pdf', 'PermissionController@permissions_pdf')->name('permissions.pdf');
		######################################################################################
		##                         TELA DE ACESSOS AO SISTEMA                               ##
		######################################################################################
		Route::resource('accesses', 'AccessController', ['only' => ['index']]);
		Route::any('accesses_search', 'AccessController@accesses_search')->name('accesses.search');
		Route::post('accesses_pdf', 'AccessController@accesses_pdf')->name('accesses.pdf');
		######################################################################################
		##                           TELA DE LOGS DO SISTEMA                                ##
		######################################################################################
		Route::resource('logs', 'LogController', ['only' => ['index']]);
		Route::any('logs_search', 'LogController@logs_search')->name('logs.search');
		Route::post('logs_pdf', 'LogController@logs_pdf')->name('logs.pdf');
	});

	/*=====================================================================
                    MÓDULO CADASTROS
======================================================================*/
	Route::group(['middleware' => 'cadastros'], function () {
		######################################################################################
		##                          TELA DE FUNÇÕES                                         ##
		######################################################################################
		Route::resource('assignments', 'AssignmentController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('assignments_search', 'AssignmentController@assignments_search')->name('assignments.search');
		Route::post('assignments_pdf', 'AssignmentController@assignments_pdf')->name('assignments.pdf');
		######################################################################################
		##                          TELA DE INSTITUTOS                                      ##
		######################################################################################
		Route::resource('institutes', 'InstituteController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('institutes_search', 'InstituteController@institutes_search')->name('institutes.search');
		Route::post('institutes_pdf', 'InstituteController@institutes_pdf')->name('institutes.pdf');
		######################################################################################
		##                          TELA DE CURSOS                                          ##
		######################################################################################
		Route::resource('courses', 'CourseController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('courses_search', 'CourseController@courses_search')->name('courses.search');
		Route::post('courses_pdf', 'CourseController@courses_pdf')->name('courses.pdf');
		######################################################################################
		##                          TELA DE ÁREAS DE CONHECIMENTO                           ##
		######################################################################################
		Route::resource('areas', 'AreaController', ['only' => ['index', 'store', 'update', 'destroy']]);
		Route::any('areas_search', 'AreaController@areas_search')->name('areas.search');
		Route::post('areas_pdf', 'AreaController@areas_pdf')->name('areas.pdf');
	});
});

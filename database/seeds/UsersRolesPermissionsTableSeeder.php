<?php

use Illuminate\Database\Seeder;

class UsersRolesPermissionsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('permission_role')->insert([
/*---------------------------------------------------------------------
                MENU ADMINISTRADOR
----------------------------------------------------------------------*/
            [
                'permission_id' => 1,  //administrador
                'role_id' => 1,
            ],
            //---- Módulo configurações do Sistema ------------------//
            [
                'permission_id' => 2,  //administrador_configuracoes
                'role_id' => 1,
            ],
            [
                'permission_id' => 3,  //administrador_configuracoes_parametros
                'role_id' => 1,
            ],
            [
                'permission_id' => 4,  //administrador_configuracoes_acessos
                'role_id' => 1,
            ],
            [
                'permission_id' => 5,  //administrador_configuracoes_logs
                'role_id' => 1,
            ],
            //---- Módulo Usuários (users) --------------------------//
            [
                'permission_id' => 6,  //administrador_usuarios
                'role_id' => 1,
            ],
            [
                'permission_id' => 7,  //administrador_usuarios_cadastrar
                'role_id' => 1,
            ],
            [
                'permission_id' => 8,  //administrador_usuarios_imprimir
                'role_id' => 1,
            ],
            [
                'permission_id' => 9,  //administrador_usuarios_alterar
                'role_id' => 1,
            ],
            [
                'permission_id' => 10,  //administrador_usuarios_excluir
                'role_id' => 1,
            ],
            [
                'permission_id' => 11,  //administrador_usuarios_senha
                'role_id' => 1,
            ],
            //---- Módulo Perfis (roles) ---------------------------//
            [
                'permission_id' => 12,  //administrador_perfis
                'role_id' => 1,
            ],
            [
                'permission_id' => 13,  //administrador_perfis_cadastrar
                'role_id' => 1,
            ],
            [
                'permission_id' => 14,  //administrador_perfis_imprimir
                'role_id' => 1,
            ],
            [
                'permission_id' => 15,  //administrador_perfis_alterar
                'role_id' => 1,
            ],
            [
                'permission_id' => 16,  //administrador_perfis_excluir
                'role_id' => 1,
            ],
            //---- Módulo Permissões (permissions) -----------------//
            [
                'permission_id' => 17,  //administrador_permissoes
                'role_id' => 1,
            ],
            [
                'permission_id' => 18,  //administrador_permissoes_cadastrar
                'role_id' => 1,
            ],
            [
                'permission_id' => 19,  //administrador_permissoes_imprimir
                'role_id' => 1,
            ],
            [
                'permission_id' => 20,  //administrador_permissoes_alterar
                'role_id' => 1,
            ],
            [
                'permission_id' => 21,  //administrador_permissoes_excluir
                'role_id' => 1,
            ],
/*---------------------------------------------------------------------
                MENU CADASTROS
----------------------------------------------------------------------*/
            [
                'permission_id' => 22,  //cadastros
                'role_id' => 2,
            ],
            //---- Módulo Funções (assignments) --------------------//
            [
                'permission_id' => 23,  //cadastros_funcoes
                'role_id' => 2,
            ],
            [
                'permission_id' => 24,  //cadastros_funcoes_cadastrar
                'role_id' => 2,
            ],
            [
                'permission_id' => 25,  //cadastros_funcoes_imprimir
                'role_id' => 2,
            ],
            [
                'permission_id' => 26,  //cadastros_funcoes_alterar
                'role_id' => 2,
            ],
            [
                'permission_id' => 27,  //cadastros_funcoes_excluir
                'role_id' => 2,
            ],
            //---- Módulo Instituições (institutes) --------------------//
            [
                'permission_id' => 28,  //cadastros_instituicoes
                'role_id' => 2,
            ],
            [
                'permission_id' => 29,  //cadastros_instituicoes_cadastrar
                'role_id' => 2,
            ],
            [
                'permission_id' => 30,  //cadastros_instituicoes_imprimir
                'role_id' => 2,
            ],
            [
                'permission_id' => 31,  //cadastros_instituicoes_alterar
                'role_id' => 2,
            ],
            [
                'permission_id' => 32,  //cadastros_instituicoes_excluir
                'role_id' => 2,
            ],
             //---- Módulo Cursos (courses) --------------------//
            [
                'permission_id' => 33,  //cadastros_cursos
                'role_id' => 2,
            ],
            [
                'permission_id' => 34,  //cadastros_cursos_cadastrar
                'role_id' => 2,
            ],
            [
                'permission_id' => 35,  //cadastros_cursos_imprimir
                'role_id' => 2,
            ],
            [
                'permission_id' => 36,  //cadastros_cursos_alterar
                'role_id' => 2,
            ],
            [
                'permission_id' => 37,  //cadastros_cursos_excluir
                'role_id' => 2,
            ],
             //---- Módulo Turmas (teams) --------------------//
            [
                'permission_id' => 38,  //cadastros_turmas
                'role_id' => 2,
            ],
            [
                'permission_id' => 39,  //cadastros_turmas_cadastrar
                'role_id' => 2,
            ],
            [
                'permission_id' => 40,  //cadastros_turmas_imprimir
                'role_id' => 2,
            ],
            [
                'permission_id' => 41,  //cadastros_turmas_alterar
                'role_id' => 2,
            ],
            [
                'permission_id' => 42,  //cadastros_turmas_excluir
                'role_id' => 2,
            ],
             //---- Módulo Áreas de Conhecimento (areas) --------------------//
            [
                'permission_id' => 43,  //cadastros_areas
                'role_id' => 2,
            ],
            [
                'permission_id' => 44,  //cadastros_areas_cadastrar
                'role_id' => 2,
            ],
            [
                'permission_id' => 45,  //cadastros_areas_imprimir
                'role_id' => 2,
            ],
            [
                'permission_id' => 46,  //cadastros_areas_alterar
                'role_id' => 2,
            ],
            [
                'permission_id' => 47,  //cadastros_areas_excluir
                'role_id' => 2,
            ],            
            //---- Módulo Professor --------------------//
            [
                'permission_id' => 48,  //modulo_professor
                'role_id' => 3,
            ],

            //---- Módulo Aluno --------------------//
            [
                'permission_id' => 49,  //modulo_aluno
                'role_id' => 4,
            ],
  

        ]);

        DB::table('role_user')->insert([
            [
                'role_id' => 1,  //Perfil Administrador
                'user_id' => 1,  //Usuário 
            ],
            [
                'role_id' => 2,  //Perfil Cadastros
                'user_id' => 1,  //Usuário    
            ],
            [
                'role_id' => 3,  //Perfil Professor
                'user_id' => 2,  //Professor 1    
            ],
            [
                'role_id' => 4,  //Perfil Aluno
                'user_id' => 4,  //Aluno 1    
            ],

        ]);

    }
}



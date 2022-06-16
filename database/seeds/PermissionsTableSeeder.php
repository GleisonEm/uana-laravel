<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([

/*---------------------------------------------------------------------
                MENU ADMINISTRADOR
----------------------------------------------------------------------*/
            [
                'name' => 'administrador',
                'description' => 'Ativar menu da administração',      //1
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',    
            ],
            //---- Módulo configurações do Sistema -------------------//
            [
                'name' => 'administrador_configuracoes',
                'description' => 'Ativar menu de configurações do sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_configuracoes_parametros',
                'description' => 'Ativar menu de parâmetros do sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_configuracoes_acessos',
                'description' => 'Ativar menu de acessos ao Sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_configuracoes_logs',
                'description' => 'Ativar menu de logs do sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],

            //---- Módulo Usuários (users) ---------------------------//
            [
                'name' => 'administrador_usuarios',
                'description' => 'Ativar menu de usuários',            //6
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_usuarios_cadastrar',
                'description' => 'Habilitar/Desabilitar botão de cadastro de usuário',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_usuarios_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de usuários',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_usuarios_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de usuário',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_usuarios_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de usuário',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            [
                'name' => 'administrador_usuarios_senha',
                'description' => 'Habilitar/Desabilitar o botão de redefinição de senha do usuário',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),            
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            //---- Módulo Perfis (roles) ------------------------------//
            [
                'name' => 'administrador_perfis',
                'description' => 'Ativar menu de perfis',            //12
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_perfis_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de perfil',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_perfis_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de perfis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_perfis_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de perfil',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_perfis_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de perfil',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),                    
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            //---- Módulo Permissões (permissions) ---------------------//
            [
                'name' => 'administrador_permissoes',
                'description' => 'Ativar menu de permissões',           //17
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_permissoes_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de permissão',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_permissoes_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de permissões',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            [
                'name' => 'administrador_permissoes_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de permissão',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'administrador_permissoes_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de permissão',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],

/*---------------------------------------------------------------------
                MENU CADASTROS
----------------------------------------------------------------------*/
            [
                'name' => 'cadastros',
                'description' => 'Ativar menu de cadastros',        //22
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                
            ],

            //---- Módulo funções (assignments) -----------------------//
            [
                'name' => 'cadastros_funcoes',
                'description' => 'Ativar menu de funções',            //23
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_funcoes_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de função',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_funcoes_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de funções',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_funcoes_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de função',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_funcoes_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de função',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            //---- Módulo instituição (institutes) -----------------------//
            [
                'name' => 'cadastros_instituicoes',
                'description' => 'Ativar menu de instituicões',            //28
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_instituicoes_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de instituição',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_instituicoes_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de instituicões',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_instituicoes_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de instituição',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_instituicoes_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de instituição',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            //---- Módulo cursos (courses) -----------------------//
            [
                'name' => 'cadastros_cursos',
                'description' => 'Ativar menu de cursos',            //33
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_cursos_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de curso',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_cursos_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de cursos',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_cursos_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de curso',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_cursos_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de curso',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            //---- Módulo turmas (teams) -----------------------//
            [
                'name' => 'cadastros_turmas',
                'description' => 'Ativar menu de turmas',            //38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_turmas_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de turma',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_turmas_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão de turmas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_turmas_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de turma',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_turmas_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de turma',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],
            //---- Módulo área de conhecimento (areas) -----------------------//
            [
                'name' => 'cadastros_areas',
                'description' => 'Ativar menu de áreas de conhecimento',            //43
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_areas_cadastrar',
                'description' => 'Habilitar/Desabilitar o botão de cadastro de área de conhecimento',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_areas_imprimir',
                'description' => 'Habilitar/Desabilitar botão de impressão áreas de conhecimento',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_areas_alterar',
                'description' => 'Habilitar/Desabilitar o botão de alteração de área de conhecimento',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',
            ],
            [
                'name' => 'cadastros_areas_excluir',
                'description' => 'Habilitar/Desabilitar o botão de exclusão de área de conhecimento',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        
            ],            
/*---------------------------------------------------------------------
                MÓDULO PROFESSOR
----------------------------------------------------------------------*/
            [
                'name' => 'modulo_professor',
                'description' => 'Ativar menu do Professor',        //48
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                
            ],
/*---------------------------------------------------------------------
                MÓDULO ALUNO
----------------------------------------------------------------------*/
            [
                'name' => 'modulo_aluno',
                'description' => 'Ativar menu do Aluno',        //49
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                
            ],




        ]);
    }
}

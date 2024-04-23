<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleMaster = Role::create(['name' => 'master', 'mcode' => '0', 'description' => 'Master']);
        $roleManager = Role::create(['name' => 'manager', 'mcode' => '1', 'description' => 'Gestor']);
        $roleCreator = Role::create(['name' => 'coursecreator', 'mcode' => '2', 'description' => 'Criador de Curso']);
        $roleTeacher = Role::create(['name' => 'editingteacher', 'mcode' => '3', 'description' => 'Coordenador']);
        $roleEditTeacher = Role::create(['name' => 'teacher', 'mcode' => '4', 'description' => 'Professor']);
        $roleStudent = Role::create(['name' => 'student', 'mcode' => '5', 'description' => 'Estudante']);
        $roleGuest = Role::create(['name' => 'guest', 'mcode' => '6', 'description' => 'Convidado']);
        $roleUser = Role::create(['name' => 'user', 'mcode' => '7', 'description' => 'Usuário']);
        $roleFrontPage = Role::create(['name' => 'frontpage', 'mcode' => '8', 'description' => 'Front Page']);


        Permission::create(['name' => 'dashboard.index', 'description' => 'Acessar Dashboard'])->syncRoles([
            $roleMaster,
            $roleManager,
            $roleCreator,$roleTeacher,
            $roleEditTeacher ,
            $roleStudent ,
            $roleGuest ,
            $roleUser ,
            $roleFrontPage ,
        ]);

        Permission::create(['name' => 'profile.edit', 'description' => 'Acessar Perfil' ])->syncRoles([
            $roleMaster,
            $roleManager,
            $roleCreator,$roleTeacher,
            $roleEditTeacher ,
            $roleStudent ,
            $roleGuest ,
            $roleUser ,
            $roleFrontPage ,
        ]);
        Permission::create(['name' => 'profile.update', 'description' => 'Editar Perfil' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,
                $roleCreator,
                $roleTeacher,
                $roleEditTeacher ,
                $roleStudent ,
                $roleGuest ,
                $roleUser ,
                $roleFrontPage ,
            ]);
        Permission::create(['name' => 'profile.destroy', 'description' => 'Deletar Perfil' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,
            ]);

        Permission::create(['name' => 'users.index', 'description' => 'Listar Usuários' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,
                $roleCreator,
                $roleTeacher,

            ]);
        Permission::create(['name' => 'users.create', 'description' => 'Criar Usuário' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,

                $roleUser ,
                $roleFrontPage ,
            ]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuário' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,

            ]);
        Permission::create(['name' => 'users.role', 'description' => 'Delegar Função ao Usuário' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,
            ]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Deletar Usuário' ])
            ->syncRoles([
                $roleMaster,
                $roleManager,
            ]);

        Permission::create(['name' => 'roles.index', 'description' => 'Listar Roles' ])
            ->syncRoles([
                $roleMaster,
            ]);
        Permission::create(['name' => 'roles.create', 'description' => 'Criar Role' ])
            ->syncRoles([
                $roleMaster,
            ]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Role' ])
            ->syncRoles([
                $roleMaster,
            ]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Deletar Role' ]);

        Permission::create(['name' => 'permissions.index', 'description' => 'Listar Permissions' ])
            ->syncRoles([
                $roleMaster,
            ]);;
        Permission::create(['name' => 'permissions.create', 'description' => 'Criar Permission' ])
            ->syncRoles([
                $roleMaster,
            ]);;
        Permission::create(['name' => 'permissions.edit', 'description' => 'Editar Permission' ])
            ->syncRoles([
                $roleMaster,
            ]);;
        Permission::create(['name' => 'permissions.destroy', 'description' => 'Deletar Permission' ])
            ->syncRoles([
                $roleMaster,
            ]);;


    }
}



<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;
use Closure;

class UserForm extends Form
{

    public ?User $user;

    public $name = '';

    public $username = '';
    public $lastname = '';

    public $email = '';

    public $password = '';


    public $campo;

    public $message;

    public function rules()
    {

        $rules = [
            'name' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'password' => ['nullable', Password::min('8')->mixedCase()->uncompromised()->symbols()]
        ];

        if(isset($this->user)){
            $rules['username'] = ['required','string', 'regex:/^\S*$/', 'max:2048', Rule::unique('users', 'username')->ignore($this->user)];
            $rules['email'] = ['required',  'lowercase', Rule::unique('users', 'email')->ignore($this->user)];

        }else{
            $rules['username'] = ['required', 'string', 'regex:/^\S*$/', 'max:2048', Rule::unique('users', 'username')];
            $rules['email'] = ['required',  'lowercase', Rule::unique('users', 'email')];
        }


        return $rules;

    }


    public function setUser(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->lastname = $user->lastname;


    }

    public function createUser()
    {
        $createUserMoodle = new User();

        $resCreate = $createUserMoodle->createUserMoodle(
            $this->username,
            $this->password,
            $this->name,
            $this->lastname,
            $this->email,
        );

        if(isset($resCreate[0]->id)){

            $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'mcode' => $resCreate[0]->id,
                    'username' => $this->username,
                    'lastname' => $this->lastname,
                    'password' => Hash::make($this->password),
                ]
            );

            $user->assignRole('user');

            toastr()->success('Criado com sucesso!');

            return redirect()->route('users.index');
        }else{

            toastr()->error('Esso ao criar Usuario!');
        };



    }

    public function validaCampo($campo, $message)
    {

        $this->campo = $campo;

        $this->message = $message;

       $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {

                $validator->errors()->add($this->campo, $this->message);

            });

        })->validate();

    }
    public function store()
    {

        $this->validate();

        $findUserMoodle = new User();

        // find user by username
        $resUserMoodle = $findUserMoodle->findUserByFieldMoodle($this->username);

        if (count($resUserMoodle) === 0){

                 $userEmail = $findUserMoodle->findUserByFieldMoodle($this->email, 'email');

                    if (count($userEmail) > 0) {

                        $this->validaCampo('email', 'Já existe usuario com este Email no moodle, favor alterar!');

                    }else{

                        $this->createUser();
                    }

        }else{

            $this->validaCampo('username', 'Já existe usuario com este Username no moodle, favor alterar!');
        }

    }

    public function update()
    {

        $this->validate();

        $this->user->update(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'username' => $this->username,
                    'lastname' => $this->lastname,
                ]
        );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('users.index');

    }

}

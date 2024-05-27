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
    public $lastname = '';
    public $birthday = '';

    public $username = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';
    public $phone = '';
    public $mobile = '';
    public $rg = '';
    public $cpf = '';
    public $address = '';
    public $number = '';
    public $district = '';
    public $city = '';
    public $postalcode = '';
    public $graduation = '';
    public $graduationstatus = '';
    public $graduationarea = '';
    public $posgraduation = '';
    public $profesion = '';
    public $recomendation = '';

    public $observation = '';
    public $campo;

    public $message;

    public function rules()
    {

        $rules = [
            'name' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'birthday' => ['required','date'],
            'phone' => ['required','max:15'],
            'mobile' => ['required','max:15'],
            'rg' => ['nullable', 'string', 'max:15' ],
            'address' => ['required', 'max: 50'],
            'number' => [ 'required', 'max:8'],
            'district' => [ 'required','max: 30'],
            'city' => [ 'required','max: 50'],
            'postalcode' => ['required', 'max: 10'],
            'graduation' => ['required','max: 50'],
            'graduationstatus' => ['required', 'max: 15'],
            'graduationarea' => ['required'],
            'posgraduation' => ['max: 30'],
            'profesion' => ['required', 'max: 50'],
            'recomendation' => ['required'],
            'observation' => ['nullable', 'max: 500'],
        ];

        if(isset($this->user)){
            $rules['email'] = ['required',  'lowercase', Rule::unique('users', 'email')->ignore($this->user)];
            $rules['cpf'] = ['required', 'max:14', Rule::unique('users', 'cpf')->ignore($this->user)];

        }else{
            $rules['email'] = ['required',  'lowercase', Rule::unique('users', 'email')];
            $rules['password'] = ['required', Password::min('8')->mixedCase()->uncompromised()->symbols()];
            $rules['cpf'] = ['required', 'max:14', Rule::unique('users', 'cpf')];
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
        $this->birthday = $user->birthday;
        $this->phone = $user->phone ;
        $this->mobile = $user->mobile;
        $this->rg = $user->rg;
        $this->cpf = $user->cpf;
        $this->address = $user->address;
        $this->number = $user->number;
        $this->district = $user->district;
        $this->city = $user->city;
        $this->postalcode = $user->postalcode;
        $this->graduation = $user->graduation;
        $this->graduationstatus = $user->graduationstatus;
        $this->graduationarea = $user->graduationarea;
        $this->posgraduation = $user->posgraduation;
        $this->profesion = $user->profesion;
        $this->recomendation = $user->recomendation;
        $this->observation = $user->observation;


    }
    public function createUser()
    {
        $createUserMoodle = new User();

        //create user in moodle
        $resCreate = $createUserMoodle->createUserMoodle(
            $this->formatUsername($this->cpf),
            $this->password,
            $this->name,
            $this->lastname,
            $this->email,
        );

        if(isset($resCreate[0]->id)){

            //create user in system
            $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'mcode' => $resCreate[0]->id,
                    'username' => $this->formatUsername($this->cpf),
                    'lastname' => $this->lastname,
                    'password' => Hash::make($this->password),
                    'birthday' => $this->birthday,
                    'phone' => $this->phone,
                    'mobile' => $this->mobile,
                    'rg' => $this->rg,
                    'cpf' => $this->cpf,
                    'address' => $this->address,
                    'number' => $this->number,
                    'district' => $this->district,
                    'city' => $this->city,
                    'postalcode' => $this->postalcode,
                    'graduation' => $this->graduation,
                    'graduationstatus' => $this->graduationstatus,
                    'graduationarea' => $this->graduationarea,
                    'posgraduation' => $this->posgraduation,
                    'profesion' => $this->profesion,
                    'recomendation' => $this->recomendation,
                    'observation' => $this->observation,
                ]
            );

            $user->assignRole('user');

            toastr()->success('Criado com sucesso!');

            return redirect()->route('users.index');
        }else{

            toastr()->error('Erro ao criar Usuario!');
        };



    }

    private function formatUsername($data)
    {
        // Remove qualquer não dígito
        $data = preg_replace('/\D/', '', $data);

        // Aplica a máscara
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1$2$3$4', $data);
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
                    'username' => $this->formatUsername($this->cpf),
                    'name' => $this->name,
                    'lastname' => $this->lastname,
                    'email' => $this->email,
                    'birthday' => $this->birthday,
                    'phone' => $this->phone,
                    'mobile' => $this->mobile,
                    'rg' => $this->rg,
                    'cpf' => $this->cpf,
                    'address' => $this->address,
                    'number' => $this->number,
                    'district' => $this->district,
                    'city' => $this->city,
                    'postalcode' => $this->postalcode,
                    'graduation' => $this->graduation,
                    'graduationstatus' => $this->graduationstatus,
                    'graduationarea' => $this->graduationarea,
                    'posgraduation' => $this->posgraduation,
                    'profesion' => $this->profesion,
                    'recomendation' => $this->recomendation,
                    'observation' => $this->observation,

                ]
        );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('users.edit', $this->user->id);

    }

    public function profile()
    {

        $this->validate();

        $this->user->update(
            [
                'username' => $this->formatUsername($this->cpf),
                'name' => $this->name,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'phone' => $this->phone,
                'mobile' => $this->mobile,
                'rg' => $this->rg,
                'cpf' => $this->cpf,
                'address' => $this->address,
                'number' => $this->number,
                'district' => $this->district,
                'city' => $this->city,
                'postalcode' => $this->postalcode,
                'graduation' => $this->graduation,
                'graduationstatus' => $this->graduationstatus,
                'graduationarea' => $this->graduationarea,
                'posgraduation' => $this->posgraduation,
                'profesion' => $this->profesion,
                'recomendation' => $this->recomendation,
                'observation' => $this->observation,

            ]
        );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('profile.edit');

    }

}

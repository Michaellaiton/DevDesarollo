<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' =>['required', 'string', 'max:225'],
            'phone_number' => ['required', 'string', 'max:11'],
            'document_type' => ['required', 'string', 'max:225'],
            'document_number' => ['required', 'string', 'max:15', 'min:5', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'phone_number' => $input['phone_number'],
            'document_type' => $input ['document_type'],
            'document_number' => $input['document_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Regular User');
        
    }
}

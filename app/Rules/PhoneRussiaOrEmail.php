<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule; 
use Illuminate\Support\Facades\Validator;

class PhoneRussiaOrEmail implements Rule
{
    protected $validator;
    protected $data;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $emailValid = Validator::make(compact('value'), [
            'value' => 'email'
        ])->passes();
        
        $phoneValid = Validator::make(compact('value'), [
            'value' => new PhoneRussia
        ])->passes();
        
        //
        return $phoneValid || $emailValid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Неверный email или номер мобильного телефона';
    }
}

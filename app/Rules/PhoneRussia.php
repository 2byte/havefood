<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneRussia implements Rule
{
    public static $regexCheckPhoneRussia = '/(\+?\d{11})|(^7?(\d{10,11})$)/';
    
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
        //
        return preg_match(self::$regexCheckPhoneRussia, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Неверный формат номера мобильного телефона';
    }
}

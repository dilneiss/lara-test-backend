<?php

namespace App\Rules;

use App\Http\Helper\ArrayHelper;
use App\Models\Currency;
use Illuminate\Contracts\Validation\Rule;

class SymbolExistsValidator implements Rule
{

    protected $symbolsNotFound = [];

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

        $symbols = ArrayHelper::ExplodeCommaUnique($value);

        foreach ($symbols as $symbol){
            if (Currency::whereSymbol($symbol)->count() == 0){
                $this->symbolsNotFound[] = $symbol;
            }
        }

        return count($this->symbolsNotFound) == 0;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.currency.symbols_not_found', ['symbols' => implode(', ', $this->symbolsNotFound)]);
    }

}

<?php

namespace App\Rules;

use App\Models\Indicator;
use Illuminate\Contracts\Validation\Rule;

class Subindicator implements Rule
{
    public function passes($attribute, $value): bool
    {
        return is_numeric($value) && Indicator::query()
            ->whereKey((int) $value)
            ->whereNotNull('parent_indicator_id')
            ->exists();
    }

    public function message(): string
    {
        return 'La subcategoria seleccionada no existe o no pertenece a una categoria.';
    }
}

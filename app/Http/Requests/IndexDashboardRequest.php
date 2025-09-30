<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexDashboardRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', Rule::exists(User::class, 'id')],
            'start_date' => ['nullable', 'date', 'before_or_equal:end_date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'O ID do usuário é obrigatório.',
            'user_id.integer' => 'O ID do usuário deve ser um número inteiro.',
            'user_id.exists' => 'O usuário informado não existe.',
            'start_date.date' => 'A data inicial deve ser uma data válida.',
            'start_date.before_or_equal' => 'A data inicial não pode ser posterior à data final.',
            'end_date.date' => 'A data final deve ser uma data válida.',
            'end_date.after_or_equal' => 'A data final não pode ser anterior à data inicial.',
        ];
    }

 
    protected function prepareForValidation()
    {

        $this->merge([
            'user_id' => $this->route('user_id'),
            'start_date' => $this->start_date ?? now()->subMonth()->startOfMonth()->toDateString(),
            'end_date' => $this->end_date ?? now()->endOfMonth()->toDateString(),
        ]);
    }
}
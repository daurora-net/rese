<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveNewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'started_at' => 'required|date|after:tomorrow',
            'num_of_users' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'started_at.required' => '日付を選択してください。',
            'started_at.after' => '明日以降を選択してください。',
            'num_of_users.required' => '人数を選択してください。',
        ];
    }
    protected function prepareForValidation()
    {
        $started_at = ($this->filled(['date', 'time'])) ? $this->date . ' ' . $this->time : '';
        $this->merge([
            'started_at' => $started_at
        ]);
    }
}

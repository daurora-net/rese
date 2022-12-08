<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'started_at' => 'required|date|after:today',
            'date' => 'required|date|after:today',
            'time' => 'required|date',
            'num_of_users' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付を選択してください。',
            'date.after' => '明日以降の日付を選択してください。',
        ];
    }
    protected function prepareForValidation()
    {
        // 日時をデータに追加
        $started_at = ($this->filled(['date', 'time'])) ? $this->date . ' ' . $this->time : '';
        $this->merge([
            'started_at' => $started_at
        ]);
    }
}
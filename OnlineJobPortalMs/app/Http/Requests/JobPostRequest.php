<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {//True
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
            'title'=>'required|min:5',
            'description'=>'required',
            'roles'=>'required',
            'address'=>'required',
            'position'=>'required',
            'last_date' => 'required',
            'experience'  => 'required|min:1|numeric',
            'number_of_vacancy' => 'required|min:1|numeric',
            'salary'=>'required',
            'qualification'=> 'required'
        ];
    }
}

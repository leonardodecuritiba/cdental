<?php

namespace App\Http\Requests\Patients;

use Illuminate\Foundation\Http\FormRequest;

class PatientImageRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$rules = [
            'titulo' => 'required|min:1|max:50',
            'descricao' => 'required|min:1|max:100'
        ];
        if($this->has('upload') && $this->file('upload') != NULL){
            $size = config('system.pictures.size') * 1000;
	        $rules['upload'] = 'max:' . $size . '|mimes:'  . config('system.pictures.mimes');
        }
//        dd($this->file('file_import'));

        switch ( $this->method() ) {
            case 'PATCH':
            case 'POST':
                {
                    return $rules;
                }
            default:
                return [];
        }

	}
}


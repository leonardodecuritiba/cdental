<?php

namespace App\Http\Requests\Patients;

use Illuminate\Foundation\Http\FormRequest;

class PatientDocumentRequest extends FormRequest {
	private $table = 'paciente_documentos';

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
            $size = config('system.documents.size') * 1000;
	        $rules['upload'] = 'max:' . $size . '|mimes:'  . config('system.documents.mimes');
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


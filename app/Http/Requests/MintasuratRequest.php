<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MintasuratRequest extends Request
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
            'hal' => 'required',
            'jenis' => 'required',
            'tujuan' => 'required'
        ];
    }

    public function messages(){
        return [
        'hal.required' => 'hal harus diisi',
        'jenis.required' => 'jenis harus diisi',
        'tujuan.required' => 'tujuan harus diisi'

        ];
    }
}

 
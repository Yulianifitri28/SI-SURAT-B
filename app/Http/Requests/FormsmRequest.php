<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormsmRequest extends Request
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
            'jenis' => 'required',
            'tanggal' => 'required',
            'no' => 'required',
            'tanggals' => 'required',
            'hal' => 'required',
            'file' => 'required',
            'asal' => 'required',
            'pen' => 'required'
        ];
    }

    public function messages(){
        return [
        'jenis.required' => 'Anda harus memilih jenis surat',
        'tanggal.required' => 'Masukkan tanggal terima',
        'no.required' => 'Masukkan nomor surat masuk',
        'tanggals.required' => 'Masukkan tanggal surat',
        'hal.required' => 'Masukkan perihal surat',
        'file.required' => 'Masukkan file surat',
        'asal.required' => 'Masukkan asal surat',
        'pen.required' => 'Masukkan penerima surat'

        ];
    }
}


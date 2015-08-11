<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerkiraanRequest extends Request
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
            'kode_perkiraan'    => 'required'
            ,'keterangan'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_perkiraan.required'   => 'Kolom kode perkiraan harus diisi'
            ,'keterangan.required'      => 'kolom keterangan harus diisi'
        ];
    }
}

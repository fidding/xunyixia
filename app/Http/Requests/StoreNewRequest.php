<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreNewRequest extends Request
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
            //
            'type_id'       =>  'required',
            'title'         =>  'required',
            'description'   =>  'required',
            'time'          =>  'required',
            'addresscode'   =>  'required',
            'description'   =>  'required',
            'c_name'        =>  'required',
            'c_address'     =>  'required',
            'c_mobilephone' =>  'required'
        ];
    }
}

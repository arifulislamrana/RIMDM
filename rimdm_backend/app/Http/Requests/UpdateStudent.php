<?php

namespace App\Http\Requests;

use App\DataObjects\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudent extends FormRequest
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
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'dob' => 'required',
            'roll' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'class' => 'required',
        ];
    }

    public function getObject()
    {
        $user = new User();

        $user->name = $this->request->get('name');
        $user->f_name = $this->request->get('fname');
        $user->m_name = $this->request->get('mname');
        $user->dob = $this->request->get('dob');
        $user->email = $this->request->get('email');
        $user->class_level_id = $this->request->get('class');
        $user->roll = $this->request->get('roll');
        $user->phone = $this->request->get('phone');
        $user->address = $this->request->get('address');

        return $user;
    }
}

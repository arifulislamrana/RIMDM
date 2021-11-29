<?php

namespace App\Http\Requests;

use App\DataObjects\User;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\InputBag;

class CreateStudent extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'class' => 'required',
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6',
        ];
    }

    public function getObject()
    {
        $user = new User();

        $user->name = $this->request->get('name');
        $user->fname = $this->request->get('fname');
        $user->mname = $this->request->get('mname');
        $user->dob = $this->request->get('dob');
        $user->email = $this->request->get('email');
        $user->password = $this->request->get('password');
        $user->cpassword = $this->request->get('cpassword');
        $user->class_level_id = $this->request->get('class');
        $user->roll = $this->request->get('roll');
        $user->phone = $this->request->get('phone');
        $user->address = $this->request->get('address');

        return $user;
    }
}

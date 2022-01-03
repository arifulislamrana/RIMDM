<?php

namespace App\Http\Requests;

use App\DataObjects\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacher extends FormRequest
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
            'designation' => 'required',
            'qualification' => 'required',
            'phone' => 'required',
            'email' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getObject()
    {
        $teacher = new Teacher();

        $teacher->name = $this->request->get('name');
        $teacher->designation = $this->request->get('designation');
        $teacher->qualification = $this->request->get('qualification');
        $teacher->email = $this->request->get('email');
        $teacher->phone = $this->request->get('phone');
        $teacher->image = $this->file('image');

        return $teacher;
    }
}

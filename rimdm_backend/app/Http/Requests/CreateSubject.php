<?php

namespace App\Http\Requests;

use App\DataObjects\Subject;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubject extends FormRequest
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
            'class' => 'required',
        ];
    }

    public function getObject()
    {
        $subject = new Subject();

        $subject->name = $this->request->get('name');
        $subject->class = $this->request->get('class');
        $subject->teacher = $this->request->get('teacher');

        return $subject;
    }
}

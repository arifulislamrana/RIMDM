<?php

namespace App\Http\Requests;

use App\DataObjects\Notice;
use Illuminate\Foundation\Http\FormRequest;

class CreateNoticeRequest extends FormRequest
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
            'heading' => 'required',
            'body' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ];
    }

    public function getObject()
    {
        $notice = new Notice();

        $notice->heading = $this->request->get('heading');
        $notice->body = $this->request->get('body');
        $notice->file = $this->file('file');

        return $notice;
    }
}

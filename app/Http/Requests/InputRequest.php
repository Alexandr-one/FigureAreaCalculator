<?php

namespace App\Http\Requests;

use App\Classes\FigureTypesEnum;
use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'type'            => 'required',
            'radius'          => 'required_if:type,==,'.FigureTypesEnum::CIRCLE,
            'x1'              => 'required_if:type,==,'.FigureTypesEnum::RECTANGLE,
            'x2'              => 'required_if:type,==,'.FigureTypesEnum::RECTANGLE,
            'y1'              => 'required_if:type,==,'.FigureTypesEnum::RECTANGLE,
            'y2'              => 'required_if:type,==,'.FigureTypesEnum::RECTANGLE,
            'sideSquare'      => 'required_if:type,==,'.FigureTypesEnum::SQUARE,
            'firstInputRect'  => 'required_if:type,==,'.FigureTypesEnum::TRIANGLE,
            'secondInputRect' => 'required_if:type,==,'.FigureTypesEnum::TRIANGLE,
            'thirdInputRect'  => 'required_if:type,==,'.FigureTypesEnum::TRIANGLE,
        ];
    }

    public function messages()
    {
        return [
            'type.required'               => trans('validation.type.required'),
            'radius.required_if'          => trans('validation.radius.required'),
            'x1.required_if'              => trans('validation.x1.required'),
            'x2.required_if'              => trans('validation.x2.required'),
            'y1.required_if'              => trans('validation.y1.required'),
            'y2.required_if'              => trans('validation.y2.required'),
            'sideSquare.required_if'      => trans('validation.sideSquare.required'),
            'firstInputRect.required_if'  => trans('validation.firstInputRect.required'),
            'secondInputRect.required_if' => trans('validation.secondInputRect.required'),
            'thirdInputRect.required_if'  => trans('validation.thirdInputRect.required'),
        ];
    }
}

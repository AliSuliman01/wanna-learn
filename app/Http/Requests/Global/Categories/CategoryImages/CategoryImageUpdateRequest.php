<?php


namespace App\Http\Requests\Global\Categories\CategoryImages;


use App\Http\Requests\CustomFormRequest;

class CategoryImageUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_images,id,deleted_at,NULL',
            'category_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
            'img_src' 					=> 'required' ,

        ];
    }
}

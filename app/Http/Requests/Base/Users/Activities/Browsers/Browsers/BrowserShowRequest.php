<?php


namespace App\Http\Requests\Base\Users\Activities\Browsers\Browsers;


use App\Http\Requests\ApiFormRequest;

class BrowserShowRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:browsers,id,deleted_at,NULL',
        ];
    }
}

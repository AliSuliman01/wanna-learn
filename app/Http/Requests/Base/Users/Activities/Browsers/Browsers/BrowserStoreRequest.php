<?php


namespace App\Http\Requests\Base\Users\Activities\Browsers\Browsers;


use App\Http\Requests\ApiFormRequest;

class BrowserStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' 					=> '' ,

        ];
    }
}

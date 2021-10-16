<?php


namespace App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions;


use App\Http\Requests\CustomFormRequest;

class PlatformVersionShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:platform_versions,id,deleted_at,NULL',
        ];
    }
}
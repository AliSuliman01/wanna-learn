<?php


namespace App\Http\ViewModels\Global\Languages;

use App\Domain\Global\Languages\Model\Language;
use Illuminate\Contracts\Support\Arrayable;


class LanguageShowVM implements Arrayable
{

    private $languageId;

    public function __construct($props)
    {
        $this->languageId = $props['id'] ;
    }

    private function get_Language(){
        return Language::find($this->languageId);
    }
    public function toArray(): array
    {
        return  $this->get_Language()->toArray();
    }
}

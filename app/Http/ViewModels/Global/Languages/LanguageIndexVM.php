<?php


namespace App\Http\ViewModels\Global\Languages;

use App\Domain\Global\Languages\Model\Language;
use Illuminate\Contracts\Support\Arrayable;

class LanguageIndexVM implements Arrayable
{

    public function get_languages(){
    	return Language::all();
	}
    public function toArray(): array
    {
        return $this->get_languages()->toArray();
    }
}

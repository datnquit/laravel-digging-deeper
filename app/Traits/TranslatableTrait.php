<?php

namespace App\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait TranslatableTrait
{
    use BaseHasTranslations;

    /**
     * Encode the given value as JSON.
     *
     * @param  mixed  $value
     * @return string
     */
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    protected function getLocale(): string
    {
        return request('edit_locale') ?: config('app.locale');
    }

    public function getTranslatableAttributes(): array
    {
        return is_array($this->translatable)
            ? $this->translatable
            : [];
    }

    public function setAttribute($key, $value)
    {
        // Pass arrays and untranslatable attributes to the parent method.
        if ((!$this->isTranslatableAttribute($key) || is_array($value)) ) {
            return parent::setAttribute($key, $value);
        }

        // If the attribute is translatable and not already translated, set a
        // translation for the current app locale.
        return $this->setTranslation($key, $this->getLocale(), $value);
    }
}

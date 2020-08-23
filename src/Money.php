<?php

namespace Sashalenz\NovaMoneyField;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Money extends Number
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-money-field';

    public $locale = 'en-US';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->step(0.01);

        $this->withMeta([
            'locale' => $this->locale
        ]);

        $this->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
            $amount = (int) $request[$requestAttribute] ** 10;
            $currency = (string) $request[$requestAttribute.'__currency'];
            $model->{$attribute} = \Money\Money::{$currency}($amount);
        });
    }

    public function locale($locale): self
    {
        $this->locale = $locale;

        return $this;
    }
}

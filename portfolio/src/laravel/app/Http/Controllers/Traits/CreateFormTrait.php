<?php

namespace App\Http\Controllers\Traits;

use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Form;

trait CreateFormTrait
{
    /**
     * createForm
     *
     * @param  string $formClass
     * @param  string $targetUrl
     * @param  array|null $options
     * @param  string|null $httpMethod
     * @return Form
     */
    public function createForm(
        string $formClass,
        string $targetUrl,
        array $options = [],
        $httpMethod = null
    ) : Form
    {
        $opt = array_merge([
                'method' => $httpMethod ?? 'POST',
                'url' => $targetUrl,
            ],
            $options
        );
        $formBuilder = app(FormBuilder::class);
        $form = $formBuilder->create($formClass, $opt);
        return $form;
    }
}

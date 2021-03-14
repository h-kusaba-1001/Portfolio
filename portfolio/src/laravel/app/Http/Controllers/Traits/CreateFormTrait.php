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
     * @param  string $httpMethod
     * @return FormBuilder
     */
    public function createForm(
        FormBuilder $formBuilder,
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
        $form = $formBuilder->create($formClass, $opt);
        return $form;
    }
}

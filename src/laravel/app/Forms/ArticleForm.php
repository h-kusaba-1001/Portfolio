<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ArticleForm extends Form
{
    /**
     * buildForm
     */
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'required' => true,
                'rules' => ['required', 'max:255'],
            ])
            ->add('content', 'textarea', [
                'required' => true,
                'rules' => ['required'],
            ])
            ->add('image', 'file', [
                'rules' => ['nullable', 'image'],
            ])
            ->add('submit', 'submit');
    }
}

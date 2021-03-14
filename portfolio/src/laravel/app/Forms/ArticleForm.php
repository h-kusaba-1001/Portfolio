<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;

class ArticleForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'required' => true,
                'rules' => ['required', 'max:255']
            ])
            ->add('content', 'textarea', [
                'required' => true,
                'rules' => ['required', 'max:1024']
            ])
            ->add('image', 'file', [
                'rules' => ['nullable', 'image'],
            ])
            ->add('submit', 'submit');
    }
}

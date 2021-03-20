<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\Form;

trait SaveFailedTrait
{
    /**
     * saveFailed
     *
     * @param  string $msg
     * @param  Request $request
     * @param  Form $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveFailed(string $msg, Request $request, Form $form) : RedirectResponse
    {
        session()->flash('error', $msg);
        return redirect()->back()
            ->withInput($request->all())
            ->withErrors($form->getErrors());
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\ArticleForm;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{

    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articles = $this->articleService->getArticleListForAdmin();

        return view('admin.article.index', compact('Articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder) : View
    {
        $form = $this->createForm(
            $formBuilder,
            ArticleForm::class,
            route('admin.article.store'),
            ['files' => true]
        );
        return view('admin.article.create', compact(['form']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, FormBuilder $formBuilder) : RedirectResponse
    {
        $form = $this->createForm(
            $formBuilder,
            ArticleForm::class,
            route('admin.article.store'),
            ['files' => true]
        );
        $form->redirectIfNotValid();

        $vals = $form->getFieldValues();
        // TODO 画像ファイルパスの追加

        $result = Article::create($vals);

        if(!($result instanceof Article)) {
            session()->flash(
                'flash_message',
                'Article' . config('const.flush.store.failed')
            );
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors($form->getErrors());
        }

        session()->flash(
            'flash_message',
            'Article' . config('const.flush.store.success')
        );

        return redirect(route('admin.article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) : RedirectResponse
    {
        $msg = 'Article' . config('const.flush.delete.success');
        // destroyの返り値で削除件数を取得して判定
        if (Article::destroy($id) !== 1) {
            $msg = 'Article' . config('const.flush.delete.failed');
        }

        session()->flash('flash_message', $msg);

        return redirect(route('admin.article.index'));
    }
}

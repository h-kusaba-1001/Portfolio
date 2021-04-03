<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use App\Forms\ArticleForm;
use App\Models\Article;
use Illuminate\Http\Request;
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
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $Articles = $this->articleService->getArticleListForAdmin();

        return view('admin.article.index', compact('Articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        $form = $this->createForm(
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $form = $this->createForm(
                ArticleForm::class,
                route('admin.article.store'),
                ['files' => true]
            );
        $form->redirectIfNotValid();

        $vals = $form->getFieldValues();
        // 画像ファイルパスの追加
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $vals['image_filepath'] = url('storage/'.$request->image->store('article', 'public'));
        }

        $result = Article::create($vals);

        if(!($result instanceof Article)) {
            return $this->saveFailed(
                'Article' . __('flush.store.failed'),
                $request,
                $form
            );
        }

        session()->flash(
            'success',
            'Article' . __('flush.store.success')
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
     * @return \Illuminate\View\View
     */
    public function edit($id) : View
    {
        $Article = Article::FindOrFail($id);

        $form = $this->createForm(
            ArticleForm::class,
            route('admin.article.update', $Article->id),
            [
                'files' => true,
                'model' => $Article
            ],
            'PUT'
        );

        return view('admin.article.create', compact(['form', 'Article']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $Article = Article::FindOrFail($id);

        $form = $this->createForm(
            ArticleForm::class,
            route('admin.article.update', $Article->id),
            [
                'files' => true,
                'model' => $Article
            ],
            'PUT'
        );
        $form->redirectIfNotValid();
        $vals = $form->getFieldValues();
        // 画像ファイルパスの追加
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $vals['image_filepath'] = url('storage/'.$request->image->store('article', 'public'));
        }
        $Article->fill($vals);
        $result = $Article->save();
        if (!$result) {
            return $this->saveFailed(
                'Article' . __('flush.update.failed'),
                $request,
                $form
            );
        }

        session()->flash(
            'success',
            'Article' . __('flush.update.success')
        );

        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) : RedirectResponse
    {
        // destroyの返り値で削除件数を取得して判定
        if (Article::destroy($id) !== 1) {
            session()->flash('error', 'Article' . __('flush.delete.failed'));
        } else {
            session()->flash('success', 'Article' . __('flush.delete.success'));
        }

        return redirect(route('admin.article.index'));
    }
}

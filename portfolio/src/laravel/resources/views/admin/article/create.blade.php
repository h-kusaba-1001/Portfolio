@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ブログ記事 詳細</div>

                <div class="card-body">
                    <div class="">
                        {{Form::open(['url' => route('admin.article.store'), 'files' => true]) }}
                        <div class="col-md-12">
                            {{ Form::label('title', 'タイトル', ['class' => 'col-md-3 col-form-label']) }}
                            {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::label('content', '本文', ['class' => 'col-md-3 col-form-label']) }}
                            {{ Form::textarea('content', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::file('image', ['class'=>'form-controll'] )}}
                        </div>
                        <div class="col-md-12">
                            {{ Form::submit('登録', ['class'=>'btn btn-primary btn-block'] )}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    You are logged in as 管理者!
                    <a class="btn btn-primary btn-block" role="button" href="{{ route('admin.article.index') }}">ブログ</a>
                    <a class="btn btn-primary btn-block" role="button" href="{{ route('admin.comment.index') }}">コメント</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

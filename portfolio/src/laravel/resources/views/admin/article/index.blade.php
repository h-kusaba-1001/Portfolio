@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ブログ記事 一覧</div>
                <div class="card-body">
                    <a class="btn btn-default btn-block" role="button" href="{{ route('admin.article.create') }}">新規作成</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">タイトル</th>
                                <th scope="col">本文</th>
                                <th scope="col">作成日時</th>
                                <th scope="col">コメント数</th>
                                <th scope="col">いいね数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Articles as $Article)
                                <tr>
                                    <th scope="row">{{ $Article->id }}</th>
                                    <td>{{ $Article->title }}</td>
                                    <td>{{ $Article->shortly_content }}</td>
                                    <td>{{ $Article->created_at }}</td>
                                    <td>{{ $Article->comment_num }}</td>
                                    <td>{{ $Article->like_num }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>ブログ記事がありません</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $Articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">ブログ記事 一覧</div>
            <div class="card-body">
                <a class="btn btn-primary btn-block" role="button" href="{{ route('admin.article.create') }}">新規作成</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th>画像</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">本文</th>
                            <th scope="col">作成日時</th>
                            <th scope="col">コメント数</th>
                            <th scope="col">いいね数</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Articles as $Article)
                            <tr>
                                <th>{{ $Article->id }}</th>
                                <td class="w-25">
                                    @if (!is_null($Article->image_filepath))
                                        <img src="{{ $Article->image_filepath }}" class="img-fluid img-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $Article->title }}</td>
                                <td>{{ $Article->shortly_content }}</td>
                                <td>{{ $Article->created_at }}</td>
                                <td>{{ $Article->comment_num }}</td>
                                <td>{{ $Article->like_num }}</td>
                                <td>
                                    <a class="btn btn-primary btn-block"
                                        href="{{route('admin.article.edit', $Article->id)}}"
                                    >
                                        編集
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-block" role="button"
                                        href=""
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form-article-{{$Article->id}}').submit();"
                                    >
                                        削除
                                    </a>
                                    <form id="delete-form-article-{{$Article->id}}"
                                        action="{{ route('admin.article.destroy', $Article->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
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
@endsection

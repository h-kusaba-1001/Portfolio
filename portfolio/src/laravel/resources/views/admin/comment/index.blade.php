@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">コメント 一覧</div>
            <button class="btn btn-default" id="all-check">
                全選択
            </button>
            <button class="btn btn-secondary" id="all-uncheck">
                全解除
            </button>
            <button class="btn btn-primary" id="update-permission">
                承認
            </button>
            <button class="btn btn-danger" id="bulk-delete">
                削除
            </button>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ブログID</th>
                            <th scope="col">名前</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">作成日時</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Comments as $Comment)
                            <tr>
                                <td>
                                    {{ Form::checkbox('id[]', $Comment->id, false,[
                                        'class' => 'checkbox-comment-id'
                                    ]) }}
                                </td>
                                <th>{{ $Comment->id }}</th>
                                <td>{{ $Comment->article_id }}</td>
                                <td>{{ $Comment->name }}</td>
                                <td>{{ $Comment->content }}</td>
                                <td>{{ $Comment->email }}</td>
                                <td>{{ $Comment->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>コメントがありません</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $Comments->links() }}
            </div>
        </div>
    </div>
</div>
{{ Form::hidden('update_route', route('admin.comment.bulk_update_permission')) }}
{{ Form::hidden('delete_route', route('admin.comment.bulk_delete')) }}
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/admin/comment/index.js') }}"></script>
@endpush

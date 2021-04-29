@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">コメント 一覧</div>
            {!! Form::open(['url' => route('admin.comment.index'), 'method' => 'GET']) !!}
                {!! Form::radio(
                    'only_not_permitted',
                    1,
                    request()->only_not_permitted == 1 || is_null(request()->only_not_permitted),
                    ['id' => 'only_not_permitted_on'])
                !!}
                {!! Form::label('only_not_permitted_on', '未承認のみを表示') !!}
                {!! Form::radio(
                    'only_not_permitted',
                    0,
                    request()->only_not_permitted == 0 && is_numeric(request()->only_not_permitted),
                    ['id' => 'only_not_permitted_off'])
                !!}
                {!! Form::label('only_not_permitted_off', '承認済みを含めて表示') !!}
                {!! Form::submit('検索', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
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
                            <th scope="col"></th>
                            <th scope="col">ID</th>
                            <th scope="col">ブログID</th>
                            <th scope="col">名前</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">承認/未承認</th>
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
                                {{-- 未承認の場合、赤字で記す --}}
                                <td class="{{ $Comment->permission_flg === config('project.const.flg.off') ? 'text-danger' : '' }}"
                                >
                                    {{ $Comment->permission_string }}
                                </td>
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

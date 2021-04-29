@extends('layouts.admin.app')

@section('content')
    @if (isset($Article) && !is_null($Article->image_filepath))
        <img src="{{ $Article->image_filepath }}" class="rounded mx-auto d-block w-25 p-3">
    @endif
    {!! form($form) !!}
@endsection

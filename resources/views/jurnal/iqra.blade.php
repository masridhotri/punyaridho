@extends('layout.main')

@section('content')
    <h1>{{ $document->name }}</h1>

    <div>{!! $content !!}</div>

    {{-- <a href="{{ route('documents.index') }}">Kembali</a> --}}
@endsection

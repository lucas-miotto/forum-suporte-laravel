@extends('admin.layouts.app');

@section('title', 'Editar Tópico')

@section('header')
    <h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
    <form action="{{ route('supports.edit', $support->id) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', [
            'support' => $support,
        ])
    </form>
@endsection

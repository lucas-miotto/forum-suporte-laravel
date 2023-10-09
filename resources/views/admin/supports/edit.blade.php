<h1>Dúvida {{ $support->id }}</h1>

<x-alert />

<form action="{{ route('supports.edit', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', [
    'support' => $support
    ])
</form>
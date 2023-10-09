<div class="alert alert-danger">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
    @endif

    {{-- aqui recupera o conteudo --}}
    {{ $slot }}
</div>
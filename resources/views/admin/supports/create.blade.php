<h1>Nova Dúvida</h1>

{{--verificar erros--}}
<x-alert/>

<form action="{{ route('supports.store') }}" method="post">
    @include('admin/supports/partials/form')
</form>
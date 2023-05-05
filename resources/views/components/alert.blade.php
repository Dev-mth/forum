<div class="alert alert-danger">
    {{--verificar erros--}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

</div>
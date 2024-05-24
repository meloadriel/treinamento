<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Agenda Telefonica</title>
</head>

<body>
    <button type="submit"><a href="{{ route('contatos.create') }}">Criar Contato</a></button>

    @foreach ($contatos as $contato)
        <ul>
            <li>
                {{ $contato->nome }}

            </li>
            <li>
                {{ $contato->endereco->cidade }}
            </li>
            <li>
                {{ $contato->endereco->rua }}
            </li>
            <li>
                {{ $contato->endereco->numero }}
            </li>
            @if ($contato->telefone->isNotEmpty())
                <li>
                    {{ $contato->telefone->first()->numero}}
                    @if ($contato->telefone->first()->tipo_id == 1)
                        Fixo
                    @else
                        Celular
                    @endif
                </li>
            @endif
            <li>
                <a href="{{ route('contatos.edit', ['id' => $contato->id]) }}">Editar Contato</a>
            </li>
            <li>
                <form action="{{ route('contatos.destroy', ['id' => $contato->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">DELETAR CONTATO</button>
                </form>
            </li>
        </ul>
    @endforeach
</body>

</html>

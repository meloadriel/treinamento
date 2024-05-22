<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('contatos.create') }}">Criar Contato</a>

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
            @foreach ($contato->telefone as $telefone)
                <li>
                    {{ $telefone->numero }}
                    @if ($telefone->tipo_id == 1)
                        Fixo
                    @else
                        Celular
                    @endif
                </li>
            @endforeach
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (isset($contato))
        <form action="{{ route('contatos.update', ['id' => $contato->id]) }}" method="POST">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('contatos.store') }}" method="POST">
                @csrf
    @endif

    <input type="text" id="nome" name="nome"
        @if (isset($contato)) value='{{ $contato->nome }}' @endif required
        placeholder="Digite aqui seu nome">

    <input type="text" id="cidade" name="cidade"
        @if (isset($contato)) value='{{ $contato->endereco->cidade }}' @endif required
        placeholder= "Digite o nome da sua cidade">

    <input type="text" id="rua" name="rua"
        @if (isset($contato)) value='{{ $contato->endereco->rua }}' @endif required
        placeholder= "Digite o nome da sua Rua">

    <input type="text" id="numero" name="numero"
        @if (isset($contato)) value='{{ $contato->endereco->numero }}' @endif required
        placeholder= "Digite o numero da sua casa">

    @if (isset($contato))
        @foreach ($contato->telefone as $telefone)
            <input type="text" id="telefones" name="telefones[]"
                @if (isset($contato)) value='{{ $telefone->numero }}' @endif required
                placeholder="Digite o seu telefone">
            <select name="tipos[]" id="tipo">
                @for ($i = 1; $i <= count($tipos); $i++)
                    <option value="{{ $i }}"  @if ($telefone->tipo_id === $i)
                        selected
                    @endif>{{ $tipos[$i] }}
                    </option>
                @endfor
            </select>
            <div id="grupoTelefones">
            </div>
        @endforeach
    @else
        <input type="text" id="telefones" name="telefones[]" required placeholder="Digite o seu telefone">
        <select name="tipos[]" id="tipo">
            @for ($i = 1; $i <= count($tipos); $i++)
                <option value="{{ $i }}">{{ $tipos[$i] }}
                </option>
            @endfor
        </select>
        <div id="grupoTelefones">
        </div>
    @endif

    <button id="botaoAdicionarTelefone">Novo Telefone</button>



    @for ($i = 1; $i <= count($categorias); $i++)
        <input type="radio" id="{{ $categorias[$i] }}" name="categoria" value="{{ $i }}" checked>
        <label for="{{ $categorias[$i] }}">{{ $categorias[$i] }}</label>
    @endfor

    <button type="submit">Salvar Contato</button>
    </form>

    <script src="{{ asset('app.js') }}"></script>
</body>

</html>

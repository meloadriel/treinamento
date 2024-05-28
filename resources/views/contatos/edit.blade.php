<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="{{asset("build/assets/app-CVRwK_jk.css")}}">
</head>

<body class="flex flex-col items-center justify-center min-h-screen py-12 bg-[#ffefcc]">
    <div
        class=" overflow-hidden w-[300px] h-[550px] border-[6px] rounded-[30px] border-zinc-900 flex bg-white flex-col justify-start
    ">
        <div class="flex items-center justify-between w-full px-6 bg-zinc-200 h-fit">
            <span class="text-xs">16:20</span>
            <div class="w-32 h-6 -mt-1 rounded-b-xl bg-zinc-900"></div>
            <i class="text-xs fa-solid fa-wifi"></i>
        </div>


        <form action="{{ route('contatos.update', ['id' => $contato->id]) }}" method="POST" class="h-full bg-zinc-100">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between w-full px-6 py-4 bg-zinc-200 ">
                <a href="{{ route('contatos.show', ['id' => $contato->id]) }}" class="text-sm text-blue-500">
                    Cancelar
                </a>
                <h1 class="text-2xl font-bold">{{ $contato->nome }}</h1>
                <button type="submit" class="px-2 text-sm text-white rounded-full hover:text-blue-300">OK</button>
            </div>
            <div class="px-2 bg-white">
                <input type="text" id="nome" name="nome" class="w-full px-2 py-1 text-sm"
                    @if (isset($contato)) value='{{ $contato->nome }}' @endif required
                    placeholder="Digite aqui seu nome">

                <input type="text" id="cidade" name="cidade" class="w-full px-2 py-1 text-sm border-t "
                    @if (isset($contato)) value='{{ $contato->endereco->cidade }}' @endif required
                    placeholder= "Digite o nome da sua cidade">

                <input type="text" id="rua" name="rua" class="w-full px-2 py-1 text-sm border-t "
                    @if (isset($contato)) value='{{ $contato->endereco->rua }}' @endif required
                    placeholder= "Digite o nome da sua Rua">

                <input type="text" id="numero" name="numero" class="w-full px-2 py-1 text-sm border-t "
                    @if (isset($contato)) value='{{ $contato->endereco->numero }}' @endif required
                    placeholder= "Digite o numero da sua casa">
            </div>
            <div class="mt-6 bg-white border-t">
                @if (isset($contato))
                    @foreach ($contato->telefone as $telefone)
                        <div class="flex px-2">
                            <select name="tipos[]" id="tipo">
                                @for ($i = 1; $i <= count($tipos); $i++)
                                    <option value="{{ $i }}"
                                        @if ($telefone->tipo_id === $i) selected @endif>
                                        {{ $tipos[$i] }}
                                    </option>
                                @endfor
                            </select>
                            <input type="text" id="telefones" name="telefones[]" class="w-full px-2 py-1 text-sm "
                                @if (isset($contato)) value='{{ $telefone->numero }}' @endif required
                                placeholder="Digite o seu telefone">

                        </div>
                        <div id="grupoTelefones">
                        </div>
                    @endforeach
                @else
                    <input type="number" id="telefones" name="telefones[]" required
                        placeholder="Digite o seu telefone">
                    <select name="tipos[]" id="tipo">
                        @for ($i = 1; $i <= count($tipos); $i++)
                            <option value="{{ $i }}">{{ $tipos[$i] }}
                            </option>
                        @endfor
                    </select>
                    <div id="grupoTelefones">
                    </div>
                @endif
            </div>
            <div class="px-2 py-1 bg-white border-t">

                <button id="botaoAdicionarTelefone" class="flex items-center gap-2">
                    <span
                        class="flex items-center justify-center w-5 h-5 text-sm font-bold text-white bg-green-400 rounded-full">+</span>
                    <span>adicionar telefone</span>
                </button>
            </div>


            <div class="px-2 py-1 mt-6 bg-white border-t">
                @for ($i = 1; $i <= count($categorias); $i++)
                    <input type="radio" id="{{ $categorias[$i] }}" name="categoria" value="{{ $i }}"
                        checked>
                    <label for="{{ $categorias[$i] }}">{{ $categorias[$i] }}</label>
                @endfor
            </div>

        </form>

        <script src="{{ asset('app.js') }}"></script>
        <script src="https://kit.fontawesome.com/573e44f26e.js" crossorigin="anonymous"></script>

</body>

</html>

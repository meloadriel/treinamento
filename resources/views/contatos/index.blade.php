<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    {{-- <link rel="stylesheet" href="{{("css/style.css")}}"> --}}
    <title>Agenda Telefonica</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center py-12">
    <button type="submit"
        class="bg-red-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:bg-red-600 mb-4"><a
            href="{{ route('contatos.create') }}">Criar Contato</a></button>
    {{-- <button type="submit"><a href="{{ route('contatos.create') }}">Criar Contato</a></button> --}}
    @foreach ($contatos as $index => $contato)
    <div class="bg-white rounded-lg shadow-md p-6 mb-4 w-96">
        <ul>
            <li class="text-xl font-semibold mb-2">
                {{ $contato->nome }}

            </li>
            <li class="text-gray-600 mb-2">
                {{ $contato->endereco->cidade }}
            </li>
            <li>
                {{ $contato->endereco->rua }}
            </li>
            <li>
                {{ $contato->endereco->numero }}
            </li>
            @if ($contato->telefone->isNotEmpty())
                <li class="text-gray-600 mb-2">
                    {{ $contato->telefone->first()->numero }}
                    @if ($contato->telefone->first()->tipo_id == 1)
                        Fixo
                    @else
                        Celular
                    @endif
                </li>
            @endif
            @if ($contato->telefone->count() > 1)
                <li>
                    <button class="text-blue-500 hover:underline" onclick="mostrarSecondNumber({{ $index }})">Mostrar
                        Segundo Número</button>
                </li>
                <li id="second-number-{{ $index }}" class="text-gray-600 mb-2 hidden">
                    {{ $contato->telefone[1]->numero }}
                    @if ($contato->telefone[1]->tipo_id == 1)
                        Fixo
                    @else
                        Celular
                    @endif
                </li>
            @endif
            <li class="mb-2">
                <a href="{{ route('contatos.edit', ['id' => $contato->id]) }}" class="text-blue-500 hover:underline">Editar Contato</a>
            </li>
            <li>
                <form action="{{ route('contatos.destroy', ['id' => $contato->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:bg-red-600 mb-4" >DELETAR CONTATO</button>
                </form>
            </li>
        </ul>
    </div>
    @endforeach

    <script>
        function mostrarSecondNumber(index) {
            var element = document.getElementById('second-number-' + index);
            if (element.style.display === "none") {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
</body>

</html>

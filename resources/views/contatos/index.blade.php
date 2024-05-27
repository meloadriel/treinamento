<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col items-center justify-center min-h-screen py-12 bg-[#ffefcc]">
    <div
        class="px-4 w-[300px] h-[550px] border-[6px] rounded-[30px] border-zinc-900 flex bg-white flex-col justify-start
   ">
        <div class="flex items-center justify-between w-full px-2 h-fit">
            <span class="text-xs">16:20</span>
            <div class="w-32 h-6 -mt-1 rounded-b-xl bg-zinc-900"></div>
            <i class="text-xs fa-solid fa-wifi"></i>
        </div>

        <div class="mt-5">
            <div class="flex items-center justify-between">
                <h1 class="mb-2 text-2xl font-bold">Contatos</h1>
                <a href="{{ route('contatos.create') }}" class="text-2xl hover:text-blue-300">+</a>
            </div>
            <div class="flex items-center gap-2 pt-3 border-t">
                <img src="https://github.com/meloadriel.png" alt="Foto de Adriel Melo" class="w-10 h-10 rounded-full">
                <h2 class="text-xs text-gray-400">Meu Cartão</h2>
            </div>
        </div>

        <ul class="mt-4 ">
            @if (count($contatos)> 0)
                @foreach ($contatos as $index => $contato)
                    <li>
                        <a href="{{ route('contatos.show', ['id' => $contato->id]) }}"
                            class="block w-full py-1 text-sm font-bold border-t"> {{ $contato->nome }} </a>
                    </li>
                @endforeach
            @else
                <li class="pt-2 text-sm font-bold text-center text-gray-500 border-t">
                    Você não tem nenhum contato cadastrado
                </li>
            @endif
        </ul>
    </div>


    <script src="https://kit.fontawesome.com/573e44f26e.js" crossorigin="anonymous"></script>

</body>

</html>

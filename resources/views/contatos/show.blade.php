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
        class=" overflow-hidden w-[300px] h-[550px] border-[6px] rounded-[30px] border-zinc-900 flex bg-white flex-col justify-start
">
        <div class="flex items-center justify-between w-full px-6 bg-zinc-200 h-fit">
            <span class="text-xs">16:20</span>
            <div class="w-32 h-6 -mt-1 rounded-b-xl bg-zinc-900"></div>
            <i class="text-xs fa-solid fa-wifi"></i>
        </div>
        <div class="flex items-center justify-between w-full px-6 py-4 bg-zinc-200">
            <a href="{{ route('contatos.index') }}"
                class="flex items-center justify-center w-5 h-5 text-white rounded-full bg-zinc-900 bg-opacity-20">
                <i class="text-xs fa-solid fa-chevron-left"></i>
            </a>
            <h1 class="text-2xl font-bold">{{ $contato->nome }}</h1>
            <a href="{{ route('contatos.edit', ['id' => $contato->id]) }}"
                class="px-2 text-sm text-white rounded-full bg-zinc-900 bg-opacity-20 ">Editar</a>
        </div>
        <ul class="flex flex-col h-full gap-3 px-2 py-3 bg-zinc-100">
            <li class="flex flex-col px-2 py-1 bg-white rounded-lg ">
                <span class="text-xs font-bold ">Celular(es)</span>
                @foreach ($contato->telefone as $telefone)
                    <span class="text-sm text-blue-400">{{ $telefone->numero }}</span>
                @endforeach
            </li>
            <li class="flex flex-col px-2 py-1 bg-white rounded-lg ">
                <span class="text-xs font-bold ">Cidade</span>
                <span class="text-sm text-blue-400">{{ $contato->endereco->cidade }}</span>
            </li>

            <li class="flex flex-col px-2 py-1 bg-white rounded-lg ">
                <span class="text-xs font-bold ">Rua</span>
                <span class="text-sm text-blue-400">{{ $contato->endereco->rua }}</span>
            </li>

            <li class="flex flex-col px-2 py-1 bg-white rounded-lg ">
                <span class="text-xs font-bold ">Número</span>
                <span class="text-sm text-blue-400">{{ $contato->endereco->numero }}</span>
            </li>

            <li class="flex flex-col px-2 py-1 bg-white rounded-lg ">
                <form action="{{ route('contatos.destroy', ['id' => $contato->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-500">Deletar Contato</button>
                </form>

            </li>


        </ul>
    </div>

    <script src="https://kit.fontawesome.com/573e44f26e.js" crossorigin="anonymous"></script>

</body>

</html>

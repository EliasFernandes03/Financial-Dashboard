<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Finanças')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 p-6 font-sans text-slate-100">

    <nav class="glass bg-white/5 rounded-2xl shadow-xl p-4 flex justify-between items-center">
        <span class="font-bold text-xl tracking-wide">Finanças Pessoais</span>
        <a
           class="bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-xl transition duration-200 ease-in-out transform hover:scale-105 font-semibold">
            Sair
        </a>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-slate-300 font-semibold mb-2 text-lg">Saldo Total</h2>
            <p class="text-3xl font-bold text-emerald-400">R$ 12.345,67</p>
        </div>

        <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-slate-300 font-semibold mb-2 text-lg">Receitas</h2>
            <p class="text-3xl font-bold text-blue-400">R$ 7.890,12</p>
        </div>

        <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-slate-300 font-semibold mb-2 text-lg">Despesas</h2>
            <p class="text-3xl font-bold text-red-400">R$ 3.210,45</p>
        </div>
    </div>

    <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 mt-6 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-slate-300 font-semibold mb-4 text-lg">Gastos por Categoria</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Alimentação</span>
                <span class="text-red-400 font-bold">R$ 1.200,00</span>
            </div>
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Transporte</span>
                <span class="text-red-400 font-bold">R$ 500,00</span>
            </div>
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Saúde</span>
                <span class="text-red-400 font-bold">R$ 300,00</span>
            </div>
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Educação</span>
                <span class="text-red-400 font-bold">R$ 400,00</span>
            </div>
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Lazer</span>
                <span class="text-red-400 font-bold">R$ 250,00</span>
            </div>
            <div class="p-4 bg-white/5 rounded-lg flex justify-between items-center">
                <span class="text-slate-200 font-medium">Outros</span>
                <span class="text-red-400 font-bold">R$ 560,00</span>
            </div>
        </div>
    </div>

    <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 mt-6 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-slate-300 font-semibold mb-4 text-lg">Últimas Transações</h2>
        <ul class="divide-y divide-white/10">
            <li class="py-3 flex justify-between items-center hover:bg-white/5 transition-colors duration-200 rounded">
                <span class="text-slate-200">Compra Supermercado</span>
                <span class="text-red-400 font-medium">- R$ 150,00</span>
            </li>
            <li class="py-3 flex justify-between items-center hover:bg-white/5 transition-colors duration-200 rounded">
                <span class="text-slate-200">Salário</span>
                <span class="text-emerald-400 font-medium">+ R$ 3.000,00</span>
            </li>
            <li class="py-3 flex justify-between items-center hover:bg-white/5 transition-colors duration-200 rounded">
                <span class="text-slate-200">Pagamento Luz</span>
                <span class="text-red-400 font-medium">- R$ 200,00</span>
            </li>
        </ul>
    </div>
</div>


</body>
</html>

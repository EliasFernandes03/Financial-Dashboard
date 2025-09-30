<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Finanças')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('http://localhost:8080/api/dashboard/index/1')
                .then(response => response.json())
                .then(data => {

                    document.querySelector('.saldo-total').textContent = `R$ ${data.data.balance.toFixed(2)}`;
                    document.querySelector('.receitas-total').textContent = `R$ ${data.data.income.toFixed(2)}`;
                    document.querySelector('.despesas-total').textContent = `R$ ${data.data.expenses.toFixed(2)}`;

                    const categoryContainer = document.getElementById('gastos-categoria-container');
                                categoryContainer.innerHTML = ''; 
                                data.data.expensesByCategory.forEach(item => {
                                    const div = document.createElement('div');
                                    div.className = 'p-4 bg-white/5 rounded-lg flex justify-between items-center';
                                    div.innerHTML = `
                                        <span class="text-slate-200 font-medium">${item.category}</span>
                                        <span class="text-red-400 font-bold">R$ ${parseFloat(item.total).toFixed(2)}</span>
                                    `;
                                    categoryContainer.appendChild(div);
                                });

                    const transactionsList = document.querySelector('.transacoes-list');
                    transactionsList.innerHTML = '';
                    data.data.recentTransactions.forEach(transaction => {
                        const li = document.createElement('li');
                        li.className = 'py-3 flex justify-between items-center hover:bg-white/5 transition-colors duration-200 rounded';
                        li.innerHTML = `
                            <span class="text-slate-200">${transaction.description}</span>
                            <span class="text-${transaction.type === 'income' ? 'emerald-400' : 'red-400'} font-medium">
                                ${transaction.type === 'income' ? '+ ' : '- '}R$ ${transaction.amount}
                            </span>
                        `;
                        transactionsList.appendChild(li);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
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
            <p class="text-3xl font-bold text-emerald-400 saldo-total"></p>
        </div>

        <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-slate-300 font-semibold mb-2 text-lg">Receitas</h2>
            <p class="text-3xl font-bold text-blue-400 receitas-total"></p>
        </div>

        <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-slate-300 font-semibold mb-2 text-lg">Despesas</h2>
            <p class="text-3xl font-bold text-red-400 despesas-total"></p>
        </div>
    </div>

    <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 mt-6 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-slate-300 font-semibold mb-4 text-lg">Gastos por Categoria</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="gastos-categoria-container">
        </div>
    </div>

    <div class="glass bg-white/5 rounded-2xl shadow-xl p-6 mt-6 hover:shadow-2xl transition-shadow duration-300">
    <h2 class="text-slate-300 font-semibold mb-4 text-lg">Últimas Transações</h2>
    <ul class="divide-y divide-white/10 transacoes-list">
    </ul>
</div>
</div>

</body>
</html>
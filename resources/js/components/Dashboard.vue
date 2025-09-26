<template>
  <div class="min-h-screen bg-gray-100 p-6 font-sans">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center rounded-lg shadow-md">
      <span class="font-bold text-xl tracking-wide">Finanças</span>
      <button @click="logout" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
        Sair
      </button>
    </nav>

    <!-- Main content -->
    <main class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
      <!-- Cards -->
      <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow duration-300">
        <h2 class="text-gray-500 font-semibold mb-2 text-lg">Saldo Total</h2>
        <p class="text-3xl font-bold text-green-600">R$ 12.345,67</p>
      </div>

      <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow duration-300">
        <h2 class="text-gray-500 font-semibold mb-2 text-lg">Receitas</h2>
        <p class="text-3xl font-bold text-blue-600">R$ 7.890,12</p>
      </div>

      <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow duration-300">
        <h2 class="text-gray-500 font-semibold mb-2 text-lg">Despesas</h2>
        <p class="text-3xl font-bold text-red-600">R$ 3.210,45</p>
      </div>

      <!-- Gráfico -->
      <div class="md:col-span-2 bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow duration-300">
        <h2 class="text-gray-500 font-semibold mb-4 text-lg">Transações Mensais</h2>
        <canvas ref="transactionsChart" height="150"></canvas>
      </div>

      <!-- Últimas transações -->
      <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow duration-300">
        <h2 class="text-gray-500 font-semibold mb-4 text-lg">Últimas Transações</h2>
        <ul class="divide-y divide-gray-200">
          <li class="py-3 flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 rounded">
            <span class="text-gray-700">Compra Supermercado</span>
            <span class="text-red-600 font-medium">- R$ 150,00</span>
          </li>
          <li class="py-3 flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 rounded">
            <span class="text-gray-700">Salário</span>
            <span class="text-green-600 font-medium">+ R$ 3.000,00</span>
          </li>
          <li class="py-3 flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 rounded">
            <span class="text-gray-700">Pagamento Luz</span>
            <span class="text-red-600 font-medium">- R$ 200,00</span>
          </li>
        </ul>
      </div>
    </main>
  </div>
</template>

<script>
import { onMounted, ref } from "vue";
import Chart from "chart.js/auto";

export default {
  name: "Dashboard",
  setup() {
    const transactionsChart = ref(null);

    const logout = () => {
      localStorage.removeItem("token");
      window.location.href = "/"; // redireciona para login
    };

    onMounted(() => {
      const ctx = transactionsChart.value.getContext("2d");
      new Chart(ctx, {
        type: "line",
        data: {
          labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"],
          datasets: [
            {
              label: "Receitas",
              data: [5000, 6000, 5500, 7000, 7500, 8000],
              borderColor: "rgb(34,197,94)",
              backgroundColor: "rgba(34,197,94,0.2)",
              tension: 0.3,
            },
            {
              label: "Despesas",
              data: [3000, 2500, 4000, 3500, 3000, 3200],
              borderColor: "rgb(239,68,68)",
              backgroundColor: "rgba(239,68,68,0.2)",
              tension: 0.3,
            },
          ],
        },
        options: { responsive: true },
      });
    });

    return { transactionsChart, logout };
  },
};
</script>

<style scoped>
/* Custom styles */
h2 {
  @apply text-gray-600;
}

canvas {
  @apply w-full;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .md:grid-cols-3 {
    grid-template-columns: 1fr;
  }
  .md:col-span-2 {
    grid-column: span 1;
  }
  .text-3xl {
    @apply text-2xl;
  }
}

/* Smooth transitions for hover effects */
.transition-shadow {
  transition-property: box-shadow;
}

/* Ensure consistent spacing and alignment */
main {
  @apply max-w-7xl mx-auto;
}

ul {
  @apply space-y-2;
}

li {
  @apply px-4;
}
</style>
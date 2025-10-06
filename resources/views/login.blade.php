<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tela de Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .glass { background: rgba(255,255,255,0.06); backdrop-filter: blur(8px); }
    .input-focus:focus { outline: none; box-shadow: 0 0 0 3px rgba(99,102,241,0.12); border-color: rgb(99,102,241); }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 flex items-center justify-center p-6">
  <main class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

    <section class="hidden md:flex flex-col items-start justify-center text-white px-8">
      <h1 class="text-4xl font-extrabold mb-4">Bem-vindo de volta</h1>
      <p class="text-slate-300 mb-6">Entre na sua conta e continue gerenciando seus projetos, tarefas e tudo mais com segurança.</p>

      <ul class="space-y-3">
        <li class="flex items-center gap-3">
          <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-indigo-600/20 text-indigo-400">⚡</span>
          <span class="text-slate-200">Login rápido com segurança</span>
        </li>
        <li class="flex items-center gap-3">
          <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-emerald-600/20 text-emerald-400">🔒</span>
          <span class="text-slate-200">Autenticação segura</span>
        </li>
      </ul>
    </section>

    <!-- Card de Login -->
    <section class="bg-white/5 glass rounded-2xl shadow-xl p-8 md:p-12 text-slate-100">
      <div class="flex items-center justify-between mb-6">
        <div>
          <h2 class="text-2xl font-bold">Entrar na conta</h2>
          <p class="text-sm text-slate-300">Use seu e-mail e senha para acessar</p>
        </div>
        <div class="text-right text-sm text-slate-400">Ainda não tem conta? <a href="#" class="text-indigo-400 font-semibold">Criar</a></div>
      </div>

      <form id="loginForm" class="space-y-4" onsubmit="handleSubmit(event)">
        <div>
          <label class="text-sm text-slate-300 block mb-1" for="email">E-mail</label>
          <input id="email" name="email" type="email" required class="w-full rounded-xl bg-white/5 border border-transparent px-4 py-3 placeholder-slate-400 input-focus" placeholder="email@exemplo.com">
        </div>

        <div>
          <label class="text-sm text-slate-300 block mb-1" for="password">Senha</label>
          <div class="relative">
            <input id="password" name="password" type="password" required minlength="6" class="w-full rounded-xl bg-white/5 border border-transparent px-4 py-3 pr-12 placeholder-slate-400 input-focus" placeholder="••••••••">
            <button type="button" id="togglePwd" class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-300 text-sm rounded px-2 py-1 hover:bg-white/5">Mostrar</button>
          </div>
        </div>

        <div class="flex items-center justify-between text-sm text-slate-300">
          <label class="flex items-center gap-2"><input type="checkbox" id="remember" class="accent-indigo-400"> Lembrar-me</label>
          <a href="#" class="text-indigo-400">Esqueci a senha</a>
        </div>

        <div>
          <button id="submitBtn" type="submit" class="w-full py-3 rounded-xl bg-indigo-500 hover:bg-indigo-600 transition font-semibold">Entrar</button>
        </div>

        <div class="relative py-3">
          <div class="absolute inset-0 flex items-center" aria-hidden>
            <div class="w-full border-t border-white/10"></div>
          </div>
          <div class="relative flex justify-center text-xs">ou entrar com</div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-white/10 py-2 text-sm">🔵 Google</button>
          <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-white/10 py-2 text-sm">🔷 Facebook</button>
        </div>
      </form>

      <p class="mt-6 text-xs text-slate-400">Ao entrar você aceita os <a href="#" class="text-indigo-400">Termos</a> e a <a href="#" class="text-indigo-400">Política de Privacidade</a>.</p>
    </section>

  </main>

<script>
  document.getElementById('togglePwd').addEventListener('click', function(){
    const password = document.getElementById('password');
    if(password.type === 'password'){
      password.type = 'text';
      this.textContent = 'Ocultar';
    } else {
      password.type = 'password';
      this.textContent = 'Mostrar';
    }
  });

  async function handleSubmit(e){
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    const original = btn.textContent;
    btn.textContent = 'Entrando...';

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
      const response = await fetch('http://localhost:8080/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ email, password })
      });

      const data = await response.json();   
      window.location.href="./dashboard"
    } catch(err){
      console.error(err);
    } 
  }
</script>

</body>
</html>

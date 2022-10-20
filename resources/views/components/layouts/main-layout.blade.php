<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document | @yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="navbar bg-neutral text-neutral-content flex justify-between">
      <div>
        <a href="/" class="btn btn-ghost normal-case text-xl">BOOK-STORE</a>
      </div>
        <ul class="flex space-x-5 text-white" id="navitem">
          @guest
            <li class="font-bold hover:underline hover:underline-offset-8"><a href="{{ route('login')}}">Connexion</a></li>
            <li class="font-bold hover:underline hover:underline-offset-8"><a href="{{ route('register')}}">Inscription</a></li>
          @endguest
          @auth
          <a href="dashboard">Dashboard</a>
          <li>
            <form class="inline" method="POST" action="/logout">
              @csrf
              <button type="submit">
                <i class="font-bold hover:underline hover:underline-offset-8">Déconnexion</i>
              </button>
            </form>
          </li>
          @endauth
      </ul>
    </div>
    
    {{ $slot }}
    <footer class="footer p-10 bg-neutral text-neutral-content flex justify-around">
        <div>
          <span class="footer-title">Services</span> 
          <a class="link link-hover">Branding</a>
          <a class="link link-hover">Design</a>
          <a class="link link-hover">Marketing</a>
          <a class="link link-hover">Advertisement</a>
        </div> 
        <div>
          <span class="footer-title">Company</span> 
          <a class="link link-hover">About us</a>
          <a class="link link-hover">Contact</a>
          <a class="link link-hover">Jobs</a>
          <a class="link link-hover">Press kit</a>
        </div> 
        <div>
          <span class="footer-title">Legal</span> 
          <a class="link link-hover">Terms of use</a>
          <a class="link link-hover">Privacy policy</a>
          <a class="link link-hover">Cookie policy</a>
        </div>
      </footer>
</body>
</html>
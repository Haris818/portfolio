<!DOCTYPE html>
<html lang="en" x-data="app()" :class="{'dark':dark}" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Haris — Freelance UI/UX Designer and Frontend Developer. Fast, clean and accessible digital products.">
<meta name="keywords" content="freelance developer, UI designer, portfolio, Tailwind CSS, Alpine.js">
<meta name="author" content="Haris">
<meta property="og:title" content="Haris — Freelance UI/UX Designer">
<meta property="og:description" content="I design and build digital products that people love to use.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://eliott.dev">
<title>Haris — Freelance Frontend developer&amp; Backend Devloper</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">

<script>
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: { display: ['PT Sans','sans-serif'], body: ['DM Sans','sans-serif'] },
      colors: { accent: '#FF6B2B', 'accent-light': '#FF8F5C' }
    }
  }
}
</script>

<style>
*,*::before,*::after{box-sizing:border-box}
html,body{font-family:'DM Sans',sans-serif}
h1,h2,h3,h4,h5,h6{font-family:'PT Sans',sans-serif}
body{transition:background-color .3s,color .3s}

/* noise overlay */
body::before{content:'';position:fixed;inset:0;pointer-events:none;z-index:0;opacity:.35;
background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.05'/%3E%3C/svg%3E")}

/* scrollbar */
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:#FF6B2B;border-radius:99px}

/* reveal on scroll */
.reveal{opacity:0;transform:translateY(26px);transition:opacity .6s cubic-bezier(.4,0,.2,1),transform .6s cubic-bezier(.4,0,.2,1)}
.reveal.in{opacity:1;transform:none}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

/* nav underline animation */
.nl{position:relative}
.nl::after{content:'';position:absolute;bottom:-2px;left:0;width:0;height:1.5px;background:currentColor;transition:width .22s cubic-bezier(.4,0,.2,1)}
.nl:hover::after,.nl.on::after{width:100%}
.nl.on{font-weight:500}

/* shimmer button */
.shimmer{position:relative;overflow:hidden}
.shimmer::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:rgba(255,255,255,.18);transform:skewX(-20deg);transition:left .4s cubic-bezier(.4,0,.2,1)}
.shimmer:hover::after{left:160%}

/* photo frames */
.pf{overflow:hidden;background:#d4d4d8}
.pf img{width:100%;height:100%;object-fit:cover;display:block}

/* card hover */
.card-h{transition:transform .28s cubic-bezier(.4,0,.2,1),border-color .18s}
.card-h:hover{transform:translateY(-4px)}

/* skill tag */
.stag{transition:border-color .18s}

[x-cloak]{display:none!important}
</style>
</head>

<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

<!-- ═══ NAV ═══ -->
<header class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
  :class="sc?'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5':''">
  <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">

    <a href="#hero" class="font-display font-bold text-xl tracking-tight relative z-10">
      <span class="text-zinc-900 dark:text-white">Har</span><span class="text-accent">is</span>
    </a>

    <ul class="hidden md:flex items-center gap-8 text-sm" role="list">
      <li><a href="#services" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='services'?'on !text-zinc-900 dark:!text-white':''">Services</a></li>
      <li><a href="#work"     class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='work'?'on !text-zinc-900 dark:!text-white':''">Work</a></li>
      <li><a href="#about"   class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='about'?'on !text-zinc-900 dark:!text-white':''">About</a></li>
      <li><a href="#reviews" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='reviews'?'on !text-zinc-900 dark:!text-white':''">Reviews</a></li>
      <li><a href="#login.html"    class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='blog'?'on !text-zinc-900 dark:!text-white':''">Admin</a></li>
      <li><a href="#contact" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='contact'?'on !text-zinc-900 dark:!text-white':''">Contact</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <!-- dark toggle -->
      <button @click="dark=!dark" class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors" :aria-label="dark?'Light mode':'Dark mode'">
        <svg x-show="!dark" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        <svg x-show="dark"  class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
      </button>
      <!-- hire me -->
      <a href="#contact" class="hidden md:inline-flex items-center gap-2 shimmer bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">
        Hire me <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
      <!-- hamburger -->
      <button @click="mm=!mm" class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800" :aria-expanded="mm" aria-label="Toggle menu">
        <svg x-show="!mm" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        <svg x-show="mm"  class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
  </nav>

  <!-- mobile menu -->
  <div x-show="mm" x-cloak
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
    class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
    <ul class="flex flex-col px-6 py-5 gap-4 text-sm font-medium" role="list">
      <li><a href="#services" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Services</a></li>
      <li><a href="#work"     @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Work</a></li>
      <li><a href="#about"   @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">About</a></li>
      <li><a href="#reviews" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Reviews</a></li>
      <li><a href="#login.html"    @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Admin</a></li>
      <li><a href="#contact" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Contact</a></li>
      <li class="pt-2 border-t border-zinc-100 dark:border-zinc-900">
        <a href="#contact" @click="mm=false" class="inline-flex shimmer bg-accent text-white font-medium text-sm px-5 py-2.5 rounded-full">Hire me →</a>
      </li>
    </ul>
  </div>
</header>

<main>

<!-- ═══ HERO ═══ -->
<section id="hero" class="relative min-h-screen flex items-center pt-16 overflow-hidden">
  <div class="absolute top-1/4 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
  <div class="absolute bottom-1/4 left-0 w-64 h-64 bg-zinc-200/50 dark:bg-zinc-800/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-24 w-full">
    <div class="grid md:grid-cols-2 gap-12 items-center">

      <div>
        <p class="reveal text-sm font-medium text-accent tracking-widest uppercase mb-4">Available for work</p>
        <h1 class="reveal d1 font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.05] tracking-tight text-zinc-900 dark:text-white mb-6">
          Hi, I'm <span class="text-accent">Haris</span>
        </h1>
        <p class="reveal d2 text-lg md:text-xl text-zinc-500 dark:text-zinc-400 font-light leading-relaxed max-w-md mb-10">
          Freelance <strong class="font-medium text-zinc-700 dark:text-zinc-300">

Frontend Developer & Backend Developer. I design and develop modern, responsive, and user-friendly digital products with clean code, smooth functionality, and a focus on performance and accessibility.

        </p>
        <div class="reveal d3 flex flex-wrap gap-4">
          <a href="#work" class="shimmer inline-flex items-center gap-2 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors text-sm">
            View my work
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </a>
          <a href="#contact" class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm">Get in touch</a>
        </div>
        <div class="reveal d4 flex gap-8 mt-14 pt-8 border-t border-zinc-100 dark:border-zinc-900">
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">3+</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Projects done</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">3+</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Happy clients</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">6m</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Experience</p></div>
        </div>
      </div>

      <div class="reveal d2 flex justify-center md:justify-end">
        <div class="relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96">
          <div class="pf w-full h-full rounded-3xl">
            <img src="WhatsApp Image 2026-08-12 at 9.24.44 PM.jpeg" alt="Eliott — Freelance UI/UX Designer" loading="eager">
          </div>
          <div class="absolute -bottom-4 -left-4 bg-accent text-white font-display font-bold text-sm px-4 py-2.5 rounded-2xl shadow-lg">Open to projects</div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ═══ SERVICES ═══ --> 
<section id="services" class="py-24 bg-zinc-50 dark:bg-zinc-900/40"> 
  <div class="max-w-6xl mx-auto px-6"> 
    <div class="mb-14"> 
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">What I do</p> 
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Services</h2> 
    </div> 
    <div class="grid md:grid-cols-3 gap-6"> 
 
      <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent"> 
        <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors"> 
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-2"/></svg> 
        </div> 
        <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Frontend Development</h3> 
        <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Modern and responsive websites built with HTML, CSS, JavaScript, React, Angular and Bootstrap. Clean interfaces designed for great performance and user experience.</p> 
      </article> 
 
      <article class="reveal d2 card-h group bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-800 hover:border-accent"> 
        <div class="w-12 h-12 flex items-center justify-center bg-zinc-800 dark:bg-zinc-700 rounded-xl mb-6 group-hover:bg-accent/20 transition-colors"> 
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg> 
        </div> 
        <h3 class="font-display font-bold text-xl text-white mb-3">Backend Development</h3> 
        <p class="text-sm text-zinc-400 leading-relaxed">Powerful backend solutions using PHP, Laravel, Node.js, MySQL and MongoDB. Secure, scalable and reliable systems built to support modern web applications.</p> 
      </article> 
 
      <article class="reveal d3 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent"> 
        <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors"> 
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg> 
        </div> 
        <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Full-Stack & E-Commerce</h3> 
        <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Complete web solutions using MERN Stack, Laravel and WordPress. From business websites to e-commerce platforms, I build functional and user-friendly digital products.</p> 
      </article> 
 
    </div> 
  </div> 
</section> 



<!-- ═══ WORK ═══ -->
<section id="work" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
      <div>
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Portfolio</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Selected work</h2>
      </div>
      <a href="projects.html" class="reveal d1 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors self-start sm:self-auto nl">All projects →</a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">

      <article class="card-h reveal d1 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent md:row-span-2">
        <div class="pf w-full h-64 md:h-80">
          <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=900&q=80" alt="Fitness Tracker MERN Project" loading="lazy">
        </div>
        <div class="p-7">
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="text-xs bg-orange-50 dark:bg-zinc-800 text-accent border border-orange-200 dark:border-zinc-700 px-3 py-1 rounded-full">MERN Stack</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">React</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Node.js</span>
          </div>
          <a href="https://github.com/Haris818/eporject" target="_blank" rel="noopener noreferrer">
            <h3 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-2">Fitness & Gym Website</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-5">A modern fitness-focused web project built with React and modern frontend technologies. The project focuses on responsive design, clean user interfaces and a smooth user experience.<br><br>Designed and developed with a strong focus on performance, usability and modern web development practices.<br><br>Built as part of my frontend and full-stack development portfolio.</p>
          <a href="https://github.com/Haris818/eporject" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">View project <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
        </div>
      </article>

      <article class="card-h reveal d2 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80" alt="E-Commerce Website" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-orange-50 dark:bg-zinc-800 text-accent border border-orange-200 dark:border-zinc-700 px-3 py-1 rounded-full">E-Commerce</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">React</span>
          </div>
          <a href="https://github.com/Haris818/SCHOOL" target="_blank" rel="noopener noreferrer">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">School Website</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">A responsive e-commerce website designed and developed with modern frontend technologies, focusing on clean layouts, product presentation and user-friendly navigation.</p>
          <a href="https://github.com/Haris818/SCHOOL" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">View project →</a>
        </div>
      </article>

      <article class="card-h reveal d3 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=800&q=80" alt="Flutter Project" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-orange-50 dark:bg-zinc-800 text-accent border border-orange-200 dark:border-zinc-700 px-3 py-1 rounded-full">Flutter</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Mobile App</span>
          </div>
          <a href="https://github.com/Haris818/Fluter-project" target="_blank" rel="noopener noreferrer">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">Flutter Application</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">A Flutter-based mobile application project focused on building a modern, responsive and user-friendly mobile experience.</p>
          <a href="https://github.com/Haris818/Fluter-project" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">View project →</a>
        </div>
      </article>

    </div>
  </div>
</section>



<!-- ═══ ABOUT ═══ -->
<section id="about" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-16 items-center">

      <div class="reveal order-2 md:order-1">
        <div class="pf w-full aspect-square max-w-sm mx-auto rounded-3xl">
          <img src="WhatsApp Image 2026-08-12 at 9.39.39 PM.jpeg" alt="Eliott" loading="lazy">
        </div>
      </div>

      <div class="order-1 md:order-2">
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">About me</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white leading-tight mb-6">A bit about<br>who I am</h2>
        <p class="reveal d2 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">
I'm Haris, a freelance designer and Full-Stack Developer based in Pakistan. I specialize in creating modern, responsive, and user-friendly digital experiences, combining creative design with clean and efficient code. I work on websites and digital products for businesses, startups, and clients, turning ideas into professional and functional solutions.

        </p>
        <p class="reveal d3 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-8">
         

I believe great digital experiences should be simple, intuitive, and easy to use. My work focuses on clean design, responsive interfaces, and efficient code that delivers a smooth user experience. When I'm not coding or designing, I enjoy going to the gym, playing badminton, cricket, football, and listening to music.

        </p>
        <div class="reveal d4">
          <p class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mb-3">Stack &amp; tools</p>
          <div class="flex flex-wrap gap-2" role="list" aria-label="Skills">
                        <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">MS OFFICE</span>
                                    <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">DATA ENTRY</span>
                                                <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">TYPIN FAST AND ACUURATE</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">HTML / CSS</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">CSS</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">JAVASCRIPT</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">JQUERY</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">BOOTSTRAP</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">REACT JS</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">PHP</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">LARAVEL</span>
                        <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">NODE.JS</span>
                                    <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">EXPRESS.JS</span>
                                                <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">ASP.NET CORE</span>
                                                            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">C#</span>
                                                                        <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">R PROGRAMING</span>
                                                                                    <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">TABLEAU</span>
                                                                        <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">MYSQL</span>
                                                                                    <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">MONGODB</span>
                                                                                                <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">SQL SERVER</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section id="reviews" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-14">
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Social proof</p>
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">What clients say</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

      <blockquote class="reveal d1 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-6 italic">"Eliott delivered our redesign in record time and the quality blew us away. Our conversion rate jumped 28% in the first month. Absolutely recommend."</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="https://i.pravatar.cc/80?img=11" alt="Sarah Müller" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-zinc-900 dark:text-white">Sarah Müller</p>
            <p class="text-xs text-zinc-500">CPO, Novu</p>
          </div>
        </footer>
      </blockquote>

      <blockquote class="reveal d2 bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-7 border border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-400 text-sm leading-relaxed mb-6 italic">"Working with Eliott is a dream. He asks the right questions, moves fast, and the final result always exceeds what we imagined. Our best hire of 2024."</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="https://i.pravatar.cc/80?img=52" alt="Thomas Renault" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-white">Thomas Renault</p>
            <p class="text-xs text-zinc-500">Founder, Finlo</p>
          </div>
        </footer>
      </blockquote>

      <blockquote class="reveal d3 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-6 italic">"We had a tight deadline and a vague brief. Eliott turned both into a polished site in under two weeks. Clean code, zero hand-holding needed."</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="https://i.pravatar.cc/80?img=47" alt="Camille Dufresne" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-zinc-900 dark:text-white">Camille Dufresne</p>
            <p class="text-xs text-zinc-500">Creative Director, Orea</p>
          </div>
        </footer>
      </blockquote>

    </div>
  </div>
</section>




<!-- ═══ CONTACT ═══ -->
<section id="contact" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-10 md:p-16 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
      <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>

      <div class="relative z-10 grid md:grid-cols-2 gap-12 items-start">

        <div>
          <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Get in touch</p>
          <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-white leading-tight mb-5">Let's work<br>together</h2>
          <p class="reveal d2 text-zinc-400 leading-relaxed mb-8">I'm open to frontend, backend and full-stack development projects, short or long-term. Websites, e-commerce platforms, business applications, or custom web solutions — let's talk.</p>

          <div class="reveal d3 flex flex-col gap-4">

            <a href="mailto:harismemon422@gmail.com" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </span>
              <span class="text-sm">harismemon422@gmail.com</span>
            </a>

            <a href="https://github.com/Haris818" rel="noopener noreferrer" target="_blank" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524-.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
              </span>
              <span class="text-sm">github.com/Haris818</span>
            </a>

          </div>
        </div>

        <div class="reveal d2">

          <form action="submit_contact.php" method="POST">

            <div class="flex flex-col gap-4">

              <div class="grid sm:grid-cols-2 gap-4">

                <div>
                  <label for="fname" class="block text-xs font-medium text-zinc-400 mb-1.5">
                    Name <span aria-hidden="true">*</span>
                  </label>

                  <input
                    type="text"
                    id="fname"
                    name="name"
                    placeholder="Your Name"
                    required
                    autocomplete="name"
                    class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
                </div>

                <div>
                  <label for="femail" class="block text-xs font-medium text-zinc-400 mb-1.5">
                    Email <span aria-hidden="true">*</span>
                  </label>

                  <input
                    type="email"
                    id="femail"
                    name="email"
                    placeholder="your@email.com"
                    required
                    autocomplete="email"
                    class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
                </div>

              </div>

              <div>
                <label for="fsubject" class="block text-xs font-medium text-zinc-400 mb-1.5">
                  Subject
                </label>

                <input
                  type="text"
                  id="fsubject"
                  name="subject"
                  placeholder="Project inquiry"
                  class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
              </div>

              <div>
                <label for="fmessage" class="block text-xs font-medium text-zinc-400 mb-1.5">
                  Message <span aria-hidden="true">*</span>
                </label>

                <textarea
                  id="fmessage"
                  name="message"
                  rows="4"
                  placeholder="Tell me about your project..."
                  required
                  class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors resize-none"></textarea>
              </div>

              <button
                type="submit"
                class="shimmer w-full bg-accent text-white font-display font-bold text-sm py-3.5 rounded-xl hover:bg-accent-light transition-colors">
                Send message →
              </button>

            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
</section>

</main>

<footer class="border-t border-zinc-100 dark:border-zinc-900">
  <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
    <p class="text-sm text-zinc-400">© <span id="yr"></span> Haris. All rights reserved. <br> <a href="" target="_blank" class="font-bold"></a>  <a href="https://themewagon.com/" target="_blank" class="font-bold"></a></p>
    <p class="text-xs text-zinc-500">Built with
      <a href="https://tailwindcss.com" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">Tailwind CSS</a>
      &amp;
      <a href="https://alpinejs.dev" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">Alpine.js</a>
    </p>
  </div>
</footer>

<script>
function app() {
  return {
    dark: false,
    mm: false,
    sc: false,
    s: 'hero',

    init() {
      // dark mode
      this.dark = localStorage.getItem('theme') === 'dark' ||
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
      this.$watch('dark', v => localStorage.setItem('theme', v ? 'dark' : 'light'));

      // scroll
      window.addEventListener('scroll', () => {
        this.sc = window.scrollY > 20;
        this.updateSection();
      }, { passive: true });

      // reveal
      const io = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
      }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
      document.querySelectorAll('.reveal').forEach(el => io.observe(el));

      // year
      document.getElementById('yr').textContent = new Date().getFullYear();
    },

    updateSection() {
      const atBottom = (window.innerHeight + window.scrollY) >= document.body.scrollHeight - 60;
      if (atBottom) { this.s = 'contact'; return; }
      const ids = ['contact','blog','reviews','about','work','services','hero'];
      for (const id of ids) {
        const el = document.getElementById(id);
        if (el && window.scrollY >= el.offsetTop - 130) { this.s = id; return; }
      }
    }
  }
}
</script>

</body>
</html>

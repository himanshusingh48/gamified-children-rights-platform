<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Rights4Kids</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Nunito', sans-serif; background: #f5f7ff; }

        /* ── NAVBAR ── */
        .navbar { background: #5c6bc0; }
        .navbar-brand, .nav-link { color: #fff !important; font-weight: 800; transition: opacity .2s; }
        .nav-link:hover { opacity: .75; }
        .navbar-brand { animation: fadeDown .5s ease both; }

        /* ── BUTTONS ── */
        .btn-main  { background: #ff6b6b; color: #fff; border: none; font-weight: 800; border-radius: 50px;
                     padding: 10px 28px; transition: transform .2s, box-shadow .2s; }
        .btn-main:hover  { background: #ff5252; color: #fff; transform: translateY(-3px);
                           box-shadow: 0 8px 20px rgba(255,107,107,.45); }
        .btn-green { background: #26a69a; color: #fff; border: none; font-weight: 800; border-radius: 50px;
                     padding: 10px 28px; transition: transform .2s, box-shadow .2s; }
        .btn-green:hover { background: #00897b; color: #fff; transform: translateY(-3px);
                           box-shadow: 0 8px 20px rgba(38,166,154,.45); }
        .btn:active { transform: scale(.96) !important; }

        /* ── CARDS ── */
        .topic-card { border-radius: 18px; border: none; box-shadow: 0 4px 16px rgba(0,0,0,.1);
                      transition: transform .3s cubic-bezier(.34,1.56,.64,1), box-shadow .3s; }
        .topic-card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 20px 40px rgba(0,0,0,.15); }

        /* ── FOOTER ── */
        footer { background: #3949ab; color: #fff; padding: 30px 0; margin-top: 60px; }
        footer a { color: #c5cae9; text-decoration: none; }

        /* ══════════════════════════════════════
           GLOBAL KEYFRAME ANIMATIONS
           Used on every page via utility classes
        ══════════════════════════════════════ */

        @keyframes fadeUp {
          from { opacity: 0; transform: translateY(28px); }
          to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeDown {
          from { opacity: 0; transform: translateY(-20px); }
          to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
          0%,100% { transform: translateY(0); }
          50%      { transform: translateY(-12px); }
        }
        @keyframes pop {
          0%   { transform: scale(0); opacity: 0; }
          70%  { transform: scale(1.15); }
          100% { transform: scale(1); opacity: 1; }
        }
        @keyframes pulseGlow {
          0%,100% { box-shadow: 0 0 0 8px rgba(92,107,192,.2); }
          50%      { box-shadow: 0 0 24px 12px rgba(92,107,192,.5); }
        }
        @keyframes slideRight {
          from { opacity: 0; transform: translateX(40px); }
          to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes bounce {
          0%,100% { transform: translateY(0); }
          40%      { transform: translateY(-16px); }
          60%      { transform: translateY(-8px); }
        }
        @keyframes shimmer {
          0%   { background-position: -400px 0; }
          100% { background-position:  400px 0; }
        }

        /* ── UTILITY ANIMATION CLASSES ── */
        .anim-fade-up    { animation: fadeUp .6s ease both; }
        .anim-float      { animation: float 3s ease-in-out infinite; }
        .anim-pop        { animation: pop .5s cubic-bezier(.34,1.56,.64,1) both; }
        .anim-pulse      { animation: pulseGlow 2s ease-in-out infinite; }
        .anim-bounce     { animation: bounce 2s ease-in-out infinite; }
        .anim-slide-right{ animation: slideRight .5s ease both; }

        /* Stagger helper delays */
        .delay-1 { animation-delay: .1s; }
        .delay-2 { animation-delay: .2s; }
        .delay-3 { animation-delay: .3s; }
        .delay-4 { animation-delay: .4s; }
        .delay-5 { animation-delay: .5s; }
        .delay-6 { animation-delay: .6s; }

        /* Progress bar transition */
        .progress-bar { transition: width 1s ease; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fs-4" href="/">⭐ Rights4Kids</a>
    <button class="navbar-toggler border-white" type="button"
            data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon" style="filter:invert(1)"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto gap-2 anim-fade-up">
        <li class="nav-item"><a class="nav-link" href="/">🏠 Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/topics">📚 Topics</a></li>
        <li class="nav-item"><a class="nav-link" href="/dashboard">📊 Dashboard</a></li>
        <li class="nav-item"><a class="btn btn-main btn-sm" href="/login">🔐 Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- PAGE CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="text-center">
  <p class="mb-1 fw-bold">⭐ Rights4Kids — Empowering every child!</p>
  <p class="small mb-0">
    <a href="/">Home</a> &nbsp;|&nbsp;
    <a href="/topics">Topics</a> &nbsp;|&nbsp;
    <a href="/quiz">Quiz</a> &nbsp;|&nbsp;
    <a href="/dashboard">Dashboard</a>
  </p>
  <p class="small mt-2 mb-0">© 2024 Rights4Kids ❤️</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scroll-triggered fade-up for any element with class .reveal -->
<script>
const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('anim-fade-up');
            revealObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.15 });
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
</script>

@stack('scripts')
</body>
</html>

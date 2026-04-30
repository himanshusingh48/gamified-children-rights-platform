@extends('layouts.app')
@section('title', 'Quiz')

@section('content')
<div class="container py-5" style="max-width:700px">

  {{-- HEADER --}}
  <div class="text-white rounded-4 p-4 mb-4 anim-fade-up"
       style="background:linear-gradient(135deg,#5c6bc0,#9c27b0)">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <span class="badge bg-white text-primary fw-black px-3 py-2">✏️ Right to Education</span>
      <span class="fw-black bg-white bg-opacity-20 px-3 py-1 rounded-pill" id="timer">⏱️ 10:00</span>
    </div>
    <div class="fw-black fs-5 mb-2">
      Question <span id="qNum">1</span> of <span id="qTotal">5</span>
    </div>
    <div class="progress rounded-pill" style="height:10px">
      <div class="progress-bar bg-warning" id="qBar" style="width:20%"></div>
    </div>
  </div>

  {{-- QUESTION CARD --}}
  <div class="bg-white rounded-4 shadow-sm p-4 mb-3" id="questionCard" style="animation: slideRight .4s ease">
    <p class="fw-black fs-5 mb-4" id="qText">Loading...</p>

    <div id="optGrid" class="d-flex flex-column gap-3"></div>

    {{-- Feedback --}}
    <div id="feedback" class="alert mt-3 d-none fw-bold rounded-4"></div>
  </div>

  {{-- BOTTOM ROW --}}
  <div class="d-flex justify-content-between align-items-center anim-fade-up delay-2">
    <span class="fw-black text-muted">
      🏆 Score: <span id="liveScore" class="text-primary fs-5">0</span>/<span id="liveTotal">5</span>
    </span>
    <button class="btn btn-main px-4" id="nextBtn" onclick="next()" disabled>Next ➡️</button>
  </div>

</div>
@endsection

@push('scripts')
<script>
const questions = [
  { q: "What does the Right to Education mean?",
    opts: ["Only rich kids go to school","Every child can access free education","Only boys can study","Education is optional"],
    ans: 1, exp: "✅ Every child — everywhere — has the right to free primary education!" },

  { q: "Which UN document protects children's rights?",
    opts: ["Declaration of Independence","UN Charter","Convention on the Rights of the Child","The Constitution"],
    ans: 2, exp: "✅ The UNCRC (1989) protects the rights of every child in 193 countries!" },

  { q: "What is the main purpose of education?",
    opts: ["To pass exams only","To develop personality, talents and skills","To keep kids busy","To learn one subject"],
    ans: 1, exp: "✅ Education develops the whole child — talents, values and personality!" },

  { q: "Can school punishment violate a child's dignity?",
    opts: ["Yes, it's allowed","Only for serious cases","No — dignity must always be respected","Yes, if parents agree"],
    ans: 2, exp: "✅ No punishment may ever humiliate or harm a child's dignity!" },

  { q: "If a girl is stopped from going to school, who should help?",
    opts: ["No one","Only her father","Adults, governments and communities","Only teachers"],
    ans: 2, exp: "✅ Everyone must ensure every child's right to education!" },
];

let current = 0, score = 0, secs = 600;

function render() {
  const q = questions[current];
  document.getElementById('qNum').textContent  = current + 1;
  document.getElementById('qText').textContent  = q.q;
  document.getElementById('qBar').style.width   = ((current+1)/questions.length*100) + '%';
  document.getElementById('feedback').className = 'alert mt-3 d-none';
  document.getElementById('nextBtn').disabled   = true;

  // Animate card slide-in
  const card = document.getElementById('questionCard');
  card.style.animation = 'none';
  card.offsetHeight; // reflow
  card.style.animation = 'slideRight .4s ease';

  const grid = document.getElementById('optGrid');
  grid.innerHTML = '';
  ['A','B','C','D'].forEach((letter, i) => {
    const btn = document.createElement('button');
    // Staggered fade-up for each option
    btn.className = 'btn btn-outline-secondary text-start fw-bold p-3 rounded-4 anim-fade-up';
    btn.style.animationDelay = (i * 0.08) + 's';
    btn.style.transition = 'transform .15s, box-shadow .15s';
    btn.innerHTML = `<strong>${letter}.</strong> ${q.opts[i]}`;
    btn.onmouseenter = () => { if (!btn.disabled) btn.style.transform = 'translateX(6px)'; };
    btn.onmouseleave = () => { btn.style.transform = ''; };
    btn.onclick = () => pick(i, btn, q);
    grid.appendChild(btn);
  });
}

function pick(i, btn, q) {
  document.querySelectorAll('#optGrid button').forEach(b => {
    b.disabled = true;
    b.onmouseenter = null;
  });

  const fb = document.getElementById('feedback');
  fb.classList.remove('d-none');

  if (i === q.ans) {
    btn.classList.replace('btn-outline-secondary','btn-success');
    // Score bounce animation
    const liveScore = document.getElementById('liveScore');
    liveScore.style.animation = 'bounce .5s ease';
    setTimeout(() => liveScore.style.animation = '', 500);
    fb.className = 'alert alert-success mt-3 fw-bold rounded-4';
    score++;
    liveScore.textContent = score;
  } else {
    btn.classList.replace('btn-outline-secondary','btn-danger');
    document.querySelectorAll('#optGrid button')[q.ans].classList.replace('btn-outline-secondary','btn-success');
    fb.className = 'alert alert-danger mt-3 fw-bold rounded-4';
  }
  fb.textContent = q.exp;
  document.getElementById('nextBtn').disabled = false;
  if (current === questions.length - 1) document.getElementById('nextBtn').textContent = '🏆 See Results!';
}

function next() {
  if (current < questions.length - 1) { current++; render(); }
  else window.location.href = `/results?score=${score}&total=${questions.length}`;
}

// Countdown timer
const tm = setInterval(() => {
  if (--secs <= 0) { clearInterval(tm); next(); }
  const m = String(Math.floor(secs/60)).padStart(2,'0');
  const s = String(secs%60).padStart(2,'0');
  const el = document.getElementById('timer');
  el.textContent = `⏱️ ${m}:${s}`;
  if (secs < 60) el.style.color = '#ff6b6b'; // warn when low
}, 1000);

document.getElementById('liveTotal').textContent = questions.length;
render();
</script>
@endpush

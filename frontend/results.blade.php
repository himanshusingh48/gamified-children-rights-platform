@extends('layouts.app')
@section('title', 'Results')

@section('content')
<div class="container py-5" style="max-width:580px">
  <div class="bg-white rounded-4 shadow overflow-hidden anim-fade-up">

    {{-- SCORE BANNER --}}
    <div id="banner" class="text-white text-center py-5 position-relative overflow-hidden">
      {{-- Confetti dots injected by JS for top scores --}}
      <div id="confetti"></div>
      <div class="display-2 anim-bounce" id="bigEmoji">🏆</div>
      <h2 class="fw-black mt-2" id="resultMsg">...</h2>

      {{-- Pulsing score circle --}}
      <div class="mx-auto mt-3 anim-pulse"
           style="width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,.2);
                  border:3px solid rgba(255,255,255,.4);display:flex;align-items:center;
                  justify-content:center;flex-direction:column;">
        <div class="fw-black" style="font-size:2rem;line-height:1" id="scoreText">-</div>
        <div class="small opacity-75">Score</div>
      </div>

      {{-- Stars --}}
      <div id="stars" class="mt-3 fs-2"></div>
    </div>

    {{-- BODY --}}
    <div class="p-4">

      {{-- Badge (pop animation) --}}
      <div class="text-center border border-warning rounded-4 p-4 mb-4" style="background:#fffbea">
        <div class="display-4 anim-pop" id="badgeIcon">🏅</div>
        <div class="fw-black fs-5 mt-2" id="badgeName">Badge Earned!</div>
        <span class="badge bg-warning text-dark mt-1 anim-fade-up delay-3">✨ NEW BADGE!</span>
      </div>

      {{-- Breakdown --}}
      <table class="table fw-bold reveal">
        <tr><td class="text-muted">✅ Correct</td>  <td id="tdCorrect" class="text-success text-end fw-black">-</td></tr>
        <tr><td class="text-muted">❌ Wrong</td>    <td id="tdWrong"   class="text-danger  text-end fw-black">-</td></tr>
        <tr><td class="text-muted">🏆 Points</td>   <td id="tdPoints"  class="text-primary text-end fw-black">-</td></tr>
      </table>

      <a href="/dashboard"  class="btn btn-main   w-100 mb-2">📊 Go to Dashboard</a>
      <a href="/quiz"       class="btn btn-outline-secondary w-100 mb-2">🔄 Try Again</a>
      <a href="/topics"     class="btn btn-outline-secondary w-100">📚 More Topics</a>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
const p     = new URLSearchParams(location.search);
const score = +(p.get('score') || 4);
const total = +(p.get('total') || 5);
const pct   = Math.round(score / total * 100);

const tier =
  pct >= 80 ? { msg:'Outstanding! Rights Champion! 🌟', emoji:'🏆', color:'#26a69a', stars:3, badge:'🥇', name:'Rights Champion' } :
  pct >= 60 ? { msg:'Great Job! Keep it up! 🎉',        emoji:'🎉', color:'#5c6bc0', stars:2, badge:'🥈', name:'Rights Learner'  } :
  pct >= 40 ? { msg:'Nice Try! Almost there! 💪',       emoji:'👍', color:'#ff9800', stars:1, badge:'🥉', name:'Rights Explorer' } :
              { msg:"Don't give up! Try again! 😊",     emoji:'💪', color:'#78909c', stars:0, badge:'⭐', name:'Brave Learner'   };

// Apply
document.getElementById('banner').style.background = `linear-gradient(135deg,${tier.color},${tier.color}bb)`;
document.getElementById('bigEmoji').textContent  = tier.emoji;
document.getElementById('resultMsg').textContent = tier.msg;
document.getElementById('scoreText').textContent = `${score}/${total}`;
document.getElementById('badgeIcon').textContent = tier.badge;
document.getElementById('badgeName').textContent = tier.name;
document.getElementById('tdCorrect').textContent = `${score}/${total}`;
document.getElementById('tdWrong').textContent   = `${total-score}/${total}`;
document.getElementById('tdPoints').textContent  = `+${score*10} pts`;

// Stars with stagger
const starsEl = document.getElementById('stars');
[...Array(3)].forEach((_, i) => {
  const s = document.createElement('span');
  s.textContent = i < tier.stars ? '⭐' : '☆';
  s.style.cssText = `animation: pop .5s cubic-bezier(.34,1.56,.64,1) ${.2 + i*.15}s both; display:inline-block`;
  starsEl.appendChild(s);
});

// Confetti for excellent score
if (pct >= 80) {
  const colors = ['#ff6b6b','#ffe66d','#4ecdc4','#a29bfe','#26a69a'];
  const conf = document.getElementById('confetti');
  for (let i = 0; i < 30; i++) {
    const dot = document.createElement('div');
    const size = 8 + Math.random() * 10;
    dot.style.cssText = `
      position:absolute; border-radius:${Math.random()>.5?'50%':'3px'};
      width:${size}px; height:${size}px;
      background:${colors[i%colors.length]};
      left:${Math.random()*100}%;
      animation: fadeUp ${1.5+Math.random()*2}s ease ${Math.random()*1.5}s both;
      opacity:.8;
    `;
    conf.appendChild(dot);
  }
}
</script>
@endpush

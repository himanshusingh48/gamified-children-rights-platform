@extends('layouts.app')
@section('title', 'My Dashboard')

@section('content')

{{-- HERO --}}
<div class="text-white py-5 position-relative overflow-hidden"
     style="background:linear-gradient(135deg,#5c6bc0,#9c27b0)">
  <div class="position-absolute rounded-circle opacity-10 anim-float"
       style="width:280px;height:280px;background:#fff;top:-80px;right:-80px;"></div>
  <div class="container d-flex align-items-center gap-4 anim-fade-up">
    <div class="fs-1 bg-white bg-opacity-25 rounded-circle p-3 anim-bounce">🦊</div>
    <div>
      <h2 class="fw-black mb-0">Good Morning, Alex! 👋</h2>
      <p class="mb-0 opacity-75">Ready to learn something amazing today?</p>
    </div>
  </div>
</div>

<div class="container py-5">

  {{-- STAT CARDS (animated counter) --}}
  <div class="row g-3 mb-5">
    @foreach([
      ['🏆','280','Total Points','primary'],
      ['📚','2','Topics Done','success'],
      ['🎖️','3','Badges Earned','warning'],
      ['🔥','3','Day Streak','danger'],
    ] as $i => [$icon,$val,$label,$color])
    <div class="col-6 col-md-3">
      <div class="bg-white rounded-4 shadow-sm p-4 text-center border-bottom border-4 border-{{ $color }}
                  topic-card anim-fade-up delay-{{ $i+1 }}">
        <div class="fs-2 anim-bounce" style="animation-delay:{{ $i*.2 }}s">{{ $icon }}</div>
        <div class="fw-black fs-3 text-{{ $color }}"
             data-target="{{ $val }}" data-raw="{{ preg_replace('/[^0-9]/','',$val) }}">{{ $val }}</div>
        <div class="text-muted small fw-bold">{{ $label }}</div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="row g-4">

    {{-- TOPIC PROGRESS --}}
    <div class="col-lg-7">
      <h4 class="fw-black mb-3 reveal">📚 Topic Progress</h4>

      @php
      $topics = [
        ['✏️','Right to Education',100,'success'],
        ['🛡️','Right to Safety',   80, 'success'],
        ['⚖️','Right to Equality', 40, 'primary'],
        ['🏥','Right to Healthcare',0, 'secondary'],
        ['🎮','Right to Play',      0, 'secondary'],
        ['👨‍👩‍👧','Right to Family',  0, 'secondary'],
      ];
      @endphp

      @foreach($topics as $i => [$icon,$name,$pct,$color])
      <div class="bg-white rounded-4 shadow-sm p-3 mb-3 reveal" style="animation-delay:{{ $i*.08 }}s">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="fw-bold">{{ $icon }} {{ $name }}</span>
          <span class="badge bg-{{ $color }}">{{ $pct }}%</span>
        </div>
        <div class="progress rounded-pill" style="height:10px">
          {{-- Width set by JS after load so the transition plays --}}
          <div class="progress-bar bg-{{ $color }}" data-width="{{ $pct }}" style="width:0%"></div>
        </div>
      </div>
      @endforeach

      <a href="/topics" class="btn btn-main mt-2 reveal">📚 Explore Topics</a>
    </div>

    {{-- RIGHT COLUMN --}}
    <div class="col-lg-5">

      {{-- BADGES --}}
      <h4 class="fw-black mb-3 reveal">🎖️ My Badges</h4>
      <div class="row g-2 mb-4">
        @foreach([
          ['🏅','First Step!',true],
          ['🥇','Perfect Score',true],
          ['🔥','Streak Master',true],
          ['🌟','Rights Scholar',false],
          ['🦸','Rights Hero',false],
          ['👑','Quiz King',false],
        ] as $i => [$icon,$name,$earned])
        <div class="col-4">
          <div class="bg-white rounded-4 shadow-sm p-3 text-center topic-card anim-pop delay-{{ $i+1 }}
                      {{ $earned ? '' : 'opacity-50' }}">
            <div class="fs-2">{{ $icon }}</div>
            <div class="small fw-bold text-muted mt-1">{{ $name }}</div>
            @if($earned)
              <span class="badge bg-success mt-1" style="font-size:.65rem">Earned!</span>
            @endif
          </div>
        </div>
        @endforeach
      </div>

      {{-- DAILY CHALLENGE --}}
      <div class="rounded-4 p-4 text-center text-white reveal"
           style="background:linear-gradient(135deg,#ff9800,#ef5350)">
        <div class="fs-1 anim-bounce">🎯</div>
        <h5 class="fw-black mt-2">Today's Challenge</h5>
        <p class="small opacity-75">Complete the Equality quiz to earn bonus points + a badge!</p>
        <a href="/topics/equality" class="btn btn-light fw-black w-100">⚡ Accept Challenge!</a>
      </div>

    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
// Animate progress bars after page loads
window.addEventListener('load', () => {
  setTimeout(() => {
    document.querySelectorAll('.progress-bar[data-width]').forEach(bar => {
      bar.style.width = bar.dataset.width + '%';
    });
  }, 400); // small delay so transition is visible
});
</script>
@endpush

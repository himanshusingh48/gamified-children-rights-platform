@extends('layouts.app')
@section('title', 'Topics')

@section('content')

{{-- HEADER --}}
<div class="text-white text-center py-5 position-relative overflow-hidden"
     style="background:linear-gradient(135deg,#26a69a,#00695c)">
  <div class="position-absolute rounded-circle opacity-10 anim-float"
       style="width:250px;height:250px;background:#fff;top:-60px;right:-60px;"></div>
  <h1 class="fw-black anim-fade-up">📚 Explore Your Rights!</h1>
  <p class="fs-5 anim-fade-up delay-2">Click any topic to learn and take a quiz!</p>
  <input type="text" class="form-control mx-auto mt-3 anim-fade-up delay-3"
         style="max-width:360px; border-radius:50px; padding:12px 24px"
         placeholder="🔍 Search topics..." oninput="search(this.value)">
</div>

{{-- TOPICS GRID --}}
<div class="container py-5">

  @php
  $topics = [
    ['icon'=>'✏️','title'=>'Right to Education','desc'=>'Every child can go to school and learn. Education opens every door!',
     'mins'=>5,'qs'=>10,'pts'=>50,'slug'=>'education','color'=>'#5c6bc0'],
    ['icon'=>'🛡️','title'=>'Right to Safety','desc'=>'No one should hurt or scare you. You have the right to be safe!',
     'mins'=>6,'qs'=>10,'pts'=>50,'slug'=>'safety','color'=>'#ef5350'],
    ['icon'=>'⚖️','title'=>'Right to Equality','desc'=>'All children are equal — no matter their race, gender, or religion.',
     'mins'=>5,'qs'=>10,'pts'=>50,'slug'=>'equality','color'=>'#26a69a'],
    ['icon'=>'🏥','title'=>'Right to Healthcare','desc'=>'Every child deserves to be healthy and get medical care.',
     'mins'=>7,'qs'=>10,'pts'=>60,'slug'=>'health','color'=>'#ff9800'],
    ['icon'=>'🎮','title'=>'Right to Play','desc'=>'Playing and resting are rights! Creativity and fun matter.',
     'mins'=>5,'qs'=>10,'pts'=>60,'slug'=>'play','color'=>'#7e57c2'],
    ['icon'=>'👨‍👩‍👧','title'=>'Right to Family','desc'=>'Every child deserves love, care and a safe family environment.',
     'mins'=>6,'qs'=>10,'pts'=>60,'slug'=>'family','color'=>'#ec407a'],
  ];
  @endphp

  <div class="row g-4" id="topics-grid">
    @foreach($topics as $i => $t)
    <div class="col-md-4 topic-item reveal" data-name="{{ strtolower($t['title']) }}"
         style="animation-delay:{{ $i * 0.08 }}s">
      <div class="topic-card card h-100">

        {{-- Coloured banner --}}
        <div class="p-4 text-center text-white position-relative overflow-hidden"
             style="background:{{ $t['color'] }}; border-radius:18px 18px 0 0">
          {{-- Shimmering circle --}}
          <div class="position-absolute rounded-circle opacity-25"
               style="width:100px;height:100px;background:#fff;top:-30px;right:-30px;"></div>
          <div style="font-size:3.5rem" class="anim-float delay-{{ ($i%6)+1 }}">{{ $t['icon'] }}</div>
          <h5 class="fw-black mb-0">{{ $t['title'] }}</h5>
        </div>

        <div class="card-body d-flex flex-column p-4">
          <p class="text-muted flex-grow-1">{{ $t['desc'] }}</p>
          <div class="d-flex justify-content-between text-muted small fw-bold mb-3">
            <span>📖 {{ $t['mins'] }} min</span>
            <span>🧠 {{ $t['qs'] }} Qs</span>
            <span>🏆 {{ $t['pts'] }} pts</span>
          </div>
          <a href="/topics/{{ $t['slug'] }}" class="btn btn-main w-100">🚀 Start Learning</a>
        </div>

      </div>
    </div>
    @endforeach
  </div>

  <p id="no-results" class="text-center text-muted mt-4 fs-5 d-none">
    🔍 No topics match your search!
  </p>
</div>

@endsection

@push('scripts')
<script>
function search(q) {
  let found = 0;
  document.querySelectorAll('.topic-item').forEach(el => {
    const match = el.dataset.name.includes(q.toLowerCase());
    el.style.display = match ? '' : 'none';
    if (match) found++;
  });
  document.getElementById('no-results').classList.toggle('d-none', found > 0);
}
</script>
@endpush

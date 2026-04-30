@extends('layouts.app')
@section('title', $topic['title'])

@section('content')

{{-- HERO --}}
<div class="text-white py-5 position-relative overflow-hidden"
     style="background:linear-gradient(135deg,#5c6bc0,#9c27b0)">
  <div class="position-absolute rounded-circle opacity-10 anim-float"
       style="width:300px;height:300px;background:#fff;top:-80px;right:-80px;"></div>
  <div class="container">
    <a href="/topics" class="text-white-50 text-decoration-none fw-bold anim-fade-up">← Back to Topics</a>
    <h1 class="fw-black display-5 mt-2 anim-fade-up delay-1">{{ $topic['icon'] }} {{ $topic['title'] }}</h1>
    <div class="d-flex gap-3 mt-3 flex-wrap fw-bold small anim-fade-up delay-2">
      <span class="badge bg-white text-primary px-3 py-2">⏱️ 5 min read</span>
      <span class="badge bg-white text-success px-3 py-2">🧠 10 questions</span>
      <span class="badge bg-white text-warning px-3 py-2">🏆 50 points</span>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row g-4">

    {{-- MAIN CONTENT --}}
    <div class="col-lg-8">

      <div class="bg-white rounded-4 shadow-sm p-4 mb-4 reveal">
        <h4 class="fw-black">📖 What is the {{ $topic['title'] }}?</h4>
        <p class="text-muted lh-lg">
          The <strong>{{ $topic['title'] }}</strong> means every child — regardless of background —
          is protected by the UN Convention on the Rights of the Child (UNCRC).
        </p>
        <div class="alert alert-primary rounded-4 fw-bold">
          💡 <strong>Did you know?</strong> The UNCRC has been signed by 193 countries to protect children's rights!
        </div>
      </div>

      <div class="bg-white rounded-4 shadow-sm p-4 mb-4 reveal delay-1">
        <h4 class="fw-black">🌟 What Does This Mean for You?</h4>
        <ul class="lh-lg text-muted fw-bold">
          <li>✅ You are protected by law in 193 countries</li>
          <li>✅ Adults must respect and support this right</li>
          <li>✅ You can speak up if this right is being denied</li>
          <li>✅ Schools and governments must uphold this right</li>
          <li>✅ This right belongs to <em>every</em> child, including you!</li>
        </ul>
      </div>

      {{-- Quick facts with pop animation --}}
      <div class="bg-white rounded-4 shadow-sm p-4 mb-4 reveal delay-2">
        <h4 class="fw-black">⚡ Quick Facts</h4>
        <div class="row g-3 text-center">
          @foreach([['193','Countries','primary'],['1989','UNCRC Year','success'],['54','Articles','warning'],['100%','For You!','danger']] as $i => [$n,$l,$c])
          <div class="col-6 col-md-3">
            <div class="bg-{{ $c }} bg-opacity-10 rounded-4 p-3 anim-pop delay-{{ $i+1 }}">
              <div class="fs-3 fw-black text-{{ $c }}">{{ $n }}</div>
              <div class="small text-muted fw-bold">{{ $l }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="d-flex justify-content-between reveal delay-3">
        <a href="/topics"        class="btn btn-green">← All Topics</a>
        <a href="/quiz/{{ $slug }}" class="btn btn-main">Take the Quiz →</a>
      </div>
    </div>

    {{-- SIDEBAR --}}
    <div class="col-lg-4">

      {{-- Reading progress --}}
      <div class="bg-white rounded-4 shadow-sm p-4 mb-3 anim-slide-right">
        <h6 class="fw-black">📊 Reading Progress</h6>
        <div class="progress rounded-pill" style="height:12px">
          <div class="progress-bar bg-primary" id="read-bar" style="width:0%"></div>
        </div>
        <small class="text-muted fw-bold mt-1 d-block" id="read-pct">0% read</small>
      </div>

      {{-- Quiz CTA with pulse --}}
      <div class="text-white rounded-4 p-4 text-center anim-slide-right delay-1 anim-pulse"
           style="background:linear-gradient(135deg,#5c6bc0,#9c27b0)">
        <div class="fs-1 mb-2 anim-bounce">🧠</div>
        <h5 class="fw-black">Ready for the Quiz?</h5>
        <p class="small opacity-75">Answer 10 questions & earn <strong>50 points</strong> + a badge!</p>
        <a href="/quiz/{{ $slug }}" class="btn btn-warning fw-black w-100">🚀 Start Quiz!</a>
      </div>

      {{-- Keywords --}}
      <div class="bg-white rounded-4 shadow-sm p-4 mt-3 anim-slide-right delay-2">
        <h6 class="fw-black">🔑 Key Words</h6>
        <div class="d-flex flex-wrap gap-2 mt-2">
          @foreach(['UNCRC','Rights','Child','Protection','Law','Equality'] as $i => $kw)
          <span class="badge rounded-pill anim-pop delay-{{ $i+1 }}"
                style="background:#e8eaff;color:#5c6bc0;font-size:.85rem">{{ $kw }}</span>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
window.addEventListener('scroll', () => {
  const d = document.documentElement;
  const pct = Math.round(d.scrollTop / (d.scrollHeight - d.clientHeight) * 100);
  document.getElementById('read-bar').style.width = pct + '%';
  document.getElementById('read-pct').textContent = pct + '% read';
});
</script>
@endpush

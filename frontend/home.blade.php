@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- HERO with floating emoji --}}
<div class="text-white text-center py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg,#5c6bc0,#9c27b0); min-height:88vh; display:flex; align-items:center; justify-content:center; flex-direction:column;">

  {{-- Floating background blobs --}}
  <div class="position-absolute rounded-circle opacity-25 anim-float"
       style="width:300px;height:300px;background:#fff;top:-80px;left:-80px;"></div>
  <div class="position-absolute rounded-circle opacity-25 anim-float delay-3"
       style="width:200px;height:200px;background:#fff;bottom:-60px;right:-60px;"></div>

  {{-- Content --}}
  <div class="position-relative">
    <div class="display-1 anim-bounce mb-2">👧🏽</div>
    <h1 class="display-5 fw-black anim-fade-up">Every Child Has Rights! 🌟</h1>
    <p class="fs-5 mt-2 mb-4 opacity-75 anim-fade-up delay-2">Learn, take quizzes & earn badges — fun for every kid!</p>
    <div class="anim-fade-up delay-3">
      <a href="/topics" class="btn btn-main btn-lg me-2">🚀 Start Learning</a>
      <a href="/login"  class="btn btn-outline-light btn-lg">🔐 Join Now</a>
    </div>

    {{-- Floating emoji row --}}
    <div class="d-flex justify-content-center gap-4 mt-5 fs-3 anim-fade-up delay-4">
      <span class="anim-float delay-1">📚</span>
      <span class="anim-float delay-2">🏆</span>
      <span class="anim-float delay-3">🌍</span>
      <span class="anim-float delay-4">❤️</span>
      <span class="anim-float delay-5">⭐</span>
    </div>
  </div>
</div>

{{-- STATS (fade up on scroll) --}}
<div class="container my-5">
  <div class="row text-center g-3">
    @foreach([
      ['6+','Topics','primary'],
      ['50+','Questions','danger'],
      ['10+','Badges','success'],
      ['100%','Kid Friendly 😄','warning'],
    ] as [$val,$label,$color])
    <div class="col-6 col-md-3 reveal">
      <div class="bg-white rounded-4 p-4 shadow-sm topic-card">
        <div class="fs-2 fw-black text-{{ $color }}">{{ $val }}</div>
        <div class="text-muted fw-bold">{{ $label }}</div>
      </div>
    </div>
    @endforeach
  </div>
</div>

{{-- RIGHTS CARDS --}}
<div class="container mb-5">
  <h2 class="text-center fw-black mb-4 reveal">🌈 Your Rights</h2>
  <div class="row g-3 justify-content-center">
    @foreach([
      ['✏️','Right to Education','Every child can go to school and learn!','education','#5c6bc0'],
      ['🛡️','Right to Safety','No one should hurt or scare you!','safety','#ef5350'],
      ['⚖️','Right to Equality','All children are equal, no exceptions!','equality','#26a69a'],
      ['🏥','Right to Healthcare','You deserve to be healthy!','health','#ff9800'],
      ['🎮','Right to Play','Playing is your right, not just a privilege!','play','#7e57c2'],
      ['👨‍👩‍👧','Right to Family','Every child needs love and care!','family','#ec407a'],
    ] as $i => [$icon, $name, $desc, $slug, $color])
    <div class="col-md-4 reveal" style="animation-delay:{{ $i * 0.1 }}s">
      <a href="/topics/{{ $slug }}" class="text-decoration-none">
        <div class="topic-card card h-100 p-4 text-center">
          <div style="font-size:3rem" class="anim-float delay-{{ ($i % 6) + 1 }}">{{ $icon }}</div>
          <h5 class="fw-black mt-2" style="color:{{ $color }}">{{ $name }}</h5>
          <p class="text-muted small mb-0">{{ $desc }}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

{{-- HOW IT WORKS --}}
<div class="py-5 text-white text-center" style="background:#3949ab">
  <div class="container">
    <h2 class="fw-black mb-4 anim-fade-up">🚀 How It Works</h2>
    <div class="row g-4">
      @foreach(['1️⃣ Sign Up Free|Pick your avatar and create your account!',
                '2️⃣ Read Topics|Learn about your rights with fun lessons!',
                '3️⃣ Earn Badges!|Take quizzes and collect awesome badges!'] as $i => $step)
      @php [$em,$text] = explode('|', $step); @endphp
      <div class="col-md-4 reveal delay-{{ $i + 1 }}">
        <div class="fs-1 anim-bounce" style="animation-delay:{{ $i * 0.3 }}s">{{ $em }}</div>
        <h5 class="fw-black mt-2">{{ explode(' ', ltrim($em,'0123456789️⃣ '))[0] ?? '' }}</h5>
        <p>{{ $text }}</p>
      </div>
      @endforeach
    </div>
    <a href="/login" class="btn btn-light btn-lg mt-4 fw-black anim-fade-up delay-4">🎉 Get Started Free!</a>
  </div>
</div>

@endsection

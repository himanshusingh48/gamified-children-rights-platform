@extends('layouts.app')
@section('title', 'Login / Sign Up')

@section('content')
<div class="container py-5" style="max-width:480px">

  <div class="text-center mb-4">
    <div class="display-3">⭐</div>
    <h2 class="fw-black">Welcome to Rights4Kids!</h2>
    <p class="text-muted">Login or create a free account below</p>
  </div>

  {{-- TAB SWITCH --}}
  <div class="d-flex mb-4 rounded-pill bg-light p-1">
    <button id="tab-login"  class="btn btn-main flex-fill rounded-pill" onclick="show('login')">🔐 Login</button>
    <button id="tab-signup" class="btn btn-light  flex-fill rounded-pill" onclick="show('signup')">✨ Sign Up</button>
  </div>

  {{-- LOGIN FORM --}}
  <div id="form-login" class="bg-white rounded-4 shadow-sm p-4">
    <div class="mb-3">
      <label class="fw-bold">📧 Email or Username</label>
      <input type="text" class="form-control form-control-lg" placeholder="Enter email or username">
    </div>
    <div class="mb-3">
      <label class="fw-bold">🔑 Password</label>
      <input type="password" class="form-control form-control-lg" placeholder="Enter password">
    </div>
    <button class="btn btn-main w-100 btn-lg">🚀 Login & Learn!</button>
    <p class="text-center mt-3 mb-0"><a href="#" class="text-decoration-none text-muted">Forgot password?</a></p>
  </div>

  {{-- SIGNUP FORM --}}
  <div id="form-signup" class="bg-white rounded-4 shadow-sm p-4" style="display:none">

    {{-- Avatar Pick --}}
    <label class="fw-bold mb-2 d-block">🎭 Pick Your Avatar!</label>
    <div class="d-flex flex-wrap gap-2 mb-3">
      @foreach(['🦊','🐼','🦁','🐸','🦄','🐧','🐯','🐙'] as $av)
      <input type="radio" name="avatar" id="av-{{ $loop->index }}" value="{{ $av }}" class="d-none avatar-radio">
      <label for="av-{{ $loop->index }}"
             class="avatar-btn border rounded-circle d-flex align-items-center justify-content-center"
             style="width:54px;height:54px;font-size:1.6rem;cursor:pointer;transition:.2s">
        {{ $av }}
      </label>
      @endforeach
    </div>

    <div class="mb-3">
      <label class="fw-bold">😊 Your Name</label>
      <input type="text" class="form-control form-control-lg" placeholder="What's your name?">
    </div>
    <div class="mb-3">
      <label class="fw-bold">📧 Email</label>
      <input type="email" class="form-control form-control-lg" placeholder="Your email">
    </div>
    <div class="mb-3">
      <label class="fw-bold">🔑 Password</label>
      <input type="password" class="form-control form-control-lg" placeholder="Create a password">
    </div>
    <button class="btn btn-main w-100 btn-lg">🎉 Join Rights4Kids!</button>
  </div>

</div>
@endsection

@push('scripts')
<script>
function show(tab) {
  document.getElementById('form-login').style.display  = tab === 'login'  ? 'block' : 'none';
  document.getElementById('form-signup').style.display = tab === 'signup' ? 'block' : 'none';
  document.getElementById('tab-login').className  = 'btn flex-fill rounded-pill ' + (tab==='login'  ? 'btn-main' : 'btn-light');
  document.getElementById('tab-signup').className = 'btn flex-fill rounded-pill ' + (tab==='signup' ? 'btn-main' : 'btn-light');
}

// Avatar highlight
document.querySelectorAll('.avatar-btn').forEach(label => {
  label.addEventListener('click', () => {
    document.querySelectorAll('.avatar-btn').forEach(l => l.style.background = '');
    label.style.background = '#e8eaff';
    label.style.borderColor = '#5c6bc0';
  });
});
</script>
@endpush

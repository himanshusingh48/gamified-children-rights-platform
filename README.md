# Rights4Kids 🌟 — Gamified Children's Rights Platform

A fun, interactive Laravel-based web app that teaches children about their fundamental rights through gamified lessons, quizzes, and badge rewards.

## 🚀 Features

- 🏠 **Landing Page** — Animated hero with floating emojis and rights preview cards
- 🔐 **Login / Sign Up** — Avatar selection, tab-switch form
- 📚 **Topics Page** — 6 Rights topics (Education, Safety, Equality, Healthcare, Play, Family) with live search
- 📖 **Topic Detail** — Lessons with reading progress bar and quiz CTA
- 🧠 **Quiz Page** — 5-question quiz with timer, instant feedback, and live score
- 🏆 **Results Page** — Score tiers, animated stars, badge earned, confetti on excellent scores
- 📊 **Dashboard** — Points, badges, topic progress bars, leaderboard, daily challenge

## 🛠️ Tech Stack

- **Laravel 12** (PHP)
- **Blade Templates**
- **Bootstrap 5.3**
- **Vanilla CSS Animations** (keyframes: fadeUp, float, pop, bounce, pulseGlow)
- **Vanilla JavaScript** (quiz logic, scroll-reveal, timer, confetti)

## 📁 Key Files

```
resources/views/
├── layouts/app.blade.php     ← Navbar, Footer, Global Animations
├── home.blade.php            ← Landing Page
├── auth/login.blade.php      ← Login / Sign Up
├── topics/index.blade.php    ← Topics Grid
├── topics/detail.blade.php   ← Topic Detail (reused for all 6 topics)
├── quiz/index.blade.php      ← Quiz Page
├── results.blade.php         ← Results Page
└── dashboard.blade.php       ← Dashboard
```

## ⚙️ Installation

```bash
git clone https://github.com/himanshusingh48/gamified-children-rights-platform.git
cd gamified-children-rights-platform
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open **http://127.0.0.1:8000** in your browser.

## 📜 Rights Covered

| Right | Description |
|-------|-------------|
| ✏️ Education | Every child can go to school and learn |
| 🛡️ Safety | No one should hurt or scare you |
| ⚖️ Equality | All children are equal, no exceptions |
| 🏥 Healthcare | Every child deserves to be healthy |
| 🎮 Play | Playing and resting are rights |
| 👨‍👩‍👧 Family | Every child needs love and care |

Made with ❤️ to empower every child to know their rights!

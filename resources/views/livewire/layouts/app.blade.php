<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '詞彙學習系統' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;
            --ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;
            --sh:4px 4px 0 #0D0D0D;--r:14px;
            --ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans TC',sans-serif;
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:var(--ffb);background:var(--cream);min-height:100vh}

        /* ── NAV ── */
        .nav{background:var(--ink);position:sticky;top:0;z-index:50}
        .nav-inner{max-width:1200px;margin:0 auto;padding:0 28px;display:flex;align-items:center;justify-content:space-between;height:64px;gap:16px}

        /* Logo */
        .nav-logo{display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0}
        .nav-logo-icon{width:36px;height:36px;background:var(--lime);border:2px solid var(--white);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .nav-logo-icon svg{width:18px;height:18px;color:var(--ink)}
        .nav-logo-text{font-family:var(--ffd);font-size:1.1rem;font-weight:800;color:var(--white);letter-spacing:-.02em}
        .nav-logo-text span{color:var(--lime)}

        /* Desktop links */
        .nav-links{display:flex;align-items:center;gap:3px}
        .nav-link{display:inline-flex;align-items:center;gap:6px;padding:7px 13px;border-radius:8px;font-family:var(--ffb);font-size:.84rem;font-weight:600;text-decoration:none;color:rgba(255,255,255,.6);transition:background .12s,color .12s;border:1.5px solid transparent;white-space:nowrap}
        .nav-link svg{width:14px;height:14px;flex-shrink:0}
        .nav-link:hover{background:rgba(255,255,255,.1);color:var(--white)}
        .nav-link.active{background:var(--lime);color:var(--ink);border-color:var(--lime)}
        .nav-link.active:hover{background:#b8e020}

        /* User area */
        .nav-user{display:flex;align-items:center;gap:8px;flex-shrink:0}
        .nav-avatar{width:34px;height:34px;background:var(--cyan);border:2px solid rgba(255,255,255,.4);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:var(--ffd);font-size:.82rem;font-weight:800;color:var(--ink);cursor:pointer;transition:border-color .12s,transform .12s;flex-shrink:0;user-select:none}
        .nav-avatar:hover{border-color:var(--white);transform:scale(1.06)}

        /* Dropdown */
        .nav-dd{position:relative}
        .nav-dd-menu{display:none;position:absolute;right:0;top:calc(100% + 10px);background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);min-width:170px;overflow:hidden;z-index:100}
        .nav-dd-menu.open{display:block}
        .nav-dd-name{padding:9px 13px;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#aaa;border-bottom:1.5px solid #eee}
        .nav-dd-btn{width:100%;text-align:left;background:none;border:none;padding:9px 13px;font-family:var(--ffb);font-size:.86rem;font-weight:500;color:var(--ink);cursor:pointer;transition:background .1s;display:block}
        .nav-dd-btn:hover{background:var(--cream)}

        /* Auth buttons */
        .nav-btn-login{display:inline-flex;align-items:center;padding:7px 15px;border:1.5px solid rgba(255,255,255,.3);border-radius:8px;font-family:var(--ffb);font-size:.84rem;font-weight:600;color:rgba(255,255,255,.75);text-decoration:none;transition:border-color .12s,color .12s}
        .nav-btn-login:hover{border-color:var(--white);color:var(--white)}
        .nav-btn-register{display:inline-flex;align-items:center;padding:7px 15px;background:var(--lime);border:2px solid var(--lime);border-radius:8px;font-family:var(--ffd);font-size:.84rem;font-weight:700;color:var(--ink);text-decoration:none;box-shadow:var(--sh);transition:background .12s,transform .12s}
        .nav-btn-register:hover{background:#b8e020;transform:translate(-1px,-1px)}

        /* Mobile toggle */
        .nav-mob-btn{display:none;background:none;border:1.5px solid rgba(255,255,255,.25);border-radius:7px;padding:6px;color:var(--white);cursor:pointer;align-items:center;justify-content:center}
        .nav-mob-btn svg{width:17px;height:17px}
        @media(max-width:680px){
            .nav-links{display:none}
            .nav-mob-btn{display:flex}
        }

        /* Mobile menu */
        .nav-mob-menu{display:none;background:var(--ink);border-top:2px solid rgba(255,255,255,.08)}
        .nav-mob-menu.open{display:block}
        .nav-mob-inner{max-width:1200px;margin:0 auto;padding:10px 18px 14px;display:flex;flex-direction:column;gap:3px}
        .nav-mob-link{display:flex;align-items:center;gap:8px;padding:10px 13px;border-radius:8px;font-family:var(--ffb);font-size:.9rem;font-weight:600;text-decoration:none;color:rgba(255,255,255,.65);transition:background .12s,color .12s;border:1.5px solid transparent}
        .nav-mob-link svg{width:15px;height:15px;flex-shrink:0}
        .nav-mob-link:hover{background:rgba(255,255,255,.1);color:var(--white)}
        .nav-mob-link.active{background:var(--lime);color:var(--ink);border-color:var(--lime)}

        .main-wrap{min-height:calc(100vh - 64px - 85px)}
    </style>
</head>
<body>

<nav class="nav">
    <div class="nav-inner">

        <a href="{{ route('vocabulary.index') }}" class="nav-logo">
            <div class="nav-logo-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <span class="nav-logo-text">詞彙<span>學習</span></span>
        </a>

        <div class="nav-links">
            {{-- Dashboard 連結 --}}
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                統計資訊
            </a>


            <a href="{{ route('vocabulary.index') }}" class="nav-link {{ request()->routeIs('vocabulary.index') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                詞彙列表
            </a>
            <a href="{{ route('vocabulary.create') }}" class="nav-link {{ request()->routeIs('vocabulary.create') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                新增詞彙
            </a>
            <a href="{{ route('exam') }}" class="nav-link {{ request()->routeIs('exam') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                測驗中心
            </a>
              {{-- SRS 複習按鈕（有數字紅點）--}}
            @auth
            <a href="{{ route('exam.srs') }}" class="nav-link" style="position:relative">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                今日複習
                @php
                    $srsDue = \App\Models\ExamResult::where('user_id', auth()->id())
                        ->where('is_correct', false)
                        ->where('created_at', '>=', now()->subDays(3))
                        ->distinct('vocabulary_id')
                        ->count('vocabulary_id');
                @endphp
                @if($srsDue > 0)
                <span style="position:absolute;top:-4px;right:-4px;min-width:18px;height:18px;padding:0 4px;background:var(--pink);color:#fff;font-size:.62rem;font-weight:800;border-radius:9px;border:1.5px solid var(--white);display:flex;align-items:center;justify-content:center">
                    {{ $srsDue > 99 ? '99+' : $srsDue }}
                </span>
                @endif
            </a>
            @endauth
        </div>

        <div class="nav-user">
            @guest
                <a href="{{ route('login') }}" class="nav-btn-login">登入</a>
                <a href="{{ route('register') }}" class="nav-btn-register">註冊</a>
            @else
                <div class="nav-dd" id="navDd">
                    <div class="nav-avatar" onclick="toggleNavDd()" title="{{ Auth::user()->name }}">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="nav-dd-menu" id="navDdMenu">
                        <div class="nav-dd-name">{{ Auth::user()->name }}</div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-dd-btn">登出</button>
                        </form>
                    </div>
                </div>
            @endguest

            <button class="nav-mob-btn" onclick="toggleNavMob()" aria-label="選單">
                <svg id="navMobOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="navMobClose" style="display:none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

    </div>
</nav>

<div class="nav-mob-menu" id="navMobMenu">
    <div class="nav-mob-inner">
        <a href="{{ route('vocabulary.index') }}" class="nav-mob-link {{ request()->routeIs('vocabulary.index') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            詞彙列表
        </a>
        <a href="{{ route('vocabulary.create') }}" class="nav-mob-link {{ request()->routeIs('vocabulary.create') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            新增詞彙
        </a>
        <a href="{{ route('exam') }}" class="nav-mob-link {{ request()->routeIs('exam') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            測驗中心
        </a>
    </div>
</div>

<main class="main-wrap">
    {{ $slot }}
</main>

<footer style="background:var(--ink);border-top:3px solid rgba(255,255,255,.08);padding:28px 0">
    <div style="max-width:1200px;margin:0 auto;padding:0 28px;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap">
        <a href="{{ route('vocabulary.index') }}" style="display:flex;align-items:center;gap:9px;text-decoration:none">
            <div style="width:30px;height:30px;background:var(--lime);border:1.5px solid rgba(255,255,255,.3);border-radius:7px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#0D0D0D"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <span style="font-family:var(--ffd);font-size:.95rem;font-weight:800;color:var(--white);letter-spacing:-.01em">詞彙<span style="color:var(--lime)">學習</span></span>
        </a>

        <p style="font-family:var(--ffd);font-size:.75rem;font-weight:700;color:rgba(255,255,255,.35);letter-spacing:.06em;text-transform:uppercase">
            &copy; {{ date('Y') }} NOBILEE &mdash; All Rights Reserved
        </p>
    </div>
</footer>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<script>
function toggleNavDd(){
    document.getElementById('navDdMenu').classList.toggle('open');
}
function toggleNavMob(){
    const m=document.getElementById('navMobMenu');
    const o=document.getElementById('navMobOpen');
    const c=document.getElementById('navMobClose');
    const isOpen=m.classList.toggle('open');
    o.style.display=isOpen?'none':'block';
    c.style.display=isOpen?'block':'none';
}
document.addEventListener('click',function(e){
    const dd=document.getElementById('navDd');
    if(dd&&!dd.contains(e.target)){
        document.getElementById('navDdMenu')?.classList.remove('open');
    }
});
</script>

@stack('scripts')
</body>
</html>

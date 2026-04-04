<x-guest-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&display=swap');

.auth-wrap{--lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;--ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;--sh:4px 4px 0 #0D0D0D;--sh-lg:6px 6px 0 #0D0D0D;--r:14px;--ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans TC',sans-serif;font-family:var(--ffb);background:var(--cream);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:32px 20px;position:relative;overflow:hidden}

.auth-deco{position:fixed;inset:0;pointer-events:none;z-index:0}
.auth-deco i{position:absolute;display:block;border-radius:3px}
.auth-deco i:nth-child(1){width:28px;height:28px;background:var(--pink);top:8%;left:4%;transform:rotate(20deg);opacity:.6}
.auth-deco i:nth-child(2){width:20px;height:20px;background:var(--cyan);top:15%;right:6%;transform:rotate(-18deg);opacity:.5}
.auth-deco i:nth-child(3){width:24px;height:10px;background:var(--lime);top:75%;left:3%;transform:rotate(35deg);opacity:.7;border:2px solid var(--ink)}
.auth-deco i:nth-child(4){width:16px;height:16px;background:var(--orange);top:80%;right:5%;transform:rotate(50deg);opacity:.5}

.auth-card{position:relative;z-index:1;background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);width:100%;max-width:440px;overflow:hidden}

.auth-card-top{background:var(--ink);padding:28px 32px;text-align:center}
.auth-logo{display:inline-flex;align-items:center;gap:10px;text-decoration:none;margin-bottom:16px}
.auth-logo-icon{width:40px;height:40px;background:var(--lime);border:2px solid var(--white);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.auth-logo-icon svg{width:20px;height:20px;color:var(--ink)}
.auth-logo-text{font-family:var(--ffd);font-size:1.15rem;font-weight:800;color:var(--white);letter-spacing:-.02em}
.auth-logo-text span{color:var(--lime)}
.auth-card-title{font-family:var(--ffd);font-size:1.5rem;font-weight:800;color:var(--white);letter-spacing:-.02em}
.auth-card-sub{font-size:.82rem;color:rgba(255,255,255,.55);margin-top:4px}

.auth-card-body{padding:28px 32px}

.auth-errors{background:#fee2e2;border:2px solid var(--pink);border-radius:9px;padding:11px 14px;margin-bottom:18px;font-size:.82rem;font-weight:600;color:#991b1b}
.auth-errors ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:3px}

.auth-status{background:var(--lime);border:2px solid var(--ink);border-radius:9px;padding:10px 14px;margin-bottom:18px;font-size:.82rem;font-weight:600;color:var(--ink)}

.auth-field{margin-bottom:16px}
.auth-label{display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#555;margin-bottom:6px}
.auth-input{width:100%;padding:11px 13px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffb);font-size:.92rem;font-weight:500;background:var(--white);outline:none;transition:box-shadow .12s;color:var(--ink)}
.auth-input:focus{box-shadow:var(--sh)}

.auth-check-row{display:flex;align-items:center;gap:8px;margin-bottom:20px}
.auth-check-row input[type=checkbox]{width:16px;height:16px;accent-color:var(--ink);cursor:pointer;flex-shrink:0}
.auth-check-row label{font-size:.85rem;font-weight:500;color:#555;cursor:pointer}

.auth-footer{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;padding-top:4px}
.auth-link{font-size:.82rem;font-weight:600;color:#888;text-decoration:none;transition:color .12s}
.auth-link:hover{color:var(--ink)}
.auth-btn{display:inline-flex;align-items:center;gap:7px;padding:11px 24px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.92rem;font-weight:800;border:2px solid var(--ink);border-radius:9px;cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s;text-decoration:none}
.auth-btn:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
</style>

<div class="auth-wrap">
    <div class="auth-deco" aria-hidden="true">
        <i></i><i></i><i></i><i></i>
    </div>

    <div class="auth-card">
        <div class="auth-card-top">
            <a href="{{ route('vocabulary.index') }}" class="auth-logo">
                <div class="auth-logo-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <span class="auth-logo-text">詞彙<span>學習</span></span>
            </a>
            <div class="auth-card-title">歡迎回來</div>
            <div class="auth-card-sub">登入你的帳號繼續學習</div>
        </div>

        <div class="auth-card-body">
            @if($errors->any())
            <div class="auth-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('status'))
            <div class="auth-status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="auth-field">
                    <label class="auth-label" for="email">Email</label>
                    <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>

                <div class="auth-field">
                    <label class="auth-label" for="password">密碼</label>
                    <input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password">
                </div>

                <div class="auth-check-row">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">記住我</label>
                </div>

                <div class="auth-footer">
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link">忘記密碼？</a>
                    @else
                        <span></span>
                    @endif
                    <button type="submit" class="auth-btn">登入</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>

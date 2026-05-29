<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&family=Noto+Sans+KR:wght@400;500;700&family=Noto+Sans+JP:wght@400;500;700&display=swap');

.ex-wrap{--lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;--purple:#9333EA;--ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;--sh:4px 4px 0 #0D0D0D;--sh-lg:6px 6px 0 #0D0D0D;--r:14px;--ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans KR','Noto Sans JP','Noto Sans TC',sans-serif;font-family:var(--ffb);background:var(--cream);min-height:100vh;padding:44px 32px;position:relative;overflow-x:hidden}

.ex-deco{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden}
.ex-deco i{position:absolute;display:block;border-radius:3px}
.ex-deco i:nth-child(1){width:26px;height:26px;background:var(--pink);top:6%;left:3%;transform:rotate(20deg);opacity:.6}
.ex-deco i:nth-child(2){width:18px;height:18px;background:var(--cyan);top:12%;right:4%;transform:rotate(-18deg);opacity:.5}
.ex-deco i:nth-child(3){width:22px;height:10px;background:var(--lime);top:40%;left:1%;transform:rotate(35deg);opacity:.7;border:2px solid var(--ink)}
.ex-deco i:nth-child(4){width:15px;height:15px;background:var(--orange);top:65%;right:2%;transform:rotate(50deg);opacity:.5}
.ex-deco i:nth-child(5){width:19px;height:8px;background:var(--pink);top:80%;left:4%;transform:rotate(-25deg);opacity:.45}

.ex-inner{position:relative;z-index:1;max-width:840px;margin:0 auto}

/* page header */
.ex-phdr{text-align:center;margin-bottom:36px}
.ex-title{font-family:var(--ffd);font-size:clamp(2rem,5vw,3.2rem);font-weight:800;line-height:1;letter-spacing:-.03em;color:var(--ink);display:inline-flex;align-items:center;gap:12px;flex-wrap:wrap;justify-content:center}
.ex-title mark{background:var(--orange);padding:2px 10px;border:2px solid var(--ink);border-radius:6px;font-style:normal;color:var(--white)}
.ex-sub{font-size:.88rem;font-weight:500;color:#666;margin-top:7px;font-style:italic}

/* flash error */
.ex-flash-err{display:flex;align-items:center;gap:9px;padding:13px 17px;background:var(--pink);color:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);margin-bottom:20px;font-weight:600;font-size:.88rem}
.ex-flash-err svg{width:16px;height:16px;flex-shrink:0}

/* generic card */
.ex-card{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);overflow:hidden;margin-bottom:20px}
.ex-card-hdr{padding:16px 20px;border-bottom:2px solid var(--ink);display:flex;align-items:center;gap:8px}
.ex-card-hdr svg{width:17px;height:17px;color:#555}
.ex-card-hdr-t{font-family:var(--ffd);font-size:.97rem;font-weight:800}
.ex-card-body{padding:24px}

/* ── SETUP ── */
.ex-sg{display:grid;grid-template-columns:1fr 1fr;gap:20px}
@media(max-width:580px){.ex-sg{grid-template-columns:1fr}}
.ex-sc2{grid-column:1/-1}
.ex-slabel{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#666;margin-bottom:9px;display:block}
.ex-rg{display:flex;flex-wrap:wrap;gap:7px}
.ex-rbtn{display:inline-flex;align-items:center;gap:5px;padding:8px 14px;border:2px solid var(--ink);border-radius:9px;cursor:pointer;font-family:var(--ffb);font-size:.83rem;font-weight:600;transition:background .12s,transform .1s;background:var(--white);color:var(--ink)}
.ex-rbtn:hover{transform:translate(-1px,-1px)}
.ex-rbtn input{opacity:0;position:absolute;pointer-events:none;width:0;height:0}
.ex-rbtn.on-blue{background:var(--cyan)}
.ex-rbtn.on-orange{background:var(--orange);color:var(--white)}
.ex-rbtn.on-purple{background:var(--purple);color:var(--white)}
.ex-rbtn.dimmed{opacity:.35;cursor:not-allowed}

/* toggle */
.ex-trow{display:flex;align-items:center;gap:9px;cursor:pointer}
.ex-ttrack{width:42px;height:22px;border-radius:11px;background:#ccc;border:2px solid var(--ink);position:relative;transition:background .2s;flex-shrink:0}
.ex-ttrack.on-blue{background:var(--cyan)}
.ex-ttrack.on-purple{background:var(--purple)}
.ex-tknob{position:absolute;top:2px;left:2px;width:14px;height:14px;background:var(--white);border-radius:50%;border:1.5px solid var(--ink);transition:transform .2s}
.ex-ttrack.on-blue .ex-tknob,.ex-ttrack.on-purple .ex-tknob{transform:translateX(20px)}
.ex-tlabel{font-size:.88rem;font-weight:600;display:flex;align-items:center;gap:6px}
.ex-tlabel svg{width:16px;height:16px}
.ex-thint{font-size:.76rem;color:#888;margin-top:4px;padding-left:51px}

/* range */
.ex-rrange{display:flex;align-items:center;gap:7px;flex-wrap:wrap}
.ex-rlabel2{font-size:.85rem;font-weight:500;color:#555}
.ex-rnum{width:68px;padding:7px 9px;border:2px solid var(--ink);border-radius:7px;font-family:var(--ffb);font-size:.85rem;font-weight:600;text-align:center;outline:none}
.ex-rnum:focus{box-shadow:var(--sh)}
.ex-bclr-r{padding:7px 12px;border:2px solid var(--ink);border-radius:7px;font-family:var(--ffb);font-size:.76rem;font-weight:600;background:var(--white);cursor:pointer;transition:background .12s}
.ex-bclr-r:hover{background:#eeeae0}

/* info box */
.ex-info{display:flex;align-items:flex-start;gap:9px;padding:13px 15px;background:var(--cream);border:2px solid var(--ink);border-radius:9px;font-size:.8rem;font-weight:500;color:#444;line-height:1.55}
.ex-info svg{width:15px;height:15px;flex-shrink:0;margin-top:1px;color:var(--orange)}

/* start btn */
.ex-start-wrap{display:flex;justify-content:center;margin-top:22px}
.ex-btn-start{display:inline-flex;align-items:center;gap:9px;padding:14px 34px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:1.05rem;font-weight:800;border:2px solid var(--ink);border-radius:var(--r);cursor:pointer;box-shadow:var(--sh-lg);transition:transform .15s,box-shadow .15s}
.ex-btn-start:hover{transform:translate(-3px,-3px);box-shadow:8px 8px 0 var(--ink)}
.ex-btn-start svg{width:20px;height:20px}

.ex-back{display:flex;justify-content:center;margin-top:12px}
.ex-back a,.ex-bottom-btn{display:inline-flex;align-items:center;gap:5px;font-size:.82rem;font-weight:600;color:var(--ink);text-decoration:none;opacity:.55;transition:opacity .15s;background:none;border:none;cursor:pointer}
.ex-back a:hover,.ex-bottom-btn:hover{opacity:1}
.ex-back a svg,.ex-bottom-btn svg{width:13px;height:13px}

/* ── EXAM PROGRESS ── */
.ex-prog{padding:16px 20px;border-bottom:2px solid var(--ink)}
.ex-prog-info{display:flex;justify-content:space-between;align-items:center;margin-bottom:7px;font-size:.83rem;font-weight:600}
.ex-prog-ok{color:#059669;font-weight:700}
.ex-prog-ng{color:var(--pink);font-weight:700}
.ex-prog-track{width:100%;height:9px;background:#e5e5de;border-radius:5px;border:1.5px solid var(--ink);overflow:hidden}
.ex-prog-fill{height:100%;border-radius:4px;transition:width .3s}

/* question header */
.ex-qtop{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;flex-wrap:wrap;gap:9px}
.ex-qtags{display:flex;align-items:center;gap:7px;flex-wrap:wrap}
.ex-qtag{display:inline-flex;align-items:center;gap:4px;padding:4px 11px;border-radius:20px;font-size:.72rem;font-weight:700;border:1.5px solid var(--ink)}
.ex-qtag-blue{background:var(--cyan)}
.ex-qtag-green{background:#bbf7d0;color:#065f46}
.ex-qtag-purple{background:var(--purple);color:var(--white)}
.ex-qtag-orange{background:var(--orange);color:var(--white)}
.ex-qtag svg{width:12px;height:12px}
.ex-qnum{font-family:var(--ffd);font-size:1.1rem;font-weight:800}
.ex-qops{display:flex;align-items:center;gap:7px}
.ex-btn-vis{display:inline-flex;align-items:center;gap:4px;padding:6px 11px;border:1.5px solid var(--ink);border-radius:7px;background:var(--white);font-size:.78rem;font-weight:600;cursor:pointer;transition:background .12s}
.ex-btn-vis:hover{background:var(--cream)}
.ex-btn-vis svg{width:14px;height:14px}
.ex-btn-flip{display:inline-flex;align-items:center;gap:4px;font-size:.8rem;font-weight:600;background:none;border:none;cursor:pointer;opacity:.6;transition:opacity .15s}
.ex-btn-flip:hover{opacity:1}
.ex-btn-flip svg{width:14px;height:14px}

/* question word box */
.ex-qbox{border:2px solid var(--ink);border-radius:var(--r);padding:26px 48px 26px 24px;margin-bottom:14px;text-align:center;position:relative}
.ex-qbox.style-blue{background:#e8f5ff}
.ex-qbox.style-purple{background:#f3e8ff}
.ex-qtext{font-family:var(--ffb);font-size:1.9rem;font-weight:700;letter-spacing:normal;line-height:1.2;color:var(--ink)}
.ex-qtext.word-hidden{color:transparent;text-shadow:0 0 18px rgba(147,51,234,.4);user-select:none;position:relative}
.ex-qtext.word-hidden::after{content:"🔊";position:absolute;inset:0;display:flex;align-items:center;justify-content:center;color:var(--purple);font-size:1.5rem;text-shadow:none}
.ex-btn-speak{position:absolute;right:12px;top:50%;transform:translateY(-50%);width:38px;height:38px;display:flex;align-items:center;justify-content:center;background:var(--white);border:1.5px solid var(--ink);border-radius:8px;cursor:pointer;transition:background .12s,transform .12s}
.ex-btn-speak:hover{background:var(--ink);color:var(--white);transform:translateY(-50%) scale(1.08)}
.ex-btn-speak svg{width:16px;height:16px}

.ex-hidden-hint{display:flex;align-items:center;gap:7px;padding:9px 13px;background:#f3e8ff;border:1.5px solid var(--purple);border-radius:8px;margin-bottom:11px;font-size:.8rem;color:var(--purple);font-weight:500}
.ex-hidden-hint svg{width:14px;height:14px;flex-shrink:0}

.ex-pos-pill{display:inline-flex;padding:3px 9px;border-radius:20px;font-size:.67rem;font-weight:700;border:1.5px solid currentColor;margin-bottom:10px}
.ex-pos-noun{color:#1d5fe8;background:#e8f0ff}.ex-pos-verb{color:#0a8a3e;background:#e4f7ed}
.ex-pos-adjective{color:#a05c00;background:#fff3e0}.ex-pos-adverb{color:#6b21a8;background:#f3e8ff}
.ex-pos-phrase{color:#be185d;background:#fce7f3}.ex-pos-default{color:#374151;background:#f3f4f6}

/* example */
.ex-exbox{display:flex;align-items:flex-start;gap:7px;padding:9px 12px;background:#faf9f4;border:1.5px solid #ddd;border-radius:8px;font-size:.8rem;color:#444;font-style:italic}
.ex-exbox span{flex:1}
.ex-btn-speak-sm{width:26px;height:26px;display:flex;align-items:center;justify-content:center;background:var(--white);border:1.5px solid var(--ink);border-radius:5px;cursor:pointer;transition:background .1s;flex-shrink:0}
.ex-btn-speak-sm:hover{background:var(--ink);color:var(--white)}
.ex-btn-speak-sm svg{width:12px;height:12px}
.ex-extrans{font-size:.76rem;color:#999;font-style:normal;margin-top:3px}

/* answer */
.ex-ans-label{font-size:.8rem;font-weight:600;color:#555;margin-bottom:7px;display:block}
.ex-ans-note{font-size:.75rem;color:#bbb;margin-left:5px}
.ex-ans-rows{display:flex;flex-direction:column;gap:7px;margin-bottom:11px}
.ex-ans-row{display:flex;align-items:center;gap:7px}
.ex-ans-num{width:25px;height:25px;background:var(--cyan);border:2px solid var(--ink);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:var(--ffd);font-size:.7rem;font-weight:800;flex-shrink:0}
.ex-ans-input{flex:1;padding:11px 13px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffb);font-size:.92rem;font-weight:500;outline:none;transition:box-shadow .12s;background:var(--white);color:var(--ink)}
.ex-ans-input:focus{box-shadow:var(--sh)}
.ex-btn-confirm{width:100%;padding:12px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.97rem;font-weight:800;border:2px solid var(--ink);border-radius:9px;cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.ex-btn-confirm:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}

/* result reveal */
.ex-result-banner{display:flex;align-items:center;gap:9px;padding:13px 16px;border-radius:9px;border-left:4px solid;font-weight:700;margin-bottom:14px;font-size:.92rem}
.ex-result-ok{background:#d1fae5;border-color:#10b981;color:#065f46}
.ex-result-ng{background:#fee2e2;border-color:var(--pink);color:#991b1b}
.ex-result-banner svg{width:20px;height:20px;flex-shrink:0}
.ex-compare{display:grid;grid-template-columns:1fr 1fr;gap:11px;padding:13px 15px;background:#faf9f4;border:2px solid var(--ink);border-radius:9px}
@media(max-width:440px){.ex-compare{grid-template-columns:1fr}}
.ex-cmp-label{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#999;margin-bottom:4px}
.ex-cmp-val{font-family:var(--ffd);font-size:.92rem;font-weight:700}
.ex-cmp-val--ok{color:#059669}

.ex-next-wrap{display:flex;justify-content:center;margin-top:16px}
.ex-btn-next{display:inline-flex;align-items:center;gap:7px;padding:12px 30px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.95rem;font-weight:800;border:2px solid var(--ink);border-radius:var(--r);cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.ex-btn-next:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.ex-btn-next svg{width:17px;height:17px}

/* ── RESULTS ── */
.ex-rhero{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:22px}
@media(max-width:500px){.ex-rhero{grid-template-columns:1fr}}
.ex-rhc{padding:20px;text-align:center;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh)}
.ex-rhc:nth-child(1){background:var(--cyan)}
.ex-rhc:nth-child(2){background:var(--lime)}
.ex-rhc:nth-child(3){background:var(--pink);color:var(--white)}
.ex-rhc:nth-child(3) .ex-rhlabel{color:rgba(255,255,255,.7)}
.ex-rhlabel{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;margin-bottom:5px;color:#444}
.ex-rhval{font-family:var(--ffd);font-size:2.2rem;font-weight:800;line-height:1}

.ex-pct-track{width:100%;height:12px;background:#e5e5de;border-radius:6px;border:2px solid var(--ink);overflow:hidden;margin-bottom:5px}
.ex-pct-fill{height:100%;border-radius:5px;transition:width .5s}
.ex-pct-label{font-family:var(--ffd);font-size:.95rem;font-weight:800;text-align:center}

.ex-stats2{display:grid;grid-template-columns:1fr 1fr;gap:11px;margin-bottom:18px}
@media(max-width:460px){.ex-stats2{grid-template-columns:1fr}}
.ex-sb{padding:13px 15px;border:2px solid var(--ink);border-radius:9px;box-shadow:var(--sh)}
.ex-sb:nth-child(1){background:#e8f5ff}
.ex-sb:nth-child(2){background:#f0fdf4}
.ex-sb-hdr{display:flex;justify-content:space-between;align-items:center;margin-bottom:7px}
.ex-sb-title{font-family:var(--ffd);font-size:.8rem;font-weight:800;display:flex;align-items:center;gap:4px}
.ex-sb-title svg{width:13px;height:13px}
.ex-sb-count{font-size:.75rem;font-weight:600;color:#888}
.ex-sb-bar{width:100%;height:6px;background:#ddd;border-radius:3px;overflow:hidden;margin-bottom:3px}
.ex-sb-fill{height:100%;border-radius:3px}
.ex-sb-pct{font-size:.75rem;font-weight:700;text-align:right}

/* log table */
.ex-logtable{width:100%;border-collapse:collapse}
.ex-logtable thead tr{border-bottom:2px solid var(--ink);background:#faf9f4}
.ex-logtable th{padding:10px 13px;text-align:left;font-size:.67rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#666}
.ex-logtable tbody tr{border-bottom:1.5px solid #e8e4d8;transition:background .1s}
.ex-logtable tbody tr:last-child{border-bottom:none}
.ex-logtable tbody tr:hover{background:#faf8f2}
.ex-logtable td{padding:12px 13px;font-size:.83rem;vertical-align:middle}
.ex-log-q{font-family:var(--ffd);font-weight:700}
.ex-log-ok{font-weight:700;color:#059669}
.ex-log-ng{font-weight:700;color:var(--pink)}
.ex-dot{display:inline-flex;padding:3px 9px;border-radius:20px;font-size:.68rem;font-weight:700;border:1.5px solid var(--ink)}
.ex-dot-ok{background:var(--lime)}
.ex-dot-ng{background:var(--pink);color:var(--white)}

/* result actions */
.ex-res-acts{display:flex;justify-content:center;gap:11px;flex-wrap:wrap;margin-top:24px}
.ex-btn-restart{display:inline-flex;align-items:center;gap:7px;padding:12px 26px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.92rem;font-weight:800;border:2px solid var(--ink);border-radius:var(--r);cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.ex-btn-restart:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.ex-btn-restart svg{width:16px;height:16px}
.ex-btn-cfg{display:inline-flex;align-items:center;gap:7px;padding:12px 26px;background:var(--white);color:var(--ink);font-family:var(--ffd);font-size:.92rem;font-weight:800;border:2px solid var(--ink);border-radius:var(--r);cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.ex-btn-cfg:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.ex-btn-cfg svg{width:16px;height:16px}

/* modal */
.ex-moverlay{position:fixed;inset:0;background:rgba(13,13,13,.68);z-index:100;display:flex;align-items:center;justify-content:center;padding:24px;animation:exFadeIn .2s}
@keyframes exFadeIn{from{opacity:0}to{opacity:1}}
.ex-mbox{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:9px 9px 0 var(--ink);max-width:420px;width:100%;padding:30px;text-align:center;animation:exPopIn .25s;position:relative}
@keyframes exPopIn{from{opacity:0;transform:scale(.92)}to{opacity:1;transform:scale(1)}}
.ex-mclose{position:absolute;top:12px;right:12px;background:none;border:none;cursor:pointer;opacity:.4;transition:opacity .15s}
.ex-mclose:hover{opacity:1}
.ex-mclose svg{width:17px;height:17px}
.ex-mhero{font-size:3.2rem;margin-bottom:10px;display:block}
.ex-mgrade{font-family:var(--ffd);font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#aaa;margin-bottom:3px}
.ex-mtitle{font-family:var(--ffd);font-size:1.4rem;font-weight:800;margin-bottom:5px}
.ex-msub{font-size:.85rem;color:#666;margin-bottom:16px}
.ex-mscore-box{background:var(--cream);border:2px solid var(--ink);border-radius:9px;padding:13px 15px;margin-bottom:18px}
.ex-mscore-grid{display:grid;grid-template-columns:1fr 1fr;gap:7px;text-align:center}
.ex-msc-label{font-size:.72rem;color:#888;font-weight:600;margin-bottom:2px}
.ex-msc-val{font-family:var(--ffd);font-size:1.4rem;font-weight:800}
.ex-mbtn-row{display:flex;gap:9px}
.ex-mbtn-detail{flex:1;padding:11px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffd);font-size:.87rem;font-weight:800;background:var(--ink);color:var(--lime);cursor:pointer;box-shadow:var(--sh);transition:transform .12s}
.ex-mbtn-detail:hover{transform:translate(-1px,-1px)}
.ex-mbtn-retry{flex:1;padding:11px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffd);font-size:.87rem;font-weight:800;background:var(--lime);cursor:pointer;box-shadow:var(--sh);transition:transform .12s}
.ex-mbtn-retry:hover{transform:translate(-1px,-1px)}
</style>

<div class="ex-wrap">
  <div class="ex-deco" aria-hidden="true">
    <i></i><i></i><i></i><i></i><i></i>
  </div>

  <div class="ex-inner">

    <div class="ex-phdr">
      <h1 class="ex-title">{{ __('app.exam.title_pre') }}<mark>{{ __('app.exam.title_hl') }}</mark>{{ __('app.exam.title_post') }}</h1>
      <p class="ex-sub">{{ __('app.exam.subtitle') }}</p>
    </div>

    @if(session()->has('error'))
    <div class="ex-flash-err">
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
      {{ session('error') }}
    </div>
    @endif

    {{-- ── SETUP ── --}}
    @if(!$examStarted)
    <div class="ex-card">
      <div class="ex-card-hdr">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span class="ex-card-hdr-t">{{ __('app.exam.settings_title') }}</span>
      </div>
      <div class="ex-card-body">
        <div class="ex-sg">

          {{-- 題目數量 --}}
          <div>
            <span class="ex-slabel">{{ __('app.exam.q_count_label') }}</span>
            <div class="ex-rg">
              @foreach([10,20,30] as $n)
              <label class="ex-rbtn {{ $questionCount==$n ? 'on-blue' : '' }}">
                <input type="radio" name="questionCount" wire:model.live="questionCount" value="{{ $n }}">{{ __('app.exam.q_n', ['n' => $n]) }}
              </label>
              @endforeach
              <label class="ex-rbtn {{ $questionCount==0 ? 'on-blue' : '' }}">
                <input type="radio" name="questionCount" wire:model.live="questionCount" value="0">{{ __('app.exam.q_unlimited') }}
              </label>
            </div>
          </div>

          {{-- 測驗方向 --}}
          <div>
            <span class="ex-slabel">{{ __('app.exam.direction_label') }}</span>
            <div class="ex-rg">
              <label class="ex-rbtn {{ !$mixedMode&&!$listeningMode&&$testType=='en_to_zh' ? 'on-blue' : '' }} {{ $listeningMode ? 'dimmed' : '' }}">
                <input type="radio" name="testType" wire:model.live="testType" value="en_to_zh" wire:click="$set('mixedMode',false)" {{ $listeningMode ? 'disabled' : '' }}>{{ __('app.exam.dir_word_zh') }}
              </label>
              <label class="ex-rbtn {{ !$mixedMode&&!$listeningMode&&$testType=='zh_to_en' ? 'on-blue' : '' }} {{ $listeningMode ? 'dimmed' : '' }}">
                <input type="radio" name="testType" wire:model.live="testType" value="zh_to_en" wire:click="$set('mixedMode',false)" {{ $listeningMode ? 'disabled' : '' }}>{{ __('app.exam.dir_zh_word') }}
              </label>
              <label class="ex-rbtn {{ $mixedMode&&!$listeningMode ? 'on-blue' : '' }} {{ $listeningMode ? 'dimmed' : '' }}">
                <input type="radio" name="testType" value="mixed" wire:click="$set('mixedMode',true)" {{ $listeningMode ? 'disabled' : '' }}>{{ __('app.exam.dir_mixed') }}
              </label>
            </div>
          </div>

          {{-- 聽力模式 --}}
          <div class="ex-sc2">
            <label class="ex-trow">
              <div class="ex-ttrack {{ $listeningMode ? 'on-purple' : '' }}">
                <div class="ex-tknob"></div>
                <input type="checkbox" name="listeningMode" wire:model.live="listeningMode" style="opacity:0;position:absolute;pointer-events:none;width:0;height:0">
              </div>
              <span class="ex-tlabel">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:{{ $listeningMode ? 'var(--purple)' : '#888' }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                {{ __('app.exam.listening_label') }}
              </span>
            </label>
            <p class="ex-thint">{{ $listeningMode ? __('app.exam.listening_on') : __('app.exam.listening_off') }}</p>
          </div>

          {{-- 重點篩選 --}}
          <div>
            <span class="ex-slabel">{{ __('app.exam.importance_label') }}</span>
            <div class="ex-rg">
              <label class="ex-rbtn {{ $importanceFilter=='all' ? 'on-blue' : '' }}">
                <input type="radio" name="importanceFilter" wire:model.live="importanceFilter" value="all">{{ __('app.exam.imp_all') }}
              </label>
              <label class="ex-rbtn {{ $importanceFilter=='important' ? 'on-orange' : '' }}">
                <input type="radio" name="importanceFilter" wire:model.live="importanceFilter" value="important">{{ __('app.exam.imp_important') }}
              </label>
              <label class="ex-rbtn {{ $importanceFilter=='not_important' ? 'on-blue' : '' }}">
                <input type="radio" name="importanceFilter" wire:model.live="importanceFilter" value="not_important">{{ __('app.exam.imp_normal') }}
              </label>
            </div>
          </div>

          {{-- 語言篩選 --}}
          <div>
            <span class="ex-slabel">{{ __('app.exam.lang_filter') }}</span>
            <div class="ex-rg">
              <label class="ex-rbtn {{ $selectedLanguage=='all' ? 'on-blue' : '' }}">
                <input type="radio" name="selectedLanguage" wire:model.live="selectedLanguage" value="all">{{ __('app.exam.lang_all') }}
              </label>
              @foreach($availableLanguages as $lang)
              <label class="ex-rbtn {{ $selectedLanguage==$lang ? 'on-blue' : '' }}">
                <input type="radio" name="selectedLanguage" wire:model.live="selectedLanguage" value="{{ $lang }}">{{ $this->getLanguageDisplayName($lang) }}
              </label>
              @endforeach
            </div>
          </div>

          {{-- 題目範圍篩選 --}}
          <div class="ex-sc2">
            <span class="ex-slabel">
              {{ __('app.exam.range_label') }}
              <span style="font-size:.72rem;font-weight:600;text-transform:none;letter-spacing:0;color:#888;margin-left:6px">
                {{ __('app.exam.range_total', ['n' => $totalCount]) }}
                @if(($questionRangeStart || $questionRangeEnd) && count($allVocabularies) !== $totalCount)
                  {{ __('app.exam.range_filtered', ['n' => count($allVocabularies)]) }}
                @endif
              </span>
            </span>
            <div class="ex-rrange">
              <span class="ex-rlabel2">{{ __('app.exam.range_from') }}</span>
              <input type="number" wire:model.lazy="questionRangeStart" min="1" class="ex-rnum" placeholder="1">
              <span class="ex-rlabel2">{{ __('app.exam.range_mid') }}</span>
              <input type="number" wire:model.lazy="questionRangeEnd" min="1" class="ex-rnum" placeholder="{{ $totalCount }}">
              <span class="ex-rlabel2">{{ __('app.exam.range_end') }}</span>
              <button type="button" wire:click="clearQuestionRange" class="ex-bclr-r">{{ __('app.exam.range_clear') }}</button>
            </div>
          </div>

          {{-- 允許重複 --}}
          <div class="ex-sc2">
            <label class="ex-trow">
              <div class="ex-ttrack {{ $allowRepeat ? 'on-blue' : '' }}">
                <div class="ex-tknob"></div>
                <input type="checkbox" name="allowRepeat" wire:model.live="allowRepeat" style="opacity:0;position:absolute;pointer-events:none;width:0;height:0">
              </div>
              <span class="ex-tlabel" style="font-size:.85rem">{{ __('app.exam.repeat_label') }}</span>
            </label>
          </div>

          {{-- 詞彙統計提示 --}}
          <div class="ex-sc2">
            <div class="ex-info">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <div>
                {{ __('app.exam.info_count', ['n' => count($allVocabularies)]) }}
                @if($listeningMode)<span style="color:var(--purple);font-weight:700;margin-left:4px">{{ __('app.exam.info_listening') }}</span>@endif
                @if(!$allowRepeat && $questionCount > count($allVocabularies) && $questionCount!=0)
                  <span style="color:var(--pink);font-weight:700;display:block;margin-top:3px">{{ __('app.exam.info_insufficient', ['n' => count($allVocabularies)]) }}</span>
                @endif
              </div>
            </div>
          </div>

        </div>

        <div class="ex-start-wrap">
          <button wire:click="startExam" class="ex-btn-start">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $listeningMode ? __('app.exam.start_listening') : __('app.exam.start_btn') }}
          </button>
        </div>
      </div>
    </div>
    <div class="ex-back">
      <a href="{{ route('vocabulary.index') }}">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('app.exam.back_to_list') }}
      </a>
    </div>
    @endif

    {{-- ── EXAM IN PROGRESS ── --}}
    @if($examStarted && !$examFinished)
    @php $ct = ($listeningMode||$mixedMode) ? $questionTypes[$currentQuestionIndex] : $testType; @endphp
    <div class="ex-card">
      <div class="ex-prog">
        <div class="ex-prog-info">
          <span>
            @if($questionCount==0) {{ __('app.exam.progress_done', ['n' => $currentQuestionIndex+1]) }}
            @else {{ __('app.exam.progress_of', ['cur' => $currentQuestionIndex+1, 'total' => count($questions)]) }} @endif
          </span>
          <span>
            <span class="ex-prog-ok">{{ __('app.exam.correct_count', ['n' => $correctCount]) }}</span> /
            <span class="ex-prog-ng">{{ __('app.exam.incorrect_count', ['n' => $incorrectCount]) }}</span>
          </span>
        </div>
        <div class="ex-prog-track">
          <div class="ex-prog-fill" style="width:{{ $questionCount==0 ? 100 : (($currentQuestionIndex+1)/count($questions)*100) }}%;background:{{ $listeningMode ? 'var(--purple)' : 'var(--cyan)' }}"></div>
        </div>
      </div>

      <div class="ex-card-body">
        <div class="ex-qtop">
          <div class="ex-qtags">
            @if($listeningMode)
              <span class="ex-qtag ex-qtag-purple"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>{{ __('app.exam.tag_listening') }}</span>
            @elseif($ct=='en_to_zh')
              <span class="ex-qtag ex-qtag-blue"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>{{ __('app.exam.tag_word_zh') }}</span>
            @else
              <span class="ex-qtag ex-qtag-green"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>{{ __('app.exam.tag_zh_word') }}</span>
            @endif
            @if(isset($questions[$currentQuestionIndex]['is_important']) && $questions[$currentQuestionIndex]['is_important'])
              <span class="ex-qtag ex-qtag-orange">{{ __('app.exam.tag_important') }}</span>
            @endif
            @if(isset($questions[$currentQuestionIndex]['language_type']) && $questions[$currentQuestionIndex]['language_type']!='english')
              <span class="ex-qtag" style="background:#f3e8ff">{{ $this->getLanguageDisplayName($questions[$currentQuestionIndex]['language_type']) }}</span>
            @endif
            <span class="ex-qnum">{{ __('app.exam.q_num', ['n' => $currentQuestionIndex+1]) }}</span>
          </div>
          <div class="ex-qops">
            @if($listeningMode && $ct=='en_to_zh')
            <button onclick="exToggleWord()" class="ex-btn-vis">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                @if($wordHidden)
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                @else
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                @endif
              </svg>
              <span id="exToggleTxt">{{ $wordHidden ? __('app.exam.show') : __('app.exam.hide') }}</span>
            </button>
            @endif
            @if(!$mixedMode && !$listeningMode)
            <button wire:click="toggleTestType" class="ex-btn-flip">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
              {{ __('app.exam.flip_dir') }}
            </button>
            @endif
          </div>
        </div>

        @php
          $cw = $ct=='en_to_zh'
            ? $questions[$currentQuestionIndex]['english_word']
            : implode('、', (array)$questions[$currentQuestionIndex]['chinese_word']);
          $isEn = ($ct=='en_to_zh');
          $speakLang = match($questions[$currentQuestionIndex]['language_type'] ?? 'english') {
            'japanese' => 'ja-JP',
            'korean'   => 'ko-KR',
            default    => 'en-US',
          };
        @endphp

        <div style="text-align:center;margin-bottom:14px">
          <div class="ex-qbox {{ $listeningMode ? 'style-purple' : 'style-blue' }}">
            <div id="exWordText" class="ex-qtext {{ $listeningMode && $wordHidden ? 'word-hidden' : '' }}">{{ $cw }}</div>
            @if($isEn)
            <button type="button" onclick="speakWord('{{ $questions[$currentQuestionIndex]['english_word'] }}','{{ $speakLang }}')" class="ex-btn-speak" title="{{ __('app.exam.play_title') }}">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
            </button>
            @endif
          </div>

          @if($listeningMode && $wordHidden)
          <div class="ex-hidden-hint">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ __('app.exam.hidden_hint') }}
          </div>
          @endif

          @if(!empty($questions[$currentQuestionIndex]['part_of_speech']))
            @php $ps=$questions[$currentQuestionIndex]['part_of_speech']; @endphp
            <span class="ex-pos-pill ex-pos-{{ $ps }}">{{ __('app.pos.' . $ps, [], null) ?: $ps }}</span>
          @endif

          @if(!empty($questions[$currentQuestionIndex]['example_sentence']) && $answerResult !== null)
          <div class="ex-exbox">
            <span>"{{ $questions[$currentQuestionIndex]['example_sentence'] }}"
              @if(!empty($questions[$currentQuestionIndex]['example_sentence_translation']))
              <div class="ex-extrans">{{ $questions[$currentQuestionIndex]['example_sentence_translation'] }}</div>
              @endif
            </span>
            <button type="button" onclick="speakWord('{{ $questions[$currentQuestionIndex]['example_sentence'] }}','{{ $speakLang }}')" class="ex-btn-speak-sm">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
            </button>
          </div>
          @endif
        </div>

        @if($answerResult === null)
          @php $mc=1; @endphp
          @if($ct=='en_to_zh')
            @php $raw=$questions[$currentQuestionIndex]['chinese_word']; $mc=is_array($raw)?count($raw):1; @endphp
          @endif
          <span class="ex-ans-label">
            {{ $ct=='en_to_zh' ? __('app.exam.ans_label_zh') : __('app.exam.ans_label_word') }}
            @if($ct=='en_to_zh' && $mc > 1)<span class="ex-ans-note">{{ __('app.exam.ans_note', ['n' => $mc]) }}</span>@endif
          </span>
          <div class="ex-ans-rows">
            @for($m=0;$m<$mc;$m++)
            <div class="ex-ans-row">
              @if($mc>1)<span class="ex-ans-num">{{ $m+1 }}</span>@endif
              <input type="text" wire:model="userAnswers.{{ $m }}"
                @if($m===$mc-1) wire:keydown.enter="checkAnswer" @endif
                class="ex-ans-input"
                placeholder="{{ $ct=='en_to_zh' ? __('app.exam.ans_ph_zh') : __('app.exam.ans_ph_word') }}"
                autocomplete="off"
                @if($m===0) autofocus @endif>
            </div>
            @endfor
          </div>
          <button wire:click="checkAnswer" class="ex-btn-confirm">{{ __('app.exam.confirm_btn') }}</button>

        @else
          <div class="ex-result-banner {{ $answerResult ? 'ex-result-ok' : 'ex-result-ng' }}">
            @if($answerResult)
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ __('app.exam.result_correct') }}
            @else
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ __('app.exam.result_wrong') }}
            @endif
          </div>
          <div class="ex-compare">
            <div>
              <div class="ex-cmp-label">{{ __('app.exam.your_answer') }}</div>
              <div class="ex-cmp-val">{{ implode('、', array_filter(array_map('trim', $userAnswers))) }}</div>
            </div>
            <div>
              <div class="ex-cmp-label">{{ __('app.exam.correct_answer') }}</div>
              <div class="ex-cmp-val ex-cmp-val--ok">{{ $correctAnswer }}</div>
            </div>
          </div>
          <div class="ex-next-wrap">
            <button wire:click="nextQuestion" class="ex-btn-next">
              @if($currentQuestionIndex < count($questions)-1 || ($infiniteMode && $allowRepeat))
                {{ __('app.exam.next_q') }} <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
              @else
                {{ __('app.exam.finish_exam') }} <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              @endif
            </button>
          </div>
        @endif
      </div>
    </div>

    <div class="ex-back">
      <button wire:click="backToSetup" class="ex-bottom-btn">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('app.exam.back_to_setup') }}
      </button>
    </div>
    @endif

    {{-- ── RESULTS ── --}}
    @if($examFinished)
    @php $pct = count($answeredQuestions)>0 ? round(($correctCount/count($answeredQuestions))*100) : 0; @endphp
    <div class="ex-card">
      <div class="ex-card-hdr">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span class="ex-card-hdr-t">{{ __('app.exam.result_title') }}</span>
        @if($listeningMode)<span class="ex-qtag ex-qtag-purple" style="font-size:.7rem;padding:2px 9px;margin-left:8px">{{ __('app.exam.listening_tag') }}</span>@endif
      </div>
      <div class="ex-card-body">

        <div class="ex-rhero">
          <div class="ex-rhc"><div class="ex-rhlabel">{{ __('app.exam.stat_total') }}</div><div class="ex-rhval">{{ count($answeredQuestions) }}</div></div>
          <div class="ex-rhc"><div class="ex-rhlabel">{{ __('app.exam.stat_correct') }}</div><div class="ex-rhval">{{ $correctCount }}</div></div>
          <div class="ex-rhc"><div class="ex-rhlabel">{{ __('app.exam.stat_wrong') }}</div><div class="ex-rhval">{{ $incorrectCount }}</div></div>
        </div>

        <div style="margin-bottom:24px">
          <div class="ex-pct-track">
            <div class="ex-pct-fill" style="width:{{ $pct }}%;background:{{ $listeningMode ? 'var(--purple)' : 'var(--cyan)' }}"></div>
          </div>
          <div class="ex-pct-label">{{ __('app.exam.pct_label', ['pct' => $pct]) }}</div>
        </div>

        @if($mixedMode && !$listeningMode && count($answeredQuestions)>0)
          @php
            $etc=0;$ztc=0;$ecc=0;$zcc=0;
          @endphp
          @foreach($answeredQuestions as $q)
            @if($q['type']=='en_to_zh')
              @php $etc++; @endphp
              @if($q['isCorrect']) @php $ecc++; @endphp @endif
            @else
              @php $ztc++; @endphp
              @if($q['isCorrect']) @php $zcc++; @endphp @endif
            @endif
          @endforeach
          @php
            $etp=$etc>0?round($ecc/$etc*100):0;
            $ztp=$ztc>0?round($zcc/$ztc*100):0;
          @endphp
          <div class="ex-stats2">
            <div class="ex-sb">
              <div class="ex-sb-hdr"><div class="ex-sb-title"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>{{ __('app.exam.word_zh_label') }}</div><span class="ex-sb-count">{{ $etc }}{{ __('app.exam.q_n', ['n' => '']) }}</span></div>
              <div class="ex-sb-bar"><div class="ex-sb-fill" style="width:{{ $etp }}%;background:var(--cyan)"></div></div>
              <div class="ex-sb-pct">{{ $etp }}% ({{ $ecc }}/{{ $etc }})</div>
            </div>
            <div class="ex-sb">
              <div class="ex-sb-hdr"><div class="ex-sb-title"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>{{ __('app.exam.zh_word_label') }}</div><span class="ex-sb-count">{{ $ztc }}{{ __('app.exam.q_n', ['n' => '']) }}</span></div>
              <div class="ex-sb-bar"><div class="ex-sb-fill" style="width:{{ $ztp }}%;background:#4ade80"></div></div>
              <div class="ex-sb-pct">{{ $ztp }}% ({{ $zcc }}/{{ $ztc }})</div>
            </div>
          </div>
        @endif

        <div style="overflow-x:auto;border:2px solid var(--ink);border-radius:9px;box-shadow:var(--sh);margin-bottom:0">
          <table class="ex-logtable">
            <thead>
              <tr>
                <th>{{ __('app.exam.log_question') }}</th>
                @if($mixedMode && !$listeningMode)<th>{{ __('app.exam.log_type') }}</th>@endif
                @if($listeningMode)<th>{{ __('app.exam.log_mode') }}</th>@endif
                <th>{{ __('app.exam.log_your_ans') }}</th>
                <th>{{ __('app.exam.log_correct_ans') }}</th>
                <th>{{ __('app.exam.log_result') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($answeredQuestions as $q)
              <tr>
                <td class="ex-log-q">{{ $q['question'] }}</td>
                @if($mixedMode && !$listeningMode)
                <td><span class="ex-qtag {{ $q['type']=='en_to_zh' ? 'ex-qtag-blue' : 'ex-qtag-green' }}" style="font-size:.68rem;padding:2px 8px">{{ $q['type']=='en_to_zh' ? __('app.exam.tag_word_zh') : __('app.exam.tag_zh_word') }}</span></td>
                @endif
                @if($listeningMode)
                <td><span class="ex-qtag ex-qtag-purple" style="font-size:.68rem;padding:2px 8px">{{ __('app.exam.tag_listening') }}</span></td>
                @endif
                <td class="{{ $q['isCorrect'] ? 'ex-log-ok' : 'ex-log-ng' }}">{{ $q['userAnswer'] }}</td>
                <td style="font-weight:600">{{ $q['correctAnswer'] }}</td>
                <td><span class="ex-dot {{ $q['isCorrect'] ? 'ex-dot-ok' : 'ex-dot-ng' }}">{{ $q['isCorrect'] ? __('app.exam.log_correct_dot') : __('app.exam.log_wrong_dot') }}</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="ex-res-acts">
          <button wire:click="restartExam" wire:loading.attr="disabled" class="ex-btn-restart">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            {{ __('app.exam.restart_btn') }}
          </button>
          <button wire:click="backToSetup" class="ex-btn-cfg">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            {{ __('app.exam.settings_btn') }}
          </button>
        </div>
      </div>
    </div>

    <div class="ex-back">
      <a href="{{ route('vocabulary.index') }}">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('app.exam.back_to_list') }}
      </a>
    </div>
    @endif

  </div>

  {{-- Result modal --}}
  @if($examStarted && $examFinished && count($answeredQuestions)>0)
  <div id="exModal" class="ex-moverlay">
    <div class="ex-mbox">
      <button type="button" onclick="document.getElementById('exModal').style.display='none'" class="ex-mclose">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
      @php $sp=round(($correctCount/count($answeredQuestions))*100); @endphp
      <span class="ex-mhero">@if($sp>=90)🏆@elseif($sp>=70)✅@elseif($sp>=40)⚡@else📖@endif</span>
      <div class="ex-mgrade">@if($sp>=90)Excellent @elseif($sp>=70)Good Job @elseif($sp>=40)Keep Going @else Keep Trying @endif</div>
      <h2 class="ex-mtitle">{{ $listeningMode ? __('app.exam.modal_listening') : __('app.exam.modal_done') }}</h2>
      <p class="ex-msub">
        @if($sp>=90) {{ __('app.exam.modal_excellent') }}
        @elseif($sp>=70) {{ __('app.exam.modal_good') }}
        @elseif($sp>=40) {{ __('app.exam.modal_ok') }}
        @else {{ __('app.exam.modal_keep_trying') }} @endif
      </p>
      <div class="ex-mscore-box">
        <div class="ex-mscore-grid">
          <div><div class="ex-msc-label">{{ __('app.exam.modal_pct') }}</div><div class="ex-msc-val">{{ $sp }}%</div></div>
          <div><div class="ex-msc-label">{{ __('app.exam.modal_score') }}</div><div class="ex-msc-val">{{ $correctCount }}/{{ count($answeredQuestions) }}</div></div>
        </div>
      </div>
      <div class="ex-mbtn-row">
        <button onclick="document.getElementById('exModal').style.display='none'" class="ex-mbtn-detail">{{ __('app.exam.modal_details') }}</button>
        <button wire:click="restartExam" class="ex-mbtn-retry">{{ __('app.exam.modal_retry') }}</button>
      </div>
    </div>
  </div>
  @endif
</div>

<script>
let exWordHidden = @json($wordHidden ?? false);
const exTxtShow = '{{ __("app.exam.show") }}';
const exTxtHide = '{{ __("app.exam.hide") }}';
function exToggleWord(){
  const w=document.getElementById('exWordText'),t=document.getElementById('exToggleTxt');
  if(w&&t){exWordHidden=!exWordHidden;w.classList.toggle('word-hidden',exWordHidden);t.textContent=exWordHidden?exTxtShow:exTxtHide;}
}
function speakWord(text, lang='en-US'){
  if('speechSynthesis' in window){
    window.speechSynthesis.cancel();
    const u=new SpeechSynthesisUtterance(text);
    u.lang=lang;
    u.rate=(lang==='ko-KR'||lang==='ja-JP')?0.85:0.9;
    window.speechSynthesis.speak(u);
  }
}
document.addEventListener('livewire:navigating',()=>{ if('speechSynthesis' in window) window.speechSynthesis.cancel(); });
document.addEventListener('livewire:updated',()=>{
  const wordEl=document.getElementById('exWordText');
  const toggleEl=document.getElementById('exToggleTxt');
  if(wordEl&&toggleEl){
    exWordHidden=wordEl.classList.contains('word-hidden');
    toggleEl.textContent=exWordHidden?exTxtShow:exTxtHide;
  }
});
</script>
</div>

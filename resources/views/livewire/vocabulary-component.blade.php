<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&display=swap');

.vl-wrap{--lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;--ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;--sh:4px 4px 0 #0D0D0D;--sh-lg:6px 6px 0 #0D0D0D;--r:14px;--ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans KR','Noto Sans JP','Noto Sans TC',sans-serif;font-family:var(--ffb);background:var(--cream);min-height:100vh;padding:44px 32px;position:relative;overflow-x:hidden}

/* confetti */
.vl-deco{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden}
.vl-deco i{position:absolute;display:block;border-radius:3px}
.vl-deco i:nth-child(1){width:26px;height:26px;background:var(--pink);top:7%;left:2%;transform:rotate(20deg);opacity:.65}
.vl-deco i:nth-child(2){width:18px;height:18px;background:var(--cyan);top:14%;right:3%;transform:rotate(-18deg);opacity:.55}
.vl-deco i:nth-child(3){width:22px;height:10px;background:var(--orange);top:42%;left:1%;transform:rotate(40deg);opacity:.6}
.vl-deco i:nth-child(4){width:14px;height:14px;background:var(--lime);top:68%;right:2%;transform:rotate(30deg);opacity:.7;border:2px solid var(--ink)}
.vl-deco i:nth-child(5){width:30px;height:11px;background:var(--pink);top:83%;left:5%;transform:rotate(-22deg);opacity:.45}
.vl-deco i:nth-child(6){width:15px;height:15px;background:var(--cyan);top:52%;right:4%;transform:rotate(60deg);opacity:.5}

.vl-inner{position:relative;z-index:1;max-width:1200px;margin:0 auto}

/* header */
.vl-hdr{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-bottom:32px;flex-wrap:wrap}
.vl-hdr-l{display:flex;flex-direction:column;gap:5px}
.vl-title{font-family:var(--ffd);font-size:clamp(2.2rem,4.5vw,3.6rem);font-weight:800;line-height:1;letter-spacing:-.03em;color:var(--ink)}
.vl-title mark{background:var(--lime);padding:0 8px;border:2px solid var(--ink);border-radius:6px;font-style:normal}
.vl-sub{font-size:.88rem;font-weight:500;color:#666}
.vl-btn-add{display:inline-flex;align-items:center;gap:7px;padding:12px 24px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.92rem;font-weight:700;text-decoration:none;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);transition:transform .15s,box-shadow .15s;white-space:nowrap}
.vl-btn-add:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.vl-btn-add svg{width:16px;height:16px;flex-shrink:0}

/* stats */
.vl-stats{display:grid;grid-template-columns:repeat(5,1fr);gap:13px;margin-bottom:28px}
@media(max-width:900px){.vl-stats{grid-template-columns:repeat(3,1fr)}}
@media(max-width:600px){.vl-stats{grid-template-columns:repeat(2,1fr)}}
.vl-stat{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);padding:17px 18px;display:flex;flex-direction:column;gap:4px;transition:transform .15s,box-shadow .15s}
.vl-stat:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.vl-stat:nth-child(1){background:var(--lime)}
.vl-stat:nth-child(2){background:var(--pink);color:var(--white)}
.vl-stat:nth-child(2) .vl-slabel{color:rgba(255,255,255,.75)}
.vl-stat:nth-child(3){background:var(--cyan)}
.vl-stat:nth-child(4){background:var(--orange);color:var(--white)}
.vl-stat:nth-child(4) .vl-slabel{color:rgba(255,255,255,.75)}
.vl-stat:nth-child(5){background:#3B82F6;color:var(--white)}
.vl-stat:nth-child(5) .vl-slabel{color:rgba(255,255,255,.75)}
.vl-sicon{font-size:1.4rem;line-height:1}
.vl-slabel{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#444}
.vl-sval{font-family:var(--ffd);font-size:1.85rem;font-weight:800;line-height:1}

/* flash */
.vl-flash{display:flex;align-items:center;gap:10px;padding:13px 17px;background:var(--lime);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);margin-bottom:20px;font-weight:600;font-size:.9rem}
.vl-flash svg{width:17px;height:17px;flex-shrink:0}

/* table card */
.vl-card{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);overflow:hidden}

/* toolbar */
.vl-tbar{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:16px 20px;border-bottom:2px solid var(--ink);background:var(--cream);flex-wrap:wrap}
.vl-tbar-t{font-family:var(--ffd);font-size:1rem;font-weight:800;display:flex;align-items:center;gap:6px}
.vl-tbar-t svg{width:17px;height:17px}
.vl-tbar-c{display:flex;gap:8px;flex-wrap:wrap;align-items:center}
.vl-sw{position:relative}
.vl-sw svg{position:absolute;left:10px;top:50%;transform:translateY(-50%);width:14px;height:14px;color:#999}
.vl-sinput{padding:8px 11px 8px 32px;border:2px solid var(--ink);border-radius:8px;font-family:var(--ffb);font-size:.85rem;font-weight:500;background:var(--white);width:190px;outline:none;transition:box-shadow .12s}
.vl-sinput:focus{box-shadow:var(--sh)}
.vl-fsel{padding:8px 12px;border:2px solid var(--ink);border-radius:8px;font-family:var(--ffb);font-size:.82rem;font-weight:600;background:var(--white);cursor:pointer;outline:none}
.vl-fsel:focus{box-shadow:var(--sh)}
.vl-bclear{display:inline-flex;align-items:center;gap:4px;padding:8px 12px;border:2px solid var(--ink);border-radius:8px;font-family:var(--ffb);font-size:.8rem;font-weight:600;background:var(--white);cursor:pointer;transition:background .12s}
.vl-bclear:hover{background:#eeeae0}
.vl-bclear svg{width:12px;height:12px}

/* table */
.vl-table{width:100%;border-collapse:collapse}
.vl-table thead tr{border-bottom:2px solid var(--ink);background:#faf9f4}
.vl-table th{padding:12px 18px;text-align:left;font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#666}
.vl-table tbody tr{border-bottom:1.5px solid #e8e4d8;transition:background .1s}
.vl-table tbody tr:last-child{border-bottom:none}
.vl-table tbody tr:hover{background:#faf8f2}
.vl-table td{padding:14px 18px;vertical-align:middle;color:var(--ink)}

.vl-bstar{background:none;border:none;font-size:1.3rem;cursor:pointer;transition:transform .15s;line-height:1;padding:0}
.vl-bstar:hover{transform:scale(1.3)}
.vl-wrd{font-family:var(--ffb);font-size:.97rem;font-weight:700}
.vl-m1{font-size:.88rem;font-weight:500}
.vl-mlist{display:flex;flex-direction:column;gap:2px}
.vl-mitem{font-size:.85rem;font-weight:500;display:flex;align-items:baseline;gap:4px}
.vl-mnum{font-size:.68rem;font-weight:700;color:#bbb;flex-shrink:0}

.vl-pos{display:inline-flex;padding:3px 9px;border-radius:20px;font-size:.68rem;font-weight:700;border:1.5px solid currentColor}
.vl-pos-noun{color:#1d5fe8;background:#e8f0ff}
.vl-pos-verb{color:#0a8a3e;background:#e4f7ed}
.vl-pos-adjective{color:#a05c00;background:#fff3e0}
.vl-pos-adverb{color:#6b21a8;background:#f3e8ff}
.vl-pos-phrase{color:#be185d;background:#fce7f3}
.vl-pos-preposition{color:#3730a3;background:#e0e7ff}
.vl-pos-conjunction{color:#b91c1c;background:#fee2e2}
.vl-pos-pronoun{color:#374151;background:#f3f4f6}
.vl-pos-particle{color:#9d174d;background:#fdf2f8}
.vl-pos-default{color:#374151;background:#f3f4f6}

.vl-exmain{font-size:.8rem;color:#333;max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.vl-extrans{font-size:.75rem;color:#aaa;max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin-top:1px}
.vl-noex{font-size:.78rem;color:#ccc;font-style:italic}

.vl-ag{display:flex;align-items:center;justify-content:flex-end;gap:4px}
.vl-ba{display:inline-flex;align-items:center;justify-content:center;width:30px;height:30px;border-radius:7px;border:1.5px solid var(--ink);background:var(--white);cursor:pointer;transition:background .1s,transform .1s;text-decoration:none;color:var(--ink)}
.vl-ba:hover{background:var(--ink);color:var(--white);transform:translate(-1px,-1px)}
.vl-ba--del:hover{background:var(--pink);border-color:var(--pink);color:var(--white)}
.vl-ba svg{width:13px;height:13px}

.vl-empty{display:flex;flex-direction:column;align-items:center;padding:52px 24px;gap:10px;text-align:center}
.vl-empty svg{width:42px;height:42px;color:#ccc}
.vl-empty-t{font-family:var(--ffd);font-size:1.1rem;font-weight:700;color:#777}
.vl-empty-s{font-size:.86rem;color:#aaa}
.vl-bempty{margin-top:4px;display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.88rem;font-weight:700;text-decoration:none;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);transition:transform .15s}
.vl-bempty:hover{transform:translate(-2px,-2px)}

.vl-pagi{padding:13px 20px;border-top:2px solid var(--ink);background:#faf9f4}

/* modal */
.vl-moverlay{position:fixed;inset:0;background:rgba(13,13,13,.65);z-index:100;display:flex;align-items:center;justify-content:center;padding:24px}
.vl-mbox{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:8px 8px 0 var(--ink);max-width:400px;width:100%;padding:28px;text-align:center}
.vl-mico{width:50px;height:50px;background:var(--pink);border:2px solid var(--ink);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px}
.vl-mico svg{width:22px;height:22px;color:var(--white)}
.vl-mtitle{font-family:var(--ffd);font-size:1.25rem;font-weight:800;margin-bottom:12px}
.vl-mprev{background:var(--cream);border:2px solid #ddd;border-radius:9px;padding:11px 14px;margin-bottom:12px}
.vl-mprev-w{font-family:var(--ffd);font-size:.97rem;font-weight:700}
.vl-mprev-m{font-size:.85rem;color:#555;margin-top:2px}
.vl-mprev-s{font-size:.8rem;color:#f59e0b;margin-top:2px}
.vl-mtext{font-size:.85rem;color:#666;margin-bottom:20px}
.vl-macts{display:flex;gap:9px;justify-content:center}
.vl-bcancel{padding:10px 20px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffd);font-weight:700;font-size:.88rem;background:var(--white);cursor:pointer;transition:background .12s}
.vl-bcancel:hover{background:#eeeae0}
.vl-bdel{padding:10px 20px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffd);font-weight:700;font-size:.88rem;background:var(--pink);color:var(--white);cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.vl-bdel:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}

/* edit modal */
.vl-ebox{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:8px 8px 0 var(--ink);max-width:540px;width:100%;max-height:88vh;display:flex;flex-direction:column}
.vl-ebox-hdr{display:flex;align-items:center;justify-content:space-between;padding:18px 22px 14px;border-bottom:2px solid var(--ink);flex-shrink:0}
.vl-ebox-ttl{font-family:var(--ffd);font-size:1.15rem;font-weight:800}
.vl-ebox-close{background:none;border:1.5px solid var(--ink);border-radius:7px;width:32px;height:32px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--ink);transition:background .1s}
.vl-ebox-close:hover{background:var(--ink);color:var(--white)}
.vl-ebox-close svg{width:15px;height:15px}
.vl-ebox-body{overflow-y:auto;padding:18px 22px;display:flex;flex-direction:column;gap:13px}
.vl-ebox-ftr{padding:14px 22px;border-top:2px solid var(--ink);display:flex;gap:9px;justify-content:flex-end;flex-shrink:0}
.vl-ef{display:flex;flex-direction:column;gap:5px}
.vl-elabel{font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#555}
.vl-einput{padding:9px 12px;border:2px solid var(--ink);border-radius:8px;font-family:var(--ffb);font-size:.88rem;background:var(--white);outline:none;transition:box-shadow .12s;width:100%}
.vl-einput:focus{box-shadow:var(--sh)}
.vl-esel{padding:9px 12px;border:2px solid var(--ink);border-radius:8px;font-family:var(--ffb);font-size:.88rem;background:var(--white);cursor:pointer;outline:none;width:100%}
.vl-eerr{font-size:.75rem;color:var(--pink);font-weight:600}
.vl-ermv{width:34px;height:38px;background:none;border:2px solid var(--ink);border-radius:8px;cursor:pointer;font-size:1.1rem;color:var(--ink);transition:background .1s;flex-shrink:0}
.vl-ermv:hover{background:var(--pink);border-color:var(--pink);color:var(--white)}
.vl-eadd{align-self:flex-start;padding:6px 12px;border:2px dashed #aaa;border-radius:8px;font-family:var(--ffb);font-size:.8rem;font-weight:600;background:none;cursor:pointer;color:#777;transition:border-color .12s,color .12s}
.vl-eadd:hover{border-color:var(--ink);color:var(--ink)}
.vl-erad{display:flex;align-items:center;gap:6px;padding:8px 14px;border:2px solid var(--ink);border-radius:8px;cursor:pointer;font-size:.86rem;font-weight:600;transition:background .12s;user-select:none}
.vl-erad:has(input:checked){background:var(--lime)}
.vl-erad input{accent-color:var(--ink);cursor:pointer}
.vl-bsave{padding:10px 22px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffd);font-weight:700;font-size:.88rem;background:var(--lime);color:var(--ink);cursor:pointer;box-shadow:var(--sh);transition:transform .12s,box-shadow .12s}
.vl-bsave:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}

/* ── loading ── */
.vl-topbar-load{position:fixed;top:0;left:0;width:100%;height:3px;z-index:9999;pointer-events:none;overflow:hidden;background:transparent}
.vl-topbar-load::after{content:'';position:absolute;top:0;left:-70%;width:70%;height:100%;background:linear-gradient(90deg,transparent,var(--lime) 40%,var(--cyan) 60%,transparent);animation:vl-sweep 1.1s ease-in-out infinite}
@keyframes vl-sweep{0%{left:-70%}100%{left:110%}}
.vl-mask{position:absolute;inset:0;background:rgba(244,241,232,.78);z-index:20;display:flex;align-items:center;justify-content:center;border-radius:calc(var(--r) - 2px)}
.vl-spin{border-radius:50%;animation:vl-rot .7s linear infinite}
@keyframes vl-rot{to{transform:rotate(360deg)}}
.vl-spin-lg{width:30px;height:30px;border:3px solid rgba(13,13,13,.12);border-top-color:var(--ink)}
.vl-spin-sm{width:13px;height:13px;border:2px solid rgba(0,0,0,.2);border-top-color:currentColor;flex-shrink:0}
[wire\:loading][wire\:target]{display:none}
</style>

<div class="vl-wrap">
  <div wire:loading.delay class="vl-topbar-load"></div>
  <div class="vl-deco" aria-hidden="true">
    <i></i><i></i><i></i><i></i><i></i><i></i>
  </div>

  <div class="vl-inner">

    {{-- Header --}}
    <div class="vl-hdr">
      <div class="vl-hdr-l">
        <h1 class="vl-title">{{ __('app.vocab.title_pre') }}<mark>{{ __('app.vocab.title_hl') }}</mark></h1>
        <p class="vl-sub">{{ __('app.vocab.subtitle') }}</p>
      </div>
      <a href="{{ route('vocabulary.create') }}" class="vl-btn-add">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
        {{ __('app.vocab.add_btn') }}
      </a>
    </div>

    {{-- Stats --}}
    <div class="vl-stats">
      <div class="vl-stat"><span class="vl-sicon">📚</span><span class="vl-slabel">{{ __('app.vocab.stat_total') }}</span><span class="vl-sval">{{ $stats['total'] }}</span></div>
      <div class="vl-stat"><span class="vl-sicon">⭐</span><span class="vl-slabel">{{ __('app.vocab.stat_important') }}</span><span class="vl-sval">{{ $stats['important'] }}</span></div>
      <div class="vl-stat"><span class="vl-sicon">🇺🇸</span><span class="vl-slabel">{{ __('app.vocab.stat_english') }}</span><span class="vl-sval">{{ $stats['english'] }}</span></div>
      <div class="vl-stat"><span class="vl-sicon">🇯🇵</span><span class="vl-slabel">{{ __('app.vocab.stat_japanese') }}</span><span class="vl-sval">{{ $stats['japanese'] }}</span></div>
      <div class="vl-stat"><span class="vl-sicon">🇰🇷</span><span class="vl-slabel">{{ __('app.vocab.stat_korean') }}</span><span class="vl-sval">{{ $stats['korean'] }}</span></div>
    </div>

    {{-- Flash --}}
    @if(session()->has('message'))
    <div class="vl-flash">
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      {{ session('message') }}
    </div>
    @endif

    {{-- Table card --}}
    <div class="vl-card">
      <div class="vl-tbar">
        <div class="vl-tbar-t">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
          {{ __('app.vocab.manage') }}
        </div>
        <div class="vl-tbar-c">
          <div class="vl-sw">
            <svg wire:loading.remove wire:target="search" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
            <span wire:loading wire:target="search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%)"><span class="vl-spin vl-spin-sm" style="border-top-color:#999"></span></span>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="{{ __('app.vocab.search_ph') }}" class="vl-sinput">
          </div>
          <select wire:model.live="languageFilter" class="vl-fsel">
            <option value="">{{ __('app.vocab.all_lang') }}</option>
            <option value="english">🇺🇸 {{ __('app.vocab.lang_en') }}</option>
            <option value="japanese">🇯🇵 {{ __('app.vocab.lang_ja') }}</option>
            <option value="korean">🇰🇷 {{ __('app.vocab.lang_ko') }}</option>
          </select>
          <select wire:model.live="importantFilter" class="vl-fsel">
            <option value="">{{ __('app.vocab.all_items') }}</option>
            <option value="1">{{ __('app.vocab.important_only') }}</option>
            <option value="0">{{ __('app.vocab.normal_only') }}</option>
          </select>
          <select wire:model.live="sortBy" class="vl-fsel">
            <option value="newest">{{ __('app.vocab.sort_newest') }}</option>
            <option value="oldest">{{ __('app.vocab.sort_oldest') }}</option>
            <option value="az">{{ __('app.vocab.sort_az') }}</option>
            <option value="za">{{ __('app.vocab.sort_za') }}</option>
          </select>
          <select wire:model.live="perPage" class="vl-fsel">
            <option value="10">10 {{ __('app.common.per_page_unit') }}</option>
            <option value="20">20 {{ __('app.common.per_page_unit') }}</option>
            <option value="50">50 {{ __('app.common.per_page_unit') }}</option>
            <option value="100">100 {{ __('app.common.per_page_unit') }}</option>
          </select>
          @if($search || $languageFilter || $importantFilter)
          <button wire:click="clearFilters" class="vl-bclear">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            {{ __('app.common.clear') }}
          </button>
          @endif
        </div>
      </div>

      <div style="overflow-x:auto;position:relative">
        <div wire:loading.delay wire:target="gotoPage,previousPage,nextPage,clearFilters,toggleImportant,sortBy,languageFilter,importantFilter,search,perPage" class="vl-mask">
          <div class="vl-spin vl-spin-lg"></div>
        </div>
        <table class="vl-table">
          <thead>
            <tr>
              <th>{{ __('app.vocab.th_important') }}</th>
              <th>{{ __('app.vocab.th_id') }}</th>
              <th>{{ __('app.vocab.th_lang') }}</th>
              <th>{{ __('app.vocab.th_word') }}</th>
              <th>{{ __('app.vocab.th_meaning') }}</th>
              <th>{{ __('app.vocab.th_pos') }}</th>
              <th>{{ __('app.vocab.th_example') }}</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse($vocabularies as $v)
            <tr wire:key="vocab-{{ $v->id }}">
              <td>
                <button wire:click="toggleImportant({{ $v->id }})" class="vl-bstar">
                  {{ $v->is_important ? '⭐' : '☆' }}
                </button>
              </td>
              <td style="font-size:.78rem;color:#aaa;font-weight:600">{{ $v->id }}</td>
              <td style="font-size:1.2rem">
                @if($v->language_type === 'japanese') 🇯🇵
                @elseif($v->language_type === 'korean') 🇰🇷
                @else 🇺🇸 @endif
              </td>
              <td><span class="vl-wrd">{{ $v->english_word }}</span></td>
              <td>
                @php $ms = is_array($v->chinese_word) ? $v->chinese_word : [$v->chinese_word]; @endphp
                @if(count($ms)===1)
                  <span class="vl-m1">{{ $ms[0] }}</span>
                @else
                  <div class="vl-mlist">
                    @foreach($ms as $i=>$m)
                      <span class="vl-mitem"><span class="vl-mnum">{{ $i+1 }}.</span>{{ $m }}</span>
                    @endforeach
                  </div>
                @endif
              </td>
              <td>
                @if($v->part_of_speech)
                  <span class="vl-pos vl-pos-{{ $v->part_of_speech }}">{{ __('app.pos.' . $v->part_of_speech, [], null) ?: $v->part_of_speech }}</span>
                @else
                  <span style="color:#ccc">—</span>
                @endif
              </td>
              <td>
                @if($v->example_sentence)
                  <div class="vl-exmain" title="{{ $v->example_sentence }}">{{ $v->example_sentence }}</div>
                  @if($v->example_sentence_translation)
                    <div class="vl-extrans" title="{{ $v->example_sentence_translation }}">{{ $v->example_sentence_translation }}</div>
                  @endif
                @else
                  <span class="vl-noex">{{ __('app.vocab.no_example') }}</span>
                @endif
              </td>
              <td>
                <div class="vl-ag">
                  <button wire:click="openEdit({{ $v->id }})" class="vl-ba" title="{{ __('app.common.edit') }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                  </button>
                  <button wire:click="confirmDelete({{ $v->id }})" class="vl-ba vl-ba--del" title="{{ __('app.common.delete') }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                  </button>
                </div>
              </td>
            </tr>
            @empty
            <tr><td colspan="8">
              <div class="vl-empty">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"/></svg>
                <p class="vl-empty-t">{{ __('app.vocab.empty_t') }}</p>
                <p class="vl-empty-s">{{ __('app.vocab.empty_s') }}</p>
                <a href="{{ route('vocabulary.create') }}" class="vl-bempty">{{ __('app.vocab.add_first') }}</a>
              </div>
            </td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      @if($vocabularies->hasPages())
      <div class="vl-pagi" wire:key="pagi-{{ $vocabularies->currentPage() }}-{{ $vocabularies->lastPage() }}">{{ $vocabularies->links('vendor.pagination.custom') }}</div>
      @endif
    </div>

  </div>

  {{-- Edit modal --}}
  @if($showEditModal)
  <div class="vl-moverlay" wire:click.self="closeEdit">
    <div class="vl-ebox" x-data x-init="$nextTick(() => $el.querySelector('[data-focus-first]').focus())" @keydown.enter.prevent="$wire.saveEdit()">
      <div class="vl-ebox-hdr">
        <span class="vl-ebox-ttl">{{ __('app.vocab.edit_title') }} <span style="color:#aaa;font-size:.8em">#{{ $editingId }}</span></span>
        <button wire:click="closeEdit" class="vl-ebox-close">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <div class="vl-ebox-body">
        {{-- 語言類型 --}}
        <div class="vl-ef">
          <span class="vl-elabel">{{ __('app.vocab.lang_type') }}</span>
          <div style="display:flex;gap:8px;flex-wrap:wrap">
            <label class="vl-erad"><input type="radio" wire:model="editLanguageType" value="english"> 🇺🇸 {{ __('app.lang_names.english') }}</label>
            <label class="vl-erad"><input type="radio" wire:model="editLanguageType" value="japanese"> 🇯🇵 {{ __('app.lang_names.japanese') }}</label>
            <label class="vl-erad"><input type="radio" wire:model="editLanguageType" value="korean"> 🇰🇷 {{ __('app.lang_names.korean') }}</label>
          </div>
        </div>

        {{-- 詞彙 --}}
        <div class="vl-ef">
          <label class="vl-elabel">{{ __('app.vocab.word_label') }} <span style="color:var(--pink)">*</span></label>
          <input type="text" wire:model="editEnglishWord" class="vl-einput" placeholder="{{ __('app.vocab.word_label') }}">
          @error('editEnglishWord')<span class="vl-eerr">{{ $message }}</span>@enderror
        </div>

        {{-- 中文意思 --}}
        <div class="vl-ef">
          <span class="vl-elabel">{{ __('app.vocab.meaning_label') }} <span style="color:var(--pink)">*</span></span>
          @foreach($editChineseWords as $i => $w)
          <div style="display:flex;gap:6px;margin-bottom:6px">
            <input type="text" wire:model="editChineseWords.{{ $i }}" class="vl-einput" style="flex:1" placeholder="{{ __('app.vocab.meaning_ph', ['n' => $i + 1]) }}" @if($i === 0) data-focus-first @endif>
            @if(count($editChineseWords) > 1)
            <button type="button" wire:click="removeEditMeaning({{ $i }})" class="vl-ermv">×</button>
            @endif
          </div>
          @error('editChineseWords.'.$i)<span class="vl-eerr">{{ $message }}</span>@enderror
          @endforeach
          <button type="button" wire:click="addEditMeaning" class="vl-eadd">{{ __('app.vocab.add_meaning_btn') }}</button>
        </div>

        {{-- 詞性 --}}
        <div class="vl-ef">
          <label class="vl-elabel">{{ __('app.vocab.pos_label') }}</label>
          <select wire:model="editPartOfSpeech" class="vl-esel">
            <option value="">{{ __('app.pos.unset') }}</option>
            <option value="noun">{{ __('app.pos.noun') }}</option>
            <option value="verb">{{ __('app.pos.verb') }}</option>
            <option value="adjective">{{ __('app.pos.adjective') }}</option>
            <option value="adverb">{{ __('app.pos.adverb') }}</option>
            <option value="phrase">{{ __('app.pos.phrase') }}</option>
            <option value="preposition">{{ __('app.pos.preposition') }}</option>
            <option value="conjunction">{{ __('app.pos.conjunction') }}</option>
            <option value="pronoun">{{ __('app.pos.pronoun') }}</option>
            <option value="particle">{{ __('app.pos.particle') }}</option>
          </select>
        </div>

        {{-- 例句 --}}
        <div class="vl-ef">
          <label class="vl-elabel">{{ __('app.vocab.example_label') }}</label>
          <input type="text" wire:model="editExampleSentence" class="vl-einput" placeholder="{{ __('app.vocab.example_label') }}">
        </div>

        {{-- 例句翻譯 --}}
        <div class="vl-ef">
          <label class="vl-elabel">{{ __('app.vocab.ex_trans_label') }}</label>
          <input type="text" wire:model="editExampleSentenceTranslation" class="vl-einput" placeholder="{{ __('app.vocab.ex_trans_label') }}">
        </div>

        {{-- 重點 --}}
        <label style="display:flex;align-items:center;gap:9px;cursor:pointer;user-select:none">
          <input type="checkbox" wire:model="editIsImportant" style="width:16px;height:16px;accent-color:var(--ink);cursor:pointer">
          <span style="font-size:.88rem;font-weight:600">{{ __('app.vocab.important_mark') }}</span>
        </label>
      </div>

      <div class="vl-ebox-ftr">
        <button wire:click="closeEdit" class="vl-bcancel">{{ __('app.common.cancel') }}</button>
        <button wire:click="saveEdit" wire:loading.attr="disabled" wire:target="saveEdit" class="vl-bsave">
          <span wire:loading.remove wire:target="saveEdit">{{ __('app.common.save') }}</span>
          <span wire:loading.flex wire:target="saveEdit" style="align-items:center;gap:6px"><span class="vl-spin vl-spin-sm"></span>{{ __('app.common.saving') }}</span>
        </button>
      </div>
    </div>
  </div>
  @endif

  {{-- Delete modal --}}
  @if($confirmingDelete && $deletingVocabulary)
  <div class="vl-moverlay">
    <div class="vl-mbox">
      <div class="vl-mico"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></div>
      <h2 class="vl-mtitle">{{ __('app.vocab.confirm_delete') }}</h2>
      <div class="vl-mprev">
        <div class="vl-mprev-w">{{ $deletingVocabulary->english_word }}</div>
        <div class="vl-mprev-m">{{ implode('、', is_array($deletingVocabulary->chinese_word) ? $deletingVocabulary->chinese_word : [$deletingVocabulary->chinese_word]) }}</div>
        @if($deletingVocabulary->is_important)<div class="vl-mprev-s">{{ __('app.vocab.important_mark') }}</div>@endif
      </div>
      <p class="vl-mtext">{{ __('app.vocab.cannot_undo') }}</p>
      <div class="vl-macts">
        <button wire:click="cancelDelete" class="vl-bcancel">{{ __('app.common.cancel') }}</button>
        <button wire:click="delete" wire:loading.attr="disabled" wire:target="delete" class="vl-bdel">
          <span wire:loading.remove wire:target="delete">{{ __('app.vocab.confirm_del_btn') }}</span>
          <span wire:loading.flex wire:target="delete" style="align-items:center;gap:6px"><span class="vl-spin vl-spin-sm"></span>{{ __('app.common.deleting') }}</span>
        </button>
      </div>
    </div>
  </div>
  @endif
</div>
<script>
document.addEventListener('livewire:initialized', () => {
    Livewire.hook('commit', ({ succeed }) => {
        const y = window.scrollY;
        succeed(() => { requestAnimationFrame(() => window.scrollTo(0, y)); });
    });
});
</script>
</div>

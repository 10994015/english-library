<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&display=swap');

.cv-wrap{--lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;--ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;--sh:4px 4px 0 #0D0D0D;--sh-lg:6px 6px 0 #0D0D0D;--r:14px;--ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans TC',sans-serif;font-family:var(--ffb);background:var(--cream);min-height:100vh;padding:44px 32px;position:relative;overflow-x:hidden}

.cv-deco{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden}
.cv-deco i{position:absolute;display:block;border-radius:3px}
.cv-deco i:nth-child(1){width:22px;height:22px;background:var(--cyan);top:6%;right:5%;transform:rotate(-15deg);opacity:.55}
.cv-deco i:nth-child(2){width:28px;height:11px;background:var(--lime);top:20%;left:2%;transform:rotate(25deg);opacity:.7;border:2px solid var(--ink)}
.cv-deco i:nth-child(3){width:17px;height:17px;background:var(--pink);top:58%;right:3%;transform:rotate(40deg);opacity:.5}
.cv-deco i:nth-child(4){width:13px;height:13px;background:var(--orange);top:78%;left:4%;transform:rotate(-30deg);opacity:.55}

.cv-inner{position:relative;z-index:1;max-width:760px;margin:0 auto}

/* header */
.cv-hdr{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;margin-bottom:32px;flex-wrap:wrap}
.cv-hdr-l{display:flex;flex-direction:column;gap:5px}
.cv-title{font-family:var(--ffd);font-size:clamp(1.9rem,4vw,2.9rem);font-weight:800;line-height:1;letter-spacing:-.03em;color:var(--ink);display:flex;align-items:center;gap:11px}
.cv-ticon{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;border:2px solid var(--ink);flex-shrink:0}
.cv-ticon--edit{background:var(--cyan)}
.cv-ticon--new{background:var(--lime)}
.cv-ticon svg{width:20px;height:20px}
.cv-sub{font-size:.85rem;font-weight:500;color:#666;margin-left:51px}
.cv-btn-back{display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:var(--white);color:var(--ink);font-family:var(--ffd);font-size:.85rem;font-weight:700;text-decoration:none;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);transition:transform .15s,box-shadow .15s;white-space:nowrap}
.cv-btn-back:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.cv-btn-back svg{width:15px;height:15px;flex-shrink:0}

/* flash */
.cv-flash{display:flex;align-items:center;gap:10px;padding:12px 16px;background:var(--lime);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);margin-bottom:20px;font-weight:600;font-size:.88rem}
.cv-flash svg{width:16px;height:16px;flex-shrink:0}

/* form card */
.cv-card{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);overflow:hidden;margin-bottom:22px}
.cv-card-hdr{padding:16px 20px;border-bottom:2px solid var(--ink);background:var(--cream);display:flex;align-items:center;gap:7px}
.cv-card-hdr svg{width:17px;height:17px;color:#555}
.cv-card-hdr-t{font-family:var(--ffd);font-size:.95rem;font-weight:800}

.cv-form{padding:26px}

/* section stripe */
.cv-stripe{background:var(--cream);border:1.5px solid #ddd;border-radius:10px;padding:16px 18px;margin-bottom:22px}
.cv-stripe-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:540px){.cv-stripe-grid{grid-template-columns:1fr}}

/* form grid */
.cv-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
@media(max-width:540px){.cv-grid{grid-template-columns:1fr}}
.cv-col2{grid-column:1/-1}

/* label */
.cv-label{display:block;font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#555;margin-bottom:6px}
.cv-req{color:var(--pink);margin-left:2px}

/* inputs */
.cv-input,.cv-select,.cv-textarea{width:100%;padding:11px 13px;border:2px solid var(--ink);border-radius:9px;font-family:var(--ffb);font-size:.9rem;font-weight:500;background:var(--white);outline:none;transition:box-shadow .12s;color:var(--ink)}
.cv-input:focus,.cv-select:focus,.cv-textarea:focus{box-shadow:var(--sh)}
.cv-select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%230D0D0D'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 11px center;background-size:15px;cursor:pointer;padding-right:34px}
.cv-textarea{resize:vertical;min-height:76px}

/* checkbox row */
.cv-check-row{display:flex;align-items:center;gap:9px;padding:10px 13px;background:var(--white);border:2px solid var(--ink);border-radius:9px;cursor:pointer}
.cv-check-row input[type=checkbox]{width:17px;height:17px;accent-color:var(--orange);cursor:pointer;flex-shrink:0}
.cv-check-lbl{font-size:.88rem;font-weight:600;display:flex;align-items:center;gap:5px}
.cv-check-lbl svg{width:16px;height:16px;color:var(--orange)}

/* error */
.cv-err{display:flex;align-items:center;gap:4px;margin-top:4px;font-size:.78rem;color:var(--pink);font-weight:600}
.cv-err svg{width:12px;height:12px;flex-shrink:0}

/* section title */
.cv-sec-title{display:flex;align-items:center;gap:6px;font-family:var(--ffd);font-size:.82rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em;margin-bottom:12px;padding-bottom:9px;border-bottom:2px solid var(--ink)}
.cv-sec-title svg{width:15px;height:15px}

/* meaning rows */
.cv-mrow{display:flex;align-items:center;gap:7px;margin-bottom:7px}
.cv-mnum{width:25px;height:25px;background:var(--lime);border:2px solid var(--ink);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:var(--ffd);font-size:.7rem;font-weight:800;flex-shrink:0}
.cv-brm{width:30px;height:30px;display:inline-flex;align-items:center;justify-content:center;background:var(--white);border:1.5px solid var(--ink);border-radius:6px;cursor:pointer;transition:background .12s;flex-shrink:0;color:var(--pink)}
.cv-brm:hover{background:var(--pink);color:var(--white)}
.cv-brm svg{width:12px;height:12px}
.cv-badd-m{display:inline-flex;align-items:center;gap:5px;padding:8px 14px;border:2px dashed var(--ink);border-radius:9px;font-family:var(--ffb);font-size:.82rem;font-weight:600;background:transparent;cursor:pointer;transition:background .12s,border-style .12s;color:var(--ink);margin-top:3px}
.cv-badd-m:hover{background:var(--lime);border-style:solid}
.cv-badd-m svg{width:13px;height:13px}

/* divider label */
.cv-divider{padding-top:18px;margin-top:4px;border-top:2px solid var(--ink);display:flex;align-items:center;gap:6px;font-family:var(--ffd);font-size:.78rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em;color:#777;margin-bottom:0}
.cv-divider svg{width:14px;height:14px;color:var(--orange)}

/* footer */
.cv-foot{display:flex;align-items:center;justify-content:space-between;gap:11px;padding-top:24px;margin-top:20px;border-top:2px solid var(--ink);flex-wrap:wrap}
.cv-btn-cancel{display:inline-flex;align-items:center;gap:6px;padding:11px 20px;background:var(--white);border:2px solid var(--ink);border-radius:var(--r);font-family:var(--ffd);font-size:.88rem;font-weight:700;text-decoration:none;color:var(--ink);box-shadow:var(--sh);transition:transform .15s}
.cv-btn-cancel:hover{transform:translate(-2px,-2px)}
.cv-btn-cancel svg{width:14px;height:14px}
.cv-btn-save{display:inline-flex;align-items:center;gap:7px;padding:12px 26px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.92rem;font-weight:800;border:2px solid var(--ink);border-radius:var(--r);cursor:pointer;box-shadow:var(--sh);transition:transform .15s,box-shadow .15s}
.cv-btn-save:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.cv-btn-save svg{width:15px;height:15px}

/* tip */
.cv-tip{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);padding:16px 20px;display:flex;gap:13px;align-items:flex-start}
.cv-tip-ico{width:34px;height:34px;background:var(--cyan);border:2px solid var(--ink);border-radius:7px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.cv-tip-ico svg{width:16px;height:16px}
.cv-tip-t{font-family:var(--ffd);font-size:.82rem;font-weight:800;margin-bottom:4px}
.cv-tip-body{font-size:.8rem;color:#555;line-height:1.6}

/* loading */
.cv-topbar{position:fixed;top:0;left:0;width:100%;height:3px;z-index:9999;pointer-events:none;overflow:hidden}
.cv-topbar::after{content:'';display:block;width:40%;height:100%;background:var(--ink);animation:cv-sweep 1.1s ease-in-out infinite}
@keyframes cv-sweep{0%{transform:translateX(-100%)}100%{transform:translateX(350%)}}
.cv-spin{display:inline-block;border-radius:50%;animation:cv-rot .7s linear infinite;flex-shrink:0}
.cv-spin-sm{width:13px;height:13px;border:2px solid rgba(255,255,255,.3);border-top-color:var(--lime)}
@keyframes cv-rot{to{transform:rotate(360deg)}}
.cv-btn-save:disabled{opacity:.7;cursor:not-allowed;transform:none!important;box-shadow:var(--sh)!important}
</style>

<div wire:loading.delay class="cv-topbar"></div>
<div class="cv-wrap">
  <div class="cv-deco" aria-hidden="true">
    <i></i><i></i><i></i><i></i>
  </div>

  <div class="cv-inner">

    {{-- Header --}}
    <div class="cv-hdr">
      <div class="cv-hdr-l">
        <h1 class="cv-title">
          <span class="cv-ticon {{ $isEditing ? 'cv-ticon--edit' : 'cv-ticon--new' }}">
            @if($isEditing)
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            @else
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            @endif
          </span>
          {{ $pageTitle }}
        </h1>
        <p class="cv-sub">
          @if($isEditing) Modify and enhance your vocabulary card
          @else Add new words to enhance your language skills @endif
        </p>
      </div>
      <a href="{{ route('vocabulary.index') }}" class="cv-btn-back">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        返回列表
      </a>
    </div>

    {{-- Flash --}}
    @if(session()->has('message'))
    <div class="cv-flash">
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      {{ session('message') }}
    </div>
    @endif

    {{-- Form card --}}
    <div class="cv-card">
      <div class="cv-card-hdr">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        <span class="cv-card-hdr-t">Vocabulary Card Details</span>
      </div>

      <form wire:submit.prevent="save" class="cv-form">

        {{-- Lang + Important --}}
        <div class="cv-stripe">
          <div class="cv-stripe-grid">
            <div>
              <label class="cv-label">語言類型 <span class="cv-req">*</span></label>
              <select wire:model="language_type" class="cv-select">
                <option value="english">🇺🇸 英語 (English)</option>
                <option value="japanese">🇯🇵 日語 (Japanese)</option>
              </select>
              @error('language_type')
              <p class="cv-err"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label class="cv-label">重點標記</label>
              <label class="cv-check-row">
                <input type="checkbox" wire:model="is_important">
                <span class="cv-check-lbl">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                  標記為重點詞彙
                </span>
              </label>
            </div>
          </div>
        </div>

        {{-- Main grid --}}
        <div class="cv-grid">

          {{-- Word --}}
          <div>
            <label class="cv-label">
              @if($language_type === 'japanese') 日文詞彙 @else English Word @endif
              <span class="cv-req">*</span>
            </label>
            <input type="text" wire:model.blur="english_word" class="cv-input"
              placeholder="@if($language_type === 'japanese') 輸入日文詞彙 @else Enter an English word @endif">
            @error('english_word')
            <p class="cv-err"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
            @enderror
          </div>

          {{-- POS --}}
          <div>
            <label class="cv-label">Part of Speech</label>
            <select wire:model="part_of_speech" class="cv-select">
              <option value="">— 選擇詞性 —</option>
              @if($language_type === 'japanese')
                <option value="noun">名詞 (Noun)</option>
                <option value="verb">動詞 (Verb)</option>
                <option value="adjective">形容詞 (Adjective)</option>
                <option value="adverb">副詞 (Adverb)</option>
                <option value="particle">助詞 (Particle)</option>
                <option value="conjunction">接續詞 (Conjunction)</option>
                <option value="interjection">感嘆詞 (Interjection)</option>
              @else
                <option value="noun">名詞 (Noun)</option>
                <option value="verb">動詞 (Verb)</option>
                <option value="adjective">形容詞 (Adjective)</option>
                <option value="adverb">副詞 (Adverb)</option>
                <option value="preposition">介系詞 (Preposition)</option>
                <option value="conjunction">連接詞 (Conjunction)</option>
                <option value="pronoun">代名詞 (Pronoun)</option>
                <option value="interjection">感嘆詞 (Interjection)</option>
                <option value="phrase">片語 (Phrase)</option>
              @endif
            </select>
          </div>

          {{-- Meanings --}}
          <div class="cv-col2">
            <div class="cv-sec-title">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
              中文意思 <span class="cv-req">必填</span>
            </div>

            @foreach($chinese_words as $i => $meaning)
            <div class="cv-mrow">
              <span class="cv-mnum">{{ $i + 1 }}</span>
              <input type="text" wire:model.blur="chinese_words.{{ $i }}" class="cv-input" placeholder="輸入中文翻譯" style="flex:1">
              @if(count($chinese_words) > 1)
              <button type="button" wire:click="removeMeaning({{ $i }})" class="cv-brm" title="移除">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              </button>
              @endif
            </div>
            @error("chinese_words.{{ $i }}")
            <p class="cv-err" style="margin-left:32px"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
            @enderror
            @endforeach

            <button type="button" wire:click="addMeaning" class="cv-badd-m">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
              新增另一個意思
            </button>
          </div>

          {{-- Divider --}}
          <div class="cv-col2">
            <div class="cv-divider">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Example Usage
            </div>
          </div>

          {{-- Example sentence --}}
          <div class="cv-col2">
            <label class="cv-label">
              @if($language_type === 'japanese') 日文例句 @else Example Sentence @endif
            </label>
            <textarea wire:model.blur="example_sentence" rows="2" class="cv-textarea"
              placeholder="@if($language_type === 'japanese') 輸入使用此詞彙的日文例句… @else Write an example sentence using this word… @endif"></textarea>
            @error('example_sentence')
            <p class="cv-err"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
            @enderror
          </div>

          {{-- Translation --}}
          <div class="cv-col2">
            <label class="cv-label">中文例句翻譯</label>
            <textarea wire:model.blur="example_sentence_translation" rows="2" class="cv-textarea" placeholder="翻譯上方的例句…"></textarea>
            @error('example_sentence_translation')
            <p class="cv-err"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
            @enderror
          </div>

        </div>

        <div class="cv-foot">
          <a href="{{ route('vocabulary.index') }}" class="cv-btn-cancel">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            取消
          </a>
          <button type="submit" class="cv-btn-save" wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></span>
            <span wire:loading wire:target="save" class="cv-spin cv-spin-sm"></span>
            <span wire:loading.remove wire:target="save">{{ $buttonText }}</span>
            <span wire:loading wire:target="save">儲存中…</span>
          </button>
        </div>

      </form>
    </div>

    {{-- Tip --}}
    <div class="cv-tip">
      <div class="cv-tip-ico">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
      </div>
      <div>
        <div class="cv-tip-t">學習小提示</div>
        <p class="cv-tip-body">為詞彙添加例句能夠加深記憶，特別是當例句與你的日常生活相關聯時。嘗試自己思考例句，而不是直接從字典複製。記得標記重點詞彙以便日後複習！</p>
      </div>
    </div>

  </div>
</div>
</div>

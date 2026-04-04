<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&display=swap');

.db-wrap{--lime:#C8F135;--pink:#FF3E8A;--cyan:#00D4FF;--orange:#FF6B2B;--purple:#9333EA;--ink:#0D0D0D;--white:#fff;--cream:#F4F1E8;--sh:4px 4px 0 #0D0D0D;--sh-lg:6px 6px 0 #0D0D0D;--r:14px;--ffd:'Syne',sans-serif;--ffb:'DM Sans','Noto Sans TC',sans-serif;font-family:var(--ffb);background:var(--cream);min-height:100vh;padding:44px 32px;position:relative;overflow-x:hidden}

.db-deco{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden}
.db-deco i{position:absolute;display:block;border-radius:3px}
.db-deco i:nth-child(1){width:24px;height:24px;background:var(--cyan);top:6%;right:4%;transform:rotate(-15deg);opacity:.5}
.db-deco i:nth-child(2){width:20px;height:8px;background:var(--lime);top:22%;left:2%;transform:rotate(28deg);opacity:.7;border:2px solid var(--ink)}
.db-deco i:nth-child(3){width:16px;height:16px;background:var(--pink);top:55%;right:2%;transform:rotate(42deg);opacity:.5}
.db-deco i:nth-child(4){width:12px;height:12px;background:var(--orange);top:76%;left:3%;transform:rotate(-30deg);opacity:.55}

.db-inner{position:relative;z-index:1;max-width:1100px;margin:0 auto}

/* header */
.db-hdr{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;margin-bottom:32px;flex-wrap:wrap}
.db-title{font-family:var(--ffd);font-size:clamp(2rem,4.5vw,3.2rem);font-weight:800;line-height:1;letter-spacing:-.03em;color:var(--ink)}
.db-title mark{background:var(--cyan);padding:0 8px;border:2px solid var(--ink);border-radius:6px;font-style:normal}
.db-sub{font-size:.88rem;font-weight:500;color:#666;margin-top:6px}

/* SRS CTA */
.db-srs-cta{display:inline-flex;align-items:center;gap:9px;padding:12px 24px;background:var(--ink);color:var(--lime);font-family:var(--ffd);font-size:.95rem;font-weight:800;text-decoration:none;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);transition:transform .15s,box-shadow .15s;white-space:nowrap}
.db-srs-cta:hover{transform:translate(-2px,-2px);box-shadow:8px 8px 0 var(--ink)}
.db-srs-cta svg{width:18px;height:18px}
.db-srs-badge{display:inline-flex;align-items:center;justify-content:center;min-width:22px;height:22px;padding:0 6px;background:var(--pink);color:var(--white);font-size:.72rem;font-weight:800;border-radius:11px;border:1.5px solid rgba(255,255,255,.4)}

/* stat cards */
.db-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:13px;margin-bottom:28px}
@media(max-width:700px){.db-stats{grid-template-columns:repeat(2,1fr)}}
.db-sc{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);padding:18px 18px;display:flex;flex-direction:column;gap:5px;transition:transform .15s,box-shadow .15s}
.db-sc:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.db-sc:nth-child(1){background:var(--lime)}
.db-sc:nth-child(2){background:var(--cyan)}
.db-sc:nth-child(3){background:var(--pink);color:var(--white)}
.db-sc:nth-child(3) .db-slabel{color:rgba(255,255,255,.7)}
.db-sc:nth-child(4){background:var(--orange);color:var(--white)}
.db-sc:nth-child(4) .db-slabel{color:rgba(255,255,255,.7)}
.db-sico{font-size:1.5rem;line-height:1}
.db-slabel{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#444}
.db-sval{font-family:var(--ffd);font-size:2rem;font-weight:800;line-height:1}
.db-shint{font-size:.72rem;opacity:.65;font-weight:500}

/* 2-col layout */
.db-grid2{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px}
@media(max-width:800px){.db-grid2{grid-template-columns:1fr}}

/* card */
.db-card{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);overflow:hidden}
.db-card-hdr{padding:15px 20px;border-bottom:2px solid var(--ink);background:var(--cream);display:flex;align-items:center;gap:8px}
.db-card-hdr svg{width:17px;height:17px;color:#555}
.db-card-hdr-t{font-family:var(--ffd);font-size:.97rem;font-weight:800}
.db-card-body{padding:20px}

/* trend chart */
.db-chart{display:flex;align-items:flex-end;gap:5px;height:110px;padding-bottom:22px;position:relative}
.db-chart::after{content:'';position:absolute;bottom:22px;left:0;right:0;height:1.5px;background:#e8e4d8}
.db-bar-wrap{flex:1;display:flex;flex-direction:column;align-items:center;gap:4px;height:100%}
.db-bar-col{flex:1;display:flex;align-items:flex-end;width:100%}
.db-bar{width:100%;border-radius:4px 4px 0 0;border:1.5px solid var(--ink);transition:height .3s;min-height:3px;position:relative}
.db-bar:hover::before{content:attr(data-tip);position:absolute;bottom:calc(100% + 5px);left:50%;transform:translateX(-50%);background:var(--ink);color:var(--white);font-size:.66rem;font-weight:600;padding:3px 7px;border-radius:5px;white-space:nowrap;z-index:10}
.db-bar-null{width:100%;border-radius:4px 4px 0 0;border:1.5px dashed #ddd;height:8px}
.db-bar-date{font-size:.58rem;font-weight:600;color:#aaa;text-align:center;margin-top:2px;white-space:nowrap}
.db-chart-legend{display:flex;gap:12px;margin-top:8px;font-size:.75rem;font-weight:600;color:#666}
.db-chart-legend span{display:flex;align-items:center;gap:4px}
.db-chart-dot{width:10px;height:10px;border-radius:2px;border:1.5px solid var(--ink);display:inline-block}

/* ranking table */
.db-rank{width:100%;border-collapse:collapse}
.db-rank thead tr{border-bottom:2px solid var(--ink);background:#faf9f4}
.db-rank th{padding:9px 13px;text-align:left;font-size:.66rem;font-weight:700;text-transform:uppercase;letter-spacing:.09em;color:#777}
.db-rank tbody tr{border-bottom:1.5px solid #ede9df;transition:background .1s}
.db-rank tbody tr:last-child{border-bottom:none}
.db-rank tbody tr:hover{background:#faf8f2}
.db-rank td{padding:11px 13px;font-size:.83rem;vertical-align:middle}
.db-rnk{font-family:var(--ffd);font-size:.85rem;font-weight:800;width:28px;height:28px;display:flex;align-items:center;justify-content:center;border:2px solid var(--ink);border-radius:50%}
.db-rnk-1{background:var(--pink);color:var(--white)}
.db-rnk-2{background:var(--orange);color:var(--white)}
.db-rnk-3{background:var(--lime)}
.db-rnk-n{background:#f3f4f6}
.db-wrd{font-family:var(--ffb);font-weight:700;font-size:.9rem}
.db-meaning{font-size:.78rem;color:#888;margin-top:1px}
.db-badge-wrong{display:inline-flex;align-items:center;gap:3px;padding:3px 9px;background:var(--pink);color:var(--white);border:1.5px solid var(--ink);border-radius:20px;font-size:.72rem;font-weight:700}
.db-badge-wrong svg{width:10px;height:10px}
.db-last{font-size:.72rem;color:#bbb}

/* empty state */
.db-empty{display:flex;flex-direction:column;align-items:center;padding:40px 20px;gap:8px;text-align:center}
.db-empty svg{width:36px;height:36px;color:#ccc}
.db-empty-t{font-family:var(--ffd);font-size:1rem;font-weight:700;color:#999}
.db-empty-s{font-size:.82rem;color:#bbb}

/* SRS info card */
.db-srs-info{background:var(--white);border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh-lg);overflow:hidden;margin-bottom:20px}
.db-srs-inner{padding:20px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
.db-srs-l{display:flex;align-items:center;gap:14px}
.db-srs-ico{width:48px;height:48px;background:var(--purple);border:2px solid var(--ink);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.db-srs-ico svg{width:22px;height:22px;color:var(--white)}
.db-srs-ttl{font-family:var(--ffd);font-size:1.05rem;font-weight:800}
.db-srs-desc{font-size:.82rem;color:#666;margin-top:2px}
.db-srs-num{font-family:var(--ffd);font-size:2.4rem;font-weight:800;color:var(--purple);line-height:1}
.db-srs-unit{font-size:.75rem;color:#888;font-weight:600}
.db-btn-srs{display:inline-flex;align-items:center;gap:6px;padding:11px 22px;background:var(--purple);color:var(--white);font-family:var(--ffd);font-size:.9rem;font-weight:800;text-decoration:none;border:2px solid var(--ink);border-radius:var(--r);box-shadow:var(--sh);transition:transform .15s,box-shadow .15s}
.db-btn-srs:hover{transform:translate(-2px,-2px);box-shadow:var(--sh-lg)}
.db-btn-srs svg{width:16px;height:16px}
.db-btn-srs-disabled{display:inline-flex;align-items:center;gap:6px;padding:11px 22px;background:#e5e5de;color:#aaa;font-family:var(--ffd);font-size:.9rem;font-weight:800;border:2px solid #ccc;border-radius:var(--r)}
.db-btn-srs-disabled svg{width:16px;height:16px}
</style>

<div class="db-wrap">
  <div class="db-deco" aria-hidden="true"><i></i><i></i><i></i><i></i></div>

  <div class="db-inner">

    {{-- Header --}}
    <div class="db-hdr">
      <div>
        <h1 class="db-title">學習<mark>統計資訊</mark></h1>
        <p class="db-sub">追蹤你的進步，找出最需要加強的單字</p>
      </div>
    </div>

    {{-- SRS Banner --}}
    <div class="db-srs-info">
      <div class="db-srs-inner">
        <div class="db-srs-l">
          <div class="db-srs-ico">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </div>
          <div>
            <div class="db-srs-ttl">間隔重複複習</div>
            <div class="db-srs-desc">系統根據你的答題表現，安排今日需要複習的單字</div>
          </div>
        </div>
        <div style="text-align:center">
          <div class="db-srs-num">{{ $srsDueCount }}</div>
          <div class="db-srs-unit">今日待複習</div>
        </div>
        @if($srsDueCount > 0)
          <a href="{{ route('exam.srs') }}" class="db-btn-srs">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            開始複習
          </a>
        @else
          <div class="db-btn-srs-disabled">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            今日已完成！
          </div>
        @endif
      </div>
    </div>

    {{-- Stats --}}
    <div class="db-stats">
      <div class="db-sc">
        <span class="db-sico">📊</span>
        <span class="db-slabel">總答題數</span>
        <span class="db-sval">{{ number_format($totalAnswered) }}</span>
        <span class="db-shint">今日 {{ $todayAnswered }} 題</span>
      </div>
      <div class="db-sc">
        <span class="db-sico">🎯</span>
        <span class="db-slabel">整體正確率</span>
        <span class="db-sval">{{ $overallPct }}%</span>
        <span class="db-shint">答對 {{ number_format($totalCorrect) }} 題</span>
      </div>
      <div class="db-sc">
        <span class="db-sico">🔥</span>
        <span class="db-slabel">本週學習天數</span>
        <span class="db-sval">{{ $weekDays }}/7</span>
        <span class="db-shint">持續保持！</span>
      </div>
      <div class="db-sc">
        <span class="db-sico">⏰</span>
        <span class="db-slabel">待複習單字</span>
        <span class="db-sval">{{ $srsDueCount }}</span>
        <span class="db-shint">今日到期</span>
      </div>
    </div>

    {{-- 2-col: chart + ranking --}}
    <div class="db-grid2">

      {{-- 趨勢圖 --}}
      <div class="db-card">
        <div class="db-card-hdr">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
          <span class="db-card-hdr-t">近 14 天正確率趨勢</span>
        </div>
        <div class="db-card-body">
          @php
            $maxPct = 100;
            $hasAnyData = collect($trendData)->whereNotNull('pct')->isNotEmpty();
          @endphp

          @if($hasAnyData)
          <div class="db-chart">
            @foreach($trendData as $day)
            <div class="db-bar-wrap">
              <div class="db-bar-col">
                @if($day['pct'] !== null)
                  @php
                    $color = $day['pct'] >= 80 ? 'var(--lime)' : ($day['pct'] >= 50 ? 'var(--cyan)' : 'var(--pink)');
                    $h = max(4, round($day['pct'] / 100 * 88));
                  @endphp
                  <div class="db-bar"
                    style="height:{{ $h }}px;background:{{ $color }}"
                    data-tip="{{ $day['pct'] }}% ({{ $day['correct'] }}/{{ $day['total'] }})">
                  </div>
                @else
                  <div class="db-bar-null"></div>
                @endif
              </div>
              <span class="db-bar-date">{{ $day['date'] }}</span>
            </div>
            @endforeach
          </div>
          <div class="db-chart-legend">
            <span><span class="db-chart-dot" style="background:var(--lime)"></span>≥80%</span>
            <span><span class="db-chart-dot" style="background:var(--cyan)"></span>50-79%</span>
            <span><span class="db-chart-dot" style="background:var(--pink)"></span>&lt;50%</span>
            <span><span class="db-chart-dot" style="background:#eee;border-color:#ddd;border-style:dashed"></span>無答題</span>
          </div>
          @else
          <div class="db-empty">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            <p class="db-empty-t">尚無答題紀錄</p>
            <p class="db-empty-s">開始測驗後，這裡會顯示趨勢圖</p>
          </div>
          @endif
        </div>
      </div>

      {{-- 錯誤排行 --}}
      <div class="db-card">
        <div class="db-card-hdr">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          <span class="db-card-hdr-t">最常答錯 Top 10</span>
        </div>

        @if($wrongRanking->isEmpty())
        <div class="db-empty">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <p class="db-empty-t">目前沒有錯誤紀錄</p>
          <p class="db-empty-s">完成測驗後會顯示錯誤排行</p>
        </div>
        @else
        <div style="overflow-x:auto">
          <table class="db-rank">
            <thead>
              <tr>
                <th>#</th>
                <th>單字</th>
                <th>錯誤次數</th>
                <th>最近錯誤</th>
              </tr>
            </thead>
            <tbody>
              @foreach($wrongRanking as $i => $row)
              <tr>
                <td>
                  <div class="db-rnk {{ $i===0 ? 'db-rnk-1' : ($i===1 ? 'db-rnk-2' : ($i===2 ? 'db-rnk-3' : 'db-rnk-n')) }}">
                    {{ $i + 1 }}
                  </div>
                </td>
                <td>
                  <div class="db-wrd">
                    {{ $row->is_important ? '⭐ ' : '' }}{{ $row->english_word }}
                  </div>
                  <div class="db-meaning">
                    @php
                      $meanings = is_array($row->chinese_word)
                        ? $row->chinese_word
                        : json_decode($row->chinese_word, true) ?? [$row->chinese_word];
                    @endphp
                    {{ implode('、', $meanings) }}
                  </div>
                </td>
                <td>
                  <span class="db-badge-wrong">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ $row->wrong_count }} 次
                  </span>
                </td>
                <td>
                  <span class="db-last">
                    {{ \Carbon\Carbon::parse($row->last_wrong_at)->diffForHumans() }}
                  </span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>

  </div>
</div>
</div>

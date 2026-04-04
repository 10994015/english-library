@if($paginator->hasPages())
<style>
.pg-wrap{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;font-family:'DM Sans','Noto Sans TC',sans-serif}
.pg-info{font-size:.78rem;font-weight:600;color:#888}
.pg-info strong{color:#0D0D0D;font-weight:700}
.pg-list{display:flex;align-items:center;gap:5px;list-style:none;padding:0;margin:0}
.pg-item button,.pg-item span{display:inline-flex;align-items:center;justify-content:center;min-width:34px;height:34px;padding:0 8px;border:2px solid #0D0D0D;border-radius:8px;font-family:'Syne',sans-serif;font-size:.82rem;font-weight:700;text-decoration:none;transition:background .12s,transform .1s;cursor:pointer;line-height:1;color:#0D0D0D;background:#fff}
.pg-item button:hover{background:#0D0D0D;color:#C8F135;transform:translate(-1px,-1px)}
.pg-item--active span{background:#0D0D0D;color:#C8F135;box-shadow:3px 3px 0 #0D0D0D;transform:translate(-1px,-1px)}
.pg-item--disabled span{border-color:#ddd;color:#ccc;cursor:not-allowed;background:#fafafa}
.pg-item--dots span{border:none;background:transparent;color:#aaa;min-width:24px}
</style>
<nav class="pg-wrap" aria-label="分頁">
    <div class="pg-info">
        顯示第 <strong>{{ $paginator->firstItem() }}</strong> 到 <strong>{{ $paginator->lastItem() }}</strong> 筆，
        共 <strong>{{ $paginator->total() }}</strong> 筆
    </div>

    <ul class="pg-list">
        {{-- 上一頁 --}}
        @if($paginator->onFirstPage())
            <li class="pg-item pg-item--disabled">
                <span aria-disabled="true">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </span>
            </li>
        @else
            <li class="pg-item">
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" aria-label="上一頁">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>
            </li>
        @endif

        {{-- 頁碼 --}}
        @foreach($elements as $element)
            @if(is_string($element))
                <li class="pg-item pg-item--dots"><span>…</span></li>
            @endif
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="pg-item pg-item--active"><span>{{ $page }}</span></li>
                    @else
                        <li class="pg-item">
                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- 下一頁 --}}
        @if($paginator->hasMorePages())
            <li class="pg-item">
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" aria-label="下一頁">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>
            </li>
        @else
            <li class="pg-item pg-item--disabled">
                <span aria-disabled="true">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </span>
            </li>
        @endif
    </ul>
</nav>
@endif

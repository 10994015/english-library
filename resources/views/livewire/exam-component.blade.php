<div class="min-h-screen px-4 py-8 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-4xl mx-auto">
        <!-- 頁面標題 -->
        <div class="mb-8 text-center">
            <h1 class="flex items-center justify-center gap-2 text-3xl font-extrabold text-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600 h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                詞彙測驗中心
            </h1>
            <p class="mt-2 italic text-slate-600">Test and enhance your vocabulary knowledge</p>
        </div>

        <!-- 錯誤訊息 -->
        @if (session()->has('error'))
            <div class="p-4 mb-6 text-red-700 border-l-4 border-red-400 rounded-lg shadow-sm bg-red-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- 測驗設定表單 -->
        @if (!$examStarted)
            <div class="mb-6 overflow-hidden bg-white border shadow-lg rounded-xl border-slate-200">
                <div class="p-5 border-b bg-gradient-to-r from-blue-50 to-slate-50 border-slate-200">
                    <h2 class="flex items-center gap-2 text-xl font-bold text-slate-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        測驗設定
                    </h2>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- 題數設定 -->
                        <div>
                            <label class="block mb-3 text-sm font-semibold text-slate-700">題目數量</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $questionCount == 10 ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="questionCount" value="10" class="hidden">
                                    <span>10 題</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $questionCount == 20 ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="questionCount" value="20" class="hidden">
                                    <span>20 題</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $questionCount == 30 ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="questionCount" value="30" class="hidden">
                                    <span>30 題</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $questionCount == 0 ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="questionCount" value="0" class="hidden">
                                    <span>無限模式</span>
                                </label>
                            </div>
                        </div>

                        <!-- 測驗類型 -->
                        <div>
                            <label class="block mb-3 text-sm font-semibold text-slate-700">測驗方向</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ !$mixedMode && !$listeningMode && $testType == 'en_to_zh' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }} {{ $listeningMode ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <input type="radio" wire:model.live="testType" value="en_to_zh" wire:click="$set('mixedMode', false)" class="hidden" {{ $listeningMode ? 'disabled' : '' }}>
                                    <span>英文 → 中文</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ !$mixedMode && !$listeningMode && $testType == 'zh_to_en' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }} {{ $listeningMode ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <input type="radio" wire:model.live="testType" value="zh_to_en" wire:click="$set('mixedMode', false)" class="hidden" {{ $listeningMode ? 'disabled' : '' }}>
                                    <span>中文 → 英文</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $mixedMode && !$listeningMode ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }} {{ $listeningMode ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <input type="radio" wire:click="$set('mixedMode', true)" class="hidden" {{ $listeningMode ? 'disabled' : '' }}>
                                    <span>混合模式</span>
                                </label>
                            </div>
                            @if($mixedMode && !$listeningMode)
                            <p class="mt-2 text-xs font-medium text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                混合模式下，題目將隨機採用英翻中與中翻英的方式出現。
                            </p>
                            @endif
                            @if($listeningMode)
                            <p class="mt-2 text-xs font-medium text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                </svg>
                                聽力模式下，將強制使用英翻中模式，單字會預設隱藏。
                            </p>
                            @endif
                        </div>

                        <!-- 聽力模式設定 -->
                        <div class="md:col-span-2">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none">
                                    <input type="checkbox" wire:model.live="listeningMode" class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox" />
                                    <div class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 transition-colors {{ $listeningMode ? 'bg-purple-500' : '' }}"></div>
                                </div>
                                <span class="flex items-center gap-2 text-sm font-medium text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                    </svg>
                                    聽力練習模式
                                </span>
                            </label>
                            <p class="mt-1 text-xs text-slate-500">
                                @if($listeningMode)
                                    開啟聽力模式，單字將預設隱藏，需透過語音提示來練習聽力理解。
                                @else
                                    關閉聽力模式，正常顯示單字進行測驗。
                                @endif
                            </p>
                        </div>

                        <!-- 重點題目篩選 -->
                        <div>
                            <label class="block mb-3 text-sm font-semibold text-slate-700">重點題目篩選</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $importanceFilter == 'all' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="importanceFilter" value="all" class="hidden">
                                    <span>全部詞彙</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-orange-50 {{ $importanceFilter == 'important' ? 'bg-orange-100 border-orange-500 text-orange-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="importanceFilter" value="important" class="hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span>重點詞彙</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-gray-50 {{ $importanceFilter == 'not_important' ? 'bg-gray-100 border-gray-500 text-gray-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="importanceFilter" value="not_important" class="hidden">
                                    <span>一般詞彙</span>
                                </label>
                            </div>
                        </div>

                        <!-- 語言篩選 -->
                        <div>
                            <label class="block mb-3 text-sm font-semibold text-slate-700">語言篩選</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $selectedLanguage == 'all' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="selectedLanguage" value="all" class="hidden">
                                    <span>全部語言</span>
                                </label>
                                @foreach($availableLanguages as $language)
                                    <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $selectedLanguage == $language ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                        <input type="radio" wire:model.live="selectedLanguage" value="{{ $language }}" class="hidden">
                                        <span>{{ $this->getLanguageDisplayName($language) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <!-- 題目範圍篩選 -->
                        <div class="md:col-span-2">
                            <label class="block mb-3 text-sm font-semibold text-slate-700">題目範圍篩選</label>
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <label class="text-sm text-slate-600">從第</label>
                                    <input
                                        type="number"
                                        wire:model.live="questionRangeStart"
                                        min="1"
                                        class="w-20 px-3 py-2 text-sm border rounded-lg border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="1"
                                    >
                                    <label class="text-sm text-slate-600">題到第</label>
                                    <input
                                        type="number"
                                        wire:model.live="questionRangeEnd"
                                        min="1"
                                        class="w-20 px-3 py-2 text-sm border rounded-lg border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="50"
                                    >
                                    <label class="text-sm text-slate-600">題</label>
                                </div>
                                <button
                                    type="button"
                                    wire:click="clearQuestionRange"
                                    class="px-3 py-1.5 text-xs text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors"
                                >
                                    清除範圍
                                </button>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">
                                @if($questionRangeStart || $questionRangeEnd)
                                    @if($questionRangeStart && $questionRangeEnd)
                                        已設定範圍：第 {{ $questionRangeStart }} 題到第 {{ $questionRangeEnd }} 題
                                    @elseif($questionRangeStart)
                                        已設定範圍：從第 {{ $questionRangeStart }} 題開始
                                    @elseif($questionRangeEnd)
                                        已設定範圍：到第 {{ $questionRangeEnd }} 題結束
                                    @endif
                                @else
                                    未設定範圍，將使用所有符合條件的題目（按 ID 排序）
                                @endif
                            </p>
                        </div>

                        <!-- 更新詞彙數量提示 -->
                        <div class="flex items-start p-4 mt-6 border rounded-lg bg-amber-50 border-amber-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm text-amber-800">
                                <p>根據目前篩選條件，詞彙庫中共有 <span class="font-bold">{{ count($allVocabularies) }}</span> 個詞彙。</p>

                                @if($questionRangeStart || $questionRangeEnd)
                                    <p class="mt-1 text-xs">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                            </svg>
                                            範圍篩選
                                        </span>
                                        @if($questionRangeStart && $questionRangeEnd)
                                            已設定題目範圍：第 {{ $questionRangeStart }} - {{ $questionRangeEnd }} 題
                                        @elseif($questionRangeStart)
                                            已設定題目範圍：從第 {{ $questionRangeStart }} 題開始
                                        @elseif($questionRangeEnd)
                                            已設定題目範圍：到第 {{ $questionRangeEnd }} 題結束
                                        @endif
                                    </p>
                                @endif

                                @if($importanceFilter === 'important')
                                    <p class="mt-1 text-xs">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            僅重點詞彙
                                        </span>
                                        已篩選僅包含重點標記的詞彙。
                                    </p>
                                @elseif($importanceFilter === 'not_important')
                                    <p class="mt-1 text-xs">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">
                                            一般詞彙
                                        </span>
                                        已篩選僅包含非重點的一般詞彙。
                                    </p>
                                @endif
                                @if($selectedLanguage !== 'all')
                                    <p class="mt-1 text-xs">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                            {{ $this->getLanguageDisplayName($selectedLanguage) }}
                                        </span>
                                        已篩選指定語言的詞彙。
                                    </p>
                                @endif
                                @if($listeningMode)
                                    <p class="mt-2 font-medium text-purple-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                        </svg>
                                        聽力模式已啟用，將強制使用英翻中模式進行測驗。
                                    </p>
                                @endif
                                @if(!$allowRepeat && $questionCount > count($allVocabularies) && $questionCount != 0)
                                    <p class="mt-2 font-medium text-red-600">由於不允許重複，且詞彙數量不足，實際測驗題數將為 {{ count($allVocabularies) }} 題。</p>
                                @endif
                            </div>
                        </div>
                        <!-- 詞彙重複設定 -->
                        <div class="md:col-span-2">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none">
                                    <input type="checkbox" wire:model.live="allowRepeat" class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox" />
                                    <div class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 transition-colors {{ $allowRepeat ? 'bg-blue-500' : '' }}"></div>
                                </div>
                                <span class="text-sm font-medium text-slate-700">允許詞彙重複出現</span>
                            </label>
                            <p class="mt-1 text-xs text-slate-500">
                                @if($allowRepeat)
                                    開啟後，同一個詞彙可能會在測驗中多次出現。
                                @else
                                    關閉後，每個詞彙在測驗中只會出現一次。
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- 詞彙數量提示 -->
                    <div class="flex items-start p-4 mt-6 border rounded-lg bg-amber-50 border-amber-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-amber-800">
                            <p>根據目前篩選條件，詞彙庫中共有 <span class="font-bold">{{ count($allVocabularies) }}</span> 個詞彙。</p>
                            @if($importanceFilter === 'important')
                                <p class="mt-1 text-xs">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        僅重點詞彙
                                    </span>
                                    已篩選僅包含重點標記的詞彙。
                                </p>
                            @elseif($importanceFilter === 'not_important')
                                <p class="mt-1 text-xs">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">
                                        一般詞彙
                                    </span>
                                    已篩選僅包含非重點的一般詞彙。
                                </p>
                            @endif
                            @if($selectedLanguage !== 'all')
                                <p class="mt-1 text-xs">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                        {{ $this->getLanguageDisplayName($selectedLanguage) }}
                                    </span>
                                    已篩選指定語言的詞彙。
                                </p>
                            @endif
                            @if($listeningMode)
                                <p class="mt-2 font-medium text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                    </svg>
                                    聽力模式已啟用，將強制使用英翻中模式進行測驗。
                                </p>
                            @endif
                            @if(!$allowRepeat && $questionCount > count($allVocabularies) && $questionCount != 0)
                                <p class="mt-2 font-medium text-red-600">由於不允許重複，且詞彙數量不足，實際測驗題數將為 {{ count($allVocabularies) }} 題。</p>
                            @endif
                        </div>
                    </div>

                    <!-- 開始測驗按鈕 -->
                    <div class="flex justify-center mt-6">
                        <button wire:click="startExam" class="flex items-center gap-2 px-8 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            @if($listeningMode)
                                開始聽力測驗
                            @else
                                開始測驗
                            @endif
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('vocabulary.index') }}" class="flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回詞彙列表
                </a>
            </div>
        @endif

        <!-- 測驗進行中 -->
        @if ($examStarted && !$examFinished)
            <div class="mb-6 overflow-hidden bg-white border shadow-lg rounded-xl border-slate-200">
                <!-- 進度指示器 -->
                <div class="px-6 py-4 border-b {{ $listeningMode ? 'bg-purple-50' : 'bg-blue-50' }} border-slate-200">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-medium text-slate-600">
                            @if($questionCount == 0)
                                已完成: {{ $currentQuestionIndex + 1 }} 題
                            @else
                                進度: {{ $currentQuestionIndex + 1 }} / {{ count($questions) }}
                            @endif
                        </div>
                        <div class="text-sm text-slate-600">
                            <span class="font-medium text-green-600">{{ $correctCount }} 正確</span> /
                            <span class="font-medium text-red-600">{{ $incorrectCount }} 錯誤</span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2.5">
                        <div class="{{ $listeningMode ? 'bg-purple-600' : 'bg-blue-600' }} h-2.5 rounded-full transition-all duration-300" style="width: {{ $questionCount == 0 ? '100' : (($currentQuestionIndex + 1) / count($questions) * 100) }}%"></div>
                    </div>
                </div>

                <!-- 題目區 -->
                <div class="p-6">
                    <!-- 題號和類型指示 -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <h2 class="flex items-center gap-2 text-xl font-bold text-slate-800">
                                @php
                                    $currentType = ($listeningMode || $mixedMode) ? $questionTypes[$currentQuestionIndex] : $testType;
                                @endphp
                                @if($listeningMode)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                        </svg>
                                        聽力模式
                                    </span>
                                @elseif($currentType == 'en_to_zh')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                        英翻中
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                        </svg>
                                        中翻英
                                    </span>
                                @endif
                                第 {{ $currentQuestionIndex + 1 }} 題
                            </h2>

                            <!-- 重點標記和語言標記 -->
                            <div class="flex items-center gap-2">
                                @if(isset($questions[$currentQuestionIndex]['is_important']) && $questions[$currentQuestionIndex]['is_important'])
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        重點
                                    </span>
                                @endif
                                @if(isset($questions[$currentQuestionIndex]['language_type']) && $questions[$currentQuestionIndex]['language_type'] !== 'english')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                        {{ $this->getLanguageDisplayName($questions[$currentQuestionIndex]['language_type']) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- 操作按鈕 -->
                        <div class="flex items-center gap-2">
                            @if($listeningMode && $currentType == 'en_to_zh')
                                <button
                                    onclick="toggleWordVisibility()"
                                    class="flex items-center gap-1 px-3 py-1.5 text-xs text-purple-600 bg-purple-100 rounded-lg hover:bg-purple-200 transition-colors border border-purple-200"
                                    title="{{ $wordHidden ? '顯示' : '隱藏' }}單字"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        @if($wordHidden)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                                        @endif
                                    </svg>
                                    <span id="toggleText">{{ $wordHidden ? '顯示' : '隱藏' }}</span>
                                </button>
                            @endif
                            @if(!$mixedMode && !$listeningMode)
                                <button wire:click="toggleTestType" type="button" class="flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                    切換方向
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- 問題 -->
                    <div class="mb-8">
                        <div class="text-center">
                            <div class="relative">
                                <div id="questionWord" class="px-4 py-6 mb-2 text-2xl font-bold {{ $listeningMode ? 'text-purple-700 border-purple-200 bg-purple-50' : 'text-blue-700 border-blue-200 bg-blue-50' }} border rounded-lg transition-all duration-300">
                                    @php
                                        $currentType = ($listeningMode || $mixedMode) ? $questionTypes[$currentQuestionIndex] : $testType;
                                        $currentWord = $currentType == 'en_to_zh' ? $questions[$currentQuestionIndex]['english_word'] : $questions[$currentQuestionIndex]['chinese_word'];
                                        $isEnglishWord = $currentType == 'en_to_zh';
                                    @endphp
                                    <span id="wordText" class="{{ $listeningMode && $wordHidden ? 'word-hidden' : '' }}">
                                        {{ $currentWord }}
                                    </span>

                                    @if($isEnglishWord)
                                        <button
                                            type="button"
                                            onclick="speakWord('{{ $currentWord }}')"
                                            class="absolute p-2 {{ $listeningMode ? 'text-purple-600 hover:text-purple-800 hover:bg-purple-100' : 'text-blue-600 hover:text-blue-800 hover:bg-blue-100' }} transition-colors -translate-y-1/2 rounded-full right-3 top-1/2"
                                            title="播放發音"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                @if($listeningMode && $wordHidden)
                                    <div class="p-3 mb-4 text-sm text-purple-700 bg-purple-100 border border-purple-200 rounded-lg">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            單字已隱藏，請點擊發音按鈕聽取單字，並輸入對應的中文翻譯
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($questions[$currentQuestionIndex]['part_of_speech']))
                                    <div class="mb-4 text-sm text-slate-500">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @switch($questions[$currentQuestionIndex]['part_of_speech'])
                                                @case('noun') bg-blue-100 text-blue-800 border border-blue-200 @break
                                                @case('verb') bg-emerald-100 text-emerald-800 border border-emerald-200 @break
                                                @case('adjective') bg-amber-100 text-amber-800 border border-amber-200 @break
                                                @case('adverb') bg-purple-100 text-purple-800 border border-purple-200 @break
                                                @case('phrase') bg-pink-100 text-pink-800 border border-pink-200 @break
                                                @default bg-slate-100 text-slate-800 border border-slate-200 @break
                                            @endswitch
                                        ">
                                            {{ $questions[$currentQuestionIndex]['part_of_speech'] }}
                                        </span>
                                    </div>
                                @endif

                                @if(!empty($questions[$currentQuestionIndex]['example_sentence']) && $answerResult !== null)
                                    <div class="p-3 text-sm italic border rounded-lg text-slate-700 bg-slate-50 border-slate-200">
                                        <div class="flex items-center">
                                            <span class="flex-1">"{{ $questions[$currentQuestionIndex]['example_sentence'] }}"</span>
                                            <button
                                                type="button"
                                                onclick="speakWord('{{ $questions[$currentQuestionIndex]['example_sentence'] }}')"
                                                class="p-1 ml-2 text-blue-600 transition-colors rounded-full hover:text-blue-800 hover:bg-blue-100"
                                                title="播放例句發音"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                                </svg>
                                            </button>
                                        </div>
                                        @if(!empty($questions[$currentQuestionIndex]['example_sentence_translation']))
                                            <div class="mt-1 not-italic text-slate-500">
                                                {{ $questions[$currentQuestionIndex]['example_sentence_translation'] }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- 答案區 -->
                    @if($answerResult === null)
                        <div>
                            @php
                                $currentType = ($listeningMode || $mixedMode) ? $questionTypes[$currentQuestionIndex] : $testType;
                                $placeholderText = $currentType == 'en_to_zh' ? '請輸入中文翻譯...' : '請輸入英文翻譯...';
                            @endphp
                            <label for="userAnswer" class="block mb-2 text-sm font-medium text-slate-700">
                                請輸入{{ $currentType == 'en_to_zh' ? '中文' : '英文' }}翻譯:
                            </label>
                            <div class="flex">
                                <input
                                    type="text"
                                    id="userAnswer"
                                    wire:model="userAnswer"
                                    wire:keydown.enter="checkAnswer"
                                    class="flex-1 px-4 py-3 transition-colors border rounded-l-lg border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="{{ $placeholderText }}"
                                    autocomplete="off"
                                    autofocus
                                >
                                <button
                                    wire:click="checkAnswer"
                                    class="px-6 py-3 font-medium text-white transition-colors {{ $listeningMode ? 'bg-purple-600 hover:bg-purple-700' : 'bg-blue-600 hover:bg-blue-700' }} rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                                    確認
                                </button>
                            </div>
                        </div>
                    @else
                        <!-- 答案結果 -->
                        <div class="mb-6">
                            <div class="mb-4 p-4 rounded-lg border-l-4 {{ $answerResult ? 'bg-green-50 border-green-400 text-green-700' : 'bg-red-50 border-red-400 text-red-700' }}">
                                <div class="flex items-center">
                                    @if($answerResult)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-semibold">正確！</span>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-semibold">不正確！</span>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 p-4 border rounded-lg md:grid-cols-2 bg-slate-50 border-slate-200">
                                <div>
                                    <p class="mb-1 text-sm text-slate-500">你的答案:</p>
                                    <p class="font-medium text-slate-700">{{ $userAnswer }}</p>
                                </div>
                                <div>
                                    <p class="mb-1 text-sm text-slate-500">正確答案:</p>
                                    <p class="font-medium {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }}">{{ $correctAnswer }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- 下一題按鈕 -->
                        <div class="flex justify-center">
                            <button wire:click="nextQuestion" class="flex items-center gap-2 px-8 py-3 font-medium text-white transition-colors {{ $listeningMode ? 'bg-purple-600 hover:bg-purple-700' : 'bg-blue-600 hover:bg-blue-700' }} rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                @if($currentQuestionIndex < count($questions) - 1 || ($infiniteMode && $allowRepeat))
                                    <span>下一題</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                @else
                                    <span>完成測驗</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- 操作按鈕 -->
            <div class="flex justify-center space-x-4">
                <button wire:click="backToSetup" class="flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回設定
                </button>
            </div>
        @endif

        <!-- 測驗結果 -->
        @if ($examFinished)
            <div class="mb-6 overflow-hidden bg-white border shadow-lg rounded-xl border-slate-200">
                <div class="p-5 border-b bg-gradient-to-r from-blue-50 to-slate-50 border-slate-200">
                    <h2 class="flex items-center gap-2 text-xl font-bold text-slate-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        測驗結果
                        @if($listeningMode)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                </svg>
                                聽力模式
                            </span>
                        @endif
                    </h2>
                </div>

                <div class="p-6">
                    <!-- 結果摘要 -->
                    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
                        <div class="p-5 text-center border {{ $listeningMode ? 'border-purple-200 bg-purple-50' : 'border-blue-200 bg-blue-50' }} rounded-lg">
                            <h3 class="mb-2 text-sm text-slate-600">總題數</h3>
                            <p class="text-3xl font-bold {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }}">{{ count($answeredQuestions) }}</p>
                        </div>
                        <div class="p-5 text-center border border-green-200 rounded-lg bg-green-50">
                            <h3 class="mb-2 text-sm text-slate-600">答對題數</h3>
                            <p class="text-3xl font-bold text-green-700">{{ $correctCount }}</p>
                        </div>
                        <div class="p-5 text-center border border-red-200 rounded-lg bg-red-50">
                            <h3 class="mb-2 text-sm text-slate-600">答錯題數</h3>
                            <p class="text-3xl font-bold text-red-700">{{ $incorrectCount }}</p>
                        </div>
                    </div>

                    <!-- 正確率圖表 -->
                    <div class="mb-8">
                        <div class="w-full h-4 mb-2 rounded-full bg-slate-200">
                            @php
                                $correctPercentage = count($answeredQuestions) > 0 ? round(($correctCount / count($answeredQuestions)) * 100) : 0;
                            @endphp
                            <div class="h-4 transition-all duration-500 {{ $listeningMode ? 'bg-purple-600' : 'bg-blue-600' }} rounded-full" style="width: {{ $correctPercentage }}%"></div>
                        </div>
                        <div class="font-semibold text-center {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }}">
                            正確率: {{ $correctPercentage }}%
                        </div>
                    </div>

                    <!-- 聽力模式統計 -->
                    @if($listeningMode && count($answeredQuestions) > 0)
                        <div class="mb-8">
                            <h3 class="flex items-center gap-2 mb-4 text-lg font-semibold text-slate-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                </svg>
                                聽力模式成果
                            </h3>
                            <div class="p-4 border border-purple-200 rounded-lg bg-purple-50">
                                <div class="text-center">
                                    <p class="mb-2 text-sm text-purple-700">聽力理解正確率</p>
                                    <div class="mb-2 text-2xl font-bold text-purple-800">{{ $correctPercentage }}%</div>
                                    <p class="text-xs text-purple-600">透過聽力完成 {{ count($answeredQuestions) }} 道英翻中題目</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- 測驗類型統計 (只在混合模式下顯示) -->
                    @if($mixedMode && count($answeredQuestions) > 0 && !$listeningMode)
                        <div class="mb-8">
                            <h3 class="flex items-center gap-2 mb-4 text-lg font-semibold text-slate-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                                測驗類型統計
                            </h3>

                            @php
                                $enToZhCount = 0;
                                $zhToEnCount = 0;
                                $enToZhCorrect = 0;
                                $zhToEnCorrect = 0;

                                foreach($answeredQuestions as $q) {
                                    if($q['type'] == 'en_to_zh') {
                                        $enToZhCount++;
                                        if($q['isCorrect']) $enToZhCorrect++;
                                    } else {
                                        $zhToEnCount++;
                                        if($q['isCorrect']) $zhToEnCorrect++;
                                    }
                                }

                                $enToZhPercentage = $enToZhCount > 0 ? round(($enToZhCorrect / $enToZhCount) * 100) : 0;
                                $zhToEnPercentage = $zhToEnCount > 0 ? round(($zhToEnCorrect / $zhToEnCount) * 100) : 0;
                            @endphp

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="p-4 border border-blue-200 rounded-lg bg-blue-50">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="flex items-center gap-1 font-medium text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                            英翻中
                                        </span>
                                        <span class="text-sm text-slate-600">{{ $enToZhCount }}題</span>
                                    </div>
                                    <div class="w-full h-3 mb-1 rounded-full bg-slate-200">
                                        <div class="h-3 bg-blue-600 rounded-full" style="width: {{ $enToZhPercentage }}%"></div>
                                    </div>
                                    <div class="text-sm text-right text-blue-700">
                                        正確率: {{ $enToZhPercentage }}% ({{ $enToZhCorrect }}/{{ $enToZhCount }})
                                    </div>
                                </div>

                                <div class="p-4 border border-green-200 rounded-lg bg-green-50">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="flex items-center gap-1 font-medium text-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                            中翻英
                                        </span>
                                        <span class="text-sm text-slate-600">{{ $zhToEnCount }}題</span>
                                    </div>
                                    <div class="w-full h-3 mb-1 rounded-full bg-slate-200">
                                        <div class="h-3 bg-green-600 rounded-full" style="width: {{ $zhToEnPercentage }}%"></div>
                                    </div>
                                    <div class="text-sm text-right text-green-700">
                                        正確率: {{ $zhToEnPercentage }}% ({{ $zhToEnCorrect }}/{{ $zhToEnCount }})
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- 重點詞彙統計 (如果有重點詞彙) -->
                    @if(count($answeredQuestions) > 0)
                        @php
                            $importantCount = 0;
                            $normalCount = 0;
                            $importantCorrect = 0;
                            $normalCorrect = 0;

                            foreach($answeredQuestions as $q) {
                                if(isset($q['is_important']) && $q['is_important']) {
                                    $importantCount++;
                                    if($q['isCorrect']) $importantCorrect++;
                                } else {
                                    $normalCount++;
                                    if($q['isCorrect']) $normalCorrect++;
                                }
                            }
                        @endphp

                        @if($importantCount > 0 && $normalCount > 0)
                            <div class="mb-8">
                                <h3 class="flex items-center gap-2 mb-4 text-lg font-semibold text-slate-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    重點詞彙統計
                                </h3>

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div class="p-4 border border-orange-200 rounded-lg bg-orange-50">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="flex items-center gap-1 font-medium text-orange-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                重點詞彙
                                            </span>
                                            <span class="text-sm text-slate-600">{{ $importantCount }}題</span>
                                        </div>
                                        <div class="w-full h-3 mb-1 rounded-full bg-slate-200">
                                            @php
                                                $importantPercentage = $importantCount > 0 ? round(($importantCorrect / $importantCount) * 100) : 0;
                                            @endphp
                                            <div class="h-3 bg-orange-600 rounded-full" style="width: {{ $importantPercentage }}%"></div>
                                        </div>
                                        <div class="text-sm text-right text-orange-700">
                                            正確率: {{ $importantPercentage }}% ({{ $importantCorrect }}/{{ $importantCount }})
                                        </div>
                                    </div>

                                    <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="flex items-center gap-1 font-medium text-gray-800">
                                                一般詞彙
                                            </span>
                                            <span class="text-sm text-slate-600">{{ $normalCount }}題</span>
                                        </div>
                                        <div class="w-full h-3 mb-1 rounded-full bg-slate-200">
                                            @php
                                                $normalPercentage = $normalCount > 0 ? round(($normalCorrect / $normalCount) * 100) : 0;
                                            @endphp
                                            <div class="h-3 bg-gray-600 rounded-full" style="width: {{ $normalPercentage }}%"></div>
                                        </div>
                                        <div class="text-sm text-right text-gray-700">
                                            正確率: {{ $normalPercentage }}% ({{ $normalCorrect }}/{{ $normalCount }})
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <!-- 測驗分析 -->
                    <div class="mb-6">
                        <h3 class="flex items-center gap-2 mb-4 text-lg font-semibold text-slate-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            詳細答題記錄
                        </h3>

                        @if(count($answeredQuestions) > 0)
                            <div class="overflow-x-auto border rounded-lg shadow-sm border-slate-200">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">問題</th>
                                            @if($mixedMode && !$listeningMode)
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">類型</th>
                                            @endif
                                            @if($listeningMode)
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">模式</th>
                                            @endif
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">標記</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">你的答案</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">正確答案</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">結果</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-200">
                                        @foreach($answeredQuestions as $index => $q)
                                            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-slate-50' }}">
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-slate-800">
                                                    {{ $q['question'] }}
                                                    @if(!empty($q['part_of_speech']))
                                                        <span class="px-2 py-0.5 ml-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                            @switch($q['part_of_speech'])
                                                                @case('noun') bg-blue-100 text-blue-800 @break
                                                                @case('verb') bg-emerald-100 text-emerald-800 @break
                                                                @case('adjective') bg-amber-100 text-amber-800 @break
                                                                @case('adverb') bg-purple-100 text-purple-800 @break
                                                                @default bg-slate-100 text-slate-800 @break
                                                            @endswitch
                                                        ">
                                                            {{ $q['part_of_speech'] }}
                                                        </span>
                                                    @endif
                                                </td>
                                                @if($mixedMode && !$listeningMode)
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if($q['type'] == 'en_to_zh')
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                英翻中
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                                中翻英
                                                            </span>
                                                        @endif
                                                    </td>
                                                @endif
                                                @if($listeningMode)
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                                            </svg>
                                                            聽力
                                                        </span>
                                                    </td>
                                                @endif
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center gap-1">
                                                        @if(isset($q['is_important']) && $q['is_important'])
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                </svg>
                                                                重點
                                                            </span>
                                                        @endif
                                                        @if(isset($q['language_type']) && $q['language_type'] !== 'english')
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                                {{ $this->getLanguageDisplayName($q['language_type']) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-600">
                                                    {{ $q['userAnswer'] }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }} whitespace-nowrap">
                                                    {{ $q['correctAnswer'] }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                                    @if($q['isCorrect'])
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                            正確
                                                        </span>
                                                    @else
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                            錯誤
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="py-4 text-center text-slate-500">沒有答題記錄</p>
                        @endif
                    </div>

                    <!-- 操作按鈕 -->
                    <div class="flex flex-col justify-center gap-4 mt-8 sm:flex-row">
                        <button
                            wire:click="restartExam"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-50"
                            class="flex items-center justify-center gap-2 px-6 py-3 font-medium text-white transition-colors {{ $listeningMode ? 'bg-purple-600 hover:bg-purple-700' : 'bg-blue-600 hover:bg-blue-700' }} rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span wire:loading.remove wire:target="restartExam">再測一次</span>
                            <span wire:loading wire:target="restartExam">準備中...</span>
                        </button>
                        <button
                            wire:click="backToSetup"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-50"
                            class="flex items-center justify-center gap-2 px-6 py-3 font-medium transition-colors rounded-lg shadow bg-slate-200 text-slate-700 hover:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 disabled:opacity-50"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span wire:loading.remove wire:target="backToSetup">更改設定</span>
                            <span wire:loading wire:target="backToSetup">載入中...</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 返回按鈕 -->
            <div class="flex justify-center">
                <a href="{{ route('vocabulary.index') }}" class="flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回詞彙列表
                </a>
            </div>
        @endif

        <!-- 測驗結束提示彈窗 -->
        @if ($examStarted && $examFinished && count($answeredQuestions) > 0)
        <div id="resultModal" class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-75 bg-slate-900 animate-fade-in">
            <div class="relative w-full max-w-md p-6 text-center transition-all transform bg-white shadow-2xl rounded-xl animate-pop-in">
                <!-- 關閉按鈕 -->
                <button
                    type="button"
                    onclick="document.getElementById('resultModal').style.display = 'none';"
                    class="absolute transition-colors top-3 right-3 text-slate-400 hover:text-slate-600"
                    title="關閉視窗"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div class="flex items-center justify-center mb-4">
                    @php
                        $scorePercentage = round(($correctCount / count($answeredQuestions)) * 100);
                    @endphp

                    @if ($scorePercentage >= 90)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    @elseif ($scorePercentage >= 70)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @elseif ($scorePercentage >= 40)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>

                <h3 class="mb-2 text-2xl font-bold text-slate-800">
                    @if($listeningMode)
                        聽力測驗完成！
                    @else
                        測驗完成！
                    @endif
                </h3>

                <p class="mb-4 text-slate-600">
                    @if($listeningMode)
                        @if ($scorePercentage >= 90)
                            聽力理解能力極佳！
                        @elseif ($scorePercentage >= 70)
                            聽力表現良好！
                        @elseif ($scorePercentage >= 40)
                            聽力需要多加練習。
                        @else
                            建議多聽英文提升聽力！
                        @endif
                    @else
                        @if ($scorePercentage >= 90)
                            太棒了！你的表現非常優秀！
                        @elseif ($scorePercentage >= 70)
                            很好！繼續保持！
                        @elseif ($scorePercentage >= 40)
                            不錯的嘗試！還有進步空間。
                        @else
                            繼續努力，多加練習！
                        @endif
                    @endif
                </p>

                <div class="p-4 mb-6 border rounded-lg bg-slate-50 border-slate-200">
                    <div class="grid grid-cols-2 gap-2 text-center">
                        <div>
                            <p class="text-sm text-slate-500">正確率</p>
                            <p class="text-xl font-bold {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }}">{{ $scorePercentage }}%</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">總分數</p>
                            <p class="text-xl font-bold {{ $listeningMode ? 'text-purple-700' : 'text-blue-700' }}">{{ $correctCount }}/{{ count($answeredQuestions) }}</p>
                        </div>
                    </div>

                    @if($mixedMode && count($answeredQuestions) > 0 && !$listeningMode)
                    <div class="grid grid-cols-2 gap-2 pt-3 mt-3 text-center border-t border-slate-200">
                        <div>
                            <p class="text-xs text-slate-500">英翻中</p>
                            <p class="text-sm font-bold text-blue-600">{{ $enToZhCorrect }}/{{ $enToZhCount }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">中翻英</p>
                            <p class="text-sm font-bold text-green-600">{{ $zhToEnCorrect }}/{{ $zhToEnCount }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- 按鈕區域 -->
                <div class="flex gap-3">
                    <button
                        onclick="document.getElementById('resultModal').style.display = 'none';"
                        class="flex-1 px-5 py-2 font-medium text-white transition-colors {{ $listeningMode ? 'bg-purple-600 hover:bg-purple-700' : 'bg-blue-600 hover:bg-blue-700' }} rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        查看詳細結果
                    </button>
                    <button
                        wire:click="restartExam"
                        class="flex-1 px-5 py-2 font-medium text-white transition-colors rounded-lg bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                    >
                        再測一次
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Tailwind 切換開關樣式和聽力模式樣式 -->
    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #3b82f6;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #3b82f6;
        }

        /* 聽力模式特定樣式 */
        .toggle-checkbox:checked + .toggle-label.bg-purple-500 {
            background-color: #8b5cf6;
        }

        /* 隱藏單字樣式 */
        .word-hidden {
            color: transparent;
            text-shadow: 0 0 15px rgba(139, 92, 246, 0.5);
            background: linear-gradient(45deg, #f3f4f6, #e5e7eb);
            background-clip: text;
            -webkit-background-clip: text;
            user-select: none;
            position: relative;
        }

        .word-hidden::before {
            content: "🔊 請點擊播放聽取單字";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #8b5cf6;
            font-size: 0.9rem;
            font-weight: normal;
            white-space: nowrap;
        }

        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pop-in {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.3s ease-out;
        }

        .animate-fade-in {
            animation: fade-in-down 0.3s ease-out;
        }

        .animate-pop-in {
            animation: pop-in 0.3s ease-out;
        }

        @keyframes pulse-purple {
            0%, 100% {
                background-color: rgba(139, 92, 246, 0.1);
            }
            50% {
                background-color: rgba(139, 92, 246, 0.3);
            }
        }

        .speaking {
            animation: pulse-purple 1s ease-in-out;
        }
    </style>
</div>

<script>
    // 全域變量來追蹤單字隱藏狀態
    let wordHidden = @json($wordHidden ?? false);

    // 切換單字顯示/隱藏
    function toggleWordVisibility() {
        const wordText = document.getElementById('wordText');
        const toggleText = document.getElementById('toggleText');

        if (wordText && toggleText) {
            wordHidden = !wordHidden;

            if (wordHidden) {
                wordText.classList.add('word-hidden');
                toggleText.textContent = '顯示';
            } else {
                wordText.classList.remove('word-hidden');
                toggleText.textContent = '隱藏';
            }
        }
    }

    // 語音合成函數
    function speakWord(text) {
        // 檢查瀏覽器是否支持語音合成
        if ('speechSynthesis' in window) {
            // 停止任何正在播放的語音
            window.speechSynthesis.cancel();

            // 創建語音實例
            const utterance = new SpeechSynthesisUtterance(text);

            // 設置語音為英語
            utterance.lang = 'en-US';

            // 適度設置語速（0.1-10，1為默認速度）
            utterance.rate = 0.9;

            // 播放語音
            window.speechSynthesis.speak(utterance);

            // 添加動畫效果到按鈕（可選）
            const buttons = document.querySelectorAll('button[onclick^="speakWord"]');
            buttons.forEach(button => {
                button.classList.add('speaking');
                setTimeout(() => {
                    button.classList.remove('speaking');
                }, 1000);
            });
        } else {
            // 如果瀏覽器不支持語音合成，顯示錯誤信息
            alert('很抱歉，您的瀏覽器不支持語音合成功能。請嘗試使用Chrome、Edge或Safari瀏覽器。');
        }
    }

    // 監聽Livewire事件，在導航時重置語音合成
    document.addEventListener('livewire:navigating', function() {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
    });

    // 監聽頁面變化以同步隱藏狀態
    document.addEventListener('livewire:updated', function() {
        // 從後端獲取最新的隱藏狀態
        wordHidden = @this.wordHidden;

        const wordText = document.getElementById('wordText');
        const toggleText = document.getElementById('toggleText');

        if (wordText && toggleText) {
            if (wordHidden) {
                wordText.classList.add('word-hidden');
                toggleText.textContent = '顯示';
            } else {
                wordText.classList.remove('word-hidden');
                toggleText.textContent = '隱藏';
            }
        }
    });
</script>

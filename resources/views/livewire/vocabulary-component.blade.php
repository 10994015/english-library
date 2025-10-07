<div class="min-h-screen px-4 py-6 bg-gray-100 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <!-- 頁面標題與新增按鈕 -->
        <div class="flex flex-col gap-4 mb-6 lg:flex-row lg:justify-between lg:items-center">
            <div>
                <h1 class="flex items-center gap-2 text-3xl font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                    </svg>
                    詞彙列表
                </h1>
                <p class="mt-2 text-gray-600">管理您的多語言詞彙庫</p>
            </div>
            <a href="{{ route('vocabulary.create') }}" class="flex items-center gap-2 px-6 py-3 font-medium text-white transition-colors bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                新增詞彙
            </a>
        </div>

        <!-- 統計卡片 -->
        <div class="grid grid-cols-2 gap-4 mb-6 md:grid-cols-4">
            <div class="p-4 bg-white rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">總詞彙</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">重點詞彙</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['important'] }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl">🇺🇸</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">英語詞彙</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['english'] }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl">🇯🇵</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">日語詞彙</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['japanese'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 提示訊息 -->
        @if (session()->has('message'))
            <div class="flex items-center p-4 mb-6 text-green-700 border-l-4 border-green-400 rounded-lg shadow-sm bg-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('message') }}
            </div>
        @endif

        <!-- 詞彙列表 -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <!-- 篩選與搜尋區域 -->
            <div class="p-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <h2 class="flex items-center gap-2 text-xl font-semibold text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        詞彙管理
                    </h2>

                    <div class="flex flex-col gap-3 md:flex-row">
                        <!-- 搜尋欄位 -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="搜尋詞彙、翻譯或例句..."
                                class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-md md:w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- 語言類型篩選 -->
                        <select wire:model.live="languageFilter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">所有語言</option>
                            <option value="english">🇺🇸 英語</option>
                            <option value="japanese">🇯🇵 日語</option>
                        </select>

                        <!-- 重點詞彙篩選 -->
                        <select wire:model.live="importantFilter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">所有詞彙</option>
                            <option value="1">⭐ 重點詞彙</option>
                            <option value="0">一般詞彙</option>
                        </select>

                        <!-- 清除篩選按鈕 -->
                        @if($search || $languageFilter || $importantFilter)
                            <button wire:click="clearFilters" class="flex items-center gap-1 px-3 py-2 text-gray-700 transition-colors bg-gray-200 rounded-md hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                清除
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 詞彙表格 -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">重點</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">語言</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">詞彙</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">中文翻譯</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">詞性</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">例句</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">操作</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($vocabularies as $vocabulary)
                            <tr class="transition-colors hover:bg-gray-50">
                                <!-- 重點標記 -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="toggleImportant({{ $vocabulary->id }})"
                                        class="text-2xl transition-transform hover:scale-110 focus:outline-none"
                                        title="{{ $vocabulary->is_important ? '取消重點標記' : '標記為重點' }}">
                                        @if($vocabulary->is_important)
                                            <span class="text-amber-400">⭐</span>
                                        @else
                                            <span class="text-gray-300 hover:text-amber-400">☆</span>
                                        @endif
                                    </button>
                                </td>

                                <!-- 語言類型 -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-xl">
                                        @if($vocabulary->language_type === 'japanese')
                                            🇯🇵
                                        @else
                                            🇺🇸
                                        @endif
                                    </span>
                                </td>

                                <!-- 詞彙 -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $vocabulary->english_word }}</div>
                                </td>

                                <!-- 中文翻譯 -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $vocabulary->chinese_word }}</div>
                                </td>

                                <!-- 詞性 -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        @if($vocabulary->part_of_speech)
                                            @switch($vocabulary->part_of_speech)
                                                @case('noun')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-blue-800 bg-blue-100 rounded-full">名詞</span>
                                                    @break
                                                @case('verb')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-green-800 bg-green-100 rounded-full">動詞</span>
                                                    @break
                                                @case('adjective')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-yellow-800 bg-yellow-100 rounded-full">形容詞</span>
                                                    @break
                                                @case('adverb')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-purple-800 bg-purple-100 rounded-full">副詞</span>
                                                    @break
                                                @case('particle')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-pink-800 bg-pink-100 rounded-full">助詞</span>
                                                    @break
                                                @case('preposition')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-indigo-800 bg-indigo-100 rounded-full">介系詞</span>
                                                    @break
                                                @case('conjunction')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-red-800 bg-red-100 rounded-full">連接詞</span>
                                                    @break
                                                @case('pronoun')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-gray-800 bg-gray-100 rounded-full">代名詞</span>
                                                    @break
                                                @case('phrase')
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-teal-800 bg-teal-100 rounded-full">片語</span>
                                                    @break
                                                @default
                                                    <span class="px-2 py-1 text-xs font-semibold leading-4 text-gray-800 bg-gray-100 rounded-full">{{ $vocabulary->part_of_speech }}</span>
                                            @endswitch
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- 例句 -->
                                <td class="max-w-xs px-6 py-4">
                                    @if($vocabulary->example_sentence)
                                        <div class="text-sm text-gray-900 truncate" title="{{ $vocabulary->example_sentence }}">{{ $vocabulary->example_sentence }}</div>
                                        @if($vocabulary->example_sentence_translation)
                                            <div class="text-sm text-gray-500 truncate" title="{{ $vocabulary->example_sentence_translation }}">{{ $vocabulary->example_sentence_translation }}</div>
                                        @endif
                                    @else
                                        <div class="text-sm text-gray-400">無例句</div>
                                    @endif
                                </td>

                                <!-- 操作 -->
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('vocabulary.edit', $vocabulary->id) }}"
                                           class="p-1 text-indigo-600 transition-colors rounded hover:text-indigo-900"
                                           title="編輯">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button wire:click="confirmDelete({{ $vocabulary->id }})"
                                                class="p-1 text-red-600 transition-colors rounded hover:text-red-900"
                                                title="刪除">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                                        </svg>
                                        <p class="text-lg font-medium text-gray-500">暫無詞彙資料</p>
                                        <p class="mt-1 text-gray-400">開始建立您的詞彙庫吧！</p>
                                        <a href="{{ route('vocabulary.create') }}" class="px-4 py-2 mt-4 text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700">
                                            新增第一個詞彙
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 分頁 -->
            @if($vocabularies->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $vocabularies->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- 改進的刪除確認彈窗 -->
    @if($confirmingDelete && $deletingVocabulary)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-500 bg-opacity-75">
            <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
                <div class="flex items-center mb-4">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">確認刪除詞彙</h3>
                    <div class="p-3 mb-4 rounded-lg bg-gray-50">
                        <div class="text-sm font-medium text-gray-900">{{ $deletingVocabulary->english_word }}</div>
                        <div class="text-sm text-gray-600">{{ $deletingVocabulary->chinese_word }}</div>
                        @if($deletingVocabulary->is_important)
                            <div class="flex items-center justify-center mt-1">
                                <span class="text-sm text-amber-400">⭐ 重點詞彙</span>
                            </div>
                        @endif
                    </div>
                    <p class="mb-6 text-gray-600">
                        您確定要刪除這個詞彙嗎？此操作無法撤銷。
                    </p>
                </div>
                <div class="flex justify-center space-x-3">
                    <button wire:click="cancelDelete" class="px-4 py-2 font-medium text-gray-700 transition-colors bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        取消
                    </button>
                    <button wire:click="delete" class="px-4 py-2 font-medium text-white transition-colors bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        確認刪除
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

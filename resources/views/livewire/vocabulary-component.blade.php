<div class="py-6 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- 頁面標題與新增按鈕 -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">詞彙列表</h1>
                <p class="mt-2 text-gray-600">管理您的英文-中文詞彙庫</p>
            </div>
            <a href="{{ route('vocabulary.create') }}" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                新增詞彙
            </a>
        </div>

        <!-- 提示訊息 -->
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <!-- 詞彙列表 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">所有詞彙</h2>

                <!-- 搜尋欄位 -->
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="搜尋詞彙..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- 詞彙表格 -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">英文詞彙</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">中文詞彙</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">詞性</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">例句</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($vocabularies as $vocabulary)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $vocabulary->english_word }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $vocabulary->chinese_word }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        @switch($vocabulary->part_of_speech)
                                            @case('noun')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">名詞</span>
                                                @break
                                            @case('verb')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">動詞</span>
                                                @break
                                            @case('adjective')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">形容詞</span>
                                                @break
                                            @case('adverb')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">副詞</span>
                                                @break
                                            @default
                                                <span class="text-gray-500">{{ $vocabulary->part_of_speech }}</span>
                                        @endswitch
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($vocabulary->example_sentence)
                                        <div class="text-sm text-gray-900">{{ $vocabulary->example_sentence }}</div>
                                        <div class="text-sm text-gray-500">{{ $vocabulary->example_sentence_translation }}</div>
                                    @else
                                        <div class="text-sm text-gray-500">無例句</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('vocabulary.edit', $vocabulary->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        編輯
                                    </a>
                                    <button wire:click="confirmDelete({{ $vocabulary->id }})" class="text-red-600 hover:text-red-900">
                                        刪除
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    暫無詞彙資料。請新增詞彙！
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 分頁 -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $vocabularies->links() }}
            </div>
        </div>
    </div>

    <!-- 刪除確認彈窗 -->
    @if($confirmingDelete)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">確認刪除</h3>
                <p class="text-gray-600 mb-6">
                    您確定要刪除這個詞彙嗎？此操作無法撤銷。
                </p>
                <div class="flex justify-end space-x-3">
                    <button wire:click="cancelDelete" class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        取消
                    </button>
                    <button wire:click="delete" class="px-4 py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        確認刪除
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

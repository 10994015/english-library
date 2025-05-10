<div class="py-8 px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- 頁面標題 -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-slate-800 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                詞彙測驗中心
            </h1>
            <p class="mt-2 text-slate-600 italic">Test and enhance your vocabulary knowledge</p>
        </div>

        <!-- 錯誤訊息 -->
        @if (session()->has('error'))
            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border-l-4 border-red-400 shadow-sm">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- 測驗設定表單 -->
        @if (!$examStarted)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200 mb-6">
                <div class="bg-gradient-to-r from-blue-50 to-slate-50 p-5 border-b border-slate-200">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        測驗設定
                    </h2>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- 題數設定 -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-3">題目數量</label>
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
                            <label class="block text-sm font-semibold text-slate-700 mb-3">測驗方向</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ !$mixedMode && $testType == 'en_to_zh' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="testType" value="en_to_zh" wire:click="$set('mixedMode', false)" class="hidden">
                                    <span>英文 → 中文</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ !$mixedMode && $testType == 'zh_to_en' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:model.live="testType" value="zh_to_en" wire:click="$set('mixedMode', false)" class="hidden">
                                    <span>中文 → 英文</span>
                                </label>
                                <label class="inline-flex items-center px-4 py-2 border rounded-lg cursor-pointer transition-colors hover:bg-blue-50 {{ $mixedMode ? 'bg-blue-100 border-blue-500 text-blue-700' : 'border-slate-300 text-slate-700' }}">
                                    <input type="radio" wire:click="$set('mixedMode', true)" class="hidden">
                                    <span>混合模式</span>
                                </label>
                            </div>
                            @if($mixedMode)
                            <p class="mt-2 text-xs text-amber-600 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                混合模式下，題目將隨機採用英翻中與中翻英的方式出現。
                            </p>
                            @endif
                        </div>

                        <!-- 詞彙重複設定 -->
                        <div class="md:col-span-2">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" wire:model.live="allowRepeat" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
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
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-amber-800">
                            <p>詞彙庫中共有 <span class="font-bold">{{ count($allVocabularies) }}</span> 個詞彙。
                            @if(!$allowRepeat && $questionCount > count($allVocabularies) && $questionCount != 0)
                                <span class="text-red-600 font-medium">由於不允許重複，且詞彙數量不足，實際測驗題數將為 {{ count($allVocabularies) }} 題。</span>
                            @endif
                            </p>
                        </div>
                    </div>

                    <!-- 開始測驗按鈕 -->
                    <div class="mt-6 flex justify-center">
                        <button wire:click="startExam" class="px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-md flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            開始測驗
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('vocabulary.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回詞彙列表
                </a>
            </div>
        @endif

        <!-- 測驗進行中 -->
        @if ($examStarted && !$examFinished)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200 mb-6">
                <!-- 進度指示器 -->
                <div class="bg-blue-50 px-6 py-4 border-b border-slate-200">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-medium text-slate-600">
                            @if($questionCount == 0)
                                已完成: {{ $currentQuestionIndex + 1 }} 題
                            @else
                                進度: {{ $currentQuestionIndex + 1 }} / {{ count($questions) }}
                            @endif
                        </div>
                        <div class="text-sm text-slate-600">
                            <span class="text-green-600 font-medium">{{ $correctCount }} 正確</span> /
                            <span class="text-red-600 font-medium">{{ $incorrectCount }} 錯誤</span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-300" style="width: {{ $questionCount == 0 ? '100' : (($currentQuestionIndex + 1) / count($questions) * 100) }}%"></div>
                    </div>
                </div>

                <!-- 題目區 -->
                <div class="p-6">
                    <!-- 題號和類型指示 -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                            @php
                                $currentType = $mixedMode ? $questionTypes[$currentQuestionIndex] : $testType;
                            @endphp
                            @if($currentType == 'en_to_zh')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    英翻中
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                    </svg>
                                    中翻英
                                </span>
                            @endif
                            第 {{ $currentQuestionIndex + 1 }} 題
                        </h2>

                        @if(!$mixedMode)
                            <button wire:click="toggleTestType" type="button" class="text-blue-600 hover:text-blue-800 text-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                                切換方向
                            </button>
                        @endif
                    </div>

                    <!-- 問題 -->
                    <div class="mb-8">
                        <div class="text-center">
                            <div class="relative">
                                <div class="text-2xl font-bold text-blue-700 bg-blue-50 py-6 px-4 rounded-lg border border-blue-200 mb-2">
                                    @php
                                        $currentType = $mixedMode ? $questionTypes[$currentQuestionIndex] : $testType;
                                        $currentWord = $currentType == 'en_to_zh' ? $questions[$currentQuestionIndex]['english_word'] : $questions[$currentQuestionIndex]['chinese_word'];
                                        $isEnglishWord = $currentType == 'en_to_zh';
                                    @endphp
                                    {{ $currentWord }}

                                    @if($isEnglishWord)
                                        <button
                                            type="button"
                                            onclick="speakWord('{{ $currentWord }}')"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-full transition-colors"
                                            title="播放發音"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                @if(!empty($questions[$currentQuestionIndex]['part_of_speech']))
                                    <div class="text-slate-500 text-sm mb-4">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @switch($questions[$currentQuestionIndex]['part_of_speech'])
                                                @case('noun') bg-blue-100 text-blue-800 border border-blue-200 @break
                                                @case('verb') bg-emerald-100 text-emerald-800 border border-emerald-200 @break
                                                @case('adjective') bg-amber-100 text-amber-800 border border-amber-200 @break
                                                @case('adverb') bg-purple-100 text-purple-800 border border-purple-200 @break
                                                @default bg-slate-100 text-slate-800 border border-slate-200 @break
                                            @endswitch
                                        ">
                                            {{ $questions[$currentQuestionIndex]['part_of_speech'] }}
                                        </span>
                                    </div>
                                @endif

                                @if(!empty($questions[$currentQuestionIndex]['example_sentence']) && $answerResult !== null)
                                    <div class="text-slate-700 italic text-sm bg-slate-50 p-3 rounded-lg border border-slate-200">
                                        <div class="flex items-center">
                                            <span class="flex-1">"{{ $questions[$currentQuestionIndex]['example_sentence'] }}"</span>
                                            <button
                                                type="button"
                                                onclick="speakWord('{{ $questions[$currentQuestionIndex]['example_sentence'] }}')"
                                                class="ml-2 p-1 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-full transition-colors"
                                                title="播放例句發音"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                                </svg>
                                            </button>
                                        </div>
                                        @if(!empty($questions[$currentQuestionIndex]['example_sentence_translation']))
                                            <div class="text-slate-500 mt-1 not-italic">
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
                                $currentType = $mixedMode ? $questionTypes[$currentQuestionIndex] : $testType;
                                $placeholderText = $currentType == 'en_to_zh' ? '請輸入中文翻譯...' : '請輸入英文翻譯...';
                            @endphp
                            <label for="userAnswer" class="block text-sm font-medium text-slate-700 mb-2">
                                請輸入{{ $currentType == 'en_to_zh' ? '中文' : '英文' }}翻譯:
                            </label>
                            <div class="flex">
                                <input
                                    type="text"
                                    id="userAnswer"
                                    wire:model="userAnswer"
                                    wire:keydown.enter="checkAnswer"
                                    class="flex-1 px-4 py-3 border border-slate-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="{{ $placeholderText }}"
                                    autocomplete="off"
                                    autofocus
                                >
                                <button
                                    wire:click="checkAnswer"
                                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-semibold">正確！</span>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-semibold">不正確！</span>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-lg border border-slate-200">
                                <div>
                                    <p class="text-sm text-slate-500 mb-1">你的答案:</p>
                                    <p class="font-medium text-slate-700">{{ $userAnswer }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 mb-1">正確答案:</p>
                                    <p class="font-medium text-blue-700">{{ $correctAnswer }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- 下一題按鈕 -->
                        <div class="flex justify-center">
                            <button wire:click="nextQuestion" class="px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-md flex items-center gap-2">
                                @if($currentQuestionIndex < count($questions) - 1 || ($questionCount == 0 && $allowRepeat))
                                    <span>下一題</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                @else
                                    <span>完成測驗</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <button wire:click="backToSetup" class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回設定
                </button>
            </div>
        @endif

        <!-- 測驗結果 -->
        @if ($examFinished)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200 mb-6">
                <div class="bg-gradient-to-r from-blue-50 to-slate-50 p-5 border-b border-slate-200">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        測驗結果
                    </h2>
                </div>

                <div class="p-6">
                    <!-- 結果摘要 -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-50 rounded-lg p-5 text-center border border-blue-200">
                            <h3 class="text-slate-600 text-sm mb-2">總題數</h3>
                            <p class="text-3xl font-bold text-blue-700">{{ count($answeredQuestions) }}</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-5 text-center border border-green-200">
                            <h3 class="text-slate-600 text-sm mb-2">答對題數</h3>
                            <p class="text-3xl font-bold text-green-700">{{ $correctCount }}</p>
                        </div>
                        <div class="bg-red-50 rounded-lg p-5 text-center border border-red-200">
                            <h3 class="text-slate-600 text-sm mb-2">答錯題數</h3>
                            <p class="text-3xl font-bold text-red-700">{{ $incorrectCount }}</p>
                        </div>
                    </div>

                    <!-- 正確率圖表 -->
                    <div class="mb-8">
                        <div class="w-full bg-slate-200 rounded-full h-4 mb-2">
                            @php
                                $correctPercentage = count($answeredQuestions) > 0 ? round(($correctCount / count($answeredQuestions)) * 100) : 0;
                            @endphp
                            <div class="bg-blue-600 h-4 rounded-full transition-all duration-500" style="width: {{ $correctPercentage }}%"></div>
                        </div>
                        <div class="text-center font-semibold text-blue-700">
                            正確率: {{ $correctPercentage }}%
                        </div>
                    </div>

                    <!-- 測驗類型統計 (只在混合模式下顯示) -->
                    @if($mixedMode && count($answeredQuestions) > 0)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-blue-800 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                            英翻中
                                        </span>
                                        <span class="text-sm text-slate-600">{{ $enToZhCount }}題</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-3 mb-1">
                                        <div class="bg-blue-600 h-3 rounded-full" style="width: {{ $enToZhPercentage }}%"></div>
                                    </div>
                                    <div class="text-right text-sm text-blue-700">
                                        正確率: {{ $enToZhPercentage }}% ({{ $enToZhCorrect }}/{{ $enToZhCount }})
                                    </div>
                                </div>

                                <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-green-800 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                            中翻英
                                        </span>
                                        <span class="text-sm text-slate-600">{{ $zhToEnCount }}題</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-3 mb-1">
                                        <div class="bg-green-600 h-3 rounded-full" style="width: {{ $zhToEnPercentage }}%"></div>
                                    </div>
                                    <div class="text-right text-sm text-green-700">
                                        正確率: {{ $zhToEnPercentage }}% ({{ $zhToEnCorrect }}/{{ $zhToEnCount }})
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- 測驗分析 -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            詳細答題記錄
                        </h3>

                        @if(count($answeredQuestions) > 0)
                            <div class="overflow-x-auto border border-slate-200 rounded-lg shadow-sm">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">問題</th>
                                            @if($mixedMode)
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">類型</th>
                                            @endif
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">你的答案</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">正確答案</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">結果</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-200">
                                        @foreach($answeredQuestions as $index => $q)
                                            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-slate-50' }}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-800 font-medium">
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
                                                @if($mixedMode)
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
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                                    {{ $q['userAnswer'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-700 font-medium">
                                                    {{ $q['correctAnswer'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    @if($q['isCorrect'])
                                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            正確
                                                        </span>
                                                    @else
                                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
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
                            <p class="text-slate-500 text-center py-4">沒有答題記錄</p>
                        @endif
                    </div>

                    <!-- 操作按鈕 -->
                    <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                        <button wire:click="restartExam" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-md flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            再測一次
                        </button>
                        <button wire:click="backToSetup" class="px-6 py-3 bg-slate-200 text-slate-700 font-medium rounded-lg hover:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors shadow flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            更改設定
                        </button>
                    </div>
                </div>
            </div>

            <!-- 返回按鈕 -->
            <div class="flex justify-center">
                <a href="{{ route('vocabulary.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回詞彙列表
                </a>
            </div>
        @endif

        <!-- 測驗結束提示彈窗 -->
        @if ($examStarted && $examFinished && count($answeredQuestions) > 0)
            <div class="fixed inset-0 bg-slate-900 bg-opacity-75 flex items-center justify-center z-50 animate-fade-in">
                <div class="bg-white rounded-xl max-w-md w-full p-6 shadow-2xl transform transition-all animate-pop-in text-center">
                    <div class="flex items-center justify-center mb-4">
                        @php
                            $scorePercentage = round(($correctCount / count($answeredQuestions)) * 100);
                        @endphp

                        @if ($scorePercentage >= 90)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        @elseif ($scorePercentage >= 70)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @elseif ($scorePercentage >= 40)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif
                    </div>

                    <h3 class="text-2xl font-bold text-slate-800 mb-2">測驗完成！</h3>

                    <p class="text-slate-600 mb-4">
                        @if ($scorePercentage >= 90)
                            太棒了！你的表現非常優秀！
                        @elseif ($scorePercentage >= 70)
                            很好！繼續保持！
                        @elseif ($scorePercentage >= 40)
                            不錯的嘗試！還有進步空間。
                        @else
                            繼續努力，多加練習！
                        @endif
                    </p>

                    <div class="bg-slate-50 rounded-lg p-4 mb-6 border border-slate-200">
                        <div class="grid grid-cols-2 gap-2 text-center">
                            <div>
                                <p class="text-sm text-slate-500">正確率</p>
                                <p class="text-xl font-bold text-blue-700">{{ $scorePercentage }}%</p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">總分數</p>
                                <p class="text-xl font-bold text-blue-700">{{ $correctCount }}/{{ count($answeredQuestions) }}</p>
                            </div>
                        </div>

                        @if($mixedMode && count($answeredQuestions) > 0)
                        <div class="mt-3 pt-3 border-t border-slate-200 grid grid-cols-2 gap-2 text-center">
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

                    <button onclick="window.location.reload();" class="w-full px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        再測一次
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Tailwind 切換開關樣式 -->
    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #3b82f6;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #3b82f6;
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
    </style>
</div>

@push('scripts')
<!-- 添加這個腳本在頁面底部、</div>標籤之前 -->
<script>
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

    // 監聽頁面變化以重置語音合成
    document.addEventListener('livewire:navigating', function() {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
    });
</script>

<style>
    @keyframes pulse-blue {
        0%, 100% {
            background-color: rgba(59, 130, 246, 0.1);
        }
        50% {
            background-color: rgba(59, 130, 246, 0.3);
        }
    }

    .speaking {
        animation: pulse-blue 1s ease-in-out;
    }
</style>
@endpush

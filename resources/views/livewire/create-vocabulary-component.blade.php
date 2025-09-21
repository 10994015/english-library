<div class="min-h-screen px-4 py-8 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-3xl mx-auto">
        <!-- 頁面標題 -->
        <div class="flex flex-col gap-4 mb-8 sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h1 class="flex items-center gap-2 text-3xl font-extrabold text-slate-800">
                    @if($isEditing)
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    @endif
                    {{ $pageTitle }}
                </h1>
                <p class="mt-2 italic text-slate-600">
                    @if($isEditing)
                        Modify and enhance your vocabulary card
                    @else
                        Add new words to enhance your language skills
                    @endif
                </p>
            </div>
            <a href="{{ route('vocabulary.index') }}" class="flex items-center justify-center w-full gap-2 px-5 py-2 font-medium transition-all duration-200 transform rounded-lg shadow bg-slate-200 text-slate-700 hover:bg-slate-300 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                返回詞彙列表
            </a>
        </div>

        <!-- 提示訊息 -->
        @if (session()->has('message'))
            <div class="p-4 mb-6 text-green-700 border-l-4 border-green-400 rounded-lg shadow-sm bg-green-50 animate-fade-in-down">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <!-- 詞彙表單卡片 -->
        <div class="overflow-hidden bg-white border shadow-lg rounded-xl border-slate-200">
            <div class="p-5 border-b bg-gradient-to-r from-blue-50 to-slate-50 border-slate-200">
                <h2 class="flex items-center gap-2 text-xl font-bold text-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    Vocabulary Card Details
                </h2>
            </div>

            <form wire:submit.prevent="save" class="p-6">
                <!-- 語言類型和重點設定區 -->
                <div class="grid grid-cols-1 gap-6 p-4 mb-6 border border-gray-200 rounded-lg md:grid-cols-2 bg-gray-50">
                    <div class="relative">
                        <label for="language_type" class="block mb-1 text-sm font-semibold text-slate-700">
                            語言類型 <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="language_type" wire:model="language_type"
                                class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm appearance-none border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="english">🇺🇸 英語 (English)</option>
                                <option value="japanese">🇯🇵 日語 (Japanese)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-slate-700">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('language_type')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- 是否為重點 -->
                    <div class="relative">
                        <label for="is_important" class="block mb-3 text-sm font-semibold text-slate-700">
                            重點標記
                        </label>
                        <div class="flex items-center">
                            <input type="checkbox" id="is_important" wire:model="is_important"
                                class="w-5 h-5 bg-white border-gray-300 rounded text-amber-500 focus:ring-amber-400 focus:ring-2">
                            <label for="is_important" class="flex items-center gap-1 ml-3 text-sm text-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                                標記為重點詞彙
                            </label>
                        </div>
                        @error('is_important')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- 英文詞彙 -->
                    <div class="relative">
                        <label for="english_word" class="block mb-1 text-sm font-semibold text-slate-700">
                            @if($language_type === 'japanese')
                                日文詞彙 <span class="text-red-500">*</span>
                            @else
                                English Word <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input type="text" id="english_word" wire:model.blur="english_word"
                            class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="@if($language_type === 'japanese') 輸入日文詞彙 @else Enter an English word @endif">
                        @error('english_word')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- 中文詞彙 -->
                    <div class="relative">
                        <label for="chinese_word" class="block mb-1 text-sm font-semibold text-slate-700">
                            中文詞彙 <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="chinese_word" wire:model.blur="chinese_word"
                            class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="輸入中文翻譯">
                        @error('chinese_word')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- 詞性 -->
                    <div class="relative">
                        <label for="part_of_speech" class="block mb-1 text-sm font-semibold text-slate-700">
                            Part of Speech
                        </label>
                        <div class="relative">
                            <select id="part_of_speech" wire:model="part_of_speech"
                                class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm appearance-none border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select part of speech</option>
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
                                @endif
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-slate-700">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('part_of_speech')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="pt-4 mt-2 border-t md:col-span-2 border-slate-200">
                        <h3 class="flex items-center gap-1 mb-2 font-semibold text-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Example Usage
                        </h3>
                    </div>

                    <!-- 例句 -->
                    <div class="md:col-span-2">
                        <label for="example_sentence" class="block mb-1 text-sm font-semibold text-slate-700">
                            @if($language_type === 'japanese')
                                日文例句
                            @else
                                Example Sentence in English
                            @endif
                        </label>
                        <textarea id="example_sentence" wire:model.blur="example_sentence" rows="2"
                            class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="@if($language_type === 'japanese') 輸入使用此詞彙的日文例句... @else Write an example sentence using this word... @endif"></textarea>
                        @error('example_sentence')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- 例句翻譯 -->
                    <div class="md:col-span-2">
                        <label for="example_sentence_translation" class="block mb-1 text-sm font-semibold text-slate-700">
                            中文例句翻譯
                        </label>
                        <textarea id="example_sentence_translation" wire:model.blur="example_sentence_translation" rows="2"
                            class="w-full px-4 py-3 transition-colors bg-white border rounded-lg shadow-sm border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="翻譯上方的例句..."></textarea>
                        @error('example_sentence_translation')
                            <p class="flex items-center mt-1 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-3 pt-6 mt-8 border-t border-slate-200 sm:flex-row sm:justify-between">
                    <a href="{{ route('vocabulary.index') }}" class="flex items-center justify-center gap-2 px-5 py-3 font-medium transition-colors rounded-lg bg-slate-200 text-slate-700 hover:bg-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        取消
                    </a>
                    <button type="submit"
                    style="background: rgb(76, 76, 242)"
                        class="flex items-center justify-center gap-2 px-8 py-3 font-medium text-white transition-colors rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>

        <!-- 學習提示卡 (Optional) -->
        <div class="p-4 mt-6 text-sm text-blue-800 border border-blue-200 rounded-lg bg-blue-50">
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <p class="mb-1 font-semibold">學習小提示</p>
                    <p>為詞彙添加例句能夠加深記憶，特別是當例句與你的日常生活相關聯時。嘗試自己思考例句，而不是直接從字典複製。記得標記重點詞彙以便日後複習！</p>
                </div>
            </div>
        </div>
    </div>
</div>

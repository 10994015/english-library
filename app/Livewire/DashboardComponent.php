<?php

namespace App\Livewire;

use App\Models\ExamResult;
use App\Models\Vocabulary;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $userId = auth()->id();

        // ── 錯誤排行 Top 10 ──
        $wrongRanking = ExamResult::where('exam_results.user_id', $userId)
            ->where('is_correct', false)
            ->join('vocabularys', 'exam_results.vocabulary_id', '=', 'vocabularys.id')
            ->select(
                'vocabularys.id',
                'vocabularys.english_word',
                'vocabularys.chinese_word',
                'vocabularys.language_type',
                'vocabularys.is_important',
                DB::raw('COUNT(*) as wrong_count'),
                DB::raw('MAX(exam_results.created_at) as last_wrong_at')
            )
            ->groupBy(
                'vocabularys.id',
                'vocabularys.english_word',
                'vocabularys.chinese_word',
                'vocabularys.language_type',
                'vocabularys.is_important'
            )
            ->orderByDesc('wrong_count')
            ->limit(10)
            ->get();

        // ── 近 14 天正確率趨勢 ──
        $trend = ExamResult::where('user_id', $userId)
            ->where('created_at', '>=', now()->subDays(13))
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(is_correct) as correct'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // 補齊近 14 天每一天（無答題的天補 null）
        $trendData = [];
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $row  = $trend->get($date);
            $trendData[] = [
                'date'    => now()->subDays($i)->format('m/d'),
                'correct' => $row ? (int) $row->correct : null,
                'total'   => $row ? (int) $row->total   : null,
                'pct'     => ($row && $row->total > 0)
                    ? round($row->correct / $row->total * 100)
                    : null,
            ];
        }

        // ── 今日複習到期數（過去三天答錯的不重複詞彙）──
        $srsDueCount = ExamResult::where('user_id', $userId)
            ->where('is_correct', false)
            ->where('created_at', '>=', now()->subDays(3))
            ->distinct('vocabulary_id')
            ->count('vocabulary_id');

        // ── 整體統計 ──
        $totalAnswered = ExamResult::where('user_id', $userId)->count();
        $totalCorrect  = ExamResult::where('user_id', $userId)->where('is_correct', true)->count();
        $overallPct    = $totalAnswered > 0 ? round($totalCorrect / $totalAnswered * 100) : 0;

        // ── 今日答題數 ──
        $todayAnswered = ExamResult::where('user_id', $userId)
            ->whereDate('created_at', today())
            ->count();

        // ── 本週答題天數（連續打卡概念）──
        $weekDays = ExamResult::where('user_id', $userId)
            ->where('created_at', '>=', now()->startOfWeek())
            ->select(DB::raw('DATE(created_at) as date'))
            ->distinct()
            ->count();

        return view('livewire.dashboard-component', compact(
            'wrongRanking',
            'trendData',
            'srsDueCount',
            'totalAnswered',
            'totalCorrect',
            'overallPct',
            'todayAnswered',
            'weekDays'
        ));
    }
}

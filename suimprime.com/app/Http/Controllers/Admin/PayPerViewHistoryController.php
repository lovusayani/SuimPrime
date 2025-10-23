<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayPerViewHistory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class PayPerViewHistoryController extends Controller
{
    public function index(Request $request): View
    {
        $query = PayPerViewHistory::query()->with(['user', 'content']);

        if ($search = trim((string) $request->input('search', ''))) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', "%{$search}%")
                       ->orWhere('email', 'like', "%{$search}%");
                });
                $q->orWhere(function ($cq) use ($search) {
                    $cq->where('content_type', 'like', "%{$search}%");
                });
            });
        }

        if ($dateRange = $request->input('date_range')) {
            // Expect formats like "YYYY-MM-DD to YYYY-MM-DD" or "YYYY-MM-DD - YYYY-MM-DD"
            $parts = preg_split('/\s+to\s+|\s+-\s+/', $dateRange);
            if (count($parts) === 2) {
                try {
                    $start = Carbon::parse($parts[0])->startOfDay();
                    $end = Carbon::parse($parts[1])->endOfDay();
                    $query->whereBetween('start_at', [$start, $end]);
                } catch (\Throwable $e) {
                    // ignore bad date filter
                }
            }
        }

        $records = $query->orderByDesc('start_at')->paginate(20)->withQueryString();

        return view('admin.payperview.index', compact('records'));
    }
}

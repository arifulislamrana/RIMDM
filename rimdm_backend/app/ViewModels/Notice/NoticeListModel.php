<?php
namespace App\ViewModels\Notice;

use Illuminate\Support\Facades\DB;

class NoticeListModel
{
    public function getNotices()
    {
        $notices = DB::table('notices')
            ->orderBy('created_at', 'desc')
            ->get();

        return $notices;
    }

    public function getRecentNotices()
    {
        $notices = DB::table('notices')
            ->orderBy('created_at', 'desc')
            ->get()->take(10);

        return $notices;
    }
}

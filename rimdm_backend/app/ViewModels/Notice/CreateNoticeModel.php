<?php
namespace App\ViewModels\Notice;

use App\DataObjects\Notice;
use App\Models\Notice as ModelsNotice;
use Illuminate\Support\Facades\DB;

class CreateNoticeModel
{
    public function storeNoticeData(Notice $noticeData)
    {
        $fileName = time().rand(99, 100000000).'.'.$noticeData->file->extension();
        $filePath = "\\".str_replace('/', "\\",env('NOTICE_FILE_PATH'))."\\".$fileName;

        $notice = DB::table('notices')->insert([
            'heading' => $noticeData->heading,
            'body' => $noticeData->body,
            'file' => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $noticeData->file->move(public_path(env('NOTICE_FILE_PATH')), $fileName);

        return $notice;
    }
}

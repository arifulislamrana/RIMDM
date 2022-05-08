<?php

namespace App\Http\Controllers;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        try
        {
            $noticeListModel = resolve('App\ViewModels\Notice\NoticeListModel');
            return view('notices', ['notices' => $noticeListModel->getRecentNotices()]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Show Notices to Users", $e);

            return response()->json(['error' => 'Oooppps something went wrong!!'], 409);
        }
    }
}

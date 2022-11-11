<?php

namespace App\Http\Controllers\Notice;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNoticeRequest;
use App\Models\Notice;

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
            return view('admin.notice.notice_list', ['notices' => $noticeListModel->getNotices()]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Store Notice data", $e);

            return response()->json(['error' => 'Failed to Store Notice data'], 409);
        }
    }

    public function create()
    {
        try
        {
            return view('admin.notice.create_notice');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Create Notice Form", $e);

            return response()->json(['error' => 'Failed to show Create Notice Form'], 409);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNoticeRequest $request)
    {
        try
        {
            $createNoticeModel = resolve('App\ViewModels\Notice\CreateNoticeModel');

            if ($createNoticeModel->storeNoticeData($request->getObject()))
            {
                return redirect()->route('notices.index');
            }

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Store Notice data", $e);

            return response()->json(['error' => 'Failed to Store Notice data'], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $noticeListModel = resolve('App\ViewModels\Notice\NoticeListModel');
            return view('single_notice', ['notice' => $noticeListModel->getNoticeById($id)]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Notice data", $e);

            return response()->json(['error' => 'Failed to show Notice data'], 409);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::destroy($id);

        return redirect()->back();
    }
}

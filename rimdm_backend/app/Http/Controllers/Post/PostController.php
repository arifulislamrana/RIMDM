<?php

namespace App\Http\Controllers\Post;

use Exception;
use App\Models\Post;
use App\Utility\ILogger;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
            $posts = Auth::guard('teacher')->user()->posts;

            return view('admin.post.post_list', ['posts' => $posts]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show post list", $e);

            return response()->json(['error' => 'Failed to show post list'], 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
            $classes = ClassLevel::all();
            return view('admin.post.create_post', ['classes' => $classes]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Store Notice data", $e);

            return response()->json(['error' => 'Failed to Store Notice data'], 409);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $data = $this->validate($request,[
                'class'=>'required|max:8',
                'heading'=>'required',
                'body'=>'required',
                'file' => 'mimes:pdf,xlx,csv|max:2048',
             ]);

             $fileName = time().rand(99, 100000000).'.'.$request->file->extension();
             $filePath = "\\".str_replace('/', "\\",env('POST_FILE_PATH'))."\\".$fileName;

             $post = DB::table('posts')->insert([
                'heading' => $data['heading'],
                'body' => $data['body'],
                'file' => $filePath,
                'teacher_id' => Auth::guard('teacher')->id(),
                'class_level_id' => $data['class'],
             ]);

             $request->file->move(public_path(env('POST_FILE_PATH')), $fileName);


            if ($post)
            {
                return redirect()->route('posts.index')->withSuccess('Post Created');
            }

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Store post data", $e);

            return response()->json(['error' => 'Failed to Store post data'], 409);
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
        //
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
        Post::destroy($id);

        return redirect()->back()->withSuccess('Post Deleted');
    }
}

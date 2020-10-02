<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\File;

class NewsController extends Controller
{
    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048'
        ]);

        $file = $request->file->getClientOriginalName();
        return response()->json([
            'file' => $file
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = News::with('author');

        if ($request->keyword) {
            $keyword = $request->keyword;

            $items = $items->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%'.$keyword.'%')
                                  ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                                  ->orWhere('content', 'LIKE', '%'.$keyword.'%');
            });
        }

        if ($request->perPage) {
            $items = $items->paginate($request->perPage);
        } else {
            $items = $items->paginate(10);
        }

        return response()->json([
            'message'=> 'მოთხოვნილი ჩანაწერების სია',
            'result' => $items,
            'error'  => false
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required|max:100',
        ]);

        $data = $request->all();

        if ($request->fileId) {
            $file = File::find($request->fileId);

            if ($file) {
                $data['file_name'] = $file->name;
                $data['file_path'] = $file->path;
            }
        }

        $data['user_id'] = auth()->id();
        $newRecord = News::create($data);

        return response()->json([
            'message' => 'ჩანაწერი წარმატებით დაემატა',
            'result'  => $newRecord,
            'error'   => false,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = News::with('author')->find($id);

        if (!$item) {
            return response()->json([
                'message' => 'ჩანაწერი არ მოიძებნა'], 404);
        }

        return response()->json([
            'message' => 'ჩანაწერი უნიკალური კოდის მიხედვით',
            'result'  => $item,
            'error'   => false
        ], 200);
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
        $this->validate($request, [
            'title'   => 'required',
        ]);

        $item = News::with('author')->find($id);

        if (!$item) {
            return response()->json([
                'message' => 'ჩანაწერი არ მოიძებნა'], 404);
        }




        $updatedData = $request->all();

        if ($request->fileId) {
            $file = File::find($request->fileId);

            if ($file) {
                $updatedData['file_name'] = $file->name;
                $updatedData['file_path'] = $file->path;
            }
        }


        $item->update($updatedData);

        return response()->json([
            'message' => 'ჩანაწერი წარმატებით განახლდა',
            'result'  => $item,
            'error'   => false
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = News::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'ჩანაწერი არ მოიძებნა'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'ჩანაწერი წარმატებით წაიშალა',
            'result'  => $item,
            'error'   => false
        ], 200);
    }
}

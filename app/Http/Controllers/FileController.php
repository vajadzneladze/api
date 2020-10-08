<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use App\Models\File;
use Exception;

class FileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(FileRequest $request)
    {
        $data = $request->only([
            'file',
            'module'
        ]);

        if ($request->file()) {
            $fileName      = time().'_'.$request->file->getClientOriginalName();
            $filePath      = $request->file('file')->storeAs('uploads/'.$request->module, $fileName, 'public');
            $fileExtension = $request->file->getClientOriginalExtension();

            $data['name']   = $fileName;
            $data['path']   = '/storage/'.$filePath;
            $data['format'] = $fileExtension;
            $data['module'] = $request->module;
        }

        $newRecord = File::create($data);

        return $newRecord;
    }


    public function storByCKEeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName      = time().'_'.$request->upload->getClientOriginalName();
            $filePath      = $request->file('upload')->storeAs('uploads/ckeditor', $fileName, 'public');
            $fileExtension = $request->upload->getClientOriginalExtension();

            $data['name']   = $fileName;
            $data['path']   = '/storage/'.$filePath;
            $data['format'] = $fileExtension;
            $data['module'] = 'ckeditor';


            return response()->json([ 'fileName' => $fileName, 'uploaded' => true, 'url' => 'http://127.0.0.1:8000/storage/'.$filePath, ]);
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DictionaryRequest;
use App\Services\DictionaryService;
use Exception;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    protected $service;


    public function __construct(DictionaryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource with pager.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang)
    {
        $result  = ['status' => 200];

        try {
            $result['data'] = $this->service->getAll($request, $lang);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
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
    public function store(DictionaryRequest $request, $lang)
    {
        $data = $request->only([
            'key',
            'value',
            'module',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->store($data, $lang);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $result  = ['status' => 200];

        try {
            $result['data'] = $this->service->find($lang, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
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
    public function update(Request $request, $lang, $id)
    {
        $data = $request->only([
            'key',
            'value',
            'module',
            'item_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->update($data, $lang, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->delete($lang, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }




    /**
     * Display a listing of the resource without pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRecord($lang)
    {
        $result  = ['status' => 200];

        try {
            $result['data'] = $this->service->getAllRecord($lang);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}

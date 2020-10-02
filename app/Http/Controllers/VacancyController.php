<?php

namespace App\Http\Controllers;

use App\Http\Requests\DictionaryRequest;
use App\Services\VacancyService;
use Exception;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    protected $service;


    public function __construct(VacancyService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
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
    public function store(Request $request, $lang)
    {
        $data = $request->only([
            'title',
            'status',
            'description'
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
            'title',
            'status',
            'description',
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
}

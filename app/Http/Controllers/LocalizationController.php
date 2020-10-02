<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalizationRequest;
use App\Services\LocalizationService;
use Exception;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    protected $service;


    public function __construct(LocalizationService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result  = ['status' => 200];

        try {
            $result['data'] = $this->service->getAll($request);
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
    public function store(LocalizationRequest $request)
    {
        $data = $request->only([
            'title',
            'abbreviation',
            'native',
            'locale',
            'status',
            'default',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->store($data);
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
    public function show($id)
    {
        $result  = ['status' => 200];

        try {
            $result['data'] = $this->service->find($id);
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
    public function update(LocalizationRequest $request, $id)
    {
        $data = $request->only([
            'title',
            'abbreviation',
            'native',
            'locale',
            'status',
            'default',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->update($data, $id);
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
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->service->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error'  => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}

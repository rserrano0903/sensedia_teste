<?php

namespace App\Http\Controllers\Api;

use App\Models\Carro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class CarroController extends Controller
{
    protected $model;

    public function __construct(\App\Models\Carro $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [];

            if ($request->getContent()) {
                $data = json_decode($request->getContent());

                if (json_last_error()) {
                    throw new \Exception('This data is not json format!');
                }
            }

            if (isset($this->model->fieldValidations)) {
                $validator = Validator::make((array) $data, $this->model->fieldValidations);

                if ($validator->fails()) {
                    return $this->validate($request, $this->model->fieldValidations);
                }
            }

            $carro = $this->model->create((array) $data);

            if (!isset($carro->id)) {
                throw new \Exception('Error to insert record!');
            }

            return response()->json([
                'id' => $carro->id,
                'status' => 'success'
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                //'message' => 'Error to insert record!',
                'message' => $exception->getMessage(),
                'status' => 'error'
            ]);
        }
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = [];

            if ($request->getContent()) {
                $data = json_decode($request->getContent());

                if (json_last_error()) {
                    throw new \Exception('This data is not json format!');
                }
            }

            $result = $this->model->findOrFail($id);
            $result->update((array) $data, ['id' => $id]);

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->model->find($id);

            if (!is_object($result)) {
                throw new Exception('Record not found.');
            }

            $result->delete();

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => 'error'
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Record;
use Illuminate\Support\Facades\Validator;

class MonkeyController extends Controller
{
    public function getRecord(){

        $status = false;
        $response = [];
        $data = [];
        $data_db = [];
        try {
            //Trae los registros
            $result = DB::table('records')
                            ->orderBy('id', 'desc')
                            ->get();
            $data_db = $result->all();
            if($data_db != []){
                $status = true;
                $response = [
                    'type' => "success",
                    'content' => "Registros consultados correctamente."
                ];
                //Ingresamos tipo de documento al arreglo
                $responseData = [];
                    $responseData = array_map(function ($item) {
                        $db = DB::table('documents')->where('id', $item->type_document_id)->get('description');
                        $item->document_type = $db->all();
                        return $item;
                    }, $data_db);
                $data = $responseData;
            }else{
                $response = [
                    'type' => "error",
                    'content' => "Hubo un error al consultar los registros."
                ]; 
            }
            return response()->json([
                'status' => $status,
                'response' => $response,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            // dd($th);
            return response()->json([
                'status' => $status,
                'response' => $response,
                'data' => $data
            ]);
        }
    }

    public function saveRecord(Request $request){

        $status = false;
        $response = [];
        $date = Carbon::now()->toDateTimeString();
        try {
            $result_get = DB::table('records')
                            ->where('email', $request->email)
                            ->get();
            if($result_get->all() == []){
                //Se genera el insert para la creacion del registro
                $result = DB::insert("INSERT INTO records (name, last_name, email, password, type_document_id, created_at, updated_at) VALUES ('$request->name', '$request->last_name', '$request->email', '$request->password', '$request->type_document_id', '$date', '$date');");
                if($result){
                    $status = true;
                    $response = [
                        'type' => "success",
                        'content' => "Se creo el registro correctamente."
                    ];
                }else{
                    $response = [
                        'type' => "error",
                        'content' => "Hubo un error al crear el registro."
                    ]; 
                }
            }else{
                $response = [
                    'type' => "error",
                    'content' => "El email ya esta registrado."
                ];
            }
            return response()->json([
                'status' => $status,
                'response' => $response
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function editRecord(Request $request){
        $status = false;
        $response = [];
        $date = Carbon::now()->toDateTimeString();
        $rules = [
            'email' => 'required|email|max:100'
        ];
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        try{
            $record = Record::find($request->id);
            if($record){
                $record->name = $request->name;
                $record->last_name = $request->last_name;
                $record->email = $request->email;
                $record->password = $request->password;
                $record->type_document_id = $request->type_document_id;
                $record->updated_at = $date;
                $record->save();
                $status = true;
                $response = [
                    'type' => "success",
                    'content' => "Se actualizo correctamente el registro"
                ];
            }else{
                $response = [
                    'type' => "success",
                    'content' => "El registro no existe"
                ];
            }
            return response()->json([
                'status' => $status,
                'response' => $response
            ]);
        } catch (\Throwable $th){
            // dd($th);
        }
    }

    public function deleteRecord(Request $request){
        $status = false;
        $response = [];
        try {
            $result = DB::table('records')
                            ->where('id', $request->id)
                            ->orderBy('id', 'desc')
                            ->get();

            if($result != []){
                $deleted = DB::table('records')->where('id', $request->id)->delete();
                if ($deleted > 0) {
                    $status = true;
                    $response = [
                        'type' => "success",
                        'content' => "Se borro correctamente el registro"
                    ];
                }
            }else{
                $response = [
                    'type' => "error",
                    'content' => "No existe el registro que se quiere eliminar."
                ]; 
            }
            return response()->json([
                'status' => $status,
                'response' => $response
            ]);
        } catch (\Throwable $th) {
            return null;
        }
    }
}

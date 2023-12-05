<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DateTime;
use DateInterval;

class kegiatanController extends Controller
{
    public function getAllData(){
        $data = kegiatanModel::all();

        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'data not found',
            ]);
        }else {
            return response()->json([
                'code' => 200,
                'message' => 'success get all data',
                'data' => $data
            ]);
        }
    }
    public function createData(Request $request){   

        $validation = validator::make(
            $request->all(), 
            [
                'nama_kegiatan' => 'required',
                'tanggal' => 'required',
                'jam_mulai' => 'required',
                'jam_selesai' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'nama_kegiatan.required' => 'form nama kegiatan tidak boleh kosong',
                'tanggal.required' => 'form tanggal tidak boleh kosong',
                'jam_mulai.required' => 'jam mulai tidak boleh kosong',
                'jam_selesai.required' => 'jam selesai tidak boleh kosong',
                'deskripsi.required' => 'form deskripsi tidak boleh kosong',
                'foto.required' => 'foto tidak boleh kosong',
                'foto.mines' => 'foto harus jpg,jpeg'
            ]
        );
        if ($validation->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'check your validation',
                'data' => $validation->errors()
            ]);
        }
        try {
            $data = new kegiatanModel();
            $data->nama_kegiatan = $request->input('nama_kegiatan');
            $data->tanggal = $request->input('tanggal');
            $data->jam_mulai = $request->input('jam_mulai');
            $data->jam_selesai = $request->input('jam_selesai');
            $data->deskripsi = $request->input('deskripsi');
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $extention = $file->getClientOriginalExtension();
                $filename = 'GALERY-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/foto/');
                $file->move(public_path('uploads/foto/'), $filename);
                $data->foto = $filename;
            }

            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed to create data',
                'data' => $th->getMessage()
            ]);
        }
        return response()->json([
            'code' => 200,
            'message' => 'create data success',
            'data' => $data
        ]);
    }
    public function editDataById($id){
        $data = kegiatanModel::where('id', $id)->first();

        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'data not found'
            ]);
        }else{
            return response()->json([
                'code' => 200,
                'message' => 'get data By Id success',
                'data' => $data
            ]);
        }
    }
    public function updateData(Request $request, $id){
        try {
            $data = KegiatanModel::where('id', $id)->first();
            if (!$data) {
                return response()->json(
                    [
                        'code' => 404,
                        'message' => 'data not found'
                    ]
                );
            }
            
            $validation = validator::make(
                $request->all(), 
                [
                    'nama_kegiatan' => 'required',
                    'tanggal' => 'required',
                    'jam_mulai' => 'required',
                    'jam_selesai' => 'required',
                    'deskripsi' => 'required',
                    'foto' => 'required|mimes:png,jpeg,jpg',
                ],
                [
                    'nama_kegiatan.required' => 'form nama kegiatan tidak boleh kosong',
                    'tanggal.required' => 'form tanggal tidak boleh kosong',
                    'jam_mulai.required' => 'jam mulai tidak boleh kosong',
                    'jam_selesai.required' => 'jam selesai tidak boleh kosong',
                    'deskripsi.required' => 'form deskripsi tidak boleh kosong',
                    'foto.mimes' => 'foto harus jpg,jpeg'
                ]
            );
            if ($validation->fails()) {
                return response()->json([
                    'code' => 404,
                    'message' => 'data not found',
                    'data' => $validation->errors()
                ]);
            }
                $data->nama_kegiatan = $request->input('nama_kegiatan');
                $data->tanggal = $request->input('tanggal');
                $data->jam_mulai = $request->input('jam_mulai');
                $data->jam_selesai = $request->input('jam_selesai');
                $data->deskripsi = $request->input('deskripsi');
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $extention = $file->getClientOriginalExtension();
                    $filename = 'GALERY-' . Str::random(15) . '.' . $extention;
                    Storage::makeDirectory('uploads/foto/');
                    $file->move(public_path('uploads/foto/'), $filename);
                    $old_file_path = public_path('uploads/foto/') . $data->foto;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                    $data->foto = $filename;
                }
                $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed to update data',
                'errors' => $th->getMessage()
            ]);
        }   
        return response()->json([
            'code' => 200,
            'message' => 'update data success',
            'data' => $data
        ]);
    }
    public function deleteData($id){
        try {
            $data = kegiatanModel::where('id', $id)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'data not found'
                ]);
            }
            $filePath = 'uploads/foto/' . $data->foto;
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $data->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed to delete data',
                'errors' => $th->getMessage()
            ]);
        }
        return response()->json([
            'code' => 200,
            'message' => 'delete data success'
        ]);
    }
    public function calculateTimeLimit($baseTime, $hoursToAdd, $minutesToAdd) {
        // Konversi waktu awal ke dalam objek DateTime
        $dateTime = new DateTime($baseTime);

        // Tambahkan jumlah jam dan menit ke dalam objek DateTime
        $dateTime->add(new DateInterval("PT{$hoursToAdd}H{$minutesToAdd}M"));

        // Format hasil waktu ke dalam format yang diinginkan (misalnya: H:i:s)
        return $dateTime->format('H:i:s');
    }

    // Contoh penggunaan di dalam sebuah metode controller
    public function someControllerMethod() {
        $baseTime = '10:00:00';
        $hoursToAdd = 2;
        $minutesToAdd = 30;

        $timeLimit = $this->calculateTimeLimit($baseTime, $hoursToAdd, $minutesToAdd);

        // Lakukan sesuatu dengan $timeLimit
    }
    public function countKegiatan()
    {
        $count = KegiatanModel::count();

        return response()->json(['countk' => $count]);
    }
    
}

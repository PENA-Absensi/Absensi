@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Absensi</h4>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#KegiatanModal" id="addKegiatan">
                        Rekap data
                    </button>                    
                </div>
                <div class="table-responsive">
                    <table id="dataTableKegiatan" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Gen</th>
                                <th>Nama Kegiatan</th>
                                <th>jam Absen</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Budi </td>
                                <td>6</td>
                                <td>mubes</td>
                                <td>08:30 WIB</td>
                                <td>Hadir</td>
                                <td>
                                   
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Indah</td>
                                <td>7</td>
                                <td>mubes</td>
                                <td>10:00 WIB</td>
                                <td>sakit</td>
                                <td>
                                   
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Adi </td>
                                <td>8</td>
                                <td>mubes</td>
                                <td>14:30 WIB</td>
                                <td>Hadir</td>
                                <td>
                                    
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Dewi</td>
                                <td>Perempuan</td>
                                <td>mubes</td>
                                <td>09:00 WIB</td>
                                <td>sakit</td>
                                <td>
                                   
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal">Delete</button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris data lainnya di sini -->
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="KegiatanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KegiatanModalLable">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="upsertData" method="POST">
                    @csrf
                    <div class="row py-2">
                        <div class="col-md-12">
                            <input type="hidden" id="id" name="id" value="">
                            <div class="form-group fill">
                                <label>Nama </label>
                                <input id="nama_kegiatan" name="nama_kegiatan" type="text" class="form-control"
                                    placeholder="input here..." autocomplete="off">
                                <small id="nama_kegiatan-error" class="text-danger"></small>
                            </div>
                            <div class="form-group fill">
                                <label>Gen</label>
                                <input id="tanggal" name="tanggal" type="date" class="form-control"
                                    placeholder="input here..." autocomplete="off">
                                <small id="tanggal-error" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input id="jam_mulai" name="jam_mulai" type="time" class="form-control"
                                    placeholder="1234 Main St">
                                <small id="jam_mulai-error" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>jam_Absen</label>
                                <input id="jam_selesai" name="jam_selesai" type="time" class="form-control"
                                    placeholder="Apartment, studio, or floor">
                                <small id="jam_selesai-error" class="text-danger"></small>
                            </div>
                            <div class="form-group fill">
                                <label>Status</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control h-150px" rows="6" id="comment"></textarea>
                                <small id="deskripsi-error" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="simpanData" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection

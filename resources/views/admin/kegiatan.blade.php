@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Daftar Kegiatan</h4>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#KegiatanModal"
                            id="addKegiatan">
                            Tambah data
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableKegiatan" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kegiatan</th>
                                    <th>tanggal</th>
                                    <th>jam mulai</th>
                                    <th>jam selesai</th>
                                    <th>deskripsi</th>
                                    <th>foto</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="KegiatanModal">
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
                                <div class="text-center">
                                    <img src="" alt="" id="preview" class="mx-auto d-block pb-2"
                                        style="max-width: 200px; padding-top: 23px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" id="id" name="id" value="">
                                <div class="form-group fill">
                                    <label>Nama Kegiatan</label>
                                    <input id="nama_kegiatan" name="nama_kegiatan" type="text" class="form-control" placeholder="input here..." autocomplete="off">
                                    <small id="nama_kegiatan-error" class="text-danger"></small>
                                </div>
                                <div class="form-group fill">
                                    <label>Tanggal</label>
                                    <input id="tanggal" name="tanggal" type="date" class="form-control"
                                        placeholder="input here..." autocomplete="off">
                                    <small id="tanggal-error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>jam_mulai</label>
                                    <input id="jam_mulai" name="jam_mulai" type="time" class="form-control"
                                        placeholder="1234 Main St">
                                    <small id="jam_mulai-error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>jam_selesai</label>
                                    <input id="jam_selesai" name="jam_selesai" type="time" class="form-control"
                                        placeholder="Apartment, studio, or floor">
                                    <small id="jam_selesai-error" class="text-danger"></small>
                                </div>
                                <div class="form-group fill">
                                    <label>Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control h-150px" rows="6" id="comment"></textarea>
                                    <small id="deskripsi-error" class="text-danger"></small>
                                </div>
                                <div class="form-group fill">
                                    <label>Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                    <small id="foto-error" class="text-danger"></small>
                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="simpanData" class="btn btn-primary">
                        Simpan Data
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            getDataKegiatan();
            // get data
            function getDataKegiatan() {
                $.ajax({
                    url: `/api/v1/get/`,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let tableBody = "";
                        $.each(response.data, function(index, item) {
                            tableBody += "<tr>";
                            tableBody += "<td>" + (index + 1) + "</td>";
                            tableBody += "<td>" + item.nama_kegiatan + "</td>";
                            tableBody += "<td>" + item.tanggal + "</td>";
                            tableBody += "<td>" + item.jam_mulai + "</td>";
                            tableBody += "<td>" + item.jam_selesai + "</td>";
                            tableBody += "<td>" + item.deskripsi + "</td>";
                            tableBody += "<td><img src='http://127.0.0.1:8000/uploads/foto/" +
                                item.foto +
                                "' style='width:100px;height:100px;' alt='Foto Kegiatan'></td>";
                            tableBody += "<td>" +
                                "<button type='button' class='btn btn-primary edit-modal'  " +
                                "data-id='" + item.id + "'>" +
                                "<i class='fa fa-edit'></i></button>" +
                                "<button type='button' class='btn btn-danger delete-confirm' data-id='" +
                                item.id + "'><i class='fa fa-trash'></i></button>" +
                                "</tr>";
                            tableBody += "</tr>";
                        });
                        let table = $("#dataTableKegiatan").DataTable();
                        table.clear().draw();
                        table.rows.add($(tableBody)).draw();
                    },
                    error: function() {
                        console.log("failed to get data from server");
                    }
                });
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // edit data
            $(document).ready(function() {
                // Fungsi untuk menampilkan data ke dalam modal
                function displayDataInModal(data) {
                    $('#KegiatanModalLable').text('Edit Data');
                    $('#id').val(data.id);
                    $('#nama_kegiatan').val(data.nama_kegiatan);
                    $('#tanggal').val(data.tanggal);
                    $('#jam_mulai').val(data.jam_mulai);
                    $('#jam_selesai').val(data.jam_selesai);
                    $('#deskripsi').val(data.deskripsi);
                    $('#preview').attr('src', '/uploads/foto/' + data.foto);
                    var fileName = data.foto;
                    $('.custom-file-label').text(fileName);
                    $('#KegiatanModal').modal('show');
                }

                // Tombol edit diklik
                $(document).on('click', '.edit-modal', function() {
                    let id = $(this).data('id');
                    $.ajax({
                        type: 'GET',
                        url: `/api/v1/edit/${id}`,
                        success: function(response) {
                            displayDataInModal(response.data);
                        },
                        error: function(error) {
                            console.error('Gagal mengambil data', error);
                        }
                    });
                });

                // Fungsi untuk menampilkan gambar sebelum mengunggahnya dan menampilkan nama file
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);

                        // Menampilkan nama file di dalam input file
                        var fileName = input.files[0].name;
                        $('.custom-file-label').text(fileName);
                    }
                }

                // Mengatur event handler untuk input file
                $("#foto").change(function () {
                    readURL(this);
                });

                // Tombol tambah data diklik
                $(document).on('click', '#addKegiatan', function() {
                    $('#KegiatanModalLable').text('Tambah Data');
                    $('#upsertData')[0].reset();
                    $('#id').val('');
                    $('#preview').attr('src', '');
                    $('.custom-file-label').text('Pilih file');
                    $('#KegiatanModal').modal('show');
                });

                // Clear text jika validasi muncul ketika modal ditutup
                $('#KegiatanModal').on('hidden.bs.modal', function() {
                    $('.text-danger').text('');
                    $('#foto').val('');
                });

                // Fungsi untuk menampilkan alert
                function showSweetAlert(icon, title, message) {
                    Swal.fire({
                        icon: icon,
                        title: title,
                        text: message
                    });
                }
            });

            // create adn update data
            $(document).on('click', '#simpanData', function(e) {
                e.preventDefault();
                $('.text-danger').text('');

                var id = $('#id').val();
                var nama_kegiatan = $('#nama_kegiatan').val();
                var tanggal = $('#tanggal').val();
                var jam_mulai = $('#jam_mulai').val();
                var jam_selesai = $('#jam_selesai').val();
                var deskripsi = $('#deskripsi').val();
                var batas_waktu = jam_selesai;


                var formData = new FormData();
                formData.append('id', id);
                formData.append('nama_kegiatan', nama_kegiatan);
                formData.append('tanggal', tanggal);
                formData.append('jam_mulai', jam_mulai);
                formData.append('jam_selesai', jam_selesai);
                formData.append('deskripsi', deskripsi);
                formData.append('foto', $('#foto')[0].files[0]);

                $('#simpanData').prop('disabled', true);
                $('.spinner-border').show();

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: `/api/v1/update/${id}`,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            $('#simpanData').prop('disabled', false);
                            $('.spinner-border').hide();
                            if (response.code === 422) {
                                let errors = response.errors;
                                $.each(errors, function(key, value) {
                                    $('#' + key + '-error').text(value[0]);
                                });
                            } else if (response.code === 200) {
                                $('#KegiatanModal').modal('hide');
                                Swal.fire('Success', 'data berhasil diperbarui', 'success')
                                getDataKegiatan();
                            } else {
                                Swal.fire('Error', 'Gagal memperbarui data', 'error');
                            }
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '/api/v1/create',
                        data: formData,
                        processData: false,
                        contentType: false,
                        // ...
                    success: function(response) {
                        console.log(response);
                        $('#simpanData').prop('disabled', false);
                        $('.spinner-border').hide();

                        if (response.code === 422) {
                            let errors = response.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        } else if (response.code === 200) {
                            $('#KegiatanModal').modal('hide');
                            Swal.fire('Success', 'data berhasil diperbarui', 'success');
                            getDataKegiatan();
                        } else {
                            Swal.fire('Error', 'Gagal memperbarui data', 'error');
                        }
                    },
                    // ...

                    });
                }
            });
            // delete data
            $(document).on('click', '.delete-confirm', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: `/api/v1/delete/${id}`,
                            success: function(response) {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success');
                                getDataKegiatan();
                            },
                            error: function(error) {
                                Swal.fire('Error', 'Gagal menghapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


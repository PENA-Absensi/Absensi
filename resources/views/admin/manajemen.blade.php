@extends('layout.index')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row" class="text-center">
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 168.8px;">NO</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 271.237px;">NAMA</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 124px;">ALAMAT</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 57.6625px;">ANGKATAN</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 112.838px;">JURUSAN</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94.9625px;">ROLE</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94.9625px;">PASSWORD</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94.9625px;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                <tr class="align-middle">
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->jurusan }}</td>
                                    <td>{{ $d->angkatan }}</td>
                                    <td>{{ $d->role }}</td>
                                    <td>{{ $d->password }}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('getDataById', $d->id  ) }}" class="btn btn-primary">Edit</a> --}}
                                        <form action="{{ route('admin.deleteData' , $d->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-body">
                    <h4 class="card-title">User</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row" class="text-center">
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 168.8px;">NO</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 271.237px;">NAMA</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 124px;">ALAMAT</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 57.6625px;">ANGKATAN</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 112.838px;">JURUSAN</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94.9625px;">PASSWORD</th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94.9625px;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                <tr class="align-middle">
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->jurusan }}</td>
                                    <td>{{ $d->angkatan }}</td>
                                    <td>{{ $d->password }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('getDataById', $d->id  ) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('deleteData' , $d->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

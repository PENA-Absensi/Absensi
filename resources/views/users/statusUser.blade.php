@extends('layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Profil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets') }}/dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Eghit Ramadhan</h3>
                        <p class="text-muted text-center">Mahasiswa</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <i class="float-right">Eghit Ramadhan</i>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <i class="float-right">bandarnarkoba@gmail.com</i>
                            </li>
                            <li class="list-group-item">
                                <b>Prodi</b> <i class="float-right">Teknik Informatika</i>
                            </li>
                    </ul>
                    </div>
                </div>

            </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#editProfil" data-toggle="tab">Edit Profil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#changeImage" data-toggle="tab">Change Image</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="editProfil">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Teknik Informatika</option>
                                            <option>Sistem Informasi</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Saya yakin mengubah data
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="changeImage">
                            <div class="text-center">
                                <h4 class="mb-4">Image</h4>
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets') }}/dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                                </div>
                        </div>

                        <div class="tab-pane" id="contact">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Programer
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>Eghit</b></h2>
                                            <p class="text-muted text-sm"><b>About : </b> Ambivert yang sedang menempuh kehidupan perkuliahan</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat : Jl. Datu Adam </li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : 0853-4754-9934</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection


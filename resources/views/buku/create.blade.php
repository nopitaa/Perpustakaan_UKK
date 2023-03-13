@extends('layouts.app')

@section('content')
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Tambah Data Buku</h4>
								<p class="mb-30">Isikan Data Dengan Benar</p>
							</div>
						</div>
                        <!-- digunakan untuk ngepost / memproses data ke function store yang ada di controller-->
						<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- text input create data buku -->
                        <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Judul</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('judul') }}"
										type="text"
                                        id="judul"
                                        name="judul"
									/>
								</div>
							</div>

                        <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Pengarang</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('pengarang') }}"
										type="text"
                                        id="pengarang"
                                        name="pengarang"
									/>
								</div>
							</div>
							
                        <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Penerbit</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('penerbit')}}"
										type="text"
                                        id="penerbit"
                                        name="penerbit"
									/>
								</div>
							</div>

                                <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Jumlah Halaman</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('jumlah_halaman') }}"
										type="number"
                                        id="jumlah_halaman"
                                        name="jumlah_halaman"
									/>
								</div>
							</div>

                                <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Tanggal Terbit</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('tanggal_terbit') }}"
										type="date"
                                        id="tanggal_terbit"
                                        name="tanggal_terbit"
									/>
								</div>
							</div>

                        <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
								<div class="col-sm-12 col-md-10">
									<textarea
										class="form-control"
										value="{{ old('deskripsi') }}"
										type="text"
                                        id="deskripsi"
                                        name="deskripsi"
                                        rows="5"
                                        ></textarea>
								</div>
							</div>

                        <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Image</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{ old('image') }}"
										type="file"
                                        id="image"
                                        name="image"
									/>
								</div>
							</div>
                        </br>
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                        <a href="{{ route('buku.index')}}" class="btn btn-secondary">Kembali</a>
                    </form>
				
							</div>
						</div>
					</div>
			</div>
	
@endsection
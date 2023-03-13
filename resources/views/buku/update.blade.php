
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
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ $buku->judul }}" required autocomplete="judul" autofocus>
                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input id="pengarang" type="text"
                                    class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                                    value="{{ $buku->pengarang }}" required autocomplete="pengarang">
                                @error('pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input id="penerbit" type="text"
                                    class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                                    value="{{ $buku->penerbit }}" required autocomplete="penerbit">

                                @error('penerbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_halaman">Jumlah Halaman</label>
                            <input id="jumlah_halaman" type="number"
                                    class="form-control @error('jumlah_halaman') is-invalid @enderror" name="jumlah_halaman"
                                    value="{{ $buku->jumlah_halaman }}" required autocomplete="jumlah_halaman">
                                @error('jumlah_halaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_terbit">Tanggal Terbit</label>
                            <input id="tanggal_terbit" type="date"
                                    class="form-control @error('tanggal_terbit') is-invalid @enderror" name="tanggal_terbit"
                                    value="{{ $buku->tanggal_terbit}}" required autocomplete="tanggal_terbit">
                                @error('tanggal_terbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="tanggal_terbit"
                                    required autocomplete="deskripsi" rows="5">{{ $buku->deskripsi}}</textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Buku</button>
                        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
							</div>
						</div>
					</div>
			</div>
	
@endsection
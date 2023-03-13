@extends('layouts.app')

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Detail Buku {{ $buku->judul }}</h4>
								<p class="mb-30">Berikut Detail Dari Buku {{ $buku->judul }} :</p>
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
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                            <img src="{{Storage::url($buku->image)}}" alt="{{ $buku->judul }}"
                                style="max-width: 230px;">

                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" value="{{ $buku->judul }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" value="{{ $buku->pengarang }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" value="{{ $buku->penerbit }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="text" class="form-control" id="jumlah_halaman" value="{{ $buku->jumlah_halaman }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_terbit">Tanggal Terbit</label>
                                <input type="text" class="form-control" id="tanggal_terbit" value="{{ $buku->tanggal_terbit}}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_terbit">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" readonly>{{ $buku->deskripsi }}</textarea>

                            </div>
                            </br>
                            <div class="form-group">
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

							</div>
						</div>
					</div>
			</div>
	
@endsection
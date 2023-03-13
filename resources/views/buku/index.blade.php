@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

			<div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
                                <form action="{{ route('buku.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search..." name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- code button search -->
							<div class="col-md-6 col-sm-12 text-right">
                                <a href="{{ route('buku.export.pdf') }}" class="btn btn-success ">Export PDF</a>
                                <a href="{{ route('buku.create') }}" class="btn btn-primary" style="margin-right: 10px;">Add Book</a>
							</div>
						</div>
					</div>
                    
    					<!-- Striped table start -->
                        <div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Data Buku</h4>
								<p>
                                Berikut Data Buku Yang Tersedia : 
								</p>
							</div>

						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Pengarang</th>
									<th>Penerbit</th>
									<th>Action</th>
								</tr>
							</thead>
                            <tbody>
                            <!-- ngambil variabel dri controller -->
                                @foreach ($bukus as $key => $buku)
            <tr>
                <td>{{ ($bukus->currentPage()-1) * $bukus->perPage() + $loop->iteration }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
        
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-warning btn-sm">Show</a>
                    <!-- function untuk delete data buku -->
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
							</tbody>
						</table>
@endsection
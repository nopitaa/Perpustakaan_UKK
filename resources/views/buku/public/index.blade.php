@extends('layouts.app')

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <form action="{{ route('buku.public.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                placeholder="Cari judul, pengarang, atau penerbit..." name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="product-wrap">
        <div class="product-list">
            <ul class="row">

                @foreach($buku as $book)
                <li class="col-lg-3 col-md-5 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img">
                            @if ($book->image)
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->judul }}" class="card-img-top" style="max-width: 300px;">
                            @endif
                        </div>
                        <div class="product-caption">
                            <h4><a href="#">{{ $book->judul }}</a></h4>
                            <div class="price">{{ $book->pengarang }}</div>
                            <a href="{{ route('buku.public.show', $book->id) }}" class=" btn
                                btn-outline-primary">Detail Buku</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="pagination justify-content-center">
            {{ $buku->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
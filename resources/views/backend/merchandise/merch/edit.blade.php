@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Edit Data</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('merch.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('merch.update', $merch->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Kategory</label>
                                <div class="col-sm-10">
                                    <select class="form-select  @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option value="{{ $merch->category_id }}" selected>{{ $merch->categoryMerch->name }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $merch->name }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Entry nama">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stock" value="{{ $merch->stock }}"
                                        class="form-control @error('stock') is-invalid @enderror" placeholder="Entry stok">
                                    @error('stock')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" value="{{ $merch->price }}"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Entry harga">
                                    @error('price')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Diskon</label>
                                <div class="col-sm-10">
                                    <input type="number" name="discount" value="{{ $merch->discount }}"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Entry diskon">
                                    @error('discount')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Entry keterangan" rows="3">{{ $merch->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">File</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" value="{{ $merch->image }}"
                                        class="form-control
                                        @error('image') is-invalid @enderror"
                                        placeholder="Entry File">
                                    @error('image')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10 ms-sm-auto">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

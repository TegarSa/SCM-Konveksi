@extends('backend.layouts.index')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.css" rel="stylesheet">
@endpush
@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Edit Artikel</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('post.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" placeholder="Entry judul artikel">
                                    @error('title')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Cover</label>
                                <div class="col-sm-10">
                                    <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                    @error('cover')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    @if($post->cover)
                                        <div class="mt-2">
                                            <img src="{{ asset('backend/img/artikel/' . $post->cover) }}" alt="Cover Image" class="img-fluid" width="100">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" id="description"
                                        class="form-control @error('desc') is-invalid @enderror" placeholder="Keterangan">{{ old('desc', $post->desc) }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                <label class="col-form-label col-sm-2 text-sm-end">Tags</label>
                                <div class="col-sm-10">
                                    <select name="tags[]" class="form-control select2-tags @error('tags') is-invalid @enderror" id="selectElement" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Keywords</label>
                                <div class="col-sm-10">
                                    <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{ old('keywords', $post->keywords) }}" placeholder="Entry kata kunci">
                                    @error('keywords')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Meta Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" value="{{ old('meta_desc', $post->meta_desc) }}" placeholder="Entry meta deskripsi">
                                    @error('meta_desc')
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        var editor = new FroalaEditor('#desc');
        flatpickr(".start_register");
        flatpickr(".end_register");
        flatpickr(".start_training");
    </script>
    
    <script type="text/javascript">
        new SlimSelect({
            select: '#selectElement'  
        });

        $(document).ready(function() {
            App.init();
            App.dataTables();
            App.formElements();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });
        });
    </script>
@endpush

@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Post</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('post.create') }}" class="btn btn-primary">Tambah Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Cover</th>
                                    <th>Kategori</th>
                                    <th>Tags</th>
                                    <th>Keywords</th>
                                    <th>Meta Description</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><img src="{{ asset('backend/img/artikel/' . $post->cover) }}" alt="Cover" width="50"></td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span>{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $post->keywords }}</td>
                                    <td>{{ $post->meta_desc }}</td>
                                    <!-- <td>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td> -->
                                    <td class="d-column">
                                        <a class="m-2 btn btn-info" href="{{ route('post.edit', $post->id) }}">
                                            <i class="fas fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="m-2 btn btn-danger">
                                                <i class="fas fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/js/datatables.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endpush

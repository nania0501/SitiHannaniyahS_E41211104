<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD Syahra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $post->nama) }}" required>

                                <!-- error message untuk nama -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="asal_daerah">asal daerah</label>
                                <input type="text" class="form-control @error('asal_daerah') is-invalid @enderror"
                                    name="asal_daerah" value="{{ old('asal_daerah', $post->asal_daerah) }}" required>

                                <!-- error message untuk asal daerah -->
                                @error('asal_daerah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cara_pemakaian">Cara pemakaian</label>
                                <input type="text" class="form-control @error('cara_pemakaian') is-invalid @enderror"
                                    name="cara_pemakaian" value="{{ old('cara_pemakaian', $post->cara_pemakaian) }}" required>

                                <!-- error message untuk cara pemakaian-->
                                @error('cara_pemakaian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bahan">Bahan</label>
                                <input type="text" class="form-control @error('bahan') is-invalid @enderror"
                                    name="bahan" value="{{ old('bahan', $post->bahan) }}" required>

                                <!-- error message untuk bahan -->
                                @error('usia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $post->title) }}" required> -->

                                <!-- error message untuk title -->
                                <!-- @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="status">Publish Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ $post->status == 1 ? 'selected':'' }}>Publish</option>
                                    <option value="0" {{ $post->status == 0 ? 'selected':'' }}>Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea
                                    name="content" id="content"
                                    class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                    rows="5" required>{{ old('content', $post->content) }}</textarea> -->

                                <!-- error message untuk content -->
                                <!-- @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> -->

                            <button type="submit" class="btn btn-md btn-primary">Edit</button>
                            <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html>
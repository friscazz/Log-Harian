@extends('adminlte::page')

@section('title', 'Buat Log')

@section('content_header')
    <h1>Buat Log</h1>
@endsection

@section('content')
<div class="container">
    <form action="{{ route('logs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description">Deskripsi Pekerjaan</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="file">Upload File (Optional)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
@extends('adminlte::page')

@section('title', 'Log Detail')

@section('content_header')
    <h1>Log Detail & Edit</h1>
@endsection

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>{{ $log->user->name }}'s Log - {{ $log->created_at->format('d-m-Y') }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $log->list_pekerjaan }}</p>
            <p><strong>Status:</strong> {{ $log->status }}</p>
            @if($log->file_path)
                <p><strong>File:</strong> <a href="{{ asset('storage/' . $log->file_path) }}" target="_blank">Download</a></p>
            @endif

            <hr>

            <form action="{{ route('logs.update', $log->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="description">Edit Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $log->list_pekerjaan }}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">Upload File (Optional)</label>
                    <input type="file" name="file" id="file" class="form-control">
                    @if($log->file_path)
                        <p>Current File: <a href="{{ asset('storage/' . $log->file_path) }}" target="_blank">Download</a></p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <form action="{{ route('logs.destroy', $log->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
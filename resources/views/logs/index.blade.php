@extends('adminlte::page')

@section('title', 'List Log')

@section('content_header')
    <h1>List Log</h1>
@endsection

@section('content')
<div class="container">
    <a href="{{ route('logs.create') }}" class="btn btn-primary">Create Log</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->list_pekerjaan }}</td>
                    <td>{{ $log->status }}</td>
                    <td>
                        <a href="{{ route('logs.show', $log->id) }}" class="btn btn-info">View</a>
                        @if(auth()->user()->role_id === \App\Models\Role::where(['role' => 'Direktur'])->first()->id || auth()->user()->role_id === \App\Models\Role::where(['role' => 'Manager Operasional'])->first()->id || auth()->user()->role_id === \App\Models\Role::where(['role' => 'Manager Keuangan'])->first()->id)
                            <form action="{{ route('logs.approve', $log->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('logs.reject', $log->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
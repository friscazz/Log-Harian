<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
Use App\Models\Status;
class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logs = Log::with('user')->join('statuses','statuses.id','=','logs.user_id')->get();
        return view('logs.index', compact('logs'));
    }

    public function create()
    {
        return view('logs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('file') ? $request->file('file')->store('logs') : null;
        $pending = Status::where('status','Pending')->first();
        Log::create([
            'user_id' => auth()->id(),
            'list_pekerjaan' => $request->description,
            'status_id' => $pending->id,
            'filename' => $path,
        ]);
        return redirect()->route('logs.index')->with('success', 'Log Berhasil dibuat.');
    }

    public function show($id, Log $log)
    {  
         $log = Log::with('user')->join('statuses','statuses.id','=','logs.user_id')->where('id',$id)->first();
        return view('logs.show', compact('log'));
    }

    public function update(Request $request, Log $log)
    {
        $request->validate([
            'list_pekerjaan' => 'required',
            'filename' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('file') ? $request->file('file')->store('logs') : $log->file_path;

        $log->update([
            'list_pekerjaan' => $request->description,
            'filename' => $path,
        ]);

        return redirect()->route('logs.index')->with('success', 'Log updated successfully.');
    }

    public function destroy(Log $log)
    {
        $log->delete();
        return redirect()->route('logs.index')->with('success', 'Log deleted successfully.');
    }

    public function approve(Log $log)
    {
        $approved = Status::where('status','Disetujui')->first();
        $log->update(['status_id' => $approved->id]);
        return redirect()->back()->with('success', 'Log approved successfully.');
    }

    public function reject(Log $log)
    {
        $rejected = Status::where('status','Ditolak')->first();
        $log->update(['status_id' => $rejected->id]);
        return redirect()->back()->with('error', 'Log rejected.');
    }
}

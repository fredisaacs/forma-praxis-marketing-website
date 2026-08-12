@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Contact messages</h1>
            <p class="text-muted mb-0">Review inbound inquiries from your public contact form.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Back to dashboard</a>
    </div>

    @if($messages->isEmpty())
        <div class="alert alert-info">No contact messages yet.</div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ Str::limit($message->message, 120) }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection

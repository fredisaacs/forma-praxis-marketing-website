@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-3">Welcome back. Your admin area is ready and can review contact submissions.</p>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Open contact inbox</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

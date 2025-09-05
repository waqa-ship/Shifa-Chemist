@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-tags me-2"></i> Category Details
            </h4>
            <span class="badge bg-light text-dark">ID: {{ $category->id }}</span>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <h5 class="text-muted">Category Name</h5>
                <p class="fs-5 fw-bold text-dark">{{ $category->name }}</p>
            </div>

            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-muted">Created At</h6>
                        <p class="fw-semibold">{{ $category->created_at->format('d M, Y h:i A') }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-muted">Updated At</h6>
                        <p class="fw-semibold">{{ $category->updated_at->format('d M, Y h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

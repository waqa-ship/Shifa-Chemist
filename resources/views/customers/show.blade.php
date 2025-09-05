@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient bg-primary text-white">
            <h3 class="mb-0">
                <i class="fas fa-user-circle me-2"></i> Customer Details
            </h3>
        </div>

        <div class="card-body">
            <div class="row g-4">
                {{-- Name --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-user me-2 text-primary"></i>
                        <strong>Name:</strong> {{ $customer->name }}
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-envelope me-2 text-success"></i>
                        <strong>Email:</strong> {{ $customer->email }}
                    </div>
                </div>

                {{-- Phone --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-phone me-2 text-info"></i>
                        <strong>Phone:</strong> {{ $customer->phone }}
                    </div>
                </div>

                {{-- Address --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                        <strong>Address:</strong> {{ $customer->address }}
                    </div>
                </div>

                {{-- DOB --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-birthday-cake me-2 text-warning"></i>
                        <strong>DOB:</strong> {{ $customer->dob ? $customer->dob->format('Y-m-d') : '-' }}
                    </div>
                </div>

                {{-- Notes --}}
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <i class="fas fa-sticky-note me-2 text-secondary"></i>
                        <strong>Notes:</strong> {{ $customer->notes }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning px-4">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary px-4">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">✏️ Edit Customer</h4>
                    <a href="{{ route('customers.index') }}" class="btn btn-light btn-sm">⬅ Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Full Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $customer->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $customer->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Phone</label>
                            <input type="text" 
                                   name="phone" 
                                   id="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone', $customer->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <textarea name="address" 
                                      id="address" 
                                      class="form-control @error('address') is-invalid @enderror" 
                                      rows="3">{{ old('address', $customer->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4">💾 Update</button>
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary px-4">❌ Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
@endsection

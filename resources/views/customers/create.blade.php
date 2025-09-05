@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">➕ Add Customer</h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf

                        {{-- Reuse _form partial --}}
                        @include('customers._form')

                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Save Customer
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

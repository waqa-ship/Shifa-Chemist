@extends('layouts.app')

@section('content')
   

    <div class="container py-4">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">
                <i class="fas fa-pills me-2"></i> Medicine Categories
            </h2>
            <a href="{{ route('categories.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Add Category
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Card with Table --}}
        <div class="card shadow rounded-3 border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center" width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-primary">{{ $cat->id }}</span>
                                    </td>
                                    <td class="fw-semibold">{{ $cat->name }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            {{-- View (optional, you can remove if not needed) --}}
                                            <a href="{{ route('categories.show', $cat) }}" class="btn-action btn-view"
                                                title="View Category">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('categories.edit', $cat) }}" class="btn-action btn-edit"
                                                title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('categories.destroy', $cat) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirmDelete('{{ $cat->name }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-action btn-delete" title="Delete Category"
                                                    type="submit">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="fas fa-folder-open fa-2x mb-2 d-block"></i>
                                        No categories found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

           {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>



            {{-- <div class="card-footer text-end">
                <p>Total: {{ $categories->total() }} | Current Page: {{ $categories->currentPage() }} | Last Page:
                    {{ $categories->lastPage() }}</p>
                {{ $categories->links() }}
            </div> --}}
        </div>

    </div>
@endsection
@push('styles')
<link href="{{ asset('css/medicen-catagory-index.css') }}" rel="stylesheet">
@endpush

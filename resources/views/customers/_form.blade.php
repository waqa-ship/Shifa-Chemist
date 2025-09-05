@php $editing = isset($customer); @endphp

<div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name', $customer->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input name="email" value="{{ old('email', $customer->email ?? '') }}" class="form-control @error('email') is-invalid @enderror">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="form-control @error('phone') is-invalid @enderror">
    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $customer->address ?? '') }}</textarea>
    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Date of Birth</label>
    <input type="date" name="dob" value="{{ old('dob', isset($customer) && $customer->dob ? $customer->dob->format('Y-m-d') : '') }}" class="form-control @error('dob') is-invalid @enderror">
    @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Notes</label>
    <textarea name="notes" class="form-control">{{ old('notes', $customer->notes ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $editing ? 'Update' : 'Create' }}</button>

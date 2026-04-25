<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <form method="POST" action="{{ route('department.update', $department) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $department->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}
                </div>
            @enderror
        </div>
        <a class="btn btn-warning" href="{{ route('department.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>

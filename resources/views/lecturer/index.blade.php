<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="clearfix"></div>
    <a class="btn btn-primary mb-3" href="{{ route('lecturer.create') }}" role="button">Create</a>
    <form action="{{ route('lecturer.index') }}" method="GET" class="mb-3">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search lecturer's name ... " value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select class="form-select"
                    class="form-control" 
                    name="department_id">
                    <option value="">Semua Program Studi</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>
    <ul class="list-group">
        @foreach ($lecturers as $lecturer)
            <li class="list-group-item">
                {{ $lecturers->firstItem() + $loop->index }}, {{ $lecturer->name }} -- {{ $lecturer->department->name }}
                <a class="btn btn-warning btn-sm" href="{{ route('lecturer.edit', $lecturer) }}"
                    role="button">Edit</a>
                <form action="{{ route('lecturer.destroy', $lecturer) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $lecturers->links() }}
</x-app>

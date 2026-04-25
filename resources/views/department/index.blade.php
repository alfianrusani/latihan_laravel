<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="clearfix"></div>
    <a class="btn btn-primary mb-3" href="{{ route('department.create') }}" role="button">Create</a>
    <ul class="list-group">
        @foreach ($department as $department)
            <li class="list-group-item">
                {{ $loop->iteration }}, {{ $department->name }}
                <a class="btn btn-warning btn-sm" href="{{ route('department.edit', $department) }}" role="button">Edit</a>
                <form action="{{ route('department.destroy', $department) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app>


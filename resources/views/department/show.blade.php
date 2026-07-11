<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('department.index') }}" role="button">Back</a>

    {{-- Department --}}
    <h6>Data Department</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Name: {{ $department->name }}</li>
        <li class="list-group-item">Created At: {{ $department->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $department->updated_at->diffForHumans() }}</li>
    </ul>
    {{-- Lecturers --}}
    <h6>Data Lecturers</h6>
    <ul class="list-group">
        @foreach ($department->lecturers as $lecturer)
            <li class="list-group-item">{{ $lecturer->name }}</li>
        @endforeach
    </ul>
</x-app>

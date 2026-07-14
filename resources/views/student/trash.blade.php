<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <ul class="list-group">
        @forelse ($students as $student)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $student->nim }} {{ $student->name }} -- {{ $student->gender }}

                <form action="{{ route('student.restore', $student) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Mengembalikan Data?')">Restore</button>
                </form>

                <form action="{{ route('student.forceDelete', $student) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin ingin Menghapus Secara Permanen?')">Force Delete</button>
                </form>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">
                Data masih kosong
            </li>
        @endforelse
    </ul>
</x-app>

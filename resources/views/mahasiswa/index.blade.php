@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
            <div class="float-left my-2">
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    <input class="form-control" type="text" name="search" id="search"
                    placeholder="Cari Mahasiswa ..." value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-error">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <!--<th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Alamat</th>-->
            <th>Foto</th>
            <th width="320px">Action</th>
        </tr>

        @foreach ($paginate as $mhs)
        <tr>
            <td>{{ $mhs ->nim }}</td>
            <td>{{ $mhs ->nama }}</td>
            <td>{{ $mhs ->kelas->nama_kelas }}</td>
            <td>{{ $mhs ->jurusan }}</td>
            <!--<td>{{ $mhs ->tgl_lahir }}</td>
            <td>{{ $mhs ->email }}</td>
            <td>{{ $mhs ->alamat }}</td>-->
            <td><img style="width: 50px; overflow: hidden" class="rounded-circle" src="{{ asset('./storage/'. $mhs->foto) }}" alt=""></td>
            <td>
                <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-warning" href="/mahasiswa/nilai/{{ $mhs->nim }}">Nilai</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    Current Page: {{ $paginate->currentPage() }}<br>
    Jumlah Data: {{ $paginate->total() }}<br>
    <!--Data Halaman: {{ $paginate->perPage() }}<br>-->
    <br>
    {{ $paginate->links() }}

@endsection
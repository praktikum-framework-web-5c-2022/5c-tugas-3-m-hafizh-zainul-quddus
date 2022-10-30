@extends('layout.master')
@section('judul_halaman','Dosen')
@section('active1','active')
@section('judul','Dosen')
@section('isi')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif

<a href="{{route('dosens.create')}}" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-bordered border-dark table-hover">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>NIDN</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>ttl</th>
        <th>Foto</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse ($dosens as $dosen)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dosen->nidn}}</td>
            <td>{{$dosen->nama}}</td>
            <td>{{$dosen->jenis_kelamin}}</td>
            <td>{{$dosen->alamat}}</td>
            <td>{{$dosen->ttl}}</td>
            <td>
                <img src="{{asset('storage/dosen/'. $dosen->photo)}}" alt="" style="height:50px; width:50px;">
            <td>
                <a href="{{route('dosens.edit', ['dosen' => $dosen->id])}}" class="btn btn-warning">Update</a>
                <form action="{{route('dosens.destroy', ['dosen' => $dosen->id])}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <td colspan="8">Tidak Ada Data</td>
        @endforelse
    </tbody>
</table>
@endsection





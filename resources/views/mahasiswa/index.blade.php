@section('title','Data')
  
@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-lg-10">
            <h1>Daftar Mahasiswa</h1>
            <a href="/mahasiswa/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Skor</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mahasiswa as $mhs)
                <tr>
                <!-- $loop->iteration -->
                    <td scope="row">{{$loop->iteration}}.</td>
                    <td scope="row">{{$mhs->nama}}</td>
                    <td scope="row">{{$mhs->NIM}}</td>
                    <td scope="row">{{$mhs->skor}}</td>
                    <td>
                        <button type="submit" class="badge badge-success"><a href="/mahasiswa/edit/{{$mhs->NIM}}" style="color:white">edit</a></button>
                        <form action="/mahasiswa/{{$mhs->NIM}}" method="post" class="d-inline">
                            {{method_field('delete')}}
                            {{ csrf_field() }}
                            <button type="submit" class="badge badge-danger">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <label for="max" class="ml-4">Skor Maksimum: <b>{{$max}}</b></label>
            <label for="min" class="ml-4">Skor Minimum: <b>{{$min}}</b></label>
            <label for="rata" class="ml-4">Skor rata-rata: <b>{{$rata}}</b></label>
            <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-header"><h2>Frekuensi</h2></div>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Skor</th>
                            <th scope="col">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($frekuensi as $skor)
                        <tr>
                            <td scope="row">{{$loop->iteration}}.</td>
                            <td scope="row">{{$skor->skor}}</td>
                            <td scope="row">{{$skor->frekuensi}}</td>
                        </tr>
                        @endforeach
                </table>
                <label for="totalskor" class="ml-4"><b>Total Skor: {{$totalskor}}</b></label>
                <label for="totalfrekuensi" class="ml-4"><b>Total Data: {{$totalfrekuensi}}</b></label>
            </div>
        </div>
    </div>
@endsection
  
@section('title','Data')
  
@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-lg-10">
            <h1>Daftar Mahasiswa</h1>
            <hr>
            <h1>Input Data</h1>
            <br>
            <form method="post"action="/mahasiswa">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old ('nama')}}">
                </div>
                <div class="form-group">
                    <label for="NIM" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="NIM" placeholder="NIM" value="{{old ('NIM')}}">
                </div>
                <div class="form-group">
                    <label for="skor" class="form-label">Skor</label>
                    <input type="text" class="form-control" name="skor" placeholder="Skor" value="{{old ('skor')}}">
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="submit" class="btn btn-default" style="background-color:brown; color:white;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
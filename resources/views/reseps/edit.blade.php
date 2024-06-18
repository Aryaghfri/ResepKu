@extends('layouts.app')

@section('title', 'Edit Resep')

@section('content')
<div class="container">
    <h1>Edit Resep</h1>
    <form action="{{ route('reseps.update', $resep->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_masakan">Nama Masakan</label>
            <input type="text" name="nama_masakan" class="form-control" value="{{ $resep->nama_masakan }}" required>
        </div>

        <div class="form-group">
            <label for="penjelasan_singkat">Penjelasan Singkat</label>
            <textarea name="penjelasan_singkat" class="form-control" required>{{ $resep->penjelasan_singkat }}</textarea>
        </div>

        <div class="form-group">
            <label for="berapa_sajian">Berapa Sajian</label>
            <input type="text" name="berapa_sajian" class="form-control" value="{{ $resep->berapa_sajian }}" required>
        </div>

        <div class="form-group">
            <label for="waktu_memasak">Waktu Memasak</label>
            <input type="text" name="waktu_memasak" class="form-control" value="{{ $resep->waktu_memasak }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $resep->kategori }}" required>
        </div>

        <div class="form-group">
            <label for="rincian_bahan">Rincian Bahan</label>
            <textarea name="rincian_bahan" class="form-control" required>{{ $resep->rincian_bahan }}</textarea>
        </div>

        <div class="form-group">
            <label for="cara_memasak">Cara Memasak</label>
            <textarea name="cara_memasak" class="form-control" required>{{ $resep->cara_memasak }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection

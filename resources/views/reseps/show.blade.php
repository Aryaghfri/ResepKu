@extends('layouts.app')

@section('title', $resep->nama_masakan)

@section('content')
<div class="recipe-wrapper">
    <div class="recipe-header">
        <h1>{{ $resep->nama_masakan }}</h1>
    </div>
    <div class="recipe-content">
        <div class="recipe-image-wrapper">
            <div class="recipe-image-box">
                <img src="{{ asset('images/' . $resep->foto_makanan) }}" alt="{{ $resep->nama_masakan }}">
            </div>  
        </div>
        <div class="recipe-info">
            <p><strong>Penjelasan Singkat:</strong> {{ $resep->penjelasan_singkat }}</p>
            <p><strong>Berapa Sajian:</strong> {{ $resep->berapa_sajian }}</p>
            <p><strong>Waktu Memasak:</strong> {{ $resep->waktu_memasak }}</p>
            <p><strong>Kategori:</strong> {{ $resep->kategori }}</p>
        </div>
    </div>
    <div class="recipe-details">
        <div class="recipe-ingredients">
            <h2>Bahan</h2>
            <ul>
                @foreach(explode(',', $resep->rincian_bahan) as $bahan)
                    <li>{{ $bahan }}</li>
                @endforeach
            </ul>
        </div>
        <div class="recipe-steps">
            <h2>Cara Membuat</h2>
            <ol>
                @foreach(explode(',', $resep->cara_memasak) as $langkah)
                    <li>{{ $langkah }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="recipe-actions">
            <a href="{{ route('reseps.edit', $resep->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('reseps.destroy', $resep->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')">Hapus</button>
            </form>
        </div>
</div>
@endsection


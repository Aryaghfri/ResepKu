@extends('layouts.app')

@section('title', 'Daftar Resep')

@section('content')
<div class="app-container">
<div class="resep-box">
<div id="recipeCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#recipeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#recipeCarousel" data-slide-to="1"></li>
        <li data-target="#recipeCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/slide1.svg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/slide2.svg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/slide3.svg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</div>
    
<h1 class="page-title">Resep Anda</h1>
        <p class="page-description">Menginspirasi Masakan Rumah, Menghadirkan Rasa Istimewa!</p>
        <div class="recipe-grid">
            @foreach($reseps as $resep)
                <div class="recipe-card">
                    <a href="{{ route('reseps.show', $resep->id) }}">
                        <img src="{{ asset('images/' . $resep->foto_makanan) }}" class="recipe-image" alt="{{ $resep->nama_masakan }}">
                        <div class="recipe-info">
                            <h3 class="recipe-title">{{ $resep->nama_masakan }}</h3>
                        </div>
                    </a>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

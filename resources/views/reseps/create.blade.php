@extends('layouts.app')

@section('title', 'Bagikan Resep')

@section('content')
<div class="app-container">
    <div class="upload-container">
        <h1>Bagikan resep andalanmu</h1>
        <form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group upload-section">
                <div class="upload-box" onclick="document.getElementById('upload-photo').click();">
                    <div class="upload-icon">
                        <img src="{{ asset('images/upload_icon.svg') }}" alt="Upload Icon">
                    </div>
                    <p>Unggah foto maksimal 2 MB</p>
                </div>
                <div class="upload-details">
                    <p>Unggah foto masakanmu</p>
                    <div class="upload-button">
                        <input type="file" id="upload-photo" name="foto_makanan" style="display: none;" onchange="updateFileName(this)">
                        <button type="button" onclick="document.getElementById('upload-photo').click();">Unggah</button>
                    </div>
                    <p id="file-name">No file chosen</p>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_masakan">Nama masakan:</label>
                <input type="text" id="nama_masakan" name="nama_masakan" maxlength="255" placeholder="Ketik nama masakanmu (Maks. 255 karakter)">
            </div>
            <div class="form-group">
                <label for="penjelasan_singkat">Penjelasan singkat:</label>
                <textarea id="penjelasan_singkat" name="penjelasan_singkat" placeholder="Tulis cerita menarik di balik resep ini"></textarea>
            </div>
            <div class="form-group horizontal-group">
                <div class="horizontal-item">
                    <label for="berapa_sajian">Berapa sajian?</label>
                    <input type="text" id="berapa_sajian" name="berapa_sajian" placeholder="Masukkan jumlah sajian">
                </div>
                <div class="horizontal-item">
                    <label for="waktu_memasak">Waktu memasak</label>
                    <input type="text" id="waktu_memasak" name="waktu_memasak" placeholder="Masukkan waktu memasak">
                </div>
                <div class="horizontal-item">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="Masukkan kategori">
                </div>
            </div>
            <div class="form-group">
                <label for="rincian_bahan">Masukkan rincian bahan:</label>
                <div id="bahan-container">
                    <div class="ingredient-step">
                        <input type="text" name="rincian_bahan[]" placeholder="Contoh: 2 sdm garam">
                        <button type="button" class="add-btn" onclick="addIngredient(this)">+</button>
                        <button type="button" class="remove-btn" onclick="removeIngredient(this)">x</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cara_memasak">Cara memasak:</label>
                <div id="langkah-container">
                    <div class="ingredient-step">
                        <input type="text" name="cara_memasak[]" placeholder="Contoh: Step 1. Tumis bawang hingga harum.">
                        <button type="button" class="add-btn" onclick="addStep(this)">+</button>
                        <button type="button" class="remove-btn" onclick="removeStep(this)">x</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="submit-btn">Bagikan Sekarang</button>
        </form>
    </div>
</div>
@endsection

<script>
function updateFileName(input) {
    const fileName = input.files[0].name;
    document.getElementById('file-name').innerText = fileName;
}

function updateRemoveButtons() {
    const ingredients = document.querySelectorAll('#bahan-container .ingredient-step');
    const steps = document.querySelectorAll('#langkah-container .ingredient-step');

    ingredients.forEach((ingredient, index) => {
        const removeBtn = ingredient.querySelector('.remove-btn');
        removeBtn.disabled = ingredients.length === 1;
        removeBtn.style.opacity = ingredients.length === 1 ? '0.5' : '1';
    });

    steps.forEach((step, index) => {
        const removeBtn = step.querySelector('.remove-btn');
        removeBtn.disabled = steps.length === 1;
        removeBtn.style.opacity = steps.length === 1 ? '0.5' : '1';
    });
}

function addIngredient(button) {
    const container = document.getElementById('bahan-container');
    const newIngredient = document.createElement('div');
    newIngredient.classList.add('ingredient-step');
    newIngredient.innerHTML = `
        <input type="text" name="rincian_bahan[]" placeholder="Contoh: 2 sdm garam">
        <button type="button" class="add-btn" onclick="addIngredient(this)">+</button>
        <button type="button" class="remove-btn" onclick="removeIngredient(this)">x</button>
    `;
    container.appendChild(newIngredient);
    updateRemoveButtons();
}

function removeIngredient(button) {
    const step = button.parentElement;
    step.remove();
    updateRemoveButtons();
}

function addStep(button) {
    const container = document.getElementById('langkah-container');
    const newStep = document.createElement('div');
    newStep.classList.add('ingredient-step');
    newStep.innerHTML = `
        <input type="text" name="cara_memasak[]" placeholder="Contoh: Step 1. Tumis bawang hingga harum.">
        <button type="button" class="add-btn" onclick="addStep(this)">+</button>
        <button type="button" class="remove-btn" onclick="removeStep(this)">x</button>
    `;
    container.appendChild(newStep);
    updateRemoveButtons();
}

function removeStep(button) {
    const step = button.parentElement;
    step.remove();
    updateRemoveButtons();
}

document.addEventListener('DOMContentLoaded', (event) => {
    updateRemoveButtons();
});
</script>

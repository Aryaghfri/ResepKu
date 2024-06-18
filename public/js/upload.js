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

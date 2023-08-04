const quantityInput = document.getElementById('quantity');
    const btnMinus = document.querySelector('.btn-minus');
    const btnPlus = document.querySelector('.btn-plus');

    btnMinus.addEventListener('click', function () {
        if (quantityInput.value > quantityInput.min) {
            quantityInput.stepDown();
        }
    });

    btnPlus.addEventListener('click', function () {
        const currentValue = parseInt(quantityInput.value);
        const maxValue = parseInt(quantityInput.max);
        if (currentValue < maxValue) {
            quantityInput.value = currentValue + 1;
        }
    });
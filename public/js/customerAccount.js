let isEditMode = false;
let originalValues = [];

function toggleEditMode() {
    const button = document.querySelector('button[onclick="toggleEditMode()"]');
    const dl = document.querySelector('dl');
    const fields = dl.querySelectorAll('dd, input');

    const fieldNames = [
        'full_name',
        'phone_number',
        'street',
        'city',
        'province',
        'zip_code'
    ];
    let fieldIndex = 0;

    if (!isEditMode) {
        originalValues = [];

        fields.forEach(field => {
            if (field.hasAttribute('data-no-edit')) return;

            if (field.tagName === 'DD') {
                const value = field.innerText.trim();
                originalValues.push(value);

                const input = document.createElement('input');
                input.type = 'text';
                input.value = value;
                input.name = fieldNames[fieldIndex++];
                input.className = 'mt-1 w-full px-2 py-1 border border-gray-300 rounded-md text-sm';

                field.replaceWith(input);
            }
        });

        const actionContainer = document.getElementById('form-actions');
        if (actionContainer) actionContainer.classList.remove('hidden');

        button.innerHTML = '<i data-lucide="x" class="w-4 h-4"></i> Cancel';
        isEditMode = true;

    } else {
        const inputs = dl.querySelectorAll('input');
        inputs.forEach((input, index) => {
            const dd = document.createElement('dd');
            dd.className = 'font-medium';
            dd.textContent = originalValues[index] || '';

            input.replaceWith(dd);
        });

        const actionContainer = document.getElementById('form-actions');
        if (actionContainer) actionContainer.classList.add('hidden');

        button.innerHTML = '<i data-lucide="pencil-line" class="w-4 h-4"></i> Edit Info';
        isEditMode = false;
    }

    if (window.lucide) lucide.createIcons();
}

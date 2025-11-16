function setAmount(value) {
    document.getElementById("amountInput").value = value;
}

document.addEventListener("DOMContentLoaded", () => {
    const categorySelect = document.getElementById("categorySelect");
    const descriptionInput = document.getElementById("descriptionInput");
    const categoryInfo = document.getElementById("categoryInfo");

    if (!categorySelect || !descriptionInput || !categoryInfo) return;

    categorySelect.addEventListener("change", () => {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const defaultDesc = selectedOption.dataset.default || "";
        const infoText = selectedOption.dataset.info || "";

        descriptionInput.value = defaultDesc;
        categoryInfo.textContent = infoText;

        if (defaultDesc) {
            descriptionInput.classList.add("bg-warning-subtle");
            setTimeout(() => descriptionInput.classList.remove("bg-warning-subtle"), 300);
        }
    });

    categorySelect.addEventListener("change", () => descriptionInput.focus());
});
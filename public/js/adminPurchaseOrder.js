    function toggleQty(checkbox) {
    const qtyInput = checkbox.closest('tr').querySelector('input[type=number]');
    qtyInput.disabled = !checkbox.checked;
}

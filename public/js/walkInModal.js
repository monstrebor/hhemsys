    document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const totalInput = document.querySelector('input[name="total_amount"]');

    checkboxes.forEach(checkbox => {
        const qtyInput = checkbox.closest('.form-check').querySelector('.qty-input');
        const price = parseFloat(checkbox.closest('.card').querySelector('input[type="hidden"]').value);

        checkbox.addEventListener('change', function() {
            qtyInput.classList.toggle('d-none', !this.checked);
            computeTotal();
        });

        qtyInput.addEventListener('input', computeTotal);
    });

    function computeTotal() {
        let total = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const qtyInput = checkbox.closest('.form-check').querySelector('.qty-input');
                const price = parseFloat(checkbox.closest('.card').querySelector('input[type="hidden"]').value);
                total += (price * parseInt(qtyInput.value || 0));
            }
        });
        totalInput.value = total.toFixed(2);
    }
});

function printReceipt(id) {
    const modalContent = document.querySelector(`#receiptModal${id} .modal-content`).innerHTML;
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(`
        <html>
            <head>
                <title>Receipt #${id}</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            </head>
            <body onload="window.print()">
                ${modalContent}
            </body>
        </html>
    `);
    printWindow.document.close();
}

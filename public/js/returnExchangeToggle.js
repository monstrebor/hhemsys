function toggleExchangeProducts(id) {
    const type = document.getElementById('typeSelect'+id).value;
    const div = document.getElementById('exchangeProducts'+id);
    div.classList.toggle('hidden', type !== 'exchange');
}
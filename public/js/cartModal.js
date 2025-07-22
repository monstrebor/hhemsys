  function openCartModal(id, name, image, stock) {
    document.getElementById('cart-product-id').value = id;
    document.getElementById('cart-product-name').innerText = name;
    document.getElementById('cart-product-image').src = image;
    document.getElementById('cart-product-stock').innerText = stock;

    const alpineRoot = document.querySelector('#cartModal .modal-content');
    if (alpineRoot && alpineRoot.__x) {
        alpineRoot.__x.$data.qty = 1;
    }

    const modal = new bootstrap.Modal(document.getElementById('cartModal'));
    modal.show();
  }

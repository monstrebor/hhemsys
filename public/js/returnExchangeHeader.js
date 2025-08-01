    function filterOrders() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        document.querySelectorAll("#ordersTable tbody tr").forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
        });
    }

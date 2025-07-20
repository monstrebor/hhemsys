(function () {
    let logoutTimer;

    function autoLogout() {
        fetch('/logout', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        }).then(() => {
            window.location.href = "/";
        }).catch((err) => {
            console.error("Logout failed:", err);
        });
    }

    function resetTimer() {
        clearTimeout(logoutTimer);
        logoutTimer = setTimeout(autoLogout, 30 * 1000); // 30 seconds for testing
    }

    ['click', 'mousemove', 'keydown', 'scroll', 'touchstart'].forEach(event => {
        window.addEventListener(event, resetTimer);
    });

    resetTimer();
})();
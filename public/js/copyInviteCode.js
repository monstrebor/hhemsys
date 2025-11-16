function copyInviteCode() {
    const text = document.getElementById('inviteCode').innerText.trim();
    const btn = document.getElementById('copyBtn');

    navigator.clipboard.writeText(text).then(() => {

        btn.innerText = "Copied!";
        btn.classList.remove("btn-outline-secondary");
        btn.classList.add("btn-success");

        setTimeout(() => {
            btn.innerText = "Copy";
            btn.classList.remove("btn-success");
            btn.classList.add("btn-outline-secondary");
        }, 1500);

    });
}
function toggleVisibility(id) {
    const input = document.getElementById(id);
    const iconShow = document.getElementById(id + '_show');
    const iconHide = document.getElementById(id + '_hide');

    if (input.type === 'password') {
        input.type = 'text';
        iconShow.classList.add('hidden');
        iconHide.classList.remove('hidden');
    } else {
        input.type = 'password';
        iconShow.classList.remove('hidden');
        iconHide.classList.add('hidden');
    }
}
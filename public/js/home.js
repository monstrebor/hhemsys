    function toggleForms() {
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        loginForm.classList.toggle('hidden');
        registerForm.classList.toggle('hidden');
    }

        function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.06
                         10.06 0 012.04-3.362m3.084-2.64A9.956 9.956 0 0112 5c4.477 0
                         8.268 2.943 9.542 7a10.02 10.02 0 01-4.132 5.045M15 12a3
                         3 0 11-6 0 3 3 0 016 0zm-6.364 6.364L21 3" />
            `;
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0
                         8.268 2.943 9.542 7-1.274 4.057-5.065
                         7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }

        const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const textElements = document.querySelectorAll('.sidebar-text');

    let isExpanded = false;

    toggleBtn.addEventListener('click', () => {
        isExpanded = !isExpanded;
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-16');

        textElements.forEach(el => {
            if (isExpanded) {
                el.classList.remove('hidden');
                el.classList.add('inline');
            } else {
                el.classList.remove('inline');
                el.classList.add('hidden');
            }
        });
    });


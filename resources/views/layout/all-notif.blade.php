<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3 mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-circle-check fa-lg me-2 text-success"></i>
                <div>
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3 mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-circle-check fa-lg me-2 text-success"></i>
                <div>
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3 mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-triangle-exclamation fa-lg me-2 text-danger"></i>
                <div>
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show shadow-sm border-0 rounded-3 mb-2" role="alert">
            <div class="d-flex align-items-start">
                <i class="fa-solid fa-circle-exclamation fa-lg me-2 text-warning mt-1"></i>
                <div>
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul class="mt-2 mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <script>
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 10000);
    </script>
</div>
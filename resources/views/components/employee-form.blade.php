<div class="form-container">
    <h2 class="mb-4">Create New Employee</h2>
    <div id="success-message" class="alert alert-success" style="display: none;"></div>
    <form action="{{ route('employees.create') }}" method="POST" id="employee-form">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>

    <script>
        document.getElementById('employee-form').addEventListener('submit', function(e) {
            e.preventDefault();
            fetch('{{ route('employees.create') }}', {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    const message = document.getElementById('success-message');
                    if (data.success) {
                        message.textContent = 'Employee created successfully';
                        message.style.display = 'block';
                    } else {
                        message.textContent = Object.keys(data.error.fields)?.map(field => data.error.fields[field]).join(', ') || 'An error occurred';
                        message.classList.add('alert-danger');
                        message.style.display = 'block';
                    }
                    this.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</div>
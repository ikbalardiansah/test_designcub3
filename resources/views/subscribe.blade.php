<!DOCTYPE html>
<html>

<head>
    <title>Tugas 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col-md-6 m-auto">
            <div class="card p-4 m-4 bg-primary fw-bold text-white">
                <h1>Email Subscription</h1>
                <form method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" minlength="10"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Subscribe</button>
                </form>

                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                @endif

                @if (session('email'))
                    <div class="alert alert-info mt-4">
                        <strong>Email:</strong> {{ session('email') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>

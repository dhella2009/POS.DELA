@vite(['resources/css/app.css', 'resources/js/app.js'])

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background-color: #fdf2f8; /* sama kayak dashboard */
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .card {
        background: #ffffff;
        border: 1px solid #f5a9c8;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(244,114,182,0.2);
    }

    .card-header {
        background-color: transparent;
        color: #1a1a1a;
        border-bottom: 1px solid #f5a9c8;
        border-radius: 16px 16px 0 0;
        font-weight: 600;
    }

    .form-label {
        color: #1a1a1a;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-pink {
        background-color: #f9a8d4;
        color: #ffffff;
        border: 1px solid #f472b6;
    }

    .btn-pink:hover {
        background-color: #f472b6;
        color: #ffffff;
    }
</style>

<div class="card text-center position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
    <h5 class="card-header">LOGIN POS</h5>
    <div class="card-body">
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <div class="badge text-bg-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                id="exampleInputPassword1">
                @error('password')
                    <div class="badge text-bg-danger">{{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-pink">Submit</button>
        </form>
    </div>
</div>
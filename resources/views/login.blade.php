@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    body {
        background-color: #f8c8dc; /* background pink */
    }

    .card {
        background-color: transparent;
        border: 1px solid #f5a9c8;
    }

    .card-header {
        background-color: transparent;
        color: #ff69b4;
        border-bottom: 1px solid #f5a9c8;
    }

    .form-label {
        color: #ff69b4;
    }

    .btn-pink {
        background-color: #f8c8dc;
        color: #ff69b4;
        border: 1px solid #f5a9c8;
    }

    .btn-pink:hover {
        background-color: #f5b6d1;
        color: #ff69b4;
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
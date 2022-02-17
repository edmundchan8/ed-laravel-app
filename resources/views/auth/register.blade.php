@extends ('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="bg-light w-25 p-3 rounded mt-3">
            <form action="{{ route('register') }}" method="POST" class="d-flex flex-column">
                <!-- Cross Site Request Forgery helper, always use this for security -->
                @csrf
                <div class="mb-4 form-group">
                    <!-- <label for="name" class="sr-only sr-only-focusable">Name</label> -->
                    <input type="text" name="name" id="name" placeholder="Enter your name"
                    class="text-dark border border-secondary rounded p-1 form-control @error('name')
                    border-danger @enderror" value="{{ old('name') }}">
                    @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-4 form-group">
                    <!-- <label for="username" class="sr-only">Username</label> -->
                    <input type="text" name="username" id="username" placeholder="Enter a Username"
                    class="text-dark border border-secondary rounded p-1 form-control @error('username')
                    border-danger @enderror" value="{{ old('username') }}">
                    @error('username')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-4 form-group">
                    <!-- <label for="email" class="sr-only">Email</label> -->
                    <input type="text" name="email" id="email" placeholder="Enter an email"
                    class="text-dark border border-secondary rounded p-1 form-control @error('email')
                    border-danger @enderror" value="{{ old('email') }}">
                    @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-4 form-group">
                    <!-- <label for="password" class="sr-only">Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter a password"
                    class="text-dark border border-secondary rounded p-1 form-control @error('password')
                    border-danger @enderror" value="">
                    @error('password')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-4 form-group">
                    <!-- <label for="password_confirmation" class="sr-only">Confirm Password</label> -->
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your Password"
                    class="text-dark border border-secondary rounded p-1 form-control" value="">
                </div>
                <input type="submit" value="Register" class="btn btn-primary rounded" />
            </form>
        </div>
    </div>
@endsection
@extends ('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="bg-light w-25 p-3 rounded mt-3">
            {{-- session status to grab login/auth issues --}}
            @if (session('status'))
                <div class="text-danger h5 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="d-flex flex-column">
                <!-- Cross Site Request Forgery helper, always use this for security -->
                @csrf
                <div class="mb-4 form-group">
                    <!-- <label for="username" class="sr-only">Username</label> -->
                    <input type="text" name="email" id="email" placeholder="Enter your email"
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
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember Me</label>
                </div>
                <input type="submit" value="Login" class="btn btn-primary rounded" />
            </form>
        </div>
    </div>
@endsection
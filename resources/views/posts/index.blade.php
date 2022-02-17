@extends ('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="bg-white w-50 p-3 rounded mt-2">
            <form action="{{ route('posts') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="body" id="body" cols="30" rows="4" class="border 
                    w-100 p-3 bg-light rounded @error('body') border-danger @enderror"
                    placeholder="Post Something!"></textarea>

                @error('body')
                    <div class="text-warning">
                        {{ message }}
                    </div> 
                @enderror
                </div>
                <div>
                    <button type="submit" class="bg-primary text-white rounded px-4 py-2">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
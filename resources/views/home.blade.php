@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body"> 
                    <a href= "{{ route('message.create') }}"
                    class= "btn btn-primary">create message</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <table class="table">
                        <thead>
                        <tr><th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Content</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key => $message)
                        <tr>
                            <th >{{ $key+1 }} </th>
                            <th scope="row">{{$message -> user -> name }}</th>
                            <th>{{ $message ->content }} </th>
                            <th> 
                            <a href="{{route('message.edit', $message) }}"class= "btn btn-primary">Edit message</a>
                            </th>

                            <th> 
                            <form method="post" action="{{route('message.destroy', $message) }}" >
                                @csrf 
                                @method('delete')
                                <div><button type="submit" class="btn btn-danger">Delete</button></div> 
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

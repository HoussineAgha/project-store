@extends('admin.frontend.layout.app')

@section('title:login')

@section('content')

@php
    $setting = App\Models\Setting::select('logo')->get();
@endphp

<body class="text-center" >
    <div class="container" style="margin-top: 100px;">
        @foreach ($setting as $item)
        <img src="{{asset($item->logo)}}" height="150px" width="200px" style="margin-bottom: 50px";>
        @endforeach
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                @include('shared.error')
                <form class="form-signin" action="{{route('login.admin')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

</body>
@endsection

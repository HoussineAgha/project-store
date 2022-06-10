@extends('layout.app')

@section('title','login')

@section('content')
<body class="body1">
    <div class="container">
        <form class="row g-3" id="form1" method="POST" action="/user/selectlogin">
            @csrf
            <div class="col-4" id="login">
            <div class="creat">
                @include('shared.error')
                    <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email"  aria-describedby="emailHelp" value="{{ old('email') }}" >
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto" id="btn1">
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</body>
@endsection

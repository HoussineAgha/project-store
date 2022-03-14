@extends('front customer.customer store.layout.app')

@section('title','registar')

@section('content3')
<body class="body1">
        <form class="row g-3" id="form1" method="POST" action="/stores/{{$store->id}}/client/registar">
            @csrf
            <div class="col-4" id="login">
            <div class="creat">
                @include('shared.error')
                    <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input name="fullname" type="text" class="form-control" id="fullname"  aria-describedby="emailHelp" value="{{ old('email') }}" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                    <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input name="phone" type="number" class="form-control" id="phone" required>
                        </div>
                    <div class="d-grid gap-2 col-6 mx-auto" id="btn1">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
            </div>
        </div>
        </form>
</body>
@endsection

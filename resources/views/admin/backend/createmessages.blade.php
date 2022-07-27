@extends('admin.backend.layout.app')

@section('title','Creat Message')

@section('style')
    <style>
        .form-control{
            border: 0.1px solid;
        }
        .input-group .input-group-text{
            left: 0;
        }

        .form-check-label{
            font-weight: 700;
            color: black;
        }
        .alert-success{
            color: white;
            width: 50%;
        }
        .send{
            text-align: center;
            margin-top:50px;
        }
        .form-select{
            border: 1px solid black;
        }
        .label, .form-label{
            color: black;
        }
    </style>

@endsection

@section('content')
    <div class="row">
        <div class="send">
            <h6> You can send a message to all users or select a user</h6>
        </div>
        <div class="col-2">

        </div>
        <div class="col-8">
            <form method="POST" action="{{route('admin.creatmessagestore')}}">
                @csrf
                <label for="Choose_Type" class="form-label">Choose Type</label>
                <select name="Choose_Type" id="Choose_Type" class="form-select" aria-label="Default select example">
                    <option name="alluser" id="alluser" value="alluser" selected>All User</option>
                    <option name="special" id="special" value="special" >Special User</option>
                  </select>

                  <div id="user">
                    <label for="specialuser" class="form-label">Select User</label>
                    <select name="specialuser" id="specialuser" class="form-select" aria-label="Default select example">
                        @foreach ($users as $item)
                        <option name="specialuser"  value="{{$item->id}}" >{{$item->first_name}} {{$item->last_name}}</option>
                        @endforeach

                      </select>
                  </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="discription" class="form-label">Message</label>
                    <textarea name="discription" class="form-control" id="discription" rows="3" required></textarea>
                  </div>

                <div class="d-grid gap-2 col-6 mx-auto" id="btn1">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
        <div class="col-2">

        </div>
    </div>
@endsection

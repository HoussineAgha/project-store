<?php
$message=[
    'creat_store'=>'success',
    'register'=>'thank you for register',
    'login'=>'thank you for login'
]

?>

@if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>

        @else
            <?php return $message ;  ?>
        @endif



@if (isset($errors) && count($errors))
    <div class="alert alert-danger " style='max-width:500px;margin-left:auto;margin-right:auto;'>
        <strong>对不起，但有一个错误:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

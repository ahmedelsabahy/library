@if($errors->any() )
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $value)
        <p> {{ $value }} </p>
    @endforeach
</div>
@endif
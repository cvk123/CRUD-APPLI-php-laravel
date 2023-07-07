@if($message=Session::get("success"))
    <div class="alert alert-success aler-block">
        <strong>{{$message}}</strong>
    </div>
@endif
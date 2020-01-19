@if (Session::has('notification'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{session('notification')}}</p>
  </div>
@endif
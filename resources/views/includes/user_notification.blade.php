@if (Session::has('created_user'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{session('created_user')}}</p>
  </div>
@endif

@if (Session::has('updated_user'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{session('updated_user')}}</p>
  </div>
@endif

@if (Session::has('deleted_user'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{session('deleted_user')}}</p>
  </div>
@endif
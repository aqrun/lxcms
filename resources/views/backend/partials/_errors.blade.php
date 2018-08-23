@if($errors->any())
  <div class="alert alert-danger alert-dismissable">
    <ul class="list-unstyled">
      @foreach ($errors->all() as $error)
        <li><i class="fa fa-remove"></i> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
              
              
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
<?php 

$class_success = Session::get('class_success');

?>

<div class="alert alert-<?php if(Session::has('class_success')){ echo $class_success; }else{ echo 'warning '; }  ?> alert-dismissible fade show" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
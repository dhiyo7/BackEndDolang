<!DOCTYPE html>
<html lang="en">
@include('templates.partials._head')
<body class="sidebar-mini">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo d-flex justify-content-center">
                <!-- <div class="">
                  <img src="{{ asset('asset/images/bengkulu.png')}}" alt="logo">
                </div> -->
              </div>
              @if(session()->has('error'))
              <div class="alert alert-fill-danger" role="alert">
                <i class="mdi mdi-alert-circle"></i>
                {{ session()->get('error') }}
              </div>
              @endif
              <form class="pt-3" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg" value="{{ old('username') }}" placeholder="Username" autofocus>
                  @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" placeholder="Password">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Masuk</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                      Ingat Saya
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{ asset('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('asset/js/template.js')}}"></script>
  <script src="{{ asset('asset/js/settings.js')}}"></script>
  <script src="{{ asset('asset/js/todolist.js')}}"></script>
  <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
  });
  }, 5000);
  </script>


  </body>
</html>

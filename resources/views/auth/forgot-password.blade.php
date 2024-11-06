@extends('auth.index')

@section('body')
 <div id="auth"> 
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{url('storage/assets/compiled/svg/logo.svg')}}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Forgot Password</h1>
                    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

                    <form action="{{route('forgot-password.send-token')}}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Send</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? <a href="{{route('auth.login')}}" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
<script>
    let error_token="{{Session::get('link_error') ?? 'false'}}";
      let success_token="{{Session::get('link_success') ?? 'false'}}";

       if(error_token !== 'false'){
                Swal.fire({
                position: 'top-center',
                width: 650,
                icon: 'error',
                title: error_token,
                showConfirmButton: false,
                timer: 5000
            });
        }

        if(success_token !== 'false'){
              Swal.fire({
                // position: 'top-end',
                width: 600,
                icon: 'success',
                title: success_token,
                showConfirmButton: false,
                timer: 2000
            });
        }
</script>
@endpush
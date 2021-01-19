@extends('auth.layouts.index')

@section('wrapper')
    <section id="wrapper">
        <div class="login-register"
             style="background-image:url({{ asset('assets/images/background/login-register.jpg')  }});">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="{{ route('login')  }}"
                          method="post">
                        @csrf
                        <h3 class="box-title m-b-20">Sign In To Your App!</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" autofocus type="text" required="" name="email" placeholder="Email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                       autocomplete="current-password" type="password" required=""
                                       placeholder="Password"></div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="checkbox-signup" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

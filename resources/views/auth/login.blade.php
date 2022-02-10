@extends('layouts.app')

@section('content')

	<section class="fxt-template-animation fxt-template-layout4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-12 fxt-bg-wrap">
					<div class="fxt-bg-img" data-bg-image="">
						<div class="fxt-header">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<a href="login-4.html" class="fxt-logo"><img src= {{ asset('asset/login/img/inova2.png') }}   alt="Logo"></a>
							</div>
							<div class="fxt-transformY-50 fxt-transition-delay-2">
								<h1>Welcome To Klinik hehe</h1>
							</div>
							<div class="fxt-transformY-50 fxt-transition-delay-3">
								<p>Klinik ini menyediakan solusi untuk kesehatan anda gaskan daftar!</p>
							</div>
						</div>
						<ul class="fxt-socials">
							<li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4"><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-5"><a href="#" title="twitter"><i class="fab fa-twitter"></i></a></li>
							<li class="fxt-google fxt-transformY-50 fxt-transition-delay-6"><a href="#" title="google"><i class="fab fa-google-plus-g"></i></a></li>
							<li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-7"><a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							<li class="fxt-youtube fxt-transformY-50 fxt-transition-delay-8"><a href="#" title="youtube"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-12 fxt-bg-color">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
					<div class="fxt-content">
						<div class="fxt-form">
							<form method="POST">
								<div class="form-group">
									<label for="email" class="input-label">Email Address</label>
									<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email"  required="required">
								</div>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<div class="form-group">
									<label for="password" class="input-label">Password</label>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" name="password"  required="required">
									<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
								<div class="form-group">
									<div class="fxt-checkbox-area">
										<div class="checkbox">
											<input id="checkbox1" type="checkbox">
											<label for="checkbox1">Keep me logged in</label>
										</div>
										<a href="forgot-password-4.html" class="switcher-text">Forgot Password</a>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="fxt-btn-fill">  {{ __('Login') }} </button>
								</div>
                                
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
							</form>
						</div>
						<div class="fxt-footer">
							<p>Don't have an account?<a href="register-4.html" class="switcher-text2 inline-text">Register</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection

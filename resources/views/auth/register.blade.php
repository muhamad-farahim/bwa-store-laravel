@extends('layouts.auth')

@section('title')

Store Register Page
    
@endsection


@section('content')
<div class="page-content page-auth" id="register">
  <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center justify-content-center row-login">
        <div class="col-lg-4">
          <h2>Memulai untuk jual beli dengan cara terbaru</h2>
          <form class="mt-3">
            <div class="form-group">
              <label>Full name</label>
              <input
                type="text"
                class="form-control is-valid"
                v-model="name"
                autofocus
              />
            </div>
            <div class="form-group">
              <label>Email adress</label>
              <input
                type="email"
                class="form-control is-invalid"
                v-model="email"
              />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" />
            </div>
            <div class="form-group">
              <label>Store</label>
              <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
              <div
                class="custom-control custom-radio custom-control-inline"
              >
                <input
                  type="radio"
                  name="is_store_open"
                  id="openStoreTrue"
                  v-model="is_store_open"
                  :value="true"
                  class="custom-control-input"
                />
                <label for="openStoreTrue" class="custom-control-label"
                  >Iya, boleh</label
                >
              </div>
              <div
                class="custom-control custom-radio custom-control-inline"
              >
                <input
                  type="radio"
                  name="is_store_open"
                  id="openStoreFalse"
                  v-model="is_store_open"
                  :value="false"
                  class="custom-control-input"
                />
                <label for="openStoreFalse" class="custom-control-label"
                  >Nggak, makasih</label
                >
              </div>
            </div>
            <div class="form-group" v-if="is_store_open">
              <label>Nama Toko</label>
              <input type="text" class="form-control" />
            </div>
            <div class="form-group" v-if="is_store_open">
              <label>Kategori</label>
              <select name="category" id="" class="form-control">
                <option value="" disabled>Pilih Kategori</option>
              </select>
            </div>
            <a
              href="/dashboard.html"
              class="btn btn-success btn-block mt-4"
            >
              Sign Up now
            </a>
            <a href="/dashboard.html" class="btn btn-signup btn-block mt-4">
              Back to sign in
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        @if(config('settings.reCaptchStatus'))
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4">
                                    <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                                <p class="text-center mb-4">
                                    Or Use Social Logins to Register
                                </p>
                                {{-- @include('partials.socials') --}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-scripts')
    
<script src="./vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
  Vue.use(Toasted);

  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      this.$toasted.error(
        "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
        {
          position: "top-center",
          className: "rounded",
          duration: 1000,
        }
      );
    },
    data: {
      name: "Angga Hazza Sett",
      email: "kamujagoan@bwa.id",
      password: "",
      is_store_open: true,
      store_name: "",
    },
  });
</script>

@endpush

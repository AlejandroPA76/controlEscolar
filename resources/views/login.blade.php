<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                      <h1>Iniciar sesion</h1>
                      
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                              <label>Ingresa tu usuario:</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror                            </div>
                            <div class="form-group">
                              <label>Ingresa tu contrasena:</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror                            </div>
                            <div >
                               <a href="" class="float-right">Usuario nuevo?,registrate</a>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                              {{ __('Login') }}
                          </button>
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="admin_assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="admin_assets/img/favicon.png">
  <title>
    Movie Cinema
  </title>
  <base href="{{asset('')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="admin_assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="admin_assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $arr)
                    {{ $arr }}<br>
                    @endforeach
                  </div>
                  @endif
                  @if (session('warning'))
                  <div class="alert alert-warning">
                    {{ session('warning') }}
                  </div>
                  @endif
                  <h4 class="font-weight-bolder">Đăng nhập</h4>
                  <p class="mb-0">Nhập email và mật khẩu để đăng nhập</p>
                </div>
                <div class=" card-body">
                  <form action="admin/sign_in" method="POST" role="form">
                    @csrf

                    <div class="mb-3">
                      <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Nhớ tài khoản</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Đăng nhập</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://easy-peasy.ai/cdn-cgi/image/quality=80,format=auto,width=700/https://fdczvxmwwjwpwbeeqcth.supabase.co/storage/v1/object/public/images/be89cf9d-9ac2-46c9-a91e-16771fa23102/9a48ad6a-04c8-4dc8-9bb9-129e9b53a6b0.png');
               background-size: cover;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @yield('scripts')
</body>

</html>

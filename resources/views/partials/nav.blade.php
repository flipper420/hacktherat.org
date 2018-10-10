    <!-- HEADER NAVBAR -->
    <header :class="{ active: isActive }">
      <nav class="navbar">
        <div class="container-fluid d-flex justify-content-between">
          <div class="mask pseudo">
            <a href="/index.html">
              <img src="/img/logo.png" alt="Navbar logo" class="nav-logo">
            </a>
          </div>
          <div class='nav-right-links d-flex justify-content-between'>
            <form action='/login' id="myLoginForm" method='post'>
              @csrf
              <div id="loginButton" :class="{ active: isLoginActive }">
                  <a href='#' id='login' @click="isLoginActive = !isLoginActive" class='button1'>Login  <i class='fa fa-sign-in fa-custom'></i></a>
                    <div class='modal'>
                      <div class="close-button" v-on:click="isLoginActive = !isLoginActive">x</div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="login-modal d-flex flex-column align-items-center justify-content-between">
                            <div class="form-title text-white">Login</div>
                            <div class="input-group">
                              <input type="text" id="name2" name="username" v-model="username" required>
                              <label for="name2">Username</label>
                            </div>
                            <div class="input-group">
                              <input type="password" id="password2" name="password" v-model="password" required>
                              <label for="password2">Password</label>
                            </div>
                            @if(config('settings.reCaptchStatus'))
                            <div class="input-group">
                              <input type="text" id="captcha2" name="captcha" required>
                              <label for="captcha2">Please Enter Captcha Code</label>
                                {!! captcha_img() !!}
                            </div>
                            @endif
                            </div>
                            <input type="submit" class='form-button' value="Submit">
                          </div>
                        </div>
                      </div>
                    </div>
              </form>
              <a href='#' @click="isActive = !isActive" class='button2 bouncy' style="animation-delay:0.07s">Register <i class='fa fa-user-plus'></i></a>
          </div>
        </div>
      </nav>
    </header>
    <!-- SVG MASK -->
    <svg height="0">
      <mask id="mask-firefox">
      <image width="200" height="60" xlink:href="img/logo.png" filter="url(#filter)"></image>
      </mask>
      <filter id="filter">
      <feFlood flood-color="white"></feFlood>
      <feComposite in2="SourceAlpha" operator="in"></feComposite>
      </filter>
    </svg>

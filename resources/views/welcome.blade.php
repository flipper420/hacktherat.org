@extends('layouts.app')

@section('content')
    <div class="jumbotron-fluid jumbo-hacker d-flex h-100">
      <div class='row d-flex'>
        <div class="col-12 b-50 d-flex align-items-center justify-content-center">
          <div class='col-md-8 d-flex flex-column align-items-center justify-content-center'>
            <div class="mask2 pseudo2">
              <a href="/index.html" class="hover">
                <img src='/img/logo.png' alt='Logo big' class="animated flipInX 2s delay-1s">
              </a>
            </div>
            <p class="text-center text-justify text-white standout">
              Hacktherat aims to provide it's members with a multitude of ways to practice and learn basic and advanced hacking, and programming skills through a series of challenges in a safe and legal environment.
            </p>
            <form action='/register' id="myForm" method='post'>
              @csrf 
              <div id="mainButton" :class="{ active: isActive }">
                <div class="btn-text" @click="isActive = !isActive">Sign Up!</div>
                <div class="modal">
                  <div class="close-button" v-on:click="isActive = !isActive">x</div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="login-modal d-flex flex-column align-items-center justify-content-between">
                        <div class="form-title">Register</div>
                        <div class="input-group">
                          <input type="text" id="name" name="username" v-model="username" required>
                          <label for="name">Username</label>
                        </div>
                        <div class="input-group">
                          <input type="text" id="first_name" name="first_name" v-model="first_name" required>
                          <label for="first_name">First Name</label>
                        </div>
                        <div class="input-group">
                          <input type="text" id="last_name" name="last_name" v-model="last_name" required>
                          <label for="last_name">Last Name</label>
                        </div>
                        <div class="input-group">
                          <input type="text" id="email" name="email" v-model="email" required>
                          <label for="email">Email</label>
                        </div>
                        <div class="input-group">
                          <input type="password" id="password" name="password" v-model="password" required>
                          <label for="password">Password</label>
                        </div>
                        <div class="input-group">
                          <input type="password" id="password2" name="password_confirmation" v-model="password2" required>
                          <label for="password2">Repeat Password</label>
                        </div>
                        @if(config('settings.reCaptchStatus'))
                        <div class="input-group">
                              <input type="text" id="captcha2" name="captcha" required>
                              <label for="captcha2">Please Enter Captcha Code</label>
                                {!! captcha_img() !!}
                        </div>
                        @endif
                        <input type="submit" class='form-button' value="Submit">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card-group">
          <div class="card">
            <img class="card-img-top" src="/img/hacking/hacking (13).jpg" alt="Encryption">
            <div class="card-header text-white text-center">HTR Missions</div>
            <div class="card-body">
              <p class="card-text text-white text-center">Hacktherat offers members a wide array of missions in a multitude of categories ranging from very basic for the newcomers to very advanced for the users who are already know their way around.</p>
            </div>
              <div class="card-footer text-muted text-center"><a href="register.html">Learn more</a></div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/img/hacking/hacking (7).jpg" alt="hacking (7)">
            <div class="card-header text-white text-center">HTR Forums</div>
            <div class="card-body">
              <p class="card-text text-white text-center">Hacktherat Forums are a "meeting-place" where like-minded people get together to converse on a plethora of topics ranging from current events to programming issues to Unix-based operating systems and more.</p>
            </div>
              <div class="card-footer text-muted text-center"><a href="register.html">Learn more</a></div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/img/hacking/hacking (5).jpg" alt="binary">
            <div class="card-header text-white text-center">HTR Library</div>
            <div class="card-body">
              <p class="card-text text-white text-center">Hacktherat Library offers gigabytes of files available for download to HTR members at no cost. Come check out the latest hacking tools, papers, cheatsheets, source code, snippets, e-books, softwares, and much more!</p>
            </div>
              <div class="card-footer text-muted text-center"><a href="register.html">Learn more</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" height="650" src="/img/hacking/hacking (26).jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h1>Stay anonymous!</h1>
                <p>All information stored on HTR, HTR Forums, and HTR Library about you is private and NEVER shared with anyone!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="650" src="/img/hacking/hacking (31).jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h1>100% safe and legal!</h1>
                <p>Hacktherat is 100% completely safe and legal training grounds for hackers and crackers to practice their skills.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="650" src="/img/hacking/hacking (28).jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h1>Access the latest tools, exploits, and papers in the HTR Library!</h1>
                <p>We have gigabytes of hacking tools, exploits, whitepapers, cheatsheets, manuals, tutorials and much more...</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <h4 class="text-center display-5 text-white dashbg-1 p-5 mb-n1">Leaderboards</h4>
          <table class="table table-striped table-dark table-hover">
            <thead>
              <tr class="dashbg-1">
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-6">
          <h4 class="text-center text-white dashbg-3 p-5 mb-n1">Hall of Fame</h4>
          <table class="table table-striped table-dark table-hover">
            <thead>
              <tr class="dashbg-3">
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td >Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <svg height="0">
      <mask id="mask-firefox2">
      <image width="400" height="120" xlink:href="/img/logo.png" filter="url(#filter2)"></image>
      </mask>
      <filter id="filter2">
      <feFlood flood-color="white"></feFlood>
      <feComposite in2="SourceAlpha" operator="in"></feComposite>
      </filter>
    </svg>
@endsection

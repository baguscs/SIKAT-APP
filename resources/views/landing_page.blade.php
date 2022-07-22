<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAT-APP</title>
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="header">
      <nav class="navbar fixed-top navbar-expand-xl menu">
        <div class="container-fluid">
          <a class="navbar-brand nav-brand" href="#">
            <img src="{{ asset('img/icon.png') }}" alt="" width="30" height="30" class="d-inline-block align-text-top img-icon">
            SIKAT
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link nav-menu" href="#home">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-menu" href="#about">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-menu" href="#faq">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-menu" href="#agenda">Agenda</a>
              </li>
            </ul>
            <button type="button" class="btn-login"><a class="btn-href" href="{{ route('loginPage') }}">Login</a></button>
          </div>
        </div>
      </nav>
    </div>
    <a href="#home" type="button" id="btn-up" class="btn-up"><img src="{{ asset('img/up.png') }}" alt="" width="30" class="img-up"></a>
    <div class="container">
      <section class="home" id="home">
        <div class="row row-home">
          <div class="col-xl-7">
            <h1 class="title-home">SIKAT</h1>
            <p class="desc-home">Here at flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
            <button type="button" class="btn-login"><a class="btn-href" href="{{ route('loginPage') }}">Login</a></button>
          </div>
          <div class="col-xl-5">
            <img class="img-home" src="{{ asset('img/amico.png') }}" alt="">
          </div>
        </div>
      </section>
    </div>
    <section class="about" id="about">
      <br><br>
      <div class="container">
        <div class="row about-row">
          <div class="col-xl-6">
            <h1 class="title-about">Apa itu SIKAT?</h1>
            <p class="desc-about">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.Accelerate critical development work, eliminate toil, and deploy changes with ease.</p>
            <div class="fitur-menu">
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur"> Bantuan Sosial</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur"> Agenda</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur"> Aduan Warga</p> 
            </div>
            <p class="desc-about end-content-about">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.</p>
          </div>
          <div class="col-xl-6">
            <img src="{{ asset('img/bro.png') }}" alt="" class="img-about">
          </div>
        </div>
        <div class="row benefit-row">
          <div class="col-xl-6">
            <img src="{{ asset('img/amico2.png') }}" alt="" class="img-about" width="530">
          </div>
          <div class="col-xl-6">
            <h1 class="title-about">Apa manfaat SIKAT?</h1>
            <p class="desc-about">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.Accelerate critical development work, eliminate toil, and deploy changes with ease.</p>
            <div class="fitur-menu">
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur-benefit"> Dynamic reports and dashboards</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur-benefit"> Templates for everyone</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur-benefit"> Development workflow</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur-benefit"> Limitless business automation</p> 
              <p class="fitur-item"><img src="{{ asset('img/checklist.png') }}" alt="" class="img-fitur-benefit"> Knowledge management</p> 
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="faq" id="faq">
      <br><br>
      <div class="faq-content">
        <h1 class="title-faq">Frequently asked questions</h1>
        <center>
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Lorem ipsum dolor sit amet?
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <p class="text-faq">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat illum fuga voluptatibus earum rem velit quibusdam architecto nobis expedita eius id deleniti vel porro eveniet, magni pariatur voluptatum quia non!</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Lorem ipsum dolor sit amet?
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <p class="text-faq">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic ex expedita sequi nesciunt vel vitae aliquam quisquam reiciendis iure animi, quidem magnam beatae tempora earum corrupti dignissimos natus cupiditate. Commodi!</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  Lorem ipsum dolor sit amet?
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <p class="text-faq">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, iste porro amet consectetur incidunt nisi at qui nesciunt a recusandae pariatur ducimus similique saepe fugiat assumenda nam sit officiis tempora.</p>
                </div>
              </div>
            </div>
          </div>
        </center>
      </div>
    </section>
    <section class="agenda" id="agenda">
      <br><br><br>
      <div class="head-agenda">
        <h1 class="title-agenda">Agenda Hari Ini</h1>
        <p class="desc-agenda">Here at flowbite we focus on markets where technology, innovation, and capital 
          <br>can unlock long-term value and drive economic growth.
        </p>
      </div>
      <div class="container">
        <div class="row card-agenda">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Agenda 1</h5>
                <p class="desc-item">Diterbitkan pada 7 Juli 2022 oleh John Doe</p>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque enim odit quo eum perferendis, voluptas sunt a incidunt minus similique error fugiat tempora sint repudiandae numquam. Facilis, ipsam. Odio, animi.</p>
                <a href="#" class="btn-item-agenda"><span class="animate-agenda">Lihat Detail</span></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Agenda 2</h5>
                <p class="desc-item">Diterbitkan pada 7 Juli 2022 oleh John Doe</p>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, quos placeat magni cupiditate numquam suscipit repellat error. Consequatur mollitia labore, dolores porro eligendi temporibus, iste incidunt maxime, ex itaque magnam?</p>
                <a href="#" class="btn-item-agenda"><span class="animate-agenda">Lihat Detail</span></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Agenda 3</h5>
                <p class="desc-item">Diterbitkan pada 7 Juli 2022 oleh John Doe</p>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos aperiam, tempore atque reiciendis non voluptates possimus odio ipsa placeat quam necessitatibus mollitia. Tenetur accusamus ipsa corporis voluptatum, recusandae veritatis ea.</p>
                <a href="#" class="btn-item-agenda"><span class="animate-agenda">Lihat Detail</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footer">
      <div class="container">
        <br><br><br>
        <center>
          <img src="{{ asset('img/icon.png') }}" alt="" class="img-footer"> <span class="title-footer">SIKAT</span>
          <br><br><span class="end-footer">&copy; 2022 SIKAT. All rights reserved.</span>
          <br><br><br>
        </center>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/jquery.scrollspy.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
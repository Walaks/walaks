@extends('layout.master')
@section('conteudo')    
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">{{$header->titulo}}</div>
          <div class="intro-heading">{{$header->subtitulo}}</div>
          <a class="btn btn-xl js-scroll-trigger" href="#services">Serviços</a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Serviços</h2>
            {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
          </div>
        </div>
        <div class="row text-center">
          @foreach($servicos as $servico)
            <div class="col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa {{$servico->icone}} fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">{{$servico->titulo}}</h4>
              <div class="text-muted">
                {!!$servico->descricao!!}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Portfólio</h2>
            {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
          </div>
        </div>
        <div class="row">
          @foreach($portifolios as $portifolio)
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#{{$portifolio->id}}">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{asset('portifolio/'.$portifolio->imagem)}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>{{$portifolio->nome}}</h4>
                <div class="text-muted"><a target="_blank" href="{{$portifolio->url}}">{{$portifolio->url}}</a></div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Experiências</h2>
            <h3 class="section-subheading text-muted">Empresas que trabalhei.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <div hidden>{{$esquerda = true}}</div>
              @foreach($experiencias as $experiencia)
                <li {{$esquerda ? '' : 'class=timeline-inverted'}}>
                  <div hidden>{{$esquerda = !$esquerda}}</div>
                  <div class="timeline-image">
                    <img style="background-color: white;" class="rounded-circle img-fluid" src="{{asset('experiencia/'.$experiencia->imagem)}}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>{{$experiencia->periodo}}</h4>
                      <h4 class="subheading">{{$experiencia->nome}}</h4>
                    </div>
                    <div class="timeline-body">
                      <div class="text-muted">
                        {!! $experiencia->descricao !!}
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Seja Parte
                    <br>Da Minha
                    <br>História!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Sobre</h2>
            <h3 class="section-subheading text-muted">Um pouco sobre mim.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="{{asset('sobre/'.$sobre->imagem)}}" alt="">
              <h4>{{$sobre->nome}}</h4>
              <p class="text-muted">{{$sobre->cargo}}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <div class="large text-muted">
              {!! $sobre->descricao !!}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">DEIXE SUA MENSAGEM!</h2>
            {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form method="post" id="contactForm" name="sentMessage" action="/mensagem" novalidate>
              {!! csrf_field() !!}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" name="nome" type="text" placeholder="Nome *" required data-validation-required-message="Preencha o campo nome.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email *" required data-validation-required-message="Preencha o campo e-mail.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" name="telefone" type="tel" placeholder="Telefone *" required data-validation-required-message="Preencha o campo telefone.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="mensagem" placeholder="Mensagem *" required data-validation-required-message="Preencha o campo mensagem."></textarea>
                    <p class="help-block text-danger"></p>
                    @if($msg[0]['msg'] != null)
                      <p class="help-block text-danger">{{$msg[0]['msg']}}</p>
                    @endif
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-xl" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            {{-- <span class="copyright">(061) 99172-0651 | Walaks.alves@gmail.com</span> --}}
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              {{-- <li class="list-inline-item">
                <a target="_blank" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li> --}}
              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/walaks.silva">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://www.linkedin.com/in/walaks-silva-33814770/">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <span class="copyright">(061) 99172-0651 | Walaks.alves@gmail.com</span>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Modal -->
    @foreach($portifolios as $portifolio)
      <div class="portfolio-modal modal fade" id="{{$portifolio->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2>{{$portifolio->nome}}</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{asset('portifolio/'.$portifolio->imagem)}}" alt="">
                    {!!$portifolio->descricao!!}
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Threads</li>
                      <li>Category: Illustration</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close Project</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection
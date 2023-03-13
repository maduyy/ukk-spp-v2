@extends('layouts.layout')
@section('content')
   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard {{Auth::user()->username }}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Siswa</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Hi,{{Auth::user()->username}}</h2>
            <p class="section-lead">
             Change information about yourself on this page.
            </p>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Information</h4>
                  </div>
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                      <i class="fas fa-list"></i> All Tickets
                    </a>
                    <div class="tickets">
                      <div class="ticket-items" id="ticket-items">
                        <div class="ticket-item active">
                          <div class="ticket-title">
                            <h4>Technical problem</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Farhan A. Mujib</div>
                            <div class="bullet"></div>
                            <div>2 min ago</div>
                          </div>
                        </div>
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>Cancel my order please!</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Amanda Aprilia Azmi</div>
                            <div class="bullet"></div>
                            <div>Yesterday</div>
                          </div>
                        </div>
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>Where is my mother?</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Irwansyah Saputra</div>
                            <div class="bullet"></div>
                            <div>July 18, 2018</div>
                          </div>
                        </div>
                      </div>
                      <div class="ticket-content">
                        <div class="ticket-header">
                          <div class="ticket-sender-picture img-shadow">
                            <img src="assets/img/avatar/avatar-5.png" alt="image">
                          </div>
                          <div class="ticket-detail">
                            <div class="ticket-title">
                              <h4>Technical Problem</h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600">Farhan A. Mujib</div>
                              <div class="bullet"></div>
                              <div class="text-primary font-weight-600">2 min ago</div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                          <div class="ticket-divider"></div>

                          <div class="ticket-form">
                            <form>
                              <div class="form-group">
                                <textarea class="summernote form-control" placeholder="Type a reply ..."></textarea>
                              </div>
                              <div class="form-group text-right">
                                <button class="btn btn-primary btn-lg">
                                  Reply
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://nauval.in/">Mawitraa</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
@endsection
@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

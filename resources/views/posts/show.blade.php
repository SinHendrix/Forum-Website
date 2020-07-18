@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                  @foreach($post as $p)
                        <div class="card-body">
                          @if (session('status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                            <div class="row align-items-center">
                                <div class="col-xs-1 pl-3 mt-0">
                                    <i class="ni ni-3x ni-circle-08"></i>
                                </div>
                                <div class="col">
                                    <h1 class="text-black mb-0 d-inline"><b>{{ $p->name }}</b></h1>
                                    <h6 class="text-uppercase text-gray ls-1 mb-1">{{ $p->created_at }}</h6>
                                </div>
                                    @if ($p->author_id === Auth::user()->id)
                                        <div class="dropleft">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/post/edit/{{ $p->id }}">Edit Post</a>
                                                <a class="dropdown-item warning-confirm" href="/post/delete/{{ $p->id }}">Delete Post</a>
                                            </div>
                                        </div>
                                    @endif
                            </div>
                            <h1 class="text-dark mb-0">{{ $p->title }}</h1>
                            {{ $p->body }}
                            <hr class="my-0">
                      </div>
                      @endforeach

                      <div class="card-body">
                        <h1>Comments :</h1>
                      </div>


                      <!-- Menampilkan comment pada pos yang telah di-show -->

                      @foreach($comments as $c)
                      <div class="card-body">
                          <div class="row align-items-center">
                              <div class="col-xs-1 pl-6 mt-0">
                                  <i class="ni ni-3x ni-circle-08"></i>
                              </div>
                              <div class="col">
                                  <h1 class="text-black mb-0 d-inline"><b>{{ $c->user->name }}</b></h1>
                                  <h6 class="text-uppercase text-gray ls-1 mb-1">{{ $c->created_at }}</h6>
                              </div>
                                  @if ($c->user_id === Auth::user()->id)
                                      <div class="dropleft">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <a class="dropdown-item" href="/comment/edit/{{ $c->id }}">Edit Post</a>
                                              <a class="dropdown-item warning-confirm" href="/comment/delete/{{ $c->id }}">Delete Post</a>
                                          </div>
                                      </div>
                                  @endif
                          </div>
                          <h2 class="text-dark pl-6 mb-0">{{ $c->description }}</h2>
                          <hr class="my-0">
                    </div>
                    @endforeach
                        <div class="text-center ">
                          <a href="/comment/create/{{ $p->id }}" class="btn btn-primary mt-4">{{ __('Add A Comment') }}</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

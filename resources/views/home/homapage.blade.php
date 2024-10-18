@extends('layout.main')

@section('content')
    <div class="row mt-3 mb-5">
        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('logo/people.png') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                            </div>
                            <div class="ms-2">
                                <h4 class="location font-weight-normal">pacitan</h4>
                                {{-- <h6 class="font-weight-normal">Illinois</h6> --}}
                                @if (Auth::check())
                                    <h4 class="font-weight-normal">Selamat datang, {{ Auth::user()->name }}!</h4>
                                @else
                                    <h1>Selamat datang, pengunjung!</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- to do list --}}

        <div class="col-6">
            <div class="card" style="width: 40rem">
                <div class="card-body">
                    <h4 class="card-title">To Do Lists</h4>
                    <div class="list-wrapper pt-2">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            {{-- <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox"> Meeting with Urban Team </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked> Duplicate a project for new customer </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox"> Project meeting with CEO </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked> Follow up of team zilla </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox"> Level up for Antony </label>
                </div>
                <i class="remove ti-close"></i>
              </li> --}}
                        </ul>
                    </div>
                    <div class="add-items d-flex mb-0 mt-2">
                        <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                        <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i
                                class="icon-circle-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

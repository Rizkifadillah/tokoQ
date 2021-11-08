@extends('layouts.master')

@section('title')
    Dashboard Kasir
@endsection

@section('breadcumbs')
    Dashboard Kasir    
@endsection

@section('content')
    
<section class="content">
    <div class="container-fluid">
        <div class="card bg-teal">
            {{-- <div class="card-header">
                <h5 class="m-0">Featured</h5>
            </div> --}}
            <div class="card-body">
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                      <div class="lockscreen-logo">
                        <a href="{{ asset($setting->path_logo ?? 'assets/shopping.png')}}">{{ $setting->nama_toko}}</a>
                      </div>
                      <!-- User name -->
                      <div class="lockscreen-name">{{ auth()->user()->name}}</div>
                    
                      <!-- START LOCK SCREEN ITEM -->
                      <div class="lockscreen-item">
                        <!-- lockscreen image -->
                        <div class="lockscreen-image">
                          <img src="{{ asset( auth()->user()->foto ?? 'assets/dist/img/user2-160x160.jpg') }}" alt="User Image">
                        </div>
                        <!-- /.lockscreen-image -->
                    
                        <!-- lockscreen credentials (contains the form) -->
                        <a href="{{ route('transaksi.baru')}}" class="btn btn-outline-primary btn-block"><i class="fas fa-share"></i> Transaki Baru</a>
                        <!-- /.lockscreen credentials -->
                    
                      </div>
                      <!-- /.lockscreen-item -->
                      <div class="help-block text-center">
                        Selamat Bekerja
                      </div>
                      {{-- <div class="text-center">
                        <a href="login.html">Semangat Bekerja</a>
                      </div> --}}
                      <div class="lockscreen-footer text-center">
                        Copyright © 2014-2020 <b><a href="{{ route('dashboard')}}" class="text-black">{{ $setting->nama_toko}}</a></b><br>
                        All rights reserved
                      </div>
                    </div>
                  </div>
                  {{-- <div class="lockscreen-wrapper"> --}}
                    {{-- <div class="lockscreen-logo">
                      <a href="../../index2.html"><b>Admin</b>LTE</a>
                    </div>
                    <!-- User name -->
                    <div class="lockscreen-name">John Doe</div>
                  
                    <!-- START LOCK SCREEN ITEM -->
                    <div class="lockscreen-item">
                      <!-- lockscreen image -->
                      <div class="lockscreen-image">
                        <img src="../../dist/img/user1-128x128.jpg" alt="User Image">
                      </div>
                      <!-- /.lockscreen-image -->
                  
                      <!-- lockscreen credentials (contains the form) -->
                      <form class="lockscreen-credentials">
                        <div class="input-group">
                          <input type="password" class="form-control" placeholder="password">
                  
                          <div class="input-group-append">
                            <button type="button" class="btn">
                              <i class="fas fa-arrow-right text-muted"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- /.lockscreen credentials -->
                  
                    </div>
                    <!-- /.lockscreen-item -->
                    <div class="help-block text-center">
                      Enter your password to retrieve your session
                    </div>
                    <div class="text-center">
                      <a href="login.html">Or sign in as a different user</a>
                    </div>
                    <div class="lockscreen-footer text-center">
                      Copyright © 2014-2020 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
                      All rights reserved
                    </div> --}}
                  {{-- </div> --}}
                {{-- <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </div>
    </div>
</section>

    
@endsection
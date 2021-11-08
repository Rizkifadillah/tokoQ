@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcumbs')
    Dashboard    
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $produk }}</h3>

              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="fas fa-cube"></i>
            </div>
            <a href="{{ route('product.index')}}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $supplier }}</h3>

              <p>Supplier</p>
            </div>
            <div class="icon">
              <i class="fas fa-truck"></i>
            </div>
            <a href="{{ route('supplier.index')}}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $member }}</h3>

              <p>User Member</p>
            </div>
            <div class="icon">
              <i class="fas fa-id-card"></i>
            </div>
            <a href="{{ route('member.index')}}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $kategori }}</h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fas fa-cubes"></i>
            </div>
            <a href="{{ route('kategori.index')}}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Grafik Pendapatan </h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: {{ tanggal_indonesia(date('Y-m-01'),false)}} - {{ tanggal_indonesia($tanggal_akhir ,false)}}</strong>
              </p>

              <div class="chart">
                    {{-- <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                          <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div> --}}
                <!-- Sales Chart Canvas -->
                <canvas id="pendapatan" 
                        {{-- height="180" 
                        style="height: 180px; display: block; width: 455px;" 
                        width="455"  --}}
                        {{-- class="chartjs-render-monitor" --}}
                        >
                </canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            {{-- <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion</strong>
              </p>

              <div class="progress-group">
                Add Products to Cart
                <span class="float-right"><b>160</b>/200</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Complete Purchase
                <span class="float-right"><b>310</b>/400</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 75%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Visit Premium Page</span>
                <span class="float-right"><b>480</b>/800</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 60%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Send Inquiries
                <span class="float-right"><b>250</b>/500</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div> --}}
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        {{-- <div class="card-footer">
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div> --}}
        <!-- /.card-footer -->
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection

@push('script')
    <script>
        $(function(){
            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#pendapatan').get(0).getContext('2d')
    
            var salesChartData = {
                labels: {{ json_encode($data_tanggal)}},
                datasets: [
                    {
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: {{ json_encode($data_pendapatan)}}
                    },
                    // {
                    // label: 'Electronics',
                    // backgroundColor: 'rgba(210, 214, 222, 1)',
                    // borderColor: 'rgba(210, 214, 222, 1)',
                    // pointRadius: false,
                    // pointColor: 'rgba(210, 214, 222, 1)',
                    // pointStrokeColor: '#c1c7d1',
                    // pointHighlightFill: '#fff',
                    // pointHighlightStroke: 'rgba(220,220,220,1)',
                    // data: [65, 59, 80, 81, 56, 55, 40]
                    // }
                ]
            }

            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                display: false
                },
                scales: {
                xAxes: [{
                    gridLines: {
                    display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                    display: false
                    }
                }]
                }
            }
            
            var pendapatan = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            })
        })


    </script>
@endpush
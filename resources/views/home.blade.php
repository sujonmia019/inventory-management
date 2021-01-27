@extends('layouts.app')

@section('content')
<div class="dt-content">

    <!-- Page Header -->
    <div class="row">

         <!-- Grid Item -->
         <div class="col-xl-3 col-sm-6 col-12">

            <!-- Chart Card -->
            <div class="dt-card dt-chart dt-card__full-height bg-primary">

              <!-- Chart Body -->
              <div class="dt-chart__body">
                <canvas class="rounded-xl" id="chart-properties" height="110" data-shadow="yes"></canvas>
              </div>
              <!-- /chart body -->

              <!-- Chart Overlay -->
              <div class="dt-chart__overlay">
                <h6 class="title text-white text-uppercase">Properties</h6>

                <div class="content-area">
                  <span class="d-inline-block mb-1 display-3 font-weight-medium">26,873</span>
                  <div class="d-flex align-items-center">
                    <span class="d-inline-block mr-1">03%</span>
                    <i class="icon icon-menu-up f-10 mr-2"></i>
                    <span class="d-inline-block f-12">This Week</span>
                  </div>
                </div>
                <!-- Button -->
                <a href="javascript:void(0)" class="btn text-white dt-fab-btn size-25 action-btn">
                  <i class="icon icon-stats icon-2x"></i>
                </a>
                <!-- /button -->

                <!-- Button -->
                <a href="javascript:void(0)" class="btn btn-rounded bg-white text-primary dt-fab-btn size-25 close-btn">
                  <i class="icon icon-close icon-2x"></i>
                </a>
                <!-- /button -->

              </div>
              <!-- /chart overlay -->

            </div>
            <!-- /chart card -->

          </div>
          <!-- /grid item -->

          <!-- Grid Item -->
          <div class="col-xl-3 col-sm-6 col-12">

            <!-- Chart Card -->
            <div class="dt-card dt-chart dt-card__full-height bg-warning">

              <!-- Chart Body -->
              <div class="dt-chart__body">
                <canvas class="rounded-xl" id="chart-cities" height="110" data-shadow="no"></canvas>
              </div>
              <!-- /chart body -->

              <!-- Chart Overlay -->
              <div class="dt-chart__overlay">
                <h6 class="title text-white text-uppercase">Cities</h6>

                <div class="content-area">
                  <span class="d-inline-block mb-1 display-3 font-weight-medium">384</span>
                  <div class="d-flex align-items-center">
                    <span class="d-inline-block f-12">7 New cities this week</span>
                  </div>
                </div>
                <!-- Button -->
                <a href="javascript:void(0)" class="btn text-white dt-fab-btn size-25 action-btn">
                  <i class="icon icon-stats icon-2x"></i>
                </a>
                <!-- /button -->

                <!-- Button -->
                <a href="javascript:void(0)" class="btn btn-rounded bg-white text-primary dt-fab-btn size-25 close-btn">
                  <i class="icon icon-close icon-2x"></i>
                </a>
                <!-- /button -->

              </div>
              <!-- /chart overlay -->

            </div>
            <!-- /chart card -->

          </div>
          <!-- /grid item -->

          <!-- Grid Item -->
          <div class="col-xl-3 col-sm-6 col-12">

            <!-- Chart Card -->
            <div class="dt-card dt-chart dt-card__full-height bg-light-green">

              <!-- Chart Body -->
              <div class="dt-chart__body">
                <canvas class="rounded-xl" id="chart-online-visits" height="110" data-shadow="no"></canvas>
              </div>
              <!-- /chart body -->

              <!-- Chart Overlay -->
              <div class="dt-chart__overlay">
                <h6 class="title text-white text-uppercase">Online Visits</h6>

                <div class="content-area">
                  <span class="d-inline-block mb-1 display-3 font-weight-medium">284,726</span>
                  <div class="d-flex align-items-center">
                    <span class="d-inline-block f-12">Avg. 327 visits daily</span>
                  </div>
                </div>
                <!-- Button -->
                <a href="javascript:void(0)" class="btn text-white dt-fab-btn size-25 action-btn">
                  <i class="icon icon-stats icon-2x"></i>
                </a>
                <!-- /button -->

                <!-- Button -->
                <a href="javascript:void(0)" class="btn btn-rounded bg-white text-primary dt-fab-btn size-25 close-btn">
                  <i class="icon icon-close icon-2x"></i>
                </a>
                <!-- /button -->

              </div>
              <!-- /chart overlay -->

            </div>
            <!-- /chart card -->

          </div>
          <!-- /grid item -->

          <!-- Grid Item -->
          <div class="col-xl-3 col-sm-6 col-12">

            <!-- Chart Card -->
            <div class="dt-card dt-chart dt-card__full-height bg-light-pink">

              <!-- Chart Body -->
              <div class="dt-chart__body">
                <canvas class="rounded-xl" id="chart-online-queries" height="110" data-shadow="no"></canvas>
              </div>
              <!-- /chart body -->

              <!-- Chart Overlay -->
              <div class="dt-chart__overlay">
                <h6 class="title text-white text-uppercase">online queries</h6>

                <div class="content-area">
                  <span class="d-inline-block mb-1 display-3 font-weight-medium">87,239</span>
                  <div class="d-flex align-items-center">
                    <span class="d-inline-block mr-1">39%</span>
                    <i class="icon icon-menu-up f-10 mr-2"></i>
                    <span class="d-inline-block f-12">from past month</span>
                  </div>
                </div>
                <!-- Button -->
                <a href="javascript:void(0)" class="btn text-white dt-fab-btn size-25 action-btn">
                  <i class="icon icon-stats icon-2x"></i>
                </a>
                <!-- /button -->

                <!-- Button -->
                <a href="javascript:void(0)" class="btn btn-rounded bg-white text-primary dt-fab-btn size-25 close-btn">
                  <i class="icon icon-close icon-2x"></i>
                </a>
                <!-- /button -->

              </div>
              <!-- /chart overlay -->

            </div>
            <!-- /chart card -->

          </div>
          <!-- /grid item -->

    </div>
     <!-- /page header -->
</div>

@endsection

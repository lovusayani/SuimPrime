@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/users">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-user"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">39</h1>
                                    <p class="mb-0 fs-6">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-4 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="card-icon mb-5 fs-1">
                                        <i class="ph ph-user-gear"></i>
                                    </div>
                                    <div class="card-data">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/subscriptions">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-users-three"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">8</h1>
                                    <p class="mb-0 fs-6">Total Subscribers</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/users?type=soon-to-expire">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-hourglass"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">3</h1>
                                    <p class="mb-0 fs-6">Total Soon to Expire</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/reviews">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-4 fs-1">
                                    <!-- Outlined star icon with forced grey color -->
                                    <svg width="31" height="27" viewBox="0 0 46 35" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_10479_23096)">
                                            <path
                                                d="M29.5977 22.7916L35.8872 26.5762C36.0481 26.6755 36.2348 26.725 36.4238 26.7185C36.6128 26.7121 36.7957 26.6499 36.9495 26.5399C37.1033 26.4298 37.2212 26.2768 37.2883 26.1C37.3554 25.9232 37.3688 25.7305 37.3268 25.5461L35.6165 18.4815L41.2134 13.7565C41.3572 13.6353 41.4616 13.4739 41.5133 13.293C41.5649 13.1122 41.5615 12.92 41.5033 12.7411C41.4452 12.5622 41.3351 12.4047 41.187 12.2887C41.0389 12.1728 40.8596 12.1036 40.6719 12.0901L33.3261 11.5082L30.496 4.80394C30.4211 4.63018 30.2969 4.48216 30.1389 4.37817C29.9808 4.27417 29.7957 4.21875 29.6065 4.21875C29.4173 4.21875 29.2322 4.27417 29.0742 4.37817C28.9161 4.48216 28.792 4.63018 28.7171 4.80394L25.887 11.5082L18.5411 12.0901C18.3527 12.102 18.1723 12.17 18.0229 12.2854C17.8736 12.4008 17.7621 12.5582 17.703 12.7374C17.6438 12.9166 17.6396 13.1094 17.6909 13.291C17.7422 13.4726 17.8467 13.6347 17.9909 13.7565L23.5878 18.4815L21.8634 25.5461C21.8213 25.7305 21.8347 25.9232 21.9019 26.1C21.969 26.2768 22.0869 26.4298 22.2407 26.5399C22.3945 26.6499 22.5773 26.7121 22.7663 26.7185C22.9553 26.725 23.142 26.6755 23.303 26.5762L29.5977 22.7916Z"
                                                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M15.2627 20.6631L4.98828 30.9375" stroke="#ffffff"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path d="M17.1629 31.4189L7.80078 40.7811" stroke="#ffffff"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path d="M29.9984 31.2397L20.457 40.7812" stroke="#ffffff"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_10479_23096">
                                                <rect width="45" height="45" fill="white"
                                                    transform="translate(0.769531)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="card-data">
                                    <h1 class="">171</h1>
                                    <p class="mb-0 fs-6">Total Reviews</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a>
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-lockers"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">0</h1>
                                    <p class="mb-0 fs-6">Total Storage Full</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-hourglass"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">15</h1>
                                    <p class="mb-0 fs-6">Rent Content</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/subscriptions">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-money"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">$677.50</h1>
                                    <p class="mb-0 fs-6">Subscription Revenue</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/pay-per-view-history">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-money"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">$19.80</h1>
                                    <p class="mb-0 fs-6">Rent Revenue</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="card-icon mb-5 fs-1">
                                    <i class="ph ph-money"></i>
                                </div>
                                <div class="card-data">
                                    <h1 class="">$697.30</h1>
                                    <p class="mb-0 fs-6">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--                 <div class="col-md-4 col-sm-6">
                        <a href="https://apps.iqonic.design/streamit-laravel/app/movies">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="card-icon mb-5 fs-1">
                                        <i class="ph ph-film-strip"></i>
                                    </div>
                                    <div class="card-data">
                                        <h1 class="">82</h1>
                                        <p class="mb-0 fs-6">Total Movies</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                                                        <div class="col-md-4 col-sm-6">
                        <a href="https://apps.iqonic.design/streamit-laravel/app/tvshows">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="card-icon mb-5 fs-1">
                                        <i class="ph ph-television-simple"></i>
                                    </div>
                                    <div class="card-data">
                                        <h1 class="">19</h1>
                                        <p class="mb-0 fs-6">Total Shows</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                                                        <div class="col-md-4 col-sm-6">
                        <a href="https://apps.iqonic.design/streamit-laravel/app/videos">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="card-icon mb-5 fs-1">
                                        <i class="ph ph-video"></i>
                                    </div>
                                    <div class="card-data">
                                        <h1 class="">36</h1>
                                        <p class="mb-0 fs-6">Total Videos</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                         -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-stats">
                <div class="card-header">
                    <h3 class="card-title">Top 5 Genres</h3>
                </div>
                <div class="card-body">
                    <div id="chart-top-genres" style="min-height: 389px;">
                        <div id="apexchartsuqdrvojd" class="apexcharts-canvas apexchartsuqdrvojd apexcharts-theme-light"
                            style="width: 484px; height: 389px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="484" height="389">
                                <foreignObject x="0" y="0" width="484" height="389">
                                    <style type="text/css">
                                    .apexcharts-flip-y {
                                        transform: scaleY(-1) translateY(-100%);
                                        transform-origin: top;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-flip-x {
                                        transform: scaleX(-1);
                                        transform-origin: center;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                        flex-direction: column;
                                    }

                                    .apexcharts-legend-group {
                                        display: flex;
                                    }

                                    .apexcharts-legend-group-vertical {
                                        flex-direction: column-reverse;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom,
                                    .apexcharts-legend.apx-legend-position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        justify-content: flex-start;
                                        align-items: flex-start;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                        align-items: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        cursor: pointer;
                                        margin-right: 1px;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                    </style>
                                </foreignObject>
                                <g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                    <defs>
                                        <clipPath id="gridRectMaskuqdrvojd">
                                            <rect width="488" height="355" x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectBarMaskuqdrvojd">
                                            <rect width="488" height="355" x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskuqdrvojd">
                                            <rect width="488" height="351" x="-2" y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskuqdrvojd"></clipPath>
                                        <clipPath id="nonForecastMaskuqdrvojd"></clipPath>
                                    </defs>
                                    <g class="apexcharts-pie">
                                        <g transform="translate(0, 0) scale(1)">
                                            <circle r="108.69268292682929" cx="242" cy="175.5" fill="transparent">
                                            </circle>
                                            <g class="apexcharts-slices">
                                                <g class="apexcharts-series apexcharts-pie-series" seriesName="Horror"
                                                    rel="1" data:realIndex="0">
                                                    <path
                                                        d="M 242 8.280487804878021 A 167.21951219512198 167.21951219512198 0 0 1 408.9836545379562 166.62169070582434 L 350.5393754496715 169.7290989587858 A 108.69268292682929 108.69268292682929 0 0 0 242 66.80731707317071 L 242 8.280487804878021 z "
                                                        fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-0" index="0"
                                                        j="0" data:angle="86.95652173913044" data:startAngle="0"
                                                        data:strokeWidth="0" data:value="50"
                                                        data:pathOrig="M 242 8.280487804878021 A 167.21951219512198 167.21951219512198 0 0 1 408.9836545379562 166.62169070582434 L 350.5393754496715 169.7290989587858 A 108.69268292682929 108.69268292682929 0 0 0 242 66.80731707317071 L 242 8.280487804878021 z ">
                                                    </path>
                                                </g>
                                                <g class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Historical" rel="2" data:realIndex="1">
                                                    <path
                                                        d="M 408.9836545379562 166.62169070582434 A 167.21951219512198 167.21951219512198 0 0 1 294.3972254757159 334.2982872112339 L 276.05819655921533 278.7188866873021 A 108.69268292682929 108.69268292682929 0 0 0 350.5393754496715 169.7290989587858 L 408.9836545379562 166.62169070582434 z "
                                                        fill="var(--bs-primary-tint-20)" fill-opacity="1"
                                                        stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt"
                                                        stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-1" index="0"
                                                        j="1" data:angle="74.78260869565219"
                                                        data:startAngle="86.95652173913044" data:strokeWidth="0"
                                                        data:value="43"
                                                        data:pathOrig="M 408.9836545379562 166.62169070582434 A 167.21951219512198 167.21951219512198 0 0 1 294.3972254757159 334.2982872112339 L 276.05819655921533 278.7188866873021 A 108.69268292682929 108.69268292682929 0 0 0 350.5393754496715 169.7290989587858 L 408.9836545379562 166.62169070582434 z ">
                                                    </path>
                                                </g>
                                                <g class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Inspirational" rel="3" data:realIndex="2">
                                                    <path
                                                        d="M 294.3972254757159 334.2982872112339 A 167.21951219512198 167.21951219512198 0 0 1 111.4888744883358 280.04286860639127 L 157.16776841741827 243.4528645941543 A 108.69268292682929 108.69268292682929 0 0 0 276.05819655921533 278.7188866873021 L 294.3972254757159 334.2982872112339 z "
                                                        fill="var(--bs-primary-tint-40)" fill-opacity="1"
                                                        stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt"
                                                        stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-2" index="0"
                                                        j="2" data:angle="69.56521739130434"
                                                        data:startAngle="161.73913043478262" data:strokeWidth="0"
                                                        data:value="40"
                                                        data:pathOrig="M 294.3972254757159 334.2982872112339 A 167.21951219512198 167.21951219512198 0 0 1 111.4888744883358 280.04286860639127 L 157.16776841741827 243.4528645941543 A 108.69268292682929 108.69268292682929 0 0 0 276.05819655921533 278.7188866873021 L 294.3972254757159 334.2982872112339 z ">
                                                    </path>
                                                </g>
                                                <g class="apexcharts-series apexcharts-pie-series" seriesName="Romantic"
                                                    rel="4" data:realIndex="3">
                                                    <path
                                                        d="M 111.4888744883358 280.04286860639127 A 167.21951219512198 167.21951219512198 0 0 1 93.52826689349553 98.56814881256624 L 145.4933734807721 125.49429672816805 A 108.69268292682929 108.69268292682929 0 0 0 157.16776841741827 243.4528645941543 L 111.4888744883358 280.04286860639127 z "
                                                        fill="var(--bs-primary-tint-60)" fill-opacity="1"
                                                        stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt"
                                                        stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-3" index="0"
                                                        j="3" data:angle="66.08695652173915"
                                                        data:startAngle="231.30434782608697" data:strokeWidth="0"
                                                        data:value="38"
                                                        data:pathOrig="M 111.4888744883358 280.04286860639127 A 167.21951219512198 167.21951219512198 0 0 1 93.52826689349553 98.56814881256624 L 145.4933734807721 125.49429672816805 A 108.69268292682929 108.69268292682929 0 0 0 157.16776841741827 243.4528645941543 L 111.4888744883358 280.04286860639127 z ">
                                                    </path>
                                                </g>
                                                <g class="apexcharts-series apexcharts-pie-series" seriesName="Comedy"
                                                    rel="5" data:realIndex="4">
                                                    <path
                                                        d="M 93.52826689349553 98.56814881256624 A 167.21951219512198 167.21951219512198 0 0 1 241.9708146895343 8.28049035177682 L 241.9810295481973 66.80731872865493 A 108.69268292682929 108.69268292682929 0 0 0 145.4933734807721 125.49429672816805 L 93.52826689349553 98.56814881256624 z "
                                                        fill="var(--bs-primary-tint-80)" fill-opacity="1"
                                                        stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt"
                                                        stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-4" index="0"
                                                        j="4" data:angle="62.608695652173935"
                                                        data:startAngle="297.3913043478261" data:strokeWidth="0"
                                                        data:value="36"
                                                        data:pathOrig="M 93.52826689349553 98.56814881256624 A 167.21951219512198 167.21951219512198 0 0 1 241.9708146895343 8.28049035177682 L 241.9810295481973 66.80731872865493 A 108.69268292682929 108.69268292682929 0 0 0 145.4933734807721 125.49429672816805 L 93.52826689349553 98.56814881256624 z ">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <line x1="0" y1="0" x2="484" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line x1="0" y1="0" x2="484" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    </line>
                                </g>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                            </svg>
                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                style="right: 0px; position: absolute; left: 0px; top: 360px; max-height: 192.5px;">
                                <div class="apexcharts-legend-series" rel="1" seriesname="Horror" data:collapsed="false"
                                    style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                        data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="circle"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="1" i="0"
                                        data:default-text="Horror" data:collapsed="false"
                                        style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Horror</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="2" seriesname="Historical"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary-tint-20)" fill-opacity="1" stroke="#ffffff"
                                                stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1"
                                                stroke-dasharray="0" cx="0" cy="0" shape="circle"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="2" i="1"
                                        data:default-text="Historical" data:collapsed="false"
                                        style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Historical</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="3" seriesname="Inspirational"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="3" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary-tint-40)" fill-opacity="1" stroke="#ffffff"
                                                stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1"
                                                stroke-dasharray="0" cx="0" cy="0" shape="circle"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="3" i="2"
                                        data:default-text="Inspirational" data:collapsed="false"
                                        style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Inspirational</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="4" seriesname="Romantic"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="4" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary-tint-60)" fill-opacity="1" stroke="#ffffff"
                                                stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1"
                                                stroke-dasharray="0" cx="0" cy="0" shape="circle"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="4" i="3"
                                        data:default-text="Romantic" data:collapsed="false"
                                        style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Romantic</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="5" seriesname="Comedy" data:collapsed="false"
                                    style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="5"
                                        data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary-tint-80)" fill-opacity="1" stroke="#ffffff"
                                                stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1"
                                                stroke-dasharray="0" cx="0" cy="0" shape="circle"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="5" i="4"
                                        data:default-text="Comedy" data:collapsed="false"
                                        style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Comedy</span>
                                </div>
                            </div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                    style="order: 1;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="background-color: var(--bs-primary);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                    style="order: 2;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="background-color: var(--bs-primary-tint-20);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-2"
                                    style="order: 3;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="background-color: var(--bs-primary-tint-40);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-3"
                                    style="order: 4;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="background-color: var(--bs-primary-tint-60);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-4"
                                    style="order: 5;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="background-color: var(--bs-primary-tint-80);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-block card-height">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <h3 class="card-title">Total Revenue</h3>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle total_revenue" type="button"
                            id="dropdownTotalRevenue" data-bs-toggle="dropdown" aria-expanded="false">Year</button>
                        <ul class="dropdown-menu dropdown-menu-soft-primary sub-dropdown"
                            aria-labelledby="dropdownTotalRevenue">
                            <li><a class="revenue-dropdown-item dropdown-item" data-type="Year">Year</a></li>
                            <li><a class="revenue-dropdown-item dropdown-item" data-type="Month">Month</a></li>
                            <li><a class="revenue-dropdown-item dropdown-item" data-type="Week">Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-top-revenue" style="min-height: 365px;">
                        <div id="apexchartsx6sbl4x6" class="apexcharts-canvas apexchartsx6sbl4x6 apexcharts-theme-light"
                            style="width: 758px; height: 350px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="758" height="350">
                                <foreignObject x="0" y="0" width="758" height="350">
                                    <style type="text/css">
                                    .apexcharts-flip-y {
                                        transform: scaleY(-1) translateY(-100%);
                                        transform-origin: top;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-flip-x {
                                        transform: scaleX(-1);
                                        transform-origin: center;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                        flex-direction: column;
                                    }

                                    .apexcharts-legend-group {
                                        display: flex;
                                    }

                                    .apexcharts-legend-group-vertical {
                                        flex-direction: column-reverse;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom,
                                    .apexcharts-legend.apx-legend-position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        justify-content: flex-start;
                                        align-items: flex-start;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                        align-items: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        cursor: pointer;
                                        margin-right: 1px;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                    </style>
                                </foreignObject>
                                <rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                    stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-yaxis" rel="0" transform="translate(36.765625, 0)">
                                    <g class="apexcharts-yaxis-texts-g"><text x="20" y="33.666666666666664"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>$400.00</tspan>
                                            <title>$400.00</title>
                                        </text><text x="20" y="104.25366666666667" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>$300.00</tspan>
                                            <title>$300.00</title>
                                        </text><text x="20" y="174.84066666666666" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>$200.00</tspan>
                                            <title>$200.00</title>
                                        </text><text x="20" y="245.42766666666665" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>$100.00</tspan>
                                            <title>$100.00</title>
                                        </text><text x="20" y="316.01466666666664" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>$0.00</tspan>
                                            <title>$0.00</title>
                                        </text></g>
                                </g>
                                <g class="apexcharts-inner apexcharts-graphical" transform="translate(66.765625, 30)">
                                    <defs>
                                        <clipPath id="gridRectMaskx6sbl4x6">
                                            <rect width="678.064453125" height="291.348" x="-4.5" y="-4.5" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectBarMaskx6sbl4x6">
                                            <rect width="678.064453125" height="291.348" x="-4.5" y="-4.5" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskx6sbl4x6">
                                            <rect width="678.064453125" height="282.348" x="-4.5" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskx6sbl4x6"></clipPath>
                                        <clipPath id="nonForecastMaskx6sbl4x6"></clipPath>
                                    </defs>
                                    <line x1="0" y1="0" x2="0" y2="282.348" stroke="#b6b6b6" stroke-dasharray="3"
                                        stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                        height="282.348" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                        stroke-width="1"></line>
                                    <line x1="0" y1="282.348" x2="0" y2="288.348" stroke="#e0e0e0" stroke-dasharray="0"
                                        stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line x1="60.82404119318182" y1="282.348" x2="60.82404119318182" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="121.64808238636364" y1="282.348" x2="121.64808238636364" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="182.47212357954547" y1="282.348" x2="182.47212357954547" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="243.29616477272728" y1="282.348" x2="243.29616477272728" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="304.1202059659091" y1="282.348" x2="304.1202059659091" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="364.94424715909093" y1="282.348" x2="364.94424715909093" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="425.76828835227275" y1="282.348" x2="425.76828835227275" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="486.59232954545456" y1="282.348" x2="486.59232954545456" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="547.4163707386364" y1="282.348" x2="547.4163707386364" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="608.2404119318182" y1="282.348" x2="608.2404119318182" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="669.0644531250001" y1="282.348" x2="669.0644531250001" y2="288.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <g class="apexcharts-grid">
                                        <g class="apexcharts-gridlines-horizontal">
                                            <line x1="0" y1="70.587" x2="669.064453125" y2="70.587"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="141.174" x2="669.064453125" y2="141.174"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="211.76100000000002" x2="669.064453125"
                                                y2="211.76100000000002" stroke="var(--bs-border-color)"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g class="apexcharts-gridlines-vertical"></g>
                                        <rect width="669.064453125" height="70.587" x="0" y="0" rx="0" ry="0"
                                            opacity="0" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="#f3f3f3" clip-path="url(#gridRectMaskx6sbl4x6)"
                                            class="apexcharts-grid-row"></rect>
                                        <rect width="669.064453125" height="70.587" x="0" y="70.587" rx="0" ry="0"
                                            opacity="0" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="transparent" clip-path="url(#gridRectMaskx6sbl4x6)"
                                            class="apexcharts-grid-row"></rect>
                                        <rect width="669.064453125" height="70.587" x="0" y="141.174" rx="0" ry="0"
                                            opacity="0" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="#f3f3f3" clip-path="url(#gridRectMaskx6sbl4x6)"
                                            class="apexcharts-grid-row"></rect>
                                        <rect width="669.064453125" height="70.587" x="0" y="211.76100000000002" rx="0"
                                            ry="0" opacity="0" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="transparent" clip-path="url(#gridRectMaskx6sbl4x6)"
                                            class="apexcharts-grid-row"></rect>
                                        <line x1="0" y1="282.348" x2="669.064453125" y2="282.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line x1="0" y1="1" x2="0" y2="282.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g class="apexcharts-grid-borders">
                                        <line x1="0" y1="0" x2="669.064453125" y2="0" stroke="var(--bs-border-color)"
                                            stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                        <line x1="0" y1="282.348" x2="669.064453125" y2="282.348"
                                            stroke="var(--bs-border-color)" stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line x1="0" y1="282.348" x2="669.064453125" y2="282.348" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g class="apexcharts-line-series apexcharts-plot-series">
                                        <g class="apexcharts-series" zIndex="0" seriesName="TotalxRevenue"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path
                                                d="M 0 282.348C 21.288414417613637 282.348 39.53562677556819 282.348 60.82404119318183 282.348C 82.11245561079546 282.348 100.35966796875002 282.348 121.64808238636365 282.348C 142.9364968039773 282.348 161.18370916193183 282.348 182.47212357954547 282.348C 203.7605379971591 282.348 222.00775035511367 282.348 243.2961647727273 282.348C 264.58457919034095 282.348 282.8317915482955 282.348 304.1202059659091 282.348C 325.40862038352276 282.348 343.6558327414773 63.5283 364.94424715909093 63.5283C 386.2326615767046 63.5283 404.4798739346591 282.348 425.76828835227275 282.348C 447.0567027698864 282.348 465.303915127841 8.964548999999977 486.5923295454546 8.964548999999977C 507.88074396306826 8.964548999999977 526.1279563210228 282.348 547.4163707386364 282.348C 568.7047851562501 282.348 586.9519975142045 282.348 608.2404119318182 282.348C 629.5288263494319 282.348 647.7760387073864 282.348 669.0644531250001 282.348"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                stroke-dasharray="0" class="apexcharts-line" index="0"
                                                clip-path="url(#gridRectMaskx6sbl4x6)"
                                                pathTo="M 0 282.348C 21.288414417613637 282.348 39.53562677556819 282.348 60.82404119318183 282.348C 82.11245561079546 282.348 100.35966796875002 282.348 121.64808238636365 282.348C 142.9364968039773 282.348 161.18370916193183 282.348 182.47212357954547 282.348C 203.7605379971591 282.348 222.00775035511367 282.348 243.2961647727273 282.348C 264.58457919034095 282.348 282.8317915482955 282.348 304.1202059659091 282.348C 325.40862038352276 282.348 343.6558327414773 63.5283 364.94424715909093 63.5283C 386.2326615767046 63.5283 404.4798739346591 282.348 425.76828835227275 282.348C 447.0567027698864 282.348 465.303915127841 8.964548999999977 486.5923295454546 8.964548999999977C 507.88074396306826 8.964548999999977 526.1279563210228 282.348 547.4163707386364 282.348C 568.7047851562501 282.348 586.9519975142045 282.348 608.2404119318182 282.348C 629.5288263494319 282.348 647.7760387073864 282.348 669.0644531250001 282.348"
                                                pathFrom="M 0 282.348 L 0 282.348 L 60.82404119318183 282.348 L 121.64808238636365 282.348 L 182.47212357954547 282.348 L 243.2961647727273 282.348 L 304.1202059659091 282.348 L 364.94424715909093 282.348 L 425.76828835227275 282.348 L 486.5923295454546 282.348 L 547.4163707386364 282.348 L 608.2404119318182 282.348 L 669.0644531250001 282.348"
                                                fill-rule="evenodd"></path>
                                            <g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <path d="M 0, 0
                   m -0, 0
                   a 0,0 0 1,0 0,0
                   a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                        stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                        cx="0" cy="0" shape="circle"
                                                        class="apexcharts-marker w0q7i8r17f no-pointer-events"
                                                        default-marker-size="0"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line x1="0" y1="0" x2="669.064453125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line x1="0" y1="0" x2="669.064453125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    </line>
                                    <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text x="0"
                                                y="310.348" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-family="Helvetica, Arial, sans-serif"
                                                font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jan</tspan>
                                                <title>Jan</title>
                                            </text><text x="60.82404119318183" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Feb</tspan>
                                                <title>Feb</title>
                                            </text><text x="121.64808238636365" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Mar</tspan>
                                                <title>Mar</title>
                                            </text><text x="182.47212357954547" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Apr</tspan>
                                                <title>Apr</title>
                                            </text><text x="243.29616477272728" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>May</tspan>
                                                <title>May</title>
                                            </text><text x="304.12020596590907" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jun</tspan>
                                                <title>Jun</title>
                                            </text><text x="364.9442471590909" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jul</tspan>
                                                <title>Jul</title>
                                            </text><text x="425.7682883522727" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Aug</tspan>
                                                <title>Aug</title>
                                            </text><text x="486.59232954545456" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Sep</tspan>
                                                <title>Sep</title>
                                            </text><text x="547.4163707386365" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Oct</tspan>
                                                <title>Oct</title>
                                            </text><text x="608.2404119318184" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Nov</tspan>
                                                <title>Nov</title>
                                            </text><text x="669.0644531250002" y="310.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Dec</tspan>
                                                <title>Dec</title>
                                            </text></g>
                                    </g>
                                    <g class="apexcharts-yaxis-annotations"></g>
                                    <g class="apexcharts-xaxis-annotations"></g>
                                    <g class="apexcharts-point-annotations"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 175px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                    style="order: 1;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-dark">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg></div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG
                                    </div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG
                                    </div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-block card-height">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <h3 class="card-title">New Subscribers</h3>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle total_subscribers" type="button"
                            id="dropdownNewSubscribers" data-bs-toggle="dropdown" aria-expanded="false">Year</button>
                        <ul class="dropdown-menu dropdown-menu-soft-primary sub-dropdown"
                            aria-labelledby="dropdownNewSubscribers">
                            <li><a class="subscribers-dropdown-item dropdown-item" data-type="Year">Year</a></li>
                            <li><a class="subscribers-dropdown-item dropdown-item" data-type="Month">Month</a></li>
                            <li><a class="subscribers-dropdown-item dropdown-item" data-type="Week">Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-new-subscription" style="min-height: 365px;">
                        <div id="apexchartsi1lh1lfn" class="apexcharts-canvas apexchartsi1lh1lfn apexcharts-theme-light"
                            style="width: 758px; height: 350px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="758" height="350">
                                <foreignObject x="0" y="0" width="758" height="350">
                                    <style type="text/css">
                                    .apexcharts-flip-y {
                                        transform: scaleY(-1) translateY(-100%);
                                        transform-origin: top;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-flip-x {
                                        transform: scaleX(-1);
                                        transform-origin: center;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                        flex-direction: column;
                                    }

                                    .apexcharts-legend-group {
                                        display: flex;
                                    }

                                    .apexcharts-legend-group-vertical {
                                        flex-direction: column-reverse;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom,
                                    .apexcharts-legend.apx-legend-position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        justify-content: flex-start;
                                        align-items: flex-start;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                        align-items: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        cursor: pointer;
                                        margin-right: 1px;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                    </style>
                                </foreignObject>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-yaxis" rel="0" transform="translate(4, 0)">
                                    <g class="apexcharts-yaxis-texts-g"><text x="20" y="33.666666666666664"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>4</tspan>
                                            <title>4</title>
                                        </text><text x="20" y="98.25366666666667" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>3</tspan>
                                            <title>3</title>
                                        </text><text x="20" y="162.84066666666666" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>2</tspan>
                                            <title>2</title>
                                        </text><text x="20" y="227.42766666666665" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>1</tspan>
                                            <title>1</title>
                                        </text><text x="20" y="292.01466666666664" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g class="apexcharts-inner apexcharts-graphical" transform="translate(34, 30)">
                                    <defs>
                                        <linearGradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1002">
                                            <stop stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0">
                                            </stop>
                                            <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1">
                                            </stop>
                                            <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1">
                                            </stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaski1lh1lfn">
                                            <rect width="705.830078125" height="262.348" x="-2" y="-2" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectBarMaski1lh1lfn">
                                            <rect width="705.830078125" height="262.348" x="-2" y="-2" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaski1lh1lfn">
                                            <rect width="705.830078125" height="258.348" x="-2" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaski1lh1lfn"></clipPath>
                                        <clipPath id="nonForecastMaski1lh1lfn"></clipPath>
                                    </defs>
                                    <rect width="14.6214599609375" height="258.348" x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke="#b6b6b6" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient1002)" class="apexcharts-xcrosshairs" y2="258.348"
                                        filter="none" fill-opacity="0.9"></rect>
                                    <line x1="0" y1="258.348" x2="0" y2="264.348" stroke="#e0e0e0" stroke-dasharray="0"
                                        stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line x1="58.48583984375" y1="258.348" x2="58.48583984375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="116.9716796875" y1="258.348" x2="116.9716796875" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="175.45751953125" y1="258.348" x2="175.45751953125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="233.943359375" y1="258.348" x2="233.943359375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="292.42919921875" y1="258.348" x2="292.42919921875" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="350.9150390625" y1="258.348" x2="350.9150390625" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="409.40087890625" y1="258.348" x2="409.40087890625" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="467.88671875" y1="258.348" x2="467.88671875" y2="264.348" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line x1="526.37255859375" y1="258.348" x2="526.37255859375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="584.8583984375" y1="258.348" x2="584.8583984375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="643.34423828125" y1="258.348" x2="643.34423828125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="701.830078125" y1="258.348" x2="701.830078125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <g class="apexcharts-grid">
                                        <g class="apexcharts-gridlines-horizontal">
                                            <line x1="0" y1="64.587" x2="701.830078125" y2="64.587"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="129.174" x2="701.830078125" y2="129.174"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="193.76100000000002" x2="701.830078125"
                                                y2="193.76100000000002" stroke="var(--bs-border-color)"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g class="apexcharts-gridlines-vertical"></g>
                                        <line x1="0" y1="258.348" x2="701.830078125" y2="258.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt">
                                        </line>
                                        <line x1="0" y1="1" x2="0" y2="258.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt">
                                        </line>
                                    </g>
                                    <g class="apexcharts-grid-borders">
                                        <line x1="0" y1="0" x2="701.830078125" y2="0" stroke="var(--bs-border-color)"
                                            stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                        <line x1="0" y1="258.348" x2="701.830078125" y2="258.348"
                                            stroke="var(--bs-border-color)" stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line x1="0" y1="258.348" x2="701.830078125" y2="258.348" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g class="apexcharts-bar-series apexcharts-plot-series">
                                        <g class="apexcharts-series" seriesName="Basic" rel="1" data:realIndex="0">
                                            <path
                                                d="M 21.93218994140625 258.349 L 21.93218994140625 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 21.93218994140625 258.349 L 21.93218994140625 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 z"
                                                pathFrom="M 21.93218994140625 258.349 L 21.93218994140625 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 L 36.55364990234375 258.349 L 21.93218994140625 258.349 z"
                                                cy="258.348" cx="80.41802978515625" j="0" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 80.41802978515625 258.349 L 80.41802978515625 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 80.41802978515625 258.349 L 80.41802978515625 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 z"
                                                pathFrom="M 80.41802978515625 258.349 L 80.41802978515625 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 L 95.03948974609375 258.349 L 80.41802978515625 258.349 z"
                                                cy="258.348" cx="138.90386962890625" j="1" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 138.90386962890625 258.349 L 138.90386962890625 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 138.90386962890625 258.349 L 138.90386962890625 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 z"
                                                pathFrom="M 138.90386962890625 258.349 L 138.90386962890625 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 L 153.52532958984375 258.349 L 138.90386962890625 258.349 z"
                                                cy="258.348" cx="197.38970947265625" j="2" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 197.38970947265625 258.349 L 197.38970947265625 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 197.38970947265625 258.349 L 197.38970947265625 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 z"
                                                pathFrom="M 197.38970947265625 258.349 L 197.38970947265625 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 L 212.01116943359375 258.349 L 197.38970947265625 258.349 z"
                                                cy="258.348" cx="255.87554931640625" j="3" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 255.87554931640625 258.349 L 255.87554931640625 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 255.87554931640625 258.349 L 255.87554931640625 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 z"
                                                pathFrom="M 255.87554931640625 258.349 L 255.87554931640625 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 L 270.49700927734375 258.349 L 255.87554931640625 258.349 z"
                                                cy="258.348" cx="314.36138916015625" j="4" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 314.36138916015625 258.349 L 314.36138916015625 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 314.36138916015625 258.349 L 314.36138916015625 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 z"
                                                pathFrom="M 314.36138916015625 258.349 L 314.36138916015625 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 L 328.98284912109375 258.349 L 314.36138916015625 258.349 z"
                                                cy="258.348" cx="372.84722900390625" j="5" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 372.84722900390625 258.349 L 372.84722900390625 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 372.84722900390625 258.349 L 372.84722900390625 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 z"
                                                pathFrom="M 372.84722900390625 258.349 L 372.84722900390625 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 L 387.46868896484375 258.349 L 372.84722900390625 258.349 z"
                                                cy="258.348" cx="431.33306884765625" j="6" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 431.33306884765625 258.349 L 431.33306884765625 196.76200000000003 C 431.33306884765625 195.26200000000003 432.83306884765625 193.76200000000003 434.33306884765625 193.76200000000003 L 442.95452880859375 193.76200000000003 C 444.45452880859375 193.76200000000003 445.95452880859375 195.26200000000003 445.95452880859375 196.76200000000003 L 445.95452880859375 258.349 z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area apexcharts-flip-y"
                                                index="0" clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 431.33306884765625 258.349 L 431.33306884765625 196.76200000000003 C 431.33306884765625 195.26200000000003 432.83306884765625 193.76200000000003 434.33306884765625 193.76200000000003 L 442.95452880859375 193.76200000000003 C 444.45452880859375 193.76200000000003 445.95452880859375 195.26200000000003 445.95452880859375 196.76200000000003 L 445.95452880859375 258.349 z "
                                                pathFrom="M 431.33306884765625 258.349 L 431.33306884765625 258.349 L 445.95452880859375 258.349 L 445.95452880859375 258.349 L 445.95452880859375 258.349 L 445.95452880859375 258.349 L 445.95452880859375 258.349 L 431.33306884765625 258.349 z"
                                                cy="193.76100000000002" cx="489.81890869140625" j="7" val="1"
                                                barHeight="64.587" barWidth="14.6214599609375">
                                            </path>
                                            <path
                                                d="M 489.81890869140625 258.349 L 489.81890869140625 132.175 C 489.81890869140625 130.675 491.31890869140625 129.175 492.81890869140625 129.175 L 501.44036865234375 129.175 C 502.94036865234375 129.175 504.44036865234375 130.675 504.44036865234375 132.175 L 504.44036865234375 258.349 z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area apexcharts-flip-y"
                                                index="0" clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 489.81890869140625 258.349 L 489.81890869140625 132.175 C 489.81890869140625 130.675 491.31890869140625 129.175 492.81890869140625 129.175 L 501.44036865234375 129.175 C 502.94036865234375 129.175 504.44036865234375 130.675 504.44036865234375 132.175 L 504.44036865234375 258.349 z "
                                                pathFrom="M 489.81890869140625 258.349 L 489.81890869140625 258.349 L 504.44036865234375 258.349 L 504.44036865234375 258.349 L 504.44036865234375 258.349 L 504.44036865234375 258.349 L 504.44036865234375 258.349 L 489.81890869140625 258.349 z"
                                                cy="129.174" cx="548.3047485351562" j="8" val="2" barHeight="129.174"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 548.3047485351562 255.349 L 548.3047485351562 196.76200000000003 C 548.3047485351562 195.26200000000003 549.8047485351562 193.76200000000003 551.3047485351562 193.76200000000003 L 559.9262084960938 193.76200000000003 C 561.4262084960938 193.76200000000003 562.9262084960938 195.26200000000003 562.9262084960938 196.76200000000003 L 562.9262084960938 255.349 C 562.9262084960938 256.849 561.4262084960938 258.349 559.9262084960938 258.349 L 551.3047485351562 258.349 C 549.8047485351562 258.349 548.3047485351562 256.849 548.3047485351562 255.349 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 548.3047485351562 255.349 L 548.3047485351562 196.76200000000003 C 548.3047485351562 195.26200000000003 549.8047485351562 193.76200000000003 551.3047485351562 193.76200000000003 L 559.9262084960938 193.76200000000003 C 561.4262084960938 193.76200000000003 562.9262084960938 195.26200000000003 562.9262084960938 196.76200000000003 L 562.9262084960938 255.349 C 562.9262084960938 256.849 561.4262084960938 258.349 559.9262084960938 258.349 L 551.3047485351562 258.349 C 549.8047485351562 258.349 548.3047485351562 256.849 548.3047485351562 255.349 Z "
                                                pathFrom="M 548.3047485351562 258.349 L 548.3047485351562 258.349 L 562.9262084960938 258.349 L 562.9262084960938 258.349 L 562.9262084960938 258.349 L 562.9262084960938 258.349 L 562.9262084960938 258.349 L 548.3047485351562 258.349 Z"
                                                cy="193.76100000000002" cx="606.7905883789062" j="9" val="1"
                                                barHeight="64.587" barWidth="14.6214599609375">
                                            </path>
                                            <path
                                                d="M 606.7905883789062 258.349 L 606.7905883789062 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 606.7905883789062 258.349 L 606.7905883789062 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 z"
                                                pathFrom="M 606.7905883789062 258.349 L 606.7905883789062 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 L 621.4120483398438 258.349 L 606.7905883789062 258.349 z"
                                                cy="258.348" cx="665.2764282226562" j="10" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 665.2764282226562 258.349 L 665.2764282226562 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 665.2764282226562 258.349 L 665.2764282226562 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 z"
                                                pathFrom="M 665.2764282226562 258.349 L 665.2764282226562 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 L 679.8978881835938 258.349 L 665.2764282226562 258.349 z"
                                                cy="258.348" cx="723.7622680664062" j="11" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-series" seriesName="PremiumxPlan" rel="2"
                                            data:realIndex="1">
                                            <path
                                                d="M 21.93218994140625 258.34999999999997 L 21.93218994140625 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 21.93218994140625 258.34999999999997 L 21.93218994140625 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 z"
                                                pathFrom="M 21.93218994140625 258.34999999999997 L 21.93218994140625 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 L 36.55364990234375 258.34999999999997 L 21.93218994140625 258.34999999999997 z"
                                                cy="258.349" cx="80.41802978515625" j="0" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 80.41802978515625 258.34999999999997 L 80.41802978515625 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 80.41802978515625 258.34999999999997 L 80.41802978515625 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 z"
                                                pathFrom="M 80.41802978515625 258.34999999999997 L 80.41802978515625 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 L 95.03948974609375 258.34999999999997 L 80.41802978515625 258.34999999999997 z"
                                                cy="258.349" cx="138.90386962890625" j="1" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 138.90386962890625 258.34999999999997 L 138.90386962890625 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 138.90386962890625 258.34999999999997 L 138.90386962890625 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 z"
                                                pathFrom="M 138.90386962890625 258.34999999999997 L 138.90386962890625 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 L 153.52532958984375 258.34999999999997 L 138.90386962890625 258.34999999999997 z"
                                                cy="258.349" cx="197.38970947265625" j="2" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 197.38970947265625 258.34999999999997 L 197.38970947265625 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 197.38970947265625 258.34999999999997 L 197.38970947265625 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 z"
                                                pathFrom="M 197.38970947265625 258.34999999999997 L 197.38970947265625 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 L 212.01116943359375 258.34999999999997 L 197.38970947265625 258.34999999999997 z"
                                                cy="258.349" cx="255.87554931640625" j="3" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 255.87554931640625 258.34999999999997 L 255.87554931640625 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 255.87554931640625 258.34999999999997 L 255.87554931640625 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 z"
                                                pathFrom="M 255.87554931640625 258.34999999999997 L 255.87554931640625 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 L 270.49700927734375 258.34999999999997 L 255.87554931640625 258.34999999999997 z"
                                                cy="258.349" cx="314.36138916015625" j="4" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 314.36138916015625 255.34999999999997 L 314.36138916015625 196.763 C 314.36138916015625 195.263 315.86138916015625 193.763 317.36138916015625 193.763 L 325.98284912109375 193.763 C 327.48284912109375 193.763 328.98284912109375 195.263 328.98284912109375 196.763 L 328.98284912109375 255.34999999999997 C 328.98284912109375 256.84999999999997 327.48284912109375 258.34999999999997 325.98284912109375 258.34999999999997 L 317.36138916015625 258.34999999999997 C 315.86138916015625 258.34999999999997 314.36138916015625 256.84999999999997 314.36138916015625 255.34999999999997 Z "
                                                fill="var(--bs-primary-tint-20)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-20)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 314.36138916015625 255.34999999999997 L 314.36138916015625 196.763 C 314.36138916015625 195.263 315.86138916015625 193.763 317.36138916015625 193.763 L 325.98284912109375 193.763 C 327.48284912109375 193.763 328.98284912109375 195.263 328.98284912109375 196.763 L 328.98284912109375 255.34999999999997 C 328.98284912109375 256.84999999999997 327.48284912109375 258.34999999999997 325.98284912109375 258.34999999999997 L 317.36138916015625 258.34999999999997 C 315.86138916015625 258.34999999999997 314.36138916015625 256.84999999999997 314.36138916015625 255.34999999999997 Z "
                                                pathFrom="M 314.36138916015625 258.34999999999997 L 314.36138916015625 258.34999999999997 L 328.98284912109375 258.34999999999997 L 328.98284912109375 258.34999999999997 L 328.98284912109375 258.34999999999997 L 328.98284912109375 258.34999999999997 L 328.98284912109375 258.34999999999997 L 314.36138916015625 258.34999999999997 Z"
                                                cy="193.762" cx="372.84722900390625" j="5" val="1" barHeight="64.587"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 372.84722900390625 258.34999999999997 L 372.84722900390625 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 372.84722900390625 258.34999999999997 L 372.84722900390625 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 z"
                                                pathFrom="M 372.84722900390625 258.34999999999997 L 372.84722900390625 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 L 387.46868896484375 258.34999999999997 L 372.84722900390625 258.34999999999997 z"
                                                cy="258.349" cx="431.33306884765625" j="6" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 431.33306884765625 193.76300000000003 L 431.33306884765625 129.17600000000002 L 445.95452880859375 129.17600000000002 L 445.95452880859375 193.76300000000003 z"
                                                fill="var(--bs-primary-tint-20)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-20)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 431.33306884765625 193.76300000000003 L 431.33306884765625 129.17600000000002 L 445.95452880859375 129.17600000000002 L 445.95452880859375 193.76300000000003 z"
                                                pathFrom="M 431.33306884765625 193.76300000000003 L 431.33306884765625 193.76300000000003 L 445.95452880859375 193.76300000000003 L 445.95452880859375 193.76300000000003 L 445.95452880859375 193.76300000000003 L 445.95452880859375 193.76300000000003 L 445.95452880859375 193.76300000000003 L 431.33306884765625 193.76300000000003 z"
                                                cy="129.175" cx="489.81890869140625" j="7" val="1" barHeight="64.587"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 489.81890869140625 129.17600000000002 L 489.81890869140625 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 489.81890869140625 129.17600000000002 L 489.81890869140625 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 z"
                                                pathFrom="M 489.81890869140625 129.17600000000002 L 489.81890869140625 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 L 504.44036865234375 129.17600000000002 L 489.81890869140625 129.17600000000002 z"
                                                cy="129.175" cx="548.3047485351562" j="8" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 548.3047485351562 193.76300000000003 L 548.3047485351562 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 548.3047485351562 193.76300000000003 L 548.3047485351562 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 z"
                                                pathFrom="M 548.3047485351562 193.76300000000003 L 548.3047485351562 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 L 562.9262084960938 193.76300000000003 L 548.3047485351562 193.76300000000003 z"
                                                cy="193.76200000000003" cx="606.7905883789062" j="9" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 606.7905883789062 258.34999999999997 L 606.7905883789062 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 606.7905883789062 258.34999999999997 L 606.7905883789062 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 z"
                                                pathFrom="M 606.7905883789062 258.34999999999997 L 606.7905883789062 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 L 621.4120483398438 258.34999999999997 L 606.7905883789062 258.34999999999997 z"
                                                cy="258.349" cx="665.2764282226562" j="10" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 665.2764282226562 258.34999999999997 L 665.2764282226562 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 665.2764282226562 258.34999999999997 L 665.2764282226562 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 z"
                                                pathFrom="M 665.2764282226562 258.34999999999997 L 665.2764282226562 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 L 679.8978881835938 258.34999999999997 L 665.2764282226562 258.34999999999997 z"
                                                cy="258.349" cx="723.7622680664062" j="11" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-series" seriesName="UltimatexPlan" rel="3"
                                            data:realIndex="2">
                                            <path
                                                d="M 21.93218994140625 258.35099999999994 L 21.93218994140625 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 21.93218994140625 258.35099999999994 L 21.93218994140625 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 z"
                                                pathFrom="M 21.93218994140625 258.35099999999994 L 21.93218994140625 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 L 36.55364990234375 258.35099999999994 L 21.93218994140625 258.35099999999994 z"
                                                cy="258.34999999999997" cx="80.41802978515625" j="0" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 80.41802978515625 258.35099999999994 L 80.41802978515625 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 80.41802978515625 258.35099999999994 L 80.41802978515625 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 z"
                                                pathFrom="M 80.41802978515625 258.35099999999994 L 80.41802978515625 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 L 95.03948974609375 258.35099999999994 L 80.41802978515625 258.35099999999994 z"
                                                cy="258.34999999999997" cx="138.90386962890625" j="1" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 138.90386962890625 258.35099999999994 L 138.90386962890625 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 138.90386962890625 258.35099999999994 L 138.90386962890625 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 z"
                                                pathFrom="M 138.90386962890625 258.35099999999994 L 138.90386962890625 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 L 153.52532958984375 258.35099999999994 L 138.90386962890625 258.35099999999994 z"
                                                cy="258.34999999999997" cx="197.38970947265625" j="2" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 197.38970947265625 258.35099999999994 L 197.38970947265625 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 197.38970947265625 258.35099999999994 L 197.38970947265625 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 z"
                                                pathFrom="M 197.38970947265625 258.35099999999994 L 197.38970947265625 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 L 212.01116943359375 258.35099999999994 L 197.38970947265625 258.35099999999994 z"
                                                cy="258.34999999999997" cx="255.87554931640625" j="3" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 255.87554931640625 255.35099999999994 L 255.87554931640625 196.76399999999998 C 255.87554931640625 195.26399999999998 257.37554931640625 193.76399999999998 258.87554931640625 193.76399999999998 L 267.49700927734375 193.76399999999998 C 268.99700927734375 193.76399999999998 270.49700927734375 195.26399999999998 270.49700927734375 196.76399999999998 L 270.49700927734375 255.35099999999994 C 270.49700927734375 256.85099999999994 268.99700927734375 258.35099999999994 267.49700927734375 258.35099999999994 L 258.87554931640625 258.35099999999994 C 257.37554931640625 258.35099999999994 255.87554931640625 256.85099999999994 255.87554931640625 255.35099999999994 Z "
                                                fill="var(--bs-primary-tint-40)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-40)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 255.87554931640625 255.35099999999994 L 255.87554931640625 196.76399999999998 C 255.87554931640625 195.26399999999998 257.37554931640625 193.76399999999998 258.87554931640625 193.76399999999998 L 267.49700927734375 193.76399999999998 C 268.99700927734375 193.76399999999998 270.49700927734375 195.26399999999998 270.49700927734375 196.76399999999998 L 270.49700927734375 255.35099999999994 C 270.49700927734375 256.85099999999994 268.99700927734375 258.35099999999994 267.49700927734375 258.35099999999994 L 258.87554931640625 258.35099999999994 C 257.37554931640625 258.35099999999994 255.87554931640625 256.85099999999994 255.87554931640625 255.35099999999994 Z "
                                                pathFrom="M 255.87554931640625 258.35099999999994 L 255.87554931640625 258.35099999999994 L 270.49700927734375 258.35099999999994 L 270.49700927734375 258.35099999999994 L 270.49700927734375 258.35099999999994 L 270.49700927734375 258.35099999999994 L 270.49700927734375 258.35099999999994 L 255.87554931640625 258.35099999999994 Z"
                                                cy="193.76299999999998" cx="314.36138916015625" j="4" val="1"
                                                barHeight="64.587" barWidth="14.6214599609375">
                                            </path>
                                            <path
                                                d="M 314.36138916015625 193.764 L 314.36138916015625 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 314.36138916015625 193.764 L 314.36138916015625 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 z"
                                                pathFrom="M 314.36138916015625 193.764 L 314.36138916015625 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 L 328.98284912109375 193.764 L 314.36138916015625 193.764 z"
                                                cy="193.763" cx="372.84722900390625" j="5" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 372.84722900390625 258.35099999999994 L 372.84722900390625 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 372.84722900390625 258.35099999999994 L 372.84722900390625 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 z"
                                                pathFrom="M 372.84722900390625 258.35099999999994 L 372.84722900390625 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 L 387.46868896484375 258.35099999999994 L 372.84722900390625 258.35099999999994 z"
                                                cy="258.34999999999997" cx="431.33306884765625" j="6" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 431.33306884765625 129.17700000000002 L 431.33306884765625 67.59000000000002 C 431.33306884765625 66.09000000000002 432.83306884765625 64.59000000000002 434.33306884765625 64.59000000000002 L 442.95452880859375 64.59000000000002 C 444.45452880859375 64.59000000000002 445.95452880859375 66.09000000000002 445.95452880859375 67.59000000000002 L 445.95452880859375 129.17700000000002 z "
                                                fill="var(--bs-primary-tint-40)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-40)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 431.33306884765625 129.17700000000002 L 431.33306884765625 67.59000000000002 C 431.33306884765625 66.09000000000002 432.83306884765625 64.59000000000002 434.33306884765625 64.59000000000002 L 442.95452880859375 64.59000000000002 C 444.45452880859375 64.59000000000002 445.95452880859375 66.09000000000002 445.95452880859375 67.59000000000002 L 445.95452880859375 129.17700000000002 z "
                                                pathFrom="M 431.33306884765625 129.17700000000002 L 431.33306884765625 129.17700000000002 L 445.95452880859375 129.17700000000002 L 445.95452880859375 129.17700000000002 L 445.95452880859375 129.17700000000002 L 445.95452880859375 129.17700000000002 L 445.95452880859375 129.17700000000002 L 431.33306884765625 129.17700000000002 z"
                                                cy="64.58900000000001" cx="489.81890869140625" j="7" val="1"
                                                barHeight="64.587" barWidth="14.6214599609375">
                                            </path>
                                            <path
                                                d="M 489.81890869140625 129.17700000000002 L 489.81890869140625 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 489.81890869140625 129.17700000000002 L 489.81890869140625 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 z"
                                                pathFrom="M 489.81890869140625 129.17700000000002 L 489.81890869140625 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 L 504.44036865234375 129.17700000000002 L 489.81890869140625 129.17700000000002 z"
                                                cy="129.17600000000002" cx="548.3047485351562" j="8" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 548.3047485351562 193.76400000000004 L 548.3047485351562 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 548.3047485351562 193.76400000000004 L 548.3047485351562 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 z"
                                                pathFrom="M 548.3047485351562 193.76400000000004 L 548.3047485351562 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 L 562.9262084960938 193.76400000000004 L 548.3047485351562 193.76400000000004 z"
                                                cy="193.76300000000003" cx="606.7905883789062" j="9" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 606.7905883789062 258.35099999999994 L 606.7905883789062 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 606.7905883789062 258.35099999999994 L 606.7905883789062 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 z"
                                                pathFrom="M 606.7905883789062 258.35099999999994 L 606.7905883789062 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 L 621.4120483398438 258.35099999999994 L 606.7905883789062 258.35099999999994 z"
                                                cy="258.34999999999997" cx="665.2764282226562" j="10" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 665.2764282226562 258.35099999999994 L 665.2764282226562 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-40)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="2"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 665.2764282226562 258.35099999999994 L 665.2764282226562 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 z"
                                                pathFrom="M 665.2764282226562 258.35099999999994 L 665.2764282226562 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 L 679.8978881835938 258.35099999999994 L 665.2764282226562 258.35099999999994 z"
                                                cy="258.34999999999997" cx="723.7622680664062" j="11" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-series" seriesName="ElitexPlan" rel="4" data:realIndex="3">
                                            <path
                                                d="M 21.93218994140625 258.3519999999999 L 21.93218994140625 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 21.93218994140625 258.3519999999999 L 21.93218994140625 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 z"
                                                pathFrom="M 21.93218994140625 258.3519999999999 L 21.93218994140625 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 L 36.55364990234375 258.3519999999999 L 21.93218994140625 258.3519999999999 z"
                                                cy="258.35099999999994" cx="80.41802978515625" j="0" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 80.41802978515625 258.3519999999999 L 80.41802978515625 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 80.41802978515625 258.3519999999999 L 80.41802978515625 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 z"
                                                pathFrom="M 80.41802978515625 258.3519999999999 L 80.41802978515625 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 L 95.03948974609375 258.3519999999999 L 80.41802978515625 258.3519999999999 z"
                                                cy="258.35099999999994" cx="138.90386962890625" j="1" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 138.90386962890625 258.3519999999999 L 138.90386962890625 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 138.90386962890625 258.3519999999999 L 138.90386962890625 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 z"
                                                pathFrom="M 138.90386962890625 258.3519999999999 L 138.90386962890625 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 L 153.52532958984375 258.3519999999999 L 138.90386962890625 258.3519999999999 z"
                                                cy="258.35099999999994" cx="197.38970947265625" j="2" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 197.38970947265625 258.3519999999999 L 197.38970947265625 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 197.38970947265625 258.3519999999999 L 197.38970947265625 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 z"
                                                pathFrom="M 197.38970947265625 258.3519999999999 L 197.38970947265625 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 L 212.01116943359375 258.3519999999999 L 197.38970947265625 258.3519999999999 z"
                                                cy="258.35099999999994" cx="255.87554931640625" j="3" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 255.87554931640625 193.765 L 255.87554931640625 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 255.87554931640625 193.765 L 255.87554931640625 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 z"
                                                pathFrom="M 255.87554931640625 193.765 L 255.87554931640625 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 L 270.49700927734375 193.765 L 255.87554931640625 193.765 z"
                                                cy="193.76399999999998" cx="314.36138916015625" j="4" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 314.36138916015625 193.76500000000001 L 314.36138916015625 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 314.36138916015625 193.76500000000001 L 314.36138916015625 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 z"
                                                pathFrom="M 314.36138916015625 193.76500000000001 L 314.36138916015625 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 L 328.98284912109375 193.76500000000001 L 314.36138916015625 193.76500000000001 z"
                                                cy="193.764" cx="372.84722900390625" j="5" val="0" barHeight="0"
                                                barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 372.84722900390625 258.3519999999999 L 372.84722900390625 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 372.84722900390625 258.3519999999999 L 372.84722900390625 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 z"
                                                pathFrom="M 372.84722900390625 258.3519999999999 L 372.84722900390625 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 L 387.46868896484375 258.3519999999999 L 372.84722900390625 258.3519999999999 z"
                                                cy="258.35099999999994" cx="431.33306884765625" j="6" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 431.33306884765625 64.59100000000002 L 431.33306884765625 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 431.33306884765625 64.59100000000002 L 431.33306884765625 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 z"
                                                pathFrom="M 431.33306884765625 64.59100000000002 L 431.33306884765625 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 L 445.95452880859375 64.59100000000002 L 431.33306884765625 64.59100000000002 z"
                                                cy="64.59000000000002" cx="489.81890869140625" j="7" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 489.81890869140625 129.17800000000003 L 489.81890869140625 67.59100000000002 C 489.81890869140625 66.09100000000002 491.31890869140625 64.59100000000002 492.81890869140625 64.59100000000002 L 501.44036865234375 64.59100000000002 C 502.94036865234375 64.59100000000002 504.44036865234375 66.09100000000002 504.44036865234375 67.59100000000002 L 504.44036865234375 129.17800000000003 z "
                                                fill="var(--bs-primary-tint-60)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-60)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 489.81890869140625 129.17800000000003 L 489.81890869140625 67.59100000000002 C 489.81890869140625 66.09100000000002 491.31890869140625 64.59100000000002 492.81890869140625 64.59100000000002 L 501.44036865234375 64.59100000000002 C 502.94036865234375 64.59100000000002 504.44036865234375 66.09100000000002 504.44036865234375 67.59100000000002 L 504.44036865234375 129.17800000000003 z "
                                                pathFrom="M 489.81890869140625 129.17800000000003 L 489.81890869140625 129.17800000000003 L 504.44036865234375 129.17800000000003 L 504.44036865234375 129.17800000000003 L 504.44036865234375 129.17800000000003 L 504.44036865234375 129.17800000000003 L 504.44036865234375 129.17800000000003 L 489.81890869140625 129.17800000000003 z"
                                                cy="64.59000000000002" cx="548.3047485351562" j="8" val="1"
                                                barHeight="64.587" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 548.3047485351562 193.76500000000004 L 548.3047485351562 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 548.3047485351562 193.76500000000004 L 548.3047485351562 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 z"
                                                pathFrom="M 548.3047485351562 193.76500000000004 L 548.3047485351562 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 L 562.9262084960938 193.76500000000004 L 548.3047485351562 193.76500000000004 z"
                                                cy="193.76400000000004" cx="606.7905883789062" j="9" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 606.7905883789062 258.3519999999999 L 606.7905883789062 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 606.7905883789062 258.3519999999999 L 606.7905883789062 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 z"
                                                pathFrom="M 606.7905883789062 258.3519999999999 L 606.7905883789062 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 L 621.4120483398438 258.3519999999999 L 606.7905883789062 258.3519999999999 z"
                                                cy="258.35099999999994" cx="665.2764282226562" j="10" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <path
                                                d="M 665.2764282226562 258.3519999999999 L 665.2764282226562 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-60)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="3"
                                                clip-path="url(#gridRectBarMaski1lh1lfn)"
                                                pathTo="M 665.2764282226562 258.3519999999999 L 665.2764282226562 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 z"
                                                pathFrom="M 665.2764282226562 258.3519999999999 L 665.2764282226562 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 L 679.8978881835938 258.3519999999999 L 665.2764282226562 258.3519999999999 z"
                                                cy="258.35099999999994" cx="723.7622680664062" j="11" val="0"
                                                barHeight="0" barWidth="14.6214599609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaski1lh1lfn)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="0">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.242919921875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.242919921875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.728759765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.728759765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="146.214599609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="146.214599609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="204.700439453125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="204.700439453125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="263.186279296875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="263.186279296875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="321.672119140625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="321.672119140625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="380.157958984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="380.157958984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="438.643798828125" y="233.05450000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="438.643798828125"
                                                    cy="233.05450000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="497.129638671875" y="200.76100000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="497.129638671875"
                                                    cy="200.76100000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;">2</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="555.615478515625" y="233.05450000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="555.615478515625"
                                                    cy="233.05450000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="614.101318359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="614.101318359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="672.587158203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="672.587158203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="1">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.242919921875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.242919921875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.728759765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.728759765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="146.214599609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="146.214599609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="204.700439453125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="204.700439453125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="263.186279296875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="263.186279296875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="321.672119140625" y="233.0555" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="321.672119140625"
                                                    cy="233.0555"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="380.157958984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="380.157958984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="438.643798828125" y="168.4685" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="438.643798828125"
                                                    cy="168.4685"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="497.129638671875" y="136.175" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="497.129638671875"
                                                    cy="136.175"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="555.615478515625" y="200.76200000000003" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="555.615478515625"
                                                    cy="200.76200000000003"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="614.101318359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="614.101318359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="672.587158203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="672.587158203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="2">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.242919921875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.242919921875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.728759765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.728759765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="146.214599609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="146.214599609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="204.700439453125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="204.700439453125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="263.186279296875" y="233.05649999999997" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="263.186279296875"
                                                    cy="233.05649999999997"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="321.672119140625" y="200.763" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="321.672119140625"
                                                    cy="200.763"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="380.157958984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="380.157958984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="438.643798828125" y="103.88250000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="438.643798828125"
                                                    cy="103.88250000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="497.129638671875" y="136.17600000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="497.129638671875"
                                                    cy="136.17600000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="555.615478515625" y="200.76300000000003" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="555.615478515625"
                                                    cy="200.76300000000003"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="614.101318359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="614.101318359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="672.587158203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="672.587158203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="3">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.242919921875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.242919921875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="29.242919921875" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.728759765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.728759765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="87.728759765625" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="146.214599609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="146.214599609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="146.214599609375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="204.700439453125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="204.700439453125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="204.700439453125" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="263.186279296875" y="200.76399999999998" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="263.186279296875"
                                                    cy="200.76399999999998"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="263.186279296875" y="187.76399999999998" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">1</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="321.672119140625" y="200.764" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="321.672119140625"
                                                    cy="200.764"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="321.672119140625" y="187.763" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">1</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="380.157958984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="380.157958984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="380.157958984375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="438.643798828125" y="71.59000000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="438.643798828125"
                                                    cy="71.59000000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="438.643798828125" y="58.59000000000002" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">3</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="497.129638671875" y="103.88350000000003" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="497.129638671875"
                                                    cy="103.88350000000003"
                                                    style="font-family: Helvetica, Arial, sans-serif;">1</text></g>
                                            <text x="497.129638671875" y="58.59000000000002" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">3</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="555.615478515625" y="200.76400000000004" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="555.615478515625"
                                                    cy="200.76400000000004"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="555.615478515625" y="187.76200000000003" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">1</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="614.101318359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="614.101318359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="614.101318359375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="672.587158203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="672.587158203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="672.587158203125" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                        </g>
                                    </g>
                                    <line x1="0" y1="0" x2="701.830078125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line x1="0" y1="0" x2="701.830078125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    </line>
                                    <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text
                                                x="29.242919921875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jan</tspan>
                                                <title>Jan</title>
                                            </text><text x="87.728759765625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Feb</tspan>
                                                <title>Feb</title>
                                            </text><text x="146.214599609375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Mar</tspan>
                                                <title>Mar</title>
                                            </text><text x="204.700439453125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Apr</tspan>
                                                <title>Apr</title>
                                            </text><text x="263.186279296875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>May</tspan>
                                                <title>May</title>
                                            </text><text x="321.672119140625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jun</tspan>
                                                <title>Jun</title>
                                            </text><text x="380.157958984375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jul</tspan>
                                                <title>Jul</title>
                                            </text><text x="438.643798828125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Aug</tspan>
                                                <title>Aug</title>
                                            </text><text x="497.129638671875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Sep</tspan>
                                                <title>Sep</title>
                                            </text><text x="555.615478515625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Oct</tspan>
                                                <title>Oct</title>
                                            </text><text x="614.101318359375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Nov</tspan>
                                                <title>Nov</title>
                                            </text><text x="672.587158203125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Dec</tspan>
                                                <title>Dec</title>
                                            </text></g>
                                    </g>
                                    <g class="apexcharts-yaxis-annotations"></g>
                                    <g class="apexcharts-xaxis-annotations"></g>
                                    <g class="apexcharts-point-annotations"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                style="right: 0px; position: absolute; left: 0px; top: 325px; max-height: 175px;">
                                <div class="apexcharts-legend-series" rel="1" seriesname="Basic" data:collapsed="false"
                                    style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                        data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="1" i="0"
                                        data:default-text="Basic" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Basic</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="2" seriesname="PremiumxPlan"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary-tint-20)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="2" i="1"
                                        data:default-text="Premium%20Plan" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Premium
                                        Plan</span></div>
                                <div class="apexcharts-legend-series" rel="3" seriesname="UltimatexPlan"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="3" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary-tint-40)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="3" i="2"
                                        data:default-text="Ultimate%20Plan" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Ultimate
                                        Plan</span></div>
                                <div class="apexcharts-legend-series" rel="4" seriesname="ElitexPlan"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="4" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary-tint-60)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="4" i="3"
                                        data:default-text="Elite%20Plan" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Elite
                                        Plan</span></div>
                            </div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                    style="order: 1;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                    style="order: 2;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary-tint-20);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-2"
                                    style="order: 3;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary-tint-40);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-3"
                                    style="order: 4;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary-tint-60);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg></div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG
                                    </div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG
                                    </div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-block card-height">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <h3 class="card-title">Most Watched</h3>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle most_watch" type="button" id="dropdownMostWatch"
                            data-bs-toggle="dropdown" aria-expanded="false">Year</button>
                        <ul class="dropdown-menu dropdown-menu-soft-primary sub-dropdown"
                            aria-labelledby="dropdownMostWatch">
                            <li><a class="mostwatch-dropdown-item dropdown-item" data-type="Year">Year</a></li>
                            <li><a class="mostwatch-dropdown-item dropdown-item" data-type="Month">Month</a></li>
                            <li><a class="mostwatch-dropdown-item dropdown-item" data-type="Week">Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-most-watch" style="min-height: 365px;">
                        <div id="apexcharts1z27rwnlg"
                            class="apexcharts-canvas apexcharts1z27rwnlg apexcharts-theme-light"
                            style="width: 758px; height: 350px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="758" height="350">
                                <foreignObject x="0" y="0" width="758" height="350">
                                    <style type="text/css">
                                    .apexcharts-flip-y {
                                        transform: scaleY(-1) translateY(-100%);
                                        transform-origin: top;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-flip-x {
                                        transform: scaleX(-1);
                                        transform-origin: center;
                                        transform-box: fill-box;
                                    }

                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                        flex-direction: column;
                                    }

                                    .apexcharts-legend-group {
                                        display: flex;
                                    }

                                    .apexcharts-legend-group-vertical {
                                        flex-direction: column-reverse;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom,
                                    .apexcharts-legend.apx-legend-position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        justify-content: flex-start;
                                        align-items: flex-start;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                        align-items: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        cursor: pointer;
                                        margin-right: 1px;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                    </style>
                                </foreignObject>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                <g class="apexcharts-yaxis" rel="0" transform="translate(9.25, 0)">
                                    <g class="apexcharts-yaxis-texts-g"><text x="20" y="33.666666666666664"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>50</tspan>
                                            <title>50</title>
                                        </text><text x="20" y="85.33626666666666" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>40</tspan>
                                            <title>40</title>
                                        </text><text x="20" y="137.00586666666666" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>30</tspan>
                                            <title>30</title>
                                        </text><text x="20" y="188.67546666666667" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>20</tspan>
                                            <title>20</title>
                                        </text><text x="20" y="240.34506666666667" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>10</tspan>
                                            <title>10</title>
                                        </text><text x="20" y="292.0146666666667" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px"
                                            font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan>0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g class="apexcharts-inner apexcharts-graphical" transform="translate(39.25, 30)">
                                    <defs>
                                        <linearGradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1003">
                                            <stop stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0">
                                            </stop>
                                            <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1">
                                            </stop>
                                            <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1">
                                            </stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask1z27rwnlg">
                                            <rect width="700.580078125" height="262.348" x="-2" y="-2" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectBarMask1z27rwnlg">
                                            <rect width="700.580078125" height="262.348" x="-2" y="-2" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask1z27rwnlg">
                                            <rect width="700.580078125" height="258.348" x="-2" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask1z27rwnlg"></clipPath>
                                        <clipPath id="nonForecastMask1z27rwnlg"></clipPath>
                                    </defs>
                                    <rect width="14.5120849609375" height="258.348" x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke="#b6b6b6" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient1003)" class="apexcharts-xcrosshairs" y2="258.348"
                                        filter="none" fill-opacity="0.9"></rect>
                                    <line x1="0" y1="258.348" x2="0" y2="264.348" stroke="#e0e0e0" stroke-dasharray="0"
                                        stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line x1="58.04833984375" y1="258.348" x2="58.04833984375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="116.0966796875" y1="258.348" x2="116.0966796875" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="174.14501953125" y1="258.348" x2="174.14501953125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="232.193359375" y1="258.348" x2="232.193359375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="290.24169921875" y1="258.348" x2="290.24169921875" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="348.2900390625" y1="258.348" x2="348.2900390625" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="406.33837890625" y1="258.348" x2="406.33837890625" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="464.38671875" y1="258.348" x2="464.38671875" y2="264.348" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line x1="522.43505859375" y1="258.348" x2="522.43505859375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="580.4833984375" y1="258.348" x2="580.4833984375" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="638.53173828125" y1="258.348" x2="638.53173828125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line x1="696.580078125" y1="258.348" x2="696.580078125" y2="264.348"
                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <g class="apexcharts-grid">
                                        <g class="apexcharts-gridlines-horizontal">
                                            <line x1="0" y1="51.6696" x2="696.580078125" y2="51.6696"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="103.3392" x2="696.580078125" y2="103.3392"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="155.0088" x2="696.580078125" y2="155.0088"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line x1="0" y1="206.6784" x2="696.580078125" y2="206.6784"
                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g class="apexcharts-gridlines-vertical"></g>
                                        <line x1="0" y1="258.348" x2="696.580078125" y2="258.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt">
                                        </line>
                                        <line x1="0" y1="1" x2="0" y2="258.348" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt">
                                        </line>
                                    </g>
                                    <g class="apexcharts-grid-borders">
                                        <line x1="0" y1="0" x2="696.580078125" y2="0" stroke="var(--bs-border-color)"
                                            stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                        <line x1="0" y1="258.348" x2="696.580078125" y2="258.348"
                                            stroke="var(--bs-border-color)" stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line x1="0" y1="258.348" x2="696.580078125" y2="258.348" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g class="apexcharts-bar-series apexcharts-plot-series">
                                        <g class="apexcharts-series" seriesName="Movie" rel="1" data:realIndex="0">
                                            <path
                                                d="M 21.76812744140625 255.349 L 21.76812744140625 251.01508 C 21.76812744140625 249.51508 23.26812744140625 248.01508 24.76812744140625 248.01508 L 33.28021240234375 248.01508 C 34.78021240234375 248.01508 36.28021240234375 249.51508 36.28021240234375 251.01508 L 36.28021240234375 255.349 C 36.28021240234375 256.849 34.78021240234375 258.349 33.28021240234375 258.349 L 24.76812744140625 258.349 C 23.26812744140625 258.349 21.76812744140625 256.849 21.76812744140625 255.349 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 21.76812744140625 255.349 L 21.76812744140625 251.01508 C 21.76812744140625 249.51508 23.26812744140625 248.01508 24.76812744140625 248.01508 L 33.28021240234375 248.01508 C 34.78021240234375 248.01508 36.28021240234375 249.51508 36.28021240234375 251.01508 L 36.28021240234375 255.349 C 36.28021240234375 256.849 34.78021240234375 258.349 33.28021240234375 258.349 L 24.76812744140625 258.349 C 23.26812744140625 258.349 21.76812744140625 256.849 21.76812744140625 255.349 Z "
                                                pathFrom="M 21.76812744140625 258.349 L 21.76812744140625 258.349 L 36.28021240234375 258.349 L 36.28021240234375 258.349 L 36.28021240234375 258.349 L 36.28021240234375 258.349 L 36.28021240234375 258.349 L 21.76812744140625 258.349 Z"
                                                cy="248.01408" cx="79.81646728515625" j="0" val="2" barHeight="10.33392"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 79.81646728515625 256.18204000000003 L 79.81646728515625 256.18204000000003 C 79.81646728515625 254.68204000000003 81.31646728515625 253.18204000000003 82.81646728515625 253.18204000000003 L 91.32855224609375 253.18204000000003 C 92.82855224609375 253.18204000000003 94.32855224609375 254.68204000000003 94.32855224609375 256.18204000000003 L 94.32855224609375 256.18204000000003 C 94.32855224609375 257.26552000000004 92.82855224609375 258.349 91.32855224609375 258.349 L 82.81646728515625 258.349 C 81.31646728515625 258.349 79.81646728515625 257.26552000000004 79.81646728515625 256.18204000000003 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 79.81646728515625 256.18204000000003 L 79.81646728515625 256.18204000000003 C 79.81646728515625 254.68204000000003 81.31646728515625 253.18204000000003 82.81646728515625 253.18204000000003 L 91.32855224609375 253.18204000000003 C 92.82855224609375 253.18204000000003 94.32855224609375 254.68204000000003 94.32855224609375 256.18204000000003 L 94.32855224609375 256.18204000000003 C 94.32855224609375 257.26552000000004 92.82855224609375 258.349 91.32855224609375 258.349 L 82.81646728515625 258.349 C 81.31646728515625 258.349 79.81646728515625 257.26552000000004 79.81646728515625 256.18204000000003 Z "
                                                pathFrom="M 79.81646728515625 258.349 L 79.81646728515625 258.349 L 94.32855224609375 258.349 L 94.32855224609375 258.349 L 94.32855224609375 258.349 L 94.32855224609375 258.349 L 94.32855224609375 258.349 L 79.81646728515625 258.349 Z"
                                                cy="253.18104000000002" cx="137.86480712890625" j="1" val="1"
                                                barHeight="5.16696" barWidth="14.5120849609375">
                                            </path>
                                            <path
                                                d="M 137.86480712890625 258.349 L 137.86480712890625 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 137.86480712890625 258.349 L 137.86480712890625 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 z"
                                                pathFrom="M 137.86480712890625 258.349 L 137.86480712890625 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 L 152.37689208984375 258.349 L 137.86480712890625 258.349 z"
                                                cy="258.348" cx="195.91314697265625" j="2" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 195.91314697265625 255.349 L 195.91314697265625 251.01508 C 195.91314697265625 249.51508 197.41314697265625 248.01508 198.91314697265625 248.01508 L 207.42523193359375 248.01508 C 208.92523193359375 248.01508 210.42523193359375 249.51508 210.42523193359375 251.01508 L 210.42523193359375 255.349 C 210.42523193359375 256.849 208.92523193359375 258.349 207.42523193359375 258.349 L 198.91314697265625 258.349 C 197.41314697265625 258.349 195.91314697265625 256.849 195.91314697265625 255.349 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 195.91314697265625 255.349 L 195.91314697265625 251.01508 C 195.91314697265625 249.51508 197.41314697265625 248.01508 198.91314697265625 248.01508 L 207.42523193359375 248.01508 C 208.92523193359375 248.01508 210.42523193359375 249.51508 210.42523193359375 251.01508 L 210.42523193359375 255.349 C 210.42523193359375 256.849 208.92523193359375 258.349 207.42523193359375 258.349 L 198.91314697265625 258.349 C 197.41314697265625 258.349 195.91314697265625 256.849 195.91314697265625 255.349 Z "
                                                pathFrom="M 195.91314697265625 258.349 L 195.91314697265625 258.349 L 210.42523193359375 258.349 L 210.42523193359375 258.349 L 210.42523193359375 258.349 L 210.42523193359375 258.349 L 210.42523193359375 258.349 L 195.91314697265625 258.349 Z"
                                                cy="248.01408" cx="253.96148681640625" j="3" val="2"
                                                barHeight="10.33392" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 253.96148681640625 258.349 L 253.96148681640625 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 253.96148681640625 258.349 L 253.96148681640625 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 z"
                                                pathFrom="M 253.96148681640625 258.349 L 253.96148681640625 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 L 268.47357177734375 258.349 L 253.96148681640625 258.349 z"
                                                cy="258.348" cx="312.00982666015625" j="4" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 312.00982666015625 256.18204000000003 L 312.00982666015625 256.18204000000003 C 312.00982666015625 254.68204000000003 313.50982666015625 253.18204000000003 315.00982666015625 253.18204000000003 L 323.52191162109375 253.18204000000003 C 325.02191162109375 253.18204000000003 326.52191162109375 254.68204000000003 326.52191162109375 256.18204000000003 L 326.52191162109375 256.18204000000003 C 326.52191162109375 257.26552000000004 325.02191162109375 258.349 323.52191162109375 258.349 L 315.00982666015625 258.349 C 313.50982666015625 258.349 312.00982666015625 257.26552000000004 312.00982666015625 256.18204000000003 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 312.00982666015625 256.18204000000003 L 312.00982666015625 256.18204000000003 C 312.00982666015625 254.68204000000003 313.50982666015625 253.18204000000003 315.00982666015625 253.18204000000003 L 323.52191162109375 253.18204000000003 C 325.02191162109375 253.18204000000003 326.52191162109375 254.68204000000003 326.52191162109375 256.18204000000003 L 326.52191162109375 256.18204000000003 C 326.52191162109375 257.26552000000004 325.02191162109375 258.349 323.52191162109375 258.349 L 315.00982666015625 258.349 C 313.50982666015625 258.349 312.00982666015625 257.26552000000004 312.00982666015625 256.18204000000003 Z "
                                                pathFrom="M 312.00982666015625 258.349 L 312.00982666015625 258.349 L 326.52191162109375 258.349 L 326.52191162109375 258.349 L 326.52191162109375 258.349 L 326.52191162109375 258.349 L 326.52191162109375 258.349 L 312.00982666015625 258.349 Z"
                                                cy="253.18104000000002" cx="370.05816650390625" j="5" val="1"
                                                barHeight="5.16696" barWidth="14.5120849609375">
                                            </path>
                                            <path
                                                d="M 370.05816650390625 258.349 L 370.05816650390625 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 370.05816650390625 258.349 L 370.05816650390625 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 z"
                                                pathFrom="M 370.05816650390625 258.349 L 370.05816650390625 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 L 384.57025146484375 258.349 L 370.05816650390625 258.349 z"
                                                cy="258.348" cx="428.10650634765625" j="6" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 428.10650634765625 255.349 L 428.10650634765625 245.84812000000002 C 428.10650634765625 244.34812000000002 429.60650634765625 242.84812000000002 431.10650634765625 242.84812000000002 L 439.61859130859375 242.84812000000002 C 441.11859130859375 242.84812000000002 442.61859130859375 244.34812000000002 442.61859130859375 245.84812000000002 L 442.61859130859375 255.349 C 442.61859130859375 256.849 441.11859130859375 258.349 439.61859130859375 258.349 L 431.10650634765625 258.349 C 429.60650634765625 258.349 428.10650634765625 256.849 428.10650634765625 255.349 Z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 428.10650634765625 255.349 L 428.10650634765625 245.84812000000002 C 428.10650634765625 244.34812000000002 429.60650634765625 242.84812000000002 431.10650634765625 242.84812000000002 L 439.61859130859375 242.84812000000002 C 441.11859130859375 242.84812000000002 442.61859130859375 244.34812000000002 442.61859130859375 245.84812000000002 L 442.61859130859375 255.349 C 442.61859130859375 256.849 441.11859130859375 258.349 439.61859130859375 258.349 L 431.10650634765625 258.349 C 429.60650634765625 258.349 428.10650634765625 256.849 428.10650634765625 255.349 Z "
                                                pathFrom="M 428.10650634765625 258.349 L 428.10650634765625 258.349 L 442.61859130859375 258.349 L 442.61859130859375 258.349 L 442.61859130859375 258.349 L 442.61859130859375 258.349 L 442.61859130859375 258.349 L 428.10650634765625 258.349 Z"
                                                cy="242.84712000000002" cx="486.15484619140625" j="7" val="3"
                                                barHeight="15.500880000000002" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 486.15484619140625 258.349 L 486.15484619140625 85.67236 C 486.15484619140625 84.17236 487.65484619140625 82.67236 489.15484619140625 82.67236 L 497.66693115234375 82.67236 C 499.16693115234375 82.67236 500.66693115234375 84.17236 500.66693115234375 85.67236 L 500.66693115234375 258.349 z "
                                                fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area apexcharts-flip-y"
                                                index="0" clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 486.15484619140625 258.349 L 486.15484619140625 85.67236 C 486.15484619140625 84.17236 487.65484619140625 82.67236 489.15484619140625 82.67236 L 497.66693115234375 82.67236 C 499.16693115234375 82.67236 500.66693115234375 84.17236 500.66693115234375 85.67236 L 500.66693115234375 258.349 z "
                                                pathFrom="M 486.15484619140625 258.349 L 486.15484619140625 258.349 L 500.66693115234375 258.349 L 500.66693115234375 258.349 L 500.66693115234375 258.349 L 500.66693115234375 258.349 L 500.66693115234375 258.349 L 486.15484619140625 258.349 z"
                                                cy="82.67135999999999" cx="544.2031860351562" j="8" val="34"
                                                barHeight="175.67664000000002" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 544.2031860351562 258.349 L 544.2031860351562 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 544.2031860351562 258.349 L 544.2031860351562 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 z"
                                                pathFrom="M 544.2031860351562 258.349 L 544.2031860351562 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 L 558.7152709960938 258.349 L 544.2031860351562 258.349 z"
                                                cy="258.348" cx="602.2515258789062" j="9" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 602.2515258789062 258.349 L 602.2515258789062 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 602.2515258789062 258.349 L 602.2515258789062 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 z"
                                                pathFrom="M 602.2515258789062 258.349 L 602.2515258789062 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 L 616.7636108398438 258.349 L 602.2515258789062 258.349 z"
                                                cy="258.348" cx="660.2998657226562" j="10" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 660.2998657226562 258.349 L 660.2998657226562 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="0"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 660.2998657226562 258.349 L 660.2998657226562 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 z"
                                                pathFrom="M 660.2998657226562 258.349 L 660.2998657226562 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 L 674.8119506835938 258.349 L 660.2998657226562 258.349 z"
                                                cy="258.348" cx="718.3482055664062" j="11" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-series" seriesName="TVxShow" rel="2" data:realIndex="1">
                                            <path
                                                d="M 21.76812744140625 248.01608000000002 L 21.76812744140625 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 21.76812744140625 248.01608000000002 L 21.76812744140625 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 z"
                                                pathFrom="M 21.76812744140625 248.01608000000002 L 21.76812744140625 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 L 36.28021240234375 248.01608000000002 L 21.76812744140625 248.01608000000002 z"
                                                cy="248.01508" cx="79.81646728515625" j="0" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 79.81646728515625 253.18304000000003 L 79.81646728515625 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 79.81646728515625 253.18304000000003 L 79.81646728515625 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 z"
                                                pathFrom="M 79.81646728515625 253.18304000000003 L 79.81646728515625 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 L 94.32855224609375 253.18304000000003 L 79.81646728515625 253.18304000000003 z"
                                                cy="253.18204000000003" cx="137.86480712890625" j="1" val="0"
                                                barHeight="0" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 137.86480712890625 258.34999999999997 L 137.86480712890625 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 137.86480712890625 258.34999999999997 L 137.86480712890625 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 z"
                                                pathFrom="M 137.86480712890625 258.34999999999997 L 137.86480712890625 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 L 152.37689208984375 258.34999999999997 L 137.86480712890625 258.34999999999997 z"
                                                cy="258.349" cx="195.91314697265625" j="2" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 195.91314697265625 248.01608000000002 L 195.91314697265625 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 195.91314697265625 248.01608000000002 L 195.91314697265625 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 z"
                                                pathFrom="M 195.91314697265625 248.01608000000002 L 195.91314697265625 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 L 210.42523193359375 248.01608000000002 L 195.91314697265625 248.01608000000002 z"
                                                cy="248.01508" cx="253.96148681640625" j="3" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 253.96148681640625 258.34999999999997 L 253.96148681640625 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 253.96148681640625 258.34999999999997 L 253.96148681640625 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 z"
                                                pathFrom="M 253.96148681640625 258.34999999999997 L 253.96148681640625 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 L 268.47357177734375 258.34999999999997 L 253.96148681640625 258.34999999999997 z"
                                                cy="258.349" cx="312.00982666015625" j="4" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 312.00982666015625 253.18304000000003 L 312.00982666015625 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 312.00982666015625 253.18304000000003 L 312.00982666015625 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 z"
                                                pathFrom="M 312.00982666015625 253.18304000000003 L 312.00982666015625 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 L 326.52191162109375 253.18304000000003 L 312.00982666015625 253.18304000000003 z"
                                                cy="253.18204000000003" cx="370.05816650390625" j="5" val="0"
                                                barHeight="0" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 370.05816650390625 258.34999999999997 L 370.05816650390625 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 370.05816650390625 258.34999999999997 L 370.05816650390625 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 z"
                                                pathFrom="M 370.05816650390625 258.34999999999997 L 370.05816650390625 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 L 384.57025146484375 258.34999999999997 L 370.05816650390625 258.34999999999997 z"
                                                cy="258.349" cx="428.10650634765625" j="6" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 428.10650634765625 242.84912000000003 L 428.10650634765625 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 428.10650634765625 242.84912000000003 L 428.10650634765625 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 z"
                                                pathFrom="M 428.10650634765625 242.84912000000003 L 428.10650634765625 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 L 442.61859130859375 242.84912000000003 L 428.10650634765625 242.84912000000003 z"
                                                cy="242.84812000000002" cx="486.15484619140625" j="7" val="0"
                                                barHeight="0" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 486.15484619140625 82.67336 L 486.15484619140625 49.50463999999999 C 486.15484619140625 48.00463999999999 487.65484619140625 46.50463999999999 489.15484619140625 46.50463999999999 L 497.66693115234375 46.50463999999999 C 499.16693115234375 46.50463999999999 500.66693115234375 48.00463999999999 500.66693115234375 49.50463999999999 L 500.66693115234375 82.67336 z "
                                                fill="var(--bs-primary-tint-20)" fill-opacity="1"
                                                stroke="var(--bs-primary-tint-20)" stroke-opacity="1"
                                                stroke-linecap="square" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 486.15484619140625 82.67336 L 486.15484619140625 49.50463999999999 C 486.15484619140625 48.00463999999999 487.65484619140625 46.50463999999999 489.15484619140625 46.50463999999999 L 497.66693115234375 46.50463999999999 C 499.16693115234375 46.50463999999999 500.66693115234375 48.00463999999999 500.66693115234375 49.50463999999999 L 500.66693115234375 82.67336 z "
                                                pathFrom="M 486.15484619140625 82.67336 L 486.15484619140625 82.67336 L 500.66693115234375 82.67336 L 500.66693115234375 82.67336 L 500.66693115234375 82.67336 L 500.66693115234375 82.67336 L 500.66693115234375 82.67336 L 486.15484619140625 82.67336 z"
                                                cy="46.50363999999999" cx="544.2031860351562" j="8" val="7"
                                                barHeight="36.16872000000001" barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 544.2031860351562 258.34999999999997 L 544.2031860351562 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 544.2031860351562 258.34999999999997 L 544.2031860351562 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 z"
                                                pathFrom="M 544.2031860351562 258.34999999999997 L 544.2031860351562 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 L 558.7152709960938 258.34999999999997 L 544.2031860351562 258.34999999999997 z"
                                                cy="258.349" cx="602.2515258789062" j="9" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 602.2515258789062 258.34999999999997 L 602.2515258789062 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 602.2515258789062 258.34999999999997 L 602.2515258789062 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 z"
                                                pathFrom="M 602.2515258789062 258.34999999999997 L 602.2515258789062 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 L 616.7636108398438 258.34999999999997 L 602.2515258789062 258.34999999999997 z"
                                                cy="258.349" cx="660.2998657226562" j="10" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <path
                                                d="M 660.2998657226562 258.34999999999997 L 660.2998657226562 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 z"
                                                fill="none" fill-opacity="1" stroke="var(--bs-primary-tint-20)"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area " index="1"
                                                clip-path="url(#gridRectBarMask1z27rwnlg)"
                                                pathTo="M 660.2998657226562 258.34999999999997 L 660.2998657226562 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 z"
                                                pathFrom="M 660.2998657226562 258.34999999999997 L 660.2998657226562 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 L 674.8119506835938 258.34999999999997 L 660.2998657226562 258.34999999999997 z"
                                                cy="258.349" cx="718.3482055664062" j="11" val="0" barHeight="0"
                                                barWidth="14.5120849609375"></path>
                                            <g class="apexcharts-bar-goals-markers">
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                                <g className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMask1z27rwnlg)"></g>
                                            </g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="0">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.024169921875" y="260.18104" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.024169921875"
                                                    cy="260.18104"
                                                    style="font-family: Helvetica, Arial, sans-serif;">2</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.072509765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.072509765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="145.120849609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="145.120849609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="203.169189453125" y="260.18104" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="203.169189453125"
                                                    cy="260.18104"
                                                    style="font-family: Helvetica, Arial, sans-serif;">2</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="261.217529296875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="261.217529296875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="319.265869140625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="319.265869140625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="377.314208984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="377.314208984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="435.362548828125" y="257.59756000000004" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="435.362548828125"
                                                    cy="257.59756000000004"
                                                    style="font-family: Helvetica, Arial, sans-serif;">3</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="493.410888671875" y="177.50968" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="493.410888671875"
                                                    cy="177.50968"
                                                    style="font-family: Helvetica, Arial, sans-serif;">34</text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="551.459228515625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="551.459228515625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="609.507568359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="609.507568359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="667.555908203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="667.555908203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                        </g>
                                        <g class="apexcharts-datalabels" data:realIndex="1">
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="29.024169921875" y="255.01508" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="29.024169921875"
                                                    cy="255.01508"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="29.024169921875" y="242.01508" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">2</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="87.072509765625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="87.072509765625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="87.072509765625" y="247.18204000000003" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">1</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="145.120849609375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="145.120849609375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="145.120849609375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="203.169189453125" y="255.01508" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="203.169189453125"
                                                    cy="255.01508"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="203.169189453125" y="242.01508" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">2</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="261.217529296875" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="261.217529296875"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="261.217529296875" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="319.265869140625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="319.265869140625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="319.265869140625" y="247.18204000000003" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">1</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="377.314208984375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="377.314208984375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="377.314208984375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="435.362548828125" y="249.84812000000002" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="435.362548828125"
                                                    cy="249.84812000000002"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="435.362548828125" y="236.84812000000002" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">3</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="493.410888671875" y="71.588" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="493.410888671875"
                                                    cy="71.588"
                                                    style="font-family: Helvetica, Arial, sans-serif;">7</text></g>
                                            <text x="493.410888671875" y="40.50363999999999" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">41</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="551.459228515625" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="551.459228515625"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="551.459228515625" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="609.507568359375" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="609.507568359375"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="609.507568359375" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                            <g class="apexcharts-data-labels" transform="rotate(0)"><text
                                                    x="667.555908203125" y="258.348" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="12px"
                                                    font-family="Helvetica, Arial, sans-serif" font-weight="600"
                                                    fill="#ffffff" class="apexcharts-datalabel" cx="667.555908203125"
                                                    cy="258.348"
                                                    style="font-family: Helvetica, Arial, sans-serif;"></text></g>
                                            <text x="667.555908203125" y="252.349" text-anchor="middle"
                                                dominant-baseline="auto" font-size="13px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="900"
                                                fill="var(--bs-body-color)" class="apexcharts-text "
                                                style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                        </g>
                                    </g>
                                    <line x1="0" y1="0" x2="696.580078125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line x1="0" y1="0" x2="696.580078125" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    </line>
                                    <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text
                                                x="29.024169921875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jan</tspan>
                                                <title>Jan</title>
                                            </text><text x="87.072509765625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Feb</tspan>
                                                <title>Feb</title>
                                            </text><text x="145.120849609375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Mar</tspan>
                                                <title>Mar</title>
                                            </text><text x="203.169189453125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Apr</tspan>
                                                <title>Apr</title>
                                            </text><text x="261.217529296875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>May</tspan>
                                                <title>May</title>
                                            </text><text x="319.265869140625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jun</tspan>
                                                <title>Jun</title>
                                            </text><text x="377.314208984375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Jul</tspan>
                                                <title>Jul</title>
                                            </text><text x="435.362548828125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Aug</tspan>
                                                <title>Aug</title>
                                            </text><text x="493.410888671875" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Sep</tspan>
                                                <title>Sep</title>
                                            </text><text x="551.459228515625" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Oct</tspan>
                                                <title>Oct</title>
                                            </text><text x="609.507568359375" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Nov</tspan>
                                                <title>Nov</title>
                                            </text><text x="667.555908203125" y="286.348" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-family="Helvetica, Arial, sans-serif" font-weight="400"
                                                fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan>Dec</tspan>
                                                <title>Dec</title>
                                            </text></g>
                                    </g>
                                    <g class="apexcharts-yaxis-annotations"></g>
                                    <g class="apexcharts-xaxis-annotations"></g>
                                    <g class="apexcharts-point-annotations"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                style="right: 0px; position: absolute; left: 0px; top: 325px; max-height: 175px;">
                                <div class="apexcharts-legend-series" rel="1" seriesname="Movie" data:collapsed="false"
                                    style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                        data:collapsed="false"
                                        style="height: 16px; width: 16px; left: -5px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="1" i="0"
                                        data:default-text="Movie" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Movie</span>
                                </div>
                                <div class="apexcharts-legend-series" rel="2" seriesname="TVxShow"
                                    data:collapsed="false" style="margin: 4px 5px;"><span
                                        class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                        style="height: 16px; width: 16px; left: -5px; top: 0px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
                                            <path d="M -6.222222222222222 -6.222222222222222
                   L 6.222222222222222 -6.222222222222222
                   L 6.222222222222222 6.222222222222222
                   L -6.222222222222222 6.222222222222222
                   Z" fill="var(--bs-primary-tint-20)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                stroke-linecap="square" stroke-width="1" stroke-dasharray="0" cx="0"
                                                cy="0" shape="square"
                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-square"
                                                style="transform: translate(50%, 50%);"></path>
                                        </svg></span><span class="apexcharts-legend-text" rel="2" i="1"
                                        data:default-text="TV%20Show" data:collapsed="false"
                                        style="color: var(--bs-body-color); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">TV
                                        Show</span></div>
                            </div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                    style="order: 1;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                    style="order: 2;"><span class="apexcharts-tooltip-marker" shape="circle"
                                        style="color: var(--bs-primary-tint-20);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg></div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG
                                    </div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG
                                    </div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-block card-height">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <h3 class="card-title">Reviews</h3>
                    <a href="https://apps.iqonic.design/streamit-laravel/app/reviews">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/3"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/john.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">John Doe</h6>
                                                <small class="text-white">john@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>23rd September 2025</td>
                                    <td>Movie</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/3"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/john.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">John Doe</h6>
                                                <small class="text-white">john@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>22nd September 2025</td>
                                    <td>Movie</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/9"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/deborah.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">Deborah Thomas</h6>
                                                <small class="text-white">deborah@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>21st September 2025</td>
                                    <td>Tvshow</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/7"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/jorge.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">Jorge Perez</h6>
                                                <small class="text-white">jorge@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>20th September 2025</td>
                                    <td>Tvshow</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star ">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/6"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/harry.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">Harry Victoria</h6>
                                                <small class="text-white">harry@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>18th September 2025</td>
                                    <td>Tvshow</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star ">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex gap-3 align-items-center">
                                        <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/13"
                                            class="d-flex gap-3 align-items-center text-decoration-none">
                                            <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/tracy.png"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">Tracy Jones</h6>
                                                <small class="text-white">tracy@gmail.com</small>
                                            </div>
                                        </a>
                                    </td>

                                    <td>16th September 2025</td>
                                    <td>Tvshow</td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="star-rating">
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                                <span class="star filled">
                                                    <i class="ph ph-fill ph-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-height">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title">Top Rated</h3>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-top-rated" style="min-height: 430px;">
                                <div id="apexchartshxx8qkay"
                                    class="apexcharts-canvas apexchartshxx8qkay apexcharts-theme-light"
                                    style="width: 519px; height: 430px;"><svg xmlns="http://www.w3.org/2000/svg"
                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="519" height="430">
                                        <foreignObject x="0" y="0" width="519" height="430">
                                            <style type="text/css">
                                            .apexcharts-flip-y {
                                                transform: scaleY(-1) translateY(-100%);
                                                transform-origin: top;
                                                transform-box: fill-box;
                                            }

                                            .apexcharts-flip-x {
                                                transform: scaleX(-1);
                                                transform-origin: center;
                                                transform-box: fill-box;
                                            }

                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                flex-direction: column;
                                            }

                                            .apexcharts-legend-group {
                                                display: flex;
                                            }

                                            .apexcharts-legend-group-vertical {
                                                flex-direction: column-reverse;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom,
                                            .apexcharts-legend.apx-legend-position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                justify-content: flex-start;
                                                align-items: flex-start;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                justify-content: center;
                                                align-items: center;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                justify-content: flex-end;
                                                align-items: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                cursor: pointer;
                                                margin-right: 1px;
                                            }

                                            .apexcharts-legend-series.apexcharts-no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .apexcharts-inactive-legend {
                                                opacity: 0.45;
                                            }
                                            </style>
                                        </foreignObject>
                                        <g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                            <defs>
                                                <clipPath id="gridRectMaskhxx8qkay">
                                                    <rect width="525" height="402" x="-3" y="-3" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectBarMaskhxx8qkay">
                                                    <rect width="525" height="402" x="-3" y="-3" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskhxx8qkay">
                                                    <rect width="525" height="396" x="-3" y="0" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskhxx8qkay"></clipPath>
                                                <clipPath id="nonForecastMaskhxx8qkay"></clipPath>
                                            </defs>
                                            <g class="apexcharts-radialbar">
                                                <g>
                                                    <g class="apexcharts-tracks">
                                                        <g class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                            <path
                                                                d="M 259.5 41.084146341463395 A 156.9158536585366 156.9158536585366 0 1 1 259.4726130171898 41.08414873142851 "
                                                                fill="none" fill-opacity="1" stroke="var(--bs-body-bg)"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="16.83658536585366" stroke-dasharray="0"
                                                                class="apexcharts-radialbar-area"
                                                                id="apexcharts-radialbarTrack-0"
                                                                data:pathOrig="M 259.5 41.084146341463395 A 156.9158536585366 156.9158536585366 0 1 1 259.4726130171898 41.08414873142851 ">
                                                            </path>
                                                        </g>
                                                        <g class="apexcharts-radialbar-track apexcharts-track" rel="2">
                                                            <path
                                                                d="M 259.5 62.92073170731706 A 135.07926829268294 135.07926829268294 0 1 1 259.47642422029077 62.92073376469196 "
                                                                fill="none" fill-opacity="1" stroke="var(--bs-body-bg)"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="16.83658536585366" stroke-dasharray="0"
                                                                class="apexcharts-radialbar-area"
                                                                id="apexcharts-radialbarTrack-1"
                                                                data:pathOrig="M 259.5 62.92073170731706 A 135.07926829268294 135.07926829268294 0 1 1 259.47642422029077 62.92073376469196 ">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g class="apexcharts-series apexcharts-radial-series"
                                                            seriesName="Movies" rel="1" data:realIndex="0">
                                                            <path
                                                                d="M 259.5 41.084146341463395 A 156.9158536585366 156.9158536585366 0 0 1 335.57431542282495 60.75830202764243 "
                                                                fill="none" fill-opacity="0.85"
                                                                stroke="var(--bs-primary)" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="16.83658536585366"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                data:angle="29" data:value="8" index="0" j="0"
                                                                data:pathOrig="M 259.5 41.084146341463395 A 156.9158536585366 156.9158536585366 0 0 1 335.57431542282495 60.75830202764243 ">
                                                            </path>
                                                        </g>
                                                        <g class="apexcharts-series apexcharts-radial-series"
                                                            seriesName="TVxShows" rel="2" data:realIndex="1">
                                                            <path
                                                                d="M 259.5 62.92073170731706 A 135.07926829268294 135.07926829268294 0 0 1 387.96801832613744 156.258210509828 "
                                                                fill="none" fill-opacity="0.85"
                                                                stroke="var(--bs-primary-tint-40)" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="16.83658536585366"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-1"
                                                                data:angle="72" data:value="20" index="0" j="1"
                                                                data:pathOrig="M 259.5 62.92073170731706 A 135.07926829268294 135.07926829268294 0 0 1 387.96801832613744 156.258210509828 ">
                                                            </path>
                                                        </g>
                                                        <circle r="121.66097560975611" cx="259.5" cy="198"
                                                            class="apexcharts-radialbar-hollow" fill="transparent">
                                                        </circle>
                                                        <g class="apexcharts-datalabels-group"
                                                            transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                            <text x="259.5" y="198" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="22px"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                font-weight="600" fill="var(--bs-heading-color)"
                                                                class="apexcharts-text apexcharts-datalabel-label"
                                                                style="font-family: Helvetica, Arial, sans-serif;">Total</text><text
                                                                x="259.5" y="230" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="16px"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                font-weight="400" fill="var(--bs-heading-color)"
                                                                class="apexcharts-text apexcharts-datalabel-value"
                                                                style="font-family: Helvetica, Arial, sans-serif;">28</text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line x1="0" y1="0" x2="519" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                            </line>
                                            <line x1="0" y1="0" x2="519" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                        <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)">
                                        </g>
                                    </svg>
                                    <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                        style="right: 0px; position: absolute; left: 0px; top: 405px; max-height: 215px;">
                                        <div class="apexcharts-legend-series" rel="1" seriesname="Movies"
                                            data:collapsed="false" style="margin: 4px 5px;"><span
                                                class="apexcharts-legend-marker" rel="1" data:collapsed="false"
                                                style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                                                    height="100%">
                                                    <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                        stroke-linecap="butt" stroke-width="1" stroke-dasharray="0"
                                                        cx="0" cy="0" shape="circle"
                                                        class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                        style="transform: translate(50%, 50%);"></path>
                                                </svg></span><span class="apexcharts-legend-text" rel="1" i="0"
                                                data:default-text="Movies" data:collapsed="false"
                                                style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Movies</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="2" seriesname="TVxShows"
                                            data:collapsed="false" style="margin: 4px 5px;"><span
                                                class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                                style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                                                    height="100%">
                                                    <path d="M 0, 0
                   m -7, 0
                   a 7,7 0 1,0 14,0
                   a 7,7 0 1,0 -14,0" fill="var(--bs-primary-tint-40)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1"
                                                        stroke-dasharray="0" cx="0" cy="0" shape="circle"
                                                        class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                        style="transform: translate(50%, 50%);"></path>
                                                </svg></span><span class="apexcharts-legend-text" rel="2" i="1"
                                                data:default-text="TV%20Shows" data:collapsed="false"
                                                style="color: var(--bs-white); font-size: 14px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">TV
                                                Shows</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card card-block card-height">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <h3 class="card-title">Transactions</h3>
                            <a href="https://apps.iqonic.design/streamit-laravel/app/subscriptions">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Duration</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/38"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/default-image/Default-Image.jpg"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            Philippe Odelin
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            philippeodelin@gmail.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>24 September 2025</td>
                                            <td>Basic</td>
                                            <td>$7.35</td>
                                            <td>1 week</td>
                                            <td>Stripe</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/38"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/default-image/Default-Image.jpg"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            Philippe Odelin
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            philippeodelin@gmail.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>24 September 2025</td>
                                            <td>Basic</td>
                                            <td>$7.35</td>
                                            <td>1 week</td>
                                            <td>Stripe</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/2"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/demo_admin.png"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            Ivan Norris
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            demo@streamit.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>24 September 2025</td>
                                            <td>Elite Plan</td>
                                            <td>$117.60</td>
                                            <td>1 year</td>
                                            <td>Paystack</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/3"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/john.png"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            John Doe
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            john@gmail.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>22 September 2025</td>
                                            <td>Elite Plan</td>
                                            <td>$117.60</td>
                                            <td>1 year</td>
                                            <td>Stripe</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/3"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/john.png"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            John Doe
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            john@gmail.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>22 September 2025</td>
                                            <td>Elite Plan</td>
                                            <td>$117.60</td>
                                            <td>1 year</td>
                                            <td>Stripe</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://apps.iqonic.design/streamit-laravel/app/users/details/14"
                                                    class="d-flex gap-3 align-items-center text-decoration-none text-dark ">
                                                    <img src="https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/stella.png"
                                                        alt="avatar" class="avatar avatar-40 rounded-pill">
                                                    <div class="text-start">
                                                        <h6 class="m-0">
                                                            Stella Green
                                                        </h6>
                                                        <small class="text-dark">
                                                            <!-- ensure email is white or dark, depending on your theme -->
                                                            stella@gmail.com
                                                        </small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>15 July 2024</td>
                                            <td>Premium Plan</td>
                                            <td>$20.00</td>
                                            <td>1 month</td>
                                            <td>Stripe</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
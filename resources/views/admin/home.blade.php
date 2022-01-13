@extends('layouts.admin-app')
@section('title-tab', 'Dashboard')


@section('breadcrumbs')
<h3 class="m-subheader__title ">
    Dashboard
</h3>
@endsection

@section('content')
      <!--Begin::Main Portlet-->
      <div class="m-portlet">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-xl-4">
                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Total Profit
                                    </h3>
                                    <span class="m-widget1__desc">
                                        Accumulated Profit
                                    </span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">
                                        &#8369; {{ number_format($totalProfit,2) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end:: Widgets/Stats2-1 -->
                </div>

                <div class="col-xl-4">
                    <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">
                                    Total Users
                                </h3>
                                <span class="m-widget1__desc">
                                    Basic and premium accounts
                                </span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-danger">
                                    {{ $totalUsers }}
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Sales Over Time
                                    </h3>
                                    <span class="m-widget1__desc">
                                        Today: 12:01 AM - 11:59 PM
                                    </span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">
                                        &#8369; {{ number_format($salesOverTime, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End::Main Portlet-->

			<!--Begin::Main Portlet-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin:: Widgets/Top Products-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Website Visits
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__body">
                            <!--begin::Widget5-->
                            <div class="m-widget4">
                                <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20" style="height:260px;">
                                    <canvas id="m_chart_trends_stats_2"></canvas>
                                </div>
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--logo">
                                        <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                                    </div>
                                    <div class="m-widget4__info">
                                        <span class="m-widget4__title">
                                            Total Page Visits
                                        </span>

                                    </div>
                                    <span class="m-widget4__ext">
                                        <span class="m-widget4__number m--font-info">
                                            {{ $totalVisits }}
                                        </span>
                                    </span>
                                </div>
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--logo">
                                        <img src="assets/app/media/img/client-logos/logo1.png" alt="">
                                    </div>
                                    <div class="m-widget4__info">
                                        <span class="m-widget4__title">
                                            Total Basic Accounts
                                        </span>
                                        <br>
                                        <span class="m-widget4__sub">
                                            @if($totalUsers != 0)
                                            {{ $totalBasicAccount / $totalUsers * 100 }}% of total users
                                            @else
                                            0% of total users
                                            @endif
                                        </span>
                                    </div>
                                    <span class="m-widget4__ext">
                                        <span class="m-widget4__number m--font-success">
                                            {{ $totalBasicAccount }}
                                        </span>

                                    </span>
                                </div>
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--logo">
                                        <img src="assets/app/media/img/client-logos/logo2.png" alt="">
                                    </div>
                                    <div class="m-widget4__info">
                                        <span class="m-widget4__title">
                                            Total Premium Accounts
                                        </span>
                                        <br>
                                        <span class="m-widget4__sub">
                                            @if($totalUsers != 0)
                                            {{ $totalPremiumAccount / $totalUsers * 100 }}% of total users
                                            @else
                                            0% of total users
                                            @endif
                                        </span>
                                    </div>
                                    <span class="m-widget4__ext">
                                        <span class="m-widget4__number m--font-danger">
                                            {{ $totalPremiumAccount }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Widget 5-->
                        </div>
                    </div>
                    <!--end:: Widgets/Top Products-->
                </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-light">
                                        Subscriptions
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div class="m-widget17__chart" style="height:320px;">

                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
                                            <a href="{{ route('subscriptions.pending') }}">
                                            <span class="m-widget17__icon">
                                                <i class="flaticon-time-3 m--font-brand"></i>
                                            </span>
                                            <span class="m-widget17__subtitle">
                                                Pending
                                            </span>
                                            <span class="m-widget17__desc">
                                                {{ $pendingSubscriptions }} New Subscriptions
                                            </span>
                                        </a>
                                        </div>
                                        <div class="m-widget17__item">
                                            <a href="{{ route('subscriptions.denied') }}">
                                            <span class="m-widget17__icon">
                                                <i class="flaticon-close m--font-danger"></i>
                                            </span>
                                            <span class="m-widget17__subtitle">
                                                Denied
                                            </span>
                                            <span class="m-widget17__desc">
                                                {{ $deniedSubscriptions }} Declined Subscriptions
                                            </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
                                            <a href="{{ route('subscriptions.approved') }}">
                                            <span class="m-widget17__icon">
                                                <i class="flaticon-pie-chart m--font-success"></i>
                                            </span>
                                            <span class="m-widget17__subtitle">
                                                Active
                                            </span>
                                            <span class="m-widget17__desc">
                                                {{ $approvedSubscriptions }} Active Subscriptions
                                            </span>
                                            </a>
                                        </div>
                                        <div class="m-widget17__item">
                                            <a href="{{ route('subscriptions.expired') }}">
                                            <span class="m-widget17__icon">
                                                <i class="flaticon-time m--font-warning"></i>
                                            </span>
                                            <span class="m-widget17__subtitle">
                                                Expired
                                            </span>
                                            <span class="m-widget17__desc">
                                                {{ $expiredSubscriptions }} Expired Subscriptions
                                            </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>
                @if($termOfTheDay)
                <div class="col-xl-4">
                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-action">
                                    <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                        Word Of The Day
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget19">
                                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                    @if($termOfTheDay->image_link)
                                    <img src="{{ $termOfTheDay->image_link }}" alt="">
                                    @else
                                    <img src="{{ $termOfTheDay->image ? asset('storage/term_images/' . $termOfTheDay->image) : asset('imgs/logo_v2.png') }}" alt="">
                                    @endif
                                    <h3 class="m-widget19__title m--font-light">
                                       {{ $termOfTheDay->term }}
                                    </h3>
                                    <div class="m-widget19__shadow"></div>
                                </div>
                                <div class="m-widget19__content">
                                    <div class="m-widget19__header">

                                    </div>
                                    <div class="m-widget19__body">
                                        {{ strip_tags($termOfTheDay->description) }}
                                    </div>
                                </div>
                                {{-- <div class="m-widget19__action">
                                    <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                        Read More
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Blog-->
                </div>
                @endif
            </div>
            <!--End::Main Portlet-->

@endsection

@push('scripts')
<script>
   var Dashboard = (function() {

    return {
        init: function() {
            (function() {
                    if (0 != $("#m_chart_trends_stats_2").length) {
                        var e = document
                                .getElementById("m_chart_trends_stats_2")
                                .getContext("2d"),
                            t = {
                                type: "line",
                                data: {
                                    labels: [
                                        "January",
                                        "February",
                                        "March",
                                        "April",
                                        "May",
                                        "June",
                                        "July",
                                        "August",
                                        "September",
                                        "October",
                                        "November",
                                        "December",
                                    ],
                                    datasets: [
                                        {
                                            label: "Total Visits",
                                            backgroundColor: "#d2f5f9",
                                            borderColor: mUtil.getColor(
                                                "brand"
                                            ),
                                            pointBackgroundColor: Chart.helpers
                                                .color("#ffffff")
                                                .alpha(0)
                                                .rgbString(),
                                            pointBorderColor: Chart.helpers
                                                .color("#ffffff")
                                                .alpha(0)
                                                .rgbString(),
                                            pointHoverBackgroundColor: mUtil.getColor(
                                                "danger"
                                            ),
                                            pointHoverBorderColor: Chart.helpers
                                                .color("#000000")
                                                .alpha(0.2)
                                                .rgbString(),
                                            data: @json($monthlyVisits)
                                        }
                                    ]
                                },
                                options: {
                                    title: { display: !1 },
                                    tooltips: {
                                        intersect: !1,
                                        mode: "nearest",
                                        xPadding: 10,
                                        yPadding: 10,
                                        caretPadding: 10
                                    },
                                    legend: { display: !1 },
                                    responsive: !0,
                                    maintainAspectRatio: !1,
                                    hover: { mode: "index" },
                                    scales: {
                                        xAxes: [
                                            {
                                                display: !1,
                                                gridLines: !1,
                                                scaleLabel: {
                                                    display: !0,
                                                    labelString: "Month"
                                                }
                                            }
                                        ],
                                        yAxes: [
                                            {
                                                display: !1,
                                                gridLines: !1,
                                                scaleLabel: {
                                                    display: !0,
                                                    labelString: "Value"
                                                },
                                                ticks: { beginAtZero: !0 }
                                            }
                                        ]
                                    },
                                    elements: {
                                        line: { tension: 0.19 },
                                        point: { radius: 4, borderWidth: 12 }
                                    },
                                    layout: {
                                        padding: {
                                            left: 0,
                                            right: 0,
                                            top: 5,
                                            bottom: 0
                                        }
                                    }
                                }
                            };
                        new Chart(e, t);
                    }
                })()
        }
    };
})();
jQuery(document).ready(function() {
    Dashboard.init();
});

</script>
@endpush

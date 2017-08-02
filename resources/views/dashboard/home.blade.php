@extends('dashboard.layouts.app')

@section('content')
	<div class="card">
        <div class="card__header">
            <h2>Registered Users ({{ \App\User::count() }}) <small>The graph displays the frequency of account registrations</small></h2>
            <div class="actions">
                <a href=""><i class="zmdi zmdi-check-all"></i></a>
                <a href=""><i class="zmdi zmdi-trending-up"></i></a>
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="">Change Date Range</a></li>
                        <li><a href="">Change Graph Type</a></li>
                        <li><a href="">Other Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flot-chart-edge">
            <div id="chart-curved-line" class="flot-chart"></div>
        </div>
    </div>
    <!-- Main User Regisration Card End -->

                <div id="content__grid" data-columns>
                    <div class="card widget-analytic">
                        <div class="card__header">
                            <h2>Website Impressions <small>Consectetur Ultricies Porta Fringilla</small></h2>
                            <div class="actions">
                                <div class="dropdown">
                                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="">Refresh</a></li>
                                        <li><a href="">Manage</a></li>
                                        <li><a href="">Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card__body">
                            <div class="widget-analytic__info">
                                <i class="zmdi zmdi-caret-up-circle"></i>
                                <h2>987,453</h2>
                            </div>
                            <div class="widget-analytic__chart">
                                <div class="chart-sparkline-line">9,5,6,3,9,7,5,4,6,5,6,4,9</div>
                            </div>
                        </div>
                    </div>

                    <div class="card widget-analytic">
                        <div class="card__header">
                            <h2>Website Traffics <small>Nullam Adipiscing Pellentesque</small></h2>
                            <div class="actions">
                                <div class="dropdown">
                                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="">Refresh</a></li>
                                        <li><a href="">Manage</a></li>
                                        <li><a href="">Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card__body">
                            <div class="widget-analytic__info">
                                <i class="zmdi zmdi-caret-up-circle"></i>
                                <h2>356,785K</h2>
                            </div>
                            <div class="widget-analytic__chart">
                                <div class="chart-sparkline-line">2,4,6,5,6,4,5,3,7,3,6,5,9,6</div>
                            </div>
                        </div>
                    </div>

                    <div class="card widget-analytic">
                        <div class="card__header">
                            <h2>Total Sales <small>Purus Malesuada Consectetur</small></h2>
                            <div class="actions">
                                <div class="dropdown">
                                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="">Refresh</a></li>
                                        <li><a href="">Manage</a></li>
                                        <li><a href="">Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card__body">
                            <div class="widget-analytic__info">
                                <i class="zmdi zmdi-caret-down-circle"></i>
                                <h2>$458,778</h2>
                            </div>
                            <div class="widget-analytic__chart">
                                <div class="chart-sparkline-line">9,4,6,5,6,4,5,7,9,3,6,5,9</div>
                            </div>
                        </div>
                    </div>

                   {{--  <div class="card widget-pie-grid">
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="92" data-pie-size="80">
                                <span class="chart-pie__value">92</span>
                            </div>
                            <div class="widget-pie-grid__title">Email<br> Scheduled</div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="11" data-pie-size="80">
                                <span class="chart-pie__value">11</span>
                            </div>
                            <div class="widget-pie-grid__title">Email<br> Bounced</div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="52" data-pie-size="80">
                                <span class="chart-pie__value">52</span>
                            </div>
                            <div class="widget-pie-grid__title">Email<br> Opened</div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="44" data-pie-size="80">
                                <span class="chart-pie__value">44</span>
                            </div>
                            <div class="widget-pie-grid__title">Storage<br>Remaining</div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="78" data-pie-size="80">
                                <span class="chart-pie__value">78</span>
                            </div>
                            <div class="widget-pie-grid__title">Web Page<br> Views</div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
                            <div class="chart-pie" data-percent="32" data-pie-size="80">
                                <span class="chart-pie__value">32</span>
                            </div>
                            <div class="widget-pie-grid__title">Server<br> Processing</div>
                        </div>
                    </div> --}}
                </div>
@stop
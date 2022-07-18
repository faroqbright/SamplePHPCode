@extends('layouts.layout')

@section('content')
    <style type="text/css">
        @media (min-width: 1200px) {
            .overviewMain .col-xl-2 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

    </style>
    <!-- <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button> -->
    <div class="container">
        <div class="row mx-0">
            <div class="col-md-12 text-left">
                <h1 class="font-weight-bold h2 mb-4">Overview</h1>
            </div>
        </div>
        @if (Auth::user()->user_type == 'Super Admin')
            <div class="row overviewMain mx-0">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('android_iphone') }}" style="text-decoration: none;">
                        <div class="overviewOne w-100 p-3 rounded text-center h-100">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewOne.png') }}">
                            <h3>Android Vs Iphone Total</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('master_channel') }}" style="text-decoration: none;">
                        <div class="overviewTwo w-100 p-3 rounded text-center h-100">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewTwo.png') }}">
                            <h3>Master Channel <br> List</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('gross_earning') }}" style="text-decoration: none;">
                        <div class="overviewThree w-100 p-3 rounded text-center h-100">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewThree.png') }}">
                            <h3>All Channel Gross Earnings</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('male_to_female_ratio') }}" style="text-decoration: none;">
                        <div class="overviewFour w-100 p-3 rounded text-center h-100">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewfour.png') }}">
                            <h3>Male to Female Channel Ratio</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('chanel_to_channel_total_share') }}" style="text-decoration: none;">
                        <div class="overviewFive w-100 p-3 rounded text-center">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewFive.png') }}">
                            <h3>Channel Total Share $ Reviews</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('channel_earners') }}" style="text-decoration: none;">
                        <div class="overviewFive w-100 p-3 rounded text-center h-100">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewFive.png') }}">
                            <h3>Top 20 Channel Earners</h3>
                        </div>
                    </a>
                </div>
            </div>
        @elseif(Auth::user()->user_type == 'Admin')
            <div class="row overviewMain mx-0">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('mygross_earning') }}" style="text-decoration: none;">
                        <div class="overviewThree w-100 p-3 rounded text-center">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewThree.png') }}">
                            <h3>My Gross Earnings</h3>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="{{ url('My_total_share') }}" style="text-decoration: none;">
                        <div class="overviewFive w-100 p-3 rounded text-center">
                            <img class="" src="{{ URL::asset('public/assets/imgs/overviewFive.png') }}">
                            <h3>My Total Share $ Reviews</h3>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>

@endsection

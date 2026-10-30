@extends('1crcoach.courses.sebp.layouts.app')
@section('content')    <!-- Owl Carousel CSS -->    <link rel="stylesheet"          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">    <link rel="stylesheet"          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>section.matex_dashbrd {    padding:0px;} .side_menusses ul.navigation {    background: #1a4f96;    list-style: none;    padding: 15px 15px;}.side_menusses ul.navigation li.nav-item {    margin-bottom: 2px;	position:relative;}.side_menusses ul.navigation li.nav-item a.you_vioss {    position: absolute;    right: 0;    top: 0;}.side_menusses ul.navigation li.nav-item:last-child {    margin-bottom: 0px;}.side_menusses ul.navigation li.nav-item a {    color: #fff;    font-weight: 500;    font-size: 14px;	display: block;	padding:5px 0;}.side_menusses ul.navigation li.nav-item a:focus{outline:none; border:none;}.side_menusses ul.navigation li.nav-item a i {font-size: 14px;}.side_menusses ul.navigation li.nav-item a span.menu-title {padding-left:5px;}   .dashes_ara_main {    padding-top: 30px;}.dashes_ara_main .topbar {    display: flex;    justify-content: space-between;    align-items: center;    gap: 18px;    margin-bottom: 16px;}.dashes_ara_main .greeting h1 {    font-size: 18px;    color: #17345b;    margin: 0 0 4px;}.dashes_ara_main .greeting h1 span {    color: #1260c4;}.dashes_ara_main .greeting p {    font-size: 12px;    color: #718098;    margin-top: 2px;    margin-bottom: 0;}.dashes_ara_main .top-actions {    display: flex;    align-items: center;    gap: 10px;}.dashes_ara_main .top-actions .st_ds_areaa {    display: flex;    gap: 10px;}.dashes_ara_main .fy {    background: #fff;    border: 1px solid #dce4ef;    border-radius: 5px;    padding: 8px 10px;    color: #344967;    font-size: 10px;    font-weight: 600;    height: 33px;}.dashes_ara_main .icon-btn {    border: 0;    background: #fff;    width: 34px;    height: 34px;    border-radius: 7px;    color: #405675;    position: relative;}.dashes_ara_main .bell-dot {    position: absolute;    right: 5px;    top: 4px;    background: #e74b4b;    color: #fff;    border-radius: 50%;    font-size: 8px;    width: 14px;    height: 14px;}.dashes_ara_main .user {    display: flex;    align-items: center;    gap: 3px;    font-size: 11px;    font-weight: 600;    text-wrap-mode: nowrap;}.dashes_ara_main .avatar {    width: 34px;    height: 34px;    background: #e7f0fc;    color: #2364ad;    border-radius: 50%;    display: flex;    align-items: center;    justify-content: center;    font-weight: 700;}.dashes_ara_main .grid-top {    display: grid;    grid-template-columns: 1fr 1fr 1fr;    gap: 12px;}.dashes_ara_main .card {    background: #fff;    border: 1px solid #e0e7f0;    border-radius: 9px;    box-shadow: 0 4px 14px rgba(35, 57, 86, 0.05);}.dashes_ara_main .progress-card {    padding: 17px 19px;    min-height: 142px;    margin-bottom: 5px;}.dashes_ara_main .progress-title {    display: flex;    justify-content: space-between;    align-items: center;}.dashes_ara_main .progress-title h2 {    font-size: 14px;	font-weight:500;	margin:0;}.dashes_ara_main .percent {    font-size: 20px;    color: #13a35e;    font-weight: 700;}.dashes_ara_main .bar {    height: 9px;    background: #e5ebf3;    border-radius: 10px;    margin: 12px 0 13px;    overflow: hidden;}.dashes_ara_main .bar span {    display: block;    width: 62%;    height: 100%;    background: #12a35d;    border-radius: 10px;}.dashes_ara_main .continue {    display: flex;    justify-content: space-between;    align-items: center;    font-size: 11px;    color: #748197;}.dashes_ara_main .primary {    background: #1a4f96;    border: 0;    color: #fff !important;    border-radius: 4px;    padding: 8px 10px 7px;    font-size: 11px;    font-weight: 600;}.dashes_ara_main .profile-card {    padding: 14px 15px;    margin-bottom: 5px;}.dashes_ara_main .profile-head {    display: flex;    justify-content: space-between;    align-items: center;}.dashes_ara_main .profile-head h3 {    font-size: 14px;	font-weight:500;	margin:0;}.dashes_ara_main .complete {    color: #13a35e;    font-weight: 600;    font-size: 10px;}.dashes_ara_main .profile-row {    display: grid;    grid-template-columns: 1fr 1fr;    margin-top: 12px;    gap: 8px;}.dashes_ara_main .metric {    background: #f7f9fc;    border-radius: 7px;    padding: 9px;}.dashes_ara_main .metric label {    display: block;    font-size: 9px;    color: #77859b;}.dashes_ara_main .metric strong {    font-size: 11px;}.dashes_ara_main .good {    color: #15985a;}.dashes_ara_main .profile-date {    font-size: 11px;    color: #8a95a6;    margin-top: 9px;}.dashes_ara_main .quick {    padding: 14px;    margin-bottom: 5px;}.dashes_ara_main .quick h3 {    font-size: 14px;	font-weight:500;    margin:0 0 10px;}.dashes_ara_main .quick-grid {    display: grid;    grid-template-columns: repeat(4, 1fr);    gap: 7px;}.dashes_ara_main .quick-item {    border: 1px solid #e1e7ef;    border-radius: 7px;    padding: 9px 3px;    text-align: center;    font-size: 9px;    color: #52627a;}.dashes_ara_main .quick-item i {    display: flex;    width: 32px;    height: 32px;    margin: 0 auto 5px;    border-radius: 8px;    align-items: center;    justify-content: center;    font-size: 14px;}.dashes_ara_main .blue i {    background: #eaf3ff;    color: #2870c5;}.dashes_ara_main .green i {    background: #eaf8ef;    color: #22985a;}.dashes_ara_main .purple i {    background: #f1ecff;    color: #7251c9;}.dashes_ara_main .orange i {    background: #fff3e2;    color: #df8b18;}.dashes_ara_main .section {    margin-top: 15px;}.dashes_ara_main .section-title {    display: flex;    align-items: center;    justify-content: space-between;    margin-bottom: 15px;}.dashes_ara_main .section-title h2 {    font-size: 16px;    color: #1d3558;    font-weight: 600;	margin:0;}.dashes_ara_main .section-title a {    font-size: 10px;    font-weight: 500;    color: #1a4f96;    text-decoration: none;}.dashes_ara_main .steps {    padding: 12px 13px;}.dashes_ara_main .step-line {    display: flex;    align-items: center;    justify-content: center;    gap: 0;    margin: 0 0px 15px;}.dashes_ara_main .circle {    width: 25px;    height: 25px;    border: 2px solid #20a85f;    border-radius: 50%;    display: flex;    align-items: center;    justify-content: center;    font-size: 10px;    font-weight: 600;    color: #159656;    background: #fff;}.dashes_ara_main .circle.warn {    border-color: #e6b526;    color: #c28b00;}.dashes_ara_main .circle.lock {    border-color: #e25454;    color: #d54d4d;}.dashes_ara_main .arrow {    width: 27px;    height: 2px;    background: #39a969;    position: relative;}.dashes_ara_main .arrow:after {    content: "";    position: absolute;    right: -1px;    top: -4px;    border-left: 6px solid #39a969;    border-top: 5px solid transparent;    border-bottom: 5px solid transparent;}.dashes_ara_main .step-grid {    display: grid;    grid-template-columns: repeat(3, 1fr);    gap: 9px;}.dashes_ara_main .step-card {    border: 1px solid #e0e7ef;    border-radius: 9px;    padding: 12px 10px;    min-height: 122px;    position: relative;    background: #fff;    transition: 0.2s;}.dashes_ara_main .step-card:hover {    transform: translateY(-1px);    box-shadow: 0 5px 14px rgba(30, 55, 90, 0.08);}.dashes_ara_main .step-card .boths_booox {    display: flex;    width: 100%;	gap:10px;	align-items: center;}.dashes_ara_main .step-card .boths_booox .mini-progress {    width: 82%;	margin:0;}.dashes_ara_main .step-no {    position: absolute;    left: 9px;    top: 8px;    width: 24px;    height: 24px;    border-radius: 50%;    background: #20a760;    color: #fff;    display: flex;    align-items: center;    justify-content: center;    font-size: 9px;    font-weight: 700;}.dashes_ara_main .step-no.yellow {    background: #e5af1a;}.dashes_ara_main .step-no.gray {    background: #8893a3;}.dashes_ara_main .step-icon {    width: 48px;    height: 38px;    margin: 4px auto 6px;    background: #edf8f1;    color: #159b59;    border-radius: 24px;    display: flex;    align-items: center;    justify-content: center;    font-size: 19px;}.dashes_ara_main .step-card.yellow .step-icon {    background: #fff7df;    color: #d59d11;}.dashes_ara_main .step-card.gray .step-icon {    background: #f0f2f5;    color: #8c96a5;}.dashes_ara_main .step-card h3 {text-align:center; font-size: 13px; color: #253754;line-height: 1.25; margin:8px 0 8px; font-weight:600; cursor: pointer; text-decoration: underline;}.dashes_ara_main .step-status {    text-align: center;    margin-top: 7px;    font-size: 9px;    color: #718097;}.dashes_ara_main .done {    color: #14965a;}.dashes_ara_main .mini-progress {    height: 4px;    background: #e7ebf0;    border-radius: 5px;    margin: 10px 0px 0;}.dashes_ara_main .mini-progress span {    display: block;    height: 100%;    background: #e6b21c;    border-radius: 5px;}.dashes_ara_main .step-card .mini-percent {    text-align: right;    font-size: 8px;    color: #66758b;    margin-top: 3px;}.dashes_ara_main .summary {    display: grid;    grid-template-columns: repeat(4, 1fr);    gap: 9px;}.dashes_ara_main .summary-card {    padding: 10px;    border: 1px solid #e0e7ef;    border-radius: 4px;    display: flex;    align-items: center;    gap: 10px;}.dashes_ara_main .sum-icon {    width:30px;    height:30px;    border-radius: 4px;    display: flex;    align-items: center;    justify-content: center;    font-size: 17px;    background: #edf5ff;    color: #2472c7;}.dashes_ara_main .sum-green .sum-icon {    background: #ebf8f0;    color: #20965a;}.dashes_ara_main .sum-yellow .sum-icon {    background: #fff7df;    color: #d49b13;}.dashes_ara_main .sum-red .sum-icon {    background: #fff0f0;    color: #dc5353;}.dashes_ara_main .summary-card label {    display: block;    font-size: 9px;    color: #77859a;}.dashes_ara_main .summary-card strong {    font-size: 14px;    color: #263c5c;}.dashes_ara_main .documents {    padding: 13px;}.dashes_ara_main .doc-grid {    display: grid;    grid-template-columns: repeat(6, 1fr);    gap: 7px;}.dashes_ara_main .doc {    border: 1px solid #e1e7ef;    border-radius: 7px;    padding: 9px;    text-align: center;}.dashes_ara_main .doc h4 {    font-size: 9px;    color: #52627a;}.dashes_ara_main .doc p {    font-size: 9px;    margin: 0;    line-height: 1;}.dashes_ara_main .uploaded {    color: #15995b;}.dashes_ara_main .pending {    color: #dc9514;}.dashes_ara_main .right-layout {    display: grid;    grid-template-columns: 1fr;    gap: 13px;}.dashes_ara_main .activity.rececents {    height: 328px;    overflow: auto;}.dashes_ara_main .activity {    padding: 13px;    margin: 0;}.dashes_ara_main .activity h3,.dashes_ara_main .years h3 {    font-size: 14px;    margin: 0;    font-weight: 500;}.dashes_ara_main .activity-item {    display: flex;    gap: 9px;    padding: 8px 0;    border-bottom: 1px solid #edf0f4;}.dashes_ara_main .activity-item:last-child {    border-bottom: 0;}.dashes_ara_main .activity-icon {    width: 28px;    height: 28px;    border-radius: 7px;    background: #edf5ff;    color: #2670c5;    display: flex;    align-items: center;    justify-content: center;    font-size: 11px;    flex-shrink: 0;}.dashes_ara_main .activity-text strong {    display: block;    font-size: 11px;    color: #324764;}.dashes_ara_main .activity-text span {    font-size: 10px;    color: #8a95a6;}.dashes_ara_main .years {    padding: 13px;}.dashes_ara_main .year-card {    border: 1px solid #e0e7ef;    border-radius: 7px;    padding: 9px 10px;    margin-bottom: 7px;}.dashes_ara_main .year-card:last-child{margin-bottom:0;}.dashes_ara_main .year-top {    display: flex;    justify-content: space-between;    font-size: 10px;    font-weight: 600;}.dashes_ara_main .filed {    color: #15995b;    background: #eaf8ef;    border-radius: 10px;    padding: 2px 6px;    font-size: 9px;}.dashes_ara_main .year-bottom {    display: flex;    justify-content: space-between;    margin-top: 6px;    font-size: 8px;    color: #718097;}.dashes_ara_main .year-bottom a {    color: #1a4f96;    text-decoration: none;    font-weight: 500;    font-size: 9px;}.dashes_ara_main .layout {    display: grid;    grid-template-columns: minmax(0, 1.75fr) minmax(260px, 0.85fr);    gap: 13px;    margin-top: 13px;}.dashes_ara_main .tax-health {    padding: 14px;    margin: 0;}.dashes_ara_main .health-row {    display: flex;    justify-content: space-between;    align-items: center;}.dashes_ara_main .health-row h3 {    font-size: 14px;    margin: 0;    font-weight: 500;}.dashes_ara_main .stars {    color: #eab21d;    font-size: 12px;}.dashes_ara_main .health-good {    font-size: 9px;    background: #eaf8ef;    color: #168b54;    border-radius: 12px;    padding: 3px 7px;}.dashes_ara_main .health-grid {    display: grid;    grid-template-columns: 1fr 1fr;    margin-top: 11px;    gap: 6px;}.dashes_ara_main .health-metric {    padding: 8px;    background: #f7f9fc;    border-radius: 6px;}.dashes_ara_main .health-metric span {    display: block;    color: #7a879a;    font-size: 10px;}.dashes_ara_main .health-metric strong {    font-size: 10px;}.dashes_ara_main .right-stack {    display: flex;    flex-direction: column;    gap: 13px;}.dashes_ara_main .toast {    position: fixed;    right: 20px;    bottom: 20px;    background: #173b68;    color: #fff;    padding: 11px 15px;    border-radius: 7px;    font-size: 10px;    display: none;    z-index: 20;    box-shadow: 0 8px 25px #0003;}.dashes_ara_main .toast.show {    display: block;}.dashes_ara_main .step-card a.you_vioss {    position: absolute;    right: 8px;    top: 8px;    cursor: pointer;}.matex_dashbrd .ads_areea {    width: 100%;	margin:15px 0;}.matex_dashbrd .ads_areea img.logo {    height: auto;    width: 100%;}.matex_dashbrd .news-slider {    width: 100%;    max-width: 100%;    margin: 20px auto;    padding: 0;}.matex_dashbrd .news-card {    background: #194398;    min-height: auto;    padding:15px 15px 16px;    text-align: center;    color: #fff;    display: flex;    flex-direction: column;    align-items: center;    justify-content: center;}/* SVG Home Icon */.matex_dashbrd .news-icon {    width: 26px;    height: 26px;    margin-bottom: 10px;}.matex_dashbrd .news-icon svg {    width: 100%;    height: 100%;    display: block;    fill: #fff;}.matex_dashbrd .news-title {    font-size: 16px;    line-height: 22px;    font-weight: 700;    margin: 0 0 10px;    color: #fff;    max-width: 280px;    display: -webkit-box;    -webkit-line-clamp: 1;    -webkit-box-orient: vertical;    overflow: hidden;}.matex_dashbrd .news-description {    font-size: 14px;    line-height: 20px;    font-weight: 400;    margin: 0 0 12px;	padding:0 6px;    color: #fff;    max-width: 310px;    display: -webkit-box;    -webkit-line-clamp: 3;    -webkit-box-orient: vertical;    overflow: hidden;}.matex_dashbrd .read-more {    display: inline-flex;    align-items: center;    justify-content: center;    background: #fff;    color: #1670e8;    border: 1px solid #1670e8;    text-decoration: none;    font-size: 13px;    line-height: 20px;    padding:6px 15px 4px;    min-width: auto;    height: auto;    border-radius: 3px;    margin-top: 0;    transition: all 0.3s ease;}.matex_dashbrd .read-more:hover {    background: #1670e8;    color: #fff;}/* Owl spacing */.matex_dashbrd .news-slider .owl-stage {    display: flex;}.matex_dashbrd .news-slider .owl-item {    display: flex;}.matex_dashbrd .news-slider .news-card {    width: 100%;}/* Dots */.matex_dashbrd .news-slider .owl-dots {    margin-top: 18px;    text-align: center;}.matex_dashbrd .news-slider .owl-dot span {    width: 9px;    height: 9px;    margin: 4px;    background: #ccc;    display: block;    border-radius: 50%;}.matex_dashbrd .news-slider .owl-dot.active span {    background: #194398;}/* Arrow */.matex_dashbrd .news-slider .owl-nav button {    position: absolute;    top: 50%;    transform: translateY(-50%);    width: 26px;    height:26px;    background: #194398 !important;    color: #fff !important;    border-radius: 50% !important;    font-size: 25px !important;    line-height: 15px !important;}.matex_dashbrd .news-slider .owl-nav button:focus {    outline: none;    border: none;}.matex_dashbrd .news-slider .owl-nav .owl-prev {    left: -5px;}.matex_dashbrd .news-slider .owl-nav .owl-next {    right: -5px;}.mb_v_show{display:none !important;}.mobile_menu_btn {    display: none;    border: 0;    background: transparent;    font-size: 24px;    cursor: pointer;    padding: 8px 12px;}








.dashes_ara_main .taxmate-wrapper{
    width:100%;
    max-width:100%;
    margin:0px;
}


.dashes_ara_main .taxmate-wrapper .step-header{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:8px;
    padding:14px 18px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
}

.dashes_ara_main .taxmate-wrapper .step-title-area{
    display:flex;
    align-items:flex-start;
    gap:8px;
}

.dashes_ara_main .taxmate-wrapper .step-number{
    width: 33px;
    height: 33px;
    background: #14579b;
    color: #fff;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 13px;
    flex-shrink: 0;
}

.dashes_ara_main .taxmate-wrapper .step-title h1{
        margin: 0;
    font-size: 16px;
    color: #153f60;
    font-weight: 700;
}

.dashes_ara_main .taxmate-wrapper .step-title p{
    margin: 2px 0 0;
    color: #718198;
    font-size: 12px;
    line-height: 15px;
    max-width: 300px;
    width: 100%;
}

.dashes_ara_main .taxmate-wrapper .header-actions{
    display:flex;
    align-items:center;
    gap:10px;
}

.dashes_ara_main .taxmate-wrapper .help-btn{
    border: 1px solid #d6e0eb;
    background: #fff;
    color: #264c70;
    padding: 9px 13px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
}

.dashes_ara_main .taxmate-wrapper .video-help{
    width:43px;
    height:38px;
    border:none;
    background:#ff4057;
    color:#fff;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
    box-shadow:0 2px 5px rgba(0,0,0,.12);
}

.dashes_ara_main .taxmate-wrapper .progress-area{
    min-width:175px;
}

.dashes_ara_main .taxmate-wrapper .progress-label{
    display:flex;
    justify-content:space-between;
    font-size:11px;
    color:#687c91;
    margin-bottom:5px;
}

.dashes_ara_main .taxmate-wrapper .progress-label strong{
    color:#0ca564;
}

.dashes_ara_main .taxmate-wrapper .progress-bar{
    height:6px;
    background:#e3eaf1;
    border-radius:20px;
    overflow:hidden;
	width:100%;
}

.dashes_ara_main .taxmate-wrapper .progress-fill{
    height:100%;
    width:100%;
    background:#0ca564;
}

.dashes_ara_main .taxmate-wrapper .dashboard-btn{
    border: none;
    background: #15599b;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    white-space: nowrap;
    font-size: 13px;
}

/* =========================================================
   9 STEP FLOW
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .step-flow{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-top:10px;
    padding:12px 15px 9px;
    overflow-x:auto;
}

.dashes_ara_main .taxmate-wrapper .steps{
    display: flex;
    align-items: flex-start;
    min-width: 100%;
    position: relative;
    padding: 0;
    gap: 10px;
}

.dashes_ara_main .taxmate-wrapper .steps:before{
    content:"";
    position:absolute;
    top:13px;
    left:5%;
    right:5%;
    height:1px;
    background:#ccd9e6;
    z-index:0;
}

.dashes_ara_main .taxmate-wrapper .flow-step{
    flex:1;
    text-align:center;
    position:relative;
    z-index:1;
    cursor:pointer;
}

.dashes_ara_main .taxmate-wrapper .flow-circle{
    width:26px;
    height:26px;
    border-radius:50%;
    background:#fff;
    border:1px solid #cbd8e5;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:10px;
    font-weight:bold;
    color:#718096;
}

.dashes_ara_main .taxmate-wrapper .flow-step.active .flow-circle{
    background:#14579b;
    color:#fff;
    border-color:#14579b;
}

.dashes_ara_main .taxmate-wrapper .flow-step.completed .flow-circle{
    background:#13a66a;
    color:#fff;
    border-color:#13a66a;
}

.dashes_ara_main .taxmate-wrapper .flow-step.pending .flow-circle{
    background:#fff;
}

.dashes_ara_main .taxmate-wrapper .flow-label{
    font-size:9px;
    color:#6b7d90;
    line-height:12px;
    margin-top:4px;
}

.dashes_ara_main .taxmate-wrapper .flow-step.active .flow-label{
    color:#14579b;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .flow-step.completed .flow-label{
    color:#09945c;
    font-weight:bold;
}

/* =========================================================
   SUB NAVIGATION
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .sub-tabs{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-top:10px;
    display:flex;
    align-items:center;
    overflow-x:auto;
}

.dashes_ara_main .taxmate-wrapper .sub-tab{
    border:none;
    background:none;
    padding:12px 16px;
    font-size:11px;
    color:#58718b;
    cursor:pointer;
    border-bottom:3px solid transparent;
    white-space:nowrap;
}

.dashes_ara_main .taxmate-wrapper .sub-tab:hover{
    color:#14579b;
    background:#f7faff;
}

.dashes_ara_main .taxmate-wrapper .sub-tab.active{
    color:#14579b;
    border-bottom-color:#14579b;
    font-weight:bold;
}

/* =========================================================
   CONTENT
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .content-layout{
    display:grid;
    grid-template-columns:minmax(0,1fr) 260px;
    gap:10px;
    margin-top:10px;
}

.dashes_ara_main .taxmate-wrapper .main-content{
    min-width:0;
}

.dashes_ara_main .taxmate-wrapper .side-content{
    min-width:0;
}

.dashes_ara_main .taxmate-wrapper .card{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-bottom:10px;
    overflow:hidden;
}

.dashes_ara_main .taxmate-wrapper .card-header{
    padding:12px 14px;
    border-bottom:1px solid #e4ebf2;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.dashes_ara_main .taxmate-wrapper .card-header h2{
    margin:0;
    font-size:15px;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .card-header p{
    margin:3px 0 0;
    font-size:10px;
    color:#8090a2;
}

.dashes_ara_main .taxmate-wrapper .card-body{
    padding:12px 14px;
}

/* =========================================================
   EMPLOYER
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .employer-box{
    border:1px solid #dce5ef;
    border-radius:6px;
    overflow:hidden;
}

.dashes_ara_main .taxmate-wrapper .employer-top{
    padding:12px;
    background:#fbfdff;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.dashes_ara_main .taxmate-wrapper .employer-name{
    font-weight:bold;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .badge{
    display:inline-block;
    padding:3px 7px;
    background:#e7f7ef;
    color:#0a9960;
    border-radius:20px;
    font-size:9px;
    margin-left:6px;
}

.dashes_ara_main .taxmate-wrapper .edit-btn,
.dashes_ara_main .taxmate-wrapper .add-btn{
    border:1px solid #cddbea;
    background:#fff;
    color:#14579b;
    padding:6px 10px;
    border-radius:4px;
    cursor:pointer;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .employer-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    border-top:1px solid #e4ebf2;
}

.dashes_ara_main .taxmate-wrapper .info-cell{
    padding:9px 11px;
    border-right:1px solid #e4ebf2;
}

.dashes_ara_main .taxmate-wrapper .info-cell:last-child{
    border-right:none;
}

.dashes_ara_main .taxmate-wrapper .info-label{
    font-size:8px;
    color:#8796a7;
    margin-bottom:3px;
}

.dashes_ara_main .taxmate-wrapper .info-value{
    font-size:10px;
    font-weight:bold;
    color:#3b526a;
}

/* =========================================================
   TABLES
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .data-table{
    width:100%;
    border-collapse:collapse;
}

.dashes_ara_main .taxmate-wrapper .data-table th{
    background:#f3f7fb;
    color:#536c84;
    font-size:9px;
    text-align:left;
    padding:9px 8px;
    border-bottom:1px solid #dce5ef;
}

.dashes_ara_main .taxmate-wrapper .data-table td{
    padding:8px;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
    color:#465b70;
}

.dashes_ara_main .taxmate-wrapper .data-table tr:last-child td{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .amount{
    text-align:right;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .total-row td{
    font-weight:bold;
    background:#fafcfe;
}

/* =========================================================
   SUMMARY SIDEBAR
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .status-card{
    text-align:center;
}

.dashes_ara_main .taxmate-wrapper .status-icon{
    width:48px;
    height:48px;
    border-radius:50%;
    background:#e9f8f1;
    color:#0ba365;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    margin:8px auto 8px;
}

.dashes_ara_main .taxmate-wrapper .status-title{
    font-weight:bold;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .status-text{
    font-size:10px;
    color:#8391a1;
    margin-top:4px;
}

.dashes_ara_main .taxmate-wrapper .summary-row{
    display:flex;
    justify-content:space-between;
    padding:8px 0;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .summary-row:last-child{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .summary-row span:first-child{
    color:#738398;
}

.dashes_ara_main .taxmate-wrapper .summary-row strong{
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .estimated{
    margin-top:8px;
    padding:10px;
    background:#eaf8f1;
    border-radius:5px;
    display:flex;
    justify-content:space-between;
    color:#07945b;
    font-weight:bold;
	font-size: 12px;
}

/* =========================================================
   DOCUMENTS
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .doc-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:9px 0;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .doc-row:last-child{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .uploaded{
    background:#e5f8ed;
    color:#0b995e;
    padding:3px 6px;
    border-radius:4px;
    font-size:8px;
}

.dashes_ara_main .taxmate-wrapper .pending{
    background:#fff3dc;
    color:#d89400;
    padding:3px 6px;
    border-radius:4px;
    font-size:8px;
}

/* =========================================================
   TAB CONTENT
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .tab-content{
    display:none;
}

.dashes_ara_main .taxmate-wrapper .tab-content.active{
    display:block;
}

/* =========================================================
   CROSS VERIFICATION
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .verify-table th,
.dashes_ara_main .taxmate-wrapper .verify-table td{
    text-align:left;
}

.dashes_ara_main .taxmate-wrapper .match{
    color:#07945b;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .difference-zero{
    color:#07945b;
}

/* =========================================================
   FOOTER ACTIONS
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .bottom-actions{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    padding:10px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:10px;
}

.dashes_ara_main .taxmate-wrapper .left-actions,
.dashes_ara_main .taxmate-wrapper .right-actions{
    display:flex;
    gap:7px;
}

.dashes_ara_main .taxmate-wrapper .action-btn{
    border:1px solid #ccd9e6;
    background:#fff;
    color:#526b84;
    padding:8px 12px;
    border-radius:4px;
    cursor:pointer;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .primary-btn{
    background:#14579b;
    color:#fff;
    border-color:#14579b;
}

.dashes_ara_main .taxmate-wrapper .success-btn{
    background:#13a66a;
    color:#fff;
    border-color:#13a66a;
}

/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width:900px){

    .dashes_ara_main .taxmate-wrapper .step-header{
        flex-wrap:wrap;
    }

    .dashes_ara_main .taxmate-wrapper .progress-area{
        order:3;
        width:100%;
    }

    .dashes_ara_main .taxmate-wrapper .content-layout{
        grid-template-columns:1fr;
    }

    .dashes_ara_main .taxmate-wrapper .side-content{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:10px;
    }

    .dashes_ara_main .taxmate-wrapper .employer-grid{
        grid-template-columns:1fr 1fr;
    }

}

@media(max-width:600px){

    .dashes_ara_main .taxmate-wrapper .taxmate-wrapper{
        width:97%;
        margin-top:8px;
    }

    .dashes_ara_main .taxmate-wrapper .step-header{
        padding:10px;
    }

    .dashes_ara_main .taxmate-wrapper .step-title h1{
        font-size:19px;
    }

    .dashes_ara_main .taxmate-wrapper .header-actions{
        width:100%;
        justify-content:flex-end;
    }

    .dashes_ara_main .taxmate-wrapper .content-layout{
        display:block;
    }

    .dashes_ara_main .taxmate-wrapper .side-content{
        display:block;
    }

    .dashes_ara_main .taxmate-wrapper .employer-grid{
        grid-template-columns:1fr 1fr;
    }

    .dashes_ara_main .taxmate-wrapper .bottom-actions{
        flex-direction:column;
        gap:8px;
        align-items:stretch;
    }

    .dashes_ara_main .taxmate-wrapper .left-actions,
    .dashes_ara_main .taxmate-wrapper .right-actions{
        justify-content:center;
    }
}




@media (min-width: 320px) and (max-width: 767px) {.mb_v_show{display:block !important;}.mb_v_hine{display:none !important;}.ads_areea{display:none;}.dashes_ara_main .topbar .greeting {text-align: center; width: 100%; display: inline-block; margin-bottom: 12px;}.dashes_ara_main .top-actions {justify-content: space-between;}.dashes_ara_main .layout {display: block;}.dashes_ara_main .right-stack {display: grid; grid-template-columns: 1fr 1fr;}.dashes_ara_main .doc-grid {grid-template-columns: repeat(3, 1fr);}.dashes_ara_main .grid-top {grid-template-columns: 1fr;}.dashes_ara_main .quick {grid-column: auto;}.dashes_ara_main {padding: 15px 0 0;}.dashes_ara_main .topbar {align-items: flex-start; display: block;}.dashes_ara_main .greeting h1 {font-size: 17px;}.dashes_ara_main .user {display: none;}.dashes_ara_main .step-grid {grid-template-columns: 1fr;}.dashes_ara_main .summary{grid-template-columns: 1fr 1fr;}.dashes_ara_main .right-stack {grid-template-columns: 1fr; margin-bottom: 15px;}.dashes_ara_main .activity.rececents {height: auto; overflow: initial; margin-top: 15px;}.dashes_ara_main .step-line {overflow: auto; justify-content: flex-start;}.dashes_ara_main .arrow {min-width: 20px;}.dashes_ara_main .progress-title h2 {margin-top: 0;}.dashes_ara_main .profile-head h3{margin-top: 0;}.dashes_ara_main .quick h3{margin-top: 0;}.dashes_ara_main .section-title h2{margin-top: 5px; font-size: 14px;}.matex_dashbrd .news-slider {padding: 0 35px; display:none;}.matex_dashbrd .news-card {min-height: 240px;}.matex_dashbrd .news-title {font-size: 17px;}.matex_dashbrd .news-description {font-size: 17px;}.matex_dashbrd .news-slider .owl-nav .owl-prev {left: -30px;}.matex_dashbrd .news-slider .owl-nav .owl-next {right: -30px;}.mobile_menu_btn {display: block; border: #1c5299 solid 2px; padding: 3px 7px; border-radius:4px;}.mobile_menu_btn i {color: #1c5299;}.side_menusses {display:block; position:fixed; top:initial; left:0; bottom:initial; width:280px; height:100vh; background:#1a4f96; z-index:10000; overflow-y:auto; transform: translateX(-100%); transition:transform 0.35s ease; box-shadow:3px 0 15px rgba(0, 0, 0, 0.15);}.side_menusses.menu_open {transform: translateX(0);}.side_menusses .navigation {margin:0; padding:20px 0;}.side_menusses .nav-item {width: 100%;}}




</style>
<section class="matex_dashbrd">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="ads_areea"><img class="logo" src="{{ url('home/img/1cr_tax_mate.png')}}" alt="" /></div>
                <div class="side_menusses">
                    <ul class="navigation">
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-home"></i> <span class="menu-title">Tax Wallet</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-briefcase"></i> <span class="menu-title">Salary Income</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-university"></i> <span class="menu-title">House Property</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-line-chart"></i> <span class="menu-title">Capital Gains</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-building"></i>
                                <span class="menu-title">Business / Professional Income</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-usd"></i> <span class="menu-title">Other Sources</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-bullseye"></i> <span class="menu-title">Deductions & Tax Planning</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-bar-chart"></i> <span class="menu-title">TDS/TCS & Advance Taxes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-file-text"></i>
                                <span class="menu-title">Review, Documents & File Return</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calculator"></i>
                                <span class="menu-title">Tax Summary & Computation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-clock-o"></i> <span class="menu-title">Previous Years</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-file"></i> <span class="menu-title">Documents</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-download"></i> <span class="menu-title">Downloads</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <i class="fa fa-cog"></i> <span class="menu-title">Settings & Profile</span>
                                <a href="javascript:void(0);" class="you_vioss">
                                    <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="login.html">
                                <i class="fa fa-question-circle"></i> <span class="menu-title">Help & Support</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="news-slider owl-carousel owl-theme">
                    <!-- Card 1 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Real Estate Prices Rise in Major Cities</h3>
                        <p class="news-description">
                            Property prices across major metro cities increased steadily due to growing housing demand.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 2 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Property Market Shows Strong Growth</h3>
                        <p class="news-description">
                            The property market continues to grow as buyers look for better investment opportunities.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 3 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">New Housing Projects Announced</h3>
                        <p class="news-description">
                            Several new residential projects have been announced across developing metropolitan areas.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 4 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Property Investment Opportunities</h3>
                        <p class="news-description">
                            Investors are exploring new opportunities in residential and commercial real estate markets.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashes_ara_main">
				   <div class="topbar">
                        <div class="greeting">
                            <h1>Good Evening, <span>Ramjee Meena</span> 👋</h1>
                            <p>Welcome back to your Tax Wallet</p>
                        </div>
                        <div class="top-actions">
                            <div class="st_ds_areaa">
                                <select class="fy" onchange="notify('Financial Year changed to '+this.value)">
                                    <option>FY 2026-27</option>
                                    <option>FY 2025-26</option>
                                    <option>FY 2024-25</option>
                                </select>
                                <button class="icon-btn" onclick="notify('You have 3 notifications')">
                                    <i class="fa fa-bell"></i><b class="bell-dot">3</b>
                                </button>
                                <div class="user">
                                    <div class="avatar">RM</div>
                                    Ramjee Meena <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <button type="button" class="mobile_menu_btn"><i class="fa fa-bars"></i></button>
                        </div>
                   </div>
				  <div class="cover_areea">                    
                    <!===== Mobile View ======>
                    <div class="right-stack mb_v_show">
                        <div class="card tax-health">
                            <div class="health-row">
                                <h3>Tax Health</h3>
                                <span class="stars">★★★★<span style="color: #dfe3e8">★</span></span>
                                <span class="health-good">Good</span>
                            </div>
                            <div class="health-grid">
                                <div class="health-metric"><span>Return Type</span><strong>ITR-2</strong></div>
                                <div class="health-metric">
                                    <span>Tax Regime</span><strong class="good">New Regime</strong>
                                </div>
                                <div class="health-metric">
                                    <span>Estimated Refund</span><strong class="good">₹18,450</strong>
                                </div>
                                <div class="health-metric"><span>Last Saved</span><strong>Today, 07:45 PM</strong></div>
                            </div>
                        </div>
                    </div>
                    <!===== End Mobile View ======>
                    <div class="grid-top">
                        <div class="card progress-card">
                            <div class="progress-title">
                                <div><h2>Overall Progress</h2></div>
                                <div class="percent">62%</div>
                            </div>
                            <div class="bar"><span></span></div>
                            <div class="continue">
                                <span>Continue where you left off</span>
                                <button class="primary" onclick="notify('Opening next pending step...')">
                                    Continue Filing →
                                </button>
                            </div>
                        </div>
                        <div class="card profile-card">
                            <div class="profile-head">
                                <h3>
                                    <i class="fa fa-user-circle"></i> Personal Profile
                                    <a href="javascript:void(0);" class="you_vioss">
                                        <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                    </a>
                                </h3>
                                <span class="complete">● Completed</span>
                            </div>
                            <div class="profile-row">
                                <div class="metric"><label>Updated</label><strong>12 Jul 2026</strong></div>
                                <div class="metric">
                                    <label>Profile Status</label><strong class="good">Complete</strong>
                                </div>
                            </div>
                            <div class="profile-date">Permanent taxpayer profile • View / Edit Profile →</div>
                        </div>
                        <div class="card quick">
                            <h3>Quick Actions</h3>
                            <div class="quick-grid">
                                <div class="quick-item blue" onclick="notify('Upload Document')">
                                    <i class="fa fa-arrow-up"></i>Upload<br />Document
                                </div>
                                <div class="quick-item green" onclick="notify('Download Computation')">
                                    <i class="fa fa-download"></i>Download<br />Computation
                                </div>
                                <div class="quick-item purple" onclick="notify('Start Tax Summary')">
                                    <i class="fa fa-calculator"></i>Start Tax<br />Summary
                                </div>
                                <div class="quick-item orange" onclick="notify('Opening Previous Year')">
                                    <i class="fa fa-folder-open"></i>View Last<br />Year
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layout">
                        <div>
                            <div class="section card steps mt-0">
                                <div class="section-title">
                                    <h2>Filing Progress (9 Steps)</h2>
                                    <a href="#" onclick="notify('Showing all filing steps');return false;"
                                        >View Details →</a
                                    >
                                </div>
                                <!--<div class="step-line">
                                    <div class="circle">1</div>
                                    <div class="arrow"></div>
                                    <div class="circle">2</div>
                                    <div class="arrow"></div>
                                    <div class="circle">3</div>
                                    <div class="arrow"></div>
                                    <div class="circle">4</div>
                                    <div class="arrow"></div>
                                    <div class="circle warn">5</div>
                                    <div class="arrow"></div>
                                    <div class="circle warn">6</div>
                                    <div class="arrow"></div>
                                    <div class="circle">7</div>
                                    <div class="arrow"></div>
                                    <div class="circle warn">8</div>
                                    <div class="arrow"></div>
                                    <div class="circle lock">9</div>
                                </div>--->
                                <div class="step-grid">
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">1</div>
                                        <div class="step-icon"><i class="fa fa-briefcase"></i></div>
                                        <h3 class="clickshowdata">Salary Income</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 14 Jul 2026</div>
                                    </div>
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">2</div>
                                        <div class="step-icon"><i class="fa fa-home"></i></div>
                                        <h3>House Property</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 15 Jul 2026</div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">3</div>
                                        <div class="step-icon"><i class="fa fa-line-chart"></i></div>
                                        <h3>Capital Gains</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 45%"></span></div>
                                            <div class="mini-percent">45%</div>
                                        </div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">4</div>
                                        <div class="step-icon"><i class="fa fa-building"></i></div>
                                        <h3>Business /<br />Professional Income</h3>
                                        <div class="step-status">◉ Not Started</div>
                                    </div>
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">5</div>
                                        <div class="step-icon"><i class="fa fa-dollar"></i></div>
                                        <h3>Other Sources</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">6</div>
                                        <div class="step-icon"><i class="fa fa-bullseye"></i></div>
                                        <h3>Deductions &amp;<br />Tax Planning</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 30%"></span></div>
                                            <div class="mini-percent">30%</div>
                                        </div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">7</div>
                                        <div class="step-icon"><i class="fa fa-bar-chart"></i></div>
                                        <h3>TDS/TCS &amp; Advance Taxes</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 60%"></span></div>
                                            <div class="mini-percent">60%</div>
                                        </div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">8</div>
                                        <div class="step-icon"><i class="fa fa-calculator"></i></div>
                                        <h3>Review, Documents &amp;<br />ITR Mapping</h3>
                                        <div class="step-status">🔒 Locked</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">9</div>
                                        <div class="step-icon"><i class="fa fa-file"></i></div>
                                        <h3>Tax Summary &amp;<br />Computation</h3>
                                        <div class="step-status">🔒 Locked</div>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="section-title">
                                    <h2>
                                        Income &amp; Tax Summary
                                        <small style="font-size: 9px; color: #8a95a6">(Preview)</small>
                                    </h2>
                                    <a href="#" onclick="notify('Opening detailed tax summary');return false;"
                                        >View Details →</a
                                    >
                                </div>
                                <div class="summary">
                                    <div class="summary-card">
                                        <div class="sum-icon"><i class="fa fa-shopping-bag"></i></div>
                                        <div><label>Gross Total Income</label><strong>₹24.35 Lakh</strong></div>
                                    </div>
                                    <div class="summary-card sum-green">
                                        <div class="sum-icon"><i class="fa fa-tag"></i></div>
                                        <div><label>Total Deductions</label><strong>₹2.15 Lakh</strong></div>
                                    </div>
                                    <div class="summary-card sum-yellow">
                                        <div class="sum-icon"><i class="fa fa-calculator"></i></div>
                                        <div><label>Total Tax Payable</label><strong>₹42,520</strong></div>
                                    </div>
                                    <div class="summary-card sum-red">
                                        <div class="sum-icon"><i class="fa fa-rupee"></i></div>
                                        <div><label>Estimated Refund</label><strong class="good">₹18,450</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section card documents">
                                <div class="section-title">
                                    <h2 style="font-size: 13px">Documents Status</h2>
                                    <a href="#" onclick="notify('Opening document manager');return false;"
                                        >Manage Documents →</a
                                    >
                                </div>
                                <div class="doc-grid">
                                    <div class="doc">
                                        <h4>Form 16</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>AIS (Annual Info.)</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Form 16A</h4>
                                        <p class="pending">◷ Pending</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Bank Statements</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Home Loan Docs</h4>
                                        <p class="pending">◷ Pending</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Capital Gain Proof</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-stack">
                            <!====== Mobile View Hide ======>
                            <div class="card tax-health mb_v_hine">
                                <div class="health-row">
                                    <h3>Tax Health</h3>
                                    <span class="stars">★★★★<span style="color: #dfe3e8">★</span></span>
                                    <span class="health-good">Good</span>
                                </div>
                                <div class="health-grid">
                                    <div class="health-metric"><span>Return Type</span><strong>ITR-2</strong></div>
                                    <div class="health-metric">
                                        <span>Tax Regime</span><strong class="good">New Regime</strong>
                                    </div>
                                    <div class="health-metric">
                                        <span>Estimated Refund</span><strong class="good">₹18,450</strong>
                                    </div>
                                    <div class="health-metric">
                                        <span>Last Saved</span><strong>Today, 07:45 PM</strong>
                                    </div>
                                </div>
                            </div>
                            <!====== End Mobile View Hide ======>
                            <div class="card activity rececents">
                                <div class="section-title">
                                    <h3>Recent Activity</h3>
                                    <a href="#" onclick="notify('Showing all activity');return false;">View All</a>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-shopping-bag"></i></div>
                                    <div class="activity-text">
                                        <strong>Salary details updated</strong><span>Today, 07:45 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-download"></i></div>
                                    <div class="activity-text">
                                        <strong>AIS document uploaded</strong><span>Today, 06:30 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-file"></i></div>
                                    <div class="activity-text">
                                        <strong>Return created for FY 2026-27</strong><span>15 Jul 2026, 09:10 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card years">
                                <div class="section-title">
                                    <h3>Previous Years</h3>
                                    <a href="#" onclick="notify('Opening all previous years');return false;"
                                        >View All</a
                                    >
                                </div>
                                <div class="year-card">
                                    <div class="year-top">
                                        <span>FY 2025-26 <small>(AY 2026-27)</small></span
                                        ><span class="filed">Filed</span>
                                    </div>
                                    <div class="year-bottom">
                                        <span>Refund: <b class="good">₹14,520</b></span
                                        ><a href="#">View / Download</a>
                                    </div>
                                </div>
                                <div class="year-card">
                                    <div class="year-top">
                                        <span>FY 2024-25 <small>(AY 2025-26)</small></span
                                        ><span class="filed">Filed</span>
                                    </div>
                                    <div class="year-bottom">
                                        <span>Refund: <b class="good">₹12,800</b></span
                                        ><a href="#">View / Download</a>
                                    </div>
                                </div>
                                <div class="year-card">
                                    <div class="year-top">
                                        <span>FY 2023-24 <small>(AY 2024-25)</small></span
                                        ><span class="filed">Filed</span>
                                    </div>
                                    <div class="year-bottom">
                                        <span>Refund: <b class="good">₹9,650</b></span
                                        ><a href="#">View / Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
				  
				  <!=======  Salary Income ===========>
					<div class="new_show_div" style="display: none">
						<div class="taxmate-wrapper">
							<div class="step-header">
								<div class="step-title-area">
									<div class="step-number">01</div>

									<div class="step-title">
										<h1>Salary Income</h1>
										<p>Add and verify your salary income details from Form 16, AIS and other documents.</p>
									</div>
								</div>

								<div class="header-actions">
									<button class="help-btn">ⓘ Need Help?</button>
									<button class="video-help" onclick="openVideoHelp()" title="Watch Video Help">▶</button>

									<div class="progress-area">
										<div class="progress-label">
											<span>Step Progress</span>
											<strong>100%</strong>
										</div>
										<div class="progress-bar">
											<div class="progress-fill"></div>
										</div>
									</div>

									<button class="dashboard-btn" onclick="goDashboard()">Go to Dashboard →</button>
								</div>
							</div>

							<div class="step-flow">
								<div class="steps">
									<div class="flow-step active" onclick="showMessage('You are already on Salary Income.')">
										<div class="flow-circle">01</div>
										<div class="flow-label">Salary<br />Income</div>
									</div>

									<div class="flow-step completed" onclick="openStep(2)">
										<div class="flow-circle">02</div>
										<div class="flow-label">House<br />Property</div>
									</div>

									<div class="flow-step pending" onclick="openStep(3)">
										<div class="flow-circle">03</div>
										<div class="flow-label">Capital<br />Gains</div>
									</div>

									<div class="flow-step pending" onclick="openStep(4)">
										<div class="flow-circle">04</div>
										<div class="flow-label">Business /<br />Professional</div>
									</div>

									<div class="flow-step completed" onclick="openStep(5)">
										<div class="flow-circle">05</div>
										<div class="flow-label">Other<br />Sources</div>
									</div>

									<div class="flow-step pending" onclick="openStep(6)">
										<div class="flow-circle">06</div>
										<div class="flow-label">Deductions &<br />Tax Planning</div>
									</div>

									<div class="flow-step pending" onclick="openStep(7)">
										<div class="flow-circle">07</div>
										<div class="flow-label">TDS /<br />TCS</div>
									</div>

									<div class="flow-step pending" onclick="openStep(8)">
										<div class="flow-circle">08</div>
										<div class="flow-label">Review &<br />ITR</div>
									</div>

									<div class="flow-step pending" onclick="openStep(9)">
										<div class="flow-circle">09</div>
										<div class="flow-label">Tax<br />Summary</div>
									</div>
								</div>
							</div>

							<div class="sub-tabs">
								<button class="sub-tab active" onclick="openTab(event,'incomeDetails')">Income Details</button>
								<button class="sub-tab" onclick="openTab(event,'exemptions')">Exemptions</button>
								<button class="sub-tab" onclick="openTab(event,'allowances')">Allowances</button>
								<button class="sub-tab" onclick="openTab(event,'form16')">Form 16 & AIS Summary</button>
								<button class="sub-tab" onclick="openTab(event,'crossVerification')">Cross Verification</button>
								<button class="sub-tab" onclick="openTab(event,'taxComputation')">Tax Computation</button>
							</div>


							<div class="content-layout">
								<div class="main-content">
								    <!-- ======================= SUB STEP 1 : INCOME DETAILS ======================= -->
									<div id="incomeDetails" class="tab-content active">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Employer Details</h2>
													<p>Employer information is automatically taken from Personal Profile.</p>
												</div>

												<div>
													<button class="edit-btn">✎ Edit Employer</button>
													<button class="add-btn">＋ Add Employer</button>
												</div>
											</div>

											<div class="card-body">
												<div class="employer-box">
													<div class="employer-top">
														<div>
															<span class="employer-name"> Indian Oil Corporation Limited </span>

															<span class="badge"> Current Employer </span>

															<div style="font-size: 9px; color: #7d8b9b; margin-top: 4px">
																Chief Manager • Panipat, PNCP
															</div>
														</div>
													</div>

													<div class="employer-grid">
														<div class="info-cell">
															<div class="info-label">Employment Period</div>
															<div class="info-value">01-Apr-2025 → Present</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Employee Code</div>
															<div class="info-value">IOCLXYZ1226</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Employer PAN / TAN</div>
															<div class="info-value">XXXXXXXX</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Form 16</div>
															<div class="info-value" style="color: #09945c">● Uploaded</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- SALARY COMPOSITION -->
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Income Composition</h2>
													<p>Salary components captured from Form 16, Salary Slips, AIS and other sources.</p>
												</div>

												<button class="add-btn">＋ Add Salary Component</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Salary Component</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Basic Pay</td>
															<td>Form 16 Part B</td>
															<td class="amount">15,80,041.68</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Dearness Allowance / Variable DA</td>
															<td>Form 16 Part B</td>
															<td class="amount">8,01,776.23</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Bonus / Performance Pay</td>
															<td>Form 16</td>
															<td class="amount">3,61,491.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Leave Encashment</td>
															<td>Form 16</td>
															<td class="amount">2,38,296.12</td>
														</tr>

														<tr>
															<td>5</td>
															<td>Other Allowances</td>
															<td>Form 16</td>
															<td class="amount">2,95,754.21</td>
														</tr>

														<tr>
															<td>6</td>
															<td>Other Reimbursement</td>
															<td>Salary Records</td>
															<td class="amount">68,076.40</td>
														</tr>

														<tr>
															<td>7</td>
															<td>Arrears from Previous Year(s)</td>
															<td>Form 16</td>
															<td class="amount">-4,450.80</td>
														</tr>

														<tr>
															<td>8</td>
															<td>Employer NPS Contribution</td>
															<td>Form 16 / NPS</td>
															<td class="amount">2,02,454.00</td>
														</tr>

														<tr>
															<td>9</td>
															<td>Cafeteria Allowance</td>
															<td>Salary Records</td>
															<td class="amount">1,02,843.90</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Gross Emoluments</td>
															<td class="amount">₹39,94,981.89</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- PERQUISITES -->
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Perquisites</h2>
													<p>Perquisites reported in Form 12BA / employer records.</p>
												</div>

												<button class="add-btn">＋ Add Perquisite</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Perquisite</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Accommodation</td>
															<td>Form 12BA</td>
															<td class="amount">1,58,948.73</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Cars / Other Automotive</td>
															<td>Form 12BA</td>
															<td class="amount">1,781.57</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Gas / Electricity / Water</td>
															<td>Form 12BA</td>
															<td class="amount">20,726.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Interest Free / Concessional Loans</td>
															<td>Form 12BA</td>
															<td class="amount">1,32,250.73</td>
														</tr>

														<tr>
															<td>5</td>
															<td>Use of Movable Assets by Employees</td>
															<td>Form 12BA</td>
															<td class="amount">35,000.04</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Total Perquisites</td>
															<td class="amount">₹3,48,707.07</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 2 : EXEMPTIONS ======================= -->

									<div id="exemptions" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Exemptions</h2>
													<p>Review exemptions applicable to salary income.</p>
												</div>
												<button class="add-btn">＋ Add Exemption</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Exemption</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>House Rent Allowance (HRA)</td>
															<td>Form 16 / Salary Records</td>
															<td class="amount">0.00</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Leave Travel Allowance (LTA)</td>
															<td>Form 16</td>
															<td class="amount">0.00</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Leave Encashment</td>
															<td>Form 16</td>
															<td class="amount">0.00</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Total Exemptions</td>
															<td class="amount">₹0.00</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 3 : ALLOWANCES ======================= -->

									<div id="allowances" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Allowances & Salary Benefits</h2>
													<p>Review taxable and potentially exempt salary allowances.</p>
												</div>
												<button class="add-btn">＋ Add Allowance</button>
											</div>
											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Allowance</th>
															<th>Tax Treatment</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Basic Pay</td>
															<td>Taxable</td>
															<td class="amount">15,80,041.68</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Dearness Allowance</td>
															<td>Taxable</td>
															<td class="amount">8,01,776.23</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Bonus / Performance Pay</td>
															<td>Taxable</td>
															<td class="amount">3,61,491.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Other Allowances</td>
															<td>Review Required</td>
															<td class="amount">2,95,754.21</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 4 : FORM 16 & AIS ======================= -->

									<div id="form16" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Form 16 & AIS Salary Summary</h2>
													<p>Compare salary information received from different sources.</p>
												</div>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>Particular</th>
															<th class="amount">Form 16</th>
															<th class="amount">AIS</th>
															<th class="amount">Salary Records</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>Gross Salary</td>
															<td class="amount">₹15,80,042</td>
															<td class="amount">₹15,80,042</td>
															<td class="amount">₹15,80,042</td>
														</tr>

														<tr>
															<td>TDS on Salary</td>
															<td class="amount">₹2,84,500</td>
															<td class="amount">₹2,84,500</td>
															<td class="amount">₹2,84,500</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 5 : CROSS VERIFICATION ======================= -->

									<div id="crossVerification" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Cross Verification</h2>
													<p>
														Verify salary figures across Form 16, salary computation, AIS and other available
														sources.
													</p>
												</div>
												<span class="badge">✓ Verified</span>
											</div>

											<div class="card-body">
												<table class="data-table verify-table">
													<thead>
														<tr>
															<th>Particular</th>
															<th>Form 16</th>
															<th>Salary Computation</th>
															<th>AIS</th>
															<th>Other Source</th>
															<th>Difference</th>
															<th>Status</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>Gross Salary</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td class="difference-zero">₹0</td>

															<td class="match">✓ Match</td>
														</tr>

														<tr>
															<td>TDS</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td class="difference-zero">₹0</td>

															<td class="match">✓ Match</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- =======================  SUB STEP 6 : TAX COMPUTATION  ======================= -->

									<div id="taxComputation" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Tax Computation</h2>
													<p>Final salary income computation before moving to the next filing step.</p>
												</div>
											</div>

											<div class="card-body">
												<table class="data-table">
													<tbody>
														<tr>
															<td>Gross Salary</td>
															<td class="amount">₹15,80,042</td>
														</tr>

														<tr>
															<td>Less: Standard Deduction</td>
															<td class="amount">₹75,000</td>
														</tr>

														<tr class="total-row">
															<td>Income Chargeable Under Salary</td>
															<td class="amount">₹15,05,042</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<!-- =======================  RIGHT SIDEBAR  ======================= -->

								<div class="side-content">
									<div class="card status-card">
										<div class="card-header">
											<h2>Verification Status</h2>
										</div>

										<div class="card-body">
											<div class="status-icon">✓</div>
											<div class="status-title">Salary Verified</div>

											<div class="status-text">Available salary sources are matching.</div>
										</div>
									</div>

									<!-- QUICK SUMMARY -->

									<div class="card">
										<div class="card-header">
											<h2>Quick Summary</h2>
										</div>
										<div class="card-body">
											<div class="summary-row">
												<span>Gross Salary</span>
												<strong>₹15,80,042</strong>
											</div>
											<div class="summary-row">
												<span>Exemptions</span>
												<strong>₹0</strong>
											</div>
											<div class="summary-row">
												<span>Salary Deduction</span>
												<strong>₹75,000</strong>
											</div>
											<div class="summary-row">
												<span>Taxable Salary</span>
												<strong>₹15,05,042</strong>
											</div>
											<div class="estimated">
												<span>Estimated Tax</span>
												<span>₹1,12,450</span>
											</div>
										</div>
									</div>

									<!-- DOCUMENTS -->

									<div class="card">
										<div class="card-header">
											<h2>Documents</h2>
										</div>
										<div class="card-body">
											<div class="doc-row">
												<span>Form 16</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>Form 12BA</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>AIS Salary Section</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>Salary Slip</span>
												<span class="pending">Optional</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- ======================= BOTTOM ACTIONS ======================= -->

							<div class="bottom-actions">
								<div class="left-actions">
									<button class="action-btn">← Previous Step</button>
								</div>

								<div class="right-actions">
									<button class="action-btn">Save Progress</button>

									<button class="action-btn">Save & Exit</button>

									<button class="action-btn success-btn">✓ Step Completed</button>

									<button class="action-btn primary-btn" onclick="openStep(2)">Continue to Step 2 →</button>
								</div>
							</div>
						</div>
					</div>
                  <!=======  End Salary Income ===========>				  
                </div>
            </div>
        </div>
    </div>
</section>

 
 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Owl Carousel JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
 
 <script>
 $(document).ready(function () {

    $(".clickshowdata").on("click", function () {

        $(".cover_areea").hide();
        $(".new_show_div").fadeIn(300);

    });

});
 </script>
 
 
 
 
 <script>

/* =========================================================
   SUB-STEP / TAB NAVIGATION
   ========================================================= */

function openTab(event, tabId){

    /* Hide all sub-step content */
    const contents = document.querySelectorAll('.tab-content');

    contents.forEach(function(content){
        content.classList.remove('active');
    });

    /* Remove active from all tabs */
    const tabs = document.querySelectorAll('.sub-tab');

    tabs.forEach(function(tab){
        tab.classList.remove('active');
    });

    /* Show selected content */
    const selected = document.getElementById(tabId);

    if(selected){
        selected.classList.add('active');
    }

    /* Activate clicked tab */
    event.currentTarget.classList.add('active');

    /* Scroll gently to content */
    document.querySelector('.content-layout').scrollIntoView({
        behavior:'smooth',
        block:'start'
    });
}


/* =========================================================
   STEP NAVIGATION
   ========================================================= */

function openStep(stepNumber){

    if(stepNumber === 1){
        return;
    }

    alert(
        "Step " + stepNumber +
        " will open here when its design is added."
    );
}


/* =========================================================
   VIDEO HELP
   ========================================================= */

function openVideoHelp(){

    alert(
        "Salary Income – Video Help\n\n" +
        "Your developer can replace this action with the " +
        "YouTube/video modal or embedded TaxMate help video."
    );

}


/* =========================================================
   DASHBOARD
   ========================================================= */

function goDashboard(){

    alert(
        "Go to TaxMate Dashboard"
    );

}


/* =========================================================
   MESSAGE
   ========================================================= */

function showMessage(message){
    alert(message);
}

</script>
 
 
 <script>        $(document).ready(function () {            $(".news-slider").owlCarousel({                loop: true,                margin: 0,                nav: true,                dots: false,                autoplay: true,                autoplayTimeout: 4000,                autoplayHoverPause: true,                smartSpeed: 600,                responsive: {                    0: {                        items: 1                    },                    576: {                        items: 1                    },                    992: {                        items: 1                    },                    1200: {                        items: 1                    }                }            });        });    </script>			<script>		$(document).ready(function () {			$(".mobile_menu_btn").on("click", function () {				if ($(window).width() <= 767) {					$(".side_menusses").toggleClass("menu_open");					$(this).find("i").toggleClass("fa-bars fa-times");				}			});		});	</script>
@endsection
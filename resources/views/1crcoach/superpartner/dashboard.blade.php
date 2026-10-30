@extends('1crcoach.layouts.app')
@section('content')    <!-- Owl Carousel CSS -->    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>
.matex_dashbrd .app.one-cr-cochss {
    max-width: 100%;
    margin: auto;
    padding:0;
	 margin: 40px 0;
}
.matex_dashbrd .app.one-cr-cochss button,
.matex_dashbrd .app.one-cr-cochss select,
.matex_dashbrd .app.one-cr-cochss input {
    font: inherit;
    cursor: pointer;
}
.matex_dashbrd .app.one-cr-cochss .topbar {
    min-height: auto;
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius: 6px;
    display: grid;
    grid-template-columns: 190px 1fr 190px 190px;
    gap: 12px;
    align-items: center;
    padding: 9px 12px;
}
.matex_dashbrd .app.one-cr-cochss .topbox {
    height: auto;
    border: 1px solid #d9e2ef;
    border-radius: 9px;
    background: #fff;
    padding:10px 13px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: var(--ink);
}
.matex_dashbrd .app.one-cr-cochss .topbox b {
    font-size: 14px;
}

.matex_dashbrd .app.one-cr-cochss .explore-select {
    width: auto;
    height: auto;
    display: flex;
    align-items: center;
    padding: 9px 9px;
    border: 1px solid #d5deea;
    border-radius: 5px;
    background: #fff;
    box-sizing: border-box;
}

.matex_dashbrd .app.one-cr-cochss .explore-icon {
    width: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right:0px;
}

.matex_dashbrd .app.one-cr-cochss .explore-icon svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke: #071b3a;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.matex_dashbrd .app.one-cr-cochss .explore-select select {
    flex: 1;
    height: 100%;
    border: 0;
    outline: 0;
    background: transparent;
    font-size: 14px;
    font-weight: 600;
    color: #111;
    cursor: pointer;
    appearance: auto;
}


.matex_dashbrd .app.one-cr-cochss .welcome {
    text-align: center;
}
.matex_dashbrd .app.one-cr-cochss .welcome b {
    font-size: 19px;
    color: var(--navy);
}
.matex_dashbrd .app.one-cr-cochss .welcome small {
    display: block;
    color: var(--muted);
    margin-top: 3px;
}
.matex_dashbrd .app.one-cr-cochss .profile {
    display: flex;
    align-items: center;
    gap: 9px;
    justify-content: flex-end;
}
.matex_dashbrd .app.one-cr-cochss .avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #eaf2ff;
    color: #1761bd;
    display: grid;
    place-items: center;
    font-weight: 800;
}
.matex_dashbrd .app.one-cr-cochss .hero {
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius:6px;
    margin-top: 14px;
    padding: 22px;
    text-align: center;
}
.matex_dashbrd .app.one-cr-cochss .hero h1 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: var(--navy);
}
.matex_dashbrd .app.one-cr-cochss .hero p {
    margin: 8px auto 0;
    max-width: 900px;
    width: 100%;
    color: #53657f;
    font-size: 14px;
    line-height: 20px;
}
.matex_dashbrd .app.one-cr-cochss .eyebrow {
    font-size: 12px;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    color: var(--blue);
    font-weight: 800;
    margin-bottom: 7px;
}
.matex_dashbrd .app.one-cr-cochss .utility {
    margin-top: 12px;
    display: grid;
    grid-template-columns: repeat(3, 1fr) 1.05fr;
    gap: 10px;
}
.matex_dashbrd .app.one-cr-cochss .benefit,
.matex_dashbrd .app.one-cr-cochss .overall {
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius: 6px;
    padding: 13px 15px;
    min-height: 82px;
}
.matex_dashbrd .app.one-cr-cochss .benefit {
    display: flex;
    gap: 12px;
    align-items: center;
}
.matex_dashbrd .app.one-cr-cochss .bicon {
    width: 43px;
    height: 43px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    font-size: 21px;
    background: #eef8f2;
}
.matex_dashbrd .app.one-cr-cochss .benefit:nth-child(2) .bicon {
    background: #fff5dd;
}
.matex_dashbrd .app.one-cr-cochss .benefit:nth-child(3) .bicon {
    background: #edf4ff;
}
.matex_dashbrd .app.one-cr-cochss .benefit b {
    font-size: 13px;
}
.matex_dashbrd .app.one-cr-cochss .benefit span {
    display: block;
    color: var(--muted);
    font-size: 12px;
    margin-top: 3px;
}

.matex_dashbrd .app.one-cr-cochss .program-select {
    width: auto;
    height: auto;
}

.matex_dashbrd .app.one-cr-cochss .program-select select {
    width: 100%;
    height: auto;
    padding:9px 14px;
    border: 1px solid #d5deea;
    border-radius:5px;
    background-color: #fff;
    color: #111;
    font-size: 14px;
    font-weight: 600;
    outline: none;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' fill='none' stroke='%23071b3a' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 11px;
}

.matex_dashbrd .app.one-cr-cochss .program-select select:focus {
    border-color: #b9c8dc;
}

.matex_dashbrd .app.one-cr-cochss .overall .row {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    font-weight: 700;
}
.matex_dashbrd .app.one-cr-cochss .pct {
    color: var(--green);
    font-size: 17px;
}
.matex_dashbrd .app.one-cr-cochss .progress {
    height: 9px;
    background: #e5ebf2;
    border-radius: 99px;
    overflow: hidden;
    margin: 9px 0 5px;
}
.matex_dashbrd .app.one-cr-cochss .progress i {
    display: block;
    height: 100%;
    background: #19aa70;
    border-radius: 99px;
}
.matex_dashbrd .app.one-cr-cochss .overall small {
    color: var(--muted);
}
.journey {
    margin-top: 14px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.stage-row {
    display: grid;
    grid-template-columns: 235px minmax(0, 1fr);
    gap: 10px;
}
.matex_dashbrd .app.one-cr-cochss .stage-info,
.matex_dashbrd .app.one-cr-cochss .steps-area {
    border: 1px solid #e0e7f0;
    border-radius:6px;
    background: #fff;
}
.matex_dashbrd .app.one-cr-cochss .stage-info {
    padding: 18px 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.matex_dashbrd .app.one-cr-cochss .stage-info .label {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.08em;
    padding: 5px 9px;
    border-radius: 4px;
	display: inline-block;
    width: max-content;
}
.matex_dashbrd .app.one-cr-cochss .stage-info h2 {
    margin: 8px 0 5px;
    font-size: 15px;
    font-weight: 800;
    color: var(--navy);
}
.matex_dashbrd .app.one-cr-cochss .stage-info p {
    margin: 0;
    color: var(--muted);
    font-size: 12px;
}
.matex_dashbrd .app.one-cr-cochss .stage-count {
    font-size: 11px;
    color: var(--muted);
    margin-top: 12px;
}
.matex_dashbrd .app.one-cr-cochss .stage-mini {
    height: 7px;
    background: #e5ebf2;
    border-radius: 99px;
    overflow: hidden;
    margin-top: 6px;
}
.matex_dashbrd .app.one-cr-cochss .stage-mini i {
    display: block;
    height: 100%;
    border-radius: 99px;
}
.steps-area {
    padding: 16px 14px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}
.matex_dashbrd .app.one-cr-cochss .step-card {
    position: relative;
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius: 6px;
    min-height: 184px;
    padding: 24px 15px 13px;
    text-align: center;
    box-shadow: 0 4px 15px #1e375a0a;
}
.matex_dashbrd .app.one-cr-cochss .step-no {
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #fff;
    border: 2px solid var(--stage);
    display: grid;
    place-items: center;
    font-weight: 900;
    color: var(--stage);
    font-size: 14px;
}
.matex_dashbrd .app.one-cr-cochss .step-card h3 {
    margin: 6px 0 4px;
    font-size: 15px;
    color: var(--navy);
}
.matex_dashbrd .app.one-cr-cochss .step-card p {
    margin: 0;
    color: #62728a;
    font-size: 12px;
    min-height: 34px;
}
.matex_dashbrd .app.one-cr-cochss .step-meta {
    margin-top: 12px;
    font-size: 11px;
    color: var(--muted);
}
.matex_dashbrd .app.one-cr-cochss .step-progress {
    height: 7px;
    background: #e5ebf2;
    border-radius: 99px;
    overflow: hidden;
    margin: 7px 0;
}
.matex_dashbrd .app.one-cr-cochss .step-progress i {
    display: block;
    height: 100%;
    border-radius: 99px;
}
.matex_dashbrd .app.one-cr-cochss .step-pct {
    display: flex;
    justify-content: flex-end;
    font-size: 10px;
    font-weight: 800;
    color: var(--stage);
    margin-top: -3px;
}
.matex_dashbrd .app.one-cr-cochss .status {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    border-radius: 20px;
    padding: 5px 10px;
    background: #eef8f2;
    color: #15915d;
}
.matex_dashbrd .app.one-cr-cochss .status.pending {
    background: #f4f6f9;
    color: #78879b;
}
.matex_dashbrd .app.one-cr-cochss .points {
    margin-top: 9px;
    color: #15915d;
    font-size: 11px;
    font-weight: 800;
}
.matex_dashbrd .app.one-cr-cochss .open-step {
    position: absolute;
    right: 8px;
    bottom: 8px;
    border: 0;
    background: transparent;
    color: #7d8ca0;
    font-size: 18px;
}
.matex_dashbrd .app.one-cr-cochss .reverse .steps-area {
    direction: rtl;
}
.matex_dashbrd .app.one-cr-cochss .reverse .step-card {
    direction: ltr;
}
.matex_dashbrd .app.one-cr-cochss .reward {
    margin-top: 12px;
    background: linear-gradient(90deg, #fff9eb, #f8fbff);
    border: 1px solid #e6e9ef;
    border-radius: 6px;
    padding: 12px 16px;
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1fr;
    gap: 12px;
    align-items: center;
}
.matex_dashbrd .app.one-cr-cochss .reward-item {
    display: flex;
    align-items: center;
    gap: 10px;
}
.matex_dashbrd .app.one-cr-cochss .reward-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #fff0d0;
    font-size: 20px;
}
.matex_dashbrd .app.one-cr-cochss .reward b {
    font-size: 13px;
}
.matex_dashbrd .app.one-cr-cochss .reward small {
    display: block;
    color: var(--muted);
    font-size: 11px;
    margin-top: 2px;
}
.matex_dashbrd .app.one-cr-cochss .mini-line {
    height: 7px;
    background: #e5ebf2;
    border-radius: 99px;
    overflow: hidden;
    margin-top: 6px;
}
.matex_dashbrd .app.one-cr-cochss .mini-line i {
    display: block;
    width: 60%;
    height: 100%;
    background: #19a66c;
}
.matex_dashbrd .app.one-cr-cochss .help {
    margin-top: 12px;
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius:6px;
    padding: 13px;
    display: grid;
    grid-template-columns: 1.15fr repeat(4, 1fr) 1.4fr;
    gap: 9px;
}
.matex_dashbrd .app.one-cr-cochss .help-title {
    padding: 7px;
}
.matex_dashbrd .app.one-cr-cochss .help-title b {
    font-size: 14px;
}
.matex_dashbrd .app.one-cr-cochss .help-title p {
    margin: 3px 0;
    color: var(--muted);
    font-size: 11px;
}
.matex_dashbrd .app.one-cr-cochss .help-btn {
    border: 1px solid #e0e7f0;
    border-radius: 6px;
    background: #fff;
    padding: 11px;
    text-align: left;
}
.matex_dashbrd .app.one-cr-cochss .help-btn b {
    display: block;
    font-size: 11px;
}
.matex_dashbrd .app.one-cr-cochss .help-btn span {
    font-size: 10px;
    color: var(--muted);
}
.matex_dashbrd .app.one-cr-cochss .ai {
    background: #f6f1ff;
    border: 1px solid #ddd1ff;
    border-radius: 6px;
    padding: 10px;
}
.matex_dashbrd .app.one-cr-cochss .ai input {
    width: 100%;
    height: 31px;
    border: 1px solid #d8cfff;
    border-radius: 7px;
    padding: 0 9px;
    font-size: 11px;
    margin-top: 6px;
}
.matex_dashbrd .app.one-cr-cochss .ai button {
    margin-top: 6px;
    border: 0;
    border-radius:5px;
    background: var(--purple);
    color: #fff;
    padding: 5px 10px;
    font-size: 11px;
}
.matex_dashbrd .app.one-cr-cochss .tip {
    margin-top: 9px;
    background: #eef5ff;
    border: 1px solid #dce8fb;
    border-radius:4px;
    padding: 9px 12px;
    font-size: 11px;
    color: #51647e;
    display: flex;
    justify-content: space-between;
}


.matex_dashbrd .app.one-cr-cochss .certificate-section {
    margin-top: 14px;
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius:6px;
    padding: 16px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    box-shadow: 0 5px 20px rgba(25, 55, 95, 0.04);
}
.matex_dashbrd .app.one-cr-cochss .certificate-left {
    display: flex;
    align-items: center;
    gap: 13px;
}
.matex_dashbrd .app.one-cr-cochss .certificate-icon {
    width: 48px;
    height: 48px;
    border-radius: 5px;
    background: #fff4d9;
    display: grid;
    place-items: center;
    font-size: 20px;
    border: 1px solid #f0dca5;
}
.matex_dashbrd .app.one-cr-cochss .certificate-left b {
    display: block;
    font-size: 14px;
    color: var(--navy);
}
.matex_dashbrd .app.one-cr-cochss .certificate-left span {
    display: block;
    color: var(--muted);
    font-size: 11px;
    margin-top: 3px;
}
.matex_dashbrd .app.one-cr-cochss .certificate-actions {
    display: flex;
    align-items: center;
    gap: 9px;
}
.matex_dashbrd .app.one-cr-cochss .certificate-status {
font-size: 10px;
    font-weight: 800;
    padding: 7px 10px;
    border-radius: 4px;
    background: #f1f4f8;
    color: #7a8798;
}
.matex_dashbrd .app.one-cr-cochss .certificate-status.ready {
    background: #eaf8f1;
    color: #15915d;
}
.matex_dashbrd .app.one-cr-cochss .certificate-btn {
    border: 0;
    border-radius:4px;
    background: #d7dde6;
    color: #8a95a4;
    padding: 10px 15px;
    font-size: 11px;
    font-weight: 800;
    cursor: not-allowed;
}
.matex_dashbrd .app.one-cr-cochss .certificate-btn.ready {
    background: #1769c2;
    color: #fff;
    cursor: pointer;
}

.matex_dashbrd .app.one-cr-cochss .builder {
    margin-top: 14px;
    border: 1px dashed #b9c9dd;
    border-radius:6px;
    background: #f8fbff;
    padding: 13px;
}
.matex_dashbrd .app.one-cr-cochss .builder summary {
    cursor: pointer;
    font-weight: 800;
    color: var(--navy);
    font-size: 13px;
}
.matex_dashbrd .app.one-cr-cochss .builder-grid {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 12px;
    align-items: center;
}
.matex_dashbrd .app.one-cr-cochss .builder label {
    font-size: 12px;
    color: var(--muted);
    font-weight: 700;
    display: flex;
    gap: 5px;
    align-items: center;
}
.matex_dashbrd .app.one-cr-cochss .builder select {
    height: 36px;
    border: 1px solid #ced9e8;
    border-radius: 4px;
    background: #fff;
    padding: 0 9px;
}
.modal.modal-box-app show {
    display: none;
    position: fixed;
    inset: 0;
    background: #0c1c3480;
    z-index: 100;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.modal.modal-box-app show.show {
    display: flex;
}
.modal.modal-box-app show .modal-box {
    background: #fff;
    border-radius: 16px;
    width: min(720px, 96vw);
    max-height: 88vh;
    overflow: auto;
}
.modal.modal-box-app show .modal-head {
    padding: 17px 20px;
    border-bottom: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
}
.modal.modal-box-app show .modal-head h2 {
    margin: 0;
    font-size: 18px;
}
.modal.modal-box-app show .close {
    border: 0;
    border-radius: 50%;
    width: 32px;
    height: 32px;
}
.modal.modal-box-app show .modal-body {
    padding: 20px;
}
.matex_dashbrd .app.one-cr-cochss .substep {
    display: flex;
    gap: 12px;
    align-items: center;
    padding: 12px;
    border: 1px solid #e0e7f0;
    border-radius: 10px;
    margin-bottom: 8px;
}
.matex_dashbrd .app.one-cr-cochss .substep .num {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #eef5ff;
    color: var(--blue);
    display: grid;
    place-items: center;
    font-weight: 800;
    font-size: 11px;
}
.matex_dashbrd .app.one-cr-cochss .substep b {
    font-size: 12px;
}
.matex_dashbrd .app.one-cr-cochss .substep span {
    display: block;
    color: var(--muted);
    font-size: 11px;
    margin-top: 2px;
}
.horizontal-layout .journey {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}
.horizontal-layout .stage-row {
    display: block;
}
.horizontal-layout .stage-info {
    margin-bottom: 10px;
    min-height: 130px;
}
.horizontal-layout .steps-area {
    display: flex;
    flex-direction: column;
}
.horizontal-layout .step-card {
    min-height: 142px;
    text-align: left;
    padding: 22px 15px 12px;
}
.horizontal-layout .step-no {
    left: 23px;
    transform: none;
}
.horizontal-layout .step-card h3,
.horizontal-layout .step-card p,
.horizontal-layout .step-meta {
    margin-left: 55px;
}
.horizontal-layout .step-progress {
    margin-left: 55px;
}
.horizontal-layout .status {
    margin-left: 55px;
}

@media(max-width:760px){
  .matex_dashbrd .app.one-cr-cochss .certificate-section{flex-direction:column;align-items:flex-start}
  .matex_dashbrd .app.one-cr-cochss .certificate-actions{width:100%;justify-content:space-between}
}

@media(max-width:1050px){
	.matex_dashbrd .app.one-cr-cochss .topbar{grid-template-columns:1fr 1.5fr 1fr}
	.matex_dashbrd .app.one-cr-cochss .topbar .explore{display:none}
	.matex_dashbrd .app.one-cr-cochss .utility{grid-template-columns:1fr 1fr}
	.overall{grid-column:1/-1}
	.matex_dashbrd .app.one-cr-cochss .help{grid-template-columns:1fr 1fr 1fr}.ai{grid-column:1/-1}
}

@media(max-width:760px){
	.matex_dashbrd .app.one-cr-cochss {padding:7px}
	.matex_dashbrd .app.one-cr-cochss .topbar{position:static;grid-template-columns:1fr 1fr}
	.matex_dashbrd .app.one-cr-cochss .welcome{grid-column:1/-1;grid-row:1}
	.matex_dashbrd .app.one-cr-cochss .hero h1{font-size:26px}
	.matex_dashbrd .app.one-cr-cochss .utility{grid-template-columns:1fr}
	.matex_dashbrd .app.one-cr-cochss .stage-row{grid-template-columns:1fr}
	.matex_dashbrd .app.one-cr-cochss .steps-area{grid-template-columns:1fr}
	.matex_dashbrd .app.one-cr-cochss .reward{grid-template-columns:1fr 1fr}
	.matex_dashbrd .app.one-cr-cochss .help{grid-template-columns:1fr 1fr}
	.horizontal-layout .journey{display:block}
}
</style>




<section class="matex_dashbrd">
    <div class="container">
        <div class="app one-cr-cochss">
			<header class="topbar">
				<div class="explore-select">
					<span class="explore-icon">
						⌘
					</span>

					<select>
						<option value="">Explore More</option>
						<option value="previous-years">Previous Years</option>
						<option value="documents">Documents</option>
						<option value="downloads">Downloads</option>
						<option value="settings">Settings & Profile</option>
						<option value="help">Help & Support</option>
					</select>
				</div>
				
				
				
				<div class="welcome">
					<b>Good Evening, Ramjee Meena 👋</b
					><small>Welcome to the world of <span style="color: #e23b3b; font-weight: 800">1CR COACH</span></small>
				</div>
				
				<div class="program-select">
					<select name="program" id="program">
						<option value="">My Programmes</option>
						<option value="programme1">Programme 1</option>
						<option value="programme2">Programme 2</option>
						<option value="programme3">Programme 3</option>
						<option value="programme4">Programme 4</option>
					</select>
				</div>
				
				<div class="profile">
					<span>🔔</span><span class="avatar">RM</span><b style="font-size: 12px">Ramjee Meena⌄</b>
				</div>
			</header>

			<section class="hero">
				<div class="eyebrow">Your guided transformation journey</div>
				<h1 id="programTitle"></h1>
				<p id="programDescription"></p>
			</section>

			<section class="utility">
				<div class="benefit">
					<div class="bicon">🎯</div>
					<div><b>Clear Stage-by-Stage Journey</b><span>Follow a proven roadmap from start to finish.</span></div>
				</div>
				<div class="benefit">
					<div class="bicon">🎁</div>
					<div><b>Small Steps, Big Results</b><span>Complete simple actions and see meaningful progress.</span></div>
				</div>
				<div class="benefit">
					<div class="bicon">🏆</div>
					<div><b>Celebrate & Stay Motivated</b><span>Track progress, earn rewards and keep moving.</span></div>
				</div>
				<div class="overall">
					<div class="row"><span>Overall Progress</span><span class="pct" id="overallPct">0%</span></div>
					<div class="progress"><i id="overallBar"></i></div>
					<small id="overallText"></small>
				</div>
			</section>

			<main id="journey" class="journey"></main>

			<section class="reward">
				<div class="reward-item">
					<div class="reward-icon">🏆</div>
					<div>
						<b>You're doing great! 🎉</b
						><small>Keep going — your next completed step unlocks another milestone.</small>
					</div>
				</div>
				<div class="reward-item">
					<div class="reward-icon">⭐</div>
					<div>
						<b>Next Step Reward</b><small>Complete your next step and earn <strong>+50 Points</strong></small>
					</div>
				</div>
				<div class="reward-item">
					<div class="reward-icon">💎</div>
					<div><b>120 Total Points</b><small>Next milestone: 200 points</small></div>
				</div>
				<div>
					<b style="font-size: 11px">Milestone Progress</b>
					<div class="mini-line"><i></i></div>
				</div>
			</section>

			<section class="help">
				<div class="help-title">
					<b>Need Help with Any Step?</b>
					<p>Select a stage, step or sub-step and get help.</p>
				</div>
				<button class="help-btn" onclick="alert('Connect your AI API here')">
					🤖 <b>Ask AI Coach</b><span>Get instant answers</span>
				</button>
				<button class="help-btn" onclick="alert('Connect your Help Centre here')">
					🔎 <b>Search Help Centre</b><span>Find articles & guides</span>
				</button>
				<button class="help-btn" onclick="alert('Connect email/ticket service here')">
					✉️ <b>Send to Coach</b><span>Email your question</span>
				</button>
				<button class="help-btn" onclick="alert('Connect coach chat here')">
					💬 <b>Chat with Coach</b><span>Talk in real-time</span>
				</button>
				<div class="ai">
					<b style="font-size: 12px">✨ Ask Anything</b>
					<input id="aiInput" placeholder="Ask about any stage, step or sub-step..." />
					<button onclick="askAI()">Ask →</button>
				</div>
			</section>

			<section class="certificate-section" id="certificateSection">
				<div class="certificate-left">
					<div class="certificate-icon">🏆</div>
					<div>
						<b id="certificateTitle">Certificate of Completion</b>
						<span id="certificateMessage">Complete all stages and steps to unlock your certificate.</span>
					</div>
				</div>
				<div class="certificate-actions">
					<span class="certificate-status" id="certificateStatus">🔒 Locked</span>
					<button class="certificate-btn" id="certificateBtn" onclick="downloadCertificate()" disabled>
						📜 Download Certificate
					</button>
				</div>
			</section>

			<div class="tip">
				<span>💡 <strong>Tip:</strong> Click any Step to view its Sub-Steps, resources and completion actions.</span
				><span id="journeyLabel"></span>
			</div>

			<details class="builder">
				<summary>⚙ Programme Engine Demo Controls — same template for different programmes</summary>
				<div class="builder-grid">
					<label
						>Number of Stages
						<select id="stageCount" onchange="setStageCount(this.value)">
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
						</select></label
					>
					<label
						>Layout
						<select id="layoutMode" onchange="setLayout(this.value)">
							<option value="vertical">Vertical Stages + Horizontal Steps (Stage 1 bottom → Stage 3+ top)</option>
							<option value="horizontal">Horizontal Stages + Vertical Steps</option>
						</select></label
					>
				</div>
			</details>
		</div>
    </div>
</section>


 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Owl Carousel JS --> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
 
<script>
const CONFIG = {
    title: "Your Awesome Programme Name ✨",
    description:
        "A unique programme that helps participants move from where they are today to their desired outcome through a clear, practical and guided journey.",
    stageCount: 3,
    stages: [
        {
            name: "FOUNDATION",
            tagline: "Build strong foundation",
            color: "#13a66a",
            icon: "🏅",
            steps: [
                {
                    name: "Step One Name",
                    desc: "Build the foundation",
                    done: 2,
                    total: 4,
                    points: 20,
                    subs: ["Introduction & orientation", "Core lesson", "Practical exercise", "Reflection"],
                },
                {
                    name: "Step Two Name",
                    desc: "Create clarity & direction",
                    done: 1,
                    total: 5,
                    points: 20,
                    subs: [
                        "Understand the current situation",
                        "Define direction",
                        "Watch lesson",
                        "Complete worksheet",
                        "Review",
                    ],
                },
                {
                    name: "Step Three Name",
                    desc: "Prepare for transformation",
                    done: 0,
                    total: 4,
                    points: 20,
                    subs: ["Preparation lesson", "Video", "Action plan", "Checkpoint"],
                },
            ],
        },
        {
            name: "TRANSFORMATION",
            tagline: "Apply framework & grow",
            color: "#f2a20b",
            icon: "🏅",
            steps: [
                {
                    name: "Step Four Name",
                    desc: "Apply the framework",
                    done: 0,
                    total: 5,
                    points: 25,
                    subs: ["Lesson", "Video", "Exercise", "Workbook", "Checkpoint"],
                },
                {
                    name: "Step Five Name",
                    desc: "Develop new capability",
                    done: 0,
                    total: 4,
                    points: 25,
                    subs: ["Learn", "Practice", "Review", "Apply"],
                },
                {
                    name: "Step Six Name",
                    desc: "Strengthen the change",
                    done: 0,
                    total: 5,
                    points: 25,
                    subs: ["Lesson", "Practice", "Challenge", "Reflection", "Assessment"],
                },
            ],
        },
        {
            name: "OUTCOME",
            tagline: "Create desired outcome",
            color: "#2d7de0",
            icon: "💎",
            steps: [
                {
                    name: "Step Seven Name",
                    desc: "Create the desired outcome",
                    done: 0,
                    total: 4,
                    points: 30,
                    subs: ["Outcome lesson", "Implementation", "Review", "Action"],
                },
                {
                    name: "Step Eight Name",
                    desc: "Implement & refine",
                    done: 0,
                    total: 5,
                    points: 30,
                    subs: ["Implementation lesson", "Practice", "Feedback", "Refine", "Checkpoint"],
                },
                {
                    name: "Step Nine Name",
                    desc: "Complete the journey",
                    done: 0,
                    total: 4,
                    points: 30,
                    subs: ["Final lesson", "Final action", "Reflection", "Completion"],
                },
            ],
        },
    ],
};

let data = structuredClone(CONFIG),
    current = null;

function addMissingStages() {
    while (data.stages.length < data.stageCount) {
        let n = data.stages.length + 1,
            base = (n - 1) * 3;
        data.stages.push({
            name: "STAGE " + n,
            tagline: "Continue the journey",
            color: ["#13a66a", "#f2a20b", "#2d7de0", "#7656d8", "#e05a6f", "#159ca6", "#6f7f91"][(n - 1) % 7],
            icon: "⭐",
            steps: [
                {
                    name: "Step " + (base + 1) + " Name",
                    desc: "Continue the journey",
                    done: 0,
                    total: 4,
                    points: 30,
                    subs: ["Lesson", "Video", "Action", "Checkpoint"],
                },
                {
                    name: "Step " + (base + 2) + " Name",
                    desc: "Develop and apply",
                    done: 0,
                    total: 4,
                    points: 30,
                    subs: ["Lesson", "Practice", "Action", "Review"],
                },
                {
                    name: "Step " + (base + 3) + " Name",
                    desc: "Prepare for the next stage",
                    done: 0,
                    total: 4,
                    points: 30,
                    subs: ["Lesson", "Exercise", "Reflection", "Completion"],
                },
            ],
        });
    }
    data.stages = data.stages.slice(0, data.stageCount);
}

function downloadCertificate() {
    const all = [];
    data.stages.forEach((s, si) => s.steps.forEach((x, ii) => all.push(x)));
    const complete = all.length > 0 && all.every((x) => x.done >= x.total);

    if (!complete) {
        alert("Your certificate is locked. Please complete all stages and steps first.");
        return;
    }

    /*
    Temporary V0.1 certificate:
    The final visual certificate design will be connected later.
    For now this creates a simple printable/downloadable HTML certificate.
  */
    const win = window.open("", "_blank");
    if (!win) {
        alert("Please allow pop-ups to download your certificate.");
        return;
    }

    const safeTitle = data.title.replace(/[<>]/g, "");
    win.document.write(`<!doctype html>
<html><head><meta charset="utf-8"><title>Certificate - ${safeTitle}</title>
<style>
body{margin:0;background:#f4f7fb;font-family:Arial,sans-serif;color:#142b52}
.certificate{width:900px;max-width:88vw;margin:60px auto;padding:70px 55px;text-align:center;background:#fff;border:10px solid #e5c76b;box-shadow:0 15px 50px #102a5622}
.small{letter-spacing:4px;text-transform:uppercase;font-size:14px;color:#66758a}
h1{font-size:42px;margin:18px 0 8px}
h2{font-size:26px;color:#2467c7;margin:10px}
.name{font-size:30px;font-weight:800;margin:28px 0}
.badge{font-size:58px;margin:12px}
p{color:#65758c;line-height:1.6}
@media print{body{background:#fff}.certificate{margin:0;max-width:none;width:auto;box-shadow:none}}
</style></head>
<body>
<div class="certificate">
<div class="badge">🏆</div>
<div class="small">Certificate of Completion</div>
<h1>Congratulations!</h1>
<h2>${safeTitle}</h2>
<div class="name">Ramjee Meena</div>
<p>This certificate recognises successful completion of all stages and steps of the programme.</p>
<p><strong>Completed: 100%</strong></p>
<p style="margin-top:40px">Certificate design will be finalised in the next version.</p>
</div>
<script>window.onload=function(){setTimeout(function(){window.print()},400)}<\/script>
</body></html>`);
    win.document.close();
}

function render() {
    addMissingStages();
    programTitle.textContent = data.title;
    programDescription.textContent = data.description;

    let all = [];
    data.stages.forEach((s, si) => s.steps.forEach((x, ii) => all.push({ ...x, si, ii })));

    let completed = all.filter((x) => x.done >= x.total).length;
    let pct = all.length ? Math.round((completed / all.length) * 100) : 0;
    overallPct.textContent = pct + "%";
    overallBar.style.width = pct + "%";
    overallText.textContent = `Completed ${completed} of ${all.length} Steps`;

    // Certificate unlocks ONLY when every step in the programme is complete.
    const certificateReady = completed === all.length && all.length > 0;
    const certificateStatus = document.getElementById("certificateStatus");
    const certificateBtn = document.getElementById("certificateBtn");
    const certificateMessage = document.getElementById("certificateMessage");

    certificateStatus.className = "certificate-status" + (certificateReady ? " ready" : "");
    certificateStatus.textContent = certificateReady ? "✓ Unlocked" : "🔒 Locked";
    certificateBtn.className = "certificate-btn" + (certificateReady ? " ready" : "");
    certificateBtn.disabled = !certificateReady;
    certificateMessage.textContent = certificateReady
        ? "Congratulations! You have completed the entire programme."
        : `Complete all ${all.length} steps to unlock your certificate.`;

    journey.innerHTML = "";

    /*
  JOURNEY ORDER:
  Stage 1 = BOTTOM
  Stage 2 = ABOVE Stage 1
  Stage 3 = ABOVE Stage 2
  Stage 4+ continue upward.

  Inside each stage:
  Odd stages  (1,3,5...) = LEFT → RIGHT
  Even stages (2,4,6...) = RIGHT → LEFT

  The data itself remains in normal numerical order. We only
  reverse the DISPLAY order of stages, so Step numbers stay correct.
*/
    const displayStages = data.stages.map((s, originalIndex) => ({ s, originalIndex })).reverse();

    displayStages.forEach(({ s, originalIndex }) => {
        const row = document.createElement("section");

        // Stage 1/3/5... are LTR. Stage 2/4/6... are RTL.
        row.className = "stage-row " + (originalIndex % 2 ? "reverse" : "");
        row.style.setProperty("--stage", s.color);

        const done = s.steps.filter((x) => x.done >= x.total).length;
        const sp = Math.round((done / 3) * 100);

        const info = document.createElement("div");
        info.className = "stage-info";
        info.innerHTML = `<div>
    <span class="label" style="color:${s.color};background:${s.color}18">STAGE ${originalIndex + 1}</span>
    <h2>${s.name}</h2>
    <p>${s.tagline}</p>
  </div>
  <div>
    <div style="font-size:24px">${s.icon}</div>
    <div class="stage-count">${done} of 3 Steps Completed</div>
    <div class="stage-mini"><i style="width:${sp}%;background:${s.color}"></i></div>
  </div>`;
        row.appendChild(info);

        const area = document.createElement("div");
        area.className = "steps-area";
        area.style.setProperty("--stage", s.color);

        s.steps.forEach((x, ii) => {
            // IMPORTANT: numbering follows the original programme order,
            // not the visual top-to-bottom order.
            const global = originalIndex * 3 + ii;
            const p = x.total ? Math.round((x.done / x.total) * 100) : 0;

            const card = document.createElement("article");
            card.className = "step-card";
            card.style.setProperty("--stage", s.color);

            card.innerHTML = `<div class="step-no">${String(global + 1).padStart(2, "0")}</div>
      <h3>${x.name}</h3>
      <p>${x.desc}</p>
      <div class="step-meta">${x.done}/${x.total} Sub-steps</div>
      <div class="step-progress"><i style="width:${p}%;background:${s.color}"></i></div>
      <div class="step-pct">${p}% Complete</div>
      <span class="status ${p === 100 ? "" : "pending"}">${p === 100 ? "COMPLETED" : p ? "IN PROGRESS" : "NOT STARTED"}</span>
      <div class="points">+${x.points} pts ⭐</div>
      ${global === all.length - 1 ? '<div style="position:absolute;right:7px;top:8px;font-size:21px" title="Programme Completed">🏆</div>' : ""}
      <button class="open-step">›</button>`;

            card.onclick = () => openStep(originalIndex, ii);
            area.appendChild(card);
        });

        row.appendChild(area);
        journey.appendChild(row);
    });

    journeyLabel.innerHTML = "<strong>Journey:</strong> " + data.stages.map((s, i) => "Stage " + (i + 1)).join(" → ");
}
function openStep(si, ii) {
    current = { si, ii };
    let s = data.stages[si],
        x = s.steps[ii];
    modalTitle.textContent = `Step ${si * 3 + ii + 1}: ${x.name}`;
    modalDesc.textContent = x.desc;
    substeps.innerHTML = x.subs
        .map(
            (a, i) =>
                `<div class="substep"><div class="num">${i + 1}</div><div><b>${a}</b><span>${i < x.done ? "✓ Completed" : "Pending"}</span></div></div>`
        )
        .join("");
    modal.classList.add("show");
}
function closeModal() {
    modal.classList.remove("show");
}
function completeStep() {
    if (!current) return;
    let x = data.stages[current.si].steps[current.ii];
    x.done = x.total;
    closeModal();
    render();
}
function setStageCount(n) {
    data.stageCount = +n;
    render();
}
function setLayout(v) {
    document.body.classList.toggle("horizontal-layout", v === "horizontal");
}
function askAI() {
    let q = aiInput.value.trim();
    if (!q) {
        alert("Please enter your question.");
        return;
    }
    alert("AI Coach integration point.\n\nQuestion: " + q);
}
render();
</script>
@endsection
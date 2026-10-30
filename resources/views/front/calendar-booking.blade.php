@if($booking->custom_header_visible == 1)
@include('front.custom-layout.header')
@else
@include('front.layouts.user-header')

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>{!! ucwords($booking->title) !!}</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>{!! ucwords($booking->title) !!}</span>
        </div>
    </div>
</section>
@endif
@php
use App\Models\OurClientsModel;
$clients = OurClientsModel::where(['status'=> 1,'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(12)->get();
@endphp
<style>
    .youtube-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .youtube-modal.active {
        display: flex;
    }

    .youtube-modal-content {
        width: 90%;
        max-width: 900px;
        position: relative;
        background: #000;
    }

    .youtube-video {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        border: #ffffff solid 5px;
    }

    .youtube-video iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    .youtube-close {
        position: absolute;
        right: 0px;
        top: 0px;
        width: 36px;
        height: 36px;
        border: 0;
        border-radius: 50%;
        background: #fff;
        color: #000;
        font-size: 25px;
        cursor: pointer;
        z-index: 2;
    }

    @media (max-width: 600px) {
        .youtube-close {
            right: 0;
            top: -50px;
        }
    }


    .shadow.othr_pgss_lde .top_menuues {
        margin: 0;
        padding: 5px 0;
        background: #000;
    }

    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
        margin: 0 0 0px;
        padding: 5px 0;
        float: right;
    }

    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
        padding: 14px 10px;
        display: inline-block;
    }

    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
        padding: 15px 10px;
    }

    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
        background: #ff0000;
        padding: 8px 20px;
        display: inline-block;
        border-radius: 100px;
        font-weight: 700;
        position: relative;
        top: 6px;
    }

    .you_tb_arra iframe {
        border-radius: 10px;
    }

    .new_ar_tring {
        text-align: center;
        display: inline-block;
        width: 100%;
    }

    .new_ar_tring h2 {
        font-size: 24px;
        margin: 0 0 14px;
        font-weight: 600;
    }

    .new_ar_tring h2.bnt_rundds {
        background: #f5cb8d;
        padding: 12px 25px;
        color: #000000;
        font-size: 17px;
        font-weight: 300;
        border-radius: 10px;
        display: inline-block;
    }

    .new_ar_tring h3 {
        margin: 25px 0 25px;
        font-size: 34px;
        font-weight: 700;
    }

    .new_ar_tring p {
        font-size: 18px;
        font-weight: 600;
        max-width: 700px;
        margin: 0 auto;
        width: 100%;
    }

    .v_part_liststs {
        display: inline-block;
        width: 100%;
    }

    .v_part_liststs ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .v_part_liststs ul li {
        margin-bottom: 15px;
        font-weight: 300;
        font-size: 15px;
        color: #000;
    }

    .v_part_liststs ul li i {
        color: #87c50e;
        font-size: 18px;
        -webkit-text-stroke: 1px #ffffff;
    }

    .v_part_liststs ul li strong {
        font-weight: 600;
    }

    .v_part_liststs .bk_pert_sh {
        margin-top: 30px;
        padding: 15px;
        background: #fff;
        border: #f5bcbc dashed 1px;
        border-radius: 10px;
    }

    .v_part_liststs .bk_pert_sh p {
        text-align: center;
        color: #000;
        margin: 0 0 20px;
        font-size: 14px;
    }

    .v_part_liststs .bk_pert_sh a {
        background: #ff0000;
        display: block;
        text-align: center;
        color: #fff;
        padding: 15px 10px;
        border-radius: 5px;
    }

    .v_part_liststs .bk_pert_sh a h5 {
        margin: 0px 0 5px;
        font-size: 18px;
        font-weight: 700;
    }

    .v_part_liststs .bk_pert_sh a span {
        font-size: 12px;
    }

    .v_part_liststs .tx_v_ars {
        margin-top: 15px;
        text-align: center;
        font-size: 15px;
        font-weight: 600;
    }

    .v_part_liststs.opt_in_pg {
        background: #ffffff;
        padding: 30px 15px;
        border: #e18181 dashed 2px;
        border-radius: 10px;
        max-width: 750px;
        margin: 0 auto;
        display: block;
        margin-bottom: 30px;
    }

    .v_part_liststs.opt_in_pg .bk_pert_sh {
        padding: 0;
        border: none;
        max-width: 600px;
        margin: 0 auto;
        width: 100%;
        background: #fff;
    }

    .v_part_liststs.opt_in_pg .bk_pert_sh p {
        font-size: 14px;
        display: inline-block;
        width: 100%;
        color: #000;
    }

    .v_part_liststs.opt_in_pg .bk_pert_sh p img.fr_iconss {
        margin-right: 5px;
        float: left;
        width: 7%;
        filter: brightness(0) invert(0);
    }

    .v_part_liststs.opt_in_pg .bk_pert_sh p span.sup_al_cntx {
        font-size: 15px;
        text
    }

    .v_part_liststs.opt_in_pg .bk_pert_sh p span.sup_al_cntx strong {
        font-size: 18px;
        text-decoration: underline;
        margin-right: 5px;
    }

    .v_part_liststs.opt_in_pg .tx_v_ars {
        color: #000;
        font-weight: 400;
        max-width: 600px;
        margin: 0 auto;
        margin-top: 20px;
    }

    .what_tst .qu_bx_partss {
        background: #f9f9f9;
        padding: 0px 30px 30px;
        position: relative;
    }

    .what_tst #testimonials .owl-nav.disabled button.owl-prev {
        position: absolute;
        left: -30px;
        margin: 0;
    }

    .what_tst #testimonials .owl-nav.disabled button.owl-prev i {
        font-size: 35px;
        -webkit-text-stroke: 3px #f9f9f9;
    }

    .what_tst #testimonials .owl-nav.disabled button.owl-next {
        position: absolute;
        right: 30px;
        margin: 0;
    }

    .what_tst #testimonials .owl-nav.disabled button.owl-next i {
        font-size: 35px;
        -webkit-text-stroke: 3px #f9f9f9;
    }

    .ftr_new_other {
        background: #000;
    }

    .ftr_new_other {
        margin-top: 50px;
    }

    .ftr_new_other .ftr_content {
        background: #000;
        padding: 20px;
        text-align: center;
    }

    .ftr_new_other .ftr_content .lgo {
        margin-bottom: 25px;
    }

    .ftr_new_other .ftr_content .lgo a {
        display: inline-block;
    }

    .ftr_new_other .ftr_content .menu_ftrr {
        margin-bottom: 25px;
    }

    .ftr_new_other .ftr_content .menu_ftrr a {
        color: #fff;
        margin-right: 20px;
    }

    .ftr_new_other .ftr_content .menu_ftrr a:last-child {
        margin-right: 0px;
    }

    .ftr_new_other .ftr_content .crt_arar {
        color: #fff;
        margin-top: 20px;
        display: inline-block;
        font-size: 15px;
    }

    .ftr_new_other .ftr_content .crt_arar img.logo {
        margin-right: 15px;
    }

    .mdl_mg_arar img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .mdl_mg_arar {
        width: 100%;
        height: 378px;
        overflow: hidden;
        border-radius: 5px;
    }

    #sub_m_al_frms .modal-content.othr_ledss .modal-header {
        background: #fff;
        border: none;
    }

    #sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
        color: #ff0000;
    }

    #sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
        color: #ff0000;
        text-align: center;
        font-size: 22px;
        text-transform: capitalize;
    }

    #sub_m_al_frms .modal-content.othr_ledss .modal-body {
        padding-top: 0;
    }

    #sub_m_al_frms .modal-content.othr_ledss .modal-body p {
        text-align: center;
        font-size: 15px;
        margin-bottom: 15px;
    }

    .arow_downss {
        text-align: center;
        margin-top: 20px;
        display: inline-block;
        width: 100%;
    }

    .arow_downss span.ar_bntss {
        background: #1c539a;
        width: 40px;
        display: inline-block;
        height: 40px;
        color: #fff;
        line-height: 40px;
        margin-right: 5px;
    }

    .arow_downss span.ar_bntss:last-child {
        margin-right: 0;
    }

    .arow_downss span.ar_bntss i {
        position: relative;
        top: 11px;
    }

    #countdown {
        display: inline-block;
        margin: 40px 0 0;
        width: 100%;
    }

    #countdown ul {
        list-style: none;
        margin: 0 auto;
        display: table;
        max-width: 450px;
        width: 100%;
    }

    #countdown ul li {
        margin-right: 10px;
        float: left;
        background: #ff0000;
        padding: 20px 20px;
        width: 23.3%;
        border-radius: 10px;
        color: #fff;
        font-weight: 700;
        text-align: center;
        font-size: 13px;
    }

    #countdown ul li span {
        display: block;
        font-size: 18px;
        font-weight: 800;
    }

    #countdown ul li:last-child {
        margin: 0;
    }

    .st_p_cntss {
        background: #000;
        color: #fff;
        padding: 20px;
        display: inline-block;
        width: 100%;
        margin-top: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .st_p_cntss h3 {
        margin: 0 0 5px;
        font-size: 22px;
        font-weight: 700;
    }

    .st_p_cntss p {
        margin: 0;
        font-size: 18px;
    }

    .part_widthss {
        padding: 25px 25px;
        border: #e18181 dashed 2px;
        border-radius: 10px;
        display: inline-block;
        margin-top: 30px;
    }

    .st_parts_als {
        display: inline-block;
        width: 100%;
    }

    .st_parts_als .hid_ar_partss {
        padding: 20px;
        border: #000 dashed 2px;
    }

    .st_parts_als .hid_ar_partss h2 {
        font-size: 25px;
        text-align: center;
        margin: 0;
        font-weight: 700;
    }

    .st_parts_als .tital_main {
        padding: 15px;
        border: #1e1e1e dashed 1px;
    }

    .st_parts_als .tital_main .un_boxx {
        display: inline-block;
        width: 100%;
        margin-bottom: 20px;
    }

    .st_parts_als .tital_main .un_boxx:last-child {
        margin-bottom: 0;
    }

    .st_parts_als .tital_main .un_boxx h3 {
        border: #ccc solid 1px;
        padding: 7px;
        text-align: center;
        margin: 0px;
        font-weight: 600;
        font-size: 19px;
        margin-bottom: 15px;
    }

    .st_parts_als .tital_main .un_boxx h4 {
        margin: 0 0 15px;
        font-size: 18px;
        line-height: 24px;
    }

    .st_parts_als .tital_main .un_boxx ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .st_parts_als .tital_main .un_boxx ul li {
        float: left;
        width: 100%;
        font-size: 16px;
        margin-bottom: 12px;
    }

    .st_parts_als .tital_main .un_boxx ul li i {
        color: #95c917;
        font-size: 25px;
        position: relative;
        top: 4px;
        margin-right: 3px;
    }

    .bg_crl_sky {
        background: #a8cfff;
    }

    .br_radius_10 {
        border-radius: 10px;
    }



    #testimonials .preview {
        border: 1px solid #e2e7ee;
        border-radius: 14px;
        padding: 18px;
        background: #fff;
        box-shadow: 0 4px 16px rgba(20, 40, 80, 0.05);
        text-align: center;
    }

    #testimonials .preview .preview-photo {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        margin: auto;
        background: linear-gradient(135deg, #dfe7f2, #f5f7fb);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 700;
        color: #1764d9;
        overflow: hidden;
    }

    #testimonials .preview .preview-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #testimonials .preview .preview-name {
        font-size: 18px;
        font-weight: 700;
        margin-top: 10px;
    }

    #testimonials .preview .preview-line {
        font-size: 11px;
        color: #5e6b7f;
        margin-top: 4px;
    }

    #testimonials .preview .preview-org {
        color: #1764d9;
    }

    #testimonials .preview .preview-location {
        margin-top: 5px;
    }

    #testimonials .preview .preview-stars {
        margin-top: 11px;
    }

    #testimonials .preview .preview-stars span.stars {
        color: #f1a125;
    }

    #testimonials .preview .preview-review {
        font-size: 12px;
        line-height: 1.55;
        margin: 16px auto;
        max-width: 470px;
    }

    #testimonials .preview .preview-date {
        font-size: 10px;
        color: #7d8898;
    }

    #testimonials .preview .preview-phone {
        border-top: 1px solid #e8ebef;
        margin-top: 14px;
        padding-top: 13px;
        font-size: 12px;
    }

    #testimonials .preview .video-btn {
        display: block;
        width: 100%;
        border: 0;
        border-radius: 7px;
        background: #4a9a0b;
        color: #fff;
        font-weight: 700;
        padding: 10px;
        margin-top: 15px;
        cursor: pointer;
    }

    #testimonials .preview .cta-buttons {
        display: flex;
        gap: 7px;
        margin-top: 10px;
    }

    #testimonials .preview .cta-buttons button {
        flex: 1;
        background: #fff;
        border: 1px solid #b8c7db;
        border-radius: 7px;
        padding: 8px 5px;
        font-size: 10px;
        cursor: pointer;
    }





    @media (min-width: 481px) and (max-width: 767px) {
        .st_parts_als .tital_main .arow_downss.mb-1 {
            display: none;
        }

        .st_parts_als .tital_main .un_boxx h3 {
            padding: 10px;
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .what_tst .qu_bx_partss {
            padding: 10px 10px 10px !important;
        }

        #testimonials .owl-nav button.owl-next {
            right: 5px;
        }

        .mdl_mg_arar {
            display: none;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
            padding: 0px 0 5px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {
            margin-right: 7px !important;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {
            margin-right: 0px !important;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
            padding: 14px 5px;
            font-size: 12px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
            font-size: 12px;
        }

        .shadow.othr_pgss_lde#myHeader .othr_logges img.logo {
            height: 30px;
            position: relative;
            top: 12px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
            padding: 5px 8px;
            top: 8px;
        }

        .v_part_liststs .bk_pert_sh a h5 {
            font-size: 16px;
        }

        .new_ar_tring.mt_50p {
            margin-top: 25px;
        }

        .new_ar_tring h2 {
            font-size: 18px;
            margin: 0 0 10px;
            line-height: 24px;
        }

        .new_ar_tring h3 {
            margin: 15px 0 15px;
            font-size: 24px;
            font-weight: 700;
        }

        .new_ar_tring p {
            font-size: 15px;
        }

        .v_part_liststs {
            margin-top: 20px;
        }

        .ftr_new_other .ftr_content .menu_ftrr a {
            margin-right: 10px;
            font-size: 13px;
        }

        .ftr_new_other .ftr_content .crt_arar {
            font-size: 13px;
        }

        .ftr_new_other .ftr_content .crt_arar img.logo {
            margin-right: 0;
            margin: 0 auto;
            display: block;
            margin-bottom: 10px;
        }

        .part_widthss {
            padding: 15px 15px;
        }

        .st_parts_als .hid_ar_partss {
            padding: 15px;
            border: #000 dashed 1px;
        }

        .st_parts_als .tital_main {
            padding: 15px 0 0;
            border: none;
        }

        .st_parts_als .hid_ar_partss h2 {
            font-size: 20px;
        }
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .st_parts_als .tital_main .arow_downss.mb-1 {
            display: none;
        }

        .st_parts_als .tital_main .un_boxx h3 {
            padding: 10px;
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .what_tst .qu_bx_partss {
            padding: 10px 10px 10px !important;
        }

        #testimonials .owl-nav button.owl-next {
            right: 5px;
        }

        .mdl_mg_arar {
            display: none;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
            padding: 0px 0 5px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {
            margin-right: 3px !important;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {
            margin-right: 0px !important;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
            padding: 14px 5px;
            font-size: 12px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
            font-size: 12px;
        }

        .shadow.othr_pgss_lde#myHeader .othr_logges img.logo {
            height: 30px;
            position: relative;
            top: 12px;
        }

        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
            padding: 5px 8px;
            top: 8px;
        }

        .v_part_liststs .bk_pert_sh a h5 {
            font-size: 16px;
        }

        .new_ar_tring.mt_50p {
            margin-top: 25px;
        }

        .new_ar_tring h2 {
            font-size: 18px;
            margin: 0 0 10px;
            line-height: 24px;
        }

        .new_ar_tring h3 {
            margin: 15px 15px 15px;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
        }

        .new_ar_tring p {
            font-size: 15px;
        }

        .v_part_liststs {
            margin-top: 20px;
        }

        .ftr_new_other .ftr_content .menu_ftrr a {
            margin-right: 10px;
            font-size: 13px;
        }

        .ftr_new_other .ftr_content .crt_arar {
            font-size: 13px;
        }

        .ftr_new_other .ftr_content .crt_arar img.logo {
            margin-right: 0;
            margin: 0 auto;
            display: block;
            margin-bottom: 10px;
        }

        .n_thiks a {
            padding: 10px;
            font-size: 14px;
        }

        .new_ar_tring h2.bnt_rundds {
            font-size: 14px;
        }

        .v_part_liststs.opt_in_pg {
            margin-top: 0;
            padding: 10px 15px;
            margin-bottom: 0;
        }

        .yr_awer_pro .new_ar_tring h3 {
            font-size: 22px;
        }

        .new_ar_tring .pert_listst ul li {
            width: 100%;
        }

        #countdown ul li {
            margin-right: 7px;
            padding: 15px 5px;
        }

        .part_widthss {
            padding: 15px 15px;
        }

        .st_parts_als .hid_ar_partss {
            padding: 15px;
            border: #000 dashed 1px;
        }

        .st_parts_als .tital_main {
            padding: 15px 0 0;
            border: none;
        }

        .st_parts_als .hid_ar_partss h2 {
            font-size: 20px;
        }
    }
</style>

<!--- New On-Demand Training ---->
<div class="container">
    <div class="new_ar_tring mt_50p">
        <h2 class="bnt_rundds">{!! $booking->title !!}</h2>
        <h3>{!! $booking->subtitle !!}</h3>
    </div>
</div>
<!--- End New On-Demand Training ---->
<!---- Special Deal ----->
<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="v_part_liststs opt_in_pg">
                <div class="bk_pert_sh">
                    <div class="row">
                        <p>
                        <div class="col-3"><img class="fr_iconss" src="{{ url('home/img/fire_hot_icon.png')}}" alt="" style="background-color:black;" /></div>
                        <div class="col-9"><span class="sup_al_cntx">{!! $booking->sort_description !!}</span></div>
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!---- End Special Deal ----->
<!---- Step ----->
<div class="container">
    <div class="st_p_cntss">
        <h3>STEP 1:</h3>
        <p>{!! $booking->step_title !!}</p>
    </div>
    <div class="part_widthss">
        <div class="row">
            <div class="col-lg-12">
                <div class="st_parts_als">
                    <div class="hid_ar_partss">
                        <h2>What is Expected From the Session:</h2>
                        <div class="arow_downss">
                            &nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tital_main">
                                <div class="un_boxx">
                                    <h3>{!! $booking->left_title1 !!}</h3> {!! $booking->left_description1 !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tital_main">
                                <div class="un_boxx">
                                    <h3>{!! $booking->left_title2 !!}</h3> {!! $booking->left_description2 !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tital_main">
                                <div class="un_boxx">
                                    <h3>{!! $booking->left_title3 !!}</h3> {!! $booking->left_description3 !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="st_parts_als">
                    <div class="hid_ar_partss">
                        <h2 class="red_tx">{!! $booking->embed_title !!}</h2>
                        <div class="arow_downss"> &nbsp;</div>
                    </div>
                    <div class="tital_main">
                        <div class="un_boxx">
                            {!! $embededData !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---- End Step ----->
    @if($booking->test_visible)
    {!! $reviewData !!}
    @endif
    @if($booking->custom_footer_visible == 1)
    @include('front.custom-layout.footer')
    @else
    @include('front.layouts.footer')
    @endif

    <!-- YouTube Modal -->
    <div class="youtube-modal" id="youtubeModal">
        <div class="youtube-modal-content">
            <button class="youtube-close" id="closeYoutube">&times;</button>
            <div class="youtube-video">
                <iframe
                    id="youtubeIframe"
                    src=""
                    title="YouTube video"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <script>
        const openYoutube = document.querySelectorAll(".openYoutube");
        const closeYoutube = document.getElementById("closeYoutube");
        const youtubeModal = document.getElementById("youtubeModal");
        const youtubeIframe = document.getElementById("youtubeIframe");

        // YouTube video ID
        const videoId = "mJVuZiK9a6I";

        // Open modal
        openYoutube.forEach(function(button) {
            button.addEventListener("click", function() {
                youtubeIframe.src =
                    "https://www.youtube.com/embed/" + videoId + "?autoplay=1";

                youtubeModal.classList.add("active");
            });
        });

        // Close modal
        function closeModal() {
            youtubeModal.classList.remove("active");
            youtubeIframe.src = "";
        }

        closeYoutube.addEventListener("click", closeModal);

        // Close when clicking outside
        youtubeModal.addEventListener("click", function(event) {
            if (event.target === youtubeModal) {
                closeModal();
            }
        });

        // Close with ESC
        document.addEventListener("keydown", function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    </script>

    <script>
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            //I'm adding this section so I don't have to keep updating this pen every year :-)
            //remove this if you don't need it
            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "09/30/",
                birthday = dayMonth + yyyy;
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
            //end
            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {
                    const now = new Date().getTime(),
                        distance = countDown - now;
                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                    //do something later when date is reached
                    if (distance < 0) {
                        document.getElementById("headline").innerText = "It's my birthday!";
                        document.getElementById("countdown").style.display = "none";
                        document.getElementById("content").style.display = "block";
                        clearInterval(x);
                    }
                    //seconds
                }, 0)
        }());
    </script>
    <script>
        var owl = $('#testimonials');
        owl.owlCarousel({
            margin: 30,
            loop: true,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
            autoplay: false,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            //toggle the component with class accordion_body
            $(".accordion_head").click(function() {
                if ($('.accordion_body').is(':visible')) {
                    $(".accordion_body").slideUp(300);
                    $(".plusminus").text('+');
                    $('.accordion_head').removeClass('clr_tx');
                }
                if ($(this).next(".accordion_body").is(':visible')) {
                    $(this).next(".accordion_body").slideUp(300);
                    $(this).children(".plusminus").text('+');
                } else {
                    $(this).next(".accordion_body").slideDown(300);
                    $(this).addClass('clr_tx').siblings().removeClass('clr_tx');
                    $(this).children(".plusminus").text('-');
                }
            });
        });
    </script>
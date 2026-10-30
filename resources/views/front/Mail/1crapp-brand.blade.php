@php
    $branding = DB::table('branding_setting')->where('user_id', 8)->first();
@endphp
@if($branding)
<tr style="text-align:center;">
    <td style="padding:25px; background:#f5f5f5; text-align:center; solid #e5e5e5;">
        @if(!empty($branding->logo))
            <div style="margin-bottom:15px;">
                <a href="{{ $branding->btn_link }}" @if($branding->btn_new_tab) target="_blank" @endif>
                    <img src="{{ asset($branding->logo) }}"
                         alt="Logo"
                         style="display:block; margin:0 auto; border:0; height:80px; width:80px;">
                </a>
            </div>
        @endif
        @if(!empty($branding->message))
            <p style="margin:0 0 15px; font-size:14px; line-height:22px; color:#555;">
                {{ $branding->message }}
            </p>
        @endif
        @if($branding->btn_enable)
            <a href="{{ $branding->btn_link }}"
               @if($branding->btn_new_tab) target="_blank" @endif
               style="
                    display:inline-block;
                    background:{{ $branding->btn_bg_color }};
                    color:{{ $branding->btn_text_color }};
                    text-decoration:none;
                    padding:12px 24px;
                    border-radius:5px;
                    font-size:14px;
                    font-weight:bold;
                ">
                {{ $branding->btn_title }}
            </a>
        @endif
    </td>
</tr>
 <p style="margin-top:30px;"></p>
@endif
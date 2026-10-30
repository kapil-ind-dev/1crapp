@php
    use Illuminate\Support\Facades\DB;

    $socialLinks = DB::table('tbl_footer_sociallinks')
        ->where('created_by', 8)
        ->get();

    $branddata = DB::table('tbl_email_footer_branding')
        ->where('created_by', 8)
        ->first();
@endphp

<!-- ============================================= -->
<!-- EMAIL FOOTER - Copy the table below into your email template -->
<!-- ============================================= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f5f7;">
  <tr>
    <td align="center">

      <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:100%; background-color:#ffffff; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.06); font-family:'Segoe UI', Arial, Helvetica, sans-serif;">

         <!-- ===== "Was this email helpful?" band ===== -->
        @if($branddata && !empty($branddata->feedback_visible) && !empty($branddata->feedback_text))
        <tr>
          <td style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%); padding:28px 20px 26px 20px;" align="center">
            <p style="margin:0 0 18px 0; font-size:15px; font-weight:600; letter-spacing:0.3px; color:#ffffff; font-family:'Segoe UI', Arial, Helvetica, sans-serif;">
              {{ $branddata->feedback_text }}
            </p>

            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding:0 8px;">
                  <a href="{{ $branddata->feedback_url }}?rating=bad" style="text-decoration:none;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#242444; border-radius:50%; width:46px; height:46px;">
                      <tr><td align="center" valign="middle" style="width:46px; height:46px; font-size:22px; line-height:46px;">😞</td></tr>
                    </table>
                  </a>
                </td>
                <td style="padding:0 8px;">
                  <a href="{{ $branddata->feedback_url }}?rating=neutral" style="text-decoration:none;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#242444; border-radius:50%; width:46px; height:46px;">
                      <tr><td align="center" valign="middle" style="width:46px; height:46px; font-size:22px; line-height:46px;">😐</td></tr>
                    </table>
                  </a>
                </td>
                <td style="padding:0 8px;">
                  <a href="{{ $branddata->feedback_url }}?rating=good" style="text-decoration:none;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#242444; border-radius:50%; width:46px; height:46px;">
                      <tr><td align="center" valign="middle" style="width:46px; height:46px; font-size:22px; line-height:46px;">😊</td></tr>
                    </table>
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        @endif

        {{-- ===== App download section ===== --}}
        @if($branddata && ((!empty($branddata->playstore_visible) && !empty($branddata->playstore_url)) || (!empty($branddata->appstore_visible) && !empty($branddata->appstore_url))))
        <tr>
          <td style="padding:28px 24px 8px 24px;" align="center">
            <p style="margin:0 0 18px 0; font-size:16px; font-weight:700; color:#1a1a2e; font-family:'Segoe UI', Arial, Helvetica, sans-serif;">
              Download <span style="color:#5b5be0;">{{ $branddata->app_name ?? 'Our App' }}</span> Today
            </p>

            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
              <tr>
                @if(!empty($branddata->playstore_visible) && !empty($branddata->playstore_url))
                <td style="padding:0 6px;">
                  <a href="{{ $branddata->playstore_url }}" style="text-decoration:none;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#111111; border-radius:10px;">
                      <tr>
                        <td style="padding:9px 18px;" align="left" valign="middle">
                          <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="padding-right:8px;" valign="middle">
                                @if(!empty($branddata->playstore_logo))
                                  <img src="{{ $branddata->playstore_logo }}" width="22" height="22" alt="Google Play" style="display:block; border:0; height:22px; width:22px;">
                                @else
                                  <span style="font-size:20px; color:#ffffff;">▶</span>
                                @endif
                              </td>
                              <td valign="middle">
                                <span style="display:block; font-size:9px; color:#ffffff; font-family:Arial, sans-serif; line-height:11px;">GET IT ON</span>
                                <span style="display:block; font-size:14px; font-weight:600; color:#ffffff; font-family:Arial, sans-serif; line-height:17px;">Google Play</span>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </a>
                </td>
                @endif

                @if(!empty($branddata->appstore_visible) && !empty($branddata->appstore_url))
                <td style="padding:0 6px;">
                  <a href="{{ $branddata->appstore_url }}" style="text-decoration:none;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#111111; border-radius:10px;">
                      <tr>
                        <td style="padding:9px 18px;" align="left" valign="middle">
                          <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="padding-right:8px;" valign="middle">
                                @if(!empty($branddata->appstore_logo))
                                  <img src="{{ $branddata->appstore_logo }}" width="22" height="22" alt="App Store" style="display:block; background: white; border: 2px solid black; border-radius: 30%; height:22px; width:22px;">
                                @else
                                  <span style="font-size:18px; color:#ffffff;"></span>
                                @endif
                              </td>
                              <td valign="middle">
                                <span style="display:block; font-size:9px; color:#ffffff; font-family:Arial, sans-serif; line-height:11px;">Download on the</span>
                                <span style="display:block; font-size:14px; font-weight:600; color:#ffffff; font-family:Arial, sans-serif; line-height:17px;">App Store</span>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </a>
                </td>
                @endif
              </tr>
            </table>
          </td>
        </tr>
        @endif

        {{-- ===== Divider (only if something appears above it and something below it) ===== --}}
        @if(!empty($branddata->socialmedia_status) && $socialLinks->count())
        <tr>
          <td style="padding:22px 24px 0 24px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr><td style="border-top:1px solid #edeef2; font-size:1px; line-height:1px;">&nbsp;</td></tr>
            </table>
          </td>
        </tr>
        @endif

        {{-- ===== Social icons (fully dynamic) ===== --}}
        @if(!empty($branddata->socialmedia_status) && $socialLinks->count())
        <tr>
          <td style="padding:22px 24px 6px 24px;" align="center">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
              <tr>
                @foreach($socialLinks as $link)
                <td style="padding:0 5px;">
                  <a href="{{ $link->link }}" style="text-decoration:none;" target="_blank">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#f0f1f5; border-radius:50%; width:38px; height:38px;">
                      <tr>
                        <td align="center" valign="middle" style="width:38px; height:38px;">
                          @if(!empty($link->icon))
                           <i class="fa {{ $link->icon }}"></i>
                          @endif
                        </td>
                      </tr>
                    </table>
                  </a>
                </td>
                @endforeach
              </tr>
            </table>
          </td>
        </tr>
        @endif

        {{-- ===== Legal / unsubscribe text ===== --}}
        @if(!empty($branddata->unsubscribe_visible) && $branddata)
        <tr>
          <td style="padding:16px 24px 26px 24px;" align="center">
            <p style="margin:0; font-size:11px; line-height:17px; color:#9a9aa5; font-family:'Segoe UI', Arial, Helvetica, sans-serif;">
              {{ $branddata->unsubscribe_text ?? 'You are receiving this email because you subscribed to our updates.' }}
              @if(!empty($branddata->unsubscribe_url))
                <br>To stop receiving these emails, <a href="{{ $branddata->unsubscribe_url }}" style="color:#5b5be0; text-decoration:underline;">unsubscribe here</a>
              @endif
            </p>
            @if(!empty($branddata->website_url))
            <p style="margin:10px 0 0 0; font-size:11px; color:#c2c2cc; font-family:'Segoe UI', Arial, Helvetica, sans-serif;">
              <a href="{{ $branddata->website_url }}" style="color:#c2c2cc; text-decoration:none;">{{ $branddata->website_url }}</a>
            </p>
            @endif
          </td>
        </tr>
        @endif

      </table>

    </td>
  </tr>
</table>
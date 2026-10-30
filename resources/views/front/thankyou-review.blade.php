<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Review</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .thankyou-wrapper {
            width: 100%;
            max-width: 650px;
        }
        .thankyou-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 45px 40px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            border-radius: 50%;
            background: #e9f9ef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }
        .thankyou-card h1 {
            font-size: 32px;
            color: #1d2939;
            margin-bottom: 12px;
        }
        .thankyou-card .subtitle {
            color: #667085;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .review-box {
            background: #f8fafc;
            border: 1px solid #eaecf0;
            border-radius: 14px;
            padding: 25px;
            text-align: left;
            margin-top: 25px;
        }
        .review-name {
            font-size: 20px;
            font-weight: 600;
            color: #1d2939;
            margin-bottom: 10px;
        }
        .rating {
            margin-bottom: 15px;
            font-size: 25px;
            letter-spacing: 3px;
        }
        .star-filled {
            color: #f5b301;
        }
        .star-empty {
            color: #d0d5dd;
        }
        .review-text {
            color: #475467;
            font-size: 15px;
            line-height: 1.7;
            font-style: italic;
        }
        .pending-message {
            margin-top: 25px;
            padding: 14px 18px;
            border-radius: 10px;
            background: #fff8e6;
            color: #8a6116;
            font-size: 14px;
            line-height: 1.5;
        }
        .home-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background: #1d2939;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }
        .home-btn:hover {
            background: #344054;
            color: #ffffff;
        }
        @media (max-width: 576px) {
            .thankyou-card {
                padding: 35px 20px;
            }
            .thankyou-card h1 {
                font-size: 26px;
            }
            .review-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="thankyou-wrapper">
        <div class="thankyou-card">
            <div class="success-icon">
                ✓
            </div>
            <h1>Thank You, {{ $review->name ?? 'there' }}! 🎉</h1>
            <p class="subtitle">
                Thank you for taking the time to share your experience with us.
                Your feedback means a lot to us.
            </p>
            @if(!empty($review->rating) || !empty($review->review))
            <div class="review-box">
                @if(!empty($review->name))
                <div class="review-name">
                    {{ $review->name }}
                </div>
                @endif
                @if(!empty($review->rating))
                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <=$review->rating)
                        <span class="star-filled">★</span>
                        @else
                        <span class="star-empty">☆</span>
                        @endif
                        @endfor
                </div>
                @endif
                @if(!empty($review->review))
                <div class="review-text">
                    "{{ $review->review }}"
                </div>
                @endif
            </div>
            @endif
            @if(isset($review->status) && $review->status == 0)
            <div class="pending-message">
                Your review has been successfully submitted and is currently
                under review. Once approved, it may appear publicly on the profile.
            </div>
            @else
            <p class="subtitle" style="margin-top:25px;margin-bottom:0;">
                We appreciate your valuable feedback. ❤️
            </p>
            @endif
            <a href="{{ url('/') }}" class="home-btn">
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>
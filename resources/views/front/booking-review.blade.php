<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1CR App — Review</title>
<style>
*{box-sizing:border-box}
body{
  margin:0;background:linear-gradient(135deg,#f4f8ff,#f8fafc);
  color:#172033
}
.page{min-height:100vh;padding:28px 15px;display:flex;justify-content:center}
.card{
  width:100%;max-width:620px;background:#fff;border-radius:18px;
  box-shadow:0 12px 40px rgba(27,55,100,.10);overflow:hidden
}
.hero{
  padding:28px 34px 22px;text-align:center;
  background:linear-gradient(180deg,#f0f6ff 0%,#fff 100%)
}
.emoji{font-size:34px;margin-bottom:7px}
.hero h1{margin:0;font-size:23px;font-weight:750}
.hero p{margin:7px 0 0;color:#728096;font-size:13px}
.what{
  margin-top:18px;background:#fff;border:1px solid #e5eaf1;
  border-radius:10px;padding:11px 14px;font-size:11px;text-align:left
}
.what span{color:#8a95a5}.what b{font-weight:650;margin-left:4px}
.progress{padding:0 34px 18px;background:#fff}
.progress-line{display:flex;align-items:center;gap:7px}
.dot{
  width:25px;height:25px;border-radius:50%;display:flex;align-items:center;
  justify-content:center;background:#e9eef5;color:#7b8798;font-size:10px;font-weight:700
}
.dot.active{background:#1764d9;color:#fff}.dot.done{background:#dff5e7;color:#168447}
.progress-bar{height:4px;flex:1;background:#e8edf3;border-radius:5px}.progress-fill{height:100%;width:0;background:#1764d9;border-radius:5px;transition:.3s}
.progress-labels{display:flex;justify-content:space-between;font-size:9px;color:#8a95a5;margin-top:6px}
.body{padding:0 34px 28px}
.step{display:none}.step.active{display:block}
.step-head{margin:2px 0 18px}.step-head h2{font-size:17px;margin:0 0 5px}.step-head p{font-size:11px;color:#7b8798;margin:0}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.field{margin-bottom:13px}.label{display:block;font-size:11px;font-weight:600;margin-bottom:6px}.req{color:#e04d55}
.input,.textarea{
  width:100%;border:1px solid #dbe1e9;background:#f9fafb;border-radius:8px;
  padding:0 11px;height:39px;font-size:11px;color:#4e5d72;outline:none
}
.textarea{height:105px;padding-top:10px;resize:vertical;font-family:Arial}
.input:focus,.textarea:focus{border-color:#1764d9;background:#fff;box-shadow:0 0 0 3px rgba(23,100,217,.07)}
.rating-box{text-align:center;border:1px solid #e6ebf1;border-radius:12px;padding:18px 12px;margin-bottom:18px;background:#fbfcfe}
.rating-title{font-size:11px;font-weight:650;margin-bottom:8px}.stars{display:flex;justify-content:center;gap:4px}
.star{border:0;background:none;color:#f5a623;font-size:37px;line-height:1;cursor:pointer;padding:0 2px;transition:.15s}
.star:hover{transform:scale(1.12)}.rating-text{font-size:11px;color:#7b8798;margin-top:7px}
.upload{
  border:1px dashed #bfcbe0;background:#f9fbff;border-radius:10px;
  padding:17px;text-align:center;color:#758298;font-size:10px;cursor:pointer
}
.upload strong{color:#1764d9;font-size:11px}.upload input{display:none}
.photo-preview{
  width:66px;height:66px;border-radius:50%;background:#edf2f8;color:#1764d9;
  margin:0 auto 9px;display:flex;align-items:center;justify-content:center;font-size:25px;overflow:hidden
}
.photo-preview img{width:100%;height:100%;object-fit:cover}
.video-option{
  border:1px solid #e2e8f0;border-radius:10px;padding:13px;margin-bottom:10px
}
.option-title{font-size:11px;font-weight:650;margin-bottom:8px}.hint{font-size:9px;color:#8a95a5;margin-top:5px}
.consent{display:flex;gap:8px;font-size:10px;line-height:1.45;color:#68758a;margin:17px 0}
.consent input{accent-color:#1764d9;margin-top:2px}
.actions{display:flex;gap:9px;margin-top:20px}.btn{height:43px;border-radius:8px;padding:0 18px;border:1px solid #dbe2eb;background:#fff;color:#526176;font-size:11px;font-weight:650;cursor:pointer}
.btn.next,.btn.submit{flex:1;background:#1764d9;color:#fff;border-color:#1764d9}.btn.next:hover,.btn.submit:hover{background:#0e55bd}
.btn.back{min-width:85px}
.mini-note{text-align:center;font-size:9px;color:#98a2b1;margin-top:13px}
.success{display:none;text-align:center;padding:50px 30px 60px}.success-icon{font-size:55px}.success h2{color:#159447;margin:12px 0 7px;font-size:24px}.success p{color:#718096;font-size:12px;line-height:1.6}
.privacy{font-size:9px;color:#9aa3b0;text-align:center;margin-top:15px}
@media(max-width:560px){
 .hero{padding:23px 20px 18px}.progress{padding:0 20px 17px}.body{padding:0 20px 24px}
 .grid{grid-template-columns:1fr}.hero h1{font-size:21px}
}
</style>
</head>
<body>
<div class="page">
<div class="card">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="mainForm">
  <div class="hero">
    <div class="emoji">💙 ⭐ 😊</div>
    <h1>How was your experience?</h1>
    <p>Your feedback helps us improve and helps others choose with confidence.</p>
    <div class="what"><span>Review for:</span><b>Meeting With Ramjee — 1CR Super Realtors-1</b></div>
  </div>

  <div class="progress">
    <div class="progress-line">
      <div class="dot active" id="d1">1</div>
      <div class="progress-bar"><div class="progress-fill" id="p1"></div></div>
      <div class="dot" id="d2">2</div>
      <div class="progress-bar"><div class="progress-fill" id="p2"></div></div>
      <div class="dot" id="d3">3</div>
    </div>
    <div class="progress-labels"><span>About You</span><span>Your Experience</span><span>Finish</span></div>
  </div>

  <div class="body">
  <form method="POST" action="{{ route('save-review') }}" enctype="multipart/form-data">
  @csrf  
  <!-- STEP 1 -->
   <input type="hidden" name="type_id" value="{{ $bookingType->id }}" />
    <section class="step active" id="step1">
      <div class="step-head">
        <h2>👋 First, tell us about you</h2>
        <p>Just a few details so we know who we're thanking.</p>
      </div>
      @if($setting && $setting->name_status == 1)
        <div class="field">
          <label class="label">Your name <span class="req">*</span></label>
          <input class="input" id="name" name="name" placeholder="Enter your name">
        </div>
      @endif
      <div class="grid">
        @if($setting && $setting->email_status == 1)
        <div class="field">
          <label class="label">Your email <span class="req">*</span></label>
          <input class="input" id="email" name="email" type="email" placeholder="Enter your email">
        </div>
        @endif
        @if($setting && $setting->phone_status == 1)
        <div class="field">
          <label class="label">Phone / WhatsApp</label>
          <input class="input" id="phone" name="phone" placeholder="+91 98765 43210">
        </div>
        @endif
      </div>

      <div class="grid">
        @if($setting && $setting->designation_status == 1)
        <div class="field">
          <label class="label">Designation</label>
          <input class="input" id="designation" name="designation" placeholder="e.g. Director, Manager">
        </div>
        @endif
        @if($setting && $setting->department_status == 1)
        <div class="field">
          <label class="label">Department</label>
          <input class="input" id="department" name="department" placeholder="e.g. Sales, HR">
        </div>
        @endif
      </div>

      <div class="grid">
        @if($setting && $setting->organisation_status == 1)
        <div class="field">
          <label class="label">Organisation / Company</label>
          <input class="input" id="organisation" name="organisation" placeholder="Enter company name">
        </div>
        @endif
        @if($setting && $setting->location_status == 1)
        <div class="field">
          <label class="label">Location</label>
          <input class="input" id="location" name="location" placeholder="City, State / Country">
        </div>
        @endif
      </div>

      <div class="actions">
        <button type="button" class="btn next" onclick="nextStep(2)">Continue →</button>
      </div>
      <div class="mini-note">🔒 Your information is kept safe and private.</div>
    </section>

    <!-- STEP 2 -->
    <section class="step" id="step2">
      @if($setting && $setting->star_rating_status == 1)
      <div class="step-head">
        <h2>⭐ Tell us what you think</h2>
        <p>Your honest feedback takes less than a minute.</p>
      </div>
      <div class="rating-box">
        <div class="rating-title">How would you rate your experience? <span class="req">*</span></div>
        <div class="stars">
          <button type="button" class="star" onclick="rate(1)">☆</button>
          <button type="button" class="star" onclick="rate(2)">☆</button>
          <button type="button" class="star" onclick="rate(3)">☆</button>
          <button type="button" class="star" onclick="rate(4)">☆</button>
          <button type="button" class="star" onclick="rate(5)">☆</button>
        </div>
        <div class="rating-text" id="ratingText">Click a star to rate</div>
        <input type="hidden" id="ratingValue" name="rating" value="">
      </div>
      @endif
      @if($setting && $setting->testimonial_status == 1)
      <div class="field">
        <label class="label">Write a review <span style="font-weight:400;color:#8b96a5">(optional)</span></label>
        <textarea class="textarea" id="review" name="review" placeholder="What did you like? What was helpful? Share your experience..." ></textarea>
      </div>
      @endif

      <div class="actions">
        <button type="button" class="btn back" onclick="nextStep(1)">← Back</button>
        <button type="button" class="btn next" onclick="nextStep(3)">Continue →</button>
      </div>
    </section>

    <!-- STEP 3 -->
    <section class="step" id="step3">
      @if($setting && $setting->profile_status == 1)
      <div class="step-head">
        <h2>🎁 Make your review even better</h2>
        <p>These options are completely optional.</p>
      </div>
      <div class="field">
        <label class="label">Profile Photo</label>
        <div class="photo-preview" id="photoPreview">＋</div>
        <div class="upload" onclick="document.getElementById('photo').click()">
          <strong>📷 Upload your photo</strong><br>
          JPG, PNG or WEBP • Optional
          <input id="photo" name="profile_photo" type="file" accept="image/*" onchange="previewPhoto(event)">
        </div>
      </div>
      @endif
      @if($setting && $setting->testimonial_status == 1)
      <div class="video-option">
        <div class="option-title">🎥 Video Testimonial <span style="font-weight:400;color:#8b96a5">(optional)</span></div>
        <input class="input" name="video_url" placeholder="Paste YouTube, Vimeo or video link">
        <div class="hint">A short video makes your testimonial more personal.</div>
      </div>
      @endif
      @if($setting && $setting->video_testimonial_status == 1)
      <div class="upload" onclick="document.getElementById('video').click()">
        <strong>🎬 Or upload a video</strong><br>
        MP4 / MOV • Optional
        <input id="video" name="video_file" type="file" accept="video/*">
      </div>
      @endif

      <label class="consent">
        <input type="checkbox" id="consent" name="consent" checked>
        <span>I agree that my review and the information I have provided may be displayed publicly on the 1CR APP profile/testimonial card.</span>
      </label>

      <div class="actions">
        <button type="button" class="btn back" onclick="nextStep(2)">← Back</button>
        <button class="btn submit" onclick="submitReview()">✓ Submit Review</button>
      </div>
    </section>
  </form>
  </div>
</div>

<div class="success" id="success">
  <div class="success-icon">🎉</div>
  <h2>Thank You!</h2>
  <p>Your review has been submitted successfully.<br>We really appreciate you taking the time to share your experience. 💙</p>
  <div style="font-size:24px;margin-top:18px">⭐ ⭐ ⭐ ⭐ ⭐</div>
  <div class="privacy">Powered by 1CR APP</div>
</div>

</div>
</div>

<script>
let currentStep=1;
let selectedRating=0;

function nextStep(step){
  if(step===2 && !document.getElementById('name').value.trim()){
    alert('Please enter your name.');
    return;
  }
  if(step===2 && !document.getElementById('email').value.trim()){
    alert('Please enter your email.');
    return;
  }
  document.querySelectorAll('.step').forEach(s=>s.classList.remove('active'));
  document.getElementById('step'+step).classList.add('active');
  currentStep=step;
  updateProgress();
  window.scrollTo({top:0,behavior:'smooth'});
}

function updateProgress(){
  const d1=document.getElementById('d1'),d2=document.getElementById('d2'),d3=document.getElementById('d3');
  const p1=document.getElementById('p1'),p2=document.getElementById('p2');
  [d1,d2,d3].forEach(d=>d.classList.remove('active','done'));
  p1.style.width=currentStep>=2?'100%':'0%';
  p2.style.width=currentStep>=3?'100%':'0%';
  if(currentStep===1)d1.classList.add('active');
  if(currentStep===2){d1.classList.add('done');d1.textContent='✓';d2.classList.add('active');}
  if(currentStep===3){d1.classList.add('done');d1.textContent='✓';d2.classList.add('done');d2.textContent='✓';d3.classList.add('active');}
}

function rate(n){
  selectedRating=n;
  document.querySelectorAll('.star').forEach((s,i)=>s.textContent=i<n?'★':'☆');
  const labels=['','Not great','Could be better','Good','Very good','Excellent! 🎉'];
  document.getElementById('ratingText').textContent=labels[n];
  document.getElementById('ratingValue').value=n;
}

function previewPhoto(event){
  const file=event.target.files[0]; if(!file)return;
  const reader=new FileReader();
  reader.onload=e=>document.getElementById('photoPreview').innerHTML='<img src="'+e.target.result+'" alt="Profile photo">';
  reader.readAsDataURL(file);
}

function submitReview(){
  if(selectedRating===0){alert('Please select a rating.');return}
  if(!document.getElementById('consent').checked){alert('Please confirm the display consent to continue.');return}
  document.getElementById('mainForm').style.display='none';
  document.getElementById('success').style.display='block';
  window.scrollTo({top:0,behavior:'smooth'});
}
</script>
</body>
</html>
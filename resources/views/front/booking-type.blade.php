@php
function rating($num)
{
$num = (int) $num;
if ($num < 0) {
    $num=0;
    }
    if ($num> 5) {
    $num = 5;
    }
    return str_repeat('★', $num) . str_repeat('☆', 5 - $num);
    }
    @endphp
    @if($cms->custom_header == 1)
    @include('front.custom-layout.header')
    @else
    @include('front.layouts.user-header')
    @endif<div class="both_areeea">
     <div class="card left">
        <div class="profile"><img src="https://i.pravatar.cc/120?img=12">
            <div>
                <div class="name">Ramjee | 1CR APP - Profile <span class="verified">✓</span></div>
                <div class="rating"><span class="stars">★★★★★</span> <b>5.0</b><span>(5 reviews)</span></div>
            </div>
        </div>
        <h1>{{ $bookingType->title }}</h1>
        <div class="badges"><span class="badge">◷ {{ $bookingType->duration }} mins</span><span class="badge">✓ Approval Required</span></div>
        <div id="desc" class="desc short">{!! \Str::limit($bookingType->content, 200) !!}</div>
        @if(strlen($bookingType->content) > 200)
        <button class="link" onclick="toggleDesc()">Show more⌄</button>
        @endif
        @if(isset($cms) && $cms->features->isNotEmpty())
        <div class="benefits">
            @foreach($cms->features as $index => $feature)
            <div>
                <div class="bi"><img src="{{ $feature->image }}" height="25" width="25" /></div>
                <div class="bt">{{ $feature->title }}</div>
                <div class="bs">{{ $feature->sub_title }}</div>
            </div>
            @endforeach
            <!-- <div>
                        <div class="bi">↗</div>
                        <div class="bt">Proven Strategies</div>
                        <div class="bs">Real World Insights</div>
                    </div>
                    <div>
                        <div class="bi">ϟ</div>
                        <div class="bt">Actionable Advice</div>
                        <div class="bs">Immediate Next Steps</div>
                    </div>
                    <div>
                        <div class="bi">♙</div>
                        <div class="bt">Confidential</div>
                        <div class="bs">100% Private</div>
                    </div> -->
        </div>
        @endif
        <div class="reviews">
            <div class="rh"><b>⭐ What People Are Saying</b><span><b>{{ number_format($averageRating, 1) }}</b> <span class="stars">★★★★★</span> ({{ $totalReview}})</span></div>
            @foreach($reviews as $key=>$review)
            <div @if($key<3) class="review" @else id="moreReviews" class="more" @endif>
                <div class="person">
                    <div class="av">{{ strtoupper(substr($review->name, 0, 1)) }}</div>
                    <div><b>{{ $review->name }}</b>
                        <div class="date">{{ date('M Y', strtotime($review->created_at)) }}</div>
                    </div>
                </div>
                <div><span class="stars">{{ rating($review->rating) }}</span> <span class="tag">{{ $bookingType->title }}</span></div>
                <div class="rt">{{ $review->review }}</div>
            </div>
            @endforeach
            <!-- <div class="review">
                        <div class="person">
                            <div class="av" style="background:#159447">A</div>
                            <div><b>Amit Sharma</b>
                                <div class="date">Sep 2026</div>
                            </div>
                        </div>
                        <div><span class="stars">★★★★★</span> <span class="tag">Meeting With Ramjee - Founder</span></div>
                        <div class="rt">Got clarity on my business strategy and client handling. Amazing experience!</div>
                    </div>
                    <div id="moreReviews" class="more">
                        <div class="review"><b>Suresh Meena</b> <span class="stars">★★★★★</span>
                            <div class="date">Aug 2026</div>
                            <div class="rt">Practical and easy to understand. The discussion gave me a clear direction.</div>
                        </div>
                        <div class="review"><b>Priya Verma</b> <span class="stars">★★★★★</span>
                            <div class="date">Aug 2026</div>
                            <div class="rt">A very useful conversation with actionable ideas.</div>
                        </div>
                    </div> -->
            @if($totalReview > 2)
            <button id="reviewBtn" class="all" onclick="toggleReviews()">Show all reviews⌄</button>
            @endif
        </div>
		
		
        <div class="proof">
		 <div class="bohss">
		  <b>👥 100+ Realtors have already booked a call this month</b>
		  <br>Join them and take your real estate business to the next level.
		 </div>
		 
		 <div class="avatar-group">
			<img class="avatar" src="https://i.pravatar.cc/120?img=12" alt="User" />
			<img class="avatar" src="https://i.pravatar.cc/120?img=12" alt="User" />
			<img class="avatar" src="https://i.pravatar.cc/120?img=12" alt="User" />
			<img class="avatar" src="https://i.pravatar.cc/120?img=12" alt="User" />
			<div class="more">+97</div>
		 </div>		 
		</div>
     </div>
     
	 <div class="card right">
        <div class="tz"> 🌐
            <select id="timezone">
                <option value="Asia/Kolkata">Asia/Kolkata</option>
            </select>
        </div>
        <div class="cal">
            <div class="heading"> ▣ &nbsp;Select Date </div>
            <div class="month">
                <button type="button" class="arrow" onclick="changeMonth(-1)"> ‹ </button>
                <b id="monthTitle"></b>
                <button type="button" class="arrow" onclick="changeMonth(1)"> › </button>
            </div>
            <div class="week">
                <div>SUN</div>
                <div>MON</div>
                <div>TUE</div>
                <div>WED</div>
                <div>THU</div>
                <div>FRI</div>
                <div>SAT</div>
            </div>
            <div class="days" id="days"></div>
            <div class="timehead"> ◷ &nbsp;Select Time </div>
            <div class="times" id="times">
                <div class="no-time"> Please select a date </div>
            </div>
            <button type="button" class="continue" onclick="openBooking()" id="continueBtn" disabled> Continue to Book → </button>
            <div class="secure"> 🔒 Your details are secure & confidential </div>
        </div>
     </div>    
	 </div>
    </div>
    <footer class="footer">
        <div class="brand">
            <div class="flogo">1CR</div>
            <div><b>1CR APP</b><small>Real Estate Growth Partner</small></div>
        </div>
        <div class="ftext"><strong>Tired of Getting Junk Leads?</strong>
            <div>Get high-intent leads, automate follow-ups and grow your real estate business.</div>
        </div>
        <button class="fbtn" onclick="alert('Connect this button to your 1CRAPP landing page.')">Try 1CRAPP For Free →</button>
    </footer>
    </div>
    <div class="overlay" id="booking">
        @if($formdata)
        <div class="modal">
            <form id="bookingForm" method="POST">
                @csrf
                <input type="hidden" name="booking_type_id" value="{{ $bookingType->id }}">
                <input type="hidden" name="booking_date" id="selected_date">
                <input type="hidden" name="start_time" id="start_time">
                <input type="hidden" name="end_time" id="end_time">
                <div class="mh">
                    <h2>Complete Your Booking</h2><button type="button" class="close" onclick="closeModal('booking')">×</button>
                </div> 
                <div class="automantiocnss">				
                <div class="multipal_tm">
                <div class="summary">				 
				 <b>With: </b>
				 <span id="sumWith">{{ $agent->first_name }} {{ $agent->last_name }}</span> | <b>When: </b><span id="sumDate">Select a date</span>
				</div>
				
                <div class="summary">
				 <b>Timezone: </b>
				 <span id="sumDate">Asia/Kolkata</span> | <b>Duration: </b><span id="sumDuration">{{ $bookingType->duration }}</span> mi
				</div>
				
                <div class="summary">
				 <b>Start Time: </b>
				 <span id="startTimeText"></span> | <b>End Time: </b><span id="endTimeText"></span></div>			    
				</div>	
                <!-- <div class="summary"><b>Time:</b><br><span id="sumTime"></div> -->
				
				
				

				
				
				
                {!! $formdata ?? '' !!}
				</div>
            </form>
        </div>
        @else
        <div class="modal">
            <div class="mh">
                <h2>Booking Form Not Found</h2><button class="close" onclick="closeModal('booking')">×</button>
            </div>
            <div class="summary">The booking form for this appointment type is not available. Please contact the administrator.</div>
        </div>
        @endif
    </div>
    <div class="overlay" id="successbooking">
        <div class="modal">
            <div class="mh">
                <h2>Booking confirmed!</h2><button class="close" onclick="closeModal('successbooking')">×</button>
            </div>
            <div class="modal-body">
                <div class="booking-box">
                    <div class="sucsses_box">
                        <div class="success-icon">
                            <svg viewBox="0 0 64 64" fill="none">
                                <circle cx="32" cy="32" r="26"></circle>
                                <path d="M22 32L29 39L43 25"></path>
                            </svg>
                        </div>
                        <p class="sub-text">
                            Your booking has been scheduled.
                        </p>
                        <p class="meeting-text">
                            Meeting With Ramjee- 1CR Super Realtors-1
                        </p>
                    </div>
                    <div class="info-row">
                        <svg class="icon" viewBox="0 0 24 24" fill="none"
							 xmlns="http://www.w3.org/2000/svg">
							<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/>
							<path d="M3.5 19c.5-3.2 2.4-5 5.5-5s5 1.8 5.5 5"
								  stroke="currentColor" stroke-width="1.8"
								  stroke-linecap="round"/>
							<path d="M16 7.5a2.5 2.5 0 0 1 0 5"
								  stroke="currentColor" stroke-width="1.8"
								  stroke-linecap="round"/>
							<path d="M17 14.5c1.8.6 3 2 3.5 4.5"
								  stroke="currentColor" stroke-width="1.8"
								  stroke-linecap="round"/>
						</svg>
                        <b>With:</b> {{ $agent->first_name }} {{ $agent->last_name }}
                    </div>
                    <div class="info-row">
                        <svg class="icon" viewBox="0 0 24 24" fill="none"
							 xmlns="http://www.w3.org/2000/svg">
							<rect x="4" y="5" width="16" height="15"
								  rx="1.5"
								  stroke="currentColor"
								  stroke-width="1.8"/>
							<path d="M8 3v4M16 3v4M4 9h16"
								  stroke="currentColor"
								  stroke-width="1.8"
								  stroke-linecap="round"/>
						</svg>
                        <b>When:</b> <span id="suc_when"></span>
                    </div>
                    <div class="info-row">
                        <svg class="icon" viewBox="0 0 24 24" fill="none"
							 xmlns="http://www.w3.org/2000/svg">
							<circle cx="12" cy="12" r="8.5"
									stroke="currentColor"
									stroke-width="1.8"/>
							<path d="M3.8 12h16.4M12 3.5c2.1 2.3 3.2 5.1 3.2 8.5
									 0 3.4-1.1 6.2-3.2 8.5
									 -2.1-2.3-3.2-5.1-3.2-8.5
									 0-3.4 1.1-6.2 3.2-8.5Z"
								  stroke="currentColor"
								  stroke-width="1.5"/>
						</svg>
                        <b>Timezone:</b> Asia/Calcutta
                    </div>
                    <div class="info-row">
                        <svg class="icon" viewBox="0 0 24 24" fill="none"
							 xmlns="http://www.w3.org/2000/svg">
							<circle cx="12" cy="12" r="8.5"
									stroke="currentColor"
									stroke-width="1.8"/>
							<path d="M12 7v5l3.5 2"
								  stroke="currentColor"
								  stroke-width="1.8"
								  stroke-linecap="round"
								  stroke-linejoin="round"/>
						</svg>
                        <b>Duration:</b> <span id="suc_duration">{{ $bookingType->duration }} Min</span>
                    </div>
                </div>
				
				<div class="calendar-box">
					<div class="action-buttons">
						<button class="action-btn reschedule">Reschedule</button>

						<button class="action-btn cancel">Cancel</button>
					</div>

					<div class="add-title">Add to:</div>

					<div class="divider"></div>

					<div class="calendar-icons">
						<!-- Google Calendar -->
						<div class="calendar-icon" title="Google Calendar">
							<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
								<!-- blue body -->
								<path fill="#4285F4" d="M6 9h30c2.2 0 4 1.8 4 4v26H10c-2.2 0-4-1.8-4-4V9z" />

								<!-- green bottom -->
								<path fill="#34A853" d="M10 34h30v5H10c-2.2 0-4-1.8-4-4v-5h4v4z" />

								<!-- yellow side -->
								<path fill="#FBBC04" d="M6 13h5v25H6z" />

								<!-- red top -->
								<path fill="#EA4335" d="M10 7h26c2.2 0 4 1.8 4 4v3H6v-3c0-2.2 1.8-4 4-4z" />

								<!-- white calendar -->
								<rect x="13" y="15" width="24" height="20" rx="1" fill="#fff" />

								<!-- 31 -->
								<text
									x="25"
									y="30"
									text-anchor="middle"
									font-family="Arial"
									font-size="14"
									font-weight="700"
									fill="#4285F4"
								>
									31
								</text>
							</svg>
						</div>

						<!-- Outlook -->
						<div class="calendar-icon" title="Outlook">
							<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
								<!-- background -->
								<defs>
									<linearGradient id="outlookGradient" x1="0" y1="0" x2="1" y2="1">
										<stop offset="0" stop-color="#1689F5" />
										<stop offset="1" stop-color="#5B4FE9" />
									</linearGradient>
								</defs>

								<path
									fill="url(#outlookGradient)"
									d="M8 13h25c2.2 0 4 1.8 4 4v20H8c-2.2 0-4-1.8-4-4V17c0-2.2 1.8-4 4-4z"
								/>

								<!-- envelope -->
								<path fill="#fff" opacity=".95" d="M10 18l14 10 14-10v4L24 32 10 22v-4z" />

								<path fill="#DCEBFF" d="M10 18l14 10 14-10v-2H10v2z" />

								<!-- O -->
								<circle cx="14" cy="28" r="8" fill="#1264B5" />

								<text
									x="14"
									y="32"
									text-anchor="middle"
									font-family="Arial"
									font-size="10"
									font-weight="700"
									fill="#fff"
								>
									O
								</text>
							</svg>
						</div>

						<!-- Yahoo -->
						<div class="calendar-icon" title="Yahoo">
							<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
								<path fill="#5F01D1" d="M5 11h8l7 10 7-10h8L24 29v9h-7v-9L5 11z" />

								<path fill="#5F01D1" d="M31 11h12v6h-5v15h-7V11z" />

								<circle cx="39" cy="35" r="2.5" fill="#5F01D1" />
							</svg>
						</div>
					</div>
				</div>				
				
                <div class="ftr_content text-center">
                    <div class="lgo">
                        <a href="{{ url('/')}}"><img class="logo" src="https://admin.1crapp.com/img/1779197054895525347.png" alt="Logo"></a>
                    </div>
                    <div class="menu_ftrr">
                        Fastest-Simple Yet Powerful Tool for Indian Realtors Business Automation.
                    </div>
                    <div class="crt_arar mt-2">
                        <a href="{{ url('register')}}" target="_blank"><button class="btn  waves-effect waves-light" style="background-color:#ed0c2e; color:#ffffff;">Try 1CRAPP Now For Free !</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<script>
    function openAppointmentVideo(videoURL) {
        document.getElementById("appointmentVideoFrame").src = videoURL;
        document.getElementById("appointmentVideoPopup").style.display = "flex";
    }
    function closeAppointmentVideo() {
        document.getElementById("appointmentVideoPopup").style.display = "none";
        // Stop video when popup closes
        document.getElementById("appointmentVideoFrame").src = "";
    }
</script>

    <script>
        const bookingData = @json($bookingData);
        const serverNow = new Date(bookingData.current_time);
        const today = new Date(serverNow.getFullYear(), serverNow.getMonth(), serverNow.getDate());
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth();
        let selectedDate = '';
        let selectedTime = '';
        let selectedDateDisplay = '';

        function pad(value) {
            return String(value).padStart(2, '0');
        }

        function formatDate(year, month, day) {
            return year + '-' + pad(month + 1) + '-' + pad(day);
        }

        function formatTime(time) {
            if (!time) return '';
            let parts = time.split(':');
            let hour = parseInt(parts[0]);
            let minute = parts[1];
            let ampm = hour >= 12 ? 'PM' : 'AM';
            let displayHour = hour % 12;
            if (displayHour === 0) displayHour = 12;
            return pad(displayHour) + ':' + minute + ' ' + ampm;
        }

        function timeToMinutes(time) {
            let parts = time.split(':');
            return parseInt(parts[0]) * 60 + parseInt(parts[1]);
        }

        function minutesToTime(totalMinutes) {
            let hour = Math.floor(totalMinutes / 60);
            let minute = totalMinutes % 60;
            return pad(hour) + ':' + pad(minute);
        }

        function getNoticeUntil() {
            let notice = parseInt(bookingData.notice_time) || 0;
            if (!notice) return null;
            let current = new Date(bookingData.current_time);
            let type = String(bookingData.notice_time_type || 'minutes').toLowerCase();
            if (type === 'days') {
                current.setDate(current.getDate() + notice);
            } else if (type === 'hours') {
                current.setHours(current.getHours() + notice);
            } else {
                current.setMinutes(current.getMinutes() + notice);
            }
            return current;
        }

        function isSlotBeforeNotice(slotStart, dateString) {
            if (!dateString || !slotStart) return false;
            let noticeUntil = getNoticeUntil();
            if (!noticeUntil) return false;
            let cleanTime = String(slotStart).substring(0, 8);
            let slotDateTime = new Date(
                dateString + 'T' + cleanTime + '+05:30'
            );
            if (isNaN(slotDateTime.getTime())) return false;
            return slotDateTime.getTime() < noticeUntil.getTime();
        }

        function isBeforeToday(dateString) {
            let todayString = formatDate(
                today.getFullYear(),
                today.getMonth(),
                today.getDate()
            );
            return dateString < todayString;
        }

        function isAfterBookingDaysAhead(dateString) {
            let daysAhead = parseInt(bookingData.booking_days_ahead) || 0;
            let maxDate = new Date(
                today.getFullYear(),
                today.getMonth(),
                today.getDate()
            );
            maxDate.setDate(maxDate.getDate() + daysAhead);
            let maxDateString = formatDate(
                maxDate.getFullYear(),
                maxDate.getMonth(),
                maxDate.getDate()
            );
            return dateString > maxDateString;
        }

        function isBlockedDate(dateString) {
            if (
                !bookingData.blocked_dates ||
                !Array.isArray(bookingData.blocked_dates)
            ) {
                return false;
            }
            let normalizedDate = String(dateString).substring(0, 10);
            return bookingData.blocked_dates.some(function(blockedDate) {
                return String(blockedDate).substring(0, 10) === normalizedDate;
            });
        }

        function getWindowsForDate(dateString) {
            if (isBlockedDate(dateString)) {
                return [];
            }
            if (!bookingData.availability_type) {
                return [];
            }
            if (bookingData.availability_type === 'specific') {
                let specificDate =
                    (bookingData.specific_dates || []).find(function(item) {
                        return String(item.date).substring(0, 10) === dateString;
                    });
                if (!specificDate) {
                    return [];
                }
                return specificDate.windows || [];
            }
            if (bookingData.availability_type === 'weekly') {
                let date = new Date(
                    dateString + 'T00:00:00+05:30'
                );
                let dayOfWeek = date.getDay();
                let weeklyDay =
                    (bookingData.weekly_days || []).find(function(item) {
                        return (
                            parseInt(item.day_of_week) === dayOfWeek &&
                            parseInt(item.status) === 1
                        );
                    });
                if (!weeklyDay) {
                    return [];
                }
                return weeklyDay.windows || [];
            }
            return [];
        }

        function isDateAvailable(dateString) {
            if (isBeforeToday(dateString)) {
                return false;
            }
            if (isAfterBookingDaysAhead(dateString)) {
                return false;
            }
            if (isBlockedDate(dateString)) {
                return false;
            }
            let windows = getWindowsForDate(dateString);
            if (!windows.length) {
                return false;
            }
            let duration = parseInt(bookingData.duration) || 30;
            let interval = parseInt(bookingData.interval) || duration;
            let intervalType =
                String(bookingData.interval_type || 'minutes').toLowerCase();
            if (intervalType === 'hours') {
                interval = interval * 60;
            }
            for (let i = 0; i < windows.length; i++) {
                let window = windows[i];
                if (!window.start_time || !window.end_time) {
                    continue;
                }
                let start = timeToMinutes(window.start_time);
                let end = timeToMinutes(window.end_time);
                let current = start;
                while (current + duration <= end) {
                    let slotStart = minutesToTime(current);
                    if (!isSlotBeforeNotice(slotStart, dateString)) {
                        return true;
                    }
                    current = current + duration + interval;
                }
            }
            return false;
        }

        function renderCalendar() {
            let firstDay = new Date(
                currentYear,
                currentMonth,
                1
            );
            let lastDay = new Date(
                currentYear,
                currentMonth + 1,
                0
            );
            let startDay = firstDay.getDay();
            let totalDays = lastDay.getDate();
            let box = document.getElementById('days');
            box.innerHTML = '';
            document.getElementById('monthTitle').textContent =
                firstDay.toLocaleString(
                    'en-US', {
                        month: 'long',
                        year: 'numeric'
                    }
                );
            let previousMonthLastDate =
                new Date(
                    currentYear,
                    currentMonth,
                    0
                ).getDate();
            for (
                let i = startDay - 1; i >= 0; i--
            ) {
                let button =
                    document.createElement('button');
                button.type = 'button';
                button.className = 'day muted';
                button.textContent =
                    previousMonthLastDate - i;
                button.disabled = true;
                box.appendChild(button);
            }
            for (
                let day = 1; day <= totalDays; day++
            ) {
                let button =
                    document.createElement('button');
                button.type = 'button';
                button.className = 'day';
                button.textContent = day;
                let dateString =
                    formatDate(
                        currentYear,
                        currentMonth,
                        day
                    );
                let dateObject =
                    new Date(
                        currentYear,
                        currentMonth,
                        day
                    );
                let todayDate =
                    new Date(
                        today.getFullYear(),
                        today.getMonth(),
                        today.getDate()
                    );
                let isPast =
                    dateObject < todayDate;
                let blocked =
                    isBlockedDate(dateString);
                let available =
                    isDateAvailable(dateString);
                if (
                    isPast ||
                    blocked ||
                    !available
                ) {
                    button.classList.add('disabled');
                    button.disabled = true;
                    if (blocked) {
                        button.classList.add('blocked');
                        button.title = 'This date is blocked';
                    }
                } else {
                    button.onclick = function() {
                        pickDate(
                            button,
                            dateString
                        );
                    };
                }
                if (
                    selectedDate === dateString
                ) {
                    button.classList.add('selected');
                }
                box.appendChild(button);
            }
        }

        function pickDate(button, dateString) {
            document
                .querySelectorAll('.day')
                .forEach(function(item) {
                    item.classList.remove('selected');
                });
            button.classList.add('selected');
            selectedDate = dateString;
            let dateObject = new Date(
                dateString + 'T00:00:00'
            );
            selectedDateDisplay =
                dateObject.toLocaleDateString(
                    'en-US', {
                        weekday: 'long',
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    }
                );
            document.getElementById('sumDate')
                .textContent = selectedDateDisplay;
            document.getElementById('suc_when')
                .textContent = selectedDateDisplay;
            document.getElementById('selected_date')
                .value = dateString;
            selectedTime = '';
            document.getElementById('startTimeText').innerHTML = '';
            document.getElementById('endTimeText').innerHTML = '';
            // Show loading while fetching bookings
            document.getElementById('times').innerHTML =
                '<div class="no-time">Loading available times...</div>';
            // fetchBookedSlots(dateString, function(bookedSlots) {
            //     // Store bookings for the selected date
            //     bookingData.bookedSlots = bookedSlots;
            //     // Now render slots
            //     renderTimeSlots();
            //     checkContinueButton();
            // });
            fetchBookedSlots(dateString, function(data) {
                // Existing appointments
                bookingData.bookedSlots = data.booked_slots || [];
                // Events
                bookingData.eventSlots = data.event_slots || [];
                renderTimeSlots();
                checkContinueButton();
            });
        }

        // function isSlotBooked(dateString, slotStart, slotEnd) {
        //     const bookedSlots = bookingData.bookedSlots || [];
        //     return bookedSlots.some(function(booking) {
        //         const bookedStart = timeToMinutes(
        //             booking.start_time
        //         );
        //         const bookedEnd = timeToMinutes(
        //             booking.end_time
        //         );
        //         const currentStart = timeToMinutes(
        //             slotStart
        //         );
        //         const currentEnd = timeToMinutes(
        //             slotEnd
        //         );
        //         // Check overlapping time
        //         return (
        //             currentStart < bookedEnd &&
        //             currentEnd > bookedStart
        //         );
        //     });
        // }
        function isSlotBooked(dateString, slotStart, slotEnd) {
            const bookedSlots = bookingData.bookedSlots || [];
            const eventSlots = bookingData.eventSlots || [];
            const currentStart = timeToMinutes(slotStart);
            const currentEnd = timeToMinutes(slotEnd);
            // Check appointment bookings
            const appointmentOverlap = bookedSlots.some(function(booking) {
                const bookedStart = timeToMinutes(booking.start_time);
                const bookedEnd = timeToMinutes(booking.end_time);
                return (
                    currentStart < bookedEnd &&
                    currentEnd > bookedStart
                );
            });
            if (appointmentOverlap) {
                return true;
            }
            // Check events
            const eventOverlap = eventSlots.some(function(event) {
                const eventStart = timeToMinutes(event.start_time);
                const eventEnd = timeToMinutes(event.end_time);
                return (
                    currentStart < eventEnd &&
                    currentEnd > eventStart
                );
            });
            return eventOverlap;
        }

        function renderTimeSlots() {
            let container = document.getElementById('times');
            container.innerHTML = '';
            if (!selectedDate) {
                container.innerHTML =
                    '<div class="no-time">Please select a date</div>';
                return;
            }
            let windows = getWindowsForDate(selectedDate);
            if (!windows.length) {
                container.innerHTML =
                    '<div class="no-time">No available time for this date</div>';
                return;
            }
            let duration =
                parseInt(bookingData.duration) || 30;
            let interval =
                parseInt(bookingData.interval) || duration;
            let intervalType =
                String(
                    bookingData.interval_type || 'minutes'
                ).toLowerCase();
            if (intervalType === 'hours') {
                interval = interval * 60;
            }
            windows.forEach(function(window) {
                if (!window.start_time || !window.end_time) {
                    return;
                }
                let start = timeToMinutes(window.start_time);
                let end = timeToMinutes(window.end_time);
                let current = start;
                while (current + duration <= end) {
                    let slotStart = minutesToTime(current);
                    let slotEnd = minutesToTime(
                        current + duration
                    );
                    let beforeNotice =
                        isSlotBeforeNotice(
                            slotStart,
                            selectedDate
                        );
                    let isBooked =
                        isSlotBooked(
                            selectedDate,
                            slotStart,
                            slotEnd
                        );
                    let button =
                        document.createElement('button');
                    button.type = 'button';
                    button.className = 'time';
                    button.dataset.time = slotStart;
                    button.dataset.endTime = slotEnd;
                    button.textContent =
                        formatTime(slotStart) +
                        ' - ' +
                        formatTime(slotEnd);
                    if (beforeNotice) {
                        button.classList.add('disabled');
                        button.disabled = true;
                        button.title =
                            'This time is not available due to notice time';
                    } else if (isBooked) {
                        button.classList.add('disabled');
                        button.disabled = true;
                        button.title =
                            'This time slot is already booked';
                    } else {
                        button.onclick = function() {
                            pickTime(
                                button,
                                slotStart,
                                slotEnd
                            );
                        };
                    }
                    container.appendChild(button);
                    current =
                        current + duration + interval;
                }
            });
            if (!container.children.length) {
                container.innerHTML =
                    '<div class="no-time">No available time slots</div>';
            }
        }

        // function fetchBookedSlots(dateString, callback) {
        //     $.ajax({
        //         url: "{{ route('get-booked-slots') }}",
        //         type: "POST",
        //         data: {
        //             booking_type_id: "{{ (int) $bookingType->id }}",
        //             booking_date: dateString,
        //             _token: "{{ csrf_token() }}"
        //         },
        //         success: function(response) {
        //             if (response.status) {
        //                 callback(response.booked_slots || []);
        //             } else {
        //                 callback([]);
        //             }
        //         },
        //         error: function(xhr) {
        //             console.log(xhr.responseText);
        //             callback([]);
        //         }
        //     });
        // }
        function fetchBookedSlots(dateString, callback) {

            $.ajax({
                url: "{{ route('get-booked-slots') }}",
                type: "POST",
                data: {
                    booking_type_id: "{{ (int) $bookingType->id }}",
                    booking_date: dateString,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status) {
                        callback({
                            booked_slots: response.booked_slots || [],
                            event_slots: response.event_slots || []
                        });
                    } else {
                        callback({
                            booked_slots: [],
                            event_slots: []
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    callback({
                        booked_slots: [],
                        event_slots: []
                    });
                }
            });
        }

        function pickTime(
            button,
            startTime,
            endTime
        ) {
            if (
                isSlotBeforeNotice(
                    startTime,
                    selectedDate
                )
            ) {
                return;
            }
            document
                .querySelectorAll('.time')
                .forEach(function(item) {
                    item.classList.remove('selected');
                });
            button.classList.add('selected');
            selectedTime = startTime;
            document.getElementById('start_time').value = startTime;
            document.getElementById('end_time').value = endTime;
            document.getElementById('startTimeText').textContent = formatTime(startTime);
            document.getElementById('endTimeText').textContent = formatTime(endTime);
            checkContinueButton();
        }

        function checkContinueButton() {
            let button =
                document.getElementById('continueBtn');
            button.disabled = !selectedDate ||
                !selectedTime;
        }

        function changeMonth(value) {
            currentMonth += value;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            selectedDate = '';
            selectedTime = '';
            document.getElementById('sumDate').textContent = 'Select a date';
            // document.getElementById('sumTime').textContent ='Select a time';
            document.getElementById('selected_date').value = '';
            document.getElementById('start_time').value = '';
            document.getElementById('end_time').value = '';
            document.getElementById('startTimeText').innerHTML = '';
            document.getElementById('endTimeText').innerHTML = '';
            document.getElementById('times').innerHTML = '<div class="no-time">Please select a date</div>';
            checkContinueButton();
            renderCalendar();
        }

        function openBooking() {
            if (
                !selectedDate ||
                !selectedTime
            ) {
                alert(
                    'Please select a date and time first.'
                );
                return;
            }
            if (
                isSlotBeforeNotice(
                    selectedTime,
                    selectedDate
                )
            ) {
                alert(
                    'This time is no longer available due to the notice time.'
                );
                return;
            }
            document.getElementById('booking')
                .style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id)
                .style.display = 'none';
        }

        function toggleDesc() {
            let description =
                document.getElementById('desc');
            let button =
                document.querySelector('.link');
            description.classList.toggle('short');
            button.textContent =
                description.classList.contains('short') ?
                'Show more⌄' :
                'Show less⌃';
        }

        function toggleReviews() {
            let more =
                document.getElementById('moreReviews');
            let button =
                document.getElementById('reviewBtn');
            let open =
                more.style.display === 'block';
            more.style.display =
                open ? 'none' : 'block';
            button.textContent =
                open ?
                'Show all reviews⌄' :
                'Show less⌃';
        }
        renderCalendar();
    </script>
    <script>
        $(document).on('submit', '#bookingForm', function(e) {
            e.preventDefault();
            let form = $(this);
            let button = $('#confirmBookingBtn');
            button.prop('disabled', true).text('Processing...');
            $.ajax({
                url: "{{ url('admin/api/save-booking') }}",
                type: "POST",
                data: form.serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.status === true || response.success === true) {
                        // Success
                        document.getElementById('successbooking').style.display = 'flex';
                        // alert(response.message ?? 'Booking created successfully.');
                        // Example:
                        // window.location.href = response.redirect_url;
                        closeModal('booking');
                    } else {
                        alert(response.message ?? 'Unable to create booking.');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let message = '';
                        $.each(errors, function(field, error) {
                            message += error[0] + "\n";
                        });
                        alert(message);
                    } else {
                        alert(
                            xhr.responseJSON?.message ??
                            'Something went wrong. Please try again.'
                        );
                    }
                },
                complete: function() {
                    button.prop('disabled', false).text('Confirm Booking');
                }
            });
        });
    </script>
    <style>
        * {
            box-sizing: border-box
        }
		
		
		
		
		.appointment-video-box {
  display: flex;
  align-items: center;
  gap: 18px;
  background: #eef7ff;
  border: 1px solid #d5eaff;
  border-radius: 10px;
  padding: 10px;
  width: 100%;
  box-sizing: border-box;
}

.appointment-video-thumb {
  position: relative;
  width: 200px;
  min-width: 200px;
  height: 120px;
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  background: #333;
}

.appointment-video-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.play-button {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: #1769e0;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 25px;
  padding-left: 3px;
  box-sizing: border-box;
  border: 3px solid white;
}

.watch-label {
  position: absolute;
  bottom: 8px;
  left: 12px;
  background: rgba(0,0,0,0.75);
  color: white;
  padding: 6px 12px;
  border-radius: 15px;
  font-size: 13px;
  font-weight: 600;
}

.appointment-video-content {
  flex: 1;
}

.appointment-video-content h3 {
  margin: 0 0 8px;
  color: #1455b8;
  font-size: 15px;
  font-weight: 700;
}

.appointment-video-content p {
margin: 0 0 10px;
    color: #555;
    font-size: 13px;
    line-height: 18px;
}

.video-benefits {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.video-benefits span {
  color: #333;
  font-size: 12px;
}

.video-benefits span:first-letter {
  color: #1769e0;
}

/* Popup */
.appointment-video-popup {
  display: none;
  position: fixed;
  z-index: 99999;
  inset: 0;
  background: rgba(0,0,0,0.75);
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.video-popup-content {
  position: relative;
  width: 90%;
  max-width: 850px;
  background: #fff;
  border-radius: 12px;
  padding: 15px;
}

.video-close {
  position: absolute;
  right: -12px;
  top: -12px;
  width: 35px;
  height: 35px;
  border: none;
  border-radius: 50%;
  background: #fff;
  color: #222;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.video-container {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%;
  height: 0;
}

.video-container iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  border: 0;
  border-radius: 8px;
}

/* Mobile */
@media (max-width: 600px) {
  .appointment-video-box {
    flex-direction: column;
    align-items: stretch;
  }

  .appointment-video-thumb {
    width: 100%;
    min-width: 100%;
  }

  .appointment-video-content h3 {
    font-size: 18px;
  }

  .video-benefits {
    gap: 10px;
    flex-direction: column;
  }
}
		
		
		

        body {
            margin: 0;
            background: #f5f7fa;
            color: #17233d;
        }						
        .both_areeea {			
            display: flex;			
            width: 100%;			
            max-width: 1260px;			
            margin: 40px auto;			
            gap:20px;		
        }		
        .both_areeea .card.left {			
            width: 50%;		
        }

		.both_areeea .card.left h1 {
			font-size: 18px;
			line-height: 1.15;
			font-weight: 600;
			margin: 18px 0 14px;
		}
		.both_areeea .card.left .badges .badge {
			background: #b8bfcb;
			border-radius: 20px;
			padding: 8px 10px;
			font-size: 10px;
			font-weight: 600;
		}
		
        .both_areeea .card.right {			
            width: 50%;		
        }		
        .overlay#booking .modal {			    
            padding: 20px 15px;				
            margin: auto;				
            display: inline-block;				
            height: max-content;		
        }		
        .overlay#booking .modal .mh {			
            align-items: center;		
        }		
        .overlay#booking .modal .mh h2 {			
            margin: 0;			
            font-size: 17px;			
            font-weight:700;		
        }		
        .overlay#booking .modal .mh button.close {			
            opacity: 1;		
        }				
        .overlay#booking .modal .multipal_tm {			
            border: #d9d9d9 solid 1px;			
            padding: 0 10px;			
            border-radius: 6px;			
            margin: 10px 0;		
        }		
        .overlay#booking .modal .ocf-wrapper {			
            max-width: 100%;			
            padding:15px;		
        }				
        .overlay#booking .modal .summary {			
            padding: 0;		
        }

.overlay#booking .automantiocnss {
    max-height: 400px;
    overflow: auto;
}
.overlay#successbooking .modal {
    padding: 20px 15px;				
            margin: auto;				
            display: inline-block;				
            height: max-content;	
}
.overlay#successbooking .modal .mh h2 {
    margin: 0;
    font-size: 20px;
}
.overlay#successbooking .modal .mh button.close {
    opacity: 1;
}
.overlay#successbooking .modal .modal-body {
    text-align: center;
	padding-bottom:0;
}
.overlay#successbooking .modal .modal-body .booking-box {
    margin-bottom: 15px;
}
.overlay#successbooking .modal .modal-body .booking-box .info-row {
    font-size: 14px;
    margin-bottom: 8px;
    display: flex;
    gap: 7px;
}
.overlay#successbooking .modal .modal-body .booking-box .info-row svg {
    width: 18px;
    height: 18px;
}
.overlay#successbooking .modal .modal-body .ftr_content.text-center {
    background: #000;
    padding: 15px;
    color: #fff;
	margin-top:25px;
}
.overlay#successbooking .modal .modal-body .ftr_content.text-center .menu_ftrr {
    font-size: 14px;
    margin-bottom: 10px;
    margin-top: 10px;
}

.overlay#successbooking .modal .modal-body .ftr_content.text-center .lgo img.logo {
    height: 45px;
}




.overlay#successbooking .modal .modal-body .calendar-box {
    width: auto;
    padding: 0;
    text-align: center;
    margin-top: 30px;
}

.overlay#successbooking .modal .modal-body .calendar-box .action-buttons {
    display: flex;
    justify-content:center;
    gap: 8px;
    margin-bottom: 10px;
}

.overlay#successbooking .modal .modal-body .calendar-box .action-btn {
    border: 0;
    border-radius: 14px;
    height: 32px;
    padding: 0 18px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}

.overlay#successbooking .modal .modal-body .calendar-box .reschedule {
    background: #f1f1f1;
    color: #555;
}

.overlay#successbooking .modal .modal-body .calendar-box .cancel {
    background: #ffe7ea;
    color: #ed6878;
}

.overlay#successbooking .modal .modal-body .calendar-box .add-title {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    margin-bottom: 7px;
}

.overlay#successbooking .modal .modal-body .calendar-box .divider {
    height: 1px;
    background: #e5e5e5;
    margin: 0 10px 10px;
}

.overlay#successbooking .modal .modal-body .calendar-box .calendar-icons {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0 20px;
}

.overlay#successbooking .modal .modal-body .calendar-box .calendar-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.overlay#successbooking .modal .modal-body .calendar-box .calendar-icon svg {
    width: 40px;
    height: 40px;
}





.both_areeea .card.left .proof {
    display: flex;
    justify-content: space-between;
}
.proof .avatar-group {
    display: flex;
    align-items: center;
}

.proof .avatar-group .avatar {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    margin-left: -7px;
    background: #ddd;
}

.proof .avatar-group .avatar:first-child {
    margin-left: 0;
}

.proof .avatar-group .more {
    height: 30px;
    width: 30px;
    padding: 0 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: #e8f1ff;
    color: #000000;
    font-size: 11px;
    font-weight: 700;
    border: 2px solid #fff;
    margin-left: -7px;
}



        .page {
            max-width: 1380px;
            margin: auto;
            padding: 18px 22px 0
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px
        }

        .card {
            background: #fff;
            border: 1px solid #e7ebf0;
            border-radius: 16px;
            box-shadow: 0 5px 22px #14233c0d
        }

        .left {
            padding: 24px
        }

        .profile {
            display: flex;
            gap: 13px;
            align-items: center
        }

        .profile img {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            object-fit: cover
        }

        .name {
            font-weight: bold;
            font-size: 15px
        }

        .verified {
            background: #1976f3;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 10px
        }

        .rating {
            font-size: 12px;
            margin-top: 5px
        }

        .stars {
            color: #f5a623;
            letter-spacing: 1px
        }

        .rating span:last-child {
            color: #68758a;
            margin-left: 5px
        }

        h1 {
            font-size: 28px;
            line-height: 1.15;
            margin: 18px 0 14px
        }

        .badges {
            display: flex;
            gap: 8px;
            flex-wrap: wrap
        }

        .badge {
            background: #f1f6ff;
            border-radius: 20px;
            padding: 8px 13px;
            font-size: 12px
        }

        .desc {
            line-height: 1.6;
            color: #293850;
            margin-top: 18px
        }

        .short {
            max-height: 74px;
            overflow: hidden
        }

        .link {
            border: 0;
            background: none;
            color: #1764d9;
            font-weight: bold;
            padding: 6px 0;
            cursor: pointer
        }

        .benefits {
            border-block: 1px solid #edf0f4;
            margin: 16px 0;
            padding: 18px 0;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            text-align: center;
            gap: 8px
        }

        .bi {
            font-size: 20px;
            background: #eef5ff;
            color: #1764d9;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            margin: auto
        }

        .bt {
            font-size: 11px;
            font-weight: bold;
            margin-top: 7px
        }

        .bs {
            font-size: 10px;
            color: #7a8698;
            margin-top: 3px
        }

        .reviews {
            border: 1px solid #e5eaf0;
            border-radius: 12px;
            overflow: hidden
        }

        .rh {
            padding: 14px 15px;
            display: flex;
            justify-content: space-between
        }

        .review {
            padding: 13px 15px;
            border-top: 1px solid #edf0f4
        }

        .person {
            display: flex;
            gap: 9px;
            align-items: center
        }

        .av {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #214b86;
            color: white;
            font-weight: bold
        }

        .date {
            font-size: 10px;
            color: #8994a4
        }

        .rt {
            font-size: 12px;
            line-height: 1.5;
            margin-top: 7px
        }

        .tag {
            font-size: 9px;
            background: #f3f6fa;
            padding: 4px 7px;
            border-radius: 10px;
            color: #6d798b
        }

        .more {
            display: none
        }

        .all {
            width: 100%;
            padding: 11px;
            border: 0;
            border-top: 1px solid #edf0f4;
            background: #fff;
            color: #1764d9;
            font-weight: bold;
            cursor: pointer
        }

        .proof {
            margin-top: 13px;
            background: #fff8ec;
            border: 1px solid #ffe5bd;
            border-radius: 11px;
            padding: 12px;
            font-size: 11px
        }

        .right {
            overflow: hidden
        }

        .tz {
            padding: 20px 24px;
            border-bottom: 1px solid #edf0f4;
            color: {{ $bookingType->calendar_bg_color }};
        }

        .tz select {
            border: 0;
            background: transparent;
            color: {{ $bookingType->calendar_bg_color }};
        }

        .cal {
            padding: 22px 25px
        }

        .heading {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 17px
        }

        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px
        }

        .arrow {
            border: 0;
            background: none;
            font-size: 24px;
            color: #738094;
            cursor: pointer
        }

        .week,
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center
        }

        .week {
            font-size: 10px;
            color: #778397;
            margin-bottom: 7px
        }

        .day {
            height: 39px;
            border: 0;
            background: #fff;
            border-radius: 8px;
            cursor: pointer
        }

        .day:hover {
            background: #eef5ff
        }

        .day.muted {
            color: #b5bcc5
        }

        .day.selected {
            background: {{ $bookingType->calendar_bg_color }};
            color: #fff;
            border-radius: 50%;
            font-weight: bold
        }

        .timehead {
            font-size: 16px;
            font-weight: bold;
            margin: 25px 0 12px
        }

        .times {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px
        }

        .time {
            height: 43px;
            border: 1px solid #e0e6ee;
            background: #fff;
            border-radius: 8px;
            cursor: pointer
        }

        .time.selected {
            border-color: {{ $bookingType->calendar_bg_color }};
            background: #fff2f2;
            color: {{ $bookingType->calendar_bg_color }};
            font-weight: bold
        }

        .continue {
            width: 100%;
            height: 50px;
            margin-top: 18px;
            background: {{ $bookingType->calendar_bg_color }};
            color: #fff;
            border: 0;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer
        }

        .secure {
            text-align: center;
            color: #7d8898;
            font-size: 11px;
            margin-top: 13px
        }

        .footer {
			background: #143a91;
			color: #fff;
			border-radius: 10px;
			padding: 20px 30px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 20px;
			max-width: 1260px;
			margin: 0 auto;
        }

        .flogo {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            background: white;
            color: #143a91;
            display: grid;
            place-items: center;
            font-weight: bold
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .brand small {
            display: block;
            opacity: .8;
            font-size: 10px;
            margin-top: 3px
        }

        .ftext {
            text-align: center
        }

        .ftext strong {
            font-size: 16px
        }

        .ftext div {
            font-size: 11px;
            opacity: .85;
            margin-top: 4px
        }

        .fbtn {
            background: white;
            color: #1764d9;
            border: 0;
            border-radius: 7px;
            padding: 11px 20px;
            font-weight: bold;
            cursor: pointer
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: #0c182c73;
            z-index: 99;
            align-items: center;
            justify-content: center;
            padding: 15px
        }

        .modal {
            width: 100%;
            max-width: 560px;
            background: #fff;
            border-radius: 14px;
            padding: 24px
        }

        .mh {
            display: flex;
            justify-content: space-between
        }

        .close {
            border: 0;
            background: none;
            font-size: 25px;
            cursor: pointer
        }

        .summary {
            background: #f6f8fb;
            padding: 12px;
            border-radius: 8px;
            margin: 15px 0;
            font-size: 12px
        }

        .fg {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .field {
            margin-bottom: 12px
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 6px
        }

        .field input,
        .field textarea {
            width: 100%;
            height: 40px;
            border: 1px solid #dbe1e9;
            border-radius: 7px;
            padding: 9px;
            font-size: 11px
        }

        .field textarea {
            height: 75px
        }

        .submit {
            width: 100%;
            height: 45px;
            background: {{ $bookingType->calendar_bg_color }};
            color: white;
            border: 0;
            border-radius: 7px;
            font-weight: bold
        }

        .reviewmodal {
            max-height: 85vh;
            overflow: auto
        }

        .day.blocked {
            background: #f5f5f5;
            color: #999;
            text-decoration: line-through;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .day.blocked:hover {
            background: #f5f5f5;
            color: #999;
        }

        @media(max-width:900px) {
            .grid {
                grid-template-columns: 1fr
            }

            .right {
                order: 1
            }

            .left {
                order: 2
            }

            .footer {
                flex-wrap: wrap;
                justify-content: center
            }

            .ftext {
                width: 100%;
                order: 3
            }
        }

        @media(max-width:600px) {
			
			.both_areeea {display: grid; margin: 20px auto; padding: 0 15px;}
			.both_areeea .card.left {width: 100%;}
			.both_areeea .card.right {width: 100%;}
			
			
            .page {
                padding: 10px
            }

            .left {
                padding: 18px
            }

            h1 {
                font-size: 23px
            }

            .benefits {
                grid-template-columns: 1fr 1fr
            }

            .cal {
                padding: 18px 15px
            }

            .times {
                grid-template-columns: 1fr 1fr
            }

            .fg {
                grid-template-columns: 1fr
            }

            .footer {
                padding: 18px;
				margin:0 15px;
            }
			.both_areeea .card.left .proof {
				display: grid;
				gap: 10px;
			}
			.footer .fbtn {
				border-radius: 5px;
				padding: 8px 15px;
				font-size: 12px;
			}
			#times .time {
				height: 36px;
				border-radius: 6px;
				font-size: 12px;
				font-weight: 600;
			}

            .ftext {
                margin-top: 5px
            }
        }

        .sucsses_box {
            text-align: center;
            margin-bottom: 20px;
        }

        .sucsses_box .success-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .sucsses_box .success-icon svg {
            stroke: #4CAF50;
        }

        .sucsses_box p.sub-text {
            margin: 0 0 5px;
            font-size: 15px;
        }
        /* Disabled calendar date */
        .day.disabled {
            position: relative;
            opacity: 0.45;
            /* background: #f1f1f1 !important; */
            color: #999 !important;
            cursor: not-allowed !important;
            text-decoration: line-through;
        }

        /* Red cross over disabled date */
        .day.disabled::after {
            /* content: "×"; */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* color: #dc3545; */
            font-size: 26px;
            font-weight: 900;
            line-height: 1;
            pointer-events: none;
        }

        /* Disabled slot */
       .time.disabled {
            position: relative;
            opacity: 0.5;
            /* background: #f1f1f1 !important; */
            color: #999 !important;
            border: 1px solid #ddd !important;
            cursor: not-allowed !important;
            text-decoration: line-through;
            overflow: hidden;
        }

        .time.disabled::after {
            content: "";
            position: absolute;
            width: 130%;
            height: 2px;
            /* background: #dc3545; */
            top: 50%;
            left: -15%;
            transform: rotate(-15deg);
            pointer-events: none;
        }
    </style>

    @if($cms->custom_footer == 1)
        @include('front.custom-layout.footer')
    @else
        @include('front.layouts.footer')
    @endif
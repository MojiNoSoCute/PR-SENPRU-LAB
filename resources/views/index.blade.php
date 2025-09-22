<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-header {
            background-color: #2c3e50;
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .hero-section {
            background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%);
            color: white;
            padding: 80px 0;
            position: relative;
        }

        .hero-section::before {
            /* show a computer icon inside a rounded badge */
            content: '💻';
            position: absolute;
            top: 24px;
            right: 24px;
            width: 96px;
            height: 96px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.12);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .btn-guide {
            background-color: white;
            color: #6c5ce7;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-guide:hover {
            background-color: #f8f9fa;
            color: #5f3dc4;
            transform: translateY(-2px);
        }

        .content-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 2rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #ffd32a 0%, #6c5ce7 100%);
            border-radius: 2px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
            border: 1px solid #e9ecef;
        }

        .info-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .info-item {
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .info-label {
            font-weight: 600;
            color: #2c3e50;
        }

        .info-value {
            color: #6c757d;
        }

        .faculty-card {
            text-align: center;
        }

        .faculty-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #6c757d;
        }

        .faculty-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .faculty-position {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
            transition: opacity 0.3s ease;
        }

        @media (max-width: 768px) {
            .video-container {
                margin: 0 -15px 1rem -15px;
                border-radius: 0;
            }

            .video-container iframe {
                border-radius: 0;
            }
        }



        .video-fallback {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: white;
            text-align: center;
        }

        .fallback-content {
            padding: 20px;
        }

        .video-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .video-fallback h4 {
            margin-bottom: 0.5rem;
            color: white;
        }

        .video-fallback p {
            margin: 0;
            opacity: 0.9;
        }

        .video-fallback a {
            color: #ffd32a;
            text-decoration: underline;
        }

        .activity-date {
            background-color: #6c5ce7;
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }

        .research-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .research-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .research-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .research-date {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .research-description {
            color: #495057;
        }
    </style>
</head>

<body>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <span>ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</span>
                </div>
                <div class="col-md-4 text-end">
                    @auth
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button class="auth-btn secondary" type="submit">Logout</button>
                    </form>
                    @else
                    <a class="auth-btn" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="hero-title">{{ $program->program_name_th ?? 'ยังไม่ได้ตั้งค่าหลักสูตร' }}</h1>
                    <h2 class="hero-subtitle">{{ $program->program_name_en ?? '' }}</h2>
                    <p class="hero-description">
                        หลักสูตรวิศวกรรมซอฟต์แวร์ สาขาวิชาวิศวกรรมซอฟต์แวร์
                    </p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap">
                        <button class="btn btn-guide">คู่มือหลักสูตร</button>
                        @auth
                        <a href="{{ route('program.edit') }}" class="btn btn-guide" style="background:rgba(255,255,255,0.12);color:#fff">แก้ไขหลักสูตร</a>
                        @endauth
                    </div>
                    @if(isset($updatedAt))
                    <div style="margin-top:12px;color:rgba(255,255,255,0.9)">อัปเดตล่าสุด: {{ $updatedAt->format('Y-m-d H:i') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <h2 class="section-title">ภาพรวมหลักสูตร</h2>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ข้อมูลหลักสูตร</h3>

                        <div class="info-item">
                            <span class="info-label">ชื่อปริญญา (ไทย):</span>
                            <span class="info-value">{{ $program->degree_th ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ชื่อปริญญา (อังกฤษ):</span>
                            <span class="info-value">{{ $program->degree_en ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">จำนวนหน่วยกิตที่ต้องเรียน:</span>
                            <span class="info-value">{{ $program->credits_required ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">รายละเอียดการศึกษา</h3>

                        <div class="info-item">
                            <span class="info-label">ภาษาที่ใช้ในการสอน:</span>
                            <span class="info-value">{{ $program->language_th ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ค่าลงทะเบียนต่อปี:</span>
                            <span class="info-value">{{ $program->tuition_fee ? $program->tuition_fee . ' บาท' : '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">หลักสูตรปี:</span>
                            <span class="info-value">{{ $program->curriculum_year ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($featuredVideo)
    <section class="content-section" style="background-color: #fff">
        <div class="container">
            <h2 class="section-title">วิดีโอแนะนำหลักสูตร</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="video-container" id="video-container">
                        <iframe
                            src="{{ $featuredVideo->url }}?autoplay=0&mute=0&controls=1&showinfo=1&rel=0&modestbranding=1&fs=1"
                            frameborder="0"
                            allowfullscreen
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            loading="lazy"
                            title="{{ $featuredVideo->title_th }}"
                            referrerpolicy="strict-origin-when-cross-origin"
                            sandbox="allow-scripts allow-same-origin allow-presentation"
                            onerror="handleVideoError()"></iframe>
                        <div class="video-fallback" id="video-fallback" style="display: none;">
                            <div class="fallback-content">
                                <i class="video-icon">🎥</i>
                                <h4>ไม่สามารถโหลดวิดีโอได้</h4>
                                <p>กรุณาดูวิดีโอได้ที่ <a href="{{ preg_replace('/\/embed\/([^?]+)/', '/watch?v=$1', $featuredVideo->url) }}" target="_blank" rel="noopener">YouTube</a></p>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3">{{ $featuredVideo->title_th }}</h3>
                    <p>{{ $featuredVideo->description_th }}</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($careerOpportunities->count() > 0)
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">อาชีพหลังสำเร็จการศึกษา</h2>
            <div class="row g-4">
                @foreach($careerOpportunities as $opportunity)
                <div class="col-lg-4">
                    <div class="info-card">
                        <h3 class="info-title">{{ $opportunity->title_th }}</h3>
                        <p>{{ $opportunity->description_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($facultyMembers->count() > 0)
    <section class="content-section" style="background-color: #fff">
        <div class="container">
            <h2 class="section-title">อาจารย์ประจำหลักสูตร</h2>
            <div class="row g-4">
                @foreach($facultyMembers as $faculty)
                <div class="col-lg-4">
                    <div class="info-card faculty-card">
                        <div class="faculty-img">👤</div>
                        <div class="faculty-name">{{ $faculty->name_th }}</div>
                        <div class="faculty-position">{{ $faculty->position_th }}</div>
                        <p>{{ $faculty->biography_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            @if($facultyMembers->first() && $facultyMembers->first()->research->count() > 0)
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <h3 class="section-title">ผลงานวิจัยของอาจารย์</h3>
                    @foreach($facultyMembers->first()->research as $research)
                    <div class="research-item">
                        <div class="research-title">{{ $research->title_th }}</div>
                        @if($research->publication_date)
                        <div class="research-date">เผยแพร่เมื่อ: {{ $research->publication_date->format('d/m/Y') }}</div>
                        @endif
                        <div class="research-description">{{ $research->description_th }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    @if($laboratories->count() > 0)
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">ห้องปฏิบัติการ</h2>
            <div class="row g-4">
                @foreach($laboratories as $lab)
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">{{ $lab->name_th }}</h3>
                        <p>{{ $lab->description_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($activities->count() > 0)
    <section class="content-section" style="background-color: #fff">
        <div class="container">
            <h2 class="section-title">กิจกรรมเด่นของนักศึกษา</h2>
            <div class="row g-4">
                @foreach($activities as $activity)
                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="activity-date">
                            @if($activity->activity_date)
                            {{ $activity->activity_date->format('d/m/Y') }}
                            @else
                            ไม่ระบุวันที่
                            @endif
                        </div>
                        <h3 class="info-title">{{ $activity->title_th }}</h3>
                        <p>{{ $activity->description_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($studentWorks->count() > 0)
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">ผลงานนักศึกษา</h2>
            <div class="row g-4">
                @foreach($studentWorks as $work)
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">{{ $work->title_th }}</h3>
                        <p>{{ $work->description_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($alumni->count() > 0)
    <section class="content-section" style="background-color: #fff">
        <div class="container">
            <h2 class="section-title">ศิษย์เก่า</h2>
            <div class="row g-4">
                @foreach($alumni as $alumnus)
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">{{ $alumnus->name_th }}</h3>
                        @if($alumnus->position_th)
                        <div class="faculty-position">{{ $alumnus->position_th }}</div>
                        @endif
                        @if($alumnus->company_th)
                        <div><strong>บริษัท:</strong> {{ $alumnus->company_th }}</div>
                        @endif
                        <p>{{ $alumnus->biography_th }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleVideoError() {
            console.log('Video failed to load, showing fallback');
            const fallback = document.getElementById('video-fallback');
            const iframe = document.querySelector('#video-container iframe');
            if (fallback) {
                fallback.style.display = 'flex';
            }
            if (iframe) {
                iframe.style.display = 'none';
            }
        }

        function handleVideoLoad() {
            console.log('Video loaded successfully');
            const fallback = document.getElementById('video-fallback');
            if (fallback) {
                fallback.style.display = 'none';
            }
        }

        // Enhanced video loading check
        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.querySelector('#video-container iframe');
            if (iframe) {
                let hasLoaded = false;

                // Handle successful load
                iframe.addEventListener('load', function() {
                    hasLoaded = true;
                    handleVideoLoad();
                });

                // Handle load error  
                iframe.addEventListener('error', function() {
                    console.log('Iframe error event triggered');
                    handleVideoError();
                });

                // Fallback timeout - if video hasn't loaded in 10 seconds
                setTimeout(function() {
                    if (!hasLoaded) {
                        console.log('Video load timeout, showing fallback');
                        handleVideoError();
                    }
                }, 10000);

                // Additional check for blocked iframes
                setTimeout(function() {
                    try {
                        const rect = iframe.getBoundingClientRect();
                        if (rect.height === 0 || rect.width === 0) {
                            console.log('Video iframe has no dimensions, likely blocked');
                            handleVideoError();
                        }
                    } catch (e) {
                        console.log('Error checking iframe dimensions:', e);
                    }
                }, 5000);
            }
        });
    </script>
</body>

</html>
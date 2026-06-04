<!DOCTYPE html>
<html lang="th" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เงินทันใจ | สินเชื่อด่วน อนุมัติไว สมัครง่าย</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600;700;800&family=IBM+Plex+Sans+Thai:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        /* Custom CSS สำหรับ Animation และ Webkit pseudo-elements */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-26px);
            }
        }

        .animate-float-1 {
            animation: float 9s ease-in-out infinite;
        }

        .animate-float-2 {
            animation: float 11s ease-in-out infinite reverse;
        }

        @keyframes ping-custom {
            0% {
                box-shadow: 0 0 0 0 rgba(25, 169, 116, 0.55);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(25, 169, 116, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(25, 169, 116, 0);
            }
        }

        .animate-ping-custom {
            animation: ping-custom 1.8s infinite;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 1.625rem;
            height: 1.625rem;
            border-radius: 50%;
            background: #ffffff;
            border: 5px solid #19a974;
            cursor: pointer;
            box-shadow: 0 10px 40px rgba(6, 40, 29, 0.10);
        }

        summary::-webkit-details-marker {
            display: none;
        }
    </style>
    @fluxAppearance
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-thai text-brand-ink bg-brand-paper antialiased">

    @yield('content')

    <script>
        function upd() {
            const v = +document.getElementById('rng').value;
            document.getElementById('amt').innerHTML = v.toLocaleString() + ' <small class="text-[1rem] text-brand-600 font-medium">บาท</small>';
            const pay = Math.round((v * 1.11) / 12 / 10) * 10;
            document.getElementById('pay').textContent = '฿' + pay.toLocaleString() + ' / เดือน*';
            const pct = ((v - 5000) / 45000) * 100;
            document.getElementById('rng').style.background = `linear-gradient(90deg, #19a974 ${pct}%, #d6f5e6 ${pct}%)`;
        }
        function go(el) {
            alert('นี่คือปุ่มตัวอย่าง — ในเว็บจริง ปุ่มนี้จะลิงก์ไปยังหน้าสมัครของผู้ให้บริการ (Affiliate link)');
            return false;
        }
        upd();
    </script>
    @livewireScripts
    @fluxScripts
</body>

</html>
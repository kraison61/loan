<header class="relative py-18 md:py-20 overflow-hidden">
    <div
        class="absolute inset-0 z-[-2] bg-[radial-gradient(900px_500px_at_80%_-10%,#d6f5e6,transparent_60%),radial-gradient(700px_600px_at_10%_110%,#e3f9ec,transparent_55%)]">
    </div>
    <span
        class="absolute w-80 h-80 rounded-full bg-brand-300 blur-xl opacity-50 z-[-1] -top-15 -right-10 animate-float-1"></span>
    <span
        class="absolute w-55 h-55 rounded-full bg-limeaccent blur-xl opacity-[0.28] z-[-1] bottom-[-40px] left-[6%] animate-float-2"></span>

    <div class="max-w-280 w-[92vw] mx-auto grid grid-cols-1 lg:grid-cols-[1.15fr_.85fr] gap-12 items-center">
        <div>
            <span
                class="inline-flex items-center gap-2 bg-white border border-brand-100 text-brand-700 font-semibold text-[0.9rem] py-2 px-4 rounded-full shadow-soft mb-[55px] mb-6">
                <span class="w-2.25 h-2.25 rounded-full bg-brand-500 animate-ping-custom"></span>
                เปรียบเทียบสินเชื่อด่วน อัปเดตปี 2026
            </span>
            <h1
                class="font-kanit text-[2.4rem] md:text-[3.7rem] font-extrabold text-brand-900 leading-[1.18] tracking-tight">
                เงินด่วน อนุมัติไว<br><span class="text-brand-500 relative z-10">สมัครง่าย<span
                        class="absolute left-0 right-0 bottom-[0.05em] h-[0.32em] bg-limeaccent/55 z-[-1] rounded-sm"></span></span>
                ใช้แค่บัตรประชาชน
            </h1>
            <p class="text-[1.18rem] text-brand-800 my-6 max-w-[34ch]">รวมสินเชื่อที่อนุมัติเร็วที่สุด คัดมาให้แล้ว
                3 ตัว เทียบวงเงิน ความเร็ว และดอกเบี้ยได้ในที่เดียว</p>
            <div class="flex flex-wrap items-center gap-4">
                <a href="#options"
                    class="font-kanit font-bold inline-flex items-center gap-2 rounded-full transition-all duration-180 bg-gradient-to-br from-limeaccent to-limeaccent-dark text-brand-900 text-[1.15rem] py-4 px-9 shadow-[0_8px_24px_rgba(143,214,31,0.45)] hover:-translate-y-1 hover:scale-[1.02] hover:shadow-[0_14px_34px_rgba(143,214,31,0.6)]">ดูสินเชื่อที่อนุมัติไว
                    →</a>
                <a href="#how"
                    class="font-kanit font-semibold inline-flex items-center gap-2 rounded-full transition-all duration-180 bg-white text-brand-700 border-2 border-brand-100 text-[1rem] py-3.5 px-6 hover:border-brand-400 hover:-translate-y-0.5">สมัครยังไง?</a>

            </div>
            <div class="mt-6 text-[0.9rem] text-brand-700 flex flex-wrap gap-x-6 gap-y-2">
                <span class="flex items-center gap-1.5 font-medium">
                    <svg class="w-4.5 h-4.5 text-brand-500" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" />
                    </svg> ไม่มีค่าใช้จ่ายในการเปรียบเทียบ
                </span>
                <span class="flex items-center gap-1.5 font-medium">
                    <svg class="w-4.5 h-4.5 text-brand-500" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" />
                    </svg> ข้อมูลปลอดภัย เข้ารหัส
                </span>
            </div>
        </div>

        <div
            class="bg-white rounded-[26px] p-7 shadow-pop border border-brand-100 relative transform transition-all duration-500">
            <div class="text-[0.85rem] text-brand-600 font-semibold">ลองเลือกวงเงินที่ต้องการ</div>
            <div class="font-kanit font-extrabold text-[2.6rem] text-brand-900 leading-[1.1] mt-1" id="amt">20,000
                <small class="text-[1rem] text-brand-600 font-medium">บาท</small>
            </div>

            <input class="appearance-none w-full h-2 rounded-full my-4 cursor-pointer" type="range" min="5000"
                max="50000" step="1000" value="20000" id="rng" oninput="upd()"
                style="background: linear-gradient(90deg, #19a974 55%, #d6f5e6 55%)">

            <div class="flex justify-between text-[0.82rem] text-brand-700"><span>5,000</span><span>50,000</span>
            </div>
            <div class="mt-5 bg-brand-50 rounded-xl p-4 flex justify-between items-center">
                <span class="text-brand-ink/80">ผ่อนเริ่มต้นประมาณ</span>
                <b class="font-kanit text-brand-700 text-lg" id="pay">฿1,850 / เดือน*</b>
            </div>
            <a href="#options"
                class="w-full text-center font-kanit font-bold inline-flex items-center justify-center gap-2 rounded-full transition-all duration-180 bg-gradient-to-br from-limeaccent to-limeaccent-dark text-brand-900 text-[1.15rem] py-4 px-9 shadow-[0_8px_24px_rgba(143,214,31,0.45)] hover:-translate-y-1 hover:shadow-[0_14px_34px_rgba(143,214,31,0.6)] mt-4">หาสินเชื่อที่ใช่
                →</a>
            <p class="text-[0.75rem] text-brand-600 mt-3 text-center">*ตัวเลขประมาณการเพื่อแสดงผลเท่านั้น
                อัตราจริงขึ้นกับผู้ให้บริการ</p>
        </div>
    </div>
</header>
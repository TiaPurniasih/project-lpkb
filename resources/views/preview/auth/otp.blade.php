@extends('layouts.auth')

@section('contents')
<div class="min-h-screen flex flex-col lg:flex-row bg-white">
    <!-- Left Side - Form Section -->
    <div class="flex-1 flex flex-col justify-center px-6 sm:px-8 lg:px-12 py-8 lg:py-12">
        <div class="mx-auto w-full max-w-lg">
            <!-- Header -->
            <div class="mb-16 text-center">
                <h1 class="text-6xl font-bold text-red-600 mb-2">SIOPKB</h1>
                <p class="text-xl text-red-600">Sistem Izin Operasional Pendidikan Keagamaan Buddha</p>
            </div>

            <!-- Form Title -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Masukkan Kode OTP Anda</h2>
                <p class="text-sm text-gray-600">Kami telah mengirimkan kode verifikasi ke email Anda. Silakan masukkan untuk melanjutkan.</p>
            </div>

            <!-- Form -->
            <form method="POST" action="#" id="otp-form">
                @csrf
                <div class="space-y-6">
                    <!-- OTP Input Section -->
                    <div class="text-center">
                        <label class="block text-sm font-medium text-gray-600 mb-4">
                            Masukkan 6 digit untuk melanjutkan
                        </label>
                        
                        <!-- OTP Input Boxes -->
                        <div class="flex gap-3 justify-center">
                            <input type="text" 
                                name="otp_1" 
                                id="otp_1"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                            <input type="text" 
                                name="otp_2" 
                                id="otp_2"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                            <input type="text" 
                                name="otp_3" 
                                id="otp_3"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                            <input type="text" 
                                name="otp_4" 
                                id="otp_4"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                            <input type="text" 
                                name="otp_5" 
                                id="otp_5"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                            <input type="text" 
                                name="otp_6" 
                                id="otp_6"
                                maxlength="1" 
                                pattern="[0-9]"
                                class="w-14 h-14 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none bg-white"
                                autocomplete="off">
                        </div>
                    </div>

                    <!-- Verify Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                            Verifikasi
                        </button>
                    </div>

                    <!-- Resend Link -->
                    <div class="text-center pt-2">
                        <p class="text-sm text-gray-600">
                            Tidak menerima kode? 
                            <a href="#" class="text-blue-600 hover:text-blue-700 underline">Kirim Ulang</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Background Color Only -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#faeae8]"></div>
</div>

<script>
    // Auto-focus next input on input
    document.querySelectorAll('[id^="otp_"]').forEach((input, index, inputs) => {
        input.addEventListener('input', function(e) {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');
            
            // Move to next input if value entered
            if (this.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        // Handle backspace to go to previous input
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                inputs[index - 1].focus();
            }
        });

        // Handle paste
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);
            pastedData.split('').forEach((char, i) => {
                if (inputs[index + i]) {
                    inputs[index + i].value = char;
                }
            });
            if (inputs[index + pastedData.length - 1]) {
                inputs[index + pastedData.length - 1].focus();
            }
        });
    });
</script>
@endsection

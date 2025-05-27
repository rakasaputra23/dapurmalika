<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Dapur Malika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#ffcc80',
                            DEFAULT: '#ff9800',
                            dark: '#ff6f00',
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'fade-in-delayed': 'fadeIn 1.5s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-in-out',
                    }
                }
            }
        }

        function toggleMenu() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        .animate-fade-in-delayed {
            animation: fadeIn 1.5s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-in-out;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">

    @include('partials.navbar')

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed z-40 hidden bg-white/95 backdrop-blur-md w-full top-16 left-0 shadow-md p-5 md:hidden transition-all duration-300 ease-in-out">
        <div class="flex flex-col space-y-2">
            <a href="{{ route('home') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Beranda
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('menu') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Menu Catering
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('galeri') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Galeri
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('tentang') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Tentang Kami
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('kontak') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Kontak
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
        </div>
    </div>

    <!-- Page Header -->
    <div class="pt-24 pb-10 bg-gradient-to-r from-primary-dark via-primary to-primary-light">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold mb-4 animate-fade-in">Hubungi Kami</h1>
                <p class="text-lg max-w-2xl mx-auto animate-fade-in-delayed">Ada pertanyaan atau ingin memesan? Jangan ragu untuk menghubungi tim Dapur Malika yang siap membantu Anda</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="animate-slide-up">
                    <h2 class="text-2xl font-bold mb-6">Informasi Kontak</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-primary bg-opacity-20 rounded-full p-3 mr-4">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat</h3>
                                <p class="text-gray-600 mt-1">Perum. Gebang Raya Blok AL-17, Kota Sidoarjo, Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-primary bg-opacity-20 rounded-full p-3 mr-4">
                                <i class="fas fa-phone-alt text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Telepon</h3>
                                <p class="text-gray-600 mt-1">+62 813 8298 6746</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-primary bg-opacity-20 rounded-full p-3 mr-4">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Email</h3>
                                <p class="text-gray-600 mt-1">kurniawatiyuni631@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-primary bg-opacity-20 rounded-full p-3 mr-4">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Jam Operasional</h3>
                                <p class="text-gray-600 mt-1">Senin - Sabtu: 08.00 - 17.00 WIB</p>
                                <p class="text-gray-600">Minggu: 09.00 - 15.00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <h3 class="text-xl font-semibold mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-primary bg-opacity-20 hover:bg-opacity-30 text-primary rounded-full w-10 h-10 flex items-center justify-center transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="bg-primary bg-opacity-20 hover:bg-opacity-30 text-primary rounded-full w-10 h-10 flex items-center justify-center transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="bg-primary bg-opacity-20 hover:bg-opacity-30 text-primary rounded-full w-10 h-10 flex items-center justify-center transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="bg-primary bg-opacity-20 hover:bg-opacity-30 text-primary rounded-full w-10 h-10 flex items-center justify-center transition">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-lg p-8 animate-slide-up">
                    <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>
                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-3 px-6 rounded-lg transition">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Lokasi Kami</h2>
                <p class="text-gray-600 mt-2">Kunjungi kami di lokasi berikut</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Placeholder for the map -->
                <div class="w-full h-96 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">Google Maps akan ditampilkan di sini</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold mb-4">Pertanyaan Umum</h2>
                <p class="text-gray-600">Beberapa jawaban atas pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-2">Berapa lama waktu yang dibutuhkan untuk memesan?</h3>
                    <p class="text-gray-600">Untuk pemesanan reguler, kami memerlukan waktu minimal 3 hari sebelum acara. Untuk acara besar dengan jumlah tamu lebih dari 100 orang, disarankan untuk memesan 1-2 minggu sebelumnya.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-2">Apakah ada biaya pengiriman?</h3>
                    <p class="text-gray-600">Untuk area dalam kota, kami menyediakan pengiriman gratis dengan minimal pemesanan tertentu. Untuk area di luar kota, akan dikenakan biaya tambahan sesuai jarak.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-2">Bagaimana cara melakukan pembayaran?</h3>
                    <p class="text-gray-600">Kami menerima pembayaran melalui transfer bank, QRIS, dan tunai. Pembayaran minimal 50% diperlukan untuk konfirmasi pemesanan.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-2">Apakah menu dapat disesuaikan?</h3>
                    <p class="text-gray-600">Ya, kami dapat menyesuaikan menu sesuai kebutuhan dan preferensi Anda. Silakan konsultasikan dengan tim kami untuk opsi penyesuaian menu.</p>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <p class="text-gray-600">Masih punya pertanyaan? Jangan ragu untuk <a href="#" class="text-primary hover:underline">menghubungi kami</a>.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-primary-dark via-primary to-primary-light text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap untuk Memesan?</h2>
            <p class="text-lg mb-8">Hubungi kami sekarang untuk mendapatkan penawaran terbaik untuk acara spesial Anda</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-white text-primary hover:bg-gray-100 px-8 py-3 rounded-full font-medium transition">
                    <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                </a>
                <a href="{{ route('menu') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white px-8 py-3 rounded-full font-medium transition">
                    Katalog Menu
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en"></html>
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

    <!-- Navbar -->
    <nav class="fixed z-50 w-full flex items-center px-6 py-3 bg-white/90 backdrop-blur-md text-gray-800 shadow-sm transition-all duration-300">
        <div class="w-1/4">
            <!-- Logo (Left) -->
            <div class="flex items-center">
                <div class="relative group">
                    <img src="/api/placeholder/50/50" alt="Logo" class="w-10 h-10 mr-3 rounded-full shadow-sm group-hover:scale-105 transition-all duration-300">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-dark to-primary-light rounded-full opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                </div>
                <div class="text-2xl font-bold bg-gradient-to-r from-primary-dark via-primary to-primary-light bg-clip-text text-transparent hover:tracking-wide transition-all duration-300">Dapur Malika</div>
            </div>
        </div>

        <!-- Desktop Menu (Absolute Center) -->
        <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:block">
            <div class="flex items-center">
                <div class="relative mx-1 group">
                    <a href="{{ route('home') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Beranda</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('menu') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Menu</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('galeri') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Galeri</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('tentang') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Tentang Kami</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('kontak') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Kontak</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button onclick="toggleMenu()" class="text-gray-700 p-2">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

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

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold mb-6">Perjalanan Kami</h2>
                    <p class="text-gray-600 mb-4">
                        Dapur Malika didirikan pada tahun 2015 oleh Ibu Malika Santoso, seorang chef berpengalaman dengan semangat untuk melestarikan kekayaan kuliner Indonesia. 
                        Berawal dari dapur rumah sederhana, Dapur Malika kini telah berkembang menjadi salah satu jasa catering terpercaya di Indonesia.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Komitmen kami terhadap kualitas dan autentisitas rasa telah membangun kepercayaan dari ribuan pelanggan setia. Kami percaya bahwa makanan Indonesia tidak hanya sekedar santapan, 
                        tetapi juga merupakan warisan budaya yang perlu dijaga keasliannya.
                    </p>
                    <p class="text-gray-600">
                        Seiring berjalannya waktu, Dapur Malika terus berinovasi tanpa meninggalkan cita rasa tradisional yang telah menjadi identitas kami. 
                        Bagi kami, setiap hidangan yang kami sajikan adalah bentuk dedikasi kami terhadap kelezatan masakan Indonesia.
                    </p>
                </div>
                <div class="lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="/api/placeholder/500/400" alt="Dapur Malika Story 1" class="rounded-lg shadow-md w-full h-48 object-cover">
                        <img src="/api/placeholder/500/400" alt="Dapur Malika Story 2" class="rounded-lg shadow-md w-full h-48 object-cover mt-6">
                        <img src="/api/placeholder/500/400" alt="Dapur Malika Story 3" class="rounded-lg shadow-md w-full h-48 object-cover">
                        <img src="/api/placeholder/500/400" alt="Dapur Malika Story 4" class="rounded-lg shadow-md w-full h-48 object-cover mt-6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-6">Visi & Misi</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-eye text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Visi Kami</h3>
                    <p class="text-gray-600">
                        Menjadi penyedia jasa catering terdepan yang mengenalkan kekayaan kuliner Indonesia ke seluruh dunia dengan kualitas premium dan layanan terbaik.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-bullseye text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Misi Kami</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Menyajikan hidangan Indonesia dengan cita rasa autentik dan bahan berkualitas terbaik</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Memberikan pengalaman kuliner berkesan untuk setiap acara pelanggan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Mendukung petani dan pengusaha lokal melalui kemitraan berkelanjutan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Mengembangkan inovasi menu dengan tetap mempertahankan nilai kuliner tradisional</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Tim Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Berkenalan dengan orang-orang hebat di balik kesuksesan Dapur Malika</p>
                <div class="w-24 h-1 bg-primary mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
                    <div class="relative">
                        <img src="/api/placeholder/400/400" alt="Malika Santoso" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold">Malika Santoso</h3>
                        <p class="text-gray-600 mb-4">Founder & Head Chef</p>
                        <div class="flex justify-center space-x-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
                    <div class="relative">
                        <img src="/api/placeholder/400/400" alt="Budi Prakoso" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold">Budi Prakoso</h3>
                        <p class="text-gray-600 mb-4">Executive Chef</p>
                        <div class="flex justify-center space-x-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
                    <div class="relative">
                        <img src="/api/placeholder/400/400" alt="Sari Indah" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold">Sari Indah</h3>
                        <p class="text-gray-600 mb-4">Operational Manager</p>
                        <div class="flex justify-center space-x-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
                    <div class="relative">
                        <img src="/api/placeholder/400/400" alt="Hendra Wijaya" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold">Hendra Wijaya</h3>
                        <p class="text-gray-600 mb-4">Marketing Director</p>
                        <div class="flex justify-center space-x-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Nilai-Nilai Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Prinsip yang menjadi fondasi kesuksesan Dapur Malika</p>
                <div class="w-24 h-1 bg-primary mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-heart text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Passion</h3>
                    <p class="text-gray-600">Kami mencintai apa yang kami lakukan dan menerapkan semangat ini dalam setiap hidangan yang kami sajikan.</p>
                </div>

                <!-- Value 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-award text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Kualitas</h3>
                    <p class="text-gray-600">Kami berkomitmen untuk selalu menghadirkan hidangan berkualitas tertinggi dengan bahan-bahan pilihan.</p>
                </div>

                <!-- Value 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-lightbulb text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Inovasi</h3>
                    <p class="text-gray-600">Kami terus berinovasi dalam menciptakan menu baru tanpa meninggalkan akar tradisional masakan Indonesia.</p>
                </div>

                <!-- Value 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-handshake text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Integritas</h3>
                    <p class="text-gray-600">Kejujuran dan transparansi menjadi landasan dalam setiap aspek bisnis yang kami jalankan.</p>
                </div>

                <!-- Value 5 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-users text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Kepuasan Pelanggan</h3>
                    <p class="text-gray-600">Kebahagiaan dan kepuasan pelanggan adalah prioritas utama dalam setiap layanan yang kami berikan.</p>
                </div>

                <!-- Value 6 -->
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-leaf text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Keberlanjutan</h3>
                    <p class="text-gray-600">Kami berkomitmen untuk menjalankan bisnis dengan memperhatikan dampak sosial dan lingkungan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Apa Kata Mereka</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Pendapat pelanggan kami yang telah merasakan pengalaman bersama Dapur Malika</p>
                <div class="w-24 h-1 bg-primary mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex justify-center mb-6">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Makanan dari Dapur Malika sangat lezat dan autentik. Semua tamu di acara pernikahan kami sangat menikmati hidangannya. Layanan yang diberikan juga sangat profesional."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/100/100" alt="Testimonial" class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Maya & Dika</h4>
                            <p class="text-gray-500 text-sm">Pernikahan di Jakarta</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex justify-center mb-6">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Sebagai perusahaan yang sering mengadakan event, kami sangat puas dengan layanan Dapur Malika. Ketepatan waktu dan konsistensi kualitas makanan menjadi alasan kami selalu menggunakan jasa mereka."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/100/100" alt="Testimonial" class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Rizky Aditya</h4>
                            <p class="text-gray-500 text-sm">PT Global Teknologi</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex justify-center mb-6">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Acara ulang tahun saya menjadi sangat berkesan berkat Dapur Malika. Makanan lezat, presentasi cantik, dan layanan ramah. Semua tamu terpukau dengan hidangan yang disajikan."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/100/100" alt="Testimonial" class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Nina Sari</h4>
                            <p class="text-gray-500 text-sm">Ulang Tahun ke-40</p>
                        </div>
                    </div>
                </div>
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
                <a href="{{ route('kontak') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white px-8 py-3 rounded-full font-medium transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>
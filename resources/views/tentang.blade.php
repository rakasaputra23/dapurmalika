<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Dapur Malika</title>
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
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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

        .animate-fade-in { animation: fadeIn 1s ease-in-out; }
        .animate-fade-in-delayed { animation: fadeIn 1.5s ease-in-out; }
        .animate-slide-up { animation: slideUp 0.8s ease-in-out; }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="w-full min-h-screen bg-gradient-to-b from-white to-gray-100 py-12 px-4 sm:px-6 lg:px-8 pt-24">
        <!-- Header Section -->
        <div class="text-center mb-12 relative">
            <div class="absolute top-0 left-1/4 -translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-info-circle text-6xl text-amber-500"></i>
            </div>
            <div class="absolute top-1/4 right-1/4 translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-history text-6xl text-amber-500"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight relative inline-block">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-amber-500">
                    Tentang Dapur Malika
                </span>
                <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-amber-600 to-amber-300 rounded-full"></div>
            </h1>

            <p class="text-lg text-gray-600 mt-6 max-w-2xl mx-auto leading-relaxed">
                Kenali lebih dalam tentang perjalanan, visi, dan tim kami yang berdedikasi
            </p>

            <div class="flex justify-center mt-4">
                <div class="h-0.5 w-16 bg-amber-300 rounded-full"></div>
            </div>
        </div>

        <!-- Our Story Section -->
        <section class="py-8 bg-white rounded-xl shadow-sm max-w-6xl mx-auto mb-12">
            <div class="flex flex-col lg:flex-row items-center gap-12 px-6">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Perjalanan Kami</h2>
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
  <div class="grid grid-cols-2 gap-x-4 gap-y-6">
    <img src="/images/malikastory1.png" alt="Dapur Malika Story 1" class="rounded-lg shadow-md w-full h-48 object-cover">
    <img src="/images/malikastory2.png" alt="Dapur Malika Story 2" class="rounded-lg shadow-md w-full h-48 object-cover">
    <img src="/images/malikastory3.png" alt="Dapur Malika Story 3" class="rounded-lg shadow-md w-full h-48 object-cover">
    <img src="/images/malikastory4.png" alt="Dapur Malika Story 4" class="rounded-lg shadow-md w-full h-48 object-cover">
  </div>
</div>

            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="py-12 max-w-6xl mx-auto mb-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Visi & Misi</h2>
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
        </section>

        <!-- Our Team -->
        <section class="py-12 bg-white rounded-xl shadow-sm max-w-6xl mx-auto mb-12">
    <div class="text-center mb-12 px-6">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">Tim Kami</h2>
        <p class="max-w-2xl mx-auto text-gray-600">Berkenalan dengan orang-orang hebat di balik kesuksesan Dapur Malika</p>
        <div class="w-24 h-1 bg-primary mx-auto mt-6"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 px-6">
        <!-- Team Member 1 - Founder & Head Chef -->
        <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
            <div class="relative">
                <div class="w-full h-64 bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                    <svg class="w-40 h-40" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="80" r="50" fill="#F3F4F6" stroke="#6B7280" stroke-width="2"/>
                        <circle cx="100" cy="65" r="15" fill="#6B7280"/>
                        <path d="M100 95C115 95 130 105 130 120L130 140C130 145.523 125.523 150 120 150L80 150C74.4772 150 70 145.523 70 140L70 120C70 105 85 95 100 95Z" fill="#6B7280"/>
                        <path d="M100 95C115 95 130 105 130 120L130 140C130 145.523 125.523 150 120 150L80 150C74.4772 150 70 145.523 70 140L70 120C70 105 85 95 100 95Z" stroke="#4B5563" stroke-width="2"/>
                        <text x="100" y="185" font-family="Arial" font-size="16" font-weight="bold" text-anchor="middle" fill="#4B5563">Rika</text>
                    </svg>
                </div>
                <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold">Rika Ayu Fajrin Febrianti</h3>
                <p class="text-gray-600 mb-4">Founder</p>
                <div class="flex justify-center space-x-3 text-gray-600">
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Team Member 2 - Operational Manager -->
        <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition group">
            <div class="relative">
                <div class="w-full h-64 bg-gradient-to-br from-secondary/10 to-primary/10 flex items-center justify-center">
                    <svg class="w-40 h-40" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="80" r="50" fill="#F3F4F6" stroke="#6B7280" stroke-width="2"/>
                        <circle cx="100" cy="65" r="15" fill="#6B7280"/>
                        <path d="M100 95C115 95 130 105 130 120L130 140C130 145.523 125.523 150 120 150L80 150C74.4772 150 70 145.523 70 140L70 120C70 105 85 95 100 95Z" fill="#6B7280"/>
                        <path d="M100 95C115 95 130 105 130 120L130 140C130 145.523 125.523 150 120 150L80 150C74.4772 150 70 145.523 70 140L70 120C70 105 85 95 100 95Z" stroke="#4B5563" stroke-width="2"/>
                        <path d="M120 60C120 71.0457 111.046 80 100 80C88.9543 80 80 71.0457 80 60C80 48.9543 88.9543 40 100 40C111.046 40 120 48.9543 120 60Z" fill="#F3F4F6" stroke="#6B7280" stroke-width="2"/>
                        <text x="100" y="185" font-family="Arial" font-size="16" font-weight="bold" text-anchor="middle" fill="#4B5563">Yuni Kurniawati</text>
                    </svg>
                </div>
                <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold">Yuni Kurniawati</h3>
                <p class="text-gray-600 mb-4">Head Chef</p>
                <div class="flex justify-center space-x-3 text-gray-600">
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Values -->
        <section class="py-12 max-w-6xl mx-auto mb-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Nilai-Nilai Kami</h2>
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
        </section>

        <!-- Testimonials -->
        <section class="py-12 bg-white rounded-xl shadow-sm max-w-6xl mx-auto animate-fade-in">
    <div class="text-center mb-12 px-6 animate-slide-up">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-full mb-6 animate-bounce-slow">
            <i class="fas fa-quote-left text-2xl text-primary"></i>
        </div>
        <h2 class="text-4xl font-bold mb-4 text-gray-800 relative">
            Apa Kata Mereka
            <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary/20 rounded-full animate-ping"></div>
        </h2>
        <p class="max-w-3xl mx-auto text-gray-600 text-lg leading-relaxed">
            Pendapat pelanggan kami yang telah merasakan pengalaman luar biasa bersama 
            <span class="text-primary font-semibold">Dapur Malika</span>
        </p>
        <div class="flex justify-center mt-6">
            <div class="w-24 h-1 bg-gradient-to-r from-primary-light via-primary to-primary-dark mx-auto rounded-full animate-pulse"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-6">
        <!-- Testimonial 1 -->
        <div class="animate-slide-up" style="animation-delay: 0.2s;">
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 relative overflow-hidden group h-full">
                <!-- Hover shine effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                
                <div class="relative z-10">
                    <div class="flex justify-center mb-6">
                        <div class="flex space-x-1 text-primary">
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                        </div>
                    </div>
                    
                    <div class="relative mb-8">
                        <i class="fas fa-quote-left text-4xl text-primary/20 absolute -top-3 -left-2"></i>
                        <p class="text-gray-600 italic text-center leading-relaxed pl-6 pr-2">
                            "Makanan dari Dapur Malika sangat lezat dan autentik. Semua tamu di acara pernikahan kami sangat menikmati hidangannya. Layanan yang diberikan juga sangat profesional dan memuaskan."
                        </p>
                        <i class="fas fa-quote-right text-4xl text-primary/20 absolute -bottom-3 -right-2"></i>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <div class="relative mr-4">
                            <!-- Couple SVG Avatar -->
                            <svg class="w-14 h-14 rounded-full border-3 border-primary/30 hover:border-primary transition-all duration-300 hover:scale-110" viewBox="0 0 100 100">
                                <defs>
                                    <linearGradient id="coupleGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#fff3e0"/>
                                        <stop offset="50%" style="stop-color:#ffcc80"/>
                                        <stop offset="100%" style="stop-color:#ff9800"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50" fill="url(#coupleGrad)"/>
                                <!-- Male figure -->
                                <circle cx="40" cy="35" r="8" fill="#5d4037"/>
                                <path d="M25 55c0-6 7-12 15-12s15 6 15 12v15c0 2-1 3-3 3H28c-2 0-3-1-3-3V55z" fill="#1976d2"/>
                                <!-- Female figure -->
                                <circle cx="60" cy="35" r="8" fill="#5d4037"/>
                                <path d="M45 55c0-6 7-12 15-12s15 6 15 12v15c0 2-1 3-3 3H48c-2 0-3-1-3-3V55z" fill="#e91e63"/>
                                <!-- Wedding rings -->
                                <circle cx="50" cy="75" r="3" fill="none" stroke="#ffd700" stroke-width="2"/>
                                <circle cx="50" cy="75" r="1" fill="#ffd700"/>
                            </svg>
                            
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center animate-pulse">
                                <i class="fas fa-heart text-white text-xs"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-bold text-lg text-gray-800 hover:text-primary transition-colors duration-300">Maya & Dika</h4>
                            <p class="text-gray-500 text-sm flex items-center justify-center mt-1">
                                <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                                Pernikahan di Surabaya
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="animate-slide-up" style="animation-delay: 0.4s;">
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 relative overflow-hidden group h-full">
                <!-- Hover shine effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                
                <div class="relative z-10">
                    <div class="flex justify-center mb-6">
                        <div class="flex space-x-1 text-primary">
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                        </div>
                    </div>
                    
                    <div class="relative mb-8">
                        <i class="fas fa-quote-left text-4xl text-primary/20 absolute -top-3 -left-2"></i>
                        <p class="text-gray-600 italic text-center leading-relaxed pl-6 pr-2">
                            "Sebagai perusahaan yang sering mengadakan event, kami sangat puas dengan layanan Dapur Malika. Ketepatan waktu dan konsistensi kualitas makanan menjadi alasan kami selalu menggunakan jasa mereka."
                        </p>
                        <i class="fas fa-quote-right text-4xl text-primary/20 absolute -bottom-3 -right-2"></i>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <div class="relative mr-4">
                            <!-- Business Person SVG Avatar -->
                            <svg class="w-14 h-14 rounded-full border-3 border-primary/30 hover:border-primary transition-all duration-300 hover:scale-110" viewBox="0 0 100 100">
                                <defs>
                                    <linearGradient id="businessGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#e3f2fd"/>
                                        <stop offset="50%" style="stop-color:#90caf9"/>
                                        <stop offset="100%" style="stop-color:#2196f3"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50" fill="url(#businessGrad)"/>
                                <!-- Head -->
                                <circle cx="50" cy="32" r="12" fill="#5d4037"/>
                                <!-- Suit -->
                                <path d="M30 50c0-8 9-15 20-15s20 7 20 15v20c0 3-2 5-5 5H35c-3 0-5-2-5-5V50z" fill="#1565c0"/>
                                <!-- Tie -->
                                <path d="M47 40h6l-2 20c0 1-1 2-2 2s-2-1-2-2l-2-20z" fill="#d32f2f"/>
                                <!-- Shirt collar -->
                                <path d="M45 40v8h10v-8c-2-2-3-3-5-3s-3 1-5 3z" fill="white"/>
                            </svg>
                            
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center animate-pulse">
                                <i class="fas fa-briefcase text-white text-xs"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-bold text-lg text-gray-800 hover:text-primary transition-colors duration-300">Abdul Malik</h4>
                            <p class="text-gray-500 text-sm flex items-center justify-center mt-1">
                                <i class="fas fa-building text-primary mr-2"></i>
                                PT Meratus
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="animate-slide-up" style="animation-delay: 0.6s;">
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 relative overflow-hidden group h-full">
                <!-- Hover shine effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                
                <div class="relative z-10">
                    <div class="flex justify-center mb-6">
                        <div class="flex space-x-1 text-primary">
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star text-xl hover:scale-110 transition-transform duration-300"></i>
                            <i class="fas fa-star-half-alt text-xl hover:scale-110 transition-transform duration-300"></i>
                        </div>
                    </div>
                    
                    <div class="relative mb-8">
                        <i class="fas fa-quote-left text-4xl text-primary/20 absolute -top-3 -left-2"></i>
                        <p class="text-gray-600 italic text-center leading-relaxed pl-6 pr-2">
                            "Acara ulang tahun saya menjadi sangat berkesan berkat Dapur Malika. Makanan lezat, presentasi cantik, dan layanan ramah. Semua tamu terpukau dengan hidangan yang disajikan."
                        </p>
                        <i class="fas fa-quote-right text-4xl text-primary/20 absolute -bottom-3 -right-2"></i>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <div class="relative mr-4">
                            <!-- Birthday Person SVG Avatar -->
                            <svg class="w-14 h-14 rounded-full border-3 border-primary/30 hover:border-primary transition-all duration-300 hover:scale-110" viewBox="0 0 100 100">
                                <defs>
                                    <linearGradient id="birthdayGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#fce4ec"/>
                                        <stop offset="50%" style="stop-color:#f8bbd9"/>
                                        <stop offset="100%" style="stop-color:#e91e63"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50" fill="url(#birthdayGrad)"/>
                                <!-- Head -->
                                <circle cx="50" cy="35" r="12" fill="#5d4037"/>
                                <!-- Hair (feminine style) -->
                                <path d="M38 28c0-10 5-18 12-18s12 8 12 18c0 3-1 5-2 7-2-1-4-2-6-2h-8c-2 0-4 1-6 2-1-2-2-4-2-7z" fill="#3e2723"/>
                                <!-- Body -->
                                <path d="M32 52c0-6 8-12 18-12s18 6 18 12v18c0 2-1 3-3 3H35c-2 0-3-1-3-3V52z" fill="#c2185b"/>
                                <!-- Party hat -->
                                <path d="M44 20l6-12 6 12c0 2-3 4-6 4s-6-2-6-4z" fill="#ff9800"/>
                                <circle cx="50" cy="8" r="2" fill="#ffeb3b"/>
                            </svg>
                            
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-pink-500 rounded-full flex items-center justify-center animate-pulse">
                                <i class="fas fa-birthday-cake text-white text-xs"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-bold text-lg text-gray-800 hover:text-primary transition-colors duration-300">Nina Sari</h4>
                            <p class="text-gray-500 text-sm flex items-center justify-center mt-1">
                                <i class="fas fa-birthday-cake text-primary mr-2"></i>
                                Ulang Tahun ke-40
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Trust Indicators -->
    <div class="mt-16 text-center animate-fade-in-delayed">
        <div class="flex flex-wrap justify-center items-center gap-8 text-gray-500">
            <div class="flex items-center space-x-2 hover:text-primary transition-colors duration-300">
                <i class="fas fa-users text-2xl"></i>
                <span class="text-sm font-medium">100+ Pelanggan Puas</span>
            </div>
            <div class="w-1 h-8 bg-gray-300 hidden md:block"></div>
            <div class="flex items-center space-x-2 hover:text-primary transition-colors duration-300">
                <i class="fas fa-star text-2xl"></i>
                <span class="text-sm font-medium">Rating 4.9/5.0</span>
            </div>
            <div class="w-1 h-8 bg-gray-300 hidden md:block"></div>
            <div class="flex items-center space-x-2 hover:text-primary transition-colors duration-300">
                <i class="fas fa-award text-2xl"></i>
                <span class="text-sm font-medium">Terpercaya 2024</span>
            </div>
        </div>
    </div>
</section>

        <!-- CTA Section -->
        <section class="py-16 bg-gradient-to-r from-primary-dark via-primary to-primary-light text-white rounded-xl shadow-lg mt-12 max-w-6xl mx-auto">
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
    </div>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>
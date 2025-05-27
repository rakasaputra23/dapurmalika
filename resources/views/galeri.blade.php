<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Dapur Malika</title>
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

        /* Gallery item styles */
        .gallery-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
            color: white;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .category-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: rgba(251, 146, 60, 0.9);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
        }

        /* Grid layout */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        @media (max-width: 640px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="w-full min-h-screen bg-gradient-to-b from-white to-gray-100 py-12 px-4 sm:px-6 lg:px-8 pt-24">
        <!-- Header Section -->
        <div class="text-center mb-12 relative">
            <div class="absolute top-0 left-1/4 -translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-camera text-6xl text-amber-500"></i>
            </div>
            <div class="absolute top-1/4 right-1/4 translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-images text-6xl text-amber-500"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight relative inline-block">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-amber-500">
                    Galeri Dapur Malika
                </span>
                <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-amber-600 to-amber-300 rounded-full"></div>
            </h1>

            <p class="text-lg text-gray-600 mt-6 max-w-2xl mx-auto leading-relaxed">
                Jelajahi momen-momen indah dan hidangan istimewa kami
            </p>

            <div class="flex justify-center mt-4">
                <div class="h-0.5 w-16 bg-amber-300 rounded-full"></div>
            </div>
        </div>

        <!-- Gallery Content -->
        <div class="container mx-auto">
            <!-- Category Filter -->
            <div class="mb-10 flex justify-center">
                <div class="flex flex-wrap justify-center gap-2 md:gap-4">
                    <button class="filter-btn active bg-amber-500 text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-300"
                        data-filter="all">
                        Semua
                    </button>
                    @foreach($kategoris as $kategori)
                    <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 hover:bg-amber-500 hover:text-white"
                        data-filter="kategori-{{ $kategori->id }}">
                        {{ $kategori->nama }}
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid">
                @foreach($galeri as $item)
                <div class="filter-item kategori-{{ $item->kategori_id ?? 'none' }} animate-fade-in" 
                     style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="gallery-item h-full bg-white rounded-xl shadow-md overflow-hidden relative">
                        <!-- Image -->
                        <div class="relative h-64 w-full overflow-hidden">
                            <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}"
                                class="w-full h-full object-cover">
                            
                            @if($item->kategori)
                            <div class="category-badge">
                                {{ $item->kategori->nama }}
                            </div>
                            @endif
                        </div>

                        <!-- Overlay Content -->
                        <div class="gallery-overlay">
                            <h3 class="text-xl font-bold mb-1">{{ $item->nama }}</h3>
                            <p class="text-sm opacity-90">{{ $item->created_at->format('d M Y') }}</p>
                            <div class="flex items-center mt-2">
                                <i class="fas fa-heart mr-1 text-amber-300"></i>
                                <span class="text-xs">{{ rand(10, 100) }} Likes</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($galeri->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="flex items-center gap-2">
                    @if($galeri->onFirstPage())
                    <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $galeri->previousPageUrl() }}" class="px-4 py-2 rounded-full bg-amber-500 text-white hover:bg-amber-600 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    @foreach(range(1, $galeri->lastPage()) as $page)
                    <a href="{{ $galeri->url($page) }}" 
                       class="px-4 py-2 rounded-full {{ $galeri->currentPage() === $page ? 'bg-amber-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-amber-500 hover:text-white' }} transition-colors">
                        {{ $page }}
                    </a>
                    @endforeach

                    @if($galeri->hasMorePages())
                    <a href="{{ $galeri->nextPageUrl() }}" class="px-4 py-2 rounded-full bg-amber-500 text-white hover:bg-amber-600 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    @else
                    <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    @include('partials.footer')

    <script>
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active button
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active', 'bg-amber-500', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                this.classList.add('active', 'bg-amber-500', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-700');

                // Filter items
                const filter = this.dataset.filter;
                document.querySelectorAll('.filter-item').forEach(item => {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Add hover effect to gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('img').style.transform = 'scale(1.05)';
                this.querySelector('.gallery-overlay').style.opacity = '1';
            });
            
            item.addEventListener('mouseleave', function() {
                this.querySelector('img').style.transform = 'scale(1)';
                this.querySelector('.gallery-overlay').style.opacity = '0';
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>
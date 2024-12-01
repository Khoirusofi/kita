<x-app-layout>
    <section class="carousel max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-16 relative" id="carousel">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-xl md:rounded-lg sm:rounded-lg md:h-[35rem]">
                <!-- Carousel Items -->
                <div class="absolute inset-0 flex items-center justify-center">
                    @foreach ($carousels as $carousel)
                        @foreach (['img1', 'img2', 'img3', 'img4', 'img5'] as $imgField)
                            @if ($carousel->$imgField)
                                <!-- Carousel Item -->
                                <div
                                    class="carousel-item opacity-0 transition-opacity duration-1000 ease-in-out absolute inset-0">
                                    <img src="{{ asset('storage/img/' . $carousel->$imgField) }}"
                                        class="w-full h-full object-cover" alt="Carousel Image">
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <!-- Carousel Title and Header -->
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-10 bg-black/20 p-4">
                    <div class="text-lg md:text-xl lg:text-2xl font-bold mb-4">
                        {{ $carousels->first()->title1 ?? 'A Glimpse Of Us' }}</div>
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-2 mt-2 md:mt-4 lg:mt-6">
                        {{ $carousels->first()->title2 ?? 'Happy Anniversary Sayangku' }}</h1>
                    <p class="text-xs mt-2 md:text-sm lg:text-base">
                        {{ $carousels->first()->title3 ?? 'Sayangku' }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 px-4 mx-auto max-w-screen-xl">
        <div id="countup1" class="countup-container flex flex-col gap-4 sm:gap-6">
            <div class="max-w-5xl mx-auto text-center">
                <h1 class="text-2xl font-semibold leading-none mb-2 text-gray-900 sm:text-3xl lg:text-5xl">Waktu Kita
                </h1>
                <p class="text-xs sm:text-sm font-semibold text-gray-600">Semoga waktu ini tetap
                    berjalan terus yaa.</p>
            </div>
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-4">
                <div class="flex flex-col justify-center items-center gap-1">
                    <span id="years"
                        class="py-2 px-3 text-gray-600 text-xl sm:text-2xl font-semibold rounded-md">00</span>
                    <span class="text-xs sm:text-sm text-gray-600 font-bold">Tahun</span>
                </div>
                <div class="flex flex-col justify-center items-center gap-1">
                    <span id="days"
                        class="py-2 px-3 text-gray-600 text-xl sm:text-2xl font-semibold rounded-md">00</span>
                    <span class="text-xs sm:text-sm text-gray-600 font-bold">Hari</span>
                </div>
                <div class="flex flex-col justify-center items-center gap-1">
                    <span id="hours"
                        class="py-2 px-3 text-gray-600 text-xl sm:text-2xl font-semibold rounded-md">00</span>
                    <span class="text-xs sm:text-sm text-gray-600 font-bold">Jam</span>
                </div>
                <div class="flex flex-col justify-center items-center gap-1">
                    <span id="minutes"
                        class="py-2 px-3 text-gray-600 text-xl sm:text-2xl font-semibold rounded-md">00</span>
                    <span class="text-xs sm:text-sm text-gray-600 font-bold">Menit</span>
                </div>
            </div>
        </div>
    </section>

    <style>
        .playing {
            color: #2d2d2d;
            font-weight: bold;
        }
    </style>
    <section class="py-8 px-4 mx-auto max-w-screen-xl" id="audioPlayer">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Greeting Section -->
            <div class="flex-1 text-center mb-8 md:mb-0">
                <div class="text-center greeting">
                    <h1 class="text-2xl font-semibold leading-none mb-2 text-gray-900 sm:text-3xl lg:text-5xl">
                        Waktu Kita
                    </h1>
                    <p class="text-xs sm:text-sm font-semibold text-gray-600">
                        Semoga waktu ini tetap berjalan terus yaa.
                    </p>
                </div>
            </div>

            <!-- Music Player Section -->
            <div class="flex-1 p-4 bg-white rounded-lg shadow-lg">
                <div class="flex flex-col items-center">
                    <h2 id="songTitle" class="text-xl font-semibold text-center mb-2">No Title</h2>
                    <!-- Artist Name -->
                    <p id="artistName" class="text-gray-600 text-sm text-center mb-4">No Artist</p>
                    <!-- Music Controls -->
                    <div class="flex items-center">
                        <button id="prev" class="p-3 focus:outline-none mx-2">
                            <i class="ri-skip-back-fill text-gray-600"></i>
                        </button>
                        <button id="playPause" class="p-3 focus:outline-none mx-2">
                            <i id="playIcon" class="ri-play-fill text-gray-600"></i>
                            <i id="pauseIcon" class="ri-pause-fill hidden text-gray-600"></i>
                        </button>
                        <button id="next" class="p-3 focus:outline-none mx-2">
                            <i class="ri-skip-forward-fill text-gray-600"></i>
                        </button>
                    </div>
                    <!-- Time Information -->
                    <div id="progressBar" class="bg-gray-200 h-2 rounded-full cursor-pointer relative w-[18rem] px-4">
                        <div id="progress" class="bg-gray-500 h-2 rounded-full w-0 absolute top-0 left-0"></div>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 w-[20rem] px-4">
                        <span id="currentTime">0:00</span>
                        <span id="duration">0:00</span>
                    </div>
                    <!-- Song List -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Playlist</h3>
                        <ul id="playlist" class="list-disc pl-5 text-sm text-gray-600">
                            @foreach ($musiks as $index => $musik)
                                <li class="cursor-pointer"
                                    onclick="playMusic('{{ Storage::url('public/musik/' . $musik->file_path) }}', '{{ $musik->title }}', '{{ $musik->artist }}',  {{ $index }}, this)">
                                    {{ $musik->title }} - {{ $musik->artist }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let audio = new Audio();
            let musics = @json($musiks); // Ensure this outputs valid JSON
            let currentMusicIndex = 0;
            let isPlaying = false;

            function playMusic(src, title, artist, albumCover, index, listItem) {
                audio.src = src;
                audio.play();
                document.getElementById('playIcon').classList.add('hidden');
                document.getElementById('pauseIcon').classList.remove('hidden');
                document.getElementById('songTitle').innerText = title;
                document.getElementById('artistName').innerText = artist;
                // document.getElementById('albumCover').src = albumCover;
                currentMusicIndex = index;

                // Update playlist item styles
                document.querySelectorAll('#playlist li').forEach(item => item.classList.remove('playing'));
                if (listItem) {
                    listItem.classList.add('playing');
                }

                updateProgressBar();
            }

            function displayPlaylist() {
                const playlistEl = document.getElementById('playlist');
                playlistEl.innerHTML = ''; // Clear previous playlist
                musics.forEach((song, index) => {
                    const li = document.createElement('li');
                    li.textContent = `${song.title} - ${song.artist}`;
                    li.classList.add('cursor-pointer', 'hover:text-gray-900', 'py-1');
                    li.addEventListener('click', () => {
                        currentMusicIndex = index;
                        playMusic('{{ Storage::url('public/musik/') }}' + song.file_path, song
                            .title, song.artist, song.album_cover, currentMusicIndex, li);
                        if (isPlaying) {
                            audio.play();
                        }
                    });
                    playlistEl.appendChild(li);
                });
            }

            function updateProgressBar() {
                const progress = document.getElementById('progress');
                const currentTimeEl = document.getElementById('currentTime');
                const durationEl = document.getElementById('duration');
                const progressBar = document.getElementById('progressBar');

                audio.addEventListener('loadedmetadata', function() {
                    durationEl.innerText = formatTime(audio.duration);
                }, {
                    once: true
                });

                audio.addEventListener('timeupdate', function() {
                    const percentage = (audio.currentTime / audio.duration) * 100;
                    progress.style.width = percentage + '%';
                    currentTimeEl.innerText = formatTime(audio.currentTime);
                });

                progressBar.addEventListener('click', function(e) {
                    const rect = progressBar.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const width = progressBar.offsetWidth;
                    const percentage = (x / width) * 100;
                    audio.currentTime = (percentage / 100) * audio.duration;
                });
            }

            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
            }

            document.getElementById('playPause').addEventListener('click', function() {
                if (isPlaying) {
                    audio.pause();
                    document.getElementById('playIcon').classList.remove('hidden');
                    document.getElementById('pauseIcon').classList.add('hidden');
                } else {
                    audio.play();
                    document.getElementById('playIcon').classList.add('hidden');
                    document.getElementById('pauseIcon').classList.remove('hidden');
                }
                isPlaying = !isPlaying;
            });

            document.getElementById('prev').addEventListener('click', function() {
                currentMusicIndex = (currentMusicIndex - 1 + musics.length) % musics.length;
                const music = musics[currentMusicIndex];
                playMusic('{{ Storage::url('public/musik/') }}' + music.file_path, music.title, music
                    .artist, music.album_cover, currentMusicIndex, document.querySelector(
                        `#playlist li:nth-child(${currentMusicIndex + 1})`));
            });

            document.getElementById('next').addEventListener('click', function() {
                currentMusicIndex = (currentMusicIndex + 1) % musics.length;
                const music = musics[currentMusicIndex];
                playMusic('{{ Storage::url('public/musik/') }}' + music.file_path, music.title, music
                    .artist, music.album_cover, currentMusicIndex, document.querySelector(
                        `#playlist li:nth-child(${currentMusicIndex + 1})`));
            });

            audio.addEventListener('ended', function() {
                document.getElementById('next').click();
            });

            // Initialize
            displayPlaylist();
            if (musics.length > 0) {
                const firstMusic = musics[0];
                playMusic('{{ Storage::url('public/musik/') }}' + firstMusic.file_path, firstMusic.title,
                    firstMusic.artist, firstMusic.album_cover, 0, document.querySelector(
                        `#playlist li:nth-child(1)`));
            }
        });
    </script>

    @foreach ($contents as $content)
        <section class="py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:gap-16 lg:py-16 lg:px-6">
            <!-- Text Content -->
            <div class="text-gray-500 sm:text-lg">
                <!-- Judul -->
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900">
                    {{ $content->title1 }}
                </h2>

                <!-- Deskripsi -->
                <p class="mb-4 text-gray-700">
                    {{ $content->title2 }}
                </p>

                <!-- Tempat dan Tanggal -->
                <div class="mb-8">
                    <!-- Tempat -->
                    <p class="flex items-center text-sm text-gray-600">
                        <i class="ri-map-pin-line mr-2 text-gray-600"></i>
                        {{ $content->place }}
                    </p>

                    <!-- Tanggal -->
                    <p class="flex items-center text-sm text-gray-600">
                        <i class="ri-calendar-line mr-2 text-gray-600"></i>
                        @if ($content->tgl)
                            {{ Carbon\Carbon::parse($content->tgl)->translatedFormat('l, d F Y') }}
                        @else
                            {{ 'Tanggal tidak tersedia' }}
                        @endif
                    </p>
                </div>
                <!-- Tambahkan field lain sesuai dengan kebutuhan -->
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-2 gap-4 mt-8 lg:grid-cols-2 lg:gap-6 lg:mt-0">
                @foreach (['img1', 'img2', 'img3', 'img4'] as $imageField)
                    @if ($content->$imageField)
                        <div class="relative h-48 w-full overflow-hidden rounded-lg">
                            <img class="object-cover w-full h-full"
                                src="{{ Storage::url('content/' . $content->$imageField) }}"
                                alt="office content {{ $loop->iteration }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endforeach

    <section class="galeri max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-16" id="galeri">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-2xl font-semibold leading-none text-gray-900 mb-2 sm:text-3xl lg:text-5xl">Galeri</h1>
            <p class="text-xs sm:text-sm font-semibold text-gray-600">Explore our gallery of beautiful images</p>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 mt-4">
            @foreach ($galeris as $galeri)
                <div class="relative p-2">
                    <div class="w-full h-60 relative overflow-hidden rounded-md">
                        <img alt="gallery image" class="object-cover w-full h-full"
                            src="{{ Storage::url('galeri/' . $galeri->img) }}" />
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>

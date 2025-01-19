<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(227, 234, 36); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-black mb-4">
            Contact Us
        </h1>

        <!-- Notifikasi Sukses -->
        <div id="success-notification" data-type="success" style="display: none;" class="bg-green-500 text-white p-3 rounded flex justify-between items-center mb-4">
            <span id="notification-message" class="mr-4"></span>
            <button onclick="hideNotification()" class="bg-transparent border-none text-white text-2xl cursor-pointer">&times;</button>
        </div>

        <!-- Bagian Formulir Kontak -->
        <div class="container bg-white p-6 rounded shadow-md">
            <p class="text-center text-gray-700 mb-4">Ada pertanyaan atau ulasan? Cukup tulis pesan kepada kami!</p>

            <div class="flex flex-wrap gap-6">
                <!-- Contact Information -->
                <div class="contact-info bg-red-800 text-white p-4 rounded flex-1">
                    <h2 class="text-lg font-bold">Contact Information</h2>
                    <p>Apabila Anda memiliki pertanyaan atau masalah, Anda dapat menghubungi kami dengan mengisi formulir kontak, menelepon kami, atau mengirim email langsung ke:</p>
                    <p><strong>📞 0812-1111-8456</strong></p>
                    <p><strong>📧 geprekqiana@gmail.com</strong></p>
                    <p>🏢 Jl. Kartika Sari, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266</p>

                    <!-- Embed Google Maps -->
                    <div class="mt-4 rounded overflow-hidden">
                        <iframe
                            width="100%"
                            height="300"
                            frameborder="0"
                            style="border:0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4031.1794545023517!2d101.41875517501234!3d0.5699739994244564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab002fc90665%3A0xc78837c4d4dc0e29!2sAyam%20Geprek%20Qiana!5e1!3m2!1sen!2sid!4v1737217876442!5m2!1sen!2sid"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form flex-2">
                    <form action="{{ route('contact.store') }}" method="post" class="space-y-4" onsubmit="showNotification('success', 'Pesan berhasil dikirim!')">
                        @csrf
                        <input type="text" name="nama" placeholder="Name" class="w-full p-2 border border-gray-300 rounded" required>
                        <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded" required>
                        <input type="text" name="phone_number" placeholder="Phone Number" class="w-full p-2 border border-gray-300 rounded" required>
                        <textarea name="message" placeholder="Message" rows="5" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                        <button type="submit" class="bg-red-800 text-white px-4 py-2 rounded">SEND</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bagian Daftar Kontak -->
        <div class="container mt-6">
            @foreach ($contacts as $cont)
                <div class="bg-gray-100 p-4 rounded shadow-md mb-4">
                    <p><strong>Name:</strong> {{ $cont->nama }}</p>
                    <p><strong>Email:</strong> {{ $cont->email }}</p>
                    <p><strong>Phone:</strong> {{ $cont->phone_number }}</p>
                    <p><strong>Message:</strong> {{ $cont->message }}</p>

      
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function showNotification(type, message) {
            const notificationDiv = document.getElementById('success-notification');
            const messageSpan = document.getElementById('notification-message');

            notificationDiv.dataset.type = type;
            messageSpan.innerText = message;
            notificationDiv.style.display = 'flex';

            setTimeout(hideNotification, 3000);
        }

        function hideNotification() {
            document.getElementById('success-notification').style.display = 'none';
        }

        @if(session('success'))
            showNotification('success', "{{ session('success') }}");
        @endif

        @if(session('update'))
            showNotification('update', "{{ session('update') }}");
        @endif
    </script>
</x-app-layout>

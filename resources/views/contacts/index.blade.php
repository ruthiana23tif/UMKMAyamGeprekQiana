<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9;">
    <!-- Bagian Formulir Kontak -->
    <div style="max-width: 900px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; color: #9a060b;">Contact Us</h1>
        <p style="text-align: center; color: #555;">Ada pertanyaan atau komentar? Cukup tulis pesan kepada kami!</p>

        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- Contact Information -->
            <div style="flex: 1; min-width: 300px; background-color: #851212; color: #ffffff; border-radius: 8px; padding: 20px;">
                <h2>Contact Information</h2>
                <p>Apabila Anda memiliki pertanyaan atau masalah, Anda dapat menghubungi kami dengan mengisi formulir kontak, menelepon kami, datang langsung ke toko kami, menemukan kami di media sosial lain, atau Anda dapat mengirim email langsung ke alamat:</p>
                <p><strong>📞 0812-1111-8456</strong></p>
                <p><strong>📧 geprekqiana@gmail.com</strong></p>
                <p>🏢 Jl. Kartika Sari, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266<br></p>

                <!-- Embed Google Maps -->
                <div style="margin-top: 20px; border-radius: 8px; overflow: hidden;">
                    <iframe
                        width="100%"
                        height="300"
                        frameborder="0"
                        style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4031.1794545023517!2d101.41875517501234!3d0.5699739994244564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab002fc90665%3A0xc78837c4d4dc0e29!2sAyam%20Geprek%20Qiana!5e1!3m2!1sen!2sid!4v1737217876442!5m2!1sen!2sid""
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div style="flex: 2; min-width: 300px;">
                <form action="{{ route('contact.store') }}" method="post" style="display: flex; flex-direction: column; gap: 10px;">
                    @csrf
                    <input type="text" name="nama" placeholder="Name" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>
                    <input type="email" name="email" placeholder="Email" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>
                    <input type="text" name="phone_number" placeholder="Phone Number" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>
                    <textarea name="message" placeholder="Message" rows="5" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required></textarea>
                    <button type="submit" style="padding: 10px; border: none; border-radius: 4px; background-color: #851212; color: #fff; font-size: 16px; cursor: pointer;">
                        SEND
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bagian Daftar Kontak -->
    <div style="max-width: 900px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

            @foreach ($contacts as $cont)
                <div style="padding: 15px; margin-bottom: 15px; background-color: #f5f5f5; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: left">
                    <p style="margin: 0; font-size: 16px; color: #333;"><strong>Name:</strong> {{ $cont->nama }}</p>
                    <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Email:</strong> {{ $cont->email }}</p>
                    <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Phone:</strong> {{ $cont->phone_number }}</p>
                    <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Message:</strong> {{ $cont->message }}</p>
                </div>
            @endforeach

    </div>
</body>

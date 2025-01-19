<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        #success-notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            color: white;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        #success-notification[data-type="success"]{
            background-color: #4CAF50;
        }
        #success-notification[data-type="update"] {
            background-color: #007BFF;
        }
        #success-notification[data-type="delete"] {
            background-color: #f44336;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #9a060b;
        }
        p {
            text-align: center;
            color: #fbf9f9;
        }
        .contact-info {
            flex: 1;
            min-width: 300px;
            background-color: #851212;
            color: #ffffff;
            border-radius: 8px;
            padding: 20px;
        }
        .contact-info h2 {
            margin-top: 0;
        }
         .contact-form {
            flex: 2;
            min-width: 300px;
        }
        .contact-form form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .contact-form input,
        .contact-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .contact-form button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #851212;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .contact-list {
            margin-top: 20px;
        }
        .contact-item {
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
            position: relative;
        }
        .contact-item p {
            margin: 0;
            font-size: 16px;
            color: #333;
            text-align: left;
        }
        .contact-item p strong {
            font-weight: bold;
        }
        .contact-item .actions {
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .contact-item .actions a,
        .contact-item .actions button {
            text-decoration: none;
            margin-right: 5px;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
             cursor: pointer;
        }
        .contact-item .actions a {
            background-color: #4CAF50;
            color: white;
        }
        .contact-item .actions button {
            background-color: #f44336;
            color: white;
            border: none;
        }
        .flex-container {
           display: flex;
           flex-wrap: wrap;
           gap: 20px;
        }
    </style>
</head>
<body>
    <!-- Notifikasi Sukses -->
    <div id="success-notification" data-type="success" style="display: none;">
        <span id="notification-message" style="margin-right: 10px;"></span>
        <button onclick="hideNotification()" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">×</button>
    </div>

    <!-- Bagian Formulir Kontak -->
    <div class="container">
        <h1>Contact Us</h1>
        <p>Ada pertanyaan atau Ulasan? Cukup tulis pesan kepada kami!</p>

        <div class="flex-container">
            <!-- Contact Information -->
            <div class="contact-info">
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4031.1794545023517!2d101.41875517501234!3d0.5699739994244564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab002fc90665%3A0xc78837c4d4dc0e29!2sAyam%20Geprek%20Qiana!5e1!3m2!1sen!2sid!4v1737217876442!5m2!1sen!2sid"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="post" onsubmit="showNotification('success', 'Pesan Berhasil Dikirim!')">
                    @csrf
                    <input type="text" name="nama" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone_number" placeholder="Phone Number" required>
                    <textarea name="message" placeholder="Message" rows="5" required></textarea>
                    <button type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bagian Daftar Kontak -->
    <div class="container contact-list">
        @foreach ($contacts as $cont)
            <div class="contact-item">
                <p><strong>Name:</strong> {{ $cont->nama }}</p>
                <p><strong>Email:</strong> {{ $cont->email }}</p>
                <p><strong>Phone:</strong> {{ $cont->phone_number }}</p>
                <p><strong>Message:</strong> {{ $cont->message }}</p>

                <div class="actions">
                    <a href="{{ route('contact.edit', $cont->id) }}">Edit</a>
                    <form action="{{ route('contact.destroy', $cont->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="event.preventDefault(); showDeleteNotification(this, {{ $cont->id }});">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function showNotification(type, message) {
            const notificationDiv = document.getElementById('success-notification');
            const messageSpan = document.getElementById('notification-message');

            notificationDiv.dataset.type = type;
            messageSpan.innerText = message;
            notificationDiv.style.display = 'flex';

            // Hilangkan notifikasi setelah 3 detik
            setTimeout(hideNotification, 3000);
        }

        function hideNotification() {
            document.getElementById('success-notification').style.display = 'none';
        }

         function showDeleteNotification(button, contactId) {
         if (confirm('Apakah Anda yakin ingin menghapus pesan ini?')) {
             const form = button.closest('form');
            form.submit(); // Submit form jika user konfirmasi
             showNotification('delete', "Pesan Berhasil Dihapus!");
         }
        }

        @if(session('success'))
            showNotification('success', "{{ session('success') }}");
        @endif

        @if(session('update'))
            showNotification('update', "{{ session('update') }}");
        @endif
    </script>
</body>
</html>

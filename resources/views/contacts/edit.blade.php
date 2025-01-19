<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
             display: flex;
             justify-content: center;
             align-items: center;
             min-height: 100vh;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 500px;
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
         input, textarea {
             padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
         }
         button{
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #851212;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <form action="{{ route('contact.update', $contact->id) }}" method="post" >
        @csrf
        @method('PUT')
        <h1>Edit Contact</h1>
        <input type="text" name="nama" placeholder="Name" value="{{ $contact->nama }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ $contact->email }}" required>
        <input type="text" name="phone_number" placeholder="Phone Number" value="{{ $contact->phone_number }}" required>
        <textarea name="message" placeholder="Message" rows="5" required>{{ $contact->message }}</textarea>
        <button type="submit">Update</button>
        @if(session('success'))
        <div class="success-message">
          <span style="margin-right: 10px;">{{ session('success') }}</span>
          </div>
        @endif
    </form>
</body>
</html>

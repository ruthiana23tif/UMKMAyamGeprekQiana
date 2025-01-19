<form action="{{ route('contact.update', $contact->id) }}" method="post" style="display: flex; flex-direction: column; gap: 10px; max-width: 500px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    @csrf
    @method('PUT')
        <h1 style="text-align: center; color: #9a060b;">Edit Contact</h1>
    <input type="text" name="nama" placeholder="Name" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" value="{{ $contact->nama }}" required>
    <input type="email" name="email" placeholder="Email" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" value="{{ $contact->email }}" required>
    <input type="text" name="phone_number" placeholder="Phone Number" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" value="{{ $contact->phone_number }}" required>
    <textarea name="message" placeholder="Message" rows="5" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>{{ $contact->message }}</textarea>
    <button type="submit" style="padding: 10px; border: none; border-radius: 4px; background-color: #851212; color: #fff; font-size: 16px; cursor: pointer;">
        Update
    </button>
</form>

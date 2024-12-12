<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <form method="POST" action="{{ route('question_answer.update', $questionAnswer->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="question" id="question" placeholder="question anda" class="block w-full mt-4 border-gray-300 rounded-md">{{ old('question',$questionAnswer->question) }}
            <x-input-error :messages=" $errors->get('nama') " class="mt-2"/>

            <textarea name="answer" id="answer" placeholder="answer anda" class="block w-full mt-4 border-gray-300 rounded-md">{{ old('answer',$questionAnswer->answer) }}</textarea>

            <x-primary-button class="mt-4">Simpan Perubahan</x-primary-button>
        </form>

    </div>
</x-app-layout>

<div class="mx-auto max-w-2xl py-8">
    @csrf

    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
    <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
            <input type="text" name="title" id="title" class="block flex-1" value="{{ old('title', $talk->title) }}" />
        </div>
        <x-input-error :messages="$errors->get('title')" />
    </div>
    <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
    <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
            <input
                type="text"
                name="length"
                id="length"
                class="block flex-1"
                value="{{ old('length', $talk->length) }}"
            />
        </div>
        <x-input-error :messages="$errors->get('length')" />
    </div>
    <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
    <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
            <select name="type" id="type" class="block flex-1">
                @foreach (App\Enums\TalkType::cases() as $talkType)
                    <option
                        {{ old('type', $talk->type) === $talkType->value ? 'selected' : '' }}
                        value="{{ $talkType->value }}"
                    >
                        {{ ucwords($talkType->value) }}
                    </option>
                @endforeach
            </select>
        </div>
        <x-input-error :messages="$errors->get('type')" />
    </div>
    <label for="abstract" class="block text-sm font-medium leading-6 text-gray-900">Abstract</label>
    <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
            <textarea name="abstract" id="abstract" class="block flex-1">
{{ old('abstract', $talk->abstract) }}</textarea
            >
        </div>
        <x-input-error :messages="$errors->get('abstract')" />
    </div>
    <label for="organizer_notes" class="block text-sm font-medium leading-6 text-gray-900">Notes</label>
    <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
            <textarea name="organizer_notes" id="organizer_notes" class="block flex-1">
{{ old('organizer_notes', $talk->organizer_notes) }}</textarea
            >
        </div>
        <x-input-error :messages="$errors->get('organizer_notes')" />
    </div>
    <button type="submit" class="button mt-2 bg-purple-600 p-2 text-white">Submit</button>
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ 'Create WorkItem' }}
        </h2>
    </x-slot>
    <div class="font-sans antialiased">
        <div class="flex flex-col items-center pt-6 bg-gray-100 sm:justify-start sm:pt-0 min-h-fit">
            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                <div class="mb-4">
                    <h1 class="font-serif text-3xl font-bold">Create WorkItem</h1>
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form action="{{ route('workitems.index') }}" method="POST">
                        @csrf
                        <!-- Workout -->
                        <div class="mt-4 mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="workout_id">
                                <span class=""> Workouts: </span>
                                <select class="block w-full mt-1" name="workout_id">
                                    @foreach ($workouts as $workout)
                                        <option value="{{ $workout->id }}">
                                            {{ $workout->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="mt-4 mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="exercise_id">
                                <span class=""> Exercises: </span>
                                <select class="block w-full mt-1" name="exercise_id">
                                    @foreach ($exercises as $exercise)
                                        <option value="{{ $exercise->id }}">
                                            {{ $exercise->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <!-- Satz -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="satz">
                                Satz
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="number" name="satz" value="{{old('satz')}}">
                            @error('satz')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>                        
                        <!-- Wdh -->
                        <div>
                            <label class="block pt-4 font-medium text-gray-700 ext-sm" for="wdh">
                                Wiederholungen
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="number" name="wdh" value="{{old('wdh')}}">
                            @error('wdh')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>                        
                        <!-- Gewicht -->
                        <div>
                            <label class="block pt-4 font-medium text-gray-700 ext-sm" for="gewicht">
                                Gewicht
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="number" name="gewicht" step="0.25" value="{{old('gewicht')}}">
                            @error('gewicht')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>                        
                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quality Test Single Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="wrapper">
                        <div class="container">
                            <h2 style="text-align:center;" class="mx-auto">Label description and Criteria</h2>

                            <!-- Display the Image -->
                            <p style="text-align:center;">
                                @php
                                    $inputUrl = $image->google_img;
                                    $imageUrl = null;

                                    if (strpos($inputUrl, 'https://www.google.com') === 0) {
                                        preg_match('/imgurl=([^&]+)/', $inputUrl, $matches);
                                        if (isset($matches[1])) {
                                            $imageUrl = urldecode($matches[1]);
                                        }
                                    }
                                @endphp

                                @if ($imageUrl)
                                    <img class="mx-auto" style="width:600px;" src="{{ $imageUrl }}" alt="Image">
                                @else
                                    No Image Available
                                @endif
                            </p>

                            <form method="post" class="py-12" action="{{ route('ready.saveimage', $image->id) }}">
                                @csrf
                                <div class="form-group">

                                    <div class="flex justify-between flex-row">
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Quality:</h3>
                                                <div>
                                                    <input type="checkbox" name="blurred" value="blurred" class="mr-2" @if ($image->blurred == 'Yes') checked @endif disabled> Blurred<br>
                                                    <input type="checkbox" name="pixelation" value="pixelation" class="mr-2" @if ($image->pixelation == 'Yes') checked @endif disabled> Pixelation<br>
                                                    <input type="checkbox" name="washed_out_images" value="washed_out_images" class="mr-2" @if ($image->washed_out_images == 'Yes') checked @endif disabled> Washed out images<br>
                                                    <input type="checkbox" name="too_dark" value="too_dark" class="mr-2" @if ($image->too_dark == 'Yes') checked @endif disabled> Too Dark<br>
                                                    <input type="checkbox" name="flash_reflection_on_skin" value="flash_reflection_on_skin" class="mr-2" @if ($image->flash_reflection_on_skin == 'Yes') checked @endif disabled> Flash reflection on skin<br>
                                                    <input type="checkbox" name="flash_reflection_on_lenses" value="flash_reflection_on_lenses" class="mr-2" @if ($image->flash_reflection_on_lenses == 'Yes') checked @endif disabled> Flash reflection on lenses<br>
                                                    <input type="checkbox" name="inkmarked_creased" value="inkmarked_creased" class="mr-2" @if ($image->inkmarked_creased == 'Yes') checked @endif disabled> InkMarked/Creased<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Type:</h3>
                                                <div>
                                                    <input type="checkbox" name="front_view" value="front_view" class="mr-2" @if ($image->front_view == 'Yes') checked @endif disabled> Front View<br>
                                                    <input type="checkbox" name="side_view" value="side_view" class="mr-2" @if ($image->side_view == 'Yes') checked @endif disabled> Side View<br>
                                                    <input type="checkbox" name="varied_background" value="varied_background" class="mr-2" @if ($image->varied_background == 'Yes') checked @endif disabled> Varied Background<br>
                                                    <input type="checkbox" name="photo_of_people" value="photo_of_people" class="mr-2" @if ($image->photo_of_people == 'Yes') checked @endif disabled> Photo of people<br>
                                                    <input type="checkbox" name="not_photo_of_people" value="not_photo_of_people" class="mr-2" @if ($image->not_photo_of_people == 'Yes') checked @endif disabled> Not photo of people<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Face Visibility:</h3>
                                                <div>
                                                    <input type="checkbox" name="dark_glasses" value="dark_glasses" class="mr-2" @if ($image->dark_glasses == 'Yes') checked @endif disabled> Dark Glasses<br>
                                                    <input type="checkbox" name="frames_covering_eyes" value="frames_covering_eyes" class="mr-2" @if ($image->frames_covering_eyes == 'Yes') checked @endif disabled> Frames covering eyes<br>
                                                    <input type="checkbox" name="frames_too_heavy" value="frames_too_heavy" class="mr-2" @if ($image->frames_too_heavy == 'Yes') checked @endif disabled> Frames too heavy<br>
                                                    <input type="checkbox" name="hair_across_eyes" value="hair_across_eyes" class="mr-2" @if ($image->hair_across_eyes == 'Yes') checked @endif disabled> Hair Across eyes<br>
                                                    <input type="checkbox" name="wearing_hat_cap" value="wearing_hat_cap" class="mr-2" @if ($image->wearing_hat_cap == 'Yes') checked @endif disabled> Wearing Hat/Cap<br>
                                                    <input type="checkbox" name="veil_scarf_over_face" value="veil_scarf_over_face" class="mr-2" @if ($image->veil_scarf_over_face == 'Yes') checked @endif disabled> Veil/Scarf over face<br>
                                                    <input type="checkbox" name="shadow_behind_the_head_portrait" value="shadow_behind_the_head_portrait" class="mr-2" @if ($image->shadow_behind_the_head_portrait == 'Yes') checked @endif disabled> Shadow behind the head portrait<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Facial Features:</h3>
                                                <div>
                                                    <input type="checkbox" name="eyes_closed" value="eyes_closed" class="mr-2" @if ($image->eyes_closed == 'Yes') checked @endif disabled> Eyes Closed<br>
                                                    <input type="checkbox" name="looking_away" value="looking_away" class="mr-2" @if ($image->looking_away == 'Yes') checked @endif disabled> Looking away<br>
                                                    <input type="checkbox" name="mouth_open" value="mouth_open" class="mr-2" @if ($image->mouth_open == 'Yes') checked @endif disabled> Mouth Open<br>
                                                    <input type="checkbox" name="red_eyes" value="red_eyes" class="mr-2" @if ($image->red_eyes == 'Yes') checked @endif disabled> Red Eyes<br>
                                                    <input type="checkbox" name="unnatural_skintone" value="unnatural_skintone" class="mr-2" @if ($image->unnatural_skintone == 'Yes') checked @endif disabled> Unnatural skintone<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button can be added here if needed -->
                                <!-- <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

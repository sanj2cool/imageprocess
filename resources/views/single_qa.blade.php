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

                                    <h2 class="text-lg font-semibold mb-2">*Is this image any of the following? If so,
                                        check which applies and DO NOT add any further attributes to the image.</h2>
                                    <div class="flex justify-between mb-5 flex-row">
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xa" name="not_humen" value="not_humen"
                                                    class="mr-2" @if ($image->not_humen == 'Yes') checked @endif> Not
                                                a real human (xa)
                                                <br>
                                                <small>i.e., cartoon, painting, animated images, empty image, non-human
                                                    subject</small> <br>
                                                <input type="checkbox" id="xb" name="no_face" value="no_face"
                                                    class="mr-2" @if ($image->no_face == 'Yes') checked @endif>
                                                Does not contain a face (xb)
                                                <br>
                                            </div>
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xc" name="not_portrait"
                                                    value="not_portrait" class="mr-2"
                                                    @if ($image->not_portrait == 'Yes') checked @endif> Not a portrait <b
                                                    class="font-bold">(xc)</b>
                                                <br>
                                                <input type="checkbox" id="xd" name="black_white"
                                                    value="black_white" class="mr-2"
                                                    @if ($image->black_white == 'Yes') checked @endif> Greyscale/Black
                                                and White <b class="font-bold">(xd)</b>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xe" name="unvaried_background"
                                                    value="unvaried_background" class="mr-2"
                                                    @if ($image->unvaried_background == 'Yes') checked @endif> Unvaried
                                                Background <b class="font-bold">(xe)</b>
                                                <br>
                                                <input type="checkbox" name="background_plain" value="background_plain"
                                                    id="xf" class="mr-2"
                                                    @if ($image->background_plain == 'Yes') checked @endif> Portrait
                                                Background Plain <b class="font-bold">(xf)</b>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xg" name="multiple_people"
                                                    value="multiple_people" class="mr-2"
                                                    @if ($image->multiple_people == 'Yes') checked @endif> Multiple People in
                                                Image <b class="font-bold">(xg)</b>
                                                <br>
                                                <input type="checkbox" id="xh" name="image_blank"
                                                    value="image_blank" class="mr-2"
                                                    @if ($image->image_blank == 'Yes') checked @endif> Image Link
                                                Blank/Blank Image <b class="font-bold">(xh)</b>
                                                <br>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex justify-between  flex-row">
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Quality:</h3>
                                                <div>
                                                    <input type="checkbox" name="blurred" value="blurred" class="mr-2"
                                                        @if ($image->blurred == 'Yes') checked @endif> Blurred<br>
                                                    <input type="checkbox" name="pixelation" value="pixelation"
                                                        class="mr-2"
                                                        @if ($image->pixelation == 'Yes') checked @endif>
                                                    Pixelation<br>
                                                    <input type="checkbox" name="washed_out_images"
                                                        value="washed_out_images" class="mr-2"
                                                        @if ($image->washed_out_images == 'Yes') checked @endif> Washed out
                                                    images<br>
                                                    <input type="checkbox" name="too_dark" value="too_dark"
                                                        class="mr-2"
                                                        @if ($image->too_dark == 'Yes') checked @endif> Too Dark<br>
                                                    <input type="checkbox" name="flash_reflection_on_skin"
                                                        value="flash_reflection_on_skin" class="mr-2"
                                                        @if ($image->flash_reflection_on_skin == 'Yes') checked @endif> Flash
                                                    reflection on skin<br>
                                                    <input type="checkbox" name="flash_reflection_on_lenses"
                                                        value="flash_reflection_on_lenses" class="mr-2"
                                                        @if ($image->flash_reflection_on_lenses == 'Yes') checked @endif> Flash
                                                    reflection on lenses<br>
                                                    <input type="checkbox" name="inkmarked_creased"
                                                        value="inkmarked_creased" class="mr-2"
                                                        @if ($image->inkmarked_creased == 'Yes') checked @endif>
                                                    InkMarked/Creased<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Type:</h3>
                                                <div>
                                                    <input type="checkbox" name="front_view" value="front_view"
                                                        class="mr-2"
                                                        @if ($image->front_view == 'Yes') checked @endif> Front
                                                    View<br>
                                                    <input type="checkbox" name="side_view" value="side_view"
                                                        class="mr-2"
                                                        @if ($image->side_view == 'Yes') checked @endif> Side
                                                    View<br>
                                                    <input type="checkbox" name="varied_background"
                                                        value="varied_background" class="mr-2"
                                                        @if ($image->varied_background == 'Yes') checked @endif> Varied
                                                    Background<br>
                                                    <input type="checkbox" name="photo_of_people"
                                                        value="photo_of_people" class="mr-2"
                                                        @if ($image->photo_of_people == 'Yes') checked @endif> Photo of
                                                    people<br>
                                                    <input type="checkbox" name="not_photo_of_people"
                                                        value="not_photo_of_people" class="mr-2"
                                                        @if ($image->not_photo_of_people == 'Yes') checked @endif> Not photo of
                                                    people<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Face Visibility:</h3>
                                                <div>
                                                    <input type="checkbox" name="dark_glasses" value="dark_glasses"
                                                        class="mr-2"
                                                        @if ($image->dark_glasses == 'Yes') checked @endif> Dark
                                                    Glasses<br>
                                                    <input type="checkbox" name="frames_covering_eyes"
                                                        value="frames_covering_eyes" class="mr-2"
                                                        @if ($image->frames_covering_eyes == 'Yes') checked @endif> Frames
                                                    covering eyes<br>
                                                    <input type="checkbox" name="frames_too_heavy"
                                                        value="frames_too_heavy" class="mr-2"
                                                        @if ($image->frames_too_heavy == 'Yes') checked @endif> Frames too
                                                    heavy<br>
                                                    <input type="checkbox" name="hair_across_eyes"
                                                        value="hair_across_eyes" class="mr-2"
                                                        @if ($image->hair_across_eyes == 'Yes') checked @endif> Hair Across
                                                    eyes<br>
                                                    <input type="checkbox" name="wearing_hat_cap"
                                                        value="wearing_hat_cap" class="mr-2"
                                                        @if ($image->wearing_hat_cap == 'Yes') checked @endif> Wearing
                                                    Hat/Cap<br>
                                                    <input type="checkbox" name="veil_scarf_over_face"
                                                        value="veil_scarf_over_face" class="mr-2"
                                                        @if ($image->veil_scarf_over_face == 'Yes') checked @endif> Veil/Scarf
                                                    over face<br>
                                                    <input type="checkbox" name="shadow_behind_the_head_portrait"
                                                        value="shadow_behind_the_head_portrait" class="mr-2"
                                                        @if ($image->shadow_behind_the_head_portrait == 'Yes') checked @endif> Shadow
                                                    behind the head portrait<br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Facial Features:</h3>
                                                <div>
                                                    <input type="checkbox" name="eyes_closed" value="eyes_closed"
                                                        class="mr-2"
                                                        @if ($image->eyes_closed == 'Yes') checked @endif> Eyes
                                                    Closed<br>
                                                    <input type="checkbox" name="looking_away" value="looking_away"
                                                        class="mr-2"
                                                        @if ($image->looking_away == 'Yes') checked @endif> Looking
                                                    away<br>
                                                    <input type="checkbox" name="mouth_open" value="mouth_open"
                                                        class="mr-2"
                                                        @if ($image->mouth_open == 'Yes') checked @endif> Mouth
                                                    Open<br>
                                                    <input type="checkbox" name="red_eyes" value="red_eyes"
                                                        class="mr-2"
                                                        @if ($image->red_eyes == 'Yes') checked @endif> Red Eyes<br>
                                                    <input type="checkbox" name="unnatural_skintone"
                                                        value="unnatural_skintone" class="mr-2"
                                                        @if ($image->unnatural_skintone == 'Yes') checked @endif> Unnatural
                                                    skintone<br>
                                                </div>
                                            </div>
                                        </div>




                                    </div>



                                </div>

                                <div class="form-group py-12">

                                    <input type="hidden" name="qa_start_time" id="qa_start_time"
                                        value="{{ getPSTTime() }}">
                                    <input type="hidden" name="imageid" value="{{ $image->id }}">
                                    <input type="hidden" name='qa_person' value="Rakesh">
                                    <input type="hidden" id="form-action" name="action" value="save">
                                    <input type="hidden" id="image_status" name="image_status" value="qa">
                                    <x-secondary-button type="submit" name="update_csvs" class="ms-4"
                                        onclick="document.getElementById('form-action').value='save_and_next';">
                                        Save and Next
                                    </x-secondary-button>
                                    <x-primary-button name="update_csv" class="ms-4">
                                        Save
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

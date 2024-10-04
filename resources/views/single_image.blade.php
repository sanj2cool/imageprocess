<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
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

                                @if($imageUrl)
                                    <img class="mx-auto" style="width:600px;" src="{{ $imageUrl }}" alt="Image">
                                @else
                                    No Image Available
                                @endif
                            </p>

                            <form method="post" class="py-12" action="{{ route('image.saveimage', $image->id) }}">
                                @csrf
                                <div class="form-group">
                                    <h2 class="text-lg font-semibold mb-2">*Is this image any of the following? If so, check which applies and DO NOT add any further attributes to the image.</h2>
                                    <div class="flex justify-between mb-5  flex-row">
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xa" name="not_humen" value="not_humen" class="mr-2"> Not a real human (xa)
                                                <br>
                                                <small>i.e., cartoon, painting, animated images, empty image, non-human subject
                                                </small> <br>
                                                <input type="checkbox" id="xb"  name="no_face" value="no-face" class="mr-2"> Does not contain a face (xb)
                                                <br>
                                            </div>
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xc" name="not_portrait" value="not_portrait" class="mr-2"> Not a portrait <b class="font-bold">(xc)</b>
                                                <br>
                                                <input type="checkbox" id="xd"  name="black_white" value="black_white" class="mr-2"> Greyscale/Black and White <b class="font-bold">(xd)</b>
                                                <br>
                                            </div> 
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xe"  name="unvaried_background" value="unvaried_background" class="mr-2"> Unvaried Background <b class="font-bold">(xe)</b>
                                                <br>
                                                <input type="checkbox" name="background_plain" value="background_plain" id="xf"  class="mr-2"> Portrait Background Plain <b class="font-bold">(xf)</b><br>
                                            </div>
                                        </div>
                                        <div class="min-w-60">
                                            <div>
                                                <input type="checkbox" id="xg" name="multiple_people" value="multiple_people" class="mr-2"> Multiple People in Image <b class="font-bold">(xg)</b>
                                                <br>
                                                <input type="checkbox" id="xh"  name="image_blank" value="image_blank" class="mr-2"> Image Link Blank/Blank Image <b class="font-bold">(xh)</b>
                                               <br>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between  flex-row">
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Quality:</h3>
                                                <div>
                                                    <input type="checkbox" id="qa" name="blurred" value="blurred" class="mr-2"> Blurred <b class="font-bold">(qa)</b><br>
                                                    <input type="checkbox" id="qb" name="pixelation" value="pixelation" class="mr-2"> Pixelation <b class="font-bold">(qb)</b><br>
                                                    <input type="checkbox"  id="qc" name="washed_out_images" value="washed_out_images" class="mr-2"> Washed out images <b class="font-bold">(qc)</b><br>
                                                    <input type="checkbox" id="qd" name="too_dark" value="too_dark" class="mr-2"> Too Dark <b class="font-bold">(qd)</b><br>
                                                    <input type="checkbox"  id="qe" name="flash_reflection_on_skin" value="flash_reflection_on_skin" class="mr-2"> Flash reflection on skin <b class="font-bold">(qe)</b><br>
                                                    <input type="checkbox" id="qf" name="flash_reflection_on_lenses" value="flash_reflection_on_lenses" class="mr-2"> Flash reflection on lenses <b class="font-bold">(qf)</b><br>
                                                    <input type="checkbox" id="qg" name="inkmarked_creased" value="inkmarked_creased" class="mr-2"> InkMarked/Creased <b class="font-bold">(qg)</b><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Image Type:</h3>
                                                <div>
                                                    <input type="checkbox" id="ta"  name="front_view" value="front_view" class="mr-2"> Front View <b class="font-bold">(ta)</b><br>
                                                    <input type="checkbox" id="tb" name="side_view" value="side_view" class="mr-2"> Side View <b class="font-bold">(tb)</b><br>
                                                    <input type="checkbox" id="tc" name="varied_background" value="varied_background" class="mr-2"> Varied Background <b class="font-bold">(tc)</b><br>
                                                    <input type="checkbox" id="td" name="photo_of_people" value="photo_of_people" class="mr-2"> Photo of people <b class="font-bold">(td)</b><br>
                                                    <input type="checkbox" id="te" name="not_photo_of_people" value="not_photo_of_people" class="mr-2"> Not photo of people <b class="font-bold">(te)</b><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Face Visibility:</h3>
                                                <div>
                                                    <input type="checkbox" id="va" name="dark_glasses" value="dark_glasses" class="mr-2"> Dark Glasses <b class="font-bold">(va)</b><br>
                                                    <input type="checkbox" id="vb" name="frames_covering_eyes" value="frames_covering_eyes" class="mr-2"> Frames covering eyes <b class="font-bold">(vb)</b><br>
                                                    <input type="checkbox" id="vc" name="frames_too_heavy" value="frames_too_heavy" class="mr-2"> Frames too heavy <b class="font-bold">(vc)</b><br>
                                                    <input type="checkbox" id="vd" name="hair_across_eyes" value="hair_across_eyes" class="mr-2"> Hair Across eyes <b class="font-bold">(vd)</b><br>
                                                    <input type="checkbox" id="ve" name="wearing_hat_cap" value="wearing_hat_cap" class="mr-2"> Wearing Hat/Cap <b class="font-bold">(ve)</b><br>
                                                    <input type="checkbox" id="vf" name="veil_scarf_over_face" value="veil_scarf_over_face" class="mr-2"> Veil/Scarf over face <b class="font-bold">(vf)</b><br>
                                                    <input type="checkbox" id="vg" name="shadow_behind_the_head_portrait" value="shadow_behind_the_head_portrait" class="mr-2"> Shadow behind the head portrait <b class="font-bold">(vg)</b><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="min-w-60">
                                            <div class="p-4 border rounded-lg shadow">
                                                <h3 class="text-lg font-semibold mb-2">Facial Features:</h3>
                                                <div>
                                                    <input type="checkbox" id="fa" name="eyes_closed" value="eyes_closed" class="mr-2"> Eyes Closed <b class="font-bold">(fa)</b><br>
                                                    <input type="checkbox" id="fb" name="looking_away" value="looking_away" class="mr-2"> Looking away <b class="font-bold">(fb)</b><br>
                                                    <input type="checkbox" id="fc" name="mouth_open" value="mouth_open" class="mr-2"> Mouth Open <b class="font-bold">(fc)</b><br>
                                                    <input type="checkbox" id="fd" name="red_eyes" value="red_eyes" class="mr-2"> Red Eyes <b class="font-bold">(fd)</b><br>
                                                    <input type="checkbox" id="fe" name="unnatural_skintone" value="unnatural_skintone" class="mr-2"> Unnatural skintone <b class="font-bold">(fe)</b><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                               
                                <div class="form-group py-12"> 
                                    
                                    <input type="hidden" name="start_time" id="start_time" value="{{ getPSTTime(); }}">
                                    <input type="hidden" name="imageid" value="{{ $image->id }}">
                                    <input type="hidden" name='label_person' value="{{ Auth::user()->name }}">
                                    <input type="hidden" id="image_status" name="image_status" value="lb"> 
                                    <input type="hidden" id="form-action" name="action" value="save"> 
                                    <x-secondary-button type="submit" name="update_csvs" class="ms-4" onclick="document.getElementById('form-action').value='save_and_next';">
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

<script>
    // Object to track the state of keys
    let keyState = {};
    let keyUsed = {};  // Object to track if a key has already been used

    // Function to reset all keys (optional, in case you want to reset manually)
    function resetKeys() {
        keyUsed = {};
    }

    document.addEventListener('keydown', function(event) {
        // Check if the key has already been used, if so, return early to prevent re-triggering
        if (keyUsed[event.key]) {
            return;
        }

        // Track the pressed key state
        keyState[event.key] = true;

    // Check if exactly two keys are pressed
    const pressedKeys = Object.keys(keyState);
    if (pressedKeys.length == 2) {
        let key1 = pressedKeys[0]; // First pressed key
        let key2 = pressedKeys[1]; // Second pressed key
        console.log(`Key 1: ${key1}, Key 2: ${key2}`);

        let elementId = key1 + key2; // Combine key1 and key2 to form the element ID
        let element = document.getElementById(elementId); // Get the element by the combined ID
        
        if (element) {
            element.focus(); 
            element.checked = true; // Set the checkbox to checked
        } else {
            console.log(`Element with ID ${elementId} not found`);
        }
       
    }

       // Mark the current key as used
        keyUsed[event.key] = true;
    });

    document.addEventListener('keyup', function(event) {

        //console.log( Object.keys(keyState));
        // Reset the key state when a key is released
        delete keyState[event.key];

        // Allow the key to be used again after it's released
        keyUsed[event.key] = false;
    });
</script>

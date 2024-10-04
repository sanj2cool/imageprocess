<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ImageProcess;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
class ImageProcessController extends Controller
{
    public function importCsv(Request $request)
    {
        // Validate the uploaded CSV file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        // Get the uploaded file
        $file = $request->file('csv_file');

        // Open the file in read mode
        if (($handle = fopen($file, 'r')) !== false) {
            // Skip the header row if your CSV has headers
            fgetcsv($handle);

            // Loop through each row of the CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Map each field, checking for empty values and assigning null if empty
                ImageProcess::create([
                    'google_img' => !empty($data[1]) ? $data[1] : null,
                    'input' => !empty($data[2]) ? $data[2] : null,
                    'label_person' => !empty($data[3]) ? $data[3] : null,
                    'update_date' => !empty($data[4]) ? $data[4] : null,
                    'start_time' => !empty($data[5]) ? $data[5] : null,
                    'end_time' => !empty($data[6]) ? $data[6] : null,
                    'total_time' => !empty($data[7]) ? $data[7] : null,
                    'ready_qa' => !empty($data[8]) ? $data[8] : null,
                    'blurred' => !empty($data[9]) ? $data[9] : null,
                    'pixelation' => !empty($data[10]) ? $data[10] : null,
                    'washed_out_images' => !empty($data[11]) ? $data[11] : null,
                    'too_dark' => !empty($data[12]) ? $data[12] : null,
                    'flash_reflection_on_skin' => !empty($data[13]) ? $data[13] : null,
                    'flash_reflection_on_lenses' => !empty($data[14]) ? $data[14] : null,
                    'inkmarked_creased' => !empty($data[15]) ? $data[15] : null,
                    'front_view' => !empty($data[16]) ? $data[16] : null,
                    'side_view' => !empty($data[17]) ? $data[17] : null,
                    'varied_background' => !empty($data[18]) ? $data[18] : null,
                    'photo_of_people' => !empty($data[19]) ? $data[19] : null,
                    'not_photo_of_people' => !empty($data[20]) ? $data[20] : null,
                    'dark_glasses' => !empty($data[21]) ? $data[21] : null,
                    'frames_covering_eyes' => !empty($data[22]) ? $data[22] : null,
                    'frames_too_heavy' => !empty($data[23]) ? $data[23] : null,
                    'hair_across_eyes' => !empty($data[24]) ? $data[24] : null,
                    'wearing_hat_cap' => !empty($data[25]) ? $data[25] : null,
                    'veil_scarf_over_face' => !empty($data[26]) ? $data[26] : null,
                    'shadow_behind_the_head_portrait' => !empty($data[27]) ? $data[27] : null,
                    'eyes_closed' => !empty($data[28]) ? $data[28] : null,
                    'looking_away' => !empty($data[29]) ? $data[29] : null,
                    'mouth_open' => !empty($data[30]) ? $data[30] : null,
                    'red_eyes' => !empty($data[31]) ? $data[31] : null,
                    'unnatural_skintone' => !empty($data[32]) ? $data[32] : null,
                    'status' => !empty($data[33]) ? $data[33] : 'Pending',
                ]);
            }

            // Close the file
            fclose($handle);

            return back()->with('success', 'CSV Data Imported Successfully');
        }

        return back()->with('error', 'Something went wrong with the file');
    }


    public function exportCsv()
    {

        
        $fileName = 'imageprocess.csv';
        $imageProcesses = ImageProcess::all(); // Get all records
       
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Retrieve all column names of the 'imageprocess' table
        $columns = \Schema::getColumnListing('imageprocess'); 
        
       
        
        $callback = function() use($imageProcesses,$columns) {
        
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Add the column headers
           
            foreach ($imageProcesses as $process) {
                $row = [];
                foreach ($columns as $column) {
                    $row[] = $process->$column; // Get each column's value
                }
                fputcsv($file, $row); // Write the row to the CSV
            }
            fclose($file);
        };
        
        return Response::stream($callback, 200, $headers);
    }


    public function imageList()
    {
        // Retrieve all records from the ImageProcess table
        //$images = ImageProcess::all();
        $images = ImageProcess::where(function($query) {
            $query->where('ready_qa', '')
                  ->orWhereNull('ready_qa');
        })->get();
        
        // Pass the images data to the Blade view
        return view('image_list', compact('images'));
    }


    public function dash()
    {
        // Retrieve all records from the ImageProcess table
        //$images = ImageProcess::all();
        $images = ImageProcess::all(); 
        
        // Pass the images data to the Blade view
        return view('dashboard', compact('images'));
    }
    public function imageListQcReady()
    {
        // Retrieve all records from the ImageProcess table
        //$images = ImageProcess::all();
        $images =ImageProcess::where('status', 'Ready for QA')->get();
        // Pass the images data to the Blade view
        return view('ready_qa', compact('images'));
    }
    public function complete_list()
    {
        // Retrieve all records from the ImageProcess table
        //$images = ImageProcess::all();
        $images =ImageProcess::where('status', 'Complete')->get();
        // Pass the images data to the Blade view
        return view('complete', compact('images'));
    }

    public function show($id)
    {
        // Find the image by its ID
        $image = ImageProcess::findOrFail($id);

        // Pass the image data to the Blade view
        return view('single_image', compact('image'));
    }

    public function showQa($id)
    {
        // Find the image by its ID
        $image = ImageProcess::findOrFail($id);

        // Pass the image data to the Blade view
        return view('single_qa', compact('image'));
    }

    public function showComplete($id)
    {
        // Find the image by its ID
        $image = ImageProcess::findOrFail($id);

        // Pass the image data to the Blade view
        return view('single_complete', compact('image'));
    }




    public function saveimage(Request $request, $id)
{
    
    if($request->image_status== 'qa') {
        $status='Complete';
    }else {
        $status='Ready for QA';
    }
    //dd($request);
    // Validate the request data
    $request->validate([
        'input' => 'nullable|string',
        'label_person' => 'nullable|string',
        'update_date' => 'nullable|date',
        'start_time' => 'nullable|string',
        'end_time' => 'nullable|string',
        'total_time' => 'nullable|string',
        'ready_qa' => 'nullable|string',
        'blurred' => 'nullable|string',
        'pixelation' => 'nullable|string',
        'washed_out_images' => 'nullable|string',
        'too_dark' => 'nullable|string',
        'flash_reflection_on_skin' => 'nullable|string',
        'flash_reflection_on_lenses' => 'nullable|string',
        'inkmarked_creased' => 'nullable|string',
        'front_view' => 'nullable|string',
        'side_view' => 'nullable|string',
        'varied_background' => 'nullable|string',
        'photo_of_people' => 'nullable|string',
        'not_photo_of_people' => 'nullable|string',
        'dark_glasses' => 'nullable|string',
        'frames_covering_eyes' => 'nullable|string',
        'frames_too_heavy' => 'nullable|string',
        'hair_across_eyes' => 'nullable|string',
        'wearing_hat_cap' => 'nullable|string',
        'veil_scarf_over_face' => 'nullable|string',
        'shadow_behind_the_head_portrait' => 'nullable|string',
        'eyes_closed' => 'nullable|string',
        'looking_away' => 'nullable|string',
        'mouth_open' => 'nullable|string',
        'red_eyes' => 'nullable|string',
        'unnatural_skintone' => 'nullable|string',
        'status' => 'nullable|string',
    ]);

    // Find the existing record by ID
    $imageProcess = ImageProcess::findOrFail($id);
    
    $currentDate = Carbon::today()->toDateString(); 
    



// Get the current time
$timenow = getPSTTime();
$currentTime = Carbon::createFromFormat('H:i:s', $timenow);
$currentTimes = $currentTime->toTimeString(); 
    
//$currentTime = now();
//dd($currentTime->toTimeString());
// Get the start time from the request
$startTime = Carbon::createFromFormat('H:i:s', $request->input('start_time'));
//$startTime = $request->input('start_time');

// Calculate the total time
$totalTime = $currentTime->diffInSeconds($startTime);
//dd($totalTime);
// If you want it in a more readable format (hours, minutes, seconds):
$hours = floor($totalTime / 3600);
$minutes = floor(($totalTime % 3600) / 60);
$seconds = $totalTime % 60;

// You can also format it like this if needed
$totalTimeFormatted = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);


    // Update the record with the new data
    $imageProcess->update([
        
        'input' => $request->input('input'),
        'label_person' => $request->input('label_person'),
        'update_date' => $currentDate,
        'start_time' => $request->input('start_time'),
        'end_time' => $currentTimes,
        'total_time' => $totalTimeFormatted,
        'ready_qa' => $request->input('ready_qa')? 'Yes' : 'Yes',
        'blurred' => $request->input('blurred') ? 'Yes' : 'No',
        'pixelation' => $request->input('pixelation') ? 'Yes' : 'No',
        'washed_out_images' => $request->input('washed_out_images') ? 'Yes' : 'No',
        'too_dark' => $request->input('too_dark') ? 'Yes' : 'No',
        'flash_reflection_on_skin' => $request->input('flash_reflection_on_skin') ? 'Yes' : 'No',
        'flash_reflection_on_lenses' => $request->input('flash_reflection_on_lenses') ? 'Yes' : 'No',
        'inkmarked_creased' => $request->input('inkmarked_creased') ? 'Yes' : 'No',
        'front_view' => $request->input('front_view') ? 'Yes' : 'No',
        'side_view' => $request->input('side_view') ? 'Yes' : 'No',
        'varied_background' => $request->input('varied_background') ? 'Yes' : 'No',
        'photo_of_people' => $request->input('photo_of_people') ? 'Yes' : 'No',
        'not_photo_of_people' => $request->input('not_photo_of_people') ? 'Yes' : 'No',
        'dark_glasses' => $request->input('dark_glasses') ? 'Yes' : 'No',
        'frames_covering_eyes' => $request->input('frames_covering_eyes') ? 'Yes' : 'No',
        'frames_too_heavy' => $request->input('frames_too_heavy') ? 'Yes' : 'No',
        'hair_across_eyes' => $request->input('hair_across_eyes') ? 'Yes' : 'No',
        'wearing_hat_cap' => $request->input('wearing_hat_cap') ? 'Yes' : 'No',
        'veil_scarf_over_face' => $request->input('veil_scarf_over_face') ? 'Yes' : 'No',
        'shadow_behind_the_head_portrait' => $request->input('shadow_behind_the_head_portrait') ? 'Yes' : 'No',
        'eyes_closed' => $request->input('eyes_closed') ? 'Yes' : 'No',
        'looking_away' => $request->input('looking_away') ? 'Yes' : 'No',
        'mouth_open' => $request->input('mouth_open') ? 'Yes' : 'No',
        'red_eyes' => $request->input('red_eyes') ? 'Yes' : 'No',
        'unnatural_skintone' => $request->input('unnatural_skintone') ? 'Yes' : 'No',
        'status' => $status,
    ]);

    if ($request->input('action') === 'save_and_next' && $request->image_status== 'qa') { 
        $QaNextId = ImageProcess::where('status', 'Ready for QA')->first()->id ?? null;
      return redirect()->route('image.showQa', ['id' => $QaNextId])->with('success', 'Image Process updated successfully!');
        //dd($request);
    }else  if ($request->input('action') === 'save_and_next' && $request->image_status== 'lb') { 
        $LbNextId = ImageProcess::where('status', 'Pending')->first()->id ?? null;
        return redirect()->route('image.show', ['id' => $LbNextId])->with('success', 'Image Process updated successfully!');

        //dd($request);
    } else if ($request->image_status== 'qa'){
        return redirect()->route('ready.qa')->with('success', 'Image Process updated successfully!');
    }else {
        return redirect()->route('image.list')->with('success', 'Image Process updated successfully!');

    }

   
    if ($request->isMethod('post')) {
        // Dump the form data
       // dd($request->all());

        // You can also handle your form data here if needed
    }

    // Load the image if necessary
    //$image = ImageProcess::findOrFail($id); // Assuming you have an ImageProcess model

    // Return the view with the image
    //return view('single_image', compact('image'));
    //return view('your-view-name', compact('image'));
}

public function updateImagesAll(){
    // Retrieve all records from the ImageProcess table
        //$images = ImageProcess::all();
        $images = ImageProcess::all(); 
        
        // Pass the images data to the Blade view
        return view('update_all', compact('images'));  
}

public function destroy($id)
{
    // Find the image by its ID and delete it
    $imageProcess = ImageProcess::findOrFail($id);
    $imageProcess->delete();

    return back()->with('success', 'Image Process deleted successfully!');
}

public function removeAll(Request $request)
{
     //dd($request);
    $ids = $request->input('ids'); // Get selected IDs

    if (!$ids) {
        return redirect()->back()->with('error', 'No images selected for deletion.');
    }

    // Perform the bulk delete operation
    ImageProcess::whereIn('id', $ids)->delete();

    return redirect()->back()->with('success', 'Selected images have been deleted.');
}



}

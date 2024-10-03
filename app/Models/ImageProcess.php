<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProcess extends Model
{
    use HasFactory;

    protected $table = 'imageprocess';

    protected $fillable = [
        'google_img',
        'input',
        'label_person',
        'update_date',
        'start_time',
        'end_time',
        'total_time',
        'ready_qa',
        'blurred',
        'pixelation',
        'washed_out_images',
        'too_dark',
        'flash_reflection_on_skin',
        'flash_reflection_on_lenses',
        'inkmarked_creased',
        'front_view',
        'side_view',
        'varied_background',
        'photo_of_people',
        'not_photo_of_people',
        'dark_glasses',
        'frames_covering_eyes',
        'frames_too_heavy',
        'hair_across_eyes',
        'wearing_hat_cap',
        'veil_scarf_over_face',
        'shadow_behind_the_head_portrait',
        'eyes_closed',
        'looking_away',
        'mouth_open',
        'red_eyes',
        'unnatural_skintone',
        'status',
    ];
}

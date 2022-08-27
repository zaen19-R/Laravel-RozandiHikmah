<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $posts= [
        [
            "tittle" => "Judul Post Pertama",
            "slug" =>"judul-post-pertama",
            "author" => "Rozandi Hikmah",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt perferendis voluptas itaque accusantium, libero nulla exercitationem quod dignissimos velit ab molestias tempore quasi temporibus, suscipit deserunt soluta quisquam, animi quia."
        ],
        [
            "tittle" => "Judul Post Kedua",
            "slug" =>"judul-post-kedua",
            "author" => "Suryani Apriyani",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt perferendis voluptas itaque accusantium, libero nulla exercitationem quod dignissimos velit ab molestias tempore quasi temporibus, suscipit deserunt soluta quisquam, animi quia."
        ],
    ];

    public static function all(){
        return collect(self::$posts);
    }

    public static function find($slug){
        $allposts = static::all();

        return $allposts->firstWhere('slug',$slug);
    }
        // use HasFactory;
}

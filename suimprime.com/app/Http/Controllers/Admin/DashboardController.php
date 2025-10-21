<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;

class DashboardController extends Controller {
public function index() {

/* $stats = [
'users' => User::count(),
'subs' => User::where('subscription_active', 1)->count(),
'content' => Content::count()
];
 return view('admin.dashboard', compact('stats')); */

 // gather stats
        $data = [
            'usersCount' => 35000,
            'downloads' => 55000,
            'visitors' => 1000000,
            'subscribers' => 2000000,
            'topRatedItems' => [
                ['title'=>'The Last Breath', 'type'=>'TV Show', 'views'=>'134 / 30k'],
                ['title'=>'Last Night', 'type'=>'Movie', 'views'=>'133 / 20k'],
                ['title'=>'Jeon Woochie', 'type'=>'Movie', 'views'=>'222 / 40k'],
                // etc
            ],
            'recentItems' => [
                ['image'=>'recentlyImg-01.jpg', 'title'=>'Rabbit', 'rating'=>'8.2', 'genre'=>'Thriller', 'status'=>'Unsubscriber', 'date'=>'23 July,2020'],
                // etc
            ],
            // more data for categories, charts...
        ];
         return view('admin.dashboard', compact('data'));
}
}
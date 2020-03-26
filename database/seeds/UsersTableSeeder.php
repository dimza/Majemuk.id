<?php

use App\Events\Inst;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Create admin account
        DB::table('users')->insert([
            'usertype' => 'Admin',
            'name' => 'admin',            
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'image_icon' => 'admin-965bf2e0f3108983112bb705d2db4304',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('widgets')->insert([
            'about_news_title' => 'About the Magazine',
            'about_news' => 'Aenean ultricies mi vitae est. Mauris placerat eleifend leosit amet est.',
            'social_media_title' => 'Facebook Page',
            'contact_title' => 'Contact Us',
            'contact_address' => 'PO Box 16122 Collins Street West\r\nVictoria 8007 Australia',
            'contact_phone' => '+61 3 8376 6284',
            'contact_email' => 'info@demosite.com',
            'featured_title' => 'FEATURED NEWS',
            'featured_post_limit' => '5',
            'recent_posts_title' => 'RECENT POSTS',
            'recent_posts_limit' => '5',
            'popular_posts_title' => 'POPULAR POSTS',
            'popular_posts_limit' => '5' 
        ]);
        
        DB::table('settings')->insert([
            'site_style' => 'blue',
            'site_name' => 'Viavi - News, Magazine, Blog Script',
            'site_email' => 'admin@admin.com',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'site_description' => 'viavi new demo site example meta description',
            'site_copyright' => 'Copyright © 2015 Viavi - News, Magazine, Blog Script. All rights reserved.',
            'slider_type' => 'slider1',
            'home_post_columns' => '2crs',
            'category_post_columns' => '2crs',
            'tags_post_columns' => '2crs',
            'search_post_columns' => '2crs',
            'single_post_column' => '1crs' 
        ]);
         
		DB::table('categories')->insert([
			'category_name' => 'TECHNOLOGY',
            'category_slug' => 'technology',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'BUSINESS',
            'category_slug' => 'business',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'SPORTS',
            'category_slug' => 'sports',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'WORLD',
            'category_slug' => 'world',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'MOVIES',
            'category_slug' => 'movies',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'LIFE STYLE',
            'category_slug' => 'life-style',
            'status' => '1'
		]);
		
		DB::table('categories')->insert([
			'category_name' => 'POLITICS',
            'category_slug' => 'politics',
            'status' => '1'
		]);
		
       // factory('App\User', 20)->create();
    }
}

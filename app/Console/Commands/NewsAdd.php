<?php

namespace App\Console\Commands;

use App\Models\NewsList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class NewsAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch news from newsapi.org and insert into db';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Cron job running at ". now());

        //fetch news from newsapi
        $api = Http::withHeaders([
            'X-Api-Key' => config('app.news_api_key')
        ])->get('https://newsapi.org/v2/top-headlines?country=us&category=business');
    
        $news = json_decode($api);

        if($news->status=='ok')
        {

            $db_data = NewsList::all()->toArray(); // db data

            $data = array(); //to store news 

            //when db has no data
            if(count($db_data)==0)
            {                
                foreach ($news->articles as $key => $article) {

                    $data[$key]['source'] = $article->source->name;
                    $data[$key]['author'] = $article->author;
                    $data[$key]['title'] = $article->title;
                    $data[$key]['description'] = $article->description;
                    $data[$key]['url'] = $article->url;
                    $data[$key]['url_to_image'] = $article->urlToImage;
                    $data[$key]['published_at'] = date("Y-m-d H:i:s", strtotime($article->publishedAt));
                    $data[$key]['content'] = $article->content;
                    $data[$key]['created_at'] = now()->format('Y-m-d H:i:s');
                    $data[$key]['updated_at'] = now()->format('Y-m-d H:i:s');

                }

                NewsList::insert($data); // fill db with news

            }else{

                foreach ($news->articles as $key => $article) {

                    $data[$key]['source'] = $article->source->name;
                    $data[$key]['author'] = $article->author;
                    $data[$key]['title'] = $article->title;
                    $data[$key]['description'] = $article->description;
                    $data[$key]['url'] = $article->url;
                    $data[$key]['url_to_image'] = $article->urlToImage;
                    $data[$key]['published_at'] = date("Y-m-d H:i:s", strtotime($article->publishedAt));
                    $data[$key]['content'] = $article->content;
                    $data[$key]['created_at'] = now()->format('Y-m-d H:i:s');
                    $data[$key]['updated_at'] = now()->format('Y-m-d H:i:s');
                }        
        
        
                //to remove duplicate entry
                foreach ($data as $key_data => $value_data) {
        
                    foreach ($db_data as $value_db_data) {
                        if($value_data['title'] == $value_db_data['title'])
                        {
                            unset($data[$key_data]);
                        }
                    }            
        
                }

                NewsList::insert($data); // fill db with more news
            }


        }else{

            $this->info( $news->code.' :: '.$news->message);   
        }  

        $this->info('Success');

        return Command::SUCCESS;
    }

}

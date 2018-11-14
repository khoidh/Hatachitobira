<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Video;
use Illuminate\Support\Facades\Log;

class UpdateViewcount extends Command
{
    protected $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
    protected $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_viewcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update viewcount for Youtube API v3';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $API_KEY = config('app.youtube_api_key');

        $videos = Video::all();
        foreach ($videos as $key => $video) {
            Log::info($video->url);
            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            if(!$youtube)
            {
                Log::info('Video id='.($video->id).' this url not youtube link');
            }
            else
            {
                $id =  $youtube['v'];
                $api_url = $this->BASE_URL . $id . $this->BASE_PART . $API_KEY . '';
                $result = json_decode(file_get_contents($api_url));
                if($result->items)
                {
                    $video->viewCount = (double)($result->items[0]->statistics->viewCount);     
                    $video->save();
                    Log::info('Video id='.($video->id).' update viewcount success');
                }
                else
                {
                    Log::info('Video id='.($video->id).' cant not get youtube information');
                }
                
            }
        }
    }
}

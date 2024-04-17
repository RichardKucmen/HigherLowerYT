<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware("has.role:admin|user");
    }
    public function index(){
        $videos = Videos::all();
        return view("admin.index", ["videos" => $videos]);
    }
    public function deleteVideo($id){
        $video = Videos::find($id);
        $video->delete();
        return redirect()->route("admin.index");
    }
    public function addVideo(Request $request){
        $youtubeInfo = $this->getYoutubeInfo($request["video_link"]);

        $video = new Videos();
        $video->video_id = $youtubeInfo["video_id"];
        $video->video_name = $request["video_name"];
        $video->video_html_code = $youtubeInfo["video_html_code"];
        $video->video_views = $youtubeInfo["video_views"];
        $video->user_id = Auth::user()->id;

        $video->save();
        return redirect()->route("admin.index");
    }
    public function editVideo($id){
        $video = Videos::find($id);
        return view("admin.editVideo", ["video" => $video]);
    }
    public function updateVideo(Request $request){
        $youtubeInfo = $this->getYoutubeInfo($request["video_link"]);

        $video = Videos::find($request["id"]);
        $video->video_id = $youtubeInfo["video_id"];
        $video->video_name = $request["video_name"];
        $video->video_html_code = $youtubeInfo["video_html_code"];
        $video->video_views = $youtubeInfo["video_views"];
        $video->user_id = Auth::user()->id;

        $video->save();
        return redirect()->route("admin.index");
    }
    public function updateInfo($id){
        $video = Videos::find($id);
        $updatedInfo = $this->getYoutubeInfo($video->video_id);

        $video->video_id = $updatedInfo["video_id"];
        $video->video_html_code = $updatedInfo["video_html_code"];
        $video->video_views = $updatedInfo["video_views"];

        $video->save();
        return redirect()->route("admin.index");
    }


    public function getYoutubeInfo($url){
        $you_tube_data_api_key = 'AIzaSyDX2z7bc_6X5aK67Hcb5FrwYTyCeUu9cDw';
        $result = [];
        if(strlen($url) > 20){
            $pattern = '/v=([a-zA-Z0-9_-]+)/';
            preg_match($pattern, $url, $matches);
            if (isset($matches[1])) {
                $video_id = $matches[1];
                $result["video_id"] = $video_id;
            } else {
                echo "Video ID not found in the URL.";
                exit;
            }
        } else{
            $video_id = $url;
            $result["video_id"] = $video_id;
        }
        if($video_id) {
            $api_url = 'https://www.googleapis.com/youtube/v3/videos?key=' . $you_tube_data_api_key . '&id=' . $video_id . '&part=snippet,statistics';
            $video_data = file_get_contents($api_url);
            if(!empty($video_data)) {
                $video_data_arr = json_decode($video_data, true);
                if(!empty($video_data_arr['items'])) {
                    $views = $video_data_arr['items'][0]['statistics']['viewCount'];
                    $result["video_views"] = $views;
                    $embed_code = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                    $result["video_html_code"] = $embed_code;
                }
            }
            return $result;
        }
    }
}

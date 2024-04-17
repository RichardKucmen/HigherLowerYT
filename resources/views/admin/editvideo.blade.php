<form action="{{route("admin.updateVideo", ["id" => $video->id])}}" method="POST">
    @csrf
    <label for="video_link"></label>
    <input type="text" id="video_link" placeholder="Link" name="video_link" value="https://www.youtube.com/watch?v={{ $video->video_id }}">
    <label for="video_name"></label>
    <input type="text" id="video_name" placeholder="Name" name="video_name" value="{{ $video->video_name }}">
    <input type="hidden" value="{{ $video->id }}">
    <button>Submit</button>
</form>

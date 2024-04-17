<a href="{{ route("admin.new_video") }}">Add new video</a>


@foreach ($videos as $video)
        <br>
        {!! $video->video_html_code !!}
        <h1>Name: {{$video->video_name}} </h1>
        <p>Views: {{$video->video_views}} </p>
        <p>Created by user: {{$video->user_id}} </p>
        <p>Video id: {{$video->video_id}} </p>
        <a href="{{ route("admin.deleteVideo", ["id" => $video->id]) }}">DELETE</a>
        <a href="{{ route("admin.updateInfo", ["id" => $video->id]) }}">UPDATE</a>
        <a href="{{ route("admin.editVideo", ["id" => $video->id]) }}">EDIT</a>
@endforeach

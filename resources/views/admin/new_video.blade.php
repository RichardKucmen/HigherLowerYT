<form action="{{route("admin.addVideo")}}" method="POST">
@csrf
<label for="video_link"></label>
<input type="text" id="video_link" placeholder="Link" name="video_link">
<label for="video_name"></label>
<input type="text" id="video_name" placeholder="Name" name="video_name">
<button>Submit</button>
</form>

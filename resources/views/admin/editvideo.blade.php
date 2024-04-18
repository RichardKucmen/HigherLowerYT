@extends("../admin/leyout/admin")
@section('main_content')
<div class="flex w-[90%] flex-col m-auto gap-[40px] h-[70vh] items-center lg:flex-row lg:w-[70%]">
    <div class="w-[100%] lg:w-[50%]">
        <div class="w-[100%] h-[250px] m-auto lg:h-[500px]"> {!! $video->video_html_code !!}</div>
        <div class="w-[100%] m-auto text-[20px]">
            <h1">NAME: {{$video->video_name}} </h1>
            <p>Views: {{$video->video_views}} </p>
            <p>Created by user: {{$video->user_id}} </p>
            <p>Video id: {{$video->video_id}} </p>
        </div>
    </div>
    <div class="w-[100%] relative lg:w-[50%]">
        <form action="{{route("admin.updateVideo", ["id" => $video->id])}}" method="POST" class="flex flex-col">
            @csrf
            <label for="video_link" class="m-[3px]">Video link</label>
            <input type="text" id="video_link" placeholder="Link" name="video_link" value="https://www.youtube.com/watch?v={{ $video->video_id }}" class="border-4 p-[10px] rounded-xl mb-[20px]">
            <label for="video_name" class="m-[3px]">Video name</label>
            <input type="text" id="video_name" placeholder="Name" name="video_name" value="{{ $video->video_name }}" class="border-4 p-[10px] rounded-xl mb-[20px]">
            <input type="hidden" value="{{ $video->id }}">
            <button class="bg-[orange] w-[120px] p-[10px] rounded-full hover:bg-[#ffd483] transition-all">Submit</button>
        </form>
    </div>
</div>

@endsection

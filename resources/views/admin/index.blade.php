@extends("../admin/leyout/admin")
@section('main_content')
<div>
    <?php
    $str = "";
    foreach($videos as $video){
        $str .= $video->id. ",";
    }
    $str = rtrim($str, ",");
    ?>
    <a href="{{ route("admin.updateInfo", ["id" => $str]) }}" class="w-[80px] bg-[#aca9ff] p-[10px] relative top-[-70px] left-[40px] rounded-full text-center hover:bg-[#918dff] z-[101]">UPDATE ALL</a>
</div>
<div class="selectable bg-[#f4f4ff] w-[70%] h-[50px] rounded-full flex m-auto p-[15px] invisible">
    <div class="selected w-[80%]">
        <p id="selected_cards_text">Selected: 2 videos</p>
    </div>
    <div class="buttons flex relative gap-[10px] top-[-7px] ">
        <a href="{{ route("admin.deleteVideo", ["id" => "1"]) }}"><p class="w-[80px] bg-[#ff9d9d] p-[5px] rounded-full text-center hover:bg-[#fb7b7b]" id="delete_btn">DELETE</p></a>
        <a href="{{ route("admin.updateInfo", ["id" => 1]) }}" ><p class="w-[80px] bg-[#aca9ff] p-[5px] rounded-full text-center hover:bg-[#918dff]" id="update_btn">UPDATE</p></a>
        <a href="{{ route("admin.editVideo", ["id" => "1"]) }}"><p class="w-[80px] bg-[#b5ffcd] p-[5px] rounded-full text-center hover:bg-[#8afdae]" id="edit_btn">EDIT</p></a>
    </div>
</div>
<div class="w-[70%] flex m-auto flex-wrap mt-[20px] gap-[50px] transition-all mb-[70px]">
@foreach ($videos as $video)
        <div class="w-[400px] min-h-[320px] bg-opacity-80 rounded-lg transition-all">
        <div class="w-[400px] h-[250px] hover:shadow-2xl group/card transition-all" id="{{ $video->id }}">
        {!! $video->video_html_code !!}
        <div class="flex">
        <h1 class="w-[300px]">{{$video->video_name}}</h1>
        <i class="fa-regular fa-circle-check text-[27px] relative top-[15px] left-[40px] text-[gray] hover:text-[black] hover:scale-[1.2] invisible cursor-pointer group-hover/card:visible group-hover/card:transition-all"></i>
        </div>
        <p>Views: {{$video->video_views}} </p>
        </div>
        </div>
@endforeach
</div>
@endsection

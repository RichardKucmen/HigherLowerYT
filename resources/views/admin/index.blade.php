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
    <a href="{{ route("admin.updateInfo", ["id" => $str]) }}" class="w-[80px] bg-[#f4f4ff] p-[10px] relative left-[10px] top-[-10px] rounded-full text-center hover:bg-[#c8c6ff] z-[20] transition-all sm:left-[40px]">UPDATE ALL</a>
    <i class="fa-solid fa-magnifying-glass bg-[#f4f4ff] text-[24px] w-[45px] p-[10px] rounded-full relative left-[10px] top-[-6px] hover:bg-[#c8c6ff] transition-all cursor-pointer sm:left-[40px]" id="search_btn"></i>
</div>
    <div class="selectable bg-[#f4f4ff] w-[95%] h-[50px] rounded-full flex m-auto p-[15px] invisible sm:w-[70%]">
    <div class="search_input w-[93%] absolute z-[100] invisible sm:w-[70%]">
        <input type="text" class="w-[99%] h-[50px] relative top-[-15px] rounded-full bg-[#f4f4ff] outline-none" placeholder="Search..." id="search_input">
    </div>
    <div class="selected w-[80%]">
        <p id="selected_cards_text" class="text-[15px]">Selected: 2</p>
    </div>
    <div class="buttons flex relative gap-[5px] top-[-7px] sm:gap-[10px]">
        <a href="{{ route("admin.editVideo", ["id" => "1"]) }}"><p class="w-[70px] bg-[#b5ffcd] p-[5px] rounded-full text-center hover:bg-[#8afdae] sm:w-[80px]"  id="edit_btn">EDIT</p></a>
        <a href="{{ route("admin.deleteVideo", ["id" => "1"]) }}"><p class="w-[70px] bg-[#ff9d9d] p-[5px] rounded-full text-center hover:bg-[#fb7b7b] sm:w-[80px]"  id="delete_btn">DELETE</p></a>
        <a href="{{ route("admin.updateInfo", ["id" => 1]) }}" ><p class="w-[70px] bg-[#aca9ff] p-[5px] rounded-full text-center hover:bg-[#918dff] sm:w-[80px]" id="update_btn">UPDATE</p></a>
    </div>
</div>
<div class="w-[70%] flex m-auto flex-wrap mt-[20px] gap-[50px] transition-all mb-[70px] justify-center">
<?php$timer = 0;?>
@foreach ($videos as $index => $video)
<?php $timer = $index * 0.1; ?>
<div class="w-[300px] min-h-[320px] bg-opacity-80 rounded-lg transition-all video opacity-0 sm:w-[400px]" style="animation-delay: {{$timer}}s;">
    <div class="w-[300px] h-[250px] hover:shadow-2xl group/card transition-all sm:w-[400px]" id="{{ $video->id }}">
        {!! $video->video_html_code !!}
        <div class="flex">
            <h1 class="w-[300px] pt-[5px]">{{$video->video_name}}</h1>
            <i class="fa-regular fa-circle-check text-[27px] relative top-[20px] left-[-10px]   hover:text-[black] scale-[1.2] hover:scale-[1.5] invisible cursor-pointer group-hover/card:visible group-hover/card:transition-all sm:left-[40px]"></i>
        </div>
        <p>Views: {{$video->video_views}} </p>
    </div>
</div>
@endforeach

</div>
@endsection

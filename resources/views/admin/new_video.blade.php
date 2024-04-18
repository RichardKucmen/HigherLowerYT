@extends("../admin/leyout/admin")
@section('main_content')
<div class="w-[70%] m-auto flex gap-[50px]">
    <div class="thumbnail w-[50%]">
            <img src="https://t4.ftcdn.net/jpg/03/24/14/35/360_F_324143588_Jk9uwkSlhuSEyrGWkuQT7MM6mFbCayIj.jpg" class="w-[100%]" alt="" id="thumbnail_img">
    </div>
    <form action="{{route("admin.addVideo")}}" method="POST" class="flex flex-col w-[50%]">
    @csrf
    <label for="video_link" class="m-[3px]">Video link</label>
    <input type="text" id="video_link" placeholder="Link" name="video_link" class="border-4 p-[10px] rounded-xl mb-[20px]">
    <label for="video_name" class="m-[3px]">Video name</label>
    <input type="text" id="video_name" placeholder="Name" name="video_name" class="border-4 p-[10px] rounded-xl mb-[20px]">
    <button class="bg-[orange] w-[120px] p-[10px] rounded-full hover:bg-[#ffd483] transition-all">Submit</button>
    </form>
</div>

<script src="{{ asset('../resources/js/new_video.js') }}"></>
@endsection


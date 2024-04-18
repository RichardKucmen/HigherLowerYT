let video_link = document.getElementById("video_link")
let thumbnail_img = document.getElementById("thumbnail_img")
video_link.addEventListener("input", function(event){
    if(event.target.value.length > 35){
        let videoId = event.target.value.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/)[1];
        const imageURL = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
        thumbnail_img.src = imageURL;
    }
})


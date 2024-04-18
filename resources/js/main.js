let nav = document.getElementById("nav")
window.addEventListener("scroll", function(){
    let y = window.scrollY;
    if(y >= 50){
        nav.classList.remove("border-b-[2px]")
        nav.classList.remove("text-[black]")
        nav.classList.add("text-[white]")
        nav.classList.add("bg-[#313638]")
    } else{
        nav.classList.add("border-b-[3px]")
        nav.classList.add("text-[black]")
        nav.classList.remove("text-[white]")
        nav.classList.remove("bg-[#313638]")
    }
})
let checks = document.querySelectorAll(".fa-circle-check")
let selectable = document.querySelector(".selectable")
let edit_btn = document.getElementById("edit_btn")
let delete_btn = document.getElementById("delete_btn")
let update_btn = document.getElementById("update_btn")
let selected_cards = []
let selected_cards_text = document.getElementById("selected_cards_text")
checks.forEach(function(check){
    check.addEventListener("click", function(event){
        if(event.target.classList.contains("text-[blue]")){
            event.target.classList.remove("text-[blue]")
            event.target.classList.add("hover:text-[black]")
            event.target.classList.add("invisible")
            event.target.classList.remove("visible")
            event.target.classList.remove("scale-[1.2]")
            event.target.parentNode.parentNode.classList.remove("scale-[0.9]")
            event.target.parentNode.parentNode.classList.remove("shadow-2xl")
            event.target.parentNode.parentNode.parentNode.classList.remove("bg-[#f4f4ff]")
            var index = selected_cards.indexOf(event.target.parentNode.parentNode.id);
            selected_cards.splice(index, 1);
        } else{
            event.target.classList.add("text-[blue]")
            event.target.classList.remove("hover:text-[black]")
            event.target.classList.remove("invisible")
            event.target.classList.add("visible")
            event.target.classList.add("scale-[1.2]")
            event.target.parentNode.parentNode.classList.add("scale-[0.9]")
            event.target.parentNode.parentNode.classList.add("shadow-2xl")
            event.target.parentNode.parentNode.parentNode.classList.add("bg-[#f4f4ff]")
            selected_cards.push(event.target.parentNode.parentNode.id)
        }
        if(selected_cards.length == 0){
            event.target.parentNode.parentNode.parentNode.parentNode.classList.add("mt-[20px]");
            event.target.parentNode.parentNode.parentNode.parentNode.classList.remove("mt-[50px]");
            selectable.classList.add("invisible")
            selectable.classList.remove("transition-all")
        }else{
            event.target.parentNode.parentNode.parentNode.parentNode.classList.remove("mt-[20px]");
            event.target.parentNode.parentNode.parentNode.parentNode.classList.add("mt-[50px]");
            selectable.classList.remove("invisible")
            selectable.classList.add("transition-all")
            delete_btn.parentNode.href = `http://localhost/HigherLowerYT/public/admin/video/delete/${selected_cards}`
            update_btn.parentNode.href = `http://localhost/HigherLowerYT/public/admin/video/updateInfo/${selected_cards}`
        }
        if(selected_cards.length == 1){
            edit_btn.classList.remove("invisible")
            edit_btn.classList.add("visible")
            edit_btn.parentNode.href = `http://localhost/HigherLowerYT/public/admin/video/edit/${selected_cards}`
        } else{
            edit_btn.classList.remove("visible")
            edit_btn.classList.add("invisible")
        }
        selected_cards_text.textContent = `Selected: ${selected_cards.length } videos`
    })
})



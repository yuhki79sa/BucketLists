const ClickedBtns = document.querySelectorAll(".like-button");
for( let index = 0; index < ClickedBtns.length; index ++){
    ClickedBtns[index].addEventListener( "click", async (e)=>{
        const ClickedEl = e.target;
        ClickedEl.classList.toggle("liked");
        
        
        const postId = ClickedEl.id;
        try{
            
            const res = await fetch("/post/like", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ post_id: postId}),
            });
            
            const data = await res.json();
            ClickedEl.nextElementSibling.innerHTML = data.likesCount;
           
        }catch(error){
            alert("処理が失敗しました");
        } 
    })

}
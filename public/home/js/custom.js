// to get current year
// function getYear() {
//     var currentDate = new Date();
//     var currentYear = currentDate.getFullYear();
//     document.querySelector("#displayYear").innerHTML = currentYear;
// }

// getYear();


/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

//Rating stars

    //Display rating box and btn
    const btn_rating = document.querySelector(".btn_rating_active");
    const rating_box = document.querySelector(".rating-box");
    const rating_submit = document.querySelector("#ratingBtn")
    btn_rating.addEventListener("click",()=>{
        btn_rating.classList.add('btn_rating_disabled');
        btn_rating.classList.remove('btn_rating_active');
        rating_box.classList.add('rating-active');
        rating_box.classList.remove('rating-disabled');
        rating_submit.classList.remove('disabled');
    })

    //Select all elements with 'i' tag and store them in a NodeList called "stars"
    const stars = document.querySelectorAll(".stars i");
    const ratingValueInput = document.querySelector("#ratingValue");
    //Loop through 'stars' Nodelist
    var selectRating;
    stars.forEach((star,index1) => {
        star.addEventListener("click",()=>{
            selectRating = index1+1;
            console.log(index1+1)
            console.log("select: "+selectRating);
            ratingValueInput.value = selectRating.toString();
            // Loop through the "stars" NodeList again
            stars.forEach((star,index2)=>{
                index1 >= index2 ? star.classList.add("active"): star.classList.remove('active')
            })
        })
    })
    document.addEventListener('DOMContentLoaded', function() {
        var commentForm = document.getElementById('commentForm');
        var ratingNotification = document.getElementById('ratingNotification');

        commentForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Kiểm tra xem người dùng đã đánh giá hay chưa
            var ratingValue = document.getElementById('ratingValue').value;
            var commentValue = document.getElementById('commentValue').value;
            if (ratingValue === '') {
                // Hiển thị thông báo yêu cầu đánh giá
                ratingNotification.style.display = 'block';
            } else if(commentValue === ''){
                commentNotification.style.display = 'block'
            }else {
                // Gửi biểu mẫu bình luận
                commentForm.submit();
            }
        });
    });
    
//Scroll
    document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function (e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };



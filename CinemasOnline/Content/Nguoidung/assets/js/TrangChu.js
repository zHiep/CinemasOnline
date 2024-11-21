
		const buyBtns = document.querySelectorAll('.js-buy-movie')
		const modal = document.querySelector('.js-modal')
        // click X 
		const modalContainer = document.querySelector('.js-modal-container') 
		const modalClose = document.querySelector('.js-modal-close') 
		const modalFtClose = document.querySelector('.js-btn-close')
		// Hàm hiển thị  modal mua vé ( thêm class open vào modal)
		function hideBuyMovie(){
			modal.classList.remove('open')
		}
		// Hàm ẩn modal mua vé ( Gỡ bõ class open của modal)
		function showBuyMovie(){
			modal.classList.add('open')
		}
		// Lặp qua từng thẻ Button và nghe hành vi click
		for(const buyBtn of buyBtns){
			buyBtn.addEventListener('click',showBuyMovie)
		}
		

		// Nghe hành vi click vào dấu x
		modalClose.addEventListener('click',hideBuyMovie)

		modal.addEventListener('click',hideBuyMovie)

		modalContainer.addEventListener('click',function(event){
			event.stopPropagation()
		})
		modalFtClose.addEventListener('click',hideBuyMovie)
 


// <!-- modal 2 -->

    const buyBtns2 = document.querySelectorAll('.js_buy--movie-2')
    const modal2 = document.querySelector('.js_modal--2')
    // click X 
		const modalContainer2 = document.querySelector('.js_modal--container--2')

    const modalClose2 = document.querySelector('.js_modal--close-2') 
    const modalFtClose2 = document.querySelector('.js_btn--close-2')
    // Hàm hiển thị  modal mua vé ( thêm class open vào modal)
    function hideBuyMovie2(){
        modal2.classList.remove('open')
    }
    // Hàm ẩn modal mua vé ( Gỡ bõ class open của modal)
    function showBuyMovie2(){ 
        modal2.classList.add('open')
    }
    // Lặp qua từng thẻ Button và nghe hành vi click
    for(const buyBtn2 of buyBtns2){
        buyBtn2.addEventListener('click',showBuyMovie2)
    }
    

    // Nghe hành vi click vào dấu x
    modalClose2.addEventListener('click',hideBuyMovie2)

    modal2.addEventListener('click',hideBuyMovie2)

    modalContainer2.addEventListener('click',function(event){
        event.stopPropagation()
    })
    modalFtClose2.addEventListener('click',hideBuyMovie2)



/* TABLINk  viewdate */
        var tabLinks = document.querySelectorAll(".tablinks");
        
        var btn1 = document.querySelector(".tablinks")
        var btn2 = document.querySelector(".tabcontent")
        btn1.classList.add('active')
        btn2.classList.add('active1')
        tabLinks.forEach(function(el) {
        el.addEventListener("click", (el) => {
            var tabContent =document.querySelectorAll(".tabcontent");
            var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
            console.log(btn)
            var electronic = btn.getAttribute('electronic'); // lấy giá trị trong data-electronic
            console.log(electronic)
            tabContent.forEach(function(el) {
                el.classList.remove("active1");
            }); //lặp qua các tab content để remove class active
    
            tabLinks.forEach(function(el) {
                el.classList.remove("active");
            }); //lặp qua các tab links để remove class active
    
            document.querySelector("#" + electronic).classList.add("active1");
            // trả về phần tử đầu tiên có id="" được add class active
            
            btn.classList.add("active");
            // các button mà chúng ta click vào sẽ được add class active
            });


        });


/* TABLINk movie_status */

        var tabLinks_grid = document.querySelectorAll(".tablinks_grid");
        
        var btn1_grid = document.querySelector(".tablinks_grid")
        var btn2_grid = document.querySelector(".tabcontent_grid")
        btn1_grid.classList.add('active')
        btn2_grid.classList.add('active1')
        tabLinks_grid.forEach(function(el) {
        el.addEventListener("click", (el) => {
            var tabContent_grid =document.querySelectorAll(".tabcontent_grid");
            var btn_grid = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
            console.log(btn_grid)
            var electronic = btn_grid.getAttribute('electronic'); // lấy giá trị trong data-electronic
            console.log(electronic)
            tabContent_grid.forEach(function(el) {
                el.classList.remove("active1");
            }); //lặp qua các tab content để remove class active
    
            tabLinks_grid.forEach(function(el) {
                el.classList.remove("active");
            }); //lặp qua các tab links để remove class active
    
            document.querySelector("#" + electronic).classList.add("active1");
            // trả về phần tử đầu tiên có id="" được add class active
            
            btn_grid.classList.add("active");
            // các button mà chúng ta click vào sẽ được add class active
            });


        });


/* SLIDE SHOW */
    const carouselSlide = document.querySelector('.carousel-slide');
    const images = document.querySelectorAll('.carousel-slide img');
    const prevBtn = document.querySelector('#prevBtn');
    const nextBtn = document.querySelector('#nextBtn');
    const dots = document.querySelectorAll('.dot');

    let counter = 0;
    const size = images[0].clientWidth;

    // Thiết lập vị trí ban đầu
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    updateActiveDot(); // Khởi tạo dấu chấm đầu tiên

    function moveToNextSlide() {
        if (counter >= images.length - 1) {
            counter = 0; // Quay lại ảnh đầu tiên
        } else {
            counter++; // Chuyển đến ảnh tiếp theo
        }
        updateCarousel();
    }

    function moveToPrevSlide() {
        if (counter <= 0) {
            counter = images.length - 1; // Quay lại ảnh cuối cùng
        } else {
            counter--; // Chuyển đến ảnh trước
        }
        updateCarousel();
    }

    // Cập nhật carousel và dấu chấm
    function updateCarousel() {
        carouselSlide.style.transition = "transform 0.4s ease-in-out";
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        updateActiveDot();
    }

    // Cập nhật dấu chấm hoạt động
    function updateActiveDot() {
        dots.forEach((dot, index) => {
            dot.classList.toggle('activeDot', index === counter);
        });
    }

    // Nút Next
    nextBtn.addEventListener('click', moveToNextSlide);

    // Nút Previous
    prevBtn.addEventListener('click', moveToPrevSlide);

    // Tự động chuyển ảnh mỗi 5 giây
    setInterval(moveToNextSlide, 5000);

    // Sự kiện cho các dấu chấm
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            counter = parseInt(dot.dataset.index); // Cập nhật chỉ số
            updateCarousel(); // Cập nhật carousel và dấu chấm
        });
    });


// Nút di chuyển lên đầu trang
    // Khi người dùng cuộn xuống 20px từ đỉnh trang, hiển thị nút
    window.onscroll = function() {scrollFunction()};

    // Nút di chuyển lên đầu trang
    function scrollFunction() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            document.getElementById("backToTopBtn").style.display = "block";
        } else {
            document.getElementById("backToTopBtn").style.display = "none";
        }
    }

    // Hàm để cuộn từ từ lên đầu trang
    function scrollToTop() {
        const scrollStep = -window.scrollY / 20; // Tốc độ cuộn, càng lớn càng chậm
        const interval = setInterval(function() {
            if (window.scrollY !== 0) {
                window.scrollBy(0, scrollStep); // Di chuyển mỗi lần theo scrollStep
            } else {
                clearInterval(interval); // Dừng khi tới đầu trang
            }
        }, 16); // Thời gian giữa các bước (16ms tương đương 60fps)
    }

    

    
    // CHATBOT
    // Biến để theo dõi trạng thái mở/đóng của chat
    let isChatOpen = false;

    // Mở hoặc đóng cửa sổ chat khi nhấn nút chatBot
    document.getElementById("chatBot").onclick = function() {
        const chatScreen = document.getElementById("chatScreen");
        const chatBody = document.querySelector('.chat-body');

        if (isChatOpen) {
            chatScreen.style.display = "none"; // Đóng chat
        } else {
            chatScreen.style.display = "block"; // Mở chat
            scrollToBottom(); // Cuộn xuống dưới cùng khi mở chat
        }

        // Cập nhật trạng thái sau khi nhấn nút
        isChatOpen = !isChatOpen;
    };

    // Đóng cửa sổ chat khi nhấn vào nút Đóng
    document.getElementById("closeChat").onclick = function() {
        document.getElementById("chatScreen").style.display = "none";
        isChatOpen = false; // Đặt lại trạng thái
    };

    // Hàm tự động cuộn xuống dưới cùng của chat-body
    function scrollToBottom() {
        var chatBody = document.querySelector('.chat-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // Mỗi khi thêm tin nhắn mới, gọi hàm này
    function addNewMessage(message, isAdmin = false) {
        const chatBody = document.querySelector('.chat-body');

        // Tạo phần tử tin nhắn
        const messageDiv = document.createElement('div');
        messageDiv.classList.add(isAdmin ? 'imgAdminChat' : 'imgUserChat');
        
        const iconDiv = document.createElement('div');
        iconDiv.classList.add(isAdmin ? 'iconAdmin' : 'iconUser');
        
        const icon = document.createElement('i');
        icon.classList.add('fa-solid', isAdmin ? 'fa-user-tie' : 'fa-user');
        iconDiv.appendChild(icon);

        const messageText = document.createElement('p');
        messageText.classList.add(isAdmin ? 'adminChatBot' : 'userChatBot');
        messageText.textContent = message;

        // Gắn icon và tin nhắn vào đúng vị trí
        messageDiv.appendChild(isAdmin ? iconDiv : messageText);
        messageDiv.appendChild(isAdmin ? messageText : iconDiv);
        
        chatBody.appendChild(messageDiv);

        // Gọi hàm cuộn xuống sau khi thêm tin nhắn
        scrollToBottom();
    }

    // Ví dụ thêm tin nhắn người dùng
    // addNewMessage('Hiệp ăn cứt bú buồi');

    // Ví dụ thêm tin nhắn admin
    // addNewMessage('Xin chào! Làm thế nào để giúp bạn hôm nay?', true);

    

    // Lấy các phần tử từ HTML
    const chatScreen = document.getElementById('chatScreen');
    const chatInput = document.getElementById('chatInput');
    const chatBody = document.getElementById('chatBody');
    const sendBtn = document.getElementById('sendBtn');
    const closeChat = document.getElementById('closeChat');

    // Hiển thị cửa sổ chat khi người dùng nhập tin nhắn
    chatInput.addEventListener('focus', () => {
        chatScreen.style.display = 'block'; // Hiển thị cửa sổ chat
    });

    // Ẩn cửa sổ chat khi nhấn nút đóng
    closeChat.addEventListener('click', () => {
        chatScreen.style.display = 'none'; // Ẩn cửa sổ chat
    });

    // Hàm gửi tin nhắn
    function sendMessage() {
        const message = chatInput.value.trim(); // Lấy giá trị từ input và xóa khoảng trắng
        if (message !== '') {
            // Tạo phần tử tin nhắn của người dùng
            const userMessageDiv = document.createElement('div');
            userMessageDiv.classList.add('imgUserChat'); // Thêm class cho khung tin nhắn

            const messageText = document.createElement('p');
            messageText.classList.add('userChatBot'); // Thêm class cho nội dung tin nhắn
            messageText.textContent = message; // Đặt nội dung tin nhắn

            // Thêm thời gian gửi tin nhắn
            const timeStamp = document.createElement('span');
            timeStamp.classList.add('timeStamp');
            timeStamp.textContent = getCurrentTime(); // Lấy thời gian hiện tại

            // Thêm thời gian vào tin nhắn
            messageText.appendChild(timeStamp);

            const userIcon = document.createElement('div');
            userIcon.classList.add('iconUser'); // Thêm icon người dùng
            userIcon.innerHTML = '<i class="fa-solid fa-user"></i>';

            // Thêm tin nhắn và icon vào div cha
            userMessageDiv.appendChild(messageText);
            userMessageDiv.appendChild(userIcon);

            // Thêm tin nhắn vào phần chat body
            chatBody.appendChild(userMessageDiv);

            // Cuộn xuống tin nhắn mới nhất
            chatBody.scrollTop = chatBody.scrollHeight;

            // Xóa nội dung ô nhập sau khi gửi
            chatInput.value = '';
        }
    }

    // Gửi tin nhắn khi nhấn nút gửi
    sendBtn.addEventListener('click', sendMessage);

    // Gửi tin nhắn khi nhấn phím "Enter"
    chatInput.addEventListener('keyup', (event) => {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    // Hàm lấy thời gian hiện tại
    function getCurrentTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        return `${hours}:${minutes}`;
    }
      

    // POPUP Trailer
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('trailerPopup');
        const trailerVideo = document.getElementById('trailerVideo');
        const closeBtn = document.querySelector('.popup .close');
        const movieHovers = document.querySelectorAll('.movie_content--hover');
    
        // Khi bấm vào phần tử có class movie_content--hover
        movieHovers.forEach(movieHover => {
            movieHover.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn hành động mặc định
                trailerVideo.src = trailerVideo.getAttribute('data-video-src'); // Thiết lập lại nguồn video từ data attribute
                popup.style.display = 'block'; // Hiển thị popup
            });
        });
    
        // Đóng popup khi bấm vào dấu X
        closeBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn hành động mặc định
            popup.style.display = 'none';
            trailerVideo.src = ""; // Dừng video khi đóng popup
        });
    
        // Đóng popup khi bấm vào vùng ngoài popup-content
        popup.addEventListener('click', function(event) {
            if (event.target === popup) { // Nếu click vào popup (không phải nội dung)
                popup.style.display = 'none'; // Ẩn popup
                trailerVideo.src = ""; // Dừng video khi đóng popup
            }
        });
    });


    // POPUP Trailer Two
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('trailerPopupTwo');
        const trailerVideo = document.getElementById('trailerVideoTwo');
        const closeBtn = document.querySelector('.popup .closeTwo');
        const movieHovers = document.querySelectorAll('.movie_content--hover');
    
        // Khi bấm vào phần tử có class movie_content--hover
        movieHovers.forEach(movieHover => {
            movieHover.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn hành động mặc định
                trailerVideo.src = trailerVideo.getAttribute('data-video-src'); // Thiết lập lại nguồn video từ data attribute
                popup.style.display = 'block'; // Hiển thị popup
            });
        });
    
        // Đóng popup khi bấm vào dấu X
        closeBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn hành động mặc định
            popup.style.display = 'none';
            trailerVideo.src = ""; // Dừng video khi đóng popup
        });
    
        // Đóng popup khi bấm vào vùng ngoài popup-content
        popup.addEventListener('click', function(event) {
            if (event.target === popup) { // Nếu click vào popup (không phải nội dung)
                popup.style.display = 'none'; // Ẩn popup
                trailerVideo.src = ""; // Dừng video khi đóng popup
            }
        });
    });
    

    // Mở và đóng sidebar menu trên tablet
    const menuIcon = document.getElementById("menuIcon");
    const sidebarMenu = document.getElementById("sidebarMenu");

    menuIcon.addEventListener("click", () => {
        sidebarMenu.classList.toggle("activeSidebar");
    });

    // Đóng sidebar khi click ra ngoài menu
    window.addEventListener("click", (event) => {
        if (!menuIcon.contains(event.target) && !sidebarMenu.contains(event.target)) {
            sidebarMenu.classList.remove("activeSidebar");
        }
    });


    // NÚT TÌM KIẾM
    const searchContainer = document.querySelector('.search-container');
    const searchIcon = document.getElementById('searchIcon');
    const searchInput = document.getElementById('searchInput');

    // Xử lý sự kiện click vào biểu tượng tìm kiếm
    searchIcon.addEventListener('click', () => {
        searchContainer.classList.toggle('open'); // Thêm class 'open' để mở rộng thanh tìm kiếm
        if (searchContainer.classList.contains('open')) {
            searchInput.focus(); // Đưa con trỏ vào thanh input khi mở
        }
    });

      


// đổi màu ghế khi click

// document.querySelector('.cough_click').onclick = function() {
//     document.querySelector('.cough_click').style.color = '#03599E'
// }

// Đổi màu ghế khi Click
let couchList = document.querySelectorAll('.seat_option--row .fa-couch');
couchList.forEach(item => {
    item.addEventListener('click', function(event) {
        const textColor = document.querySelector(`.couch${item.getAttribute('data-key')}`);
    const numColor = textColor.querySelector(`.couch_number`);
    if(textColor.style.color == 'rgb(3, 89, 158)') {
        textColor.style.color = '#BABBC4'; 
        numColor.style.color = '#000'
    } else {
        textColor.style.color = '#03599E';
        numColor.style.color = '#fff'
    }

        // Hiện số ghế khi Click
        var itemChild = item.querySelector('.couch_position');
        var itemNew = itemChild.cloneNode(true);
        let checkIsset  = false;
        itemNew.classList.remove('couch_number');
        itemNew.style.color = '#000';
        itemNew.style.marginRight = '7px';
        let listCart = document.querySelectorAll('.ticket_text--seat .couch_position');
        listCart.forEach(cart =>{
            if(cart.getAttribute('data-key2') == itemNew.getAttribute('data-key2')){
                checkIsset = true;
                cart.remove();
            }
        })
        if(checkIsset == false){
            document.querySelector('.ticket_text--seat').appendChild(itemNew);

    }

    // Tổng số ghế đã đặt và tổng tiền thanh toán 
    let soPhanTu = document.querySelector('.ticket_text--seat');
    let soGhe = soPhanTu.querySelectorAll('*').length;
    let hienthiGhe = document.querySelector('.seat_number span');
    hienthiGhe.innerHTML = soGhe;
    let tongTien = document.querySelector('.seat_totalPrice span');
    let chiPhi = soGhe * 40000;
    tongTien.innerHTML = chiPhi;

    

    });
})
// function changeColor(num){
//     const textColor = document.querySelector(`.couch${num}`);
//     const numColor = textColor.querySelector(`.couch_number`);
//     if(textColor.style.color == 'rgb(3, 89, 158)') {
//         textColor.style.color = '#BABBC4'; 
//         numColor.style.color = '#000'
//     } else {
//         textColor.style.color = '#03599E';
//         numColor.style.color = '#fff'
//     }
    
// }


// let couchClick = document.getElementById('#1');

//     couchClick.addEventListener('click', function(event) {
//         if(event.target.classList.contains('couch1')){
//             var iconNew = icon.cloneNode(true);
//             let checkIsset  = false;

//             let listCart = document.querySelector();
//             listCart.forEach(cart =>{
//                 if(cart.getAttribute('data-key') == iconNew.getAttribute('data-key')){
//                     checkIsset = true;
//                 }
//             })
//             if(checkIsset == false){
//                 document.querySelector('.seat_number').appendChild(iconNew);
//             }

//         }
//     })

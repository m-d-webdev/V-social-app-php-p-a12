


// let container = document.querySelector(".containerFATHER");
// let cnt_BET = document.querySelector(".cnt_betwin");
// let cnt_post = document.querySelector(".containerPOSTSS");
// let i=1;
// arr_likimm=[];
// window.onload = () => {
//     for (let n = 0; n < 10; n++) {
//         let cloned_cnt = cnt_post.cloneNode(true);
//         cnt_BET.append(cloned_cnt)
//         cloned_cnt.classList.add("add_display");
//         arr_likimm.push(cloned_cnt.querySelector(".lik_img"))
//         arr_likimm.push(cloned_cnt.querySelector(".unlik_img"))
//         cloned_cnt.querySelector(".cnt_info_other h4").innerHTML = `user -${i}`;
//         cloned_cnt.querySelector('.cnt_image_OTH img').src = '';
//         cloned_cnt.querySelector(".date_publish").innerHTML = `0000-00-${i}`;
//         cloned_cnt.querySelector(".descriptio_text").innerHTML = `hello from user${i}`;
//         cloned_cnt.querySelector(".cnt_img_vd img")
//         i++;
//     }
//     arr_likimm.forEach((img) => {
//         img.addEventListener("click", () => {
//             if (img.src.match("1.png")) {
//                 img.src = "2.png";
//                 let indx = arr_likimm.indexOf(img) + 1;
//                 arr_likimm[indx].src = "3.png"

//             } else if (img.src.match("3.png")) {
//                 img.src = "4.png"
//                 let indx = arr_likimm.indexOf(img) - 1;
//                 arr_likimm[indx].src = "1.png"
//             } else if (img.src.match("2.png")) {
//                 img.src = "1.png"
//                 let indx = arr_likimm.indexOf(img) + 1;
//                 arr_likimm[indx].src = "3.png"
//             } else {
//                 img.src = "3.png"
//                 let indx = arr_likimm.indexOf(img) - 1;
//                 arr_likimm[indx].src = "1.png"
//             }
//         })
//     })
// }

// window.onscroll=()=>{
//     if((container.offsetHeight + container.scrollTop)>=cnt_BET.offsetHeight ){
//         for (let n = 0; n < 5; n++) {
//             let cloned_cnt = cnt_post.cloneNode(true);
//             cnt_BET.append(cloned_cnt)
//             cloned_cnt.classList.add("add_display");
//             arr_likimm.push(cloned_cnt.querySelector(".lik_img"))
//             arr_likimm.push(cloned_cnt.querySelector(".unlik_img"))
//             cloned_cnt.querySelector(".cnt_info_other h4").innerHTML = `user -${i}`;
//             cloned_cnt.querySelector('.cnt_image_OTH img').src = '';
//             cloned_cnt.querySelector(".date_publish").innerHTML = `0000-00-${i}`;
//             cloned_cnt.querySelector(".descriptio_text").innerHTML = `hello from user${i}`;
//             cloned_cnt.querySelector(".cnt_img_vd img")
//             i++;
//         }
//     }
// }
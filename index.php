<?php
$con = mysqli_connect("localhost", "root", "", "base2");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetmp = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $fileerror = $_FILES['file']['error'];
    $body = $_POST['body'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));


    $Allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $Allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 1000000) {
                $filenameNEW = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = 'images/' . $filenameNEW;
                move_uploaded_file($filetmp, $fileDestination);
                try {
                    $quey = "INSERT INTO  posts(cin , body , link)  VALUES ( '$cin','$body','$fileDestination')  ;";
                    $exec = mysqli_query($con, $quey);
                    header("Location: index.php");
                } catch (\Throwable $th) {
                    echo "error son in insering " . $th->getMessage();
                }
            } else {
                echo "your file is to big";
            }
        } else {
            echo "there was an error uploading your file";
        }
    } else {
        echo "you cannot upload file of this type";
    }
}
$SELECT = "SELECT * FROM posts ;";
$execute4 = mysqli_query($con, $SELECT);
$array1 = array();
$array2 = array();
$array3 = array();

// $arrayobj = new ArrayObject();
// $arrayobj->append($row2);

while ($row2 = mysqli_fetch_assoc($execute4)) {
    array_push($array1, $row2["cin"]);
    array_push($array2, $row2["body"]);
    array_push($array3, $row2["link"]);

}

// $conn = mysqli_connect("localhost", "root", "", "company");
// Check connection
    // for ($x = 0; $x != count($array1); $x++) {
    //     print_r( $array1[$x].", ");
    // }










?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="c_post">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="body" placeholder="creat a public post">
            <input type="file" name="file" id="">
            <button type="submit">POST</button>
        </form>
    </div>
    <div class="containerFATHER">
        <div class="cnt_betwin">
            <div class="containerPOSTSS">
                <div class="othuserFis">
                    <div class="cnt_image_OTH"><img src="" alt=""></div>
                    <div class="cnt_info_other">
                        <h4><img src="verify.png" class="verf_img" alt=""></h4>
                        <p class="date_publish"></p>
                    </div>
                    <button type="button" class="follow_btn">Follow</button>
                    <button type="button" class="add_friend_btn"><img src="add-friend.png" alt=""></button>
                    <button type="button" class="more_option"><img src="option.png" alt=""></button>
                </div>
                <div class="descriptio_text">
                    <p>3abdelha9</p>
                </div>
                <div class="cnt_img_vd">
                    <img src="img4.jpeg" alt="">
                </div>
                <div class="intractio">
                    <img src="1.png" class="lik_img" alt="">
                    <img src="3.png" class="unlik_img" alt="">
                    <img src="commenter.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <script>
        let container = document.querySelector(".containerFATHER");
        let cnt_BET = document.querySelector(".cnt_betwin");
        let cnt_post = document.querySelector(".containerPOSTSS");
        let i = 1;

        let myarray1= <?php  echo json_encode($array1) ?>;
        let myarray2= <?php  echo json_encode($array2) ?>;
        let myarray3= <?php  echo json_encode($array3) ?>;


        arr_likimm = [];
        window.onload = () => {
            for (let n = myarray1.length-1 ; n >=0 ; n--) {
                let cloned_cnt = cnt_post.cloneNode(true);
                cnt_BET.append(cloned_cnt)
                cloned_cnt.classList.add("add_display");
                arr_likimm.push(cloned_cnt.querySelector(".lik_img"))
                arr_likimm.push(cloned_cnt.querySelector(".unlik_img"))
                cloned_cnt.querySelector(".cnt_info_other h4").innerHTML =myarray1[n];
                cloned_cnt.querySelector('.cnt_image_OTH img').src = '';
                cloned_cnt.querySelector(".date_publish").innerHTML = `0000-00-${i}`;
                cloned_cnt.querySelector(".descriptio_text").innerHTML = myarray2[n];
                cloned_cnt.querySelector(".cnt_img_vd img").src= myarray3[n]
                i++;
            }
            arr_likimm.forEach((img) => {
                img.addEventListener("click", () => {
                    if (img.src.match("1.png")) {
                        img.src = "2.png";
                        let indx = arr_likimm.indexOf(img) + 1;
                        arr_likimm[indx].src = "3.png"

                    } else if (img.src.match("3.png")) {
                        img.src = "4.png"
                        let indx = arr_likimm.indexOf(img) - 1;
                        arr_likimm[indx].src = "1.png"
                    } else if (img.src.match("2.png")) {
                        img.src = "1.png"
                        let indx = arr_likimm.indexOf(img) + 1;
                        arr_likimm[indx].src = "3.png"
                    } else {
                        img.src = "3.png"
                        let indx = arr_likimm.indexOf(img) - 1;
                        arr_likimm[indx].src = "1.png"
                    }
                })
            })
        }

        container.onscroll = () => {

            if ((container.offsetHeight + container.scrollTop) >= cnt_BET.offsetHeight) {
                for (let n = 0; n < 5; n++) {
                    let cloned_cnt = cnt_post.cloneNode(true);
                    cnt_BET.append(cloned_cnt)
                    cloned_cnt.classList.add("add_display");
                    arr_likimm.push(cloned_cnt.querySelector(".lik_img"))
                    arr_likimm.push(cloned_cnt.querySelector(".unlik_img"))
                    cloned_cnt.querySelector(".cnt_info_other h4").innerHTML = `user -${i}`;
                    cloned_cnt.querySelector('.cnt_image_OTH img').src = '';
                    cloned_cnt.querySelector(".date_publish").innerHTML = `0000-00-${i}`;
                    cloned_cnt.querySelector(".descriptio_text").innerHTML = `hello from user${i}`;
                    cloned_cnt.querySelector(".cnt_img_vd img")
                    i++;
                }
            }
        }
    </script>
</body>

</html>
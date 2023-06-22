<style>
body{
  background-image: url("images/bg-5.jpg");
}
.footer{
  background: #242c42;
    color: azure;
}

.gallery{
  display: flex;
  flex-wrap: wrap;
}
.gallery a{
  position: relative;
  width: 300px;
  height: 300px;
  margin: 10px;
}
.gallery a img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: transform 2s;
    object-fit: cover;
    border-radius: 10px;
}
.gallery a img:hover{
  transform: scale(1.1);
}
h3{
  font-size: 35px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css"/>
</head>
<body>
<?php
include_once("nav.php");
?>

<section class="gallery_section container mt-5 pt-5">

<h3 class="mt-5 text-center fw-bold">Photo Gallery</h3>
<div class="gallery mt-3"> 
<a href="./images/aiubfincompq2302.jpg" class="big" rel="rel1">
  <img src="./images/aiubfincompq2302.jpg" alt="" title="Image 1">
</a>

<a href="./images/health.jpg" class="big" rel="rel1">
  <img src="./images/health.jpg" alt="" title="Image 2">
</a>

<a href="./images/aiubsymp2301.jpg" class="big" rel="rel2">
  <img src="./images/aiubsymp2301.jpg" alt="" title="Image 3">
</a>

<a href="./images/aiubieee2301.png" class="big" rel="rel2">
  <img src="./images/aiubieee2301.png" alt="" title="Image 4">
</a>
<a href="./images/aiubbusplan2301.jpg" class="big" rel="rel1">
  <img src="./images/aiubbusplan2301.jpg" alt="" title="Image 1">
</a>

<a href="./images/aiubfincompq2301.jpg" class="big" rel="rel1">
  <img src="./images/aiubfincompq2301.jpg" alt="" title="Image 2">
</a>

<a href="./images/aiubfincompq2302.jpg" class="big" rel="rel2">
  <img src="./images/aiubfincompq2302.jpg" alt="" title="Image 3">
</a>

<a href="./images/business.jpg" class="big" rel="rel2">
  <img src="./images/business.jpg" alt="" title="Image 4">
</a>

</div>
</section>
<footer class="container-fluid footer mt-5">
      <div class="container text-center py-4">
        <p>Copyright © 2023 AIUB. All Rights Reserved.</p>
      </div>
  </footer>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
 <script>
    lightGallery(document.querySelector(".gallery"));
 </script>
</body>
</html>
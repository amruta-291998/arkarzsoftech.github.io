<style type="text/css">
.wpm_6310_team_style_<?php echo $ids ?>{
  height: 100% !important;
}
.wpm-6310-item-<?php echo $ids ?>{
  <?php 
    if(isset($styleTemplate ) && $styleTemplate == 1){
      echo 'padding-top: 15px !important;';
    }  
  ?>
  width: 100% !important;
}

.wpm-6310-owl-stage{
  display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    min-width: 10317px;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.wpm-6310-owl-item{
  display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: auto !important;
}
  .wpm-6310-tooltip:hover:after {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  background: rgba(0, 119, 181, 1);
  border-radius: 5px;
  color: #fff;
  content: attr(tooltip-href);
  margin: -85px 5px 0;
  font-size: 14px;
  line-height: 25px;
  padding: 8px 10px;
  position: absolute;
  z-index: 999;
  min-width: 140px;
}
.wpm_main_template{
  position: relative;
  z-index: 0;
}
.wpm-6310-row img, .wpm-6310-owl-item img{
  float: left !important;
  width: 100% !important;
}
.wpm_main_template, .wpm_main_template a{
  box-shadow: none !important;
}
.wpm-6310-row{
  width: 100%;
  clear: both;
  text-align: center;
  font-size: 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
.wpm-6310-img-responsive{
  width: 100%;
  height: auto;
}
.wpm_6310_team_style_<?php echo $ids ?> figcaption{
  padding: 0;
  margin: 0;
  border: none;
}
.wpm-6310-owl-carousel .wpm-6310-item-<?php echo $ids; ?>{
  padding: 5px 0;
}
.wpm_6310_team_member_info{
  cursor: pointer;
}
.wpm-6310-col-1{
  width: 100%;
  margin-bottom: 30px;
  float: left;
  position: relative;
}
.wpm-6310-col-2, .wpm-6310-col-3, .wpm-6310-col-4, .wpm-6310-col-5, .wpm-6310-col-6{
  margin-bottom: 30px;
  display: inline-block;
  margin-left: 15px;
  margin-right: 15px;
  vertical-align: top;
}
.wpm-6310-col-2{
  width: calc(50% - 30px);
}
.wpm-6310-col-3{
  width: calc(33.33% - 30px);
}
.wpm-6310-col-4{
  width: calc(25% - 30px);
}
.wpm-6310-col-5{
  width: calc(20% - 30px);
}
.wpm-6310-col-6{
  width: calc(16.6667% - 30px);
}
ul.wpm_6310_team_style_<?php echo $ids ?>_social i[class*="fa-"]{
  line-height: <?php echo ($allStyle[27] - 3) ?>px !important;
  width: <?php echo $allStyle[26] ?>px !important;;
  height: <?php echo $allStyle[27] ?>px !important;;
}
@media screen and (max-width: 767px) {
  .wpm-6310-row{
		display: table !important;	
	}
  .wpm-6310-col-2, .wpm-6310-col-3, .wpm-6310-col-4, .wpm-6310-col-5, .wpm-6310-col-6{
    width: 100% !important;
  }
}
<?php
if ($allSlider[0]) {
  ?>
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div {
    position: absolute;
    top: calc(50% - <?php echo ($allSlider[5] * 2) ?>px);
    background: <?php echo $allSlider[7] ?>;
    color: <?php echo $allSlider[8] ?>;
    margin: 0;
    transition: all 0.3s ease-in-out;
    text-align: center;
    padding: 0;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div:hover{
    background: <?php echo $allSlider[9] ?>;
    color: <?php echo $allSlider[10] ?>;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev {
    left: 0;
    border-radius: 0 <?php echo $allSlider[6] ?>% <?php echo $allSlider[6] ?>% 0;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-next {
    <?php
    if(isset($styleTemplate) && ($styleTemplate==1 || $styleTemplate==3 || $styleTemplate==4  || $styleTemplate==5 || $styleTemplate==6 || $styleTemplate==7 || $styleTemplate==8 || $styleTemplate==9 || $styleTemplate==10)){
      echo "right: " . (($allStyle[3])? ($allStyle[3] * 2) : 0) . "px;";
    }
    else if(isset($styleTemplate) && ($styleTemplate==2)){
      echo "right: 4px;";
    }
    else if(isset($styleTemplate) && ($styleTemplate==20)){
      echo "right: " . ($allStyle[3] - 1) . "px;";
    }
    else if(isset($styleTemplate) && ($styleTemplate==21 || $styleTemplate==29)){
      echo "right: 9px;";
    }
    else if(isset($styleTemplate)){
      echo "right: 0px;";
    }
    else{
      echo "right: " . ($allStyle[3] * 2 - 2) . "px;";
    }
    ?>

    border-radius: <?php echo $allSlider[6] ?>% 0 0 <?php echo $allSlider[6] ?>%;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev i[class*="fa-"], #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-next i[class*="fa-"]{
    color: <?php echo $allSlider[8] ?>;
    top: 0;
    font-size: <?php echo $allSlider[5] ?>px;
    line-height: <?php echo ($allSlider[5] * 2) ?>px;
    height: <?php echo ($allSlider[5] * 2) ?>px;
    width: <?php echo ($allSlider[5] * 2) ?>px;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev:hover i[class*="fa-"],
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-owl-nav div.wpm-6310-owl-next:hover i[class*="fa-"]{
    color: <?php echo $allSlider[10] ?>;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-wpm-6310-owl-dots {
    text-align: center;
    padding-top: 15px;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-wpm-6310-owl-dots div {
    width: <?php echo $allSlider[12] ?>px;
    height: <?php echo $allSlider[13] ?>px;
    border-radius: <?php echo $allSlider[16] ?>%;
    display: inline-block;
    background-color: <?php echo $allSlider[15] ?>;
    margin: 0 <?php echo $allSlider[17] ?>px;
  }
  #wpm-6310-slider-<?php echo $ids ?> .wpm-6310-wpm-6310-owl-dots div.active {
    background-color: <?php echo $allSlider[14] ?>;
  }
  <?php
}
?>
</style>

<div class="wpm_6310_loading">
  <img src="<?php echo $loading; ?>" />
</div>


<style type="text/css">
.wpm_6310_modal, .wpm_6310_loading {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 99999999; /* Sit on top */
  padding-top: 50px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  font-family: sans-serif;
  letter-spacing: .02em;

}

/* wpm_6310_modal Content */
.wpm_6310_modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 75%;
  padding: 20px 15px 40px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  border-radius: 5px;
  -webkit-animation-duration: 0.4s;
  animation-duration: 0.4s;
  margin-bottom: 50px;
}

/* Add Animation */
@-webkit-keyframes wpm-animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}
@keyframes wpm-animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes wpm-animatebottom {
  from {bottom:-300px; opacity:0}
  to {bottom:0; opacity:1}
}

@-webkit-keyframes wpm-animatebottom {
  from {bottom:-300px; opacity:0}
  to {bottom:0; opacity:1}
}

@keyframes wpm-animateleft {
  from {left:-300px; opacity:0}
  to {left:0; opacity:1}
}

@-webkit-keyframes wpm-animateleft {
  from {left:-300px; opacity:0}
  to {left:0; opacity:1}
}

@keyframes wpm-animateright {
  from {right:-300px; opacity:0}
  to {right:0; opacity:1}
}

@-webkit-keyframes wpm-animateright {
  from {right:-300px; opacity:0}
  to {right:0; opacity:1}
}
/* The Close Button */
.wpm-6310-close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
  line-height: 28px;
  padding: 0;
  margin: 0;
  position: absolute;
  right: 20px;
  top: 15px;
}

.wpm-6310-close:hover,
.wpm-6310-close:focus {
  color: #878787;
  text-decoration: none;
  cursor: pointer;
}
.wpm_6310_modal_body_picture {
  float: left;
  width: 300px;
  padding-right: 15px;}
  .wpm_6310_modal_body_content{
    width: calc(100% - 315px);
    float: left;
  }
  .wpm_6310_modal_body_picture img{
    width: calc(100% - 12px) !important;
    height: auto;
    border: 1px solid #ccc;
    padding: 5px;
  }
  #wpm_6310_modal_designation{
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 300;
    color: #727272
  }
  #wpm_6310_modal_name{
    text-transform: capitalize;
    font-size: 22px;
    line-height: 30px;
    margin: 0 0 25px;
    font-weight: 600;
    color: #272727;
  }
  #wpm_6310_modal_details, #wpm_6310_modal_details p{
    font-size: 14px;
    line-height: 20px;
    color: #272727;
    padding: 0;
    margin: 0 0 10px 0;
  }
  .wpm_6310_modal_social a{
    width: 35px;
    height: 35px;
    line-height: 35px;
    float:  left;
    margin: 15px 10px 0 0;
    font-size: 18px;
    border-radius: 3px;
    text-align: center;
    cursor: pointer;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    padding: 0;
    box-shadow: none;
    text-decoration: none;
  }
  .wpm_6310_modal_social a:hover{
    box-shadow: none;
  }
  .wpm_6310_modal .wpm_6310_modal_social{
    float: left;
    position: relative;
  }
  .wpm_6310_modal .wpm-6310-tooltip:hover:after{
    margin-left: -60px !important;
  }
  .wpm_6310_modal-footer {
    padding: 10px 15px;
    color: white;
  }
  br.wpm_6310_clear{
    clear: both;
  }
  .wpm_6310_loading{
    padding-top: 170px; /* Location of the box */
    text-align: center;
    background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  }
  .wpm_6310_loading img{
    border-radius: 50%;
    width: 200px;
    height: 200px;
    position: absolute;
    left: calc(50% - 100px);
  }
  @media only screen and (max-width: 600px) {
    .wpm_6310_modal-content{
      width: 90% !important;
    }
    .wpm_6310_modal_body_content, .wpm_6310_modal_body_picture img{
      width: 100% !important;
    }
    .wpm_6310_modal_body_picture{
      width: 100% !important;
      padding: 0 !important;
    }
  }
</style>
<!-- #####################  Slider Section Start #################### -->


<?php
if (!function_exists('wpm6310_common_output_css')) {
  function wpm6310_common_output_css($ids)
  {
    ?>
    <style type="text/css">
    ul.wpm_6310_team_style_<?php echo $ids ?>_social{
      padding: 0 !important;
      list-style: none !important;
    }
    ul.wpm_6310_team_style_<?php echo $ids ?>_social li{
      display: inline-block !important;
      padding: 0 !important;
    }
    ul.wpm_6310_team_style_<?php echo $ids ?>_social li a{
      display: inline-block !important;
      box-shadow: none !important;
      text-decoration: none !important;
      padding: 0 !important;
      margin: 0 !important;
    }
    ul.wpm_6310_team_style_<?php echo $ids ?>_social li a:hover{
      box-shadow: none !important;
      text-decoration: none !important;
    }
    </style>
    <?php
  }
}
?>

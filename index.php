<?php
include 'connection.php';
$query = "SELECT * FROM event";
$sql = $con->prepare($query);
$sql->execute();
$count = $sql->rowCount();
$events = $sql->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FCAI - USC</title>
  <link rel="icon" type="image/png" href="./assets/icons/sm-logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet"  href="./assets/css/all.min.css"/>
  <!-- Swipper JS -->
  <link rel="stylesheet" href="./assets/css/swipperjs-library.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> -->
  <!-- Animation AOS -->
  <link rel="stylesheet" href="./assets/css/aos-library.css" />
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> -->
  <!-- Main Style -->
  <link rel="stylesheet" href="./assets/css/index.css" />
  <link rel="stylesheet" href="./assets/css/home-section.css" />
  <link rel="stylesheet" href="./assets/css/navbar.css" />
  <link rel="stylesheet" href="./assets/css/programs-section.css" />
  <link rel="stylesheet" href="./assets/css/virtual-section.css" />
  <link rel="stylesheet" href="./assets/css/news-section.css" />
  <link rel="stylesheet" href="./assets/css/events-section.css" />
  <link rel="stylesheet" href="./assets/css/faq-section.css" />
  <link rel="stylesheet" href="./assets/css/contact-section.css" />
  <link rel="stylesheet" href="./assets/css/services-section.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />

</head>

<body>
  <!-- [ HOME ] -->
  <section id="homeSection">
    <div class="container">
      <!-- nav -->
      <nav>
          <ul class="links">
            <i class="fa-solid fa-xmark"></i>
            <li class="title">
              <a href="#Services" class="">
                <span>الخدمات الإلكترونية</span>
              </a>
            </li>
            <li class="dropdown">
              <button class="dropdown-title title">
                <i class="fa-solid fa-angle-down"></i>
                <span>الطلاب</span>
              </button>
              <div class="dropdown-content title">
                <div class="triangle"></div>
                <!-- We need to fetch services here -->
                <?php
                  $query = "SELECT * FROM services WHERE forwho='طالب'";
                  $sql = $con->prepare($query);
                  $sql->execute();
                  $services = $sql->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($services as $service) :
                 ?>
                <a href="./article.php?type=services&id=<?php echo $service['id'] ?>" target="_blank"> <?php echo $service['title'] ?> </a>
                <?php endforeach; ?>
              </div>
            </li>
            <li class="dropdown">
              <button class="dropdown-title title">
                <i class="fa-solid fa-angle-down"></i>
                <span>أقسام الكلية</span>
              </button>
              <div class="dropdown-content">
                <div class="triangle"></div>
                <!-- We need to fetch departments here -->
                <?php
                  $query = "SELECT * FROM departments";
                  $sql = $con->prepare($query);
                  $sql->execute();
                  $departments = $sql->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($departments as $department) :
                 ?>
                <a href="./article.php?type=departments&id=<?php echo $department['id'] ?>" target="_blank"> <?php echo $department['title'] ?> </a>
                <?php endforeach; ?>
              </div>
            </li>
            <li class="dropdown">
              <button class="dropdown-title title">
                <i class="fa-solid fa-angle-down"></i>
                <span>هيئة التدريس</span>
              </button>
              <div class="dropdown-content">
                <div class="triangle"></div>
                <!-- We need to fetch services here -->
                <?php
                  
                  $query = "SELECT * FROM services WHERE forwho='هيئة التدريس'";
                  $sql = $con->prepare($query);
                  $sql->execute();
                  $services = $sql->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($services as $service) :
                 ?>
                <a href="./article.php?type=services&id=<?php echo $service['id'] ?>" target="_blank"> <?php echo $service['title'] ?> </a>
                <?php endforeach; ?>
              </div>
            </li>
            <li class="">
              <a href="./article.php?type=services&id=5" target="_blank" class="title">
                <span>عن الكلية</span>
              </a>
            </li>
            <li class="">
              <a href="" class="dropdown-title title active"><span> الرئيسية </span></a>
            </li>
          </ul>
          <!-- Icon for mobile -->
          <i class="fa-solid fa-bars"></i>
          <!-- Logo for mobile -->
          <a href="index.php">
            <img src="./assets/icons/sm-logo.png" class="logo sm" />
          </a>
          <!-- Logo for desktop -->
          <a href="index.php" class="main-logo-a">
            <img src="./assets/imgs/mainLogo.svg" class="logo" />
          </a>
        </nav>
      <div class="sub-cont">
        <!-- header -->
        <header>
            <h1 data-aos="fade-up" data-aos-duration="500">
              أهلاً و سهلاً بالسادة الزوار الكلية ترحب بكم
            </h1>
            <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
              كلية الحاسبات والمعلومات ترحب بالطلاب الجدد وتتمنى لهم التوفيق
              الدائم وفيما يلى طريقة الوصول للكلية من خلال أهم البوابات للجامعة
            </p>
          </header>
        <!-- form -->
        <form data-aos="zoom-out-up" data-aos-delay="200" data-aos-duration="500">
          <div class="parent">
            <div class="child">
              <!-- I Want -->
              <div class="input-item">
                <div class="select-cont">
                  <label class="select" for="slct">
                    <select id="wantInput" required="required"  <?php if(!isset( $_GET['forwho']))  echo "disabled" ;  ?> onchange="sendQuery()">
                      <option selected disabled>اختر</option>
                      <?php
                      if(isset($_GET['forwho'])) $forwho = str_replace(array("'", '"',"\\"),'', $_GET["forwho"]);
                      $query = "SELECT * FROM services where forwho = '$forwho' ";
                      $sql = $con->prepare($query);
                      $sql->execute();
                      $services = $sql->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($services as $service) :
                      ?>
                        <option value="<?php echo $service['id'] ?>">
                        <?php echo $service['title'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <svg>
                      <use xlink:href="#select-arrow-down"></use>
                    </svg>
                  </label>
                  <!-- SVG Sprites-->
                  <svg class="sprites">
                    <symbol id="select-arrow-down" viewbox="0 0 10 6">
                      <polyline points="1 1 5 5 9 1"></polyline>
                    </symbol>
                  </svg>
                </div>
                <label for="iAm"> :أريد</label>
              </div>
              <!-- I Am -->
              <div class="input-item">
                <div class="select-cont">
                  <label class="select" for="slct">
                    <!-- start of me input -->
                    <select id="meInput" required="required" onchange="sendRequest()" value=" ">
                      <option disabled>اختر</option>
                      <?php
                      $query = "SELECT DISTINCT forwho FROM services";
                      $sql = $con->prepare($query);
                      $sql->execute();
                      $services = $sql->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($services as $service) :
                      ?>
                      <option value="<?php echo $service['forwho'] ?>" <?php if(isset($_GET['forwho'])&&($service['forwho'] == $_GET['forwho']))  echo "selected" ;  ?>>
                      <?php echo $service['forwho'] ?></option>
                      
                      <?php endforeach; ?>
                    </select>

                    <!-- end of me input -->
                    <svg>
                      <use xlink:href="#select-arrow-down"></use>
                    </svg>
                  </label>
                  <!-- SVG Sprites-->
                  <svg class="sprites">
                    <symbol id="select-arrow-down" viewbox="0 0 10 6">
                      <polyline points="1 1 5 5 9 1"></polyline>
                    </symbol>
                  </svg>
                </div>
                <label for="iAm"> :أنا</label>
              </div>
            </div>
          </div>
        </form>
        <!-- Icon -->

        <a class="scroll-icon" href="#departmentsSection">
          <i class="fa-solid fa-angle-down"></i>
          <i class="fa-solid fa-angle-down"></i>
        </a>
      </div>
    </div>
    <div class="bg">
      <img src="./assets/imgs/dots-motifs.svg" class="dots-motifs" alt="" />
      <img src="./assets/imgs/line-motifs.svg" class="line-motifs" alt="" />
    </div>
  </section>
  <!-- [ DEPARTMENTS ] -->
  <section id="departmentsSection">
    <h1 class="section-name" data-aos="fade-left" data-aos-duration="500">
      أقسام الكلية
    </h1>

    <div class="depContainer">
      <?php
      
      $query = "SELECT * FROM departments";
      $sql = $con->prepare($query);
      $sql->execute();
      $departments = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach ($departments as $department) :
      ?>
        <div data-aos="flip-left" data-aos-duration="700" data-aos-delay="50">
          <img src="./assets/icons/<?php echo $department['icon'] ?>" alt="" />
          <span><?php echo $department['name'] ?></span>
          <h1> <?php echo $department['title'] ?></h1>
          <p>
            <?php 
            $department_desc = explode(' ', $department['description']); 
            echo  implode(' ',array_slice($department_desc,0,29)) ; ?>
          </p>
          <?php if ($department['type'] == "قسم عام") : ?>
            <div class="public">
              <h4> <?php echo $department['type'] ?></h4>
            </div>
          <?php endif; ?>
          <?php if ($department['type'] == "قسم خاص") : ?>
            <div class="private">
              <h4> <?php echo $department['type'] ?></h4>
            </div>
          <?php endif; ?>
          <div>
            <a href="article.php?type=departments&id=<?php echo $department['id'] ?>" target="_blank">عرض التفاصيل</a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
              <path id="Icon_material-open-in-new" data-name="Icon material-open-in-new" d="M18.722,18.722H6.278V6.278H12.5V4.5H6.278A1.777,1.777,0,0,0,4.5,6.278V18.722A1.777,1.777,0,0,0,6.278,20.5H18.722A1.783,1.783,0,0,0,20.5,18.722V12.5H18.722ZM14.278,4.5V6.278h3.191L8.731,15.016l1.253,1.253,8.738-8.738v3.191H20.5V4.5Z" transform="translate(-4.5 -4.5)" fill="#045de9" />
            </svg>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- [ VIRTUAL TOUR ] -->
  <section id="virtualSection">
    <div class="bg-section">
      <div class="main-container">
        <i class="fa-solid fa-vr-cardboard" data-aos="fade-up" data-aos-duration="600"></i>
        <h1 data-aos="fade-up" data-aos-duration="600" data-aos-delay="50">
          ما رأيك بجولة إفتراضية ؟
        </h1>
        <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
        قم بجولة افتراضية داخل مبنى الكلية
        </p>
        <a href="./virtual-tour.html" target="_balnk">
          <button data-aos="zoom-in" data-aos-duration="600" data-aos-delay="150">
          إبدأ
          </button>
        </a>
      </div>
      <div class="gradient-abs"></div>
    </div>
  </section>
  <!-- [ NEWS ] -->
  <section id="newsSection">
    <div class="container">
      <div class="slider">
        <div class="controlsAndInfo">
          <div class="slider-btns" class="section-name" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
            <button class="prev">
              <!-- <i class="fa-solid fa-less-than"></i> -->
              <svg id="navigate_before_black_24dp" xmlns="http://www.w3.org/2000/svg" width="38.585" height="38.585" viewBox="0 0 38.585 38.585">
                <path id="Path_8" data-name="Path 8" d="M0,0H38.585V38.585H0Z" fill="none" />
                <path id="Path_9" data-name="Path 9" d="M19.913,8.267,17.646,6,8,15.646l9.646,9.646,2.267-2.267L12.55,15.646Z" transform="translate(4.862 3.646)" fill="#fff" />
              </svg>
            </button>
            <button class="next active">
              <!-- <i class="fa-solid fa-greater-than"></i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="12.395" height="28.006" viewBox="0 0 12.395 28.006">
                <g id="navigate_next_black_24dp" transform="translate(2.716)">
                  <path id="Path_10" data-name="Path 10" d="M0,0H6.963V28.006H0Z" fill="none" />
                  <path id="Path_11" data-name="Path 11" d="M10.949,6,8.59,8.359l7.661,7.678L8.59,23.715l2.359,2.359L20.985,16.037Z" transform="translate(-11.306 -2.034)" fill="#fff" />
                </g>
              </svg>
            </button>
          </div>
          <h1 class="section-name" class="section-name" data-aos="fade-left" data-aos-duration="500">
            أحدث الأخبار
          </h1>
          <h2 class="section-shadow-name">أحدث الأخبار</h2>
        </div>
        <div class="slide-container swiper" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
          <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
              <!-- start of news -->
              <?php
              $query = "SELECT * FROM news ORDER BY id DESC ";
              $sql = $con->prepare($query);
              $sql->execute();
              $news = $sql->fetchAll(PDO::FETCH_ASSOC);
              foreach ($news as $new) :
              ?>
                <div class="card swiper-slide">
                  <div class="image-content">
                    <div class="card-image">
                      <img src="./assets/imgs/<?php echo $new['img'] ?>" alt="" class="card-img" />
                    </div>
                  </div>
                  <div class="card-content">
                    <div class="date">
                      <span><?php echo $new['date']; ?></span>
                      <span>
                        <i class="fa-regular fa-calendar-days"></i>
                      </span>
                    </div>
                    <h2 class="name"><?php echo $new['title'] ?></h2>
                    <p class="description"><?php echo $new['description'] ?></p>
                    <a href="article.php?type=news&id=<?php echo $new['id'] ?>" target="_blank">
                      <button class="main-btn">عرض المزيد</button>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
              <!-- end of news -->
            </div>
          </div>

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- [ EVENTS ] -->
  <section id="eventsSection" event-date="<?php if(isset($events['date'])) echo $events['date'];
                                                 else  echo '2023-05-3'?>">
    <div class="container">
      <h1 class="section-name" data-aos="fade-left" data-aos-duration="400">
        الأحداث القادمة
      </h1>

      <div class="info" data-aos="flip-left" data-aos-duration="800" data-aos-delay="200">
        <div class="calendar">
          <div class="calendar-icon">
            <div>
              <span></span>
              <span></span>
            </div>
          </div>
          <h1 class="event-appointment"></h1>
          <div class="calendar-details">
            <div class="days">
              <span>السبت</span>
              <span>الأحد</span>
              <span>الأثنين</span>
              <span>الثلاثاء</span>
              <span>الأربع</span>
              <span>الخميس</span>
              <span>الجمعة</span>
            </div>
            <div class="daysByNums"></div>
          </div>
        </div>

        <div class="event-info" style="background-image: url('./assets/imgs/<?php  if(isset($events['img'])) echo $events['img'];?>');">
          <div class="blur-widget"></div>
          <div class="about-event">
            <h1><?php  if(isset($events['title'])) echo $events['title'] ;
                        else echo'لا توجد أحداث قادمة';?></h1>
            <p>
              <?php  if(isset($events['description'])) echo $events['description'] ;
                      else echo'
                      برجاء إضافة حدث جديد ليتم عرضه بدلا من هذه المعلومات الوهمية.
                      شكراً لك. برجاء إضافة حدث جديد ليتم عرضه بدلا من هذه المعلومات
                      الوهمية. شكراً لك. برجاء إضافة حدث جديد ليتم عرضه بدلا من هذه
                      المعلومات الوهمية. شكراً لك.';?>
            </p>
            <a href="./article.php?type=event&id=<?php echo $events['id'] ?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                <path id="Icon_material-open-in-new" data-name="Icon material-open-in-new" d="M22.278,22.278H6.722V6.722H14.5V4.5H6.722A2.222,2.222,0,0,0,4.5,6.722V22.278A2.222,2.222,0,0,0,6.722,24.5H22.278A2.229,2.229,0,0,0,24.5,22.278V14.5H22.278ZM16.722,4.5V6.722h3.989L9.789,17.644l1.567,1.567L22.278,8.289v3.989H24.5V4.5Z" transform="translate(-4.5 -4.5)" fill="#eef5ff" />
              </svg>
              <button>عرض التفاصيل</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- [ FAQ ] -->
  <section id="faqSection">
    <div class="container">
      <h1 class="section-name" data-aos="fade-left" data-aos-duration="400">
        الأسئلة الشائعة
      </h1>
      <div class="QusetionParent">
        <div class="faq_img" data-aos="fade-right" data-aos-duration="500">
          <img src="./assets/imgs/FAQs-amico.svg" alt="faq" />
        </div>
        <div class="questions-cont">
          <?php
          
          $query = "SELECT * FROM faqs";
          $sql = $con->prepare($query);
          $sql->execute();
          $questions = $sql->fetchAll(PDO::FETCH_ASSOC);
          foreach ($questions as $question) :
          ?>
            <div class="wrapper" data-aos="flip-down" data-aos-duration="700">
              <button class="toggleFaqSec">
                <i class="fas fa-plus iconFaqSec"></i>
                <p><?php echo $question['question'] ?></p>
              </button>
              <div class="contentFaqSec">
                <p>
                  <?php echo $question['answer'] ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- [ SERVICES ] -->
  <section id="Services">
      <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="500">الخدمات الالكترونية</h1>
        <!-- ------------------------ -->
        <div class="Services_content">
          <!-- one -->
          <a
            href="https://www.ekb.eg/ar/home"
            target="_blank"
            data-aos="zoom-in-up"
            data-aos-duration="400"
            data-aos-delay="250"
          >
            <img src="./assets/imgs/logo-service-1 (1).png" />
            <p>بنك المعرفة المصري</p>
          </a>
          <!-- two -->
          <a
            href="https://scholar.google.com.eg/schhp?hl=ar"
            target="_blank"
            data-aos="zoom-in-up"
            data-aos-duration="400"
            data-aos-delay="200"
          >
            <img src="./assets/imgs/logo-service-3__1_-removebg-preview.png" />
            <p>الباحث العلمي</p>
          </a>
          <!-- three -->
          <a
            href="https://naqaae.eg/ar/"
            target="_blank"
            data-aos="zoom-in-up"
            data-aos-duration="400"
            data-aos-delay="150"
          >
            <img src="./assets/imgs/logo-service-4 (1).png" />
            <p>ضمان جودة التعليم</p>
          </a>
          <!-- four -->
          <a
            href="http://195.246.41.221/static/index.html"
            target="_blank"
            data-aos="zoom-in-up"
            data-aos-duration="400"
            data-aos-delay="100"
          >
            <!-- four -->
            <img class="bankImg" src="./assets/imgs/logo-service-2 (1).png" />
            <p>نظام بن الهيثم</p>
          </a>
        </div>
      </div>
    </section>
  <!-- [ CONTACT ] -->
  <section id="contactSection">
    <div class="container">
      <h1 class="section-name" data-aos="fade-left" data-aos-duration="400">
        تواصل معنا
      </h1>
      <div class="contactRow">
        <div class="mapCol" data-aos="flip-left" data-aos-duration="600" data-aos-delay="100">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.329659000344!2d30.498053799999997!3d30.369995599999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458bfb4f61ddc0f%3A0x9f01d0c8c1b9ed05!2z2YPZhNmK2Kkg2KfZhNit2KfYs9io2KfYqiDZiNin2YTYsNmD2KfYoSDYp9mE2KfYtdi32YbYp9i52Yog2KzYp9mF2LnYqSDZhdiv2YrZhtipINin2YTYs9in2K_Yp9iq!5e0!3m2!1sar!2seg!4v1679657915546!5m2!1sar!2seg" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="formCol" data-aos="flip-right" data-aos-duration="600" data-aos-delay="100">
          <form action="sendcontact.php" method="post">
            <div class="name">
              <div>
                <label for="">الاسم الاخير</label>
                <input type="text" placeholder="محمود" name="lname" required  />
              </div>
              <div>
                <label for="">الاسم الاول</label>
                <input type="text" placeholder="أحمد" name="fname" required  />
              </div>
            </div>
            <div class="email">
              <label for="">البريد الالكتروني</label>
              <input type="email" placeholder="بريدك الإلكتروني هنا" name="email" required  />
            </div>
            <div class="massage">
              <label for=""> الرسالة</label>
              <textarea placeholder="أكتب رسالتك هنا" name="message" required ></textarea>
            </div>
            <div class="submit">
              <input type="submit" value="ارسال" name="send" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- [ FOOTER ] -->
  <footer class="footer" dir="rtl">
    <div class="container">
      <div class="logo">
      <a href="index.php" class="main-logo-a">
        <img src="./assets/icons/sm-logo.png" alt="FCAI LOGO" class="fcai-logo" />
        <p class="college">كلية الحاسبات والذكاء الاصطناعي</p>
        <p class="university">جامعــــــــة مديــــــــنة الســــــــادات</p>
      </a>
      </div>
      <div class="footer-links">
        <div class="general-info">
          <div class="location">
            <img src="./assets/icons/location.svg" alt="Location Icon" />
            <p>محافظة المنوفية - مدينة السادات المنطقة الخامسة</p>
          </div>
          <div class="email">
            <img src="./assets/icons/email.svg" alt="Email Icon" />
            <p>fcaiusc@usc.edu.eg</p>
          </div>
          <div class="phone">
            <img src="./assets/icons/phone.svg" alt="Phone Icon" />
            <p>
              01215148466
              <br />
              01226325615
            </p>
          </div>
        </div>
        <div class="footer-link about">
          <h3 class="title">عن الكلية</h3>
          <ul>
            <li><a href="./article.php?type=services&id=5" target="_blank">رؤية الكلية</a></li>
            <li><a href="./article.php?type=services&id=9" target="_blank">رسالة الكلية</a></li>
            <li><a href="./article.php?type=services&id=4"target="_blank">كلمة العميد</a></li>
            <li><a href="#contactSection">الموقع الجغرافي</a></li>
          </ul>
        </div>
        <div class="footer-link student">
          <h3 class="title">الطلاب</h3>
          <ul>
            <li><a href="./article.php?type=services&id=3" target="_blank">أوراق التقديم</a></li>
            <li><a href="./article.php?type=services&id=2" target="_blank">السكن الجامعي</a></li>
            <li><a href="#virtualSection">الجولة الافتراضية</a></li>
            <li><a href="#contactSection">تواصل معنا</a></li>
          </ul>
        </div>
        <div class="footer-link departments">
          <h3 class="title">أقسام الكلية</h3>
          <ul>
          <?php
                  $query = "SELECT * FROM departments";
                  $sql = $con->prepare($query);
                  $sql->execute();
                  $departments = $sql->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($departments as $department) :
                 ?>
               <li> <a href="./article.php?type=departments&id=<?php echo $department['id'] ?>" target="_blank"> <?php echo $department['title'] ?> </a></li>
                <?php endforeach; ?>
          </ul>
        </div>
        <div class="footer-link services">
          <h3 class="title">الخدمات الالكترونية</h3>
          <ul>
            <li><a href="https://www.ekb.eg/ar/home" target="_blank">بنك المعرفة المصري</a></li>
            <li><a href="http://195.246.41.221/static/index.html" target="_blank">نظام بن الهيثم</a></li>
            <li><a href="https://naqaae.eg/ar/" target="_blank">هيئة ضمان جودة التعليم</a></li>
            <li><a href="https://scholar.google.com.eg/schhp?hl=ar" target="_blank">الباحث العلمي</a></li>
          </ul>
        </div>
      </div>
      <p class="copyrights">
        صُنِعَ بحب بواسطة فريق
        <a href="#">NULL</a>
      </p>
    </div>
  </footer>

  <!-- Swipper JS -->
  <script src="./assets/js/swiperJsLibrary.js"></script>
  <!-- Animation AOS -->
  <script src="./assets/js/aosLibrary.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    function sendRequest() {
      const optionValue = document.getElementById("meInput").value;
      //const currentURL = window.location.origin; // current url => https://localhost:2611
      const page = "/fcai/index.php"; // details page => details.php
      const query = `?forwho=` + optionValue; // values of select inputs
      window.location = page + query;
      console.log(optionValue);
    }
    function sendQuery() {
      const optionValue = document.getElementById("wantInput").value;
     // const currentURL = window.location.origin; // current url => https://localhost:2611
      const page = "/fcai/article.php"; // details page => details.php
      const query = `?type=services&id=` + optionValue; // values of select inputs
      window.open (page + query);
      console.log(optionValue);
    }
  </script>
  <!-- Main Scripts -->
  <script src="./assets/js/navbar.js"></script>
  <script src="./assets/js/newsSlider.js"></script>
  <script src="./assets/js/eventsCalender.js"></script>
  <!-- <script src="./assets/js/homeForm.js"></script> -->
  <script src="./assets/js/faqDropdown.js"></script>
</body>

</html>
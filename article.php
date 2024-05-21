<?php
include 'connection.php';
if(isset($_GET['type'])&&isset($_GET['id'])){
 
  $table = $_GET['type'];
  $id=$_GET['id'];

}
try {
  $qry="SELECT * FROM $table WHERE id = '$id' ";
  $sql = $con->prepare($qry);
  $sql->execute();
  $articles = $sql->fetch();
}
catch(PDOException $e) {
  header("location:./not-found.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FCAI - Article</title>
    <link rel="icon" type="image/png" href="./assets/icons/sm-logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet"  href="./assets/css/all.min.css"/>
    <!-- Animation AOS -->
    <link rel="stylesheet" href="./assets/css/aos-library.css" />
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> -->
    <!-- Main style -->
    <link rel="stylesheet" href="./assets/css/index.css" />
    <link rel="stylesheet" href="./assets/css/navbar.css" />
    <link rel="stylesheet" href="./assets/css/article-page.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
  </head>

  <body>
    <!-- [ NAV ] -->
    <div class="article-navbar" data-aos="fade-down" data-aos-duration="600">
      <div class="container">
      <nav>
      <ul class="links">
            <i class="fa-solid fa-xmark"></i>
            <li class="title">
              <a href="./index.php#Services" class="">
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
                <a href="article.php?type=services&id=<?php echo $service['id'] ?>"> <?php echo $service['title'] ?> </a>
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
                <a href="article.php?type=departments&id=<?php echo $department['id'] ?>"> <?php echo $department['title'] ?> </a>
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
                <a href="article.php?type=services&id=<?php echo $service['id'] ?>"> <?php echo $service['title'] ?> </a>
                <?php endforeach; ?>
              </div>
            </li>
            <li class="">
              <a href="./article.php?type=services&id=5" class="title">
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
      </div>
    </div>
    <!-- [NAV for phone] -->
    <ul class="links for-phone">
            <i class="fa-solid fa-xmark"></i>
            <li class="title">
              <a href="./index.php#Services" class="">
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
                <a href="article.php?type=services&id=<?php echo $service['id'] ?>"> <?php echo $service['title'] ?> </a>
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
                <a href="./article.php?type=departments&id=<?php echo $department['id'] ?>"> <?php echo $department['title'] ?> </a>
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
                <a href="article.php?type=services&id=<?php echo $service['id'] ?>"> <?php echo $service['title'] ?> </a>
                <?php endforeach; ?>
              </div>
            </li>
            <li class="">
              <a href="./article.php?type=services&id=5" class="title">
                <span>عن الكلية</span>
              </a>
            </li>
            <li class="">
              <a href="" class="dropdown-title title active"><span> الرئيسية </span></a>
            </li>
          </ul>
    <!-- [ ARTICLE ] -->
    <main>
      <div class="container">
        <aside>
          <h1
            class="section-name"
            data-aos="fade-left"
            data-aos-delay="500"
            data-aos-duration="600"
          >
            مواضيع مرتبطة
          </h1>
          <ul data-aos="fade-left" data-aos-delay="700" data-aos-duration="600">
    <?php
    if(isset($articles['forwho'])){
       $forwho= $articles['forwho'];
      $query = "SELECT * FROM $table WHERE forwho = '$forwho'";
    }
    else $query = "SELECT * FROM $table";
      $sql = $con->prepare($query);
      $sql->execute();
      $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) :
        if ($row['title']!=$articles['title']) :
     ?>
            <li>
              <a href="article.php?type=<?php echo $table ;?>&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
            </li>
     <?php endif; endforeach; ?>
          </ul>
        </aside>
        <article>
          <div
            class="article-image"
            data-aos="fade-left"
            data-aos-delay="100"
            data-aos-duration="600"
          >
            <img
              src="./assets/imgs/mainLogo.svg"
              alt="fcai"
              class="fcai-logo"
            />
            <div class="blue-gradient"></div>
            
           <?php // var_dump($articles['img']); ?> 
            <img
              src=<?php if(isset($articles['img'])&& $articles['img'] != " " ) echo "./assets/imgs/". $articles['img'] ;
                         else echo"./assets/imgs/default-article-img.png";
              ?>
              alt="service"
              class="service-image"
            />
          </div>
          <h1
            class="main-title"
            data-aos="fade-left"
            data-aos-delay="300"
            data-aos-duration="600"
          >
          <?php echo $articles['title'];?>
          </h1>
          <p data-aos="fade-left" data-aos-delay="400" data-aos-duration="600"  style="white-space: pre-line;">
            <?php echo $articles['description'];?>
          </p>
        </article>
      </div>
    </main>
    <!-- [ FOOTER ] -->
    <footer class="footer article-page" dir="rtl">
      <div class="container">
        <div class="logo">
        <a href="index.php" class="main-logo-a">
          <img
            src="./assets/icons/sm-logo.png"
            alt="FCAI LOGO"
            class="fcai-logo"
          />
        </a>
          <p class="college">كلية الحاسبات والذكاء الاصطناعي</p>
          <p class="university">جامعــــــــة مديــــــــنة الســــــــادات</p>
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
            <li><a href="./article.php?type=services&id=5" >رؤية الكلية</a></li>
            <li><a href="./article.php?type=services&id=9" >رسالة الكلية</a></li>
            <li><a href="./article.php?type=services&id=4">كلمة العميد</a></li>
            <li><a href="./index.php#contactSection" target="_blank">الموقع الجغرافي</a></li>
          </ul>
        </div>
        <div class="footer-link student">
          <h3 class="title">الطلاب</h3>
          <ul>
            <li><a href="./article.php?type=services&id=3">أوراق التقديم</a></li>
            <li><a href="./article.php?type=services&id=2">السكن الجامعي</a></li>
            <li><a href="./index.php#virtualSection" target="_blank">الجولة الافتراضية</a></li>
            <li><a href="./index.php#contactSection" target="_blank">تواصل معنا</a></li>
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
               <li> <a href="./article.php?type=departments&id=<?php echo $department['id'] ?>"> <?php echo $department['title'] ?> </a></li>
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

    <!-- <script src="./assets/js/getQuery.js"></script> -->
    <!-- Animation AOS -->
    <script src="./assets/js/aosLibrary.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="./assets/js/article.js"></script>
  </body>
</html>

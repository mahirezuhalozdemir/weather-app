<html>
<head>
<title>Hava Durumu</title>
<style>
.container{
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('bluesky.png'); background-repeat: no-repeat;">
<?php
$cities = array("Adana", "Adıyaman", "Afyonkarahisar", "Ağrı", "Aksaray", "Amasya", "Ankara", "Antalya", "Ardahan", "Artvin", "Aydın", "Balıkesir", 
"Bartın", "Batman", "Bayburt", "Bilecik", "Bingöl", "Bitlis", "Bolu", "Burdur", "Bursa", "Çanakkale", "Çankırı", "Çorum", "Denizli", 
"Diyarbakır", "Düzce", "Edirne", "Elazığ", "Erzincan", "Erzurum", "Eskişehir", "Gaziantep", "Giresun", "Gümüşhane", "Hakkari", "Hatay", 
"Iğdır", "Isparta", "İstanbul", "İzmir", "Kahramanmaraş", "Karabük", "Karaman", "Kars", "Kastamonu", "Kayseri", "Kilis", "Kırıkkale", 
"Kırklareli", "Kırşehir", "Kocaeli", "Konya", "Kütahya", "Malatya", "Manisa", "Mardin", "Mersin", "Muğla", "Muş", "Nevşehir", "Niğde", 
"Ordu", "Osmaniye", "Rize", "Sakarya", "Samsun", "Şanlıurfa", "Siirt", "Sinop", "Sivas", "Şırnak", "Tekirdağ", "Tokat", "Trabzon",
 "Tunceli", "Uşak", "Van", "Yalova", "Yozgat", "Zonguldak");
 ?>
<div class="container">
<div class="card mt-3" style="width: 25rem;height: 35rem;opacity: 0.9;">
  <div class="card-body">
    <form method="get" action="">
      <select name="city" class="form-select form-select-md" onchange="this.form.submit();">
      <option>İl Seçin</option>
          <?php foreach($cities as $city):?>
              <option value="<?php echo $city ?>"
              <?php if(isset($_GET['city']) && $_GET['city']==$city):?>selected="selected"<?php endif;?>
              ><?php echo $city?></option>
          <?php endforeach;?>
      </select>
  </form>
  <?php if(isset($_GET['city'])):
  $city=strtolower($_GET['city']);
  $link="http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=92f1ab78f5f4d790325cd328161c2971&units=metric";
  $connect= json_decode(file_get_contents($link));
  ?>
      <h3 class="card-title text-center mt-3"><?php echo strtoupper($city)?></h3>
      <p class="card-text text-center mt-3">SICAKLIK: <?php echo $connect->main->temp?>°C</p>
      <p class="card-text text-center"><?php echo strtoupper($connect->weather[0]->description)?></p>
      <p class="card-text text-center">GÜN DOĞUMU: <?php echo date('h:m:s',$connect->sys->sunrise)?></p>
      <p class="card-text text-center">GÜN BATIMI: <?php echo date('h:m:s',$connect->sys->sunset)?></p>
      <p class="card-text text-center mt-3"><img src="http://openweathermap.org/img/wn/<?php echo $connect->weather[0]->icon ?>@2x.png"></p>
  </div>
</div>
</div>
<?php endif;?>
</body>
<</html>
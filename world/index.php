<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$name = (string)filter_input(INPUT_POST, 'name');
$address = (string)filter_input(INPUT_POST, 'address');
$tag = (string)filter_input(INPUT_POST, 'tag');
$info = (string)filter_input(INPUT_POST, 'info');
$link = (string)filter_input(INPUT_POST, 'link');

$fp = fopen('contents.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$name, $address, $tag, $info, $link,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> (世界の)インディペンデントスペース | by VG CTLG </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://creative-community.space/coding/js/org.js"></script>
<script src="https://creative-community.space/coding/js/smoothscroll.js"></script>
<script type="text/javascript">
$(function(){
    $("").load("");
})
</script>
<link rel="stylesheet" href="https://creative-community.space/coding/submit/org/form.css"/>
<link rel="stylesheet" href="https://creative-community.space/coding/css/radius.css"/>
<style type="text/css">
.vg {
  position:absolute;
  top:0;
  left:0;
  max-width:80%;
  z-index:50;
  font-family: 'Lucida Console', Courier, monospace;
  font-size: 1rem;
  transform:scale(1,1.5);
  color:#fff;
  background: #000;
  display: inline-block;
  padding: 0.25rem
}
#bg_link {
  position:absolute;
  z-index:100;
  top:0;
  right:0;
  color:#000;
  line-height:1.5rem;
  letter-spacing:.1rem;
  font-family: "MS 明朝","MS Mincho", serif;
  font-size:0.9rem;
  text-decoration:none;
  display:inline-block;
  -ms-writing-mode: tb-rl;
  writing-mode: vertical-rl;
}
#bg_link a {
  color:#000;
  line-height:1.5rem;
  letter-spacing:.1rem;
  font-family: "MS 明朝","MS Mincho", serif;
  background:#fff;
  text-decoration:none;
  padding:0.25rem 0.125rem;
}
#bg_link i {padding:0.25rem 0.125rem;}

.address {zoom:0.5;}
.list li span {
  animation:2s ease-in infinite fontmotion;
}
</style>
</head>
<body>
<span class="vg">
Independent space in the World
</span>

<span id="bg_link">
<a><b>Update</b>
  <i>
  <?php
  $mod = filemtime("contents.csv");
  date_default_timezone_set('Asia/Tokyo');
  print "".date("m.d.y H:i",$mod);
  ?>
  </i>
</a>
</span>
<form id="org">
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="art" id="art">
<label for="art" class="label">Art Space</label></li>
<li>
<input type="radio" name="tag" value="book" id="book">
<label for="book" class="label">Book Store</label></li>
<li>
<input type="radio" name="tag" value="curture" id="curture">
<label for="curture" class="label">Culture Space</label></li>
<li>
<input type="radio" name="tag" value="music" id="music">
<label for="music" class="label">Music Store</label></li>
<li>
<input type="radio" name="tag" value="venue" id="venue">
<label for="venue" class="label">Etc, Venue</label></li>
</ul>
</div>
<div class="search-box address">
<ul>
<li>
<input type="radio" name="address" value="us" id="us">
<label for="us" class="label">北米</label></li>
<li>
<input type="radio" name="address" value="euro" id="euro">
<label for="euro" class="label">欧州</label></li>
<li>
<input type="radio" name="address" value="asia" id="asia">
<label for="asia" class="label">アジア</label></li>
<li>
<input type="radio" name="address" value="oceania" id="oceania">
<label for="oceania" class="label">大洋州</label></li>
<li>
<input type="radio" name="address" value="laten" id="laten">
<label for="laten" class="label">中南米</label></li>
<li>
<input type="radio" name="address" value="middleeast" id="middleeast">
<label for="middleeast" class="label">中東</label></li>
<li>
<input type="radio" name="address" value="africa" id="africa">
<label for="africa" class="label">アフリカ</label></li>
<li>
<input type="radio" name="address" value="online" id="online">
<label for="online" class="label">インターネット</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="RESET" class="reset-button">
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="<?=h($row[2])?>" class="list_item list_toggle radius" data-address="<?=h($row[1])?>" data-tag="<?=h($row[2])?>">
<span><?=h($row[0])?></span>
<p><?=h($row[3])?></p>
<a href="<?=h($row[4])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="<?=h($row[2])?>" class="list_item list_toggle radius" data-address="<?=h($row[1])?>" data-tag="<?=h($row[2])?>">
<span>Title</span>
<p>contents</p>
<a href="<?=h($row[4])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endif; ?>
</ul>
</body>
</html>

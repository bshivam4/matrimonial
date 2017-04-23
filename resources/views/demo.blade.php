<?php
$faker = Faker\Factory::create();
for($i=0;$i<5;$i++)
echo "<image src=".$faker->imageUrl($width = 100, $height = 100, 'people').">";
?>


<?php
/*
  Consider the following string(bbit3c.txt)
  It constains names(surname,second_name,first_name),number,country and country code of some individuals

  @Required
  1. Create a new branch from the develop branch called feature-rewind-1
  2. Display the following data as follows

      a). first_name second_name,surname (# country_code(0) number[country])
      b). .......
      c). .......

    Summary
     -- Total names : total.
     -- Total unique countries : total(list of countries - comma separated)
  3. Commit changes of the new branch
  4. Merge changes with the development branch
  5. Push the changes to your repo.
  6. Submit the github url on google classroom (Check Quiz 1)
 */
 $bbit3c="Chirakahula,Mukwana Joe.0500387482.UGANDA.+256|
 Wambua,Doe Mumbua.080023450.KENYA.+254|
 Vonbora,Katherina Luther.0600990033.GERMANY.+32
 |Boromir,Grommit Wallace.0100873901.IRELAND.+98
 |Piepont,Edwards Jonathan.0200983729.AMERICA.+1
 |Asaph,Elihu Mose.02990033.ISRAEL.+2
 |Otoyo,Wafula Joel.0777799920.KENYA.+254
 |Mapete,Mwambingu Simba.0987483292.TANZANIA.+257
 |SARATON,DAVID BREINARD.043899292.AMERICA.+1
 |POMPI,JOHN OWEN.074749292.ZAMBIA.+267
 |MAG,JOHN BUNYAN.09837328.UGANDA.+256
 |Vonstaupitz,Johann Gregory.0600984733.GERMANY.+32
";
//str_replace replaces a string with another
$bt3c = str_replace("|",".",$bbit3c);
$bit3c= explode(".",$bt3c);//puts the values of the string in to an array
 $b=array_chunk($bit3c,4);// divides the array into smaller arrays with a length of 4 to form the rows

 echo "<ol>";
 $phone;
 $country;
 $names_counter=0;
 //outer loop iterates the rows
 foreach ($b as $a) {
   // inner loop for values in a row
   echo "<li>";
   foreach ($a as $key=>$value) {
     // conditions for the values in a row

     if ($key==0) {
       // formats and outputs names using arrays
       $st=explode(",",$value);
       $stq=explode(" ",$st[1]);
       $st1=substr_replace($value,", ".substr($value,0,strpos($value,',')),-1);

       $st1=$stq[1]." ".$stq[0].", ".$st[0];
       $value=$st1;
       echo "{$value} ";
       global $names_counter;
       $names_counter++;
     }

     if ($key==3) {
       // outputs three values in the required pattern(#+cc (0)phone [country])

       $value="(#".$value." " . $phone. " [".$country."])";
       echo "{$value} ";
     }
     if ($key==1) {

       // gets the phone value and puts it in a variable then puts the first 0 in brackets
       global $phone;
       $phone = $value;
       $phone=substr_replace($value,"(0)".substr($value,1),0);

     }
     if ($key==2) {
       // puts the country value in a global variable
       global $country;
       $country = $value;


     }

   }
   echo "</li>";
 }
 echo "</ol>";
 echo "Summary: <p> \ttotal names: {$names_counter} <br> ";
$c;
 echo "\ttotal unique countries: ";
    foreach ($b as $a) {
      // gets countries and puts them in arrays
      global $c;
      $c[]=$a[2];
    }
    //filters array for unique values
    $c=array_unique($c);
    echo "(".count($c).")\t<ul>";
    foreach ($c as $value) {
      // outputs array
        echo "<li>{$value}</li>";
    }
    echo "</ul>";
 ?>

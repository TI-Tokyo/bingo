<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools","Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ellen's Bingo Game</title>
        <style>
            body{
                text-align: center;
                font-size: large;
            }
            div{
               margin: 1px 0;
            }
            h2::first-letter{
             text-transform: uppercase;   
            }
            input[type=submit] {
                padding:5px 15px; 
                background:#ccc; 
                border:0 none;
                cursor:pointer;
                font-size: larger;
                -webkit-border-radius: 5px;
                border-radius: 5px; 
            }
            .greeting{
                
            }
            .latest{
                background-color: lightsalmon;
            }
            .previous{
                background-color: lightblue;
            }
            .order{
                background-color: lightpink;
            }
            .total{
                background-color: lightgreen;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="index.php">
        <?php
        
         $calls=array(1=>array("Kelly's eye","at the beginning","buttered scone"),
2=>array("one little duck","me and you","Little Boy Blue"),
3=>array("you and me","cup of tea","one little flea","goodness me"),
4=>array("knock at the door","the one next door"),
5=>array("man alive","one little snake"),
6=>array("Tom Mix","chopsticks","Tom's tricks","half a dozen","chopping sticks"),
7=>array("lucky","one little crutch","God's in Heaven"),
8=>array("garden gate","one fat lady","she's always late","Golden Gate"),
9=>array("doctor's orders","doctor's joy"),
10=>array("David's den","uncle Ben","cock and hen"),
11=>array("legs"),
12=>array("one dozen","monkey's cousin"),
13=>array("unlucky for some","bakers dozen","the Devil's number"),
14=>array("the lawnmower","Valentines day"),
15=>array("young and keen"),
16=>array("never been kissed"),
17=>array("often been kissed","dancing queen","old Ireland"),
18=>array("coming of age","now you can vote"),
19=>array("end of the teens","goodbye teens"),
20=>array("one score"),
21=>array("key of the door","royal salute"),
22=>array("two little ducks (quack quack)","ducks on a pond","dinkie-doo"),
23=>array("The Lord is My Shepherd","thee and me","a duck and a flea"),
24=>array("knock at the door","two dozen"),
25=>array("duck and dive"),
26=>array("half a crown","pick and mix","bed and breakfast"),
27=>array("duck and a crutch","gateway to heaven"),
28=>array("in a state","overweight","The Old Braggs","a duck and its mate"),
29=>array("rise and shine","in your prime","you're doing fine"),
30=>array("Dirty Gertie","Burlington Bertie"),
31=>array("get up and run"),
32=>array("buckle my shoe"),
33=>array("dirty knees"),
34=>array("ask for more"),
35=>array("jump and jive"),
36=>array("three dozen"),
37=>array("more than eleven"),
38=>array("Christmas cake"),
39=>array("steps","Jack Benny"),
40=>array("life begins","two score","naughty forty"),
41=>array("life's begun","time for fun"),
42=>array("Winnie the Pooh","the street in Manhattan"),
43=>array("down on your knees"),
44=>array("droopy drawers"),
45=>array("halfway there","cowboy's friend","halfway house"),
46=>array("up to tricks"),
47=>array("four and seven"),
48=>array("four dozen"),
49=>array("PC (nick nick)"),
50=>array("half a century","bullseye","Hawaii five oh"),
51=>array("tweak of the thumb","The Highland Div"),
52=>array("Danny La Rue","The Lowland Div","pack of cards","weeks in a year"),
53=>array("here comes Herbie (beep beep)","stuck in a tree","The Welsh Div","the joker"),
54=>array("house with a bamboo door","clean the floor"),
55=>array("snakes alive","bunch of fives"),
56=>array("Shotts bus","was she worth it? (she was)"),
57=>array("Heinz","Heinz varieties","beans means Heinz"),
58=>array("make them wait","choo choo Thomas"),
59=>array("the Brighton Line (woo-woo)"),
60=>array("five dozen","three score"),
61=>array("bakers bun"),
62=>array("tickety-boo","turn of the screw","to Waterloo"),
63=>array("tickle me"),
64=>array("red raw","The Beatle's number"),
65=>array("stop work","retirement age"),
66=>array("clickety click"),
67=>array("made in heaven","the argumentative number"),
68=>array("saving grace"),
69=>array("anyway up","the same both ways"),
70=>array("three score and ten"),
71=>array("bang on the drum"),
72=>array("Danny LaRue","six dozen","par for the course"),
73=>array("queen bee","a crutch and a flea","camomile tea"),
74=>array("candy store"),
75=>array("strive and strive","on the skive","Big Daddy"),
76=>array("was she worth it? (she was)","trombones"),
77=>array("two little crutches","sunset strip"),
78=>array("heaven's gate"),
79=>array("one more time"),
80=>array("Gandhi's breakfast","four score","there you go matey"),
81=>array("stop and run"),
82=>array("straight on through","fat lady with a duck"),
83=>array("time for tea","fat lady and a flea","Ethel's ear"),
84=>array("seven dozen"),
85=>array("staying alive"),
86=>array("between the sticks"),
87=>array("Torquay in Devon","fat lady with a crutch"),
88=>array("two fat ladies (wobbly wobbly)","Connaught Rangers"),
89=>array("nearly there","almost there","all but one"),
90=>array("four score and ten","top of the shop","end of the line","top of the house"));
          
        $previous = array();
        $initial_read = filter_input(INPUT_POST, 'previous');
        if(strlen($initial_read)>1){
            $previous = unserialize($initial_read);
        }
        // put your code here
        echo "<p class=\"greeting\">Hello Ellen!</p>";
        $max=75;
        $new=0;
        while ($new==0)
        {   
            $test=rand(1,$max);
            if (in_array($test, $previous)===FALSE){
                $new=$test;
            }
        }
        $available_calls=count($calls[$new]);
        if ($available_calls>1){
            $choice=rand(0,($available_calls-1));
        }
        else{
            $choice=0;
        }
        echo "<div class=\"latest\"><h2>" . $calls[$new][$choice] . "</h2>";
        echo "<h1>" . $new . "</h1></div>";
        $count=count($previous);
        if ($count>0)
            {
            $list=implode(", ", $previous);
            $sorted=$previous;
            sort($sorted);
            $ordered=implode(", ", $sorted);
             echo "<div class=\"previous\"><p>Previous Numbers</p><p>" . $list . "</p></div>";
             echo "<div class=\"order\"><p>In Numerical Order</p><p>" . $ordered . "</p></div>";
        }
        echo "<div class=\"total\"><p>Total Played: " . ($count+1) . "</p><p>Total Remaining: " . ($max-($count+1)) . "</p></div>";
        $previous[]=$new;
        if($count<($max-1)){
            echo "<input type=\"hidden\" value=\"" . serialize($previous) . "\" name=\"previous\" id=\"previous\" />";    
        }
        ?>
            <input type="submit" value="Play" />
        </form>
    </body>
</html>

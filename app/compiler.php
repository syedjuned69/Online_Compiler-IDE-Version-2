<?php 
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];
    $input = $_POST['input'];
    // echo $input;
    // if($language == "python") {
    //     $language = "py"; 
    //     }
    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $irandom = "inp" . $random . ".txt";
    $inputPath = "temp/" . $irandom;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);
    $inputFile = fopen($inputPath, "w");
    fwrite($inputFile, $input);
    fclose($inputFile);

    //code for debugging
    // $language = "c";

    // $filePath = "temp/example.c";

    //end

    // if($language == "php") {
    //     $output = shell_exec("C:\wamp64\bin\php\php5.6.40\php.exe $filePath 2>&1");
    //     echo $output;
    // }
    if($language == "python") {
        $outputTxt = $random . ".txt";
        $output = shell_exec("C:\Python310\python.EXE $filePath < $inputPath 2>&1");
        // $myfile = fopen($outputTxt, "r");
        // echo file_get_contents($outputTxt);
        echo $output;
    }
    // if($language == "node") {
    //     rename($filePath, $filePath.".js");
    //     $output = shell_exec("node $filePath.js 2>&1");
    //     echo $output;
    // }
    
    if($language == "c") {
        $outputExe = $random . ".exe";
        $outputTxt = $random . ".txt";
        system("gcc $filePath -o $outputExe",$a);
        if($a=='1'){ echo "Syntax Error"; }
        // $output = shell_exec(__DIR__ . "//$outputExe ");
        system("$outputExe < $inputPath > $outputTxt");
        $myfile = fopen($outputTxt, "r");
        echo file_get_contents($outputTxt);

        // echo $output;
        unlink($outputTxt);
    }
    if($language == "cpp") {
        $outputExe = $random . ".exe";
        $outputTxt = $random . ".txt";
        system("g++ $filePath -o $outputExe",$b);
        if($b=='1'){ echo "Syntax Error"; }
        // $output = shell_exec(__DIR__ . "//$outputExe");
        system("$outputExe < $inputPath > $outputTxt");
        $myfile = fopen($outputTxt, "r");
        echo file_get_contents($outputTxt);
        // echo $output;
        unlink($outputTxt);
    }

    unlink($filePath);
    unlink($inputPath);
    if($language == "python"){
    unlink($random . ".exe");
    }

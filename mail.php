<?php

$recepient = "denis.leonov1990@gmail.com";
$sitename = "Kolibri";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$text = "Перезвоните мне, пожалуйста.";

$pagetitle = "Новая заявка с сайта \"$sitename\"";
$message = "Имя: $name \nТелефон: $phone \n\n$text";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
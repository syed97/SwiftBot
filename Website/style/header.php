<?
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

if($url=="https://www.anomoz.com"){
    $title = "Anomoz Softwares";
    $description = "We improve your business by developing innovative computer cloudbased solutions for it. Our experience of working on 40+ projects with global clients is what makes us different.";
    $keywords = 'Anomoz, Softwares, web development, website, app, software, android, application';
}
else if($url=="https://api.anomoz.com/"){
    $title = "Developers - Anomoz Softwares";
    $description = "Integrate our opensource APIs with your product and help your business establish a better relationship with your customers. ";
    $keywords = 'Anomoz, Softwares, developers, business, businesses, apis, opensource, roPay';
}
else if($url=="https://www.anomoz.com/careers/"){
    $title = "Careers - Anomoz Softwares";
    $description = "Find your dream job/internship by working in an atmosphere where you are challanged and where you have the most learnings.";
    $keywords = 'Anomoz, Softwares, careers, developers, web developer, internship, job, work, career';
}
else if($url=="https://www.anomoz.com/contact/"){
    $title = "Contact - Anomoz Softwares";
    $description = "Your goals matter, so when you need support, get round-the-clock support that’s free for all customers.";
    $keywords = 'Anomoz, Softwares, contact, whatsapp, help, support, 24/7, email, phone, whatsapp';
}
else if($url=="https://projects.anomoz.com/"){
    $title = "Portfolio - Anomoz Softwares";
    $description = "Browse through our list of 36+ projects done in the past 3 years for our clients around the world.";
    $keywords = 'Anomoz, Softwares, portfolio, projects, project, clients';
}
else if($url=="https://www.anomoz.com/startups/"){
    $title = "Startup Program - Anomoz Softwares";
    $description = "Startups work very hard to succeed, we help them by taking care of their software side. Get a website for as low as PKR 4000 if you have a world-changing idea!";
    $keywords = 'Anomoz, Softwares, startups, startup, accelerator, website, software, android, application';
}
else if($url=="https://projects.anomoz.com/HU-Library/"){
    $title = "Room Management System - Anomoz Softwares";
    $description = "Upgrading Habib University's paper-based Room Management System to a Cloud-based System.";
    $keywords = 'Anomoz, Softwares, project, habib university, hu, cloud based solution, room management system, website';
}
else if($url=="https://projects.anomoz.com/roPay/"){
    $title = "roPay - Anomoz Softwares";
    $description = "roPay makes it easy for developers to build their own e-wallet system, while customizing it in the way they want. It supports peer to peer transactions, peer to vendor transactions, transactions history, balance reload, and everything that you can name.";
    $keywords = 'Anomoz, Softwares, project,roPay, hu, e-wallet, ypay, plugin';
}
else if($url=="https://projects.anomoz.com/roPay/documentation/"){
    $title = "roPay Documentation- Anomoz Softwares";
    $description = "roPay makes it easy for developers to build their own e-wallet system, while customizing it in the way they want. It supports peer to peer transactions, peer to vendor transactions, transactions history, balance reload, and everything that you can name.";
    $keywords = 'Anomoz, Softwares, project,roPay, hu, e-wallet, ypay, plugin';
}
else{
    $title = "Anomoz Softwares";
    $description = "We improve your business by developing innovative computer cloudbased solutions for it. Our experience of working on 40+ projects with global clients is what makes us different.";
    $keywords = 'Anomoz, Softwares, web development, website, app, software, android, application';
}

//metatags
?>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site informations -->
    <title><?echo $title?></title>
    <meta name="author" content="Anomoz Softwares">
    <meta name="description" content="<?echo $description?>">
    <meta name="keywords" content="<?echo $keywords?>">
    <meta name="language" content="English">

    <!-- Open Graph -->
    <meta property="og:title" content="<?echo $title?>">
    <meta property="og:description" content="<?echo $description?>">
    <meta property="og:url" content="<?echo $url?>">
    
    <meta property="og:image" content="https://www.anomoz.com/style/logo.png">
    <meta property="og:site_name" content="Anomoz Softwares">



    <!-- Twitter Card -->
    
    <meta name="twitter:title" content="<?echo $title?>">
    <meta name="twitter:description" content="<?echo $description?>">
    <meta name="twitter:domain" content="<?echo $url?>">
    <meta name="twitter:creator" content="Anomoz Softwares">
    
    <meta name="twitter:image:src" content="https://www.anomoz.com/style/logo.png">
    <meta name="twitter:site" content="Anomoz Softwares">
    <meta name="twitter:creator" content="Anomoz Softwares">
    <meta name="twitter:card" content="<?echo $description?>">
    

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="57x57" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://www.anomoz.com/style/logo.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.anomoz.com/style/logo.png">
    <link rel="icon" type="image/png" href="https://www.anomoz.com/style/logo.png">
    <link rel="icon" type="image/png" href="https://www.anomoz.com/style/logo.png">
    <link rel="icon" type="image/png" href="https://www.anomoz.com/style/logo.png">
    <link rel="icon" type="image/png" href="https://www.anomoz.com/style/logo.png">
    <link rel="icon" type="image/png" href="https://www.anomoz.com/style/logo.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="https://www.anomoz.com/style/logo.png">
    <meta name="msapplication-config" content="style/favicon/browserconfig.xml">
    <link rel="shortcut icon" href="https://www.anomoz.com/style/logo.png">
     
    <link href="https://fypo.anomoz.com/style/css/main.css" rel="stylesheet" />
   <!--
        <link href="https://www.digitalocean.com//assets/css/site-64c162f7.css" rel="stylesheet" />
    -->
    <?
    
    if($url=="https://projects.anomoz.com/roPay/documentation/"){?>
    <!--for roPay documentation -->
    <link href="https://developers.digitalocean.com/assets/css/style-api-v2-3cebe820.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/vendor/pikabu-22255a87.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/style-api-v2-3cebe820.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/mobile-menu-be990f4f.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/changelog-165de48c.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/header-c788c6aa.css" rel="stylesheet" type="text/css" />
          <link href="https://developers.digitalocean.com/assets/css/footer-c53ee1c1.css" rel="stylesheet" type="text/css" />
   <?}?>       
   

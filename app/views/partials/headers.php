   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

   <!-- Place this data between the <head> tags of your website -->
   <title><?= !empty($title) ? $title . " - " . getenv('app.TitleName') : getenv('app.TitleName') . " - " . getenv('app.SubtitleName'); ?></title>
   <meta name="description" content="<?= !empty($description) ? $description : getenv('app.Description'); ?>">

   <!-- Schema.org markup for Google+ -->
   <meta itemprop="name" content="<?= !empty($title) ? $title . " - " . getenv('app.TitleName') : getenv('app.TitleName') . " - " . getenv('app.SubtitleName'); ?>">
   <meta itemprop="description" content="<?= !empty($description) ? $description : getenv('app.Description'); ?>">
   <meta itemprop="image" content="https://storage.lapor.go.id/app/media/meta-image.png">

   <!-- Twitter Card data -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:site" content="@lapor1708">
   <meta name="twitter:title" content="<?= !empty($title) ? $title . " - " . getenv('app.TitleName') : getenv('app.TitleName') . " - " . getenv('app.SubtitleName'); ?>">
   <meta name="twitter:description" content="<?= !empty($description) ? $description : getenv('app.Description'); ?>">

   <!-- Twitter summary card with large image must be at least 280x150px -->
   <meta name="twitter:image:src" content="https://storage.lapor.go.id/app/media/meta-image.png">

   <!-- Open Graph data -->
   <meta property="og:title" content="<?= !empty($title) ? $title . " - " . getenv('app.TitleName') : getenv('app.TitleName') . " - " . getenv('app.SubtitleName'); ?>">
   <meta property="og:url" content="<?= site_url(); ?>">
   <meta property="og:image" content="https://storage.lapor.go.id/app/media/meta-image.png">
   <meta property="og:image:width" content="1200">
   <meta property="og:image:height" content="630">
   <meta property="og:description" content="<?= !empty($description) ? $description : getenv('app.Description'); ?>">
   <meta property="og:site_name" content="<?= getenv('app.TitleName'); ?>">

   <!-- Facebook Data -->
   <meta property="fb:app_id" content="">
   <meta property="fb:page_id" content="">
   <link rel="canonical" href="<?= site_url(); ?>">

   <!-- Favicons -->
   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
   <!-- <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
   <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16"> -->
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d7381b">
   <meta name="apple-mobile-web-app-title" content="<?= getenv('app.TitleName'); ?>">
   <meta name="application-name" content="<?= getenv('app.TitleName'); ?>">

   <meta name="theme-color" content="#0779bf" />
   <meta name="msapplication-navbutton-color" content="#0779bf" />
   <meta name="apple-mobile-web-app-status-bar-style" content="#0779bf" />

   <link rel="icon" href="<?= base_url('public/assets/img/favicon.png'); ?>" type="image/png">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <link rel="stylesheet" href="<?= base_url('public/assets/css/select2.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css'); ?>">
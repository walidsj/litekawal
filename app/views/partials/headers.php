   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

   <!-- Place this data between the <head> tags of your website -->
   <title><?= !empty($title) ? $title . " - " . getenv('web.TitleName') : getenv('web.TitleName') . " - " . getenv('web.SubtitleName'); ?></title>
   <meta name="description" content="<?= !empty($description) ? $description : getenv('web.Description'); ?>">

   <!-- Schema.org markup for Google+ -->
   <meta itemprop="name" content="<?= !empty($title) ? $title . " - " . getenv('web.TitleName') : getenv('web.TitleName') . " - " . getenv('web.SubtitleName'); ?>">
   <meta itemprop="description" content="<?= !empty($description) ? $description : getenv('web.Description'); ?>">
   <meta itemprop="image" content="https://storage.lapor.go.id/app/media/meta-image.png">

   <!-- Twitter Card data -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:site" content="@lapor1708">
   <meta name="twitter:title" content="<?= !empty($title) ? $title . " - " . getenv('web.TitleName') : getenv('web.TitleName') . " - " . getenv('web.SubtitleName'); ?>">
   <meta name="twitter:description" content="<?= !empty($description) ? $description : getenv('web.Description'); ?>">

   <!-- Twitter summary card with large image must be at least 280x150px -->
   <meta name="twitter:image:src" content="https://storage.lapor.go.id/app/media/meta-image.png">

   <!-- Open Graph data -->
   <meta property="og:title" content="<?= !empty($title) ? $title . " - " . getenv('web.TitleName') : getenv('web.TitleName') . " - " . getenv('web.SubtitleName'); ?>">
   <meta property="og:url" content="<?= site_url(); ?>">
   <meta property="og:image" content="https://storage.lapor.go.id/app/media/meta-image.png">
   <meta property="og:image:width" content="1200">
   <meta property="og:image:height" content="630">
   <meta property="og:description" content="<?= !empty($description) ? $description : getenv('web.Description'); ?>">
   <meta property="og:site_name" content="<?= getenv('web.TitleName'); ?>">

   <!-- Facebook Data -->
   <meta property="fb:app_id" content="">
   <meta property="fb:page_id" content="">
   <link rel="canonical" href="<?= site_url(current_url()); ?>">

   <!-- Favicons -->
   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
   <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
   <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d7381b">
   <meta name="apple-mobile-web-app-title" content="<?= getenv('web.TitleName'); ?>">
   <meta name="application-name" content="<?= getenv('web.TitleName'); ?>">
   <meta name="theme-color" content="#ffffff">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

   <!-- <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css'); ?>"> -->
   <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css'); ?>">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
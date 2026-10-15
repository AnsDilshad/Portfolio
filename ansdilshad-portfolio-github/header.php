<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<script>document.documentElement.classList.add("js");try{var d=document.documentElement,t=localStorage.getItem("ans-theme"),l=localStorage.getItem("ans-lang");if(t)d.setAttribute("data-theme",t);if(l&&l!=="en"){d.lang=l;if(l==="ur"||l==="ar")d.dir="rtl"}}catch(e){}</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav><div class="wrap">
<a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(ans_get('logo_a')); ?><i>.</i><?php echo esc_html(ans_get('logo_b')); ?></a>
<ul><li><a href="<?php echo esc_url(home_url('/#about')); ?>" data-t="k0">About</a></li><li><a href="<?php echo esc_url(home_url('/#skills')); ?>" data-t="k1">Skills</a></li><li><a href="<?php echo esc_url(home_url('/#experience')); ?>" data-t="k2">Experience</a></li><li><a href="<?php echo esc_url(home_url('/#work')); ?>" data-t="k3">Projects</a></li><li class="only-m"><a href="<?php echo esc_url(home_url('/#contact')); ?>" data-t="k4">Contact</a></li></ul>
<div class="nr"><div class="ctrl"><div class="lang-wrap"><button class="tgl lang" type="button" aria-haspopup="true" aria-expanded="false" aria-label="Language"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.7 3.9 5.7 3.9 9s-1.3 6.3-3.9 9c-2.6-2.7-3.9-5.7-3.9-9S9.4 5.7 12 3z"/></svg><span class="lc">EN</span></button><ul class="lmenu"><li><button type="button" data-l="en">English</button></li><li><button type="button" data-l="ur">اردو</button></li><li><button type="button" data-l="ar">العربية</button></li><li><button type="button" data-l="hi">हिन्दी</button></li><li><button type="button" data-l="es">Español</button></li><li><button type="button" data-l="fr">Français</button></li></ul></div><button class="tgl theme" type="button"></button></div>
<button class="burger" aria-label="Menu" aria-expanded="false"><span></span></button>
<a class="btn" href="<?php echo esc_url(home_url('/#contact')); ?>" data-t="k5">Hire me</a></div>
</div></nav>

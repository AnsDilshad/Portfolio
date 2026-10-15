<?php get_header();
$pal = [['#7F5D99', '#2E1545'], ['#4C2365', '#1B0C28'], ['#6A4585', '#24103A'], ['#5C3478', '#1B0C28'], ['#7F5D99', '#4C2365'], ['#4C2365', '#2A1238']];
$wp_p = ans_projects('wp_list'); $sh_p = ans_projects('sh_list');
$total = count($wp_p) + count($sh_p);
function ans_stat($v, $lk) {
    $n = ans_get($v);
    $b = ctype_digit($n) ? '<b data-count="' . esc_attr($n) . '">' . esc_html($n) . '</b>' : '<b>' . esc_html($n) . '</b>';
    return '<div class="fact">' . $b . '<span' . ans_t($lk) . '>' . ans_h($lk) . '</span></div>';
}
function ans_cards($list, $tag, $pal) {
    foreach ($list as $i => $p) {
        $c = $pal[$i % 6];
        $host = preg_replace('/^www\./', '', (string) parse_url($p['url'], PHP_URL_HOST));
        echo '<a class="pcard" style="--c1:' . $c[0] . ';--c2:' . $c[1] . '" href="' . esc_url($p['url']) . '" target="_blank" rel="noopener"><span class="ptag">' . esc_html($tag) . '</span><div><h3>' . esc_html($p['name']) . '</h3><small>' . esc_html($host) . '</small></div></a>' . "\n";
    }
}
?>
<header class="hero" id="top"><div class="wrap">
<div class="hero-copy">
<h1<?php echo ans_t('hero_h1'); ?>><?php echo wp_kses(ans_get('hero_h1'), ['span' => []]); ?></h1>
<p<?php echo ans_t('hero_p'); ?>><?php echo ans_h('hero_p'); ?></p>
<div class="actions"><a class="btn" href="#work"<?php echo ans_t('hero_btn1'); ?>><?php echo ans_h('hero_btn1'); ?></a><a class="btn ghost" href="#contact"<?php echo ans_t('hero_btn2'); ?>><?php echo ans_h('hero_btn2'); ?></a></div>
<div class="stack"><?php foreach (ans_list('stack') as $s) echo '<span>' . esc_html($s) . '</span>'; ?></div>
</div>
<div class="photo">
<img src="<?php echo esc_url(ans_photo()); ?>" alt="<?php echo esc_attr(ans_get('badge_name')); ?>" width="900" height="900">
<div class="badge"><?php echo ans_h('badge_name'); ?><small<?php echo ans_t('badge_role'); ?>><?php echo ans_h('badge_role'); ?></small></div>
</div>
</div></header>
<div class="marquee" aria-hidden="true"><div class="track"><?php $m = ans_list('marquee'); for ($r = 0; $r < 2; $r++) foreach ($m as $s) echo '<span>' . esc_html($s) . '</span>'; ?></div></div>

<section id="about"><div class="wrap about">
<div>
<h2<?php echo ans_t('about_h2'); ?>><?php echo ans_h('about_h2'); ?></h2>
<p<?php echo ans_t('about_p1'); ?>><?php echo ans_h('about_p1'); ?></p>
<p<?php echo ans_t('about_p2'); ?>><?php echo ans_h('about_p2'); ?></p>
</div>
<div class="facts">
<?php echo ans_stat('s1_v', 's1_l'), ans_stat('s2_v', 's2_l'), ans_stat('s3_v', 's3_l'); ?>
<div class="fact"><b data-count="<?php echo (int) $total; ?>"><?php echo (int) $total; ?></b><span<?php echo ans_t('s4_l'); ?>><?php echo ans_h('s4_l'); ?></span></div>
</div>
</div></section>

<section class="skills" id="skills"><div class="wrap">
<h2<?php echo ans_t('skills_h2'); ?>><?php echo ans_h('skills_h2'); ?></h2>
<p class="lead"<?php echo ans_t('skills_lead'); ?>><?php echo ans_h('skills_lead'); ?></p>
<div class="sgrid">
<?php for ($n = 1; $n <= 4; $n++) : ?>
<div class="scard"><h3<?php echo ans_t("sk{$n}_t"); ?>><?php echo ans_h("sk{$n}_t"); ?></h3><div class="tags"><?php foreach (ans_list("sk{$n}_tags") as $s) echo '<span>' . esc_html($s) . '</span>'; ?></div></div>
<?php endfor; ?>
</div>
</div></section>

<section id="experience"><div class="wrap">
<h2<?php echo ans_t('exp_h2'); ?>><?php echo ans_h('exp_h2'); ?></h2>
<p class="lead"<?php echo ans_t('exp_lead'); ?>><?php echo ans_h('exp_lead'); ?></p>
<ol class="tl">
<?php for ($n = 1; $n <= 6; $n++) : if (ans_get("e{$n}_t") === '') continue; ?>
<li><h3<?php echo ans_t("e{$n}_t"); ?>><?php echo ans_h("e{$n}_t"); ?></h3><div class="meta"<?php echo ans_t("e{$n}_m"); ?>><?php echo ans_h("e{$n}_m"); ?></div><p<?php echo ans_t("e{$n}_d"); ?>><?php echo ans_h("e{$n}_d"); ?></p></li>
<?php endfor; ?>
</ol>
</div></section>

<section class="work" id="work"><div class="wrap">
<h2<?php echo ans_t('proj_h2'); ?>><?php echo ans_h('proj_h2'); ?></h2>
<p class="lead"<?php echo ans_t('proj_lead'); ?>><?php echo ans_h('proj_lead'); ?></p>
<?php if ($wp_p) : ?><div class="pgroup"><div class="ptitle"><span class="dot"></span><h3<?php echo ans_t('wp_title'); ?>><?php echo ans_h('wp_title'); ?></h3><em class="cnt"><?php echo count($wp_p); ?></em></div>
<div class="pgrid">
<?php ans_cards($wp_p, 'WordPress', $pal); ?></div></div>
<?php endif; if ($sh_p) : ?><div class="pgroup"><div class="ptitle"><span class="dot"></span><h3<?php echo ans_t('sh_title'); ?>><?php echo ans_h('sh_title'); ?></h3><em class="cnt"><?php echo count($sh_p); ?></em></div>
<div class="pgrid">
<?php ans_cards($sh_p, 'Shopify', $pal); ?></div></div>
<?php endif; ?></div></section>

<section class="contact" id="contact"><div class="wrap">
<h2<?php echo ans_t('contact_h2'); ?>><?php echo ans_h('contact_h2'); ?></h2>
<p<?php echo ans_t('contact_p'); ?>><?php echo ans_h('contact_p'); ?></p>
<div class="clinks">
<a class="btn" href="mailto:<?php echo esc_attr(ans_get('email')); ?>"><?php echo ans_h('email'); ?></a>
<a class="btn ghost" href="tel:<?php echo esc_attr(preg_replace('/[^\d+]/', '', ans_get('phone'))); ?>"><?php echo ans_h('phone'); ?></a>
<a class="btn ghost" href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', ans_get('whatsapp'))); ?>" target="_blank" rel="noopener">WhatsApp</a>
</div>
<div class="edu"<?php echo ans_t('edu'); ?>><?php echo ans_h('edu'); ?></div>
</div></section>
<?php get_footer(); ?>

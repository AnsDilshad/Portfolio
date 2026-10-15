<?php
if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['style', 'script']);
});

add_action('wp_enqueue_scripts', function () {
    $v = wp_get_theme()->get('Version');
    wp_enqueue_style('ansdilshad-fonts', 'https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=DM+Sans:wght@400;500;700&display=swap', [], null);
    wp_enqueue_style('ansdilshad-style', get_stylesheet_uri(), ['ansdilshad-fonts'], $v);
    wp_enqueue_script('ansdilshad-main', get_template_directory_uri() . '/assets/main.js', [], $v, true);
});

/* ------------------------------------------------------------------
 * Editable content. Everything below shows up in
 * Appearance > Customize > Portfolio Content.
 * 'k' links a field to its built-in translation (EN/UR/AR/HI/ES/FR).
 * If you change the English text, that field is shown as you typed it
 * in every language (the built-in translation is skipped for it).
 * ------------------------------------------------------------------ */
function ans_fields() {
    static $f = null;
    if ($f !== null) return $f;
    $f = [];
    $add = function ($key, $sec, $type, $label, $def, $k = null, $desc = '') use (&$f) {
        $f[$key] = compact('sec', 'type', 'label', 'def', 'k', 'desc');
    };
    // Header
    $add('logo_a', 'general', 'text', 'Logo – first part', 'Ans');
    $add('logo_b', 'general', 'text', 'Logo – second part', 'Dilshad');
    // Hero
    $add('hero_h1', 'hero', 'text', 'Headline', 'I build fast, clean websites that <span>help businesses sell.</span>', 6, 'Put the purple highlighted part inside <span> … </span>');
    $add('hero_p', 'hero', 'textarea', 'Intro paragraph', 'WordPress and web developer with 3–4 years of experience building responsive business and e-commerce websites, from custom layouts to full online stores.', 7);
    $add('hero_btn1', 'hero', 'text', 'Button 1', 'See my projects', 8);
    $add('hero_btn2', 'hero', 'text', 'Button 2', 'Let’s talk', 9);
    $add('photo', 'hero', 'image', 'Profile photo (square works best)', '');
    $add('badge_name', 'hero', 'text', 'Badge – name', 'Ans Dilshad');
    $add('badge_role', 'hero', 'text', 'Badge – role', 'WordPress Developer, Code Age', 10);
    $add('stack', 'hero', 'text', 'Hero tags (comma separated)', 'WordPress, Shopify, Elementor Pro, Webflow, Squarespace');
    $add('marquee', 'hero', 'text', 'Scrolling strip (comma separated)', 'WordPress, Shopify, Elementor Pro, Webflow, Squarespace, Wix, BigCommerce, Divi, Figma');
    // About
    $add('about_h2', 'about', 'text', 'Heading', 'Design-minded developer.', 11);
    $add('about_p1', 'about', 'textarea', 'Paragraph 1', 'I create, customize and maintain responsive websites for businesses and online stores. I combine practical development skills with a design-focused approach, so the sites I deliver are easy to use and match each client’s goals.', 12);
    $add('about_p2', 'about', 'textarea', 'Paragraph 2', 'I work across WordPress, Shopify, Wix, Webflow, Squarespace and BigCommerce, with the page builders and front-end code that go with them.', 13);
    $add('s1_v', 'about', 'text', 'Stat 1 – value', '3–4');
    $add('s1_l', 'about', 'text', 'Stat 1 – label', 'years of experience', 14);
    $add('s2_v', 'about', 'text', 'Stat 2 – value', '6');
    $add('s2_l', 'about', 'text', 'Stat 2 – label', 'platforms I build on', 15);
    $add('s3_v', 'about', 'text', 'Stat 3 – value', '4');
    $add('s3_l', 'about', 'text', 'Stat 3 – label', 'teams worked with', 16);
    $add('s4_l', 'about', 'text', 'Stat 4 – label (number = total projects, automatic)', 'live sites featured below', 17);
    // Skills
    $add('skills_h2', 'skills', 'text', 'Heading', 'What I work with', 18);
    $add('skills_lead', 'skills', 'text', 'Sub-heading', 'The platforms, builders and tools I use to ship client work.', 19);
    $sk = [[ 'Platforms', 20, 'WordPress, Shopify, Wix, Webflow, Squarespace, BigCommerce'], ['Page builders', 21, 'Elementor, Elementor Pro, Divi, WP Bakery, Visual Composer, BeBuilder'], ['Code', 22, 'HTML, CSS, JavaScript'], ['Design tools', 23, 'Figma, Canva, CapCut']];
    foreach ($sk as $i => $s) {
        $n = $i + 1;
        $add("sk{$n}_t", 'skills', 'text', "Card $n – title", $s[0], $s[1]);
        $add("sk{$n}_tags", 'skills', 'text', "Card $n – items (comma separated)", $s[2]);
    }
    // Experience
    $add('exp_h2', 'experience', 'text', 'Heading', 'Experience', 24);
    $add('exp_lead', 'experience', 'text', 'Sub-heading', 'Where I’ve built websites.', 25);
    $ex = [
        ['WordPress Developer', 'Code Age · Current', 'Develop and maintain client websites using WordPress and page builders. Customize layouts and functionality, support responsive design and keep the experience consistent.', 26],
        ['Web Developer', 'RM Associates · 6 months', 'Website and online-store development, supporting site customization and e-commerce requirements.', 29],
        ['Web Developer', 'Spicaware · 1 year', 'Website development and customization for business needs, using web design tools and page-builder workflows.', 32],
        ['Web Development Intern', 'Nextron Software House · 6 months', 'First hands-on work in a software-house environment, supporting WordPress website development.', 35],
        ['', '', '', null], ['', '', '', null],
    ];
    foreach ($ex as $i => $e) {
        $n = $i + 1; $k = $e[3];
        $add("e{$n}_t", 'experience', 'text', "Job $n – title" . ($n > 4 ? ' (leave empty to hide)' : ''), $e[0], $k);
        $add("e{$n}_m", 'experience', 'text', "Job $n – company · duration", $e[1], $k === null ? null : $k + 1);
        $add("e{$n}_d", 'experience', 'textarea', "Job $n – description", $e[2], $k === null ? null : $k + 2);
    }
    // Projects
    $add('proj_h2', 'projects', 'text', 'Heading', 'Featured projects', 38);
    $add('proj_lead', 'projects', 'text', 'Sub-heading', 'Live websites I worked on. Tap a card to open the site.', 39);
    $add('wp_title', 'projects', 'text', 'WordPress group title', 'WordPress Projects', 40);
    $add('wp_list', 'projects', 'textarea', 'WordPress projects', "Windows Cleaning Sydney | https://windowscleaningsydney.com.au/\nPro Asbestos Removal | https://proasbestosremoval.co.uk/\nEley Property Maintenance | https://www.eleypropertymaintenance.com.au/\nTeamLife Platform | https://teamlifeplatform.com/\nSea Wolves Howl | https://seawolveshowl.au/\nSpinpod360 | https://spinpod360.com.au/\nPro Plastering Service | https://proplasteringservice.co.uk/\nState of the Heart Education | https://stateofthehearteducation.com.au/\nJim’s Pool Care Franchise | https://www.jimspoolcarefranchise.com.au/\nCrown Wardrobes & Kitchens | https://crownwardrobesandkitchens.com.au/\nMish Wright | https://mishwright.com/", null, 'One project per line:  Name | https://link.com   (add, remove or reorder lines freely)');
    $add('sh_title', 'projects', 'text', 'Shopify group title', 'Shopify Projects', 41);
    $add('sh_list', 'projects', 'textarea', 'Shopify projects', "E-Ozzie | https://eozzie.com.au/\nPhitkari | https://phitkari.pk/\nSweet Greek | https://sweetgreek.com.au/\nVeloz Electric | https://velozelectric.com.au/", null, 'One project per line:  Name | https://link.com');
    // Contact & footer
    $add('contact_h2', 'contact', 'text', 'Heading', 'Have a website to build?', 42);
    $add('contact_p', 'contact', 'text', 'Text', 'Send me your project details and I’ll get back to you.', 43);
    $add('email', 'contact', 'text', 'Email', 'ans.dilshadwp@gmail.com');
    $add('phone', 'contact', 'text', 'Phone (as displayed)', '+92 311 5790596');
    $add('whatsapp', 'contact', 'text', 'WhatsApp number (digits with country code)', '923115790596');
    $add('edu', 'contact', 'text', 'Education line', 'Education: ICS, The National College · Matriculation, Islamabad Model School · Web Development Course, Buraq Institute of Technology', 44);
    $add('footer', 'contact', 'text', 'Footer text', '© Ans Dilshad · Pakistan · English & Urdu', 45);
    return $f;
}

function ans_get($key) {
    $f = ans_fields();
    $v = get_theme_mod('ans_' . $key, $f[$key]['def']);
    return is_string($v) ? $v : $f[$key]['def'];
}
function ans_h($key) { return esc_html(ans_get($key)); }
/* data-t attribute only while the text is still the original (so translations stay correct) */
function ans_t($key) {
    $f = ans_fields();
    $k = $f[$key]['k'];
    return ($k !== null && ans_get($key) === $f[$key]['def']) ? ' data-t="k' . (int) $k . '"' : '';
}
function ans_list($key) {
    return array_values(array_filter(array_map('trim', explode(',', ans_get($key))), 'strlen'));
}
function ans_projects($key) {
    $out = [];
    foreach (preg_split('/\r\n|\r|\n/', ans_get($key)) as $line) {
        $p = array_map('trim', explode('|', $line, 2));
        if ($p[0] === '' || empty($p[1])) continue;
        $out[] = ['name' => $p[0], 'url' => $p[1]];
    }
    return $out;
}
function ans_photo() {
    $u = ans_get('photo');
    return $u ? $u : get_template_directory_uri() . '/assets/photo.jpg';
}

add_action('customize_register', function ($wp) {
    $secs = ['general' => 'Header & Logo', 'hero' => 'Hero / Banner', 'about' => 'About & Stats', 'skills' => 'Skills', 'experience' => 'Experience', 'projects' => 'Projects', 'contact' => 'Contact & Footer'];
    $wp->add_panel('ans_panel', ['title' => 'Portfolio Content', 'priority' => 30, 'description' => 'Edit all text, projects, contact details and the photo of your portfolio.']);
    foreach ($secs as $id => $t) $wp->add_section('ans_' . $id, ['title' => $t, 'panel' => 'ans_panel']);
    foreach (ans_fields() as $key => $f) {
        $id = 'ans_' . $key;
        if ($f['type'] === 'image') $san = 'esc_url_raw';
        elseif ($f['type'] === 'textarea') $san = 'sanitize_textarea_field';
        elseif ($key === 'hero_h1') $san = function ($v) { return wp_kses($v, ['span' => []]); };
        else $san = 'sanitize_text_field';
        $wp->add_setting($id, ['default' => $f['def'], 'sanitize_callback' => $san]);
        if ($f['type'] === 'image') {
            $wp->add_control(new WP_Customize_Image_Control($wp, $id, ['label' => $f['label'], 'section' => 'ans_' . $f['sec']]));
        } else {
            $wp->add_control($id, ['label' => $f['label'], 'section' => 'ans_' . $f['sec'], 'type' => $f['type'] === 'textarea' ? 'textarea' : 'text', 'description' => $f['desc']]);
        }
    }
});

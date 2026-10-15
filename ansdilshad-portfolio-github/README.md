# Ans Dilshad – Portfolio (WordPress Theme)

One-page developer portfolio theme for WordPress. Purple palette, light/dark mode, 6 languages
(English, اردو, العربية, हिन्दी, Español, Français) and fully editable from the Customizer.

## Install
1. Download this repo as ZIP (Code → Download ZIP) or zip the files yourself.
2. WP Admin → Appearance → Themes → Add New → Upload Theme → select the ZIP → Activate.
3. The homepage shows the portfolio automatically (uses `front-page.php`).

## Edit content (no code)
Appearance → Customize → **Portfolio Content**
Logo, hero text, profile photo, stats, skills, experience (up to 6 jobs), projects
(one per line: `Name | https://link.com`), contact details and footer.

> Built-in translations apply while a text is unchanged. If you edit a text in English,
> that text is shown as typed in every language.

## Files
| File | Purpose |
|---|---|
| `style.css` | Theme header + all styles (colors are CSS variables in `:root`) |
| `functions.php` | Theme setup, Customizer fields (`ans_fields()`), helpers |
| `front-page.php` | The one-page layout |
| `header.php` / `footer.php` | Navigation (language + theme toggles) / footer |
| `assets/main.js` | Animations, mobile menu, dark mode, language switcher + translations |
| `assets/photo.jpg` | Default profile photo (replace in Customizer or here) |
| `preview/index.html` | Standalone static preview (open in a browser) |

## Change colors
Edit the variables at the top of `style.css`
(`--accent`, `--navy`, `--navy2` and the dark-mode block).

## Add / edit a translation
`assets/main.js` → object `T` (keys `k0…k45` match `data-t` attributes; `ans_fields()` in `functions.php` maps each field to its key).

## License
GPL v2 or later (see theme header in `style.css`).

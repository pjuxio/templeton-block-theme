# Templeton Block Theme — Review Summary

**Reviewed:** 2026-02-14
**Theme Version:** 1.0
**WordPress Target:** 6.9+ (theme.json v3)
**Base Theme:** Frost (WP Engine)

---

## Overview

A Full Site Editing block theme built for Templeton Academy. The theme includes 17 templates, 55 block patterns (with dark/light variants), 8 color style variations, a custom staff management system, video/consultation modals, and a 16-color design system with fluid responsive typography.

---

## Strengths

- Solid FSE implementation with theme.json v3, block templates, template parts, and a large pattern library
- Fluid responsive typography using `clamp()` with custom Nexa font family and 9 size presets
- Comprehensive 16-color palette with 8 switchable style variations
- Responsive design across multiple breakpoints (782px, 1100px, 1279px)
- Custom staff CPT integration with dual-headshot hover effects, video modal, and consultation modal
- Proper escaping throughout (`esc_html()`, `esc_url()`, `esc_attr()`)
- Translation-ready text strings in patterns

---

## Issues to Address

### High Priority

- [ ] **Hardcoded client values in functions.php** — GTM ID (`GTM-PCK4T9W4`), logo path in footer template part, and video URLs are all hardcoded. Move to theme options or constants.
- [ ] **Font licensing** — Nexa font files (`.otf`) have no license included. `OFL.txt` references Outfit (a different font). `Outfit-Variable.woff2` is present but unused. Clarify licensing or replace with an open-source alternative.

### Medium Priority

- [ ] **Missing `languages/` directory** — `load_theme_textdomain()` is called but no `.pot` file exists. Create one or remove the call.
- [ ] **Staff CPT not registered in theme** — Depends on an external plugin for the staff post type and meta fields. Document this dependency; shortcodes will break if the plugin is deactivated.
- [ ] **`date('Y')` in copyright shortcode** — Replace with `gmdate('Y')` per WordPress coding standards.
- [ ] **Undocumented Gravity Forms dependency** — Consultation modal references form ID 2 with no fallback if the plugin is absent.
- [ ] **Inline JavaScript (~297 lines)** — Enqueued inline in `functions.php`. Extract to a separate `assets/js/theme.js` file for caching and CSP compliance.

### Low Priority

- [ ] **Accessibility** — No skip-to-content link, no focus trapping in modals, staff grid hover effect is mouse-only.
- [ ] **No build process** — No `package.json` or minification pipeline. 2,122-line CSS and 596KB of `.otf` fonts served unoptimized.
- [ ] **Footer inconsistency** — Footer template part is 339 lines of hardcoded markup while header delegates to a pattern. Consider aligning the approach.
- [ ] **`!important` overuse** — 100+ instances in `style.css`. Largely unavoidable given WordPress block editor specificity, but worth reducing where possible over time.

---

## Stats

| Component | Count |
|---|---|
| Templates | 17 |
| Template Parts | 2 |
| Block Patterns | 55 |
| Style Variations | 8 |
| Custom Shortcodes | 4 |
| Registered Block Styles | 5 |
| CSS Lines | 2,122 |
| functions.php Lines | ~550 |
| Font Assets | 596 KB |

---

## Next Steps

Revisit this list as part of MVP launch planning. High-priority items (hardcoded values, font licensing) should be resolved before launch. Medium-priority items can be addressed iteratively.

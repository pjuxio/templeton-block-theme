# Templeton Block Theme Review

**Review Date:** February 10, 2026

## Overview
A well-structured WordPress Full Site Editing (FSE) block theme based on Frost, tailored for "Templeton Academy" with a school/educational focus.

---

## Strengths

### 1. Modern Architecture
- Uses theme.json v3 schema with WordPress 6.9
- Proper FSE implementation with template parts, patterns, and style variations
- 7 color style variations (graphite, green, magenta, orange, purple, red, teal)

### 2. Typography System
- Custom Nexa font family (heading + body variants)
- Fluid typography with responsive font sizing using `clamp()`
- Well-defined font weight and line-height custom properties

### 3. Extensive Pattern Library
- 50+ patterns covering headers, footers, pricing, testimonials, CTAs, etc.
- Both light and dark variants for many patterns
- School-specific patterns (staff grid, page-about, page-academics)

### 4. Custom Functionality
- Staff CPT support with shortcodes (`[staff_grid]`, `[staff_header]`, `[staff_detail]`)
- Dual headshot hover effect for staff members
- Previous/next navigation based on custom display order
- Custom block styles (checkmark lists, shadow groups, column reverse)

### 5. Good Responsive Design
- Comprehensive media queries throughout `style.css`
- Mobile-first considerations with stacked columns and adjusted spacing

---

## Issues & Recommendations

### 1. Hardcoded Values
- **`patterns/header-default.php` (lines 13-14):** Logo hardcoded as HTML `<img>` with absolute path `/wp-content/uploads/2026/02/brand-white.png`
  - **Fix:** Use `<!-- wp:site-logo -->` block instead

- **`functions.php` (lines 43-52):** GTM ID `GTM-PCK4T9W4` hardcoded
  - **Fix:** Make configurable via Customizer or constant

### 2. License/Font Issues
- Nexa fonts in `assets/fonts/` appear to be commercial fonts
- `OFL.txt` references "Outfit" font, not Nexa
  - **Fix:** Verify font licensing or switch to open-source fonts

### 3. Unused/Mismatched References
- `Outfit-Variable.woff2` in fonts folder isn't referenced in theme.json
- Some font-face declarations reference files not present (`nexa-extra-bold.otf` exists but is unused in theme.json)

### 4. Potential PHP Improvements
- **`functions.php` (line 238):** `date('Y')` should be `gmdate('Y')` or use `wp_date()` for timezone handling
- Staff shortcodes output raw HTML without KSES filtering on some elements

### 5. Missing Features
- No `languages/` folder despite `load_theme_textdomain()` call
- Missing skip-to-content link for accessibility
- No schema.org structured data for staff members

### 6. Style.css Concerns
- Heavy use of `!important` (100+ instances) - could indicate specificity issues
- Some inline `font-size: 18px !important` on buttons overrides theme.json

---

## Summary

| Area | Rating |
|------|--------|
| Code Quality | ⭐⭐⭐⭐ |
| FSE Implementation | ⭐⭐⭐⭐⭐ |
| Customization Options | ⭐⭐⭐⭐ |
| Accessibility | ⭐⭐⭐ |
| Portability | ⭐⭐⭐ (due to hardcoded values) |

**Overall:** Solid theme with comprehensive patterns and good FSE implementation. Main concerns are hardcoded client-specific values and font licensing. Would benefit from making site-specific content (logo, GTM) configurable and reducing `!important` usage.

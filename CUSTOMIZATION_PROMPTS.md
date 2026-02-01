# Theme Customization Prompt Series

This document contains a series of prompts to replicate the Templeton Block Theme customization workflow.

## Theme Customization Prompts

### 1. Initial Setup & Review
```
We are going to collaborate on customizing the theme "[THEME_NAME]" please review the theme folder contents. This is a clone of [BASE_THEME] theme.
```

### 2. Header Customization - Structure
```
Let's customize the header using approach one (editing the existing pattern). I would like to:
- Add a logo instead of the site title
- Add a button to the right of the nav that says "[BUTTON_TEXT]"
- Add background color [HEX_COLOR]
- Change nav color to [HEX_COLOR]
```

### 3. Global Button Styling
```
Let's change the global default button style:
- Reduce padding to [Xpx top/bottom, Ypx left/right]
- Change border radius to [Xpx] for a more rounded appearance
- Update the outline button variation to match these styles
```

### 4. Button Hover Effects
```
Add a hover effect for the default button style that transitions to [COLOR_NAME/HEX] from our theme.json palette.
```

### 5. Add Custom Color to Palette
```
Add a new color to the theme.json palette:
- Name: [COLOR_NAME]
- Slug: [slug]
- Color: [HEX_COLOR]
```

### 6. Custom Header Button Styling
```
Style the button in the header:
- Default: background [HEX_COLOR] with [HEX_COLOR] text
- Hover: transition to [COLOR_NAME] with [HEX_COLOR] text
```

### 7. Footer Customization
```
Update the footer using the same approach as the header:
- Add dark background [HEX_COLOR]
- Change text/link colors to [HEX_COLOR]
- Add branding (logo)
- Center all content
- Match header styling for consistency
```

### 8. Footer Link Styling
```
Style the links in the footer:
- Default state: [HEX_COLOR]
- Hover state: [HEX_COLOR]
```

### 9. Navigation Link States
```
Style the nav links:
- Hover: transition to [COLOR_NAME]
- Active/current page: [COLOR_NAME]
```

---

## Quick Reference Template

For a complete header/footer dark theme with accent colors:

```
1. Review theme structure
2. Header: logo + nav + CTA button + dark background (#222222)
3. Nav links: white (#ffffff) with yellow (#ffb32c) hover/active
4. Buttons: reduced padding (10px/20px), rounded (30px radius)
5. Global button hover: purple (#822f91) to blue (#455be2)
6. Header CTA: yellow (#ffb32c) with purple (#822f91) hover
7. Footer: centered, dark background, logo + links
8. Footer links: white with yellow hover
9. Add accent color to palette if needed
```

---

## Pro Tips

- **Button Variations**: Always check if button variations need updating when changing global button styles
- **Color Palette**: Add custom colors to theme.json palette rather than using inline styles for proper hover effects
- **Custom Hover States**: Use CSS classes for custom hover states to avoid specificity issues
- **Visual Consistency**: Match header and footer backgrounds for visual consistency
- **File Structure**: Edit pattern files directly for persistent changes
- **CSS Organization**: Keep custom CSS in style.css with clear section comments

---

## Files Modified in This Customization

1. **theme.json** - Color palette, button styles
2. **patterns/header-default.php** - Header structure and elements
3. **patterns/footer-default.php** - Footer structure and elements
4. **style.css** - Custom hover effects and link styles

---

## Color Scheme Used

- **Base (White)**: #ffffff
- **Contrast (Dark)**: #222222
- **Primary (Purple)**: #822f91
- **Secondary (Blue)**: #455be2
- **Neutral**: #eadbde
- **Accent (Yellow/Orange)**: #ffb32c

---

## Best Practices for Frost Theme Customization

### 1. Use Child Themes or Clones
- Clone rather than edit directly
- Preserves update capability
- Maintains separation from parent theme

### 2. Leverage theme.json for Design System
- Customize colors, typography, spacing centrally
- Use custom properties for consistency
- Define design tokens in one place

### 3. Create Custom Block Patterns
- Build reusable patterns for layouts
- Use pattern categories for organization
- Reference theme design tokens

### 4. Style Variations
- Create JSON files in `/styles/` for color schemes
- Users can switch without code changes

### 5. Register Custom Block Styles
- Add variations in `functions.php`
- Keep them semantic and reusable

### 6. Use Template Parts Efficiently
- Customize header.html and footer.html
- Create variations for different contexts

### 7. Keep CSS Minimal
- Block themes rely on theme.json
- Use style.css for edge cases only
- Avoid unnecessary overrides

### 8. Font Management
- Use web fonts or variable fonts
- Define in theme.json fontFamilies

### 9. Maintain Accessibility
- Preserve color contrast ratios
- Test keyboard navigation
- Keep semantic HTML structure

### 10. Testing
- Test with different style variations
- Verify responsive behavior
- Check block editor experience

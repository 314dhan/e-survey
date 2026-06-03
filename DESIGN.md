# Design System — E-Survei UNSERA

## Colors

### Palette

| Token | Value | Role |
|---|---|---|
| `--color-primary` | `oklch(0.47 0.155 152)` | Primary actions, brand anchor |
| `--color-primary-dark` | `oklch(0.38 0.145 152)` | Hover / pressed primary |
| `--color-primary-light` | `oklch(0.92 0.030 152)` | Light tint for selected states |
| `--color-bg` | `oklch(1.000 0.000 0)` | Page background |
| `--color-surface` | `oklch(0.972 0.005 152)` | Cards, auth page bg, panels |
| `--color-surface-2` | `oklch(0.948 0.008 152)` | Table stripes, active states |
| `--color-border` | `oklch(0.882 0.010 152)` | Borders, dividers |
| `--color-ink` | `oklch(0.18 0.018 155)` | Body text (≥7:1 vs bg) |
| `--color-muted` | `oklch(0.46 0.012 152)` | Secondary text, captions |
| `--color-accent` | `oklch(0.56 0.130 210)` | Teal — links, info badges |
| `--color-danger` | `oklch(0.52 0.200 28)` | Destructive, error states |
| `--color-success` | `oklch(0.50 0.155 148)` | Success states |

### Strategy: Restrained
Primary green anchors brand identity. Surfaces stay near-pure-white. Accent teal used only for secondary info signals. No decoration-only color use.

### Text on fills
Primary (L 0.47, chroma 0.155) and accent (L 0.56, chroma 0.130) are saturated mid-luminance: **use white text** on filled backgrounds per Helmholtz-Kohlrausch convention.

## Typography

### Type stack
```
font-family: 'Inter', system-ui, -apple-system, sans-serif;
```
One family throughout. Inter handles heading weight contrast (700), UI labels (500–600), and body (400) without needing a second face.

### Scale (ratio 1.125 — product UI tighter scale)
| Step | Size |
|---|---|
| xs | 0.75rem |
| sm | 0.875rem |
| base | 1rem |
| lg | 1.125rem |
| xl | 1.266rem |
| 2xl | 1.424rem |
| 3xl | 1.602rem |

Body line-height: 1.6. UI labels: 1.4. Display headings: 1.2.

Max line length (prose): 70ch. Data tables: unrestricted.

## Spacing

8px base unit. Scale: 4, 8, 12, 16, 20, 24, 32, 40, 48px.

## Radius

| Token | Value | Use |
|---|---|---|
| `--radius-sm` | 4px | Inputs, small elements |
| `--radius-md` | 8px | Cards, modals |
| `--radius-lg` | 12px | Auth card |

## Shadows

- `--shadow-sm`: `0 1px 3px oklch(0.18 0.018 155 / 0.08)` — subtle lift
- `--shadow-md`: `0 4px 12px oklch(0.18 0.018 155 / 0.10)` — card hover, auth form

## Motion

- Duration: 150ms on state changes (hover, focus, selection)
- Easing: ease-out
- `@media (prefers-reduced-motion: reduce)`: all transitions set to 0.01ms, no transforms

## Components

### Navbar
Green primary background. White brand name (600 weight). Logout button as ghost-white (transparent bg, white border). No mobile toggle needed at current scope.

### Auth card
Surface-bg page. White card centered, max-width 420px, border-radius-lg, shadow-md. Brand lockup at top (logo + text). No split-panel decoration.

### Survey question card
White card with border. Shows question number as small green label. Custom radio scale (5 options) with labeled buttons — no raw `<input>` without visible label. Card border turns primary green on any selection.

### Admin nav cards
Grid of 4. Each card: icon in primary-light bg, title, description, CTA. Hover: border turns primary, card lifts 2px. No identical decorative cards — each has a distinct icon.

### Data tables
Primary green thead. Alternating rows at surface bg. Dense but readable (sm text, 12px 16px padding).

# Product

## Register

product

## Users

Three roles with distinct contexts:
- **Mahasiswa (students)**: Filling satisfaction surveys once per cycle. Mobile or lab computer. Low familiarity with formal systems; need a calm, guided experience.
- **Dosen (lecturers)**: Filling surveys about campus facilities and academic environment. Similar context to students but expect a slightly more professional tone.
- **Admin**: Viewing survey results as tables and charts. Need quick access to data without cognitive overload.

## Product Purpose

E-Survei Kampus UNSERA collects satisfaction data from students and lecturers at Universitas Serang Raya. Success means respondents complete their survey in one sitting without confusion, and admins can read results at a glance.

## Brand Personality

Trustworthy, modern, approachable. The system should feel like it belongs to a real university — credible and organized — without feeling like a government bureaucracy. Warm enough that students don't dread filling it in.

## Anti-references

- **SaaS startup dark mode**: No purple/indigo gradients, no glass cards, no neon accents.
- **Heavy government portal**: No dense table-only layouts, no 1990s form styling, no excessive whitespace-free screens.
- **Generic Bootstrap default**: The unmodified blue Bootstrap look signals zero effort. Every surface must be intentionally styled.

## Design Principles

1. **Clarity over cleverness**: Survey forms must be scannable. No ambiguity in question layout or answer options.
2. **Institutional confidence**: The brand carries university identity — use color and type with authority, not decoration.
3. **Guided not gated**: Each role gets into their task quickly. No unnecessary friction between login and the primary action.
4. **Data earns its space**: Charts and tables are the payoff. Give them room; don't bury them in chrome.
5. **Consistent but not rigid**: Shared components across roles, but each role's surface feels tuned to their job.

## Accessibility & Inclusion

- WCAG AA minimum (4.5:1 body text contrast, 3:1 large text).
- All form inputs must have associated labels.
- Reduced motion support via `@media (prefers-reduced-motion: reduce)`.
- Indonesian language throughout; no English copy in the UI unless technical (e.g. "Chart.js").

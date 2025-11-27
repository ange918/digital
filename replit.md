# JRC DIGIT - Agence Digitale

## Overview
JRC DIGIT is a professional digital agency website built with vanilla Vite (HTML/CSS/JS). The site showcases web development, graphic design, and AI music production services with a premium dark neon aesthetic with glassmorphism effects.

## Project Structure
```
├── src/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css       # Global styles (neon + dark theme)
│   │   ├── js/
│   │   │   └── main.js         # Menu, animations, portfolio filter, quote calculator
│   │   ├── img/                # Image assets
│   │   └── musics/             # Demo audio files
│   ├── index.html              # Homepage
│   ├── about.html              # About page
│   ├── services.html           # Services overview
│   ├── service-web.html        # Web development service (with pricing)
│   ├── service-flyers.html     # Logos & Flyers service (with pricing)
│   ├── service-chanson.html    # AI Music production (with audio demos)
│   ├── portfolio.html          # Portfolio with filters
│   └── contact.html            # Contact form & map
├── public/
│   ├── php/                    # Backend PHP files (structure only)
│   │   ├── config.php          # Database configuration
│   │   ├── db.php              # Database connection class
│   │   └── save_order.php      # Form submission handler
│   └── sitemap.xml             # SEO sitemap
├── vite.config.js              # Multi-page Vite configuration
└── package.json                # Dependencies
```

## Features
- **Neon Dark Theme**: Premium dark design with blue/violet neon accents
- **Glassmorphism Cards**: Transparent blur effects with glowing borders
- **Pricing Grids**: Complete pricing in XOF for all services
- **Quote Calculator**: Dynamic pricing calculator on service pages
- **Audio Players**: Music demo section with HTML5 audio
- **Enhanced Forms**: File upload, WhatsApp field, budget selection
- **WhatsApp Button**: Floating contact button
- **Portfolio Filtering**: Filter projects by category
- **Scroll Animations**: Fade-in effects on scroll
- **Responsive Design**: Mobile-first approach

## Design
- **Palette**: Dark (#0a0a0f) with Neon Blue (#00d4ff) and Purple (#a855f7)
- **Icons**: Boxicons (CDN)
- **Typography**: Uppercase titles with glow effects
- **Effects**: Glassmorphism, gradients, CSS animations

## Pricing (XOF)
- **Sites Web**: À partir de 394 000 XOF (600€)
- **Logos**: À partir de 6 560 XOF (10€)
- **Musiques IA**: À partir de 15 000 XOF

## Development
- **Start dev server**: `npm run dev` (runs on port 5000)
- **Build for production**: `npm run build`
- **Preview production build**: `npm run preview`

## Configuration
Vite is configured for Replit with:
- Root: `src/` directory
- Multi-page setup with rollup inputs
- Host: `0.0.0.0` for external access
- Port: `5000` for Replit compatibility
- `allowedHosts: true` for Replit proxy support

## PHP Backend (Prepared)
PHP files are ready but not active (DEV_MODE = true):
- `save_order.php`: Handles form submissions
- `config.php`: Database and email settings
- `db.php`: PDO database wrapper

## Deployment
Configured for static deployment with:
- Build command: `npm run build`
- Output directory: `dist`
